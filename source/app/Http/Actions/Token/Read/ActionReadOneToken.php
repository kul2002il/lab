<?php

namespace App\Http\Actions\Token\Read;

use App\Http\Actions\Token\Resources\UserTokenResource;
use Illuminate\Support\Facades\Auth;

class ActionReadOneToken
{
    /**
     * Read an authorized user tokens
     *
     * @urlParam token_name string required user token name Example: report-service
     * @group Tokens
     */
    function __invoke(string $tokenName)
    {
        return new UserTokenResource(
            Auth::user()
                ->tokens()
                ->where('name', $tokenName)
                ->firstOrFail()
        );
    }
}
