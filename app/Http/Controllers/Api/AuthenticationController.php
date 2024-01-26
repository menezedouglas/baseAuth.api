<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Auth\WrongCredentialsException;
use App\Http\Controllers\Controller;

use App\Http\Resources\DefaultResource;
use App\Http\Resources\SuccessResource;
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
     * @return DefaultResource
     * @throws WrongCredentialsException
     */
    public function index(Request $request): DefaultResource
    {
        return new DefaultResource(
            $this->authenticationService->login(
                $request->input('email'),
                $request->input('password')
            )
        );
    }

    public function logout(): SuccessResource
    {
        $this->authenticationService->logout();

        return new SuccessResource([]);
    }

}
