<?php

namespace App\Http\Controllers\Admin;


use App\FireteamUserPermission;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Fireteam;
use App\FireteamUser;

trait FireteamTrait {

	public function createFireteamUserPermissions($role_user_ids, $fireteam_id, $roleName){

		// find all the permissions usually given to a realtor ($role_user_id)
        // then get the line item id of the user on this fireteam
        // then in the fireteam_user_permissions table update it with the line item id and the permissions.

        $role = Role::where('name', $roleName)->with('permissions')->first();
        $permissions = [];
        foreach($role->permissions as $permission){
            $permissions[$permission->id] = $permission->id;
        }

        foreach($role_user_ids as $role_user_id){
            $fireteamUser = FireteamUser::where('user_id', $role_user_id)->where('fireteam_id', $fireteam_id)->first();
            $fireteamUser->permissions()->attach($permissions);
        }
	}

}
