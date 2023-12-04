<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticationController extends Controller
{
    //
    public function show()
    {
        return view('auth.login');
    }




    public function authenticate(Request $request)
    {

        // dd($request->all());

        $request->validate([

            'campus_id' => 'required',
            'campus_password' => 'required',



        ],[
            'campus_id.required' => 'Please enter your Campus ID.',
            'campus_password.required' => 'Please enter your password'



        ]);

        $credentials = [

            'uid' => $request->get('campus_id'),
            'password' => $request->get('campus_password'),
            'fallback' => [

                'username' => $request->get('campus_id'),
                'password' => $request->get('campus_password'),
            ]


        ];



        if (Auth::attempt($credentials)) {
            $ldapUser = Auth::user();
            //dd($ldapUser);
            //  $localUser = User::where('username',$ldapUser->getUsername())->first();
            return redirect()->intended('/');
        }




        return redirect()->back()->withInput($request->only('campus_id'))->with('login_error', 'Invalid Credentials.');
    }



    public function logout()
    {

        Auth::logout();


        return redirect('/');
    }
}
