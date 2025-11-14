<?php

namespace App\Http\Controllers\VisitorManagement;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Auth;

class VisitorController extends Controller
{
    /**
     * List Visitors
     */
    public function index(Request $request)
    {
        $visitors = Visitor::with('movementHistories')
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($sub) use ($request) {
                    $sub->where('name', 'like', "%{$request->search}%")
                        ->orWhere('email', 'like', "%{$request->search}%")
                        ->orWhere('phone', 'like', "%{$request->search}%")
                        ->orWhere('company', 'like', "%{$request->search}%");
                });
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        return Inertia::render('VisitorManagement/Index', [
            'visitors' => $visitors,
            'filters' => $request->only('search')
        ]);
    }

    /**
     * Create Page
     */
    public function create()
    {
        return Inertia::render('VisitorManagement/Form');
    }

    /**
     * Store Visitor
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'visitor_type' => 'nullable|string|max:50',
            'name' => 'required|string|max:191',
            'email' => 'nullable|email|max:191',
            'phone' => 'nullable|digits_between:10,12',
            'company' => 'nullable|string|max:191',
            'gender' => 'nullable|string|max:20',
            'aadhaar' => 'nullable|string|max:20',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $filename = time() . '_' . preg_replace('/\s+/', '_', $request->file('photo')->getClientOriginalName());
            $request->file('photo')->move(public_path('assets/images/visitor'), $filename);
            $data['photo'] = 'assets/images/visitor/' . $filename;
        }

        $data['badge_no'] = strtoupper(\Str::random(6));
        $data['created_by'] = Auth::id();

        $visitor = Visitor::create($data);

        return response()->json([
            'message' => 'Visitor created successfully',
            'visitor' => $visitor
        ]);
    }

    /**
     * Edit Page
     */
    public function edit($id)
    {
        $visitor = Visitor::findOrFail($id);

        return Inertia::render('VisitorManagement/Form', [
            'visitor' => $visitor
        ]);
    }

    /**
     * Update Visitor
     */
    public function update(Request $request, $id)
    {
        $visitor = Visitor::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|max:191',
            'email' => 'nullable|email|max:191',
            'phone' => 'nullable|digits_between:10,12',
            'company' => 'nullable|max:191',
            'gender' => 'nullable|string|max:20',
            'aadhaar' => 'nullable|string|max:20',
            'badge_no' => [
                'nullable',
                Rule::unique('visitors')->ignore($visitor->id)
            ],
            'photo' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('photo')) {
            $filename = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('assets/images/visitor'), $filename);
            $data['photo'] = 'assets/images/visitor/' . $filename;
        }

        $visitor->update($data);

        return response()->json([
            'message' => 'Visitor updated successfully',
            'visitor' => $visitor
        ]);
    }

    /**
     * Delete Visitor
     */
    public function destroy($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();

        return redirect()->back()->with('success', 'Visitor deleted successfully');
    }
}
