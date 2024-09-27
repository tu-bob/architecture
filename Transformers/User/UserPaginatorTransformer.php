<?php

use Domain\Paginators\UserPaginator;

class UserPaginatorTransformer
{
    public function __construct(
        private readonly UserTransformer $userTransformer
    ) {
    }

    public function transform(UserPaginator $userPaginator): array
    {
        $users = [];

        foreach ($userPaginator->getUsers() as $user) {
            $users[] = $this->userTransformer->transform($user);
        }

        return [
            'users' => $users,
            'current_page' => $userPaginator->currentPage(),
            'last_page' => $userPaginator->lastPage()
        ];
    }
}
