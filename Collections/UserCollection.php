<?php

declare(strict_types=1);

namespace Collections;

use Entities\User;

class UserCollection implements \Iterator
{
    /**
     * @var User[]
     */
    private array $items = [];

    public function current(): ?User
    {
        return current($this->items);
    }

    public function next(): void
    {
        next($this->items);
    }

    public function key(): string
    {
        return key($this->items);
    }

    public function valid(): bool
    {
        return key($this->items) !== null;
    }

    public function rewind(): void
    {
        reset($this->items);
    }
}
