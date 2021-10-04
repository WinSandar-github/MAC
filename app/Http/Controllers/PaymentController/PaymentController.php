<?php

namespace App\Http\Controllers\PaymentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentInfo;
use App\StudentCourseReg;
use App\Invoice;
use Illuminate\Support\Str;
use DB;

class PaymentController extends Controller
{
    public function index($id, $fee_type = ['form_fee', 'selfstudy_registration_fee', '' , '', ''])
    {
      
        return $std = StudentCourseReg::with('batch')->first();

        return "Application Fee, " . $std->batch->course->name;


        $student = DB::table('student_infos as si')
                        ->join('courses as c', 'c.id', '=', 'si.course_type_id')
                        // ->where('si.id', $id)
                        ->select('si.id', 'si.name_mm as student_name', 'si.email as student_email', 'si.phone as student_phone',
                            'c.name_mm as course_name', 
                            // 'c.' . $ff, 'c.' . $ss, 'c.' . $mac, 'c.' . $ps, 'c.' . $ex,
                            'c.*'
                            // 'c.selfstudy_registration_fee', 'c.privateschool_registration_fee',
                            // 'c.mac_registration_fee', 'c.exam_fee', 'c.tution_fee'
                        )
                        ->first();

        // $invNo = str_pad($student->id, 20, "0", STR_PAD_LEFT);

        // $student->invoice_number = $invNo;

        return dd($student);

    }

    public function getInvoice($id)
    {
        if($id != ""){
            
            $invoice = Invoice::where('student_info_id', $id)->first();
            
            $invNo = str_pad( date('Ymd') . "-" . Str::upper(Str::random(5)) . '-' . $invoice->student_info_id, 20, "0", STR_PAD_LEFT);

            $invoice->invoiceNo = mb_strlen($invNo) > 20 ? substr($invNo, -20) : $invNo;

            return response()->json($invoice, 200);
        }
        return response()->json(["message" => "No Data Provide from Client!"], 500);
    }

    public function saveTransation(Request $req)
    {
        try {
            if($req){

                $stu = Invoice::where('email', $req->userDefined2)->first();

                $trans = new Transaction();
                $trans->student_info_id = $stu->student_info_id;
                $trans->paymentType = $req->paymentType;
                $trans->marchantID = $req->marchantID;
                $trans->respCode = $req->respCode;
                $trans->pan = $req->pan;
                $trans->amount = $req->amount;
                $trans->invoiceNo = $req->invoiceNo;
                $trans->transRef = $req->transRef;
                $trans->approvalCode = $req->approvalCode;
                $trans->dateTime = $req->dateTime;
                $trans->status = $req->status;
                $trans->failReason = $req->failReason;
                $trans->userDefined1 = $req->userDefined1;
                $trans->userDefined2 = $req->userDefined2;
                $trans->userDefined3 = $req->userDefined3;
                $trans->categroyCode = $req->categroyCode;
                $trans->hashValue = $req->hashValue;

                if($trans->save()){

                    if($trans->status == 'AP'){
                        $invoice = Invoice::where('student_info_id', '=', $req->student_info_id)->first();
                        $invoice->invoiceNo = $req->invoiceNo;
                        $invoice->status = $req->status;
                        $invoice->save();
                    }

                    return response()->json(["message" => "Payment Data Saved!"], 200);
                }
                return response()->json(["message" => "Error While Data Save!"], 500);
            }
            return response()->json(["message" => "No Data Provide from Client!"], 500);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
}
