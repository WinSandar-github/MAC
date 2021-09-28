<?php

namespace App\Http\Controllers\CertificateController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ExamRegister;
use DB;

class CertificateController extends Controller
{
    public function index($id)
    {
        $student = DB::table('student_infos as st')->where('st.id', $id)
                ->join('exam_result as ex', 'ex.student_info_id', 'st.id')
                ->join('exam_register as er', 'er.student_info_id', 'st.id')
                ->join('batches as b', 'b.id', 'er.batch_id')
                ->join('courses as c', 'c.id', 'b.course_id')
                ->select('st.name_mm', 'st.nrc_state_region', 'st.nrc_township', 
                        'st.nrc_citizen', 'st.nrc_number', 'st.father_name_mm',
                        'ex.result', 'er.date', 'er.grade', 'c.name as course_name', 'b.name as batch_name'
                        )
                ->first();

        list($exam_month, $exam_year) = explode('-', $student->date);

        list($curYear, $curMth, $curDay) = explode('-', date('Y-M-d'));

        $template = DB::table('certificates')->first();

        $template->cert_data = str_replace('{{ studentName }}', "<strong>$student->name_mm</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ abaName }}', "<strong>$student->father_name_mm</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ nrcNumber }}', "<strong>$student->nrc_state_region/$student->nrc_township($student->nrc_citizen)$student->nrc_number</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ examYear }}', "<strong>$exam_year</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ examMonth }}', "<strong>$exam_month</strong>", $template->cert_data);

        $template->cert_data = str_replace('{{ courseName }}', "<strong>$student->course_name ($student->batch_name)</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ grade }}', "<strong>$student->grade</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ officerName }}', "<strong>သန္တာလေး</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ yearMM }}', "<strong>$curYear</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ monthMM }}', "<strong>$curMth</strong>", $template->cert_data);
        
        $template->cert_data = str_replace('{{ dayMM }}', "<strong>$curDay</strong>", $template->cert_data);

        return view('certificate.complete_certificate', compact('template'));
    }
}
