<?php

namespace App\Http\Actions\User;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\NewTokenResource;
use Illuminate\Support\Facades\Auth;

class ActionLogin
{
    /**
     * Authentication
     *
     * User authentication.
     * A token is issued for the user's nick and password for further
     * interaction with the api.
     *
     * The token is created under the name "login" and is available like other
     * tokens.
     *
     * If a "login" token previously existed, it is removed and a new user token
     * is generated.
     *
     * @group Users
     * @unauthenticated
     * @response 201 {
     *    "data": {
     *        "name": "login",
     *        "token": "{YOUR_AUTH_KEY}"
     *    }
     * }
     */
    function __invoke(LoginRequest $request)
    {
        if(!Auth::attempt($request->validated()))
        {
            return response('Unauthorized', 401);
        }
        $request->user()->tokens()->where('name', 'login')->delete();
        $newToken = $request->user()->createToken('login');
        return (new NewTokenResource($newToken));
    }
}
