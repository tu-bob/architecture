<?php

declare(strict_types=1);

namespace Models;

class Role
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}