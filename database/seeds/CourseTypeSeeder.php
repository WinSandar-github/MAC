<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_types')->delete();

        DB::table('course_types')->insert([
            array(
                'course_code' => 'da',
                'course_name'  => "Diploma in Accountancy (DA)",
                'course_description' => "၁။ မြန်မာနိုင်ငံ၌ ၁၉၂၃ ခုနှစ်တွင် အစိုးရစာရင်းကိုင်ဒီပလိုမာ (Government Diploma in Accountancy)နှင့် အထက်တန်းစာရင်းကိုင်ပညာသင်တန်း(Advanced Accountancy Class)  တို့ကို အိန္ဒိယအစိုးရမှဖွင့်လှစ်ခွင့်ပြုခဲ့ပါသည်။ ထိုအချိန် က အိန္ဒိယနိုင်ငံမြို့ကြီးများ၌သာ စာစစ်ဌာနဖွင့်လှစ် ၍ စာမေးပွဲဖြေဆိုစေခဲ့ပြီး ၁၉၂၅ ခုနှစ်မှသာ မြန်မာနိုင်ငံ ရန်ကုန်မြို့၌ စာစစ်ဌာနတစ်ခု သတ်မှတ်၍ ဖြေဆိုစေခဲ့ပါသည်။ ၁၉၃၂ ခုနှစ်အတွင်း၌ အိန္ဒိယအစိုးမှ ၂၆-၃-၁၉၃၂ ရက်စွဲပါ စာရင်းကိုင် များ မှတ်ပုံတင်ရေး ကြေငြာချက်စာအမှတ် ၂၁၃ (၁၁) တီနှင့် အီး (အေဘီ) ဖြင့် မှတ်ပုံတင်စာရင်းကိုင် Registered Accountant (RA) လက်မှတ်ထုတ်ပေးရေးနည်းဥပဒေပြဋ္ဌာန်းပေးခဲ့ပြီး အစိုးရစာရင်းကိုင်ဒီပလိုမာသင်တန်းများအား ရပ်ဆိုင်းခဲ့ပါသည်။,
                                        ၂။ ၁၉၇၂ ခုနှစ်တွင် ပြည်ထောင်စုမြန်မာနိုင်ငံ တော်လှန်ရေးကောင်စီမှ ၁၉၇၂ ခုနှစ် မြန်မာနိုင်ငံ စာရင်းကောင်စီဥပဒေကို ပြဋ္ဌာန်းပေးခဲ့ပြီး ယင်းဥပဒေအရ မြန်မာနိုင်ငံစာရင်းကောင်စီကို စတင်ဖွဲ့စည်းခဲ့ပါသည်။ ၁၉၇၂ ခုနှစ် မြန်မာနိုင်ငံစာရင်း ကောင်စီဥပဒေနှင့် နည်းဥပဒေပါ ပြဋ္ဌာန်းချက်များနှင့်အညီ  မြန်မာနိုင်ငံစာရင်းကောင်စီသည် ဒီပလိုမာစာရင်းကိုင်သင်တန်းကို ၅-၃-၁၉၇၃ နေ့မှစတင် ဖွင့်လှစ်ခဲ့ပါသည်။,
                                        ၃။ သင်တန်းကာလမှာ ၂ နှစ်ဖြစ်ပါသည်။ ဒီပလိုမာစာရင်းကိုင် (ပထမပိုင်း) သင်တန်းသို့ အသိမှတ်ပြုတက္ကသိုလ်တစ်ခုခုမှ ဘွဲ့ရရှိပြီးသူများ တက်ရောက်ရန်လျှောက်ထားနိုင်ပါသည်။,
                                        ၄။ ဒီပလိုမာစာရင်းကိုင်သင်တန်းကို ပြည်ထောင်စုစာရင်းစစ်ချုပ်ရုံး၊ ရန်ကုန်သင်တန်းကျောင်းနှင့် နေပြည်တော်သင်တန်းကျောင်းတို့တွင် ဖွင့်လှစ်သင်ကြားပို့ချပေးပါသည်။ နေပြည်တော်သင်တန်းကျောင်းတွင် အစိုးရဝန်ထမ်းများကိုသာ လက်ခံသင်ကြားပေးလျက်ရှိပါသည်။ ထို့အပြင် မြန်မာနိုင်ငံစာရင်းကောင်စီမှ အသိမှတ်ပြုဖွင့်လှစ်ခွင့်ပြုထားသည့် ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းများတွင်လည်း တက်ရောက်သင်ကြားနိုင်ပြီး ကိုယ်တိုင်လေ့လာ၍လည်း သင်ယူနိုင်ပါသည်။"
            ),
            array(
                'course_code' => 'cpa',
                'course_name'  => "Certified Public Accountant (CPA)",
                'course_description' => '၁။ ၁၉၇၂ ခုနှစ် မြန်မာနိုင်ငံစာရင်းကောင်စီဥပဒေနှင့် နည်းဥပဒေပါ ပြဋ္ဌာန်းချက်များနှင့်အညီ မြန်မာနိုင်ငံစာရင်းကောင်စီသည် လက်မှတ်ရပြည်သူ့စာရင်းကိုင်သင်တန်းကို ၉-၁၀-၁၉၇၂ နေ့မှစ၍ ဖွင့်လှစ်ခဲ့ပါသည်။ သင်တန်းကာလမှာ ၂ နှစ် ဖြစ်ပါသည်။,
                                        ၂။ လက်မှတ်ရပြည်သူ့စာရင်းကိုင် (ပထမပိုင်း) သင်တန်းသို့ အောက်ပါပုဂ္ဂိုလ်များ တိုက်ရိုက်တက်ရောက်ခွင့် ရှိပါသည်-
                                            - B.Com/ B.Act/ B.B.A/ B.BSc (Accounting and Finance) ဘွဲ့ရများ
                                            - DA Part II အောင်မြင်ပြီးသူ
                                            - ဘွဲ့တစ်ခုခုရရှိပြီး ACCA Fundamental Skills Level ပြီးစီးသူများ၊
                                            - ဘွဲ့တစ်ခုခုရရှိပြီး CIMA Diploma in Management Accounting ရရှိပြီးသူ
                                        ၃။ တိုက်ရိုက်တက်ရောက်ခွင့်မရှိသည့် အသိအမှတ်ပြု ဘွဲ့တစ်ခုခုရသူနိုင်ငံသားများသည် ဝင်ခွင့်စာမေးပွဲကို ဖြေဆိုရပါမည်။,
                                        ၄။ သင်တန်းတက်ရောက်ရာတွင် မြန်မာနိုင်ငံစာရင်းကောင်စီသင်တန်းကျောင်း သို့မဟုတ် ကောင်စီမှအသိမှတ်ပြုဖွင့်လှစ်ခွင့်ပြုထားသည့် ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းများတွင် တက်ရောက်သင်ကြားနိုင်ပြီး ကိုယ်တိုင်လေ့လာ၍လည်း သင်ယူနိုင်ပါသည်။'
            ),
        ]);
    }
}
