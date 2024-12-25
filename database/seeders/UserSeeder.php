<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
    $admin = User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => bcrypt('password')
    ]);
    $admin->assignRole('admin');

    $author = User::create([
        'name' => 'Author User',
        'email' => 'author@example.com',
        'password' => bcrypt('password')
    ]);
    $author->assignRole('author');
    }
}
