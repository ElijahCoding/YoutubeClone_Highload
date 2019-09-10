<?php

namespace App;

use App\{Model, User};

class Channel extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
