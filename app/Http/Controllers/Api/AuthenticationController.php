<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Auth\WrongCredentialsException;
use App\Http\Controllers\Controller;

use App\Services\AuthenticationService;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{

    private AuthenticationService $authenticationService;

    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    /**
     * @param Request $request
     * @return array
     * @throws WrongCredentialsException
     */
    public function index(Request $request): array
    {
        return $this->authenticationService->login(
            $request->input('email'),
            $request->input('password')
        );
    }

}
