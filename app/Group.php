<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name', 'description'];
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    public function users(){
        return $this->hasMany('App\User');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project', 'group_projects');
    }
}
