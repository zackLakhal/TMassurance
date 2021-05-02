<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 21; $i++) { 
            DB::table('users')->insert([
                'name' => 'user' . $i,
                'email' => 'user' . $i . '@demo.com',
                'password' => Hash::make('123456'),
                'nom' => 'nom' . $i,
                'prenom' => 'prenom' . $i,
                'sexe' => 'Male',
                'group_id' => rand(1, 5),
                'tel' => rand(10000000, 99999999),
                'role_id' => rand(1, 5),
            ]);
        }
    }
}
