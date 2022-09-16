<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class SuperAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Administrator', 
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('secret')
        ]);
            
        $role = Role::first();
     
        $user->assignRole([$role->id]);
    }
}
