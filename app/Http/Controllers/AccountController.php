<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    // This method will show user registration page
    public function registration()
    {
        return view('frontend.account.registration');
    }

    // This method will register the user
    public function processRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required|min:6',
        ]);

        if ($validator->passes()) {

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            // $user->confirm_password = $request->confirm_password;
            $user->save();

            session()->flash('success', 'You have registered successfully! Now Login');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // This method shows the login page
    public function login()
    {
        return view('frontend.account.login');
    }

    // This methos will authenticate the user and login on the basis of their credential
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->passes()) {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('login.profile');
            } else {
                return redirect()->route('account.login')->with('errors', 'Email or Password are incorrect');
            }
        } else {
            // echo "please fill your correct credentials";
            // return response()->json([
            //     'status' => false,
            //     'errors' => $validator->errors()
            // ]);

            return redirect()->route('account.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }

    public function profile()
    {
        echo "user profile page";
    }
}
