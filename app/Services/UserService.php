<?php

namespace App\Services;

use App\Contracts\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserService implements Service
{

    public static function query(): Builder
    {
        return User::query();
    }

    public function all(): Collection|array
    {
        return self::query()->get();
    }

    public function show(int $id): User
    {
        if(!$user = self::query()->find($id)) {
            throw new \Exception("User not found");
        }
    }

}
