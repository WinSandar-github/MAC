<?php

use Illuminate\Database\Seeder;

class TMSClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_m_s_classes')->insert([
            array(
                'class_name' => 'Upper Myanmar'
            ),
            array(
                'class_name' => 'Lower Myanmar'
            )
        ]);
    }
}
