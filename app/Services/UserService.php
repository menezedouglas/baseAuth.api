<?php

namespace App\Services;

use App\Contracts\Service;
use App\Exceptions\User\UserNotFoundException;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserService implements Service
{

    public static function query(): Builder
    {
        return User::query();
    }

    public function all(): Collection|array
    {
        return self::query()
            ->get();
    }

    /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
    public function show(int $id): User
    {
        /**
         * @var User|null $user
         */
        if(!$user = self::query()->find($id))
            throw new UserNotFoundException();

        return $user;
    }

    public function create(string $name, string $email, string $password): User
    {
        $user = new User();

        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);

        $user->save();

        return $user;
    }

    /**
     * @param int $userId
     * @param string|null $name
     * @param string|null $email
     * @return User
     * @throws UserNotFoundException
     */
    public function update(int $userId, ?string $name = null, ?string $email = null): User
    {
        $user = $this->show($userId);

        $user->name = $name ?? $user->name;
        $user->email = $email ?? $user->email;

        $user->save();

        return $user;
    }

    /**
     * @param int $userId
     * @return void
     * @throws UserNotFoundException
     */
    public function delete(int $userId): void
    {
        $user = $this->show($userId);

        $user->delete();
    }

}
