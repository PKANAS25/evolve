<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
						'client-view',
						'client-create',
						'client-edit',
						'client-delete',
						'employee-view',
						'employee-create',
						'employee-edit',
						'employee-delete',
						'user-manage',
						'role-manage',
						];
		foreach ($permissions as $permission) {

		       DB::table('permissions')->insert([
		            'name' => $permission, 'guard_name' => 'web',
		        ]);
		    }
    }
}
