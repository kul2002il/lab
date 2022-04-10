<?php

namespace App\Http\Actions\Token\Read;

use App\Http\Actions\Token\Resources\TokenCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ActionReadAllTokens
{
    /**
     * Read all authorized user tokens
     *
     * @group Tokens
     */
    function __invoke(Request $request)
    {
        return new TokenCollection(Auth::user()->tokens);
    }
}
