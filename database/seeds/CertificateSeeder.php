<?php

use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('certificates')->truncate();

        DB::table('certificates')->insert([
            [
                'cert_code' => 'da_cpa_finish',
                'cert_data' => htmlspecialchars('<table style="margin-right: 100px; margin-left: 100px;">
                <tbody>
                    <tr>
                        <td
                            style="text-align: center; font-size: 24px; font-weight: 800; padding-top: 150px; padding-bottom: 20px;">
                            ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံတော်</td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size: 24px; font-weight: 800;">မြန်မာနိုင်ငံစာရင်းကောင်စီ
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size: 24px; padding: 20px;">
                            <img src="https://demo.aggademo.me/MAC/public/img/logo/mac_logo.jpeg" alt="logo" width="150px"
                                height="150px">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size: 35px; font-weight: 800;">
                            ဂုဏ်ပြုလက်မှတ်
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size: 12px;">
                            ≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; text-align:justify; padding-top: 10px; padding-bottom: 10px;">
                            <p>
                                {{ studentName }} (အဖအမည် - {{ abaName }}၊ နိုင်ငံသားစိစစ်ရေးကတ်အမှတ် - {{ nrcNumber }})
                                သည် {{ examYear }}
                                ခုနှစ်၊ {{ examMonth }} အတွင်း ကျင်းပခဲ့သော {{ courseName }} စာမေးပွဲတွင် {{ grade }}
                                အဆင့်ဖြင့်ဖြေဆိုအောင်မြင်ပါသဖြင့် ဤဂုဏ်ပြုလက်မှတ်ကို ချီးမြှင့်လိုက်သည်။
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding-top: 10%; vertical-align: middle;">
                            {{ officerName }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right;">
                            မှတ်ပုံတင်အရာရှိ
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20%;">
                            ရက်စွဲ၊ {{ yearMM }} ခုနှစ်၊ {{ monthMM }} {{ dayMM }} ရက်။
                        </td>
                    </tr>
                </tbody>
            </table>')
            ],
            [
                'cert_code' => 'teacher_card',
                'cert_data' => htmlspecialchars('<img src="{{ userImage }}" alt="user image" width="100px"
                height="100px" style="float: right; position: relative; top: 185px;right: 60px;">
        
                <table style="margin-right: 100px; margin-left: 100px;">
                    <tbody>
                        <tr>
                            <td style="text-align: center; font-size: 16px; font-weight: 800; padding-top: 100px; padding-bottom: 20px;"
                                colspan="2">
                                REPUBLIC OF THE UNION OF MYANMAR</td>
                        </tr>
                        <tr>
                            <td style="text-align: center; font-size: 16px; font-weight: 800;" colspan="2">
                                MYANMAR ACCOUNTANCY COUNCIL
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; padding: 20px;" colspan="2">
                                <img src="https://demo.aggademo.me/MAC/public/img/logo/mac_logo.jpeg" alt="logo" width="100px"
                                    height="100px">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; font-size: 16px; font-weight: 800; padding-bottom: 2rem;"
                                colspan="2">
                                Registration Certificate of Lecture/Tutor
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Serial No. <span class="input">{{ serialNo }}</span>
                            </td>
                            <td style="float: right;">
                                Dated. <span class="input">{{ dated }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align:justify; padding-top: 10px; padding-bottom: 10px;"
                                colspan="2">
                                <p style="line-height: 2rem;">
                                    {{ studentName }} son/daughter of {{ abaName }},holder of CSC No. {{ nrcNumber }}, has been
                                    registered as a Lecturer/Tutor of a Private Accounting School or an Individual Lecture/Tutor
                                    under section 32 of the Myanmar Accountancy Council Law.<br>
                                    He/She is permitted to engage as a Lecture/Tutor of a Private Accounting School.<br>
                                    His/Her teaching Course(s) and Subject(s) are shown as below.
                                </p>
        
                                {{ courseAndSubject }}
        
                                <p>
                                    This certificate is valid for the period {{ validFrom }} to {{ validTo }}.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right; padding-top: 10%; vertical-align: middle;" colspan="2">
                                {{ officerName }}
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: right;" colspan="2">
                                Registrar
                            </td>
                        </tr>
                    </tbody>
                </table>')
            ],
            [
                'cert_code' => 'cpa_qt',
                'cert_data' => htmlspecialchars('<img src="{{ userImage }}" alt="user-image" width="100px" height="100px"
                style="float: right; position: relative; top: 185px;right: 60px;">
    
            <table style="margin-right: 100px; margin-left: 100px;">
                <tbody>
                    <tr>
                        <td style="text-align: center; font-size: 16px; font-weight: 800; padding-top: 100px; padding-bottom: 20px;"
                            colspan="2">
                            ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံတော်<br>
                            REPUBLIC OF THE UNION OF MYANMAR
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size: 16px; font-weight: 800;" colspan="2">
                            မြန်မာနိုင်ငံစာရင်းကောင်စီ<br>
                            MYANMAR ACCOUNTANCY COUNCIL
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding: 20px;" colspan="2">
                            <img src="https://demo.aggademo.me/MAC/public/img/logo/mac_logo.jpeg" alt="logo" width="100px"
                                height="100px">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size: 16px; font-weight: 800; padding-bottom: 2rem;"
                            colspan="2">
                            လက်မှတ်ရပြည့်သူ့စာရင်းကိုင်စာမေးပွဲအောင်လက်မှတ်<br>
                            Certified Public Accountant Examination
                        </td>
                    </tr>
                    <tr>
                        <td>
                            အမှတ်စဥ်. <span class="input">{{ serialNo }}</span><br>
                            Serial No. <span class="input">{{ serialNo }}</span><br>
                        </td>
                        <td style="float: right;">
                            ရက်စွဲ၊ <span class="input">{{ dated }}</span><br>
                            Dated. <span class="input">{{ datedEng }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; text-align:justify; padding-top: 10px; padding-bottom: 10px;"
                            colspan="2">
                            <p style="line-height: 2rem;">
                                {{ abaName }} ၏သား/သမီး {{ studentName }}
                                (အမျိုးသားမှတ်ပုံတင်အမှတ်/နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ် {{ nrcNumber }})
                                သည် {{ year }} ခုနှစ်၊ {{ month }} လအတွင်းကျင်းပခဲ့သောအဖြစ်မှတ်ပုံတင်ရန်
                                အရည်အချင်းစစ်စာမေးပွဲကို ခုံအမှတ် {{ qtRollNo }} ဖြင့်အောင်မြင်သဖြင့် ဤအောင်လက်မှတ်ကို
                                ချီးမြှင့်လိုက်သည်။
                            </p>
    
                            <p style="line-height: 2rem;">
                                {{ studentNameEng }} Son/Daughter of {{ abaNameEng }} having passed the Registration as Certified
                                Public Accountant held in {{ monthEng }} {{ yearEng }} Roll No. {{ qtRollNo }} is awarded this
                                Certificate.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding-top: 10%; vertical-align: middle;" colspan="2">
                            {{ officerName }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right;" colspan="2">
                            မှတ်ပုံတင်အရာရှိ<br>
                            Registrar
                        </td>
                    </tr>
                </tbody>
            </table>')
            ],
            [
                'cert_code' => 'prv_school',
                'cert_data' => htmlspecialchars('<table style="margin-right: 100px; margin-left: 100px;">
                <tbody>
                    <tr>
                        <td style="text-align: center; font-size: 16px; font-weight: 800; padding-top: 20px;"
                            colspan="2">
                            မြန်မာနိုင်ငံစာရင်းကောင်စီ<br>
                            Myanmar Accountancy Council
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding: 20px;" colspan="2">
                            <img src="https://demo.aggademo.me/MAC/public/img/logo/mac_logo.jpeg" alt="logo" width="100px"
                                height="100px">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; font-size: 16px; font-weight: 800;"
                            colspan="2">
                            ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းမှတ်ပုံတင်လက်မှတ်<br>
                            Registration Certificate of Private Accounting School
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: middle; text-align:justify;"
                            colspan="2">
                            <p style="line-height: 2rem;">
                                မြန်မာနိုင်ငံစာရင်းကောင်စီသည် အောက်ဖော်ပြပါ ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်းအား
                                မြန်မာနိုင်ငံစာရင်းကောင်စီ ဥပဒေ ပုဒ်မ ၂၉ နှင့်အညီ ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း
                                မှတ်ပုံတင် လက်မှတ် ထုတ်ပေးလိုက်သည်။<br>
                                Myanmar Accountancy Council hereby issues this Registration Certificate of Private
                                Accounting School to the following Private Accounting School in accordance with section 29
                                of its Law.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="table">
                                <tr>
                                    <td>
                                        မှတ်ပုံတင်အမှတ်နှင့် ထုတ်ပေးသည့်ရက်စွဲ<br>                                    
                                        Registration Number and Date of Issue
                                    </td>
                                    <td>{{ issueDate }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        သင်တန်းကျောင်းအမည်<br>
                                        Organization Stucture
                                    </td>
                                    <td>
                                        {{ orgStructure }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ကျောင်းတည်ထောင်သူ/တာဝန်ခံ၏အမည်<br>
                                        Name of School Founder
                                    </td>
                                    <td>
                                        {{ founder }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ကျောင်းတည်ထောင်သူ၏ မှတ်ပုံတင်အမှတ်<br>
                                        School Founder\'s CSC No.
                                    </td>
                                    <td>
                                    {{ cscNo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        သင်တန်းအမျိုးအစား<br>
                                        Types of Classes
                                    </td>
                                    <td>
                                        {{ classType }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ကျောင်းတည်နေရာ<br>
                                        Location of School
                                    </td>
                                    <td>
                                        {{ schoolLocation }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        သက်တမ်းကုန်ဆုံးရက်<br>
                                        Date of Expiry
                                    </td>
                                    <td>
                                        {{ expDate }}
                                    </td>
                                </tr>
                            </table>
                            <p>
                                Location of Branch School is mentioned on the reverse.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; padding-top: 10%; vertical-align: middle;" colspan="2">
                            {{ officerName }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right;" colspan="2">
                            မှတ်ပုံတင်အရာရှိ<br>
                            Registrar
                        </td>
                    </tr>
                </tbody>
            </table>')
            ],
            [
                'cert_code' => 'branch_school',
                'cert_data' => htmlspecialchars('
                <page size="A4">
                <div style="margin-left: 100px; margin-right: 100px;">
                    <h4 style="text-align: center; padding-top: 20px;">Location of Branch School</h4>
                    <table class="table">
                        <tr>
                            <td>
                                Branch
                            </td>
                            <td>
                                {{ branchName }}
                            </td>
                        </tr>
                    </table>
                </div>
            </page>
                ')
            ]
        ]);
    }
}
