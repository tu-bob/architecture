<?php

namespace Repositories;

use Domain\Paginators\UserPaginator;
use Mappers\UserMapper;
use Models\User as UserModel;

class UserPaginatorRepository
{
    public function __construct(
        private readonly UserMapper $userMapper
    ) {
    }

    public function all(int $page, int $perPage): UserPaginator
    {
        $users = UserModel::simplePaginate($perPage, ['*'], 'page', $page);

        $entities = $users->map(fn($model) => $this->userMapper->toEntity($model));

        return new UserPaginator($entities, $users->currentPage(), $users->lastPage());
    }
}
