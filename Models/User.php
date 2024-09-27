<?php

declare(strict_types=1);

namespace Models;

class User
{
    public function role()
    {
        return $this->hasOne(Role::class);
    }
}