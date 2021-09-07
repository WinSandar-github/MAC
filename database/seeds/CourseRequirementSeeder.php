<?php

use Illuminate\Database\Seeder;

class CourseRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requirements')->delete();

        DB::table('requirements')->insert([
            array(
                'requirement_name'  => "အသိအမှတ်ပြုတက္ကသိုလ်တစ်ခုခုမှ ဘွဲ့ရရှိသူများ လျှောက်ထားနိုင်ပါသည်။",
                // 'require_exam' => 1,
                // 'course_id'=>1
            ),
            // array(
            //     'requirement_name'  => "အသိအမှတ်ပြုတက္ကသိုလ်တစ်ခုခုမှ ဘွဲ့ရရှိသူများ လျှောက်ထားနိုင်ပါသည်။",
            //     'require_exam' => 1,
            //     // 'course_id'=>2
            // ),
            array(
                'requirement_name'  => "DA I သင်တန်း (MAC,SS,Private)(၃)မျိုးပေါင်းနှစ်စဉ် ၅၀၀ ဦးခန့်ရှိ။",
                // 'require_exam' => 1,
                // 'course_id'=>1
            ),
            array(
                'requirement_name'  => "DA II သင်တန်း(၂)တန်း (MAC,SS,Private)(၃)မျိုးပေါင်း နှစ်စဉ် ၃၀၀ ဦးခန့်ရှိ။",
                // 'require_exam' => 1,
                // 'course_id'=>2
            ),
            array(
                'requirement_name'  => "Module အားလုံးကိုဖြစ်စေ၊ ကြိုက်နှစ်သက်ရာ Module တစ်ခုကိုဖြစ်စေ ၅ နှစ်အတွင်းဖြေဆိုနိုင်သည်။",
                // 'require_exam' => 1,
                // 'course_id'=>1
            ),
            // array(
            //     'requirement_name'  => "Module အားလုံးကိုဖြစ်စေ၊ ကြိုက်နှစ်သက်ရာ Module တစ်ခုကိုဖြစ်စေ ၅ နှစ်အတွင်းဖြေဆိုနိုင်သည်။",
            //     'require_exam' => 1,
            //     // 'course_id'=>2
            // ),
            array(
                'requirement_name'  => "DA I သင်တန်းတွင် ဘာသာရပ် ၅ ခု၊ Module I တွင် ဘာသာရပ် ၃ ခု၊ Module II တွင် ဘာသာရပ် ၂ ခု ရှိပါသည်။",
                // 'require_exam' => 1,
                // 'course_id'=>1
            ),
            array(
                'requirement_name'  => "DA II သင်တန်းတွင် ဘာသာရပ် ၆ ခုရှိပြီး ရှိပြီး Module တစ်ခုစီတွင် ဘာသာရပ် ၃ ခုရှိပါသည်။",
                // 'require_exam' => 1,
                // 'course_id'=>2
            ),
            array(
                'requirement_name'  => "ယနေ့ထိ DA I အောင်မြင်ပြီးသူ ၈၇၄၃ ဦး၊ တက်ရောက်ဆဲ ၂၇၉ ဦး ရှိပါသည်။",
                // 'require_exam' => 1,
                // 'course_id'=>1
            ),
            array(
                'requirement_name'  => "ယနေ့ထိ DA II အောင်မြင်ပြီးသူ ၄၆၀၉ ဦး ရှိပါသည်။",
                // 'require_exam' => 1,
                // 'course_id'=>2
            ),
            array(
                'requirement_name'  => "BCom,BAct,BBA,DA,BBSc ,ACCA (Fundamental skill level),CIMA ဘွဲ့များကို အဆိုပါသင်တန်းသို့ တိုက်ရိုက် တက်ရောက်ခွင့်ပေးပြီး အခြားဘွဲ့များ ဝင်ခွင့်စာမေးပွဲ အောင်မြင်ပါက တက်ရောက်ခွင့်ရှိပါသည်။",
                // 'require_exam' => 1,
                // 'course_id'=>2
            ),
            array(
                'requirement_name'  => "CPA I & II သင်တန်း(၂)တန်းဖွင့်လှစ်ပြီး (MAC,SS,Private)(၃)မျိုးပေါင်းနှစ်စဉ် ၃၅၀၀ ဦးခန့်ရှိ။",
                // 'require_exam' => 1,
                // 'course_id'=>2
            ),
            array(
                'requirement_name'  => "Module အားလုံးကိုဖြစ်စေ၊ ကြိုက်နှစ်သက်ရာ Module တစ်ခုကိုဖြစ်စေ ၅ နှစ်အတွင်းဖြေဆိုနိုင်သည်။",
                // 'require_exam' => 1,
                // 'course_id'=>2
            ),
            array(
                'requirement_name'  => "သင်တန်းတစ်ခုတွင်ဘာသာရပ် ၆ ခုရှိပြီး Module တစ်ခုတွင် ဘာသာရပ် ၃ ခုရှိပါသည်။",
                // 'require_exam' => 1,
                // 'course_id'=>2
            ),
            array(
                'requirement_name'  => "ယနေ့ထိ CPA I အောင်မြင်ပြီးသူ  ၃၈၁၀ ဦး၊တက်ရောက်ဆဲ၂၇၄၁ ဦး တက်ရောက်ခွင့်ရရှိထားသူ ၁၅၀၀ ဦး ခန့်ရှိပါသည်။",
                // 'require_exam' => 1,
                // 'course_id'=>2
            ),
            array(
                'requirement_name'  => "CPA II  အောင်မြင်ပြီးသူ ၂၆၂၈ ဦး ၊ CPA II တက်ရောက်ဆဲ    ၅၀၀ ဦး ရှိပါသည်။",
                // 'require_exam' => 1,
                // 'course_id'=>2
            ),
        ]);
    }
}
