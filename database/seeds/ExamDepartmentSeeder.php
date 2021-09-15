<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('exam_departments')->delete();

      DB::table('exam_departments')->insert([
          array(
              'name' => 'ရန်ကုန်'
          ),
          array(
              'name' => 'မန္တလေး'
          ),
          array(
              'name' => 'နေပြည်တော်'
          ),

      ]);
    }
}
