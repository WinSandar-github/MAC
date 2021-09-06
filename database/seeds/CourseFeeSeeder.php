<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CourseFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_fees')->delete();

        DB::table('course_fees')->insert([
            array(
                'form_fee'  => 1000,
                'nrc_fee'   => 30000
            ),
            array(
                'form_fee'  => 1000,
                'nrc_fee'   => 10000
            ),
            array(
                'form_fee'  => 1000,
                'nrc_fee'   => 100000
            ),
            array(
                'form_fee'  => 1000,
                'nrc_fee'   => 300000
            ),


        ]);
    }
}
