<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AccessController extends Controller
{
    public function show()
    {
        $departments = Department::all();
        $roles = Role::all();

        return view('access.index', compact('departments', 'roles'));
    }




    // public function modAccess(Request $request)
    // {

    //     dd($request->all());
    //     $permissions = $request->input('permissions');

    //     //dd($permissions);

    //     foreach ($permissions as $roleId => $departmentPermissions) {
    //         $role = Role::find($roleId);

    //         foreach ($departmentPermissions as $departmentId => $isChecked) {
    //             $permissionName = "modify_{$departmentId}";

    //             if ($isChecked) {
    //                 $role->givePermissionTo($permissionName);
    //             } else {
    //                 // Log the permissionName for debugging
    //                 info("Revoking permission: $permissionName");
    //                 $role->revokePermissionTo($permissionName);
    //             }
    //         }
    //     }
    //     // Redirect back or handle the response as needed
    //     return redirect()->back()->with('message', 'Permissions updated successfully');
    // }

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


