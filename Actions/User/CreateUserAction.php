<?php

declare(strict_types=1);

namespace Actions\User;

use Domain\Entities\User;
use Repositories\RoleRepository;
use Repositories\UserRepository;

class CreateUserAction
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly RoleRepository $roleRepository,
    ) {
    }

    public function act(User $user, string $role = 'viewer'): User
    {
        $user = $this->userRepository->save($user);

        $role = $this->roleRepository->findByName($role);
        $this->userRepository->attachRole($user, $role);
        $user->setRole($role);

        return $user;
    }
}
