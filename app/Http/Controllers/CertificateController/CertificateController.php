<?php

namespace App\Http\Controllers\CertificateController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ExamRegister;
use DB;

class CertificateController extends Controller
{
    public function index(Request $req, $id)
    {
        // return DB::table('student_infos as st')
                // ->leftJoin('exam_result as ex', 'ex.student_info_id', 'st.id')
                // ->join('exam_register as er', 'er.student_info_id', 'st.id')
                // ->where('st.id', $id)
                // ->get();



        $student = DB::table('student_infos as st')
                ->leftJoin('exam_result as ex', 'ex.student_info_id', 'st.id')
                ->leftJoin('exam_register as er', 'er.student_info_id', 'st.id')
                ->leftJoin('batches as b', 'b.id', 'er.batch_id')
                ->leftJoin('courses as c', 'c.id', 'b.course_id')
                ->where('st.id', $id)
                ->where('c.code', '=', $req->course_code)
                ->select('st.name_mm', 'st.nrc_state_region', 'st.nrc_township', 
                        'st.nrc_citizen', 'st.nrc_number', 'st.father_name_mm',
                        'ex.result', 'er.date', 'er.grade', 'c.name_mm as course_name', 'b.name_mm as batch_name'
                        )
                ->first();

        if($student == null){
            return "<h1 style='color:red;'>Selected User not found in Database.</h1>";
        }

        list($exam_month, $exam_year) = explode('-', $student->date ?? "Jan-2021");

        list($curYear, $curMth, $curDay) = explode('-', date('Y-M-d'));

        $template = DB::table('certificates')->first();

        $template->cert_data = str_replace('{{ studentName }}', "<strong>$student->name_mm</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ abaName }}', "<strong>$student->father_name_mm</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ nrcNumber }}', "<strong>$student->nrc_state_region/$student->nrc_township($student->nrc_citizen)$student->nrc_number</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ examYear }}', "<strong>" . $this->en2mmNumber($exam_year) . "</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ examMonth }}', "<strong>" . $this->en2mm($exam_month) . "</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ courseName }}', "<strong>$student->course_name ($student->batch_name)</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ grade }}', "<strong>$student->grade</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ officerName }}', "<strong>သန္တာလေး</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ yearMM }}', "<strong>". $this->en2mmNumber($curYear) . "</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ monthMM }}', "<strong>" . $this->en2mm($curMth) . "</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ dayMM }}', "<strong>" . $this->en2mmNumber($curDay) . "</strong>", $template->cert_data);

        return view('certificate.complete_certificate', compact('template'));
    }

    private function en2mm($month)
    {
        $en = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $mm = ['ဇန်နဝါရီ', 'ဖေဖော်ဝါရီ', 'မတ်', 'ဧပရယ်', 'မေ', 'ဂျွန်', 'ဂျူလိုင်', 'သြဂတ်', 'စက်တင်ဘာ', 'အောက်တိုဘာ', 'နိုဝင်ဘာ', 'ဒီဇင်ဘာ'];

        return str_replace($en, $mm, $month);
    }

    private function en2mmNumber($number)
    {
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $my = ['၀','၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];

        return str_replace($en, $my, $number);
    }
}
