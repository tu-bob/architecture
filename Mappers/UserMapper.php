<?php

declare(strict_types=1);

namespace Mappers;

use Entities\User;
use Models\User as UserModel;

class UserMapper
{
    public function toEntity(UserModel $model): User
    {
        $entity = new User(
            id: $model->id,
            name: $model->name,
            email: $model->email
        );

        return $entity;
    }

    public function toModel(User $entity): UserModel
    {
        $model = new UserModel();
        $model->id = $entity->getId();
        $model->name = $entity->getName();
        $model->email = $entity->getEmail();

        //Laravel uses the following property to distinguish between
        // insert and update operations
        $model->exists = $entity->getId() !== null;

        return $model;
    }
}