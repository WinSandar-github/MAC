<?php

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
=======
>>>>>>> 956e7043820bb1df64b9c363d9517b368351031e

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
