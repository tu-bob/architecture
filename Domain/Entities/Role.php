<?php

declare(strict_types=1);

namespace Domain\Entities;

use Domain\Collections\UserCollection;
use Domain\Entities\Contracts\EntityWithTimestamps;
use Domain\Entities\Traits\Timestamps;

class Role implements EntityWithTimestamps
{
    use Timestamps;

    public function __construct(
        private ?int $id = null,
        private string $name = '',
        private UserCollection $userCollection = new UserCollection()
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

    public function getUserCollection(): UserCollection
    {
        return $this->userCollection;
    }

    public function setUserCollection(UserCollection $userCollection): void
    {
        $this->userCollection = $userCollection;
    }
}
