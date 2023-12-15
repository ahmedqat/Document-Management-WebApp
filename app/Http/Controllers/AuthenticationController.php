<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthenticationController extends Controller
{
    //Show the login screen.
    public function index()
    {
        return view('auth.login');
    }



    //Utilize data and authenticate the user via LDAP or DB
    public function authenticate(Request $request)
    {



        $request->validate([

            'campus_id' => 'required',
            'campus_password' => 'required',



        ], [
            'campus_id.required' => 'Please enter your Campus ID.',
            'campus_password.required' => 'Please enter your password'



        ]);

        $credentials = [

            'uid' => $request->get('campus_id'),
            'password' => $request->get('campus_password'),
            //Fallback in case LDAP is unavailable.
            'fallback' => [

                'username' => $request->get('campus_id'),
                'password' => $request->get('campus_password'),
            ]


        ];


        //Attempt to login.

        if (Auth::attempt($credentials)) {
            $ldapUser = Auth::user();
            return redirect()->intended('/');
        }



        //Incase login fails.
        return redirect()->back()->withInput($request->only('campus_id'))->with('login_error', 'Invalid Credentials.');
    }


    //Log the user out and invalidate the session.
    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/');
    }
}
