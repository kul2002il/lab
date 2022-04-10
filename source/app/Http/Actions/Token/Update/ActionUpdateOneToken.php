<?php

namespace App\Http\Actions\Token\Update;

use App\Http\Actions\Token\Resources\UserTokenResource;
use Illuminate\Support\Facades\Auth;

class ActionUpdateOneToken
{
    /**
     * Edit token
     *
     * Edit token name and rights.
     * Rights will be used only those that are available to the user of the
     * token.
     *
     * Token key stays the same.
     *
     * @urlParam token_name string required user token name Example: report-service
     * @group Tokens
     * @response {
     *    "data": {
     *        "name": "report-service",
     *        "abilities": [
     *            "report:getShort",
     *           "report:getByProject"
     *        ],
     *        "last_used_at": null
     *    }
     * }
     */
    function __invoke(UpdateRequest $request, string $tokenName)
    {
        $token = Auth::user()
            ->tokens()
            ->where('name', $tokenName)
            ->firstOrFail();
        if ($request->name)
        {
            $token->name = $request->name;
        }
        if ($request->abilities)
        {
            $token->abilities = $request->abilities;
        }
        $token->save();
        return new UserTokenResource($token);
    }
}
