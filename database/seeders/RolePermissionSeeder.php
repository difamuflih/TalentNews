<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
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
        
        $category = Category::create([
            'category' => 'Sport',
            'slug' => Str::slug('category'),
            'icon' => 'sport.jpg',
        ]);
        
        $news = News::create([
            'title' => 'Klasemen Akhir Piala AFF U-19 2024',
            'slug' => Str::slug('title'),
            'news' => 'Jakarta - Berikut klasemen akhir Piala AFF U-19 2024, yang sekaligus menandai berakhirnya fase grup. Indonesia, Australia, dan Malaysia ke semifinal sebagai juara grup.
                        Dari Grup A, Timnas Indonesia U-19 berhasil sapu bersih kemenangan dengan meraup poin sempurna berupa 9 angka.
                        Di Grup B Piala AFF U-19 2024, Australia juga berhasil merangkai tiga kemenangan dari pertandingannya untuk menyudahi fase grup dengan 9 poin.',
            'category_id' => '1',
            'user_id' => '1',
            'photo' => 'aff.jpg',
        ]);

        $user->assignRole($adminRole);
    }
}
