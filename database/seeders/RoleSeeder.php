<?php

// database/seeders/RoleSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $author = Role::create(['name' => 'author']);

        $createPost = Permission::create(['name' => 'create post']);
        $editPost = Permission::create(['name' => 'edit post']);
        $deletePost = Permission::create(['name' => 'delete post']);

        $admin->givePermissionTo($createPost, $editPost, $deletePost);
        $author->givePermissionTo($createPost, $editPost);
    }
}

