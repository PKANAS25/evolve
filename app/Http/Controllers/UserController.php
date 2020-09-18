<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Permissions;

use Session;
use Crypt;

class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$users = User::with('roles')->get();
        return view('user.index',compact('users'));
    }

    public function edit($user)
    {
    	 $user_id = Crypt::decrypt($user);  

    	 $user = User::where('id',$user_id)->first();

    	 $user_role = User::find($user_id)->roles()->select('name')->get();		 

		 $user_roles = array(); 
		 foreach($user_role as $role)
		 array_push($user_roles, $role->name); 

		 $all_roles = Role::select('id','name')->get();

         return view('user.edit',compact('user','user_roles','all_roles'));
    }

    public function update(Request $request)
    {
    	 $this->validate($request, [
		'name' => 'required', 
		]);

    	 $user_id = $request->input('id');
    	 $user_name = $request->input('name');

    	 $user = User::find($user_id);
    	 
    	 $user->name=$user_name;
    	 $user->save();
    	  
    	 $user->syncRoles($request->input('roles'));

    	 $users = User::with('roles')->get(); 	 

         session()->flash('success','User has been editted successfully');
         return redirect()->route('users/list',compact('users'));    
    }

    public function delete(Request $request)
    {
    	$user_id = $request->input('id');
    	$user_name = $request->input('name');
    	$msg = 'User '.$user_name.' has been deleted successfully';

    	User::destroy($user_id);

    	$users = User::with('roles')->get(); 	
    	session()->flash('success',$msg);
        return redirect()->route('users/list',compact('users')); 
    }

    public function trashedIndex()
    {
    	$users = User::onlyTrashed()->get();
        return view('user.trashed',compact('users'));
    }

    public function restore(Request $request)
    {
    	$user_id = $request->input('id');
    	$user_name = $request->input('name');
    	$msg = 'User '.$user_name.' has been restored successfully';

    	User::withTrashed()->where('id', $user_id)->restore();

    	$users = User::with('roles')->get(); 	
    	session()->flash('success',$msg);
        return redirect()->route('users/list',compact('users')); 
    }
}
