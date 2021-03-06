<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'password'];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
