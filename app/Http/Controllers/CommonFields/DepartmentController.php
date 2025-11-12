<?php

namespace App\Http\Controllers\CommonFields;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Department;
use App\Traits\Toastable;


class DepartmentController extends Controller
{

    use Toastable;


    public function index(Request $request)
{
    
    $search = $request->input('search');

    $departments = Department::query()
        ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%"))
        ->orderBy('id', 'desc')
        ->paginate(10)
        ->withQueryString();

    return Inertia::render('CommonField/Department/Index', [
        'departments' => $departments,
        'filters' => [
            'search' => $search,
        ]
    ]);
}

public function store(Request $request)
{
    $request->validate(['name' => 'required|string|max:255']);

    Department::create($request->only('name'));
    $this->success('Department Save Successfully');
    return back();

}

public function update(Request $request, $id)
{
    $request->validate(['name' => 'required|string|max:255']);

    $dept = Department::findOrFail($id);
    $dept->update($request->only('name'));
    $this->success('Department Update Successfully');

    return back();

}

public function show($id)
{
    $department = Department::findOrFail($id);

    return response()->json([
        'data' => $department
    ]);
}


public function destroy($id)
{
    Department::findOrFail($id)->delete();
    $this->success('Department Delete Successfully');

    return back();

}

}
