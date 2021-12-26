<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Domain\UserRepositoryInterface;
use App\Http\Requests\User\RegisterData;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function save(RegisterData $data): User
    {
        return User::create([
            'name' => $data->getName(),
            'email' => $data->getEmail(),
            'password' => $data->getHash()
        ]);
    }

    public function saveToken(User $user): string
    {
        return $user->createToken('unit-auto_token')->plainTextToken;
    }

    public function getByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function deleteTokens(User $user): void
    {
        $user->tokens()->delete();
    }
}