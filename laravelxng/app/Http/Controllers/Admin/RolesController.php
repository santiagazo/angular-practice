<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Input;
use Flash;
use DB;


class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function getIndex(Request $request)
    {
        $roles = Role::query();

        $role_id = $request->role_id ?: NULL;
        $name = $request->name ?: NULL;
        $permission = $request->permission ?: NULL;

        if ($role_id) {
            $roles = $roles->where('id', $role_id);
        }
        if ($name) {
            $roles = $roles->whereRaw('name LIKE "%' . $name . '%"');
        }
        if ($permission) {
            $roles = $roles->where('permission', 'LIKE', '%'.$permission.'%');
        }

        $roles = $roles->paginate(25);

        return view('admin.roles.index')
        ->with('roles', $roles)
        ->with('role_id', $role_id)
        ->with('name', $name)
        ->with('permission', $permission);
    }

    public function getEdit($id=NULL)
    {
        if($id){
            $role = Role::findOrFail($id);
        }else{
            $role = Role::create();
        }

        $roles = Role::all();

        $permissions = Permission::all();

        $permissionsArray = [];
        foreach($permissions as $permission){
           $permissionsArray[($permission->name)] = $permission->name;
        }

        return view('admin.roles.edit')
            ->with('roles', $roles)
            ->with('role', $role)
            ->with('permissionsArray', $permissionsArray);
    }

    public function getCreate()
    {
        $role = new Role;
        $role->save();

        Flash::success("New unnamed role created (ID: ".$role->id."). Add a name and then add the permissions.");

        return redirect('admin/roles/edit/'.$role->id);
    }

    public function postAddrole(Request $request)
    {
        $role_name = $request->role_name;

        $roleExists = Role::where('name', $role_name)->first();

        if($roleExists){
            Flash::error('Oops! That role already exists.');
            return back();
        }

        $role = Role::findOrFail($request->role_id);
        $role->name = $role_name;
        $role->save();

        Flash::success($role->name." role updated.");

        return redirect('admin/roles/edit/'.$role->id);
    }

    // public function postEditrolename(Request $request)
    // {
    //     $role_id = $request->role_id ?: NULL;
    //     $role_name = $request->role_name ?: NULL;

    //     $role = Role::findOrFail($role_id);

    //     if(empty($role)){
    //         Flash::error('Hmm... Something wen\'t wrong. Please refresh and try again.');
    //         return back();
    //     }

    //     $role->name = $role_name;
    //     $role->save();

    //     Flash::success('The role name has been updated successfully to '.$role_name.'.');

    //     return back();
    // }

    // public function getAddpermission($permission)
    // {
    // 	$permissionExists = Permission::where('name', $permission)->first();

    // 	if($permissionExists){
    // 		Flash::error('Oops! That permission already exists.');
    // 		return redirect('/roles/index');
    // 	}

    // 	$permission = Permission::create([ 'name' => $permission]);

    // 	Flash::success($permission->name." permission created.");

    // 	return redirect('admin/roles');
    // }

    public function postGiverolepermission(Request $request)
    {
        $permission_name = $request->permission_name ?: NULL;
        $role_id = $request->role_id ?: NULL;

        $role = Role::findOrFail($role_id);

        if($role->hasPermission($permission_name)){
            $jsFlash = ['priority' => 'danger', 'message' => 'Oops, '.$role->name.' already has the '.$permission_name.' permission.'];
            return json_encode($jsFlash);
        }

        if(empty($permission_name) OR empty($role)){
            $jsFlash = ['priority' => 'danger', 'message' => 'Hmm... Something went wrong. Please refresh and try again.'];
            return json_encode($jsFlash);
        }

        $role->givePermissionTo($permission_name);

        return json_encode($permission_name);
    }

    // public function getGiverolepermission($role, $permission)
    // {
    // 	$role = Role::where('name', $role)->firstOrFail();

    // 	$role->givePermissionTo($permission);

    // 	Flash::success($permission." role added to ".$role->name.'.');

    // 	return back();
    // }

    public function getDelete($identifier, $role)
    {
        if($role == 'Super User' || $role == 1 || $role == 'User' || $role == 10){
            Flash::error('That role cannot be deleted.');
            return back();
        }

        if(!Auth::user()->hasRole('Super Administrator')){
            Flash::error('You do not have permission to delete this record.');
            return back();
        }

    	$role = Role::where($identifier, $role)->first();

    	$this->destroyRole($role);

    	Flash::success($role->name.' and all associated permissions have been deleted.');

    	return redirect('admin/roles/index');
    }

    // public function getGiveuserrole($username, $role)
    // {
    //     $user = User::where('username', $username)->first();

    //     if(empty($user)){
    //         Flash::error('Oops! There\'s no user by that username.');
    //     }

    //     $user->assignRole($role);

    //     Flash::success($user->username." is now listed as a ".$role.'.');

    //     return redirect('admin/roles');
    // }

    public function postGiveuserrole(Request $request)
    {
        $user_id = $request->user_id ?: NULL;
        $role_name = $request->role_name ? str_replace('_', ' ', $request->role_name) : NULL;
        $user = User::findOrFail($user_id);

        if($user->hasRole($role_name)){
            $jsFlash = json_encode(['priority'=>'danger', 'message'=>'Oops! The user already has the '.$role_name.' role.']);
            return $jsFlash;
        }

        if(empty($user) OR empty($role_name)){
            $jsFlash = json_encode(['priority'=>'danger', 'message'=>'Oops! Something went wrong. Maybe refresh and try again.']);
            return $jsFlash;
        }

        $user->assignRole($role_name);

        return json_encode($role_name);
    }

    public function postRemoveuserrole(Request $request)
    {
        $username = $request->username ?: NULL;
        $role_name = $request->role_name ? str_replace('_', ' ', $request->role_name) : NULL;

        $user = User::where('username', $username)->first();

        if(empty($user) OR empty($role_name)){
            $jsFlash = json_encode(['priority'=>'danger', 'message'=>'Oops! Something went wrong. Maybe refresh and try again.']);
            return $jsFlash;
        }

        $user->removeRole($role_name);
        $role_name = str_replace(' ', '_', $request->role_name);

        return json_encode($role_name);
    }

    // public function getRemoveuserrole($username, $role)
    // {
    //     $user = User::where('username', $username)->first();

    //     if(empty($user)){
    //         Flash::error('Oops! There\'s no user by that username.');
    //     }

    //     $user->removeRole($role);

    //     Flash::success($user->username." no longer has the ".$role.' role.');

    //     return back();
    // }

    public function getRemovepermission($id, $permission)
    {
        $role = Role::findOrFail($id);
        $permission = Permission::where('name', $permission)->first();

        if(empty($permission) || empty($role)){
            Flash::error('Oops! There\'s no permission associated with that role.');
        }

        $role->revokePermissionTo($permission);

        Flash::success('The '.$role->name.' role can no longer '.$permission->name.'.');

        return back();
    }

    private function destroyRole($role)
    {
    	DB::table('role_has_permissions')->where('role_id', $role->id)->delete();

    	$role->delete();
    }


}
