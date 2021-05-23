<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HistoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 30; $i++) { 
            DB::table('historiques')->insert([
                'action' => 'action'.$i,
                'composante' => 'statut '. rand(1,5),
                'user_id' => rand(1,20),
                'project_id' => rand(1,6),
                'created_at' => Carbon::now()->addDays(rand(7,15))
            ]);
        }
    }
}
