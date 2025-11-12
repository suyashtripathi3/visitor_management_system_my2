<?php

namespace App\Http\Controllers\CommonFields;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Floor;
use App\Models\Building;
use App\Traits\Toastable;

class FloorController extends Controller
{
    use Toastable;

    public function index(Request $request)
    {
        $search = $request->input('search');

        $floors = Floor::with('building') // include building name
            ->when($search, fn($q) => 
                $q->where('name', 'like', "%{$search}%")
            )
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('CommonField/Floor/Index', [
            'floors'   => $floors,
            'filters'  => [ 'search' => $search ],
            'buildings' => Building::select('id','name')->orderBy('name')->get(), // dropdown in form
        ]);
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'floor_name'        => 'required|string|max:255'
        ]);

        Floor::create($request->only('building_id','floor_name','status'));
        $this->success('Floor saved successfully');

        return back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'floor_name'        => 'required|string|max:255',
        ]);

        $floor = Floor::findOrFail($id);
        $floor->update($request->only('building_id','floor_name'));

        $this->success('Floor updated successfully');
        return back();
    }

    public function show($id)
    {
        $floor = Floor::findOrFail($id);

        return response()->json([
            'data' => $floor
        ]);
    }

    public function destroy($id)
    {
        Floor::findOrFail($id)->delete();
        $this->success('Floor deleted successfully');

        return back();
    }

    public function toggleStatus($id)
    {
        $floor = Floor::findOrFail($id);
        $floor->status = !$floor->status;
        $floor->save();

        $this->success('Floor status updated successfully');
        return back();
    }
}
