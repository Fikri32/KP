<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Auth as Auther;

class APIControllerAuth extends Controller
{
    public function register(Request $request,User $users)
    {
        $this->validate($request,[
            'name' => 'required', 
            'email'=> 'required|email|unique:users',
            'password' => 'required'
        ]);
        
        $user = $users->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => Hash::make($request->password),
            'role' => 'admin',
            'company_code' => str_random(60)
        ]);
        
        
        return new UserResource($user);

    }

    public function login(Request $request,User $users)
    {
        if (!Auth::attempt(['email' => $request->email,'password' => $request->password])) {
            return response()->json([
                'error' => 'Credential wrong'
            ],401);
        }

        $users = $users->find(Auth::user()->id);

        return new Auther($users);
    }
}
