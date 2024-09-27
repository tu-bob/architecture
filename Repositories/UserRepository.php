<?php

declare(strict_types=1);

namespace Repositories;

use Domain\Collections\UserCollection;
use Domain\Entities\Role;
use Domain\Entities\User;
use Mappers\RoleMapper;
use Mappers\UserMapper;
use Models\User as UserModel;

class UserRepository
{
    public function __construct(
        private readonly UserMapper $userMapper,
        private readonly RoleMapper $roleMapper
    ) {
    }

    public function findById(int $id): ?User
    {
        $model = UserModel::find($id);

        if ($model === null) {
            return null;
        }

        return $this->userMapper->toEntity($model);
    }

    // Laravel save method refreshes the model instance with the database values
    // after the save operation. It is reasonable to return new entity with
    // updated values.
    public function save(User $user): User
    {
        $model = $this->userMapper->toModel($user);
        $model->save();

        return $this->userMapper->toEntity($model);
    }

    public function delete(User $user): void
    {
        $model = $this->userMapper->toModel($user);
        $model->delete();
    }

    public function all(): UserCollection
    {
        $users = UserModel::all()
            ->map(fn($model) => $this->userMapper->toEntity($model))
            ->all();

        return new UserCollection($users);
    }

    public function allWithRoles(): UserCollection
    {
        $users = UserModel::with('role')
            ->get()
            ->map(function (UserModel $model) {
                $role = $this->roleMapper->toEntity($model->role);

                $user = $this->userMapper->toEntity($model);
                $user->setRole($role);

                return $user;
            })->all();

        return new UserCollection($users);
    }

    public function attachRole(User $user, Role $role): void
    {
        $model = $this->userMapper->toModel($user);

        $model->role()->associate($this->roleMapper->toModel($role));
    }
}
