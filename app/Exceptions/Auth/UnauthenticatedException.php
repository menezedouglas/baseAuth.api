<?php

namespace App\Exceptions\Auth;

use Exception;

class UnauthenticatedException extends Exception
{
    protected $message = 'Você não está autenticado.';

    protected $code = 401;
}
