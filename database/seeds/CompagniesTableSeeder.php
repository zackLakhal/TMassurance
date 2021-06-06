<?php

use App\Compagnie;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
            $token = "";
       
            do {
                $token ='CP-'. Str::random(12);
            } while (Compagnie::where('token','=',$token)->first());
       
            DB::table('compagnies')->insert([
                
                'nom' => "compagnie".$i,
                'email' => "compagnie".$i."@gmail.com",
                'tel' => "6545464654",
                'adresse' => 'Hay nahda 1 n° 646 temara',
                'token' => $token ,
                'logo' => 'compagnies/av_ph.png'
            ]);
        }
    }
}
