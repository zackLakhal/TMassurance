<?php

use Illuminate\Database\Seeder;

class ProspectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) { 
            DB::table('prospects')->insert([
                'email' => 'prospect' . $i . '@demo.com',
                'nom' => 'nom' . $i,
                'prenom' => 'prenom' . $i,
                'tel' => '3455454135' . $i,
                'provenance_id' => rand(1, 5),
                'user_id' => rand(1, 20),
                'is_confirmed' => false,
            ]);
        }
    }
}
