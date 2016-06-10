<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FireteamUser extends Model
{
    public $timestamps = false;
    protected $table = 'fireteam_user';
    protected $fillable = ['fireteam_id', 'user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function permissions()
    {
    	return $this->belongsToMany('Spatie\Permission\Models\Permission');
    }

    public function fireteam()
    {
    	return $this->belongsTo('App\Fireteam');
    }
}
