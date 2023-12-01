<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){


        $users = User::all();


        return view('users.show',compact('users'));
    }


    public function upload(AddUserRequest $request){


       // dd($request->all());

        // $formFields = $request->validateWithBag('user_upload',[

        //     'id' => 'required',
        //     'name' => 'required',
        //     'email' => ['required','email'],
        //     'role_id' => 'required',



        // ]);

        $formFields = $request->validated();



        User::create($formFields);

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
            'edit_user_role' => 'role_id',
        ];

        $mappedFields = [];
        foreach ($columnMapping as $formField => $dbColumn) {
            $mappedFields[$dbColumn] = $formFields[$formField];
        }

        $user->update($mappedFields);

        return redirect()->back();


    }

    //delete user

    public function delete(User $user){
        $user->delete();
        return redirect()->back();
    }
}
