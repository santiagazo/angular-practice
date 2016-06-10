<?php

use App\User;

function roleUserSelectList($role)
{
	$users = User::leftJoin('user_has_roles', 'users.id', '=', 'user_has_roles.user_id')
	->join('roles', 'user_has_roles.role_id', '=', 'roles.id')
	->select('users.*')
	->where('roles.name', $role)
	->orWhere('roles.id', $role)
	->lists('users.name', 'users.id')->toArray();

	return $users;
}


function userSelectList($role)
{
	$users = User::lists('users.name', 'users.id')->toArray();

	return $users;
}

