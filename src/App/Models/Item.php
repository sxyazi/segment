<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['card_id', 'user_id', 'content'];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
