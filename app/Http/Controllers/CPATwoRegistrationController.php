<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CpaTwoRegistration;
use App\CpaOneRegistration;
use Illuminate\Support\Facades\File; 

class CPATwoRegistrationController extends Controller
{
    public function index()
    {
        $cpa_one_reg = CpaTwoRegistration::with('cpa_one')->get();
         return response()->json([
            'data' => $cpa_one_reg
        ],200);
    }

    public function store(Request $request)
    {
        // $data = CpaOneRegistration::where('nrc_state_region', '=', $request['nrc_state_region'])
        // ->where('nrc_township', '=', $request['nrc_township'])
        // ->where('nrc_citizen', '=', $request['nrc_citizen'])
        // ->where('nrc_number', '=', $request['nrc_number'])
        // ->first();
        // if($data)
        // {
        //     return "NRC has been used, please check again!";
        // }
       
        $cpa_two_reg = new CpaTwoRegistration();
        $cpa_two_reg->cpa_one_id =   $request->cpa_one_id;
        $cpa_two_reg->cpa_one_pass_date =   date('Y-m-d',strtotime($request->cpa_one_pass_date));
        $cpa_two_reg->cpa_one_access_no         =   $request->cpa_one_access_no;
        $cpa_two_reg->cpa_one_success_no       =   $request->cpa_one_success_no;
        $cpa_two_reg->enrol_no_exam       =   $request->enrol_no_exam;
        $cpa_two_reg->attendance = $request->attendance;
        $cpa_two_reg->fail_exam  =   $request->fail_exam;
        $cpa_two_reg->resigned   =   $request->resigned;
        $cpa_two_reg->batch_session_no    =   $request->batch_session_no;
        $cpa_two_reg->entrance_part =   $request->entrance_part;
        $cpa_two_reg->entrance_exam_no =   $request->entrance_exam_no;
        $cpa_two_reg->cpa_two_type=   $request->cpa_two_type;
        $cpa_two_reg->status           =  0;
        $cpa_two_reg->save();
        
         return response()->json([
            'message' => "Insert Successfully"
        ],200);
         
    }
    public function show($id)
    {
        $cpa_one_reg = CpaTwoRegistration::where('id',$id)->with('cpa_one')->get();
        return $cpa_one_reg;
    }
    
    public function approve($id)
    {
        
        $approve = CpaTwoRegistration::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function reject($id)
    {
        $reject = CpaTwoRegistration::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }
}
