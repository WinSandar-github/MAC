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
        DB::table('certificates')->delete();

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
            ]
        ]);
    }
}
