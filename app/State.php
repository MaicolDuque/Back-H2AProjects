<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name', 'description', 'created_at', 'updated_at'
    ];
    public function tasks(){
        return $this->hasMany('App\Task');
    }
}
