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
        return response('Generation id is failed. The loop limit exceeds ' . config('numerable.limitIterations'));
    }
}
