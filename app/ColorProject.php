<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorProject extends Model
{
    protected $fillable = ['value', 'description'];
    public function projects(){
        return $this->hasMany('App\Project', 'color_id');
    }
}
