<?php

namespace HUAC\Exceptions;

use Exception;
use Throwable;

class ViewNotFoundException extends Exception implements Throwable
{
    public static function forView($view = null)
    {
        return view('errors.view-not-found')->with($view);
    }
}
