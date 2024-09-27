<?php

declare(strict_types=1);

namespace Mappers;

use Entities\Role;
use Models\Role as RoleModel;

class RoleMapper
{
    public function toEntity(RoleModel $model): Role
    {
        return new Role(
            id: $model->id,
            name: $model->name
        );
    }

    public function toModel(Role $entity): RoleModel
    {
        $model = new RoleModel();
        $model->id = $entity->getId();
        $model->name = $entity->getName();

        $model->exists = $entity->getId() !== null;

        return $model;
    }
}
