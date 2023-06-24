<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\RemoteFile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRole = Role::findByName('admin'); // Replace with your admin role name


        for ($i = 2; $i <= 5; $i++) {
            $admin = User::create([
                'name' => 'admin ' . $i,
                'email' => 'admin' . $i . '@yopmail.com',
                'password' => Hash::make('password'),
            ])->assignRole($adminRole);


        }
        $adminRole = Role::findByName('user'); // Replace with your user role name

        for ($i = 1; $i <= 100; $i++) {
            $user = User::create([
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@yopmail.com',
                'password' => Hash::make('password'),
            ])->assignRole($adminRole);

        }
    }
}
