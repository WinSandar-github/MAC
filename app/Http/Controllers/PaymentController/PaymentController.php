<?php

namespace App\Http\Controllers\PaymentController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentInfo;
use App\StudentCourseReg;
use App\TransactionLog;
use App\Invoice;
use App\CPAFF;
use App\PAPP;
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

        // return dd($student);

    }

    public function getInvoice($id, $form_type)
    {
        if($id != ""){
            
            $invoice = Invoice::where('student_info_id', $id)->where('invoiceNo', '=', $form_type)->first();
           
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

                $stu = Invoice::where('email', '=', $req->userDefined2)->first();
                
                $trans = new TransactionLog();
                $trans->student_info_id = $stu->student_info_id;
                $trans->paymentType = $req->payment_type;
                $trans->marchantID = $req->merchantID;
                $trans->respCode = $req->respCode ?? "N/A";
                $trans->pan = $req->pan ?? "N/A";
                $trans->amount = $req->amount  ?? "N/A";
                $trans->invoiceNo = $req->invoiceNo  ?? "N/A";
                $trans->transRef = $req->tranRef  ?? "N/A";
                $trans->approvalCode = $req->approvalCode ?? "N/A";
                $trans->dateTime = $req->dateTime ?? "N/A";
                $trans->status = $req->status ?? '0';
                $trans->failReason = $req->failReason ?? "N/A";
                $trans->userDefined1 = $req->userDefined1 ?? "N/A";
                $trans->userDefined2 = $req->userDefined2 ?? "N/A";
                $trans->userDefined3 = $req->userDefined3 ?? "N/A";
                $trans->categroyCode = $req->categroyCode ?? "N/A";
                $trans->hashValue = $req->hashValue;

                if($trans->save()){

                    if($trans->status == 'AP'){
                        $invoice = Invoice::where('student_info_id', '=', $req->student_info_id)->first();
                        $stu->invoiceNo = $req->invoiceNo;
                        $stu->status = $req->status;
                        $stu->save();

                        //reg_no and payment_date for CPAFF
                        $cpaff = CPAFF::where('student_info_id', $req->student_info_id)->first();
                        $cpaff_type = $cpaff->is_renew;
                        if($cpaff_type == 0){
                            generateCpaffNo($cpaff->id);
                        }else if($cpaff_type == 1){
                            generateCpaffPaymentDate($cpaff->id);
                        }//end cpaff

                        //reg_no and payment_date for PAPP
                        $papp = PAPP::where('student_id', $req->student_info_id)->first();
                        $papp_type = $papp->type;
                        if($papp_type == 0){
                            generatePappNo($papp->id);
                        }else if($papp_type == 1){
                            generatePappPaymentDate($papp->id);
                        }//end papp
                        
                        //reg_no and payment_date for audit firm
                        $audit = AccountancyFirmInformation::where('student_info_id', $req->student_info_id)->first();
                        if($audit->local_foreign_type != null && $audit->local_foreign_type != ""){
                            generateNonAuditNo($audit->id);
                        }else{
                            generateAuditNo($audit->id);
                        }//end audit and non-audit firm
                    }

                    return response()->json(["message" => "Payment Data Saved!"], 200);
                }
                return response()->json(["message" => "Error While Data Save!"], 501);
            }
            return response()->json(["message" => "No Data Provide from Client!"], 500);
	} catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function getPaymentByInvoiceNo($invoiceNo)
    {
        $data = Invoice::where('invoiceNo',$invoiceNo)->first();
        return response()->json($data,200);
    }

    public function getPaymentByInvoiceNoForStudent($invoiceNo,$studentID)
    {
        $data = Invoice::where('invoiceNo',$invoiceNo)->
                        where('student_info_id',$studentID)->first();
        return response()->json($data,200);
    }
}
