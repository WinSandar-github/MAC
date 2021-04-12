<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Training_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('training_types')->insert([
            array(
                'training_type_name' => 'Type 1'
            ),
            array(
                'training_type_name' => 'Type 2'
            ),
            array(
                'training_type_name' => 'Type 3'
            ),
        ]);
    }
}
