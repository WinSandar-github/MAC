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
        if($request->date){
            $date = $request->date;
        }else{
            $date = date('Y-m-d');
        }
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
                $student_register->invoice_id = $request->student_id;
                $student_register->invoice_date = $invoice_date;
                // $student_register->academic_year=$request->academic_year;
                // $student_register->direct_access_no=$request->direct_access_no;
                // $student_register->entry_success_no=$request->entry_success_no;
                // $student_register->module=$request->module;
                // $student_register->batch_part_no = $request->batch_part_no;
                $student_register->type = $request->type;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;
                $student_register->save();
                return "You have successfully registerd!";
                break;
            case 1:
                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;
                $student_register->private_school_name = $request->private_school_name;
                $student_register->academic_year = $request->academic_year;
                $student_register->direct_access_no = $request->direct_access_no;
                $student_register->entry_success_no = $request->entry_success_no;
                $student_register->cpa_one_pass_date = $request->cpa_one_pass_date;
                $student_register->cpa_one_access_no = $request->cpa_one_access_no;
                $student_register->cpa_one_success_no = $request->cpa_one_success_no;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;
                $student_register->save();
                return "You have successfully registerd!";
                break;
            case 2:
                if ($request->hasfile('good_behavior')) {
                    $file = $request->file('good_behavior');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/student_info/',$name);
                    $good_behavior = '/storage/student_info/'.$name;
                }
                else{
                    $good_behavior="";
                }
                if ($request->hasfile('no_crime')) {
                    $file = $request->file('no_crime');
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/student_info/',$name);
                    $no_crime = '/storage/student_info/'.$name;
                }
                else{
                    $no_crime="";
                }
                $student_register = new StudentRegister();
                $student_register->student_info_id = $request->student_id;
                $student_register->date = $date;
                $student_register->invoice_id = $request->student_id;;
                $student_register->invoice_date = $invoice_date;
                $student_register->type = $request->type;                
                $student_register->academic_year=$request->academic_year;
                $student_register->direct_access_no=$request->direct_access_no;
                $student_register->entry_success_no=$request->entry_success_no;
                $student_register->internship=$request->internship;
                $student_register->good_behavior=$good_behavior;
                $student_register->no_crime=$no_crime;
                $student_register->module=$request->module;
                $student_register->cpa_one_pass_date = $request->cpa_one_pass_date;
                $student_register->cpa_one_access_no = $request->cpa_one_access_no;
                $student_register->cpa_one_success_no = $request->cpa_one_success_no;
                $student_register->status = 0;
                $student_register->form_type = $request->form_type;
                $student_register->save();
                return "You have successfully registerd!";
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
            'data' =>$approve->form_type
        ],200);
    }

    public function rejectStudent($id)
    {
        $reject = StudentRegister::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'data' =>$reject->form_type
        ],200);
    }
}
