<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\DefaultException;
use App\Exceptions\User\UserNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\DefaultResource;
use App\Http\Resources\SuccessResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(): DefaultResource
    {
        return new DefaultResource(
            $this->service->all()
        );
    }

    /**
     * @param int $userId
     * @return DefaultResource
     * @throws UserNotFoundException
     */
    public function show(int $userId): DefaultResource
    {
        return new DefaultResource(
            $this->service->show($userId)
        );
    }


    public function store(Request $request): SuccessResource
    {
        $this->service->create(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        return new SuccessResource([]);
    }

    /**
     * @param int $userId
     * @param Request $request
     * @return SuccessResource
     * @throws UserNotFoundException
     */
    public function update(int $userId, Request $request): SuccessResource
    {
        $this->service->update(
            $userId,
            $request->input('name'),
            $request->input('email')
        );

        return new SuccessResource([]);
    }

    /**
     * @param int $userId
     * @return SuccessResource
     * @throws UserNotFoundException
     */
    public function destroy(int $userId): SuccessResource
    {
        $this->service->delete($userId);

        return new SuccessResource([]);
    }

}
