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
        DB::table('batches')->insert([
            array(
                'name'              => 'Batch One',
                'course_id'         => 1,
                'start_date'        => Carbon::now(),
                'end_date'          => Carbon::now(),    
                'mac_reg_start_date'=> Carbon::now(),
                'mac_reg_end_date'  => Carbon::now(),
                'self_reg_start_date' => Carbon::now(),
                'self_reg_end_date'             => Carbon::now(),
                'private_reg_start_date'        => Carbon::now(),
                'private_reg_end_date'          => Carbon::now(),
                'moodle_course_id'              => 1,
                'publish_status'                => 1,
                'accept_application_start_date' => Carbon::now(),
                'accept_application_end_date'   => Carbon::now(),
                'entrance_pass_start_date'      => Carbon::now(),
                'entrance_pass_end_date'        => Carbon::now(),
                'exam_start_date'               => Carbon::now()->addMonth(),
                'exam_end_date'                 => Carbon::now()->addMonth()->addweek(),
                'exam_place'                    => "Yangon",
                'exam_time'                     => "10:00am"  
         
                 
            ),
            array(
                'name'              => 'Batch Two',
                'course_id'         => 2,
                'start_date'        => Carbon::now(),
                'end_date'          => Carbon::now(),    
                'mac_reg_start_date'=> Carbon::now(),
                'mac_reg_end_date'  => Carbon::now(),
                'self_reg_start_date' => Carbon::now(),
                'self_reg_end_date'             => Carbon::now(),
                'private_reg_start_date'        => Carbon::now(),
                'private_reg_end_date'          => Carbon::now(),
                'moodle_course_id'              => 1,
                'publish_status'                => 1,
                'accept_application_start_date' => Carbon::now(),
                'accept_application_end_date'   => Carbon::now(),
                'entrance_pass_start_date'      => Carbon::now(),
                'entrance_pass_end_date'        => Carbon::now(),
                'exam_start_date'               => Carbon::now()->addMonth(),
                'exam_end_date'                 => Carbon::now()->addMonth()->addweek(),
                'exam_place'                    => "Yangon",
                'exam_time'                     => "10:00am"       
            ),
            array(
                'name'              => 'Batch Three',
                'course_id'         => 3,
                'start_date'        => Carbon::now(),
                'end_date'          => Carbon::now(),    
                'mac_reg_start_date'=> Carbon::now(),
                'mac_reg_end_date'  => Carbon::now(),
                'self_reg_start_date' => Carbon::now(),
                'self_reg_end_date'             => Carbon::now(),
                'private_reg_start_date'        => Carbon::now(),
                'private_reg_end_date'          => Carbon::now(),
                'moodle_course_id'              => 1,
                'publish_status'                => 1,
                'accept_application_start_date' => Carbon::now(),
                'accept_application_end_date'   => Carbon::now(),
                'entrance_pass_start_date'      => Carbon::now(),
                'entrance_pass_end_date'        => Carbon::now(),
                'exam_start_date'               => Carbon::now()->addMonth(),
                'exam_end_date'                 => Carbon::now()->addMonth()->addweek(),
                'exam_place'                    => "Yangon",
                'exam_time'                     => "10:00am"  
         
                 
            ),
            array(
                'name'              => 'Batch Four',
                'course_id'         => 4,
                'start_date'        => Carbon::now(),
                'end_date'          => Carbon::now(),    
                'mac_reg_start_date'=> Carbon::now(),
                'mac_reg_end_date'  => Carbon::now(),
                'self_reg_start_date' => Carbon::now(),
                'self_reg_end_date'             => Carbon::now(),
                'private_reg_start_date'        => Carbon::now(),
                'private_reg_end_date'          => Carbon::now(),
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
