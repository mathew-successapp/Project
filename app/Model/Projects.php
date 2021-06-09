<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = ['title','description','due_date','status'];
}
