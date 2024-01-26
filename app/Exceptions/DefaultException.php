<?php

namespace App\Exceptions;

use Exception;

class DefaultException extends Exception
{
    protected $message = 'Houve um problema em nosso sistema, por favor tente novamente mais tarde.';

    protected $code = 500;
}
