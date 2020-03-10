<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $managerRole = Role::where('name', 'manager')->first();
        $userRole = Role::where('name', 'user')->first();
        $professorRole = Role::where('name', 'professor')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);
        $manager = User::create([
            'name' => 'Manager User',
            'email' => 'manager@manager.com',
            'password' => Hash::make('12345678')
        ]);

        $professor = User::create([
            'name' => 'Professor User',
            'email' => 'professor@professor.com',
            'password' => Hash::make('12345678')
        ]);

        $user = User::create([
            'name' => 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('12345678')
        ]);

        $admin->roles()->attach($adminRole);
        $manager->roles()->attach($managerRole);
        $professor->roles()->attach($professorRole);
        $user->roles()->attach($userRole);
    }
}
