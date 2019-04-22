<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['pro_id' , 'task_name' , 'stage' , 'due_date' , 'task_detail'];
}
