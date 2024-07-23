<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
