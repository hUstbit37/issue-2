<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['country'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
