<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StatutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $stats = ["Clients",
       "Appels",
       "Rappels",
       "NRP",
       "Promesse",
       "Faux numéro",
       "Réfus",
       "Fiches frigo",
       "Doublons",
       "Fiches à transférées",
       "Fiches transférées",
       "Demande de contrat",
       "Relance j-90(fiches)"];
        for ($i=1; $i < count($stats); $i++) { 
            DB::table('statuts')->insert([
                'crmStatut' => $stats[$i]
            ]);
        }
    }
}
