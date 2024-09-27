<?php

declare(strict_types=1);

namespace Repositories;

use Domain\Entities\Role;
use Mappers\RoleMapper;
use Models\Role as RoleModel;

class RoleRepository
{
    public function __construct(
        private readonly RoleMapper $roleMapper
    ) {
    }

    public function findByName(string $name): ?Role
    {
        $role = RoleModel::where('name', $name)->first();

        if ($role === null) {
            return null;
        }

        return $this->roleMapper->toEntity($role);
    }
}
