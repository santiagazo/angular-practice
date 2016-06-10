<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function priority()
    {
    	return $this->hasOne('App\Priority');
    }
}
