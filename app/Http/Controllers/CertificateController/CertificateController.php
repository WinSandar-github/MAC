<?php

namespace App\Http\Controllers\CertificateController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CertificateController extends Controller
{
    public function index()
    {
        $template = DB::table('certificates')->first();

        $template->cert_data = str_replace('{{ studentName }}', "<strong>မစ္စတာဟိုးစိန်း</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ abaName }}', "<strong>ဦးကိုကိုအောင်</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ nrcNumber }}', "<strong>၁၂/တကန(နိုင်)၂၁၂၉၁၉</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ year }}', "<strong>၂၀၁၉</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ courseName }}', "<strong>ဒီပလိုမာစာရင်းကိုင်(ပထမပိုင်း)</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ grade }}', "<strong>ပထမ</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ officerName }}', "<strong>သီဟသူရ ဦးတင်စိန်</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ yearMM }}', "<strong>၂၀၁၉</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ monthMM }}', "<strong>ဒီဇင်ဘာလ</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ dayMM }}', "<strong>၃၁</strong>", $template->cert_data);

        return view('certificate.complete_certificate', compact('template'));
    }
}
