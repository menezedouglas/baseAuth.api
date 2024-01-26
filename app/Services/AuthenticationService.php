<?php

namespace App\Services;

use App\Contracts\Service;
use App\Exceptions\Auth\WrongCredentialsException;
use App\Exceptions\User\UserNotFoundException;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationService implements Service
{

    public static function query(): Builder
    {
        return PasswordReset::query();
    }

    /**
     * @param string $email
     * @param string $password
     * @return array
     * @throws WrongCredentialsException
     */
    public function login(string $email, string $password): array
    {

        /**
         * @var User|null $user
         */
        if(!$user = User::where('email', $email)->first())
            throw new WrongCredentialsException();

        if(!Hash::check($password, $user->password))
            throw new WrongCredentialsException();

        $token = Auth::attempt([
            'email' => $email,
            'password' => $password
        ]);

        return [
            'authorization' => $token,
            'type' => 'Bearer',
            'valid' => config('jwt.ttl')
        ];
    }

}
