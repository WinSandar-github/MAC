<?php

namespace App\Http\Controllers\CertificateController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ExamRegister;
use App\TeacherRegister;
use App\AccountancyFirmInformation;
use DB;
use Illuminate\Support\Carbon;

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

        $template = DB::table('certificates')->where('cert_code', '=', 'da_cpa_finish')->first();

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

        $className = 'border-style';

        return view('certificate.complete_certificate', compact('template', 'className'));
    }

    public function getTeacherCard(Request $req, $id)
    {
        $teacher = TeacherRegister::where('id', '=', $id)->first();

        $cpa_subj_id = explode(',', $teacher->certificates);

        $cpa_subjects = DB::table('subjects as s')
                    ->join('courses as c', 'c.id', '=', 's.course_id')
                    ->whereIn('s.id', $cpa_subj_id)
                    ->select('c.name as course_name', 'c.code', 's.subject_name')
                    ->get();

        $cpa_subject_template = "<p style='text-align:center; font-weight: bold'>" . $this->en2romaNumber(str_replace('_', ' ', strtoupper($cpa_subjects[0]->code))) . "</p>";
        foreach($cpa_subjects as $key => $cpa){
            $cpa_subject_template .= "<p>(" . ++$key . ")&nbsp;&nbsp;&nbsp;&nbsp;" . $cpa->subject_name . "</p>";
        }

        $da_subj_id = explode(',', $teacher->diplomas);

        $da_subjects = DB::table('subjects as s')
                    ->join('courses as c', 'c.id', '=', 's.course_id')
                    ->whereIn('s.id', $da_subj_id)
                    ->select('c.name as course_name', 'c.code', 's.subject_name')
                    ->get();
        
        $da_subject_template = "<p style='text-align:center; font-weight: bold'>" . $this->en2romaNumber(str_replace('_', ' ', strtoupper($da_subjects[0]->code))) . "</p>";
        foreach($da_subjects as $key => $da){
            $da_subject_template .= "<p>(" . ++$key . ")&nbsp;&nbsp;&nbsp;&nbsp;" . $da->subject_name . "</p>";
        }

        $template = DB::table('certificates')->where('cert_code', '=', 'teacher_card')->first();

        $template->cert_data = str_replace('{{ userImage }}', $teacher->image, $template->cert_data);
        $template->cert_data = str_replace('{{ serialNo }}', $teacher->t_code, $template->cert_data);
        $template->cert_data = str_replace('{{ dated }}', "<strong>" . date('d-m-Y') . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ studentName }}', "<strong>$teacher->name_eng</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ abaName }}', "<strong>$teacher->name_eng</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ nrcNumber }}', "<strong>$teacher->nrc_state_region/$teacher->nrc_township($teacher->nrc_citizen)$teacher->nrc_number</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ courseAndSubject }}', $da_subject_template . $cpa_subject_template, $template->cert_data);
        $template->cert_data = str_replace('{{ validFrom }}', "<strong>" . Carbon::parse($teacher->from_valid_date)->format('d-m-Y') . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ validTo }}', "<strong>" . Carbon::parse($teacher->to_valid_date)->format('d-m-Y') . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officerName }}', "<strong>Thandar Lay</strong>", $template->cert_data);

        $className = '';

        return view('certificate.complete_certificate', compact('template', 'className'));
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

    private function en2romaNumber($number)
    {
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $roma = ['','I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'];

        return str_replace($en, $roma, $number);
    }
}
