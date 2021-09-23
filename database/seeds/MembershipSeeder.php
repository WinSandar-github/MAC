<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memberships')->delete();

        DB::table('memberships')->insert([
            array(
                'membership_name' => 'Audit',
                'requirement'     => '<p>MAC တွင်မှတ်ပုံတင်ထားသည့် PAPP များ</p>',
                'description'     => NULL,
                'form_fee'        => '1000',
                'registration_fee'=> '100000',
                'yearly_fee'      => '100000',
                'renew_fee'       => '100000',
                'late_fee'        => '300000',   
                'late_feb_fee'    => '300000' ,
                'expire_fee'      => '30000' ,
                'cpa_subject_fee' =>NULL,
                'da_subject_fee'  =>NULL,
                'renew_cpa_subject_fee' =>NULL,
                'renew_da_subject_fee' =>NULL   
            ),
            array(
                'membership_name' => 'Non-Audit',
                'requirement'     => '<p>Non-Audit Service လုပ်ကိုင်သည့် နိုင်ငံသား/ နိုင်ငံခြားသား</p>',
                'description'     => NULL,
                'form_fee'        => '10000',
                'registration_fee'=> '100000',
                'yearly_fee'      => '100000',
                'renew_fee'       => '100000',
                'late_fee'        => '30000',
                'late_feb_fee'    => '300000',
                'expire_fee'      => '30000'  ,
                'cpa_subject_fee' =>NULL,
                'da_subject_fee'  =>NULL,
                'renew_cpa_subject_fee' =>NULL,
                'renew_da_subject_fee' =>NULL         
            ),
            array(
                'membership_name' => 'CPA (Full Fluged)',
                'requirement'     => '<p>အသက် ၂၁ နှစ်ပြည့်ပြီးသူ</p>
                                      <p>CPA Part-2 စာမေးပွဲအောင်မြင်သူ (သို့မဟုတ်) အရည်အချင်းစစ်စာမေးပွဲအောင်မြင်ပြီးသူ</p>
                                      <p>သတ်မှတ်အလုပ်သင်လုပ်သက်ပြည့်မြောက်ပြီးသူ</p>
                                      <p>စတင်လျှောက်ထားသည့် နေ့မတိုင်မီ ၁၂ လအတွင်း အနဲဆုံး CPD ၂၀ နာရီ ပြည့်မီသူ</p>',
                'description'     => NULL,
                'form_fee'        => '1000',
                'registration_fee'=> '10000',
                'yearly_fee'      => NULL,
                'renew_fee'       => '10000',
                'late_fee'        => '10000',
                'late_feb_fee'    => '100000',
                'expire_fee'      => '10000'  ,
                'cpa_subject_fee' =>NULL,
                'da_subject_fee'  =>NULL,
                'renew_cpa_subject_fee' =>NULL,
                'renew_da_subject_fee' =>NULL         
            ),
            array(
                'membership_name' => 'PAPP',
                'requirement'     => '<p>CPA(FF) မှတ်ပုံတင်သက်တမ်း ၁ နှစ် ပြည့်မြောက်သူများ</p>
                                      <p>စတင်လျှောက်ထားသည့် နေ့မတိုင်မီ ၁၂ လအတွင်း အနဲဆုံး CPD ၂၀ နာရီ  ပြည့်မီသူ</p>',
                'description'     => NULL,
                'form_fee'        => '10000',
                'registration_fee'=> '30000',
                'yearly_fee'      => '100000',
                'renew_fee'       => '40000',
                'late_fee'        => '50000',
                'late_feb_fee'    => '500000',
                'expire_fee'      => '110000',
                'cpa_subject_fee' =>NULL,
                'da_subject_fee'  =>NULL,
                'renew_cpa_subject_fee' =>NULL,
                'renew_da_subject_fee' =>NULL        
            ),
            array(
                'membership_name' => 'School',
                'requirement'     => NULL,
                'description'     => NULL,
                'form_fee'        => '1000',
                'registration_fee'=> '500000',
                'yearly_fee'      => '300000',
                'renew_fee'       => '500000',
                'late_fee'        => '80000',
                'late_feb_fee'    => NULL,
                'expire_fee'      => '100000',
                'cpa_subject_fee' =>NULL,
                'da_subject_fee' =>NULL,
                'renew_cpa_subject_fee' =>NULL,
                'renew_da_subject_fee' =>NULL           
            ),
            array(
                'membership_name' => 'Teacher',
                'requirement'     => '<p>CPA(FF) မှတ်ပုံတင်သက်တမ်း ၁ နှစ် ပြည့်မြောက်သူများ</p>',
                'description'     => NULL,
                'form_fee'        => NULL,
                'registration_fee'=> '50000',
                'yearly_fee'      => '10000',
                'renew_fee'       => '30000',
                'late_fee'        => NULL,
                'late_feb_fee'    => NULL,
                'expire_fee'      => NULL,
                'cpa_subject_fee' =>'30000',
                'da_subject_fee' =>'20000',
                'renew_cpa_subject_fee' =>NULL,
                'renew_da_subject_fee' =>NULL        
            ),
            array(
                'membership_name' => 'Mentor',
                'requirement'     => '<p>PAPP အဖြစ်မှတ်ပုံတင်ထားပြီး ယင်းလုပ်ငန်းကို ၃ နှစ်တစ်ဆက်တည်းလုပ်ကိုင်ခဲ့သူ (မှတ်ပုံတင်သက်တမ်းပြတ်တောက်နေသူများကို ခွင့်မပြုပါ)</p>
                                      <p>Limited Company ၅ ခုထက်မနည်း နှစ်စဉ် (၃ နှစ်တစ်ဆက်တည်း) တာဝန်ယူ စစ်ဆေးခဲ့သူ</p>
                                      <p>သတ်မှတ်လျှောက်လွှာပုံစံဖြင့်လျှောက်ထားရမည်၊ (လျှောက်လွှာကြေးမကောက်ခံပါ)</p>
                                      <p>သတ်မှတ်ချက်များနှင့်ကိုက်ညီပါက အလုပ်သင်ကြားပေးနိုင်သည့် PAPP အမည်စာရင်း ထုတ် ပြန်ပါသည်။</p>
                                      <p></p>',
                'description'     => NULL,
                'form_fee'        => NULL,
                'registration_fee'=> NULL,
                'yearly_fee'      => NULL,
                'renew_fee'       => NULL,
                'late_fee'        => NULL,
                'late_feb_fee'    => NULL,
                'expire_fee'      => NULL ,
                'cpa_subject_fee' =>NULL,
                'da_subject_fee'  =>NULL,
                'renew_cpa_subject_fee' =>NULL,
                'renew_da_subject_fee' =>NULL       
            ),


        ]);
    }
}