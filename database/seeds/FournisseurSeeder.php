<?php

use App\Fournisseur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 7; $i++) { 
            $token = "";
       
            do {
                $token ='FR-'. Str::random(12);
            } while (Fournisseur::where('token','=',$token)->first());
            DB::table('fournisseurs')->insert([
                'nom' => 'nom fr '.$i,
                'token' => $token,
                'email' => 'fournisseur'.$i.'@gmail.com',
                'description' => 'description'.$i,
            ]);
        }
    }
}
