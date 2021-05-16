<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TachTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 30; $i++) { 
            DB::table('taches')->insert([
                'titre' => 'titre de la tache '.$i,
                'statut' => 'statut '. rand(1,5),
                'user_id' => rand(1,20),
                'project_id' => rand(1,6),
                'description' => ':krsb jfkrb hbvrjh lfer bhjfj hrb flherblfhjr mzkde ',
                'dateEcheance' => Carbon::now()->addDays(rand(7,15))
            ]);
        }
    }
}
