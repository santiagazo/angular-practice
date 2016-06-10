<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function transaction()
    {
    	return $this->belongsTo('App\Transaction');
    }

}
