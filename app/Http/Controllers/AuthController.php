<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth:api'])->except([
    //         'login',
    //         'logout',
    //         'callRefreshToken',
    //         'getTokenExpiredate',
    //         'getRefreshTokenExpiredate'
    //     ]);
    // }

    public function login(Request $request)
    {

        $data =  $request->validate(
            [
                "email" => "required|string|email:rfc,dns",
                "password" => "required",

            ]
        );

        if (!Auth::attempt($data)) {
            throw ValidationException::withMessages([
                'login' => 'Invalid Credentials',
            ]);
        }

        return response([
            'data' => auth()->user(),
            'token' => auth()
                ->user()
                ->createToken('api-system-user')->accessToken,
        ]);
    }

    public function register(Request $request)
    {

        $data =  $request->validate(
            [
                "name" => "required",
                "email" => "required|string|email:rfc,dns",
                "password" =>  "required|min:6|confirmed",
                "mobile" => "required",
                "address" => "required",
                "role" => "required"
            ]
        );

        $data['password'] = bcrypt($data['password']);

        $user =    User::create($data);

        return response([
            'data' => $user,
            'token' => $user->createToken('api-system-user')->accessToken,
        ]);
    }
}
