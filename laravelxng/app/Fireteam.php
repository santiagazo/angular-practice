<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fireteam extends Model
{
	protected $fillable = [
		'user_id',
		'title',
		'slug',
	];

    public function leader()
    {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }

    public function fireteam_user_permissions()
    {
        return $this->hasManyThrough('App\FireteamUserPermission', 'App\FireteamUser');
    }
}
