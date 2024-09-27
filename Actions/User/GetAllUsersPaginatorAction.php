<?php

namespace Actions\User;

use Domain\Paginators\UserPaginator;
use Repositories\UserPaginatorRepository;

class GetAllUsersPaginatorAction
{
    public function __construct(
        private readonly UserPaginatorRepository $userRepository
    ) {
    }

    public function act(int $page, int $perPage): UserPaginator
    {
        return $this->userRepository->all($page, $perPage);
    }
}
