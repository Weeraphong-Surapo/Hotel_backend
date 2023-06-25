<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function middle()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function register(RegisterRequest $request){
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        
        $token = auth()->attempt($request->only('email','password'));
        
        return response()->json(compact('token'));
    }

    public function login(LoginRequest $request){
        $this->middle();
        if(!$token = auth()->attempt($request->only('email','password'))){
            return response(null,401);
        }

        return response()->json(compact('token'));
    }

    public function me(Request $request){
        $this->middle();
        $user = $request->user();

        return response()->json([
            'email'=>$user->email,
            'name'=>$user->name
        ]);
    }

    public function logout(){
        $this->middle();
        auth()->logout();
    }
}
