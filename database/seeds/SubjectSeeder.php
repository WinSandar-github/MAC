<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();

        DB::table('subjects')->insert([
            //da one
            array(
                'subject_name'  => 'Economics',
                'course_id'     => 1,
                'module_id'     => 1,
                'sr_no'         => 1
            ),
            array(
                'subject_name'  => 'Accontancy',
                'course_id'     => 1,
                'module_id'     => 1,
                'sr_no'         => 2
            ),
            array(
                'subject_name'  => 'Statistics',
                'course_id'     => 1,
                'module_id'     => 1,
                'sr_no'         => 3
            ),
            array(
                'subject_name'  => 'Knowledge',
                'course_id'     => 1,
                'module_id'     => 2,
                'sr_no'         => 4
            ),
            array(
                'subject_name'  => 'Commercial Laws',
                'course_id'     => 1,
                'module_id'     => 2,
                'sr_no'         => 5
            ),
            //da two
            array(
                'subject_name'  => 'Accounting',
                'course_id'     => 2,
                'module_id'     => 1,
                'sr_no'         => 1
            ),
            array(
                'subject_name'  => 'Auditing ',
                'course_id'     => 2,
                'module_id'     => 1,
                'sr_no'         => 2
            ),
            array(
                'subject_name'  => 'Costing Accounting',
                'course_id'     => 2,
                'module_id'     => 1,
                'sr_no'         => 3
            ),
            array(
                'subject_name'  => 'Financial Reporting ',
                'course_id'     => 2,
                'module_id'     => 2,
                'sr_no'         => 4
            ),
            array(
                'subject_name'  => 'Financial and Service Regulations',
                'course_id'     => 2,
                'module_id'     => 2,
                'sr_no'         => 5
            ),
            array(
                'subject_name'  => 'Information & Communication Technology and Systems Development',
                'course_id'     => 2,
                'module_id'     => 2,
                'sr_no'         => 6
            ),
            //cpa one
            array(
                'subject_name'  => 'Professional Financial Accounting & External Reporting -I',
                'course_id'     => 3,
                'module_id'     => 1,
                'sr_no'         => 1
            ),
            array(
                'subject_name'  => 'Practical Auditing -I',
                'course_id'     => 3,
                'module_id'     => 1,
                'sr_no'         => 2
            ),
            array(
                'subject_name'  => 'Performance and Financial Management',
                'course_id'     => 3,
                'module_id'     => 1,
                'sr_no'         => 3
            ),
            array(
                'subject_name'  => 'Business Environment and Management',
                'course_id'     => 3,
                'module_id'     => 2,
                'sr_no'         => 4
            ),
            array(
                'subject_name'  => 'Commercial and Industrial Laws',
                'course_id'     => 3,
                'module_id'     => 2,
                'sr_no'         => 4
            ),
            array(
                'subject_name'  => 'Financial and Services Regulations',
                'course_id'     => 3,
                'module_id'     => 2,
                'sr_no'         => 5
            ),
            //cpa two
            array(
                'subject_name'  => 'Advanced Accounting & Financial Reporting II',
                'course_id'     => 4,
                'module_id'     => 1,
                'sr_no'         => 1
            ),
            array(
                'subject_name'  => 'Practical Auditing -II',
                'course_id'     => 4,
                'module_id'     => 1,
                'sr_no'         => 2
            ),
            array(
                'subject_name'  => 'Strategic Management Accounting',
                'course_id'     => 4,
                'module_id'     => 1,
                'sr_no'         => 3
            ),
            array(
                'subject_name'  => 'Business Analysis and Strategic Information System',
                'course_id'     => 4,
                'module_id'     => 2,
                'sr_no'         => 4
            ),
            array(
                'subject_name'  => 'Financial Knowledge and Current Economic Affairs',
                'course_id'     => 4,
                'module_id'     => 2,
                'sr_no'         => 5
            ),
            array(
                'subject_name'  => 'Taxation',
                'course_id'     => 4,
                'module_id'     => 2,
                'sr_no'         => 6
            ),
        ]);

            
    }
}
