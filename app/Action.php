<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{

    protected $fillable = [
        'action_name', 'user_id'
    ];


    protected $hidden = [];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
