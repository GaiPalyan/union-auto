<?php

declare(strict_types=1);

namespace App\Domain;

use App\Http\Requests\User\RegisterData;
use App\Models\User;

interface UserRepositoryInterface
{
    public function save(RegisterData $user): User;
    public function getByEmail(string $email): ?User;
    public function saveToken(User $user): string;
    public function deleteTokens(User $user): void;
}