<?php

declare(strict_types=1);

namespace Domain\Entities;

use Domain\Entities\Contracts\EntityWithTimestamps;
use Domain\Entities\Traits\Timestamps;

class User implements EntityWithTimestamps
{
    use Timestamps;

    public function __construct(
        private ?int $id = null,
        private string $name = '',
        private string $email = '',
        private ?Role $role = null
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): void
    {
        $this->role = $role;
    }
}
