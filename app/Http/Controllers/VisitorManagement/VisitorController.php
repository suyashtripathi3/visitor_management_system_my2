<?php

namespace App\Http\Controllers\VisitorManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\VisitorMovementHistory;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Inertia\Inertia;
use Inertia\Response;
use Auth;
use Storage;

class VisitorController extends Controller
{
    /**
     * 🧭 Display the list of visitors (Inertia Page)
     */
    public function index(Request $request): Response
    {
        $query = Visitor::with([
            'movementHistories' => function ($q) {
                $q->latest();
            }
        ])->orderByDesc('created_at');

        // 🔍 Status filter
        if ($request->filled('status')) {
            switch ($request->status) {
                case 'checked_in':
                    $query->whereHas('movementHistories', function ($q) {
                        $q->whereNotNull('checked_in_at')
                            ->whereNull('checked_out_at');
                    });
                    break;

                case 'checked_out':
                    $query->whereHas('movementHistories', function ($q) {
                        $q->whereNotNull('checked_out_at');
                    });
                    break;

                case 'not_checked_in':
                    // ✅ Visitors who have NO movement record OR only have movement without check_in
                    $query->whereDoesntHave('movementHistories', function ($q) {
                        $q->whereNotNull('checked_in_at');
                    });
                    break;
            }
        }

        // 🔍 Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%")
                    ->orWhere('badge_no', 'like', "%{$search}%");
            });
        }

        // 🔢 Handle perPage dropdown
        $perPage = $request->perPage === 'all'
            ? $query->count()
            : (is_numeric($request->perPage) ? (int) $request->perPage : 10);

        $visitors = $query->paginate($perPage)->appends($request->query());

        return Inertia::render('VisitorManagement/Index', [
            'visitors' => $visitors,
            'filters' => $request->only(['search', 'status', 'perPage']),
        ]);
    }

    /**
     * 📄 Invite form page
     */
    public function create(): Response
    {
        return Inertia::render('VisitorManagement/Form');
    }

    /**
     * 💌 Invite new visitor
     */
    public function invite(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:191',
            'gender' => 'nullable|string|max:20',
            'purpose' => 'nullable|string',
            'venues' => 'nullable',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $filename = time() . '_' . preg_replace('/\s+/', '_', $request->file('photo')->getClientOriginalName());
            $request->file('photo')->move(public_path('assets/images/visitor'), $filename);
            $data['photo'] = 'assets/images/visitor/' . $filename;
        }

        $data['badge_no'] = strtoupper(Str::random(6));
        $data['created_by'] = Auth::id();

        $visitor = Visitor::create($data);

        $venues = is_string($request->venues)
            ? json_decode($request->venues, true)
            : $request->venues;

        VisitorMovementHistory::create([
            'visitor_id' => $visitor->id,
            'purpose' => $request->purpose,
            'venues' => $venues,
            'checked_in_at' => null,
            'checked_out_at' => null,
        ]);

        return response()->json([
            'message' => 'Visitor invited successfully!',
            'visitor' => $visitor->load('movementHistories'),
        ]);
    }

    /**
     * 🔁 Re-invite existing visitor
     */
    public function reinvite($id)
    {
        $visitor = Visitor::findOrFail($id);

        VisitorMovementHistory::create([
            'visitor_id' => $visitor->id,
            'purpose' => 'Re-invite',
            'venues' => null,
            'checked_in_at' => null,
            'checked_out_at' => null,
        ]);

        return response()->json([
            'message' => 'Visitor re-invited successfully.',
            'visitor' => $visitor->load('movementHistories'),
        ]);
    }

    /**
     * ✏️ Edit form
     */
    public function edit($id): Response
    {
        $visitor = Visitor::with('movementHistories')->findOrFail($id);

        return Inertia::render('VisitorManagement/Invite', [
            'editId' => $visitor->id,
            'visitor' => $visitor,
        ]);
    }

    /**
     * 🔄 Update visitor details
     */
    public function update(Request $request, $id)
    {
        $visitor = Visitor::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:191',
            'gender' => 'nullable|string|max:20',
            'photo' => 'nullable',
            'badge_no' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('visitors', 'badge_no')->ignore($visitor->id),
            ],
        ]);

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            if ($visitor->photo) {
                $path = public_path($visitor->photo);
                if (file_exists($path)) {
                    unlink($path);
                } elseif (Storage::disk('public')->exists($visitor->photo)) {
                    Storage::disk('public')->delete($visitor->photo);
                }
            }

            $filename = time() . '_' . preg_replace('/\s+/', '_', $request->file('photo')->getClientOriginalName());
            $request->file('photo')->move(public_path('assets/images/visitor'), $filename);
            $data['photo'] = 'assets/images/visitor/' . $filename;
        }

        $visitor->update($data);

        return response()->json([
            'message' => 'Visitor updated successfully.',
            'visitor' => $visitor->load('movementHistories'),
        ]);
    }

    /**
     * 🗑️ Delete visitor
     */
    public function destroy($id)
    {
        $visitor = Visitor::findOrFail($id);

        if ($visitor->photo)
            Storage::disk('public')->delete($visitor->photo);

        $visitor->movementHistories()->delete();
        $visitor->delete();

        return redirect()->route('visitor.index')->with('success', 'Visitor deleted successfully.');
    }

    /**
     * 🟢 Check-in visitor
     */
    public function checkIn($id)
    {
        $visitor = Visitor::findOrFail($id);
        $movement = $visitor->movementHistories()->latest()->first();

        if ($movement && $movement->checked_in_at && !$movement->checked_out_at) {
            return back()->with('error', 'Visitor is already checked in.');
        }

        if (!$movement || $movement->checked_out_at) {
            $movement = VisitorMovementHistory::create([
                'visitor_id' => $visitor->id,
                'purpose' => 'Check-in',
                'venues' => null,
                'checked_in_at' => Carbon::now(),
                'checked_out_at' => null,
            ]);
        } else {
            $movement->update(['checked_in_at' => Carbon::now()]);
        }

        return back()->with('success', 'Visitor checked in successfully.');
    }

    /**
     * 🔴 Check-out visitor
     */
    public function checkOut($id)
    {
        $visitor = Visitor::with('movementHistories')->findOrFail($id);
        $movement = $visitor->movementHistories()->latest()->first();

        if (!$movement || !$movement->checked_in_at) {
            return back()->with('error', 'Visitor has not been checked in yet.');
        }

        if ($movement->checked_out_at) {
            return back()->with('error', 'Visitor already checked out.');
        }

        $movement->checked_out_at = now();
        $movement->save();

        return back()->with('success', 'Visitor checked out successfully.');
    }

    /**
     * 🔍 Smart Search for Invite Form
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (!$query) {
            return response()->json(['found' => false]);
        }

        $visitors = Visitor::query()
            ->where('email', 'like', "%{$query}%")
            ->orWhere('phone', 'like', "%{$query}%")
            ->orWhere('company', 'like', "%{$query}%")
            ->take(10)
            ->with('movementHistories')
            ->get();

        if ($visitors->isEmpty()) {
            return response()->json(['found' => false]);
        }

        if ($visitors->count() === 1) {
            return response()->json(['found' => true, 'visitor' => $visitors->first()]);
        }

        return response()->json(['found' => true, 'visitors' => $visitors]);
    }

    public function movements($id)
    {
        $visitor = Visitor::with('movementHistories')->findOrFail($id);

        return Inertia::render('VisitorManagement/Movements', [
            'visitor' => $visitor,
            'movements' => $visitor->movementHistories,
        ]);
    }
}
