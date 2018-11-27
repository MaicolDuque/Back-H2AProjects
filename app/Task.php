<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'name', 'description', 'duration','archived', 'priority', 'state_id', 'section_id', 'user_id', 'fecha_fin'
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }

    public function state(){
        return $this->hasOne('App\State');
    }
}
