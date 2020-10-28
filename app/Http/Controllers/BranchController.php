<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Permissions;

use Session;
use Crypt;

class BranchController extends Controller
{
    public function create()
    {    	  
         return view('branches.add');
    }


    public function store()
    {    	  
         return view('branches.add');
    }
}
