<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDepartmentRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DepartmentController extends Controller
{

    //Returns the view for the departments.
    public function index()
    {

        $departments = Department::all();

        return view('departments.index', compact('departments'));
    }

    //Handles the request to create a new department, along with the role and permission

    public function upload(AddDepartmentRequest $request)
    {

        $formFields = $request->validated();

        $department = Department::create($formFields);

        $permission = Permission::create(['name' => "modify_{$department->id}"]);

        $role = Role::create(['name' => "{$department->name}"]);

        $role->givePermissionTo($permission);

        return redirect()->back()->with('success', 'Created Department Successfully.');
    }


    //This function is responsible for deleting the department, also deleting the role and permissions as well.
    public function delete(Department $department)
    {


        // Get the permission associated with the department
        $permission = Permission::where('name', "modify_{$department->id}")->first();


        // Get the role associated with the department
        $role = Role::findByName($department->name);

        // Switch the role of the users to default

        $defaultRole = Role::where('name', 'Default')->first();
        $users = User::role($role->name)->get();


        foreach ($users as $user) {
            $user->syncRoles([$defaultRole->name]);
        }

        //remove the permission from role
        $role->revokePermissionTo($permission);

        // Delete the role

        $roleName = $role->name;
        DB::table('roles')->where('name', $roleName)->delete();


        // Delete the permission
        $permissionName = $permission->name;
        DB::table('permissions')->where('name', $permissionName)->delete();


        // Delete the department
        $department->delete();



        return redirect()->back()->with('success', 'Department and associated role/permission deleted successfully');
    }
}
