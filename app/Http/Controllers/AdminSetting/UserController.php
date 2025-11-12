<?php

namespace App\Http\Controllers\AdminSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Traits\Toastable;


class UserController extends Controller
{
    use Toastable;


    public function index(Request $request)
    {
        $query = User::with(['department','designation','roles'])->select('id','name','email','department_id','designation_id','status');

        // ✅ Search Filter
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name','LIKE',"%{$request->search}%")
                  ->orWhere('email','LIKE',"%{$request->search}%");
            });
        }

        // ✅ Department Filter
        if ($request->department_id) {
            $query->where('department_id', $request->department_id);
        }

        // ✅ Role Filter
        if ($request->role) {
            $query->whereHas('roles', function($q) use ($request) {
                $q->where('name', $request->role);
            });
        }

        $users = $query->paginate(10)->appends($request->all());

        return inertia('AdminSetting/Users/Index', [
            'users' => $users,
            'filters' => $request->only('search','department_id','role'),
            'departments' => Department::select('id','name')->get(),
            'designations' => Designation::select('id','name')->get(),
            'allRoles' => Role::pluck('name'),
            'totalUsers' => User::count()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
            'department_id'=>'required',
            'designation_id'=>'required',
            'roles'=>'required|array|min:1'
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'department_id'=>$request->department_id,
            'designation_id'=>$request->designation_id
        ]);

        $user->syncRoles($request->roles);

        $this->success('User Created Successfully');

        return back();
    }

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);

        return response()->json(['data'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'=>'required',
            'email'=>"required|email|unique:users,email,$id",
            'department_id'=>'required',
            'designation_id'=>'required',
            'roles'=>'required|array|min:1'
        ]);

        $data = [
            'name'=>$request->name,
            'email'=>$request->email,
            'department_id'=>$request->department_id,
            'designation_id'=>$request->designation_id
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->roles);
        $this->success('User Updated Successfully');

        return back();
    }


    public function toggleStatus($id)
{
    $user = User::findOrFail($id);
    $user->status = $user->status === 'active' ? 'inactive' : 'active';
    $user->save();

        $this->success('User Status updated Successfully');

    return back();
}

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        $this->success('User deleted Successfully');

        return back();
    }
}
