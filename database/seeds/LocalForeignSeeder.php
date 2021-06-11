<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LocalForeignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
