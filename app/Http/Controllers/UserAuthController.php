<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class UserAuthController extends Controller
{
    //
    

    /* User Registration Methods */

      public function Register(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

        $token = $user->createToken('myuserToken')->plainTextToken;
        $response = Response([
            'user' => $user,
            'token' => $token,
        ]);


        return $response;
      }



      // Logout the User here 

      public function logout(Request $request){
       
        auth()->user()->tokens()->delete();

        return [
            'message'=> 'user successfully LoggedOut'
        ];

        
      }



      // User Login section here 

      public function Login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        
        // check User
           $user = User::where('email', $fields['email'])->first();

       // check Password
       if(!$user || !Hash::check($fields['password'], $user->password)){
         return response([
             'message'=> 'User email/Password Invalid',
         ]);
       }   
        $token = $user->createToken('myuserToken')->plainTextToken;
        $response = Response([
            'user' => $user,
            'token' => $token,
        ]);


        return $response;
      }
}
