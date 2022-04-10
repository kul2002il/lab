<?php

namespace App\Http\Actions\Token\Delete;

use Illuminate\Http\Request;

class ActionDeleteOneToken
{
    /**
     * Deleting a token
     *
     * Removing an authorized user token by token name.
     *
     * @urlParam token_name string required user token name Example: report-service
     * @group Tokens
     * @response 204
     */
    function __invoke(Request $request, string $tokenName)
    {
        $request->user()
            ->tokens()
            ->where('name', $tokenName)
            ->firstOrFail()
            ->delete();
        return response('', 204);
    }
}
