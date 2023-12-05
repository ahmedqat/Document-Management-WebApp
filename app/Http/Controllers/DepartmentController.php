<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DepartmentController extends Controller
{


    // public function deb()
    // {

    //     return view('index');
    // }

    public function index(){

        $departments = Department::all();

        return view('departments.index',compact('departments'));

    }

    public function upload(AddDepartmentRequest $request){

        $formFields = $request->validated();

        $department = Department::create($formFields);

        $permission = Permission::create(['name' => "modify_{$department->id}"]);

        $role = Role::create(['name' => "{$department->name}"]);

        $role->givePermissionTo($permission);

        return redirect()->back();

    }



}
