<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'description', 'color_id'];

    public function color(){
        //return "aca";
        return $this->belongsTo('App\ColorProject');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group', 'group_projects');
    }

    public function sections(){
        return $this->hasMany('App\Section');
    }

    

    
}
