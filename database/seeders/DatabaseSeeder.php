<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name'=>'mike3',
            'email'=>'mike3@mike.mike',
            'password'=>bcrypt('mikemike'),
            'is_admin'=>0,
        ]);

        User::create([
            'name'=>'admin',
            'email'=>'admin@admin.pl',
            'password'=>bcrypt('adminadmin'),
            'is_admin'=>1,
        ]);
    }
}
