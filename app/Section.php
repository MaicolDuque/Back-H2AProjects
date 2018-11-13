<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'description', 'order', 'project_id'];
}
