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

    

    
}
