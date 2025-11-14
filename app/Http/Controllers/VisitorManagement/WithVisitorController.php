<?php

namespace App\Http\Controllers\VisitorManagement;

use App\Http\Controllers\Controller;
use App\Models\WithVisitor;
use Illuminate\Http\Request;

class WithVisitorController extends Controller
{
    public function store(Request $request, $movementId)
    {
        $data = $request->validate([
            'in_with' => 'nullable|string',
            'out_with' => 'nullable|string'
        ]);

        $data['movement_id'] = $movementId;

        $withVisitor = WithVisitor::create($data);

        return response()->json([
            'message' => 'WithVisitor data saved',
            'with_visitor' => $withVisitor
        ]);
    }
}
