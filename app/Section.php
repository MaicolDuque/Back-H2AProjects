<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'description', 'order', 'project_id'];

    public function tasks(){
        return $this->hasMany('App\Task');
    }

    public function project(){
        //return "aca";
        return $this->belongsTo('App\Project');
    }
}
