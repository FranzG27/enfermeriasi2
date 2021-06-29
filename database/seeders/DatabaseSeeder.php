<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'nurse']);
        Role::create(['name'=>'patient']);

        DB::table('users')->insert([
            [
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'role_id'=>'1',
            'password'=>Hash::make('12345678'),
            'gender'=>'Hombre',
            ],
        ]);
    }
}
