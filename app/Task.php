<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'task_name', 'action_id', 'mark_done', 'description', 'important', 'user_id'
    ];


    protected $hidden = [];
}
