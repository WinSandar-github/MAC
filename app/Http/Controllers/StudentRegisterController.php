<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentRegister;
use App\StudentInfo;

class StudentRegisterController extends Controller
{
    public function index()
    {
        $student_infos = StudentInfo::with('student_register')->get();
        return response()->json([ 'data' => $student_infos],200);
    }

    public function store(Request $request)
    {
        $date = date('Y-m-d');
        $invoice_date = date('Y-m-d');
        switch ($request->type) {
            case 0:
                foreach($request->reg_reason as $reg_reason){
                    $registration_reason[] = $reg_reason;
                }
                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->reg_reason = implode(",",$registration_reason);
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;
                $student_register->status = 0;
                $student_register->save();
                return "success";
                break;
            case 1:
                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;
                $student_register->status = 0;
                $student_register->save();
                return "success";
                break;
            case 2:
                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;
                $student_register->status = 0;
                $student_register->save();
                return "success";
                break;
        }
        
    }

    public function show($id)
    {
        $student_register = StudentInfo::where('id',$id)->with('student_register')->get();
        return response()->json([
            'data' => $student_register
        ],200);
        
    }

    public function approveStudent($id)
    {
        $approve = StudentRegister::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that student!"
        ],200);
    }

    public function rejectStudent($id)
    {
        $reject = StudentRegister::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that student!"
        ],200);
    }
}
