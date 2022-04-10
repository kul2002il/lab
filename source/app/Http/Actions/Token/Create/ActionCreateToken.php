<?php

namespace App\Http\Actions\Token\Create;

use App\Http\Resources\NewTokenResource;

class ActionCreateToken
{
    /**
     * Token generation
     *
     * @group Tokens
     * @response 201 {
     *    "data": {
     *        "name": "report-service",
     *        "token": "{YOUR_AUTH_KEY}"
     *    }
     * }
     */
    function __invoke(CreateRequest $request)
    {
        $newToken = $request->user()->createToken($request->name);
        return (new NewTokenResource($newToken))->code(201);
    }
}
