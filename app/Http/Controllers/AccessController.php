<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AccessController extends Controller
{

    //Show the access table.
    public function show()
    {
        $departments = Department::all();
        $roles = Role::all();

        return view('access.index', compact('departments', 'roles'));
    }

    //Modify access for each role, add and remove permissions.
    public function modAccess(Request $request)
    {
        $permissions = $request->input('permissions');

        foreach ($permissions as $roleId => $departmentIds) {
            $role = Role::find($roleId);

            $permissionNames = array_map(function ($departmentId) {
                return "modify_{$departmentId}";
            }, $departmentIds);

            $role->syncPermissions($permissionNames);
        }

        return redirect()->back()->with('message', 'Permissions updated successfully');
    }
}
