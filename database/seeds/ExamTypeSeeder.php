<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ExamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exam_types')->delete();

        DB::table('exam_types')->insert([
            array(
                'name' => 'Courses'
            ),
            array(
                'name' => 'Entrance Exam'
            ),
            

        ]);
    }
}
