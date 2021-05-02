<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvenancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 6; $i++) { 
            DB::table('provenances')->insert([
                'nom' => 'provenance'.$i,
                'cle' => 'mljzrehfmjrbf'.$i,
                'prix' => rand(100.00,999.99),
                'description' => 'description'.$i,
            ]);
        }
    }
}
