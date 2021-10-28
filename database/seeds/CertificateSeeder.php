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
        ]);
    }
}
