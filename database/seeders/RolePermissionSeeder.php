<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRole = Role::create([
            'name' => 'admin' 
        ]);
        
        $creatorRole = Role::create([
            'name' => 'creator' 
        ]);
        
        $userRole = Role::create([
            'name' => 'user' 
        ]);

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123123')
        ]);

        $user->assignRole($adminRole);
    }
}
