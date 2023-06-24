<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'editor']);
        Role::create(['name' => 'user']);

        // Create permissions
        Permission::create(['name' => 'create subcategory']);
        Permission::create(['name' => 'edit subcategory']);
        Permission::create(['name' => 'delete subcategory']);

        // Assign permissions to roles
        $adminRole = Role::findByName('admin');
        $adminRole->givePermissionTo('create subcategory');
        $adminRole->givePermissionTo('edit subcategory');
        $adminRole->givePermissionTo('delete subcategory');

        $editorRole = Role::findByName('editor');
        $editorRole->givePermissionTo('create subcategory');
        $editorRole->givePermissionTo('edit subcategory');

        $userRole = Role::findByName('user');
        $userRole->givePermissionTo('create subcategory');
    }
}
