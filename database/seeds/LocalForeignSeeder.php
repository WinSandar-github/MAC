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
        DB::table('modules')->delete();

        DB::table('modules')->insert([
            array(
                'name' => 'Module-1'
            ),
            array(
                'name' => 'Module-2'
            ),
            array(
                'name' => 'All Module'
            )

        ]);
    }
}
