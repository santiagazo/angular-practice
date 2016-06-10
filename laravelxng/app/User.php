<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Auth;

class User extends Authenticatable
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'social_media_outlet',
        'social_id',
        'name',
        'nickname',
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'email',
        'password',
        'username',
        'avatar',
        'address1',
        'address2',
        'city',
        'state',
        'zip',
        'theme',
        'activation_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function testimonial()
    {
        return $this->hasOne('App\Testimonial');
    }

    public function images()
    {
        return $this->morphMany('App\Image', 'imageable');
    }

    public function actions()
    {
        return $this->belongsToMany('App\Action');
    }

    public function points()
    {
        $points = Point::where('user_id', Auth::id())->get();
        return $points->sum();
    }

    public function fireteams()
    {
        return $this->belongsToMany('App\Fireteam');
    }

    public function fireTeamLeader()
    {
        return $this->hasOne('App\Fireteam');
    }

    public function fireteam_user_permissions()
    {
        return $this->hasMany('App\FireteamUserPermission');
    }

    public function fireteam_user_has_permission_to($requestedPermission)
    {
        $permissions = $this->hasMany('App\FireteamUserPermission');

        $permissionGranted = false;
        foreach ($permissions as $permission) {
            if($permission == $requestedPermission){
                return true;
            }

        return $permissionGranted;
        }
    }
}
