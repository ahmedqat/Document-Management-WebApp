<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function index(){


        $users = User::all();
        $roles = Role::all();


        return view('users.show',compact('users','roles'));
    }


    public function upload(AddUserRequest $request){


       //dd($request->all());
        // $formFields = $request->validateWithBag('user_upload',[

        //     'id' => 'required',
        //     'name' => 'required',
        //     'email' => ['required','email'],
        //     'role_id' => 'required',
        // ]);

        $formFields = $request->validated();



        if ($request->filled('password')) {
            $formFields['password'] = bcrypt($request->input('password'));
        }



        $user = User::create($formFields);

        if($request->filled('role')){
            $user->syncRoles($request->input('role'));
        }

        //$user->syncRoles($request->input('role'));

        return  redirect()->back();

    }
    //Update User
    public function update(Request $request, User $user){


        $formFields = $request->validateWithBag('user_update',[

            'edit_user_name' => 'required',
            'edit_user_email' => 'required',
            'edit_user_role' => 'required',

        ]);


        $columnMapping = [
            'edit_user_name' => 'name',
            'edit_user_email' => 'email',
            //'edit_user_role' => 'role_id',
        ];

        $mappedFields = [];
        foreach ($columnMapping as $formField => $dbColumn) {
            $mappedFields[$dbColumn] = $formFields[$formField];
        }

        $user->update($mappedFields);

        $user->syncRoles($formFields['edit_user_role']);

        return redirect()->back();


    }

    //delete user

    public function delete(User $user){
        $user->delete();
        return redirect()->back();
    }
}
