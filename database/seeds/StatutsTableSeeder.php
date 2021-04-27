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
        for ($i=1; $i < 16; $i++) { 
            DB::table('statuts')->insert([
                'crmStatut' => 'statuts'.$i
            ]);
        }
    }
}
