<?php

namespace App\Http\Controllers\AdminSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Traits\Toastable;


class RoleController extends Controller
{
    use Toastable;

    public function index(Request $request)
    {
        $search = $request->search;

        $roles = Role::withCount(['permissions', 'users'])
            ->when($search, fn($q) => $q->where('name', 'like', "%$search%"))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return inertia('AdminSetting/Roles/Index', [
            'roles' => $roles,
            'filters' => $request->only('search')
        ]);
    }

 public function create()
{
    return inertia('AdminSetting/Roles/Form', [
        'editId' => null,
        'permissions' => Permission::all()
    ]);
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array'
        ]);

        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        $this->success('Role created Successfully');
        return redirect()->route('admin.roles.index');
    }

public function edit(Role $role)
{
    return inertia('AdminSetting/Roles/Form', [
        'editId' => $role->id,
        'role' => $role,
        'permissions' => Permission::all(),
        'rolePermissions' => $role->permissions()->pluck('name')
    ]);
}

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => "required|unique:roles,name,$role->id",
            'permissions' => 'array'
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions);

        $this->success('Role Updated Successfully');

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        $this->success('Role deleted Successfully');

        return back();
    }
}
