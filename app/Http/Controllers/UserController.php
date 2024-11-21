<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return response()->json(['message' => 'Account created successfully', 'user' => $user], 201);
    }


    // public function login(Request $request){
    //     $userdata = array(
    //         'email' => $request['email'] ,
    //         'password' => $request['password']
    //       );
    //       // attempt to do the login
    //       if (Auth::attempt($userdata)){
    //         return response()->json(['message' => 'Login created successfully'], 200);
    //       }else{
    //         return response()->json(['message' => 'NOt login'], 401);
    //       }
}
