<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompagniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 11; $i++) { 
            DB::table('compagnies')->insert([
                
                'nom' => "compagnie".$i,
                'email' => "compagnie".$i."@gmail.com",
                'tel' => "6545464654",
                'adresse' => 'Hay nahda 1 n° 646 temara',
                'logo' => 'images/small/img-5.jpg'
            ]);
        }
    }
}
