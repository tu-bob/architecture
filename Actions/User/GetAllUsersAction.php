<?php

declare(strict_types=1);

namespace Actions\User;

use Domain\Collections\UserCollection;
use Repositories\UserRepository;

class GetAllUsersAction
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    public function act(): UserCollection
    {
        return $this->userRepository->all();
    }
}
