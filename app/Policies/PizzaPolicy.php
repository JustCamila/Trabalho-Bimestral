<?php

namespace App\Policies;

use App\Models\Pizza;
use App\Models\User;

class PizzaPolicy
{
    public function update(User $user, Pizza $pizza): bool
    {
        return $user->isAdmin() || $user->isFuncionario();
    }

    public function delete(User $user, Pizza $pizza): bool
    {
        return $user->isAdmin();
    }
}