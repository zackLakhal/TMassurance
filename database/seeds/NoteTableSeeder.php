<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 30; $i++) { 
            DB::table('notes')->insert([
                'titre' => 'titre de la note '.$i,
                'user_id' => rand(1,20),
                'project_id' => rand(1,6),
                'note' => ':krsb jfkrb hbvrjh lfer bhjfj hrb flherblfhjr mzkde '
            ]);
        }
    }
}
