<?php

return [
    'reportable' => [
        \App\Exceptions\Auth\UnauthenticatedException::class,
        \App\Exceptions\Auth\WrongCredentialsException::class,
        \App\Exceptions\User\UserNotFoundException::class,
        \App\Exceptions\DefaultException::class
    ]
];
