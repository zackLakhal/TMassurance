<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 11; $i++) { 
            for ($j=0; $j < 6; $j++) { 
                DB::table('produits')->insert([
                
                    'nom' => "produit ".$j.' de la compagnie '.$i,
                    'prix' => rand(100,999),
                    'compagnie_id' => $i,
                    'description' => 'description du produit '.$j.' de la compagnie '.$i,
                    'logo' => 'images/small/img-5.jpg'
                ]);
            }
        }
    }
}
