<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DocTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 30; $i++) { 
            DB::table('documents')->insert([
                'nom' => 'doument '.$i,
                'type' => "pdf",
                'size' =>  rand(16.00,100.00),
                'ext' => 'pdf',
                'path' => 'documents/placeholder.pdf',
                'project_id' => rand(1,6),
                'created_at' => Carbon::now()
            ]);
        }
    }
}
