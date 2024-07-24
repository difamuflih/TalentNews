<?php

namespace Database\Seeders;

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
    }
}
