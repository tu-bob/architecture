<?php

declare(strict_types=1);

namespace Models;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
