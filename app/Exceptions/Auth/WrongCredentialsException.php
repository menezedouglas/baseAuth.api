<?php

namespace App\Exceptions\Auth;

use Exception;

class WrongCredentialsException extends Exception
{
    protected $message = 'Usuário ou senha incorretos';

    protected $code = 401;
}
