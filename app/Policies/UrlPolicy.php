<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Url;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UrlPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Url $url): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }
}
