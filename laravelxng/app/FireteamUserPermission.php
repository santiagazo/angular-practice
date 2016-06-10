<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FireteamUserPermission extends Model
{
    public $timestamps = false;
    protected $table = 'fireteam_user_permission';
    protected $fillable = ['fireteam_user_id', 'permission_id'];

    public function fireteamUsers()
    {
    	return $this->belongsTo('App\FireteamUser', 'fireteam_user.id', 'fireteam_user_id');
    }

    public function permissions(){
    	return $this->belongsTo('Spatie\Permission\Models\Permission', 'permissions.id', 'permission_id');
    }
}
