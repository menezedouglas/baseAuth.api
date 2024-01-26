<?php

namespace App\Exceptions\User;

use Exception;

class UserNotFoundException extends Exception
{
    protected $message = 'A pessoa procurada não foi encontrada';

    protected $code = 404;
}
