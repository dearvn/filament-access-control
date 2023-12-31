<?php

declare(strict_types=1);

namespace Dearvn\FilamentAccessControl\Policies;

use Dearvn\FilamentAccessControl\Enumerators\PermissionName;
use Illuminate\Contracts\Auth\Access\Authorizable;

class RolePolicy
{
    public function viewAny(Authorizable $user): bool
    {
        return $user->can(PermissionName::UPDATE_PERMISSIONS);
    }

    public function view(Authorizable $user): bool
    {
        return $user->can(PermissionName::UPDATE_PERMISSIONS);
    }

    public function create(Authorizable $user): bool
    {
        return $user->can(PermissionName::UPDATE_PERMISSIONS);
    }

    public function update(Authorizable $user): bool
    {
        return $user->can(PermissionName::UPDATE_PERMISSIONS);
    }

    public function delete(Authorizable $user): bool
    {
        return $user->can(PermissionName::UPDATE_PERMISSIONS);
    }

    public function restore(Authorizable $user): bool
    {
        return $user->can(PermissionName::UPDATE_PERMISSIONS);
    }

    public function forceDelete(Authorizable $user): bool
    {
        return $user->can(PermissionName::UPDATE_PERMISSIONS);
    }
}
