<?php

namespace App\Http\Controllers\CommonFields;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Building;
use App\Traits\Toastable;

class BuildingController extends Controller
{
    use Toastable;
   
    public function index(Request $request)
{
    
    $search = $request->input('search');

    $bulidings = Building::query()
        ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();



    return Inertia::render('CommonField/Building/Index', [
        'buildings' => $bulidings,
        'filters' => [
            'search' => $search,
        ]
    ]);
}

public function store(Request $request)
{
   $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'nullable|string|max:255',
    ]);

    Building::create($request->only('name','address'));
    $this->success('Building Save Successfully');
    return back();

}

public function update(Request $request, $id)
{
        $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'nullable|string|max:255',
    ]);

    $dept = Building::findOrFail($id);
    $dept->update($request->only('name','address'));
    $this->success('Building Update Successfully');

    return back();

}

public function show($id)
{
    $building = Building::findOrFail($id);

    return response()->json([
        'data' => $building
    ]);
}


public function destroy($id)
{
    Building::findOrFail($id)->delete();
    $this->success('Building Delete Successfully');

    return back();

}

public function toggleStatus($id)
{
    $building = Building::findOrFail($id);
    $building->status = !$building->status;
    $building->save();

    $this->success('Building status updated successfully.');
    return back();
}


}