<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddRoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index()
    {
        $roles = Role::all();

        return view('roles.show', compact('roles'));
    }

    //Add a new role
    public function upload(AddRoleRequest $request)
    {


        // $formFields = $request->validateWithBag('role_upload',[


        //     'name' => 'required',
        //     'role_description' => 'required',



        // ]);

        $formFields = $request->validated();

        Role::create($formFields);

        return  redirect()->back();
    }


    //Update the role

    public function update(Request $request,Role $role){

        $formFields = $request->validateWithBag('role_update',[
            'edit_role_name' => 'required',
            'edit_role_description' => 'required',
        ]);


        $columnMapping = [
            'edit_role_name' => 'name',
            'edit_role_description' => 'role_description',
        ];


        $mappedFields = [];
        foreach ($columnMapping as $formField => $dbColumn) {
            $mappedFields[$dbColumn] = $formFields[$formField];
        }

        $role->update($mappedFields);

        return redirect()->back();





    }

    //Simple function to delete a role.

    public function delete(Role $role){
        $role->delete();
        return redirect()->back();
    }
}
