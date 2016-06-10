<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\FireteamTrait;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\FireteamRequest;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\FireteamUserPermission;
use App\FireteamUser;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Fireteam;
use App\User;
use Session;
use Auth;
use DB;

class FireteamController extends Controller
{
    use FireteamTrait;

    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $id = $request->id ?: NULL;
        $title = $request->title ?: NULL;
        $users = $request->users ?: NULL;
        $leader = $request->leader ?: NULL;


        $fireteams = Fireteam::with('leader')->with('users')->paginate(15);

        return view('admin.fireteams.index')
        ->with('fireteams', $fireteams)
        ->with('id', $id)
        ->with('title', $title)
        ->with('users', $users)
        ->with('leader', $leader);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('admin.fireteams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(FireteamRequest $request)
    {
        $type = $request->type ?: NULL;

        if($type == 'fireteamName'){
            Session::put('fireteam_title', $request->title);
            return json_encode($request->title);
        }

        if($type == 'fireteamMembers'){

            $realtors = $request->realtors ?: NULL;
            $lenders = $request->lenders ?: NULL;
            $title_companies = $request->title_companies ?: NULL;
            $buyers = $request->buyers ?: NULL;
            $sellers = $request->sellers ?: NULL;
            $others = $request->others ?: NULL;

            $fireteam = Fireteam::create([
                'user_id' => Auth::id(),
                'title' => Session::get('fireteam_title'),
                'slug' => str_slug(Session::get('fireteam_title')),
            ]);

            if($realtors){
                $fireteam->users()->attach($realtors);
                $this->createFireteamUserPermissions($realtors, $fireteam->id, 'Realtor');
            }
            if($lenders){
                $fireteam->users()->attach($lenders);
                $this->createFireteamUserPermissions($lenders, $fireteam->id, 'Lender');
            }
            if($title_companies){
                $fireteam->users()->attach($title_companies);
                $this->createFireteamUserPermissions($title_companies, $fireteam->id, 'Title Company');
            }
            if($buyers){
                $fireteam->users()->attach($buyers);
                $this->createFireteamUserPermissions($buyers, $fireteam->id, 'Buyer');
            }
            if($sellers){
                $fireteam->users()->attach($sellers);
                $this->createFireteamUserPermissions($sellers, $fireteam->id, 'Seller');
            }
            if($others){
                $fireteam->users()->attach($others);
                $this->createFireteamUserPermissions($others, $fireteam->id, '');
            }

            // $fireteam = Fireteam::where('id', $fireteam->id)->with('users')->with('leader')->with('fireteam_user_permissions')->first();
            // $permissions = FireteamUserPermission::with('fireteamUsers')->with('permissions')->get();

            $fireteam = Fireteam::where('fireteams.id', $fireteam->id)
            ->select('permissions.id', 'permissions.name', 'users.id as userId', 'users.name as userName')
            ->leftJoin('fireteam_user', 'fireteams.id', '=', 'fireteam_user.fireteam_id')
            ->leftJoin('fireteam_user_permission', 'fireteam_user.id', '=', 'fireteam_user_permission.fireteam_user_id')
            ->leftJoin('permissions', 'fireteam_user_permission.permission_id', '=', 'permissions.id')
            ->join('users', 'fireteam_user.user_id', '=', 'users.id')
            ->get();



            return json_encode($fireteam);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        return view('admin.fireteams.edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        return view('admin.fireteams.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDestroy($id)
    {
        //
    }

    public function getRoleuserselectlist(Request $request){

        $q = $request->q ?: NULL;
        $role = $request->role ?: NULL;

        if(empty($q) || empty($role)){
            return response(['msg' => 'Hmmm. Something went wrong. Please refresh the page and try again.'], 422);
        }

        if($role != "User"){
            $users = User::select('users.*')
            ->leftJoin('user_has_roles', 'users.id', '=', 'user_has_roles.user_id')
            ->join('roles', 'user_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', $role)
            ->where(function ($query) use ($q) {
                    $query->where('users.name', 'LIKE', '%'.$q.'%')
                        ->orWhere('users.id', 'LIKE', '%'.$q.'%')
                        ->orWhere('users.email', 'LIKE', '%'.$q.'%');
                })
            ->with('roles')
            ->groupBy('users.id')
            ->paginate(30);
        }else{
            $users = User::select('users.*')
            ->leftJoin('user_has_roles', 'users.id', '=', 'user_has_roles.user_id')
            ->join('roles', 'user_has_roles.role_id', '=', 'roles.id')
            ->where('users.name', 'LIKE', '%'.$q.'%')
            ->orWhere('users.id', 'LIKE', '%'.$q.'%')
            ->orWhere('users.email', 'LIKE', '%'.$q.'%')
            ->with('roles')
            ->groupBy('users.id')
            ->paginate(30);
        }



        return json_encode($users);

    }

}
