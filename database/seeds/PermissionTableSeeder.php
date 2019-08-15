<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $availablePermission=['create','edit','delete','update'];

        for ($i=0; $i<4; $i++){
            Permission::create([
                'name'=> $availablePermission[$i],
                'guard_name'=> 'api'
            ]);
        }
    }
}
