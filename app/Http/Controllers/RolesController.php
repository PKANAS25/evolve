<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Permissions;

use Session;
use Crypt;

class RolesController extends Controller
{
   public function __construct()
    {
        $this->middleware(['auth','permission:role-manage']);
    }

    public function index()
    {
		$roles = Role::with('permissions')->get();
        return view('roles.index',compact('roles'));
    }

    public function create()
    {
    	 $permissions = Permissions::select('id','name')->get();
         return view('roles.add',compact('permissions'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
		'name' => 'required|unique:roles,name',
		'permissions' => 'required',
		]);


		$role = Role::create(['name' => $request->input('name')]);
		
		$role->syncPermissions($request->input('permissions'));
		
		$roles = Role::with('permissions')->get();
		

		session()->flash('success','A new role has been created successfully');
        return redirect()->route('users/roles',compact('roles'));        
    }

    public function delete(Request $request)
    {
    	$role_id = $request->input('id');
    	$role_name = $request->input('name');
    	$msg = $role_name.' role has been deleted successfully';

    	Role::destroy($role_id);

    	$roles = Role::with('permissions')->get();
    	session()->flash('success',$msg);
        return redirect()->route('users/roles',compact('roles'));
    }

    public function edit($role)
    {
    	 $role_id = Crypt::decrypt($role);  

    	 $role = Role::where('id',$role_id)->first();

    	 $role_permission = Role::find($role_id)->permissions()->select('name')->get();		 

		 $role_permissions = array(); 
		 foreach($role_permission as $permission)
		 array_push($role_permissions, $permission->name); 

		 $all_permissions = Permissions::select('id','name')->get();

         return view('roles.edit',compact('role','role_permissions','all_permissions'));
    }

    public function update(Request $request)
    {
    	 $this->validate($request, [
		'name' => 'required|min:4|unique:roles,name,' . $request->input('id'), 
		'permissions' => 'required',
		]);

    	 $role_id = $request->input('id');
    	 $role_name = $request->input('name');

    	 $role = Role::find($role_id);
    	 
    	 $role->name=$role_name;
    	 $role->save();
    	  
    	 $role->syncPermissions($request->input('permissions'));

    	 $roles = Role::with('permissions')->get();	 

         session()->flash('success','Role has been editted successfully');
         return redirect()->route('users/roles',compact('roles'));    
    }
}
