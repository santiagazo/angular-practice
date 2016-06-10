<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    public function action()
    {
    	return $this->belongsTo('App\Action');
    }
}
