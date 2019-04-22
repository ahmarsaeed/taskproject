<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Subtask extends Model
{
    protected $table = 'subtasks' ;
    protected $fillable = ['task_id' , 'subtask_name' , 'due_date' , 'subtask_detail'];
}
