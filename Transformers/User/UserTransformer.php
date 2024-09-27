<?php

use Domain\Entities\User;

class UserTransformer
{
    public function transform(User $user): array
    {
        return [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'role' => $user->getRole()?->getName(),
        ];
    }
}
