<?php

namespace App\Http\Controllers\PaymentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentInfo;
use DB;

class PaymentController extends Controller
{
    public function index($id, $fee_type = ['form_fee', 'selfstudy_registration_fee', '' , '', ''])
    {
        // return StudentInfo::where('id', $id)->get();

        $c = '';
        foreach($fee_type as $f){
            $c .= 'c.' . $f . ',' ;
        }

       list($ff, $ss, $mac, $ps, $ex) = $fee_type ;

        $student = DB::table('student_infos as si')
                        ->join('courses as c', 'c.id', '=', 'si.course_type_id')
                        ->where('si.id', $id)
                        ->select('si.id', 'si.name_mm as student_name', 'si.email as student_email', 'si.phone as student_phone',
                            'c.name_mm as course_name', 'c.' . $ff, 'c.' . $ss, 'c.' . $mac, 'c.' . $ps, 'c.' . $ex,
                            // 'c.' . $fee_type ,
                            // 'c.selfstudy_registration_fee', 'c.privateschool_registration_fee',
                            // 'c.mac_registration_fee', 'c.exam_fee', 'c.tution_fee'
                        )
                        ->first();

        $invNo = str_pad($student->id, 20, "0", STR_PAD_LEFT);

        $student->invoice_number = $invNo;

        return dd($student);

    }
}
