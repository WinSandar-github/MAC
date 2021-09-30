<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->delete();

        DB::table('courses')->insert([
            array(
                'name' => "Diploma In Accountancy Part One",
                'form_fee' => 1000,
                'selfstudy_registration_fee' => 15000,
                'privateschool_registration_fee' => 15000,
                'mac_registration_fee' => 15000,
                'exam_fee' => 5000,
                'tution_fee' => 35000,
                'description' => "DA I Course",
                'course_type_id' => 1,
                'code' => 'da_1',
                'requirement_id' => '1,4,5',
                'cpa_subject_fee' =>'30000',
                'da_subject_fee' =>'20000',
            ),
            array(
                'name' => "Diploma In Accountancy Part Two",
                'form_fee' => 1000,
                'selfstudy_registration_fee' => 25000,
                'privateschool_registration_fee' => 25000,
                'mac_registration_fee' => 25000,
                'exam_fee' => 15000,
                'tution_fee' => 25000,
                'description' => "DA II Course",
                'course_type_id' => 1,
                'code' => 'da_2',
                'requirement_id' => '1,4,6',
                'cpa_subject_fee' =>'30000',
                'da_subject_fee' =>'20000',
            ),
            array(
                'name' => "Certified Public Accountant Part One",
                'form_fee' => 1000,
                'selfstudy_registration_fee' => 25000,
                'privateschool_registration_fee' => 25000,
                'mac_registration_fee' => 25000,
                'exam_fee' => 15000,
                'tution_fee' => 25000,
                'description' => "CPA I Course",
                'course_type_id' => 2,
                'code' => 'cpa_1',
                'requirement_id' => '9,11,12',
                'cpa_subject_fee' =>'30000',
                'da_subject_fee' =>'20000',
            ),
            array(
                'name' => "Certified Public Accountant Part Two",
                'form_fee' => 1000,
                'selfstudy_registration_fee' => 25000,
                'privateschool_registration_fee' => 25000,
                'mac_registration_fee' => 25000,
                'exam_fee' => 15000,
                'tution_fee' => 25000,
                'description   ' => "CPA II Course",
                'course_type_id' => 2,
                'code' => 'cpa_2',
                'requirement_id' => '9,11,12',
                'cpa_subject_fee' =>'30000',
                'da_subject_fee' =>'20000',
            ),
        ]);
    }
}
