<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PermissionsSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
						'permissionname',
						];
		foreach ($permissions as $permission) {

		       DB::table('permissions')->insert([
		            'name' => $permission, 'guard_name' => 'web',
		        ]);
		    }
    }
}
