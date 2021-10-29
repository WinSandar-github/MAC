<?php

namespace App\Http\Controllers\CertificateController;

use DB;
use App\ExamRegister;
use App\QualifiedTest;
use App\SchoolRegister;
use App\TeacherRegister;
use App\AccountancyFirmInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomClass\Helper;

class CertificateController extends Controller
{
    public function index(Request $req, $id)
    {
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

        $template->cert_data = str_replace('{{ userImage }}', Helper::$BASE_URL . $teacher->image, $template->cert_data);
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

    public function getQtCard(Request $req, $id)
    {
        $qt = QualifiedTest::with('student_info')
                ->where('student_info_id', '=', $id)
                ->first();

        list($day, $month, $year) = explode('-', $qt->exam_date);                        

        $template = DB::table('certificates')->where('cert_code', '=', $req->course_code)->first();

        $template->cert_data = str_replace('{{ serialNo }}', "<strong>$qt->sr_no</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ dated }}', "<strong>" . $this->en2mmNumber(date('d-m-Y')) . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ datedEng }}', "<strong>" . date('d-m-Y') . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ abaName }}', "<strong>" . $qt->student_info->father_name_mm . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ abaNameEng }}', "<strong>" . $qt->student_info->father_name_eng . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ studentName }}', "<strong>" . $qt->student_info->name_mm . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ studentNameEng }}', "<strong>" . $qt->student_info->name_eng . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ nrcNumber }}', "<strong>" . $qt->student_info->nrc_state_region . "/" . $qt->student_info->nrc_township ."(" . $qt->student_info->nrc_citizen . ")" . $qt->student_info->nrc_number . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ year }}', "<strong>" . $this->en2mmNumber($year) . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ yearEng }}', "<strong>" . $year . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ month }}', "<strong>" . $this->en2mmMonthNumber($month) . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ monthEng }}', "<strong>" . Carbon::parse($qt->exam_date)->format('M') . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ qtRollNo }}', "<strong>" . $qt->sr_no . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officerName }}', "<strong>" . "Thandar Lay" . "</strong>", $template->cert_data);

        $className = 'border-style';

        return view('certificate.complete_certificate', compact('template', 'className'));
    }

    public function getSchoolCard(Request $req, $id){
        
        $school = SchoolRegister::where('id', '=', $id)->first();

        $courseType = explode(',', $school->attend_course);

        collect($courseType)->map(function($val){
            return $val . " helll ";
        });

        $template = DB::table('certificates')->where('cert_code', '=', $req->course_code)->first();

        $template->cert_data = str_replace('{{ issueDate }}', "<strong>" .  $school->regno . " / " . $school->reg_date . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ schoolName }}', "<strong>" . $school->school_name . "</strong>", $template->cert_data);
        
        switch($school->type){
            case "PCS":
                $template->cert_data = str_replace('{{ pcs }}', "checked", $template->cert_data);
                break;
            case "PCP":
                $template->cert_data = str_replace('{{ pcp }}', "checked", $template->cert_data);
                break;
            case "PCC":
                $template->cert_data = str_replace('{{ pcc }}', "checked", $template->cert_data);
                break;
            case "P":
                $template->cert_data = str_replace('{{ p }}', "checked", $template->cert_data);
                break;
        }

        if(in_array('1', $courseType)){
            $template->cert_data = str_replace('{{ da_1 }}', "checked", $template->cert_data);
        }
        if(in_array('2', $courseType)){
            $template->cert_data = str_replace('{{ da_2 }}', "checked", $template->cert_data);
        }
        if(in_array('3', $courseType)){
            $template->cert_data = str_replace('{{ cpa_1 }}', "checked", $template->cert_data);
        }
        if(in_array('4', $courseType)){
            $template->cert_data = str_replace('{{ cpa_2 }}', "checked", $template->cert_data);
        }
        if(in_array('5', $courseType)){
            $template->cert_data = str_replace('{{ other }}', "checked", $template->cert_data);
        }

        $template->cert_data = str_replace('{{ founder }}', "<strong>" . $school->name_eng . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ cscNo }}', "<strong>" . $school->nrc_state_region . "/" . $school->nrc_township ."(" . $school->nrc_citizen . ")" . $school->nrc_number . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ schoolLocation }}', "<strong>". $school->eng_school_address ."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ expDate }}', "<strong>". $school->renew_date ."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officerName }}', "<strong>Thandar Lay</strong>", $template->cert_data);

        $className = '';

        return view('certificate.complete_certificate', compact('template', 'className'));
    }

    public function getAuditCard(Request $req, $id){
        
        $audit = AccountancyFirmInformation::where('id', '=', $id)->first();
        // return $audit;
        $foa = $audit->firm_owner_audits;

        $template = DB::table('certificates')->where('cert_code', '=', 'audit_card')->first();
        // dd($audit->firm_owner_audits);
        $template->cert_data = str_replace('{{ issueDate }}', "<strong>" .  $audit->accountancy_firm_reg_no . " / " . $audit->register_date . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ FrimName }}', "<strong>" . $audit->accountancy_firm_name . "</strong>", $template->cert_data);
        
        switch($audit->organization_structure_id){
            case 1:
                $template->cert_data = str_replace('{{ pcs }}', "checked", $template->cert_data);
                break;
            case 2:
                $template->cert_data = str_replace('{{ pcp }}', "checked", $template->cert_data);
                break;
            case 3:
                $template->cert_data = str_replace('{{ pcc }}', "checked", $template->cert_data);
                break;
            case 4:
                $template->cert_data = str_replace('{{ p }}', "checked", $template->cert_data);
                break;
        }

        $template->cert_data = str_replace('{{ founder }}', "<strong>" . $foa[0]->name . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ cscNo }}', "<strong>" . $foa[0]->public_private_reg_no . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officeLocation }}', "<strong>". $audit->head_office_address ."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ expDate }}', "<strong>". $audit->register_date ."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officerName }}', "<strong>Thandar Lay</strong>", $template->cert_data);

        $className = '';

        return view('certificate.complete_certificate', compact('template', 'className'));
    }

    public function getNonAuditCard(Request $req, $id){
        
        $audit = AccountancyFirmInformation::where('id', '=', $id)->first();
        // return $audit;
        // $foa = $audit->firm_owner_audits;
        $tos = explode(',', $audit->type_of_service_provided_id);
        $template = DB::table('certificates')->where('cert_code', '=', 'non_audit_card')->first();
        // dd($audit->firm_owner_audits);
        $template->cert_data = str_replace('{{ issueDate }}', "<strong>" .  $audit->accountancy_firm_reg_no . " / " . $audit->register_date . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ FrimName }}', "<strong>" . $audit->accountancy_firm_name . "</strong>", $template->cert_data);
        
        switch($audit->organization_structure_id){
            case 1:
                $template->cert_data = str_replace('{{ pcs }}', "checked", $template->cert_data);
                break;
            case 2:
                $template->cert_data = str_replace('{{ pcp }}', "checked", $template->cert_data);
                break;
            case 3:
                $template->cert_data = str_replace('{{ pcc }}', "checked", $template->cert_data);
                break;
            case 4:
                $template->cert_data = str_replace('{{ p }}', "checked", $template->cert_data);
                break;
        }

        if(in_array('3', $tos)){
            $template->cert_data = str_replace('{{ ac }}', "checked", $template->cert_data);
        }
        if(in_array('4', $tos)){
            $template->cert_data = str_replace('{{ ad }}', "checked", $template->cert_data);
        }
        if(in_array('5', $tos)){
            $template->cert_data = str_replace('{{ ta }}', "checked", $template->cert_data);
        }
        if(in_array('6', $tos)){
            $template->cert_data = str_replace('{{ li }}', "checked", $template->cert_data);
        }
        if(in_array('7', $tos)){
            $template->cert_data = str_replace('{{ as }}', "checked", $template->cert_data);
        }
        if(in_array('8', $tos)){
            $template->cert_data = str_replace('{{ ot }}', "checked", $template->cert_data);
        }

        $template->cert_data = str_replace('{{ founder }}', "<strong>" . $audit->name_of_sole_proprietor . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ cscNo }}', "<strong>" . $audit->dir_passport_csc . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officeLocation }}', "<strong>". $audit->head_office_address ."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ expDate }}', "<strong>". $audit->register_date ."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officerName }}', "<strong>Thandar Lay</strong>", $template->cert_data);

        $className = '';

        return view('certificate.complete_certificate', compact('template', 'className'));
    }

    public function getNonAuditForeignCard(Request $req, $id){
        
        $audit = AccountancyFirmInformation::where('id', '=', $id)->first();
        // return $audit;
        // $foa = $audit->firm_owner_audits;
        $tos = explode(',', $audit->type_of_service_provided_id);
        $template = DB::table('certificates')->where('cert_code', '=', 'non_audit_foreign_card')->first();
        // dd($audit->firm_owner_audits);
        $template->cert_data = str_replace('{{ issueDate }}', "<strong>" .  $audit->accountancy_firm_reg_no . " / " . $audit->register_date . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ FrimName }}', "<strong>" . $audit->accountancy_firm_name . "</strong>", $template->cert_data);
        
        switch($audit->organization_structure_id){
            case 1:
                $template->cert_data = str_replace('{{ pcs }}', "checked", $template->cert_data);
                break;
            case 2:
                $template->cert_data = str_replace('{{ pcp }}', "checked", $template->cert_data);
                break;
            case 3:
                $template->cert_data = str_replace('{{ pcc }}', "checked", $template->cert_data);
                break;
            case 4:
                $template->cert_data = str_replace('{{ p }}', "checked", $template->cert_data);
                break;
        }
        // return $tos;
        // return in_array('5', $tos);
        if(in_array('3', $tos)){
            $template->cert_data = str_replace('{{ ac }}', "checked", $template->cert_data);
        }
        if(in_array('4', $tos)){
            $template->cert_data = str_replace('{{ ad }}', "checked", $template->cert_data);
        }
        if(in_array('5', $tos)){
            $template->cert_data = str_replace('{{ ta }}', "checked", $template->cert_data);
        }
        if(in_array('6', $tos)){
            $template->cert_data = str_replace('{{ li }}', "checked", $template->cert_data);
        }
        if(in_array('7', $tos)){
            $template->cert_data = str_replace('{{ as }}', "checked", $template->cert_data);
        }
        if(in_array('8', $tos)){
            $template->cert_data = str_replace('{{ ot }}', "checked", $template->cert_data);
        }

        $template->cert_data = str_replace('{{ founder }}', "<strong>" . $audit->name_of_sole_proprietor . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ cscNo }}', "<strong>" . $audit->dir_passport_csc . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officeLocation }}', "<strong>". $audit->head_office_address ."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ expDate }}', "<strong>". $audit->register_date ."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officerName }}', "<strong>Thandar Lay</strong>", $template->cert_data);

        $className = '';

        return view('certificate.complete_certificate', compact('template', 'className'));
    }

    private function en2mmMonthName($month)
    {
        $en = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $mm = ['ဇန်နဝါရီ', 'ဖေဖော်ဝါရီ', 'မတ်', 'ဧပရယ်', 'မေ', 'ဂျွန်', 'ဂျူလိုင်', 'သြဂတ်', 'စက်တင်ဘာ', 'အောက်တိုဘာ', 'နိုဝင်ဘာ', 'ဒီဇင်ဘာ'];

        return str_replace($en, $mm, $month);
    }

    private function en2mmMonthNumber($month)
    {
        $en = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

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
