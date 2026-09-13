<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'mission' => 'array',
        ];
    }
}
