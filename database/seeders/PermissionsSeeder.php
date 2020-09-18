<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
						'client-list',
						'client-create',
						'client-edit',
						'client-delete',
						'employee-list',
						'employee-create',
						'employee-edit',
						'employee-delete',
						'user-manage',
						];
		foreach ($permissions as $permission) {

		       DB::table('permissions')->insert([
		            'name' => $permission, 'guard_name' => 'web',
		        ]);
		    }
    }
}
