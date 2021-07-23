<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_types')->insert([
            array(
                'name'  => "Diploma in Accountancy (DA)",
            ),
            array(
                'name'  => "Certified Public Accountant (CPA)",
            ),
        ]);
    }
}
