<?php

namespace App\Http\Controllers\CertificateController;

use DB;
use App\Invoice;
use App\ExamRegister;
use App\QualifiedTest;
use App\SchoolRegister;
use App\TeacherRegister;
use App\tbl_branch_school;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\AccountancyFirmInformation;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomClass\Helper;

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
        
        $template->cert_data = str_replace('{{ examMonth }}', "<strong>" . $this->en2mmMonthName($exam_month) . "</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ courseName }}', "<strong>$student->course_name ($student->batch_name)</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ grade }}', "<strong>$student->grade</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ officerName }}', "<strong>သန္တာလေး</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ yearMM }}', "<strong>". $this->en2mmNumber($curYear) . "</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ monthMM }}', "<strong>" . $this->en2mmMonthName($curMth) . "</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ dayMM }}', "<strong>" . $this->en2mmNumber($curDay) . "</strong>", $template->cert_data);

        $className = 'border-style';

        return view('certificate.complete_certificate', compact('template', 'className','student'));
    }

    public function getTeacherCard(Request $req, $id)
    {
        $teacher = TeacherRegister::where('id', '=', $id)->get();
        
        foreach($teacher as $teacher){
            $teacher->nrc_state_region=$this->mm2engNumber($teacher->nrc_state_region);
            $teacher->nrc_township=$this->characters($teacher->nrc_township);
            $teacher->nrc_citizen=$this->citizens($teacher->nrc_citizen);
            $teacher->nrc_number=$this->mm2engNumber($teacher->nrc_number);
            
            if($teacher->gender=="male"){
                $gender="son / <span style='text-decoration: line-through'>daughter</span>";
                $gender2="He/<span style='text-decoration: line-through'>She</span>";
            }else{
                $gender="<span style='text-decoration: line-through'>son </span>/ daughter";
                $gender2="<span style='text-decoration: line-through'>He</span>/She";
            }
             if($teacher->certificates !=null){
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
             }else{
                $cpa_subject_template=null;
             }
            
           
            if($teacher->diplomas !=null){
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
            }else{
                $da_subject_template=null;
            }
            $template = DB::table('certificates')->where('cert_code', '=', 'teacher_card')->first();

            $currentYear = Carbon::now();
        if($teacher->initial_status==1){
            //$currentYear = $currentYear->addYears(1) ;
            $from = Carbon::parse($teacher->renew_date)->format('Y') ;
            $from=$from+1;
            $to=$teacher->renew_date;
            if(Carbon::parse($teacher->renew_date)->format('m')=='11' || Carbon::parse($teacher->renew_date)->format('m')=='12'){
                $template->cert_data = str_replace('{{ validFrom }}', "<strong>01-01-".$from . "</strong>", $template->cert_data);
                $template->cert_data = str_replace('{{ validTo }}', "<strong>31-12-".$from. "</strong>", $template->cert_data);//. Carbon::parse($teacher->to_valid_date)->format('d-m-Y') .
            }else{
                $template->cert_data = str_replace('{{ validFrom }}', "<strong>01-01-".$to->format('Y') . "</strong>", $template->cert_data);
                $template->cert_data = str_replace('{{ validTo }}', "<strong>31-12-".$to->format('Y'). "</strong>", $template->cert_data);
            }
            
        }else if($teacher->initial_status==0){
            $invoice=Invoice::when($teacher->payment_method, function($q) use ($teacher){
                $q->where('tranRef', '=', $teacher->payment_method);
            })
            ->where('student_info_id',$teacher->student_info_id)
            ->where('invoiceNo',"init_tec".$teacher->id)
            ->get();
            foreach($invoice as $i){
                $template->cert_data = str_replace('{{ validFrom }}', "<strong>" . Carbon::parse($i->dateTime)->format('d-m-Y') . "</strong>", $template->cert_data);
                $template->cert_data = str_replace('{{ validTo }}', "<strong>31-12-". Carbon::parse($i->dateTime)->format('Y'). "</strong>", $template->cert_data);//. Carbon::parse($teacher->to_valid_date)->format('d-m-Y') .
                
            }
            
            
        }else{
            if($teacher->renew_date!=null){
                //$currentYear = $currentYear->addYears(1) ;
                $from = $teacher->renew_date+1 ;
                $to=$teacher->renew_date;
                if(Carbon::parse($teacher->renew_date)->format('m')=='11' || Carbon::parse($teacher->renew_date)->format('m')=='12'){
                    $template->cert_data = str_replace('{{ validFrom }}', "<strong>01-01-".$from->format('Y') . "</strong>", $template->cert_data);
                    $template->cert_data = str_replace('{{ validTo }}', "<strong>31-12-".$from->format('Y'). "</strong>", $template->cert_data);//. Carbon::parse($teacher->to_valid_date)->format('d-m-Y') .
                }else{
                    $template->cert_data = str_replace('{{ validFrom }}', "<strong>01-01-".$to->format('Y') . "</strong>", $template->cert_data);
                    $template->cert_data = str_replace('{{ validTo }}', "<strong>31-12-".$to->format('Y'). "</strong>", $template->cert_data);
                }
            }else{
                $invoice=Invoice::when($teacher->payment_method, function($q) use ($teacher){
                    $q->where('tranRef', '=', $teacher->payment_method);
                })
                ->where('student_info_id',$teacher->student_info_id)
                ->where('invoiceNo',"init_tec".$teacher->id)
                ->get();
                foreach($invoice as $i){
                    $template->cert_data = str_replace('{{ validFrom }}', "<strong>" . Carbon::parse($i->dateTime)->format('d-m-Y') . "</strong>", $template->cert_data);
                    $template->cert_data = str_replace('{{ validTo }}', "<strong>31-12-".Carbon::parse($i->dateTime)->format('Y'). "</strong>", $template->cert_data);
                }
                
                
            }
        }
        if($teacher->from_valid_date!=null){
            $from_valid_date=Carbon::parse($teacher->from_valid_date)->format('d-m-Y');
            
        }else{
            $invoice=Invoice::where('student_info_id',$teacher->student_info_id)->first();
            $from_valid_date=Carbon::parse($invoice->dateTime)->format('d-m-Y');
            
        }

        $template->cert_data = str_replace('{{ userImage }}', $teacher->image, $template->cert_data);
        $template->cert_data = str_replace('{{ serialNo }}', $teacher->t_code, $template->cert_data);
        $template->cert_data = str_replace('{{ dated }}', "<strong>" . $from_valid_date . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ studentName }}', "<strong style='margin-left:10%;'>$teacher->father_name_eng</strong><span style='margin-left:5%;'>,$gender</span>", $template->cert_data);
        $template->cert_data = str_replace('{{ abaName }}', "<strong style='margin-left:5%;margin-right:5%;'>$teacher->name_eng</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ nrcNumber }}', "<strong>$teacher->nrc_state_region/$teacher->nrc_township($teacher->nrc_citizen)$teacher->nrc_number</strong>",$template->cert_data);
        $template->cert_data = str_replace('{{ gender }}', "$gender2", $template->cert_data);
        $template->cert_data = str_replace('{{ gender }}', "$gender2", $template->cert_data);
        $template->cert_data = str_replace('{{ courseAndSubject }}', $da_subject_template.$cpa_subject_template, $template->cert_data);
        $template->cert_data = str_replace('{{ officerName }}', "<strong>Kay Thi Sein</strong>", $template->cert_data);
        
        }
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
        
        $school = SchoolRegister::where('id', '=', $id)->get();

        foreach($school as $school){
            if($school->attend_course!="null"){
                $courseType = explode(',', $school->attend_course);
            }else{
                $courseType = explode(',', $school->renew_course);
            }
            
            collect($courseType)->map(function($val){
                return $val . " helll ";
            });
            
            $template = DB::table('certificates')->where('cert_code', '=', $req->course_code)->first();
            if($school->from_valid_date!=null){
                $reg_date=Carbon::createFromFormat('Y-m-d', $school->from_valid_date)->format('d-m-Y');
            }else{
                $invoice=Invoice::where('student_info_id',$school->student_info_id)
                                    ->where('invoiceNo',"init_sch".$school->id)
                                    ->first();
                //$currentDate = Carbon::now()->addYears(3) ;
                $reg_date=Carbon::createFromFormat('Y-m-d', $invoice->dateTime)->format('d-m-Y');
            }
            if($school->school_name!=null){
                $school_name=$school->school_name;
            }else{
                $school_name=$school->renew_school_name;
            }
            $school->nrc_state_region=$this->mm2engNumber($school->nrc_state_region);
            $school->nrc_township=$this->characters($school->nrc_township);
            $school->nrc_citizen=$this->citizens($school->nrc_citizen);
            $school->nrc_number=$this->mm2engNumber($school->nrc_number);

            if($school->eng_school_address!=null){
                $school_address=$school->eng_school_address;
            }else{
                $school_address=$school->renew_school_address;
            }
            if($school->initial_status==0){
                //$exp_date='31-12-'.date('Y');
                $invoice=Invoice::when($school->payment_method, function($q) use ($school){
                    $q->where('tranRef', '=', $school->payment_method);
                })
                ->where('student_info_id',$school->student_info_id)
                ->where('invoiceNo',"init_sch".$school->id)
                
                ->get();
                //$currentDate = Carbon::now()->addYears(3) ;
                foreach($invoice as $i){
                    $exp_date='31-12-'.Carbon::createFromFormat('Y-m-d', $school->to_valid_date)->format('Y');
                        
                }
                
            }else if($school->initial_status==1){
                $month=Carbon::createFromFormat('Y-m-d', $school->renew_date)->format('m');
                $exp_date=Carbon::createFromFormat('Y-m-d', $school->renew_date)->format('Y');
                $exp_date='31-12-'.$exp_date;
            }else{
                if($school->renew_date!=null){
                    $month=Carbon::createFromFormat('Y-m-d', $school->renew_date)->format('m');
                    $exp_date=Carbon::createFromFormat('Y-m-d', $school->renew_date)->format('Y');
                    $exp_date='31-12-'.$exp_date;
                }else{
                    // $exp_date='31-12-'.date('Y');
                    $invoice=Invoice::when($school->payment_method, function($q) use ($school){
                        $q->where('tranRef', '=', $school->payment_method);
                    })
                    ->where('student_info_id',$school->student_info_id)
                    ->where('invoiceNo',"init_sch".$school->id)
                    ->get();
                    foreach($invoice as $i){
                        $exp_date='31-12-'.Carbon::createFromFormat('Y-m-d', $school->to_valid_date)->format('Y');
                            
                    }
                }
            }
            $template->cert_data = str_replace('{{ issueDate }}', "" .  $school->s_code . " / " . $reg_date . "", $template->cert_data);
            $template->cert_data = str_replace('{{ schoolName }}', "" . $school_name . "", $template->cert_data);
            
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

            $template->cert_data = str_replace('{{ founder }}', "" . $school->name_eng . "", $template->cert_data);
            $template->cert_data = str_replace('{{ cscNo }}', "" . $school->nrc_state_region . "/" . $school->nrc_township ."(" . $school->nrc_citizen . ")" . $school->nrc_number . "", $template->cert_data);
            $template->cert_data = str_replace('{{ schoolLocation }}', "". $school_address ."", $template->cert_data);
            $template->cert_data = str_replace('{{ expDate }}', "". $exp_date ."", $template->cert_data);
            $template->cert_data = str_replace('{{ officerName }}', "<strong>Thandar Lay</strong>", $template->cert_data);

            $branch_school = tbl_branch_school::where('student_info_id', '=', $school->student_info_id)->get();
            if(strlen($branch_school) > 0){
            
                $branch_template = DB::table('certificates')->where('cert_code', '=', 'branch_school')->first();
                
                $branch_row = '';
                
                foreach($branch_school as $branch){
                    $branch_row .= "<tr><td>Branch</td><td>" . $branch->branch_school_address . "</td></tr>";
                }
    
                $branch_template->cert_data = str_replace('{{ branchRow }}', $branch_row, $branch_template->cert_data);
            }else{
                $branch_template = '';
            }
    
        }
        $className = '';
        
        
        return view('certificate.complete_certificate', compact('template', 'className', 'branch_template'));
    }

    public function getAuditCard(Request $req, $id){
        
        $audit = AccountancyFirmInformation::where('id', '=', $id)->first();
        // return $audit;
        $foa = $audit->firm_owner_audits;

        $template = DB::table('certificates')->where('cert_code', '=', 'audit_card')->first();
        // dd($audit->firm_owner_audits);
        $template->cert_data = str_replace('{{ issueDate }}', "<strong>" .  $audit->accountancy_firm_reg_no . " / " . $audit->register_date . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ FrimName }}', "<strong>" . $audit->accountancy_firm_name . "</strong>", $template->cert_data);
        $reg_date = strtotime($audit->register_date);
        $exp_date = Carbon::parse($reg_date)->format('Y');
        // return $exp_date;
        
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
        $template->cert_data = str_replace('{{ expDate }}', "<strong>". ($exp_date + 1) .'-'.'12'.'-'.'31'."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officerName }}', "<strong>Me Me Thet</strong>", $template->cert_data);

        $className = '';

        return view('certificate.complete_certificate', compact('template', 'className'));
    }

    public function getNonAuditCard(Request $req, $id){
        
        $audit = AccountancyFirmInformation::where('id', '=', $id)->first();
        $tos = json_decode($audit->type_of_service_provided_id);
        $template = DB::table('certificates')->where('cert_code', '=', 'non_audit_card')->first();

        $template->cert_data = str_replace('{{ issueDate }}', "<strong>" .  $audit->accountancy_firm_reg_no . " / " . $audit->register_date . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ FrimName }}', "<strong>" . $audit->accountancy_firm_name . "</strong>", $template->cert_data);
        $reg_date = strtotime($audit->register_date);
        $exp_date = Carbon::parse($reg_date)->format('Y');
        
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
            $template->cert_data = str_replace('{{ other }}', $audit->other , $template->cert_data);
        }

        $template->cert_data = str_replace('{{ founder }}', "<strong>" . $audit->name_of_sole_proprietor . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ cscNo }}', "<strong>" . $audit->dir_passport_csc . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officeLocation }}', "<strong>". $audit->head_office_address ."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ expDate }}', "<strong>". ($exp_date + 1) .'-'.'12'.'-'.'31'."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officerName }}', "<strong>Me Me Thet</strong>", $template->cert_data);

        $className = '';

        return view('certificate.complete_certificate', compact('template', 'className'));
    }

    public function getNonAuditForeignCard(Request $req, $id){
        
        $audit = AccountancyFirmInformation::where('id', '=', $id)->first();
        $tos = json_decode($audit->type_of_service_provided_id);
        $template = DB::table('certificates')->where('cert_code', '=', 'non_audit_foreign_card')->first();

        $template->cert_data = str_replace('{{ issueDate }}', "<strong>" .  $audit->accountancy_firm_reg_no . " / " . $audit->register_date . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ FrimName }}', "<strong>" . $audit->accountancy_firm_name . "</strong>", $template->cert_data);
        $reg_date = strtotime($audit->register_date);
        $exp_date = Carbon::parse($reg_date)->format('Y');
        
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
            $template->cert_data = str_replace('{{ other }}', $audit->other , $template->cert_data);
        }

        $template->cert_data = str_replace('{{ founder }}', "<strong>" . $audit->name_of_sole_proprietor . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ cscNo }}', "<strong>" . $audit->dir_passport_csc . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officeLocation }}', "<strong>". $audit->head_office_address ."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ expDate }}', "<strong>". ($exp_date + 1) .'-'.'12'.'-'.'31'."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ officerName }}', "<strong>Me Me Thet</strong>", $template->cert_data);

        $className = '';

        return view('certificate.complete_certificate', compact('template', 'className'));
    }

    public function getCertificate(Request $req, $id)
    {
        $helper = new Helper;
        // return $id;
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
                ->select('st.name_mm','st.name_eng', 'st.nrc_state_region', 'st.nrc_township','b.number as batch_number',
                        'st.nrc_citizen', 'st.nrc_number', 'st.father_name_mm','st.father_name_mm','st.father_name_mm','st.father_name_eng',
                        'ex.result', 'er.date', 'er.grade', 'c.name_mm as course_name_mm','c.name as course_name_eng', 'b.name_mm as batch_name'
                        ,'er.passed_level','b.number as batch_number','st.gender','st.personal_no', 'st.cpersonal_no', 'st.gender', 'st.image'
                        )
                ->first();

        if($student == null){
            return "<h1 style='color:red;'>Selected User not found in Database.</h1>";
        }

      
        list($exam_date,$exam_month, $exam_year) = explode('-', $student->date ?? "02-Jan-2021");

        list($curYear, $curMth, $curDay) = explode('-', date('Y-M-d'));
        // return $helper::$BASE_URL.$student->image;
        // $da_cpa_card = $req->course_code == "da_2" ? 'da_card' : "cpa_card";
        $template = DB::table('certificates')->where('cert_code', '=', "da_card")->first();
        $template->cert_data = str_replace('{{ userImage }}', $helper::$BASE_URL.$student->image, $template->cert_data);
      
        
        $template->cert_data = str_replace('{{ batch_num_eng }}', "<strong> $student->batch_number </strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ batch_num_mm }}', "<strong>". $this->en2mmNumber($student->batch_number)." </strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ studentName_mm }}', "<strong>".$student->gender == 1 ? 'မောင်' : 'မ'.$student->name_mm."</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ studentName_eng }}', "<strong>".$student->gender == 1 ? 'Mg ' : 'Ma '.$student->name_eng."</strong>", $template->cert_data);


        $template->cert_data = str_replace('{{ father_name_mm }}', "<strong>$student->father_name_mm</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ father_name_eng }}', "<strong>$student->father_name_eng</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ nrcNumber_mm }}', "<strong>$student->nrc_state_region/$student->nrc_township($student->nrc_citizen)$student->nrc_number</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ nrcNumber_eng }}', "<strong>$student->nrc_state_region/$student->nrc_township($student->nrc_citizen)$student->nrc_number</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ date_mm }}', "<strong>" . $this->en2mmNumber(date('d-m-Y')) . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ date_eng }}', "<strong>" . date('d-m-Y') . "</strong>", $template->cert_data);


        $template->cert_data = str_replace('{{ examYear }}', "<strong>" . $this->en2mmNumber($exam_year) . "</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ examMonth }}', "<strong>" . $this->en2mmMonthName($exam_month) . "</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ year_month_eng }}', "<strong>" .$this->en2mmMonthName($exam_month)."/".$exam_year . "</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ courseName_mm }}', "<strong>$student->course_name_mm </strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ courseName_eng }}', "<strong>$student->course_name_eng </strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ child_mm }}', "<strong>". $this->gender2child($student->gender,"mm") . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ child_eng }}', "<strong>". $this->gender2child($student->gender,"eng") . "</strong>", $template->cert_data);
        
        $personal_no_mm = $req->course_code == "da_2" ? $this->en2mmNumber($student->personal_no) : $this->en2mmNumber($student->cpersonal_no);
        $personal_no_eng = $req->course_code == "da_2" ? $student->personal_no : $student->cpersonal_no;

        $template->cert_data = str_replace('{{ roll_number_mm }}', "<strong>". $personal_no_mm . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ roll_number_eng }}', "<strong>". $personal_no_eng . "</strong>", $template->cert_data);
         
        $certi_title_mm = $req->course_code == "da_2" ? "ဒီပလိုမာစာရင်းကိုင်လက်မှတ်" : "လက်မှတ်ရပြည်သူ့စာရင်းကိုင်စာမေးပွဲအောင်လက်မှတ်";
        $certi_title_eng = $req->course_code == "da_2" ? "Deploma in Accountancy Certificate" : "Certified Public Accountant Examination Council";
        
        $template->cert_data = str_replace('{{ certificate_title_mm }}', "<strong>". $certi_title_mm . "</strong>", $template->cert_data);
        $template->cert_data = str_replace('{{ certificate_title_eng }}', "<strong>". $certi_title_eng . "</strong>", $template->cert_data);

        
        $template->cert_data = str_replace('{{ grade }}', "<strong>$student->grade</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ officerName }}', "<strong>သန္တာလေး</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ yearMM }}', "<strong>". $this->en2mmNumber($curYear) . "</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ monthMM }}', "<strong>" . $this->en2mmMonthName($curMth) . "</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ dayMM }}', "<strong>" . $this->en2mmNumber($curDay) . "</strong>", $template->cert_data);

        $className = 'border-style';

                
        return view('certificate.complete_certificate', compact('template', 'className','student'));
    }


    private function en2mmMonthName($month)
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

    private function gender2child($gender,$type)
    {
        if($type == "mm"){
            $child = $gender == 1 ? "သား/<s>သမီး</s>" : "<s>သား</s>/သမီး";
        }else{
            $child = $gender == 1 ? "son/<s>daughter</s>" : "<s>son</s>/daughter";
        }
        return $child;

    }
    private function mm2engNumber($number)
    {
        $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        $my = ['၀','၁', '၂', '၃', '၄', '၅', '၆', '၇', '၈', '၉'];

        return str_replace($my, $en, $number);
    }
    private function citizens($number)
    {
        $en = ['N','E','P'];

        $my = ['နိုင်','ဧည့်','ပြု'];

        return str_replace($my, $en, $number);
    }
    private function characters($number)
    {
        $en = ['Ka','Kha','Ga','Gha','Nga','Sa','Hsa','Za','Zha','Nya','Dd','Nha','Ta','Hta','Da','Dha','Na','Pa','Pha','Bha','Ba','Ma','Ya','Ra','La','Wa','Tha','Ha','Ll', 'Ah','U','E'];

        $my = ['က','ခ','ဂ','ဃ' ,'င' ,'စ' ,'ဆ' ,'ဇ' ,'ဈ','ည' ,'ဎ','ဏ' ,'တ' ,'ထ' ,'ဒ' ,'ဓ','န' ,'ပ' ,'ဖ' ,'ဗ' ,'ဘ','မ' ,'ယ','ရ' ,'လ' ,'ဝ' ,'သ','ဟ','ဠ' ,'အ','ဥ' ,'ဧ'];

        return str_replace($my, $en, $number);
    }
}
