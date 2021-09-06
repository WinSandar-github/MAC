<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('local_foreigns')->delete();

        DB::table('local_foreigns')->insert([
            array(
                'name' => 'Local'
            ),
            array(
                'name' => 'Foreign'
            ),

        ]);

    }
}
