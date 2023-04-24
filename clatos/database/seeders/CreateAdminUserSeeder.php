<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $role = Role::create(['name' => 'Admin']);
        $role = Role::findById(1);
        
        $permissions = Permission::pluck('id', 'id')->all();
        
        $role->syncPermissions($permissions);
        $user = User::create([
            'name' => 'sourabh-Admin',
            'email' => 'adminSJ@gmail.com',
            // 'role_id' =>-1,
            'password' => bcrypt('1234567890')
        ]);

        $user->assignRole([$role->id]);
    }
}
