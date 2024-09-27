<?php

namespace Domain\Paginators;

use Domain\Collections\UserCollection;

class UserPaginator
{
    public function __construct(
        private readonly UserCollection $users,
        private readonly int $currentPage,
        private readonly int $lastPage
    ) {
    }

    public function getUsers(): UserCollection
    {
        return $this->users;
    }

    public function currentPage(): int
    {
        return $this->currentPage;
    }

    public function lastPage(): int
    {
        return $this->lastPage;
    }
}
