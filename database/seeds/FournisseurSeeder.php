<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=6; $i < 60; $i++) { 
            DB::table('fournisseurs')->insert([
                'username' => 'founisseur username'.$i,
                'nom' => 'nom fr '.$i,
                'prenom' => 'prenom fr'.$i,
                'email' => 'fournisseur'.$i.'@gmail.com',
                'provenance_id' => rand(1,6),
                'description' => 'description'.$i,
            ]);
        }
    }
}
