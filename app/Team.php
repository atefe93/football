<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'user_id', 'name'
    ];
    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
