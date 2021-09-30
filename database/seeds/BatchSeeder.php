<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;




class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('batches')->delete();

        DB::table('batches')->insert([
            array(
                    'name'                           => 'Batch One',
                    'name_mm'                        => 'အမှတ်စဥ် - ၁',
                    'number'                         => 1,
                    'course_id'                      => 1,
                    'start_date'                     => Carbon::now(),
                    'end_date'                       => Carbon::now()->addMonth(),
                    'mac_reg_start_date'             => Carbon::now(),
                    'mac_reg_end_date'               => Carbon::now()->addMonth(),
                    'self_reg_start_date'            => Carbon::now(),
                    'self_reg_end_date'              => Carbon::now()->addMonth(),
                    'private_reg_start_date'         => Carbon::now(),
                    'private_reg_end_date'           => Carbon::now()->addMonth(),
                    'moodle_course_id'               => 1,
                    'publish_status'                 => 1,
                    'accept_application_start_date'  => Carbon::now(),
                    'accept_application_end_date'    => Carbon::now()->addMonth(),
                    'entrance_pass_start_date'       => Carbon::now(),
                    'entrance_pass_end_date'         => Carbon::now()->addMonth(),
                    'exam_start_date'                => Carbon::now()->addMonth(),
                    'exam_end_date'                  => Carbon::now()->addMonth()->addweek(),
                    'exam_place'                     => "Yangon",
                    'exam_time'                      => "10:00am"
            ),
            array(
                    'name'                           => 'Batch Two',
                    'name_mm'                        => 'အမှတ်စဥ် - ၂',
                    'number'                         => 2,
                    'course_id'                      => 2,
                    'start_date'                     => Carbon::now(),
                    'end_date'                       => Carbon::now()->addMonth(),
                    'mac_reg_start_date'             => Carbon::now(),
                    'mac_reg_end_date'               => Carbon::now()->addMonth(),
                    'self_reg_start_date'            => Carbon::now(),
                    'self_reg_end_date'              => Carbon::now()->addMonth(),
                    'private_reg_start_date'         => Carbon::now(),
                    'private_reg_end_date'           => Carbon::now()->addMonth(),
                    'moodle_course_id'               => 1,
                    'publish_status'                 => 1,
                    'accept_application_start_date'  => Carbon::now(),
                    'accept_application_end_date'    => Carbon::now()->addMonth(),
                    'entrance_pass_start_date'       => Carbon::now(),
                    'entrance_pass_end_date'         => Carbon::now()->addMonth(),
                    'exam_start_date'                => Carbon::now()->addMonth(),
                    'exam_end_date'                  => Carbon::now()->addMonth()->addweek(),
                    'exam_place'                     => "Yangon",
                    'exam_time'                      => "10:00am"
            ),
            array(
                    'name'                         => 'Batch Three',
                    'name_mm'                        => 'အမှတ်စဥ် - ၃',
                    'number'                       => 3,
                    'course_id'                    => 3,
                    'start_date'                   => Carbon::now(),
                    'end_date'                     => Carbon::now()->addMonth(),
                    'mac_reg_start_date'           => Carbon::now(),
                    'mac_reg_end_date'             => Carbon::now()->addMonth(),
                    'self_reg_start_date'          => Carbon::now(),
                    'self_reg_end_date'            => Carbon::now()->addMonth(),
                    'private_reg_start_date'       => Carbon::now(),
                    'private_reg_end_date'         => Carbon::now()->addMonth(),
                    'moodle_course_id'             => 1,
                    'publish_status'               => 1,
                    'accept_application_start_date'=> Carbon::now(),
                    'accept_application_end_date'  => Carbon::now()->addMonth(),
                    'entrance_pass_start_date'     => Carbon::now(),
                    'entrance_pass_end_date'       => Carbon::now()->addMonth(),
                    'exam_start_date'              => Carbon::now()->addMonth(),
                    'exam_end_date'                => Carbon::now()->addMonth()->addweek(),
                    'exam_place'                   => "Yangon",
                    'exam_time'                    => "10:00am"
            ),
            array(
                    'name'                          => 'Batch Four',
                    'name_mm'                        => 'အမှတ်စဥ် - ၄',
                    'number'                        => 4,
                    'course_id'                     => 4,
                    'start_date'                    => Carbon::now(),
                    'end_date'                      => Carbon::now()->addMonth(),
                    'mac_reg_start_date'            => Carbon::now(),
                    'mac_reg_end_date'              => Carbon::now()->addMonth(),
                    'self_reg_start_date'           => Carbon::now(),
                    'self_reg_end_date'             => Carbon::now()->addMonth(),
                    'private_reg_start_date'        => Carbon::now(),
                    'private_reg_end_date'          => Carbon::now()->addMonth(),
                    'moodle_course_id'              => 1,
                    'publish_status'                => 1,
                    'accept_application_start_date' => Carbon::now(),
                    'accept_application_end_date'   => Carbon::now()->addMonth(),
                    'entrance_pass_start_date'      => Carbon::now(),
                    'entrance_pass_end_date'        => Carbon::now()->addMonth(),
                    'exam_start_date'               => Carbon::now()->addMonth(),
                    'exam_end_date'                 => Carbon::now()->addMonth()->addweek(),
                    'exam_place'                    => "Yangon",
                    'exam_time'                     => "10:00am"
            )
        ]);

    }
}
