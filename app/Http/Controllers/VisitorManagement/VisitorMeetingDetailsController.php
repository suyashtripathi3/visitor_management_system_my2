<?php

namespace App\Http\Controllers\VisitorManagement;

use App\Http\Controllers\Controller;
use App\Models\VisitorMeetingDetails;
use App\Models\VisitorMovementHistory;
use Illuminate\Http\Request;

class VisitorMeetingDetailsController extends Controller
{
    /**
     * Check In
     */
    public function checkIn($movementId)
    {
        $movement = VisitorMovementHistory::findOrFail($movementId);

        $meeting = VisitorMeetingDetails::create([
            'visitor_id' => $movement->visitor_id,
            'movement_id' => $movement->id,
            'checked_in_at' => now(),
        ]);

        return back()->with('success', 'Checked in successfully');
    }

    /**
     * Check Out
     */
    public function checkOut($movementId)
    {
        $meeting = VisitorMeetingDetails::where('movement_id', $movementId)
            ->whereNull('checked_out_at')
            ->latest()
            ->first();

        if (!$meeting) {
            return back()->with('error', 'Visitor is not checked in.');
        }

        $meeting->update(['checked_out_at' => now()]);

        return back()->with('success', 'Checked out successfully');
    }
}
