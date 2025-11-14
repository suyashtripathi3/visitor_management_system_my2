<?php

namespace App\Http\Controllers\VisitorManagement;

use App\Http\Controllers\Controller;
use App\Models\VisitorMovementHistory;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VisitorMovementController extends Controller
{
    /**
     * List Movements for a Visitor with Filters
     */
    public function index(Request $request, $visitorId)
    {
        $visitor = Visitor::findOrFail($visitorId);

        // Base query
        $query = VisitorMovementHistory::with(['user'])
                ->where('visitor_id', $visitorId);

        // 🔍 SEARCH (purpose or person_req)
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('purpose', 'LIKE', "%{$request->search}%")
                  ->orWhere('person_req', 'LIKE', "%{$request->search}%");
            });
        }

        // 👤 FILTER BY USER
        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        // 📅 FILTER BY MEETING DATE
        if ($request->meeting_date) {
            $query->where('meeting_date', $request->meeting_date);
        }

        // Fetch movements paginated
        $movements = $query->paginate(10)->appends($request->all());

        // Fetch all users for dropdown
        $users = User::select('id','name')->get();

        return Inertia::render('VisitorManagement/Movements', [
            'visitor'   => $visitor,
            'movements' => $movements,
            'filters'   => $request->only('search', 'user_id', 'meeting_date'),
            'users'     => $users   // like your departments, roles in UserController
        ]);
    }
      
}
