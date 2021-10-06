<?php

namespace Malek\UniqueNumberGenerator\Exceptions;

use Exception;

class GeneratorException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->view('oauth.emailTaken', [], 400);
    }
}
