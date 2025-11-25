<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voter extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'course'];

    protected $hidden = ['password'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }
}