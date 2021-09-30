<?php

namespace App\Http\Controllers\QualifiedTest;

use App\StudentInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QualifiedTest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class QualifiedTestController extends Controller
{
    public function index()
    {

    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $data = StudentInfo::where('nrc_state_region', '=', $request['nrc_state_region'])
            ->where('nrc_township', '=', $request['nrc_township'])
            ->where('nrc_citizen', '=', $request['nrc_citizen'])
            ->where('nrc_number', '=', $request['nrc_number'])
            ->first();
        
        if($data)
        {
            return response()->json([
                'message' => "မှတ်ပုံတင်ရှိပြီးသားဖြစ်ပါသည်",
                'status' => 'nrcexit'
            ],202);
        }

        $email = $request->email;
        $emailcheck = StudentInfo::where('email', '=', $email)->first();
        if($emailcheck)
        {
            return response()->json([
                'message' => "Email အသုံပြုပြီးသားဖြစ်ပါသည်",
                'status' => 'emailexit'
            ],202);
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $image = '/storage/student_info/'.$name;
        } 

        if($request->hasfile('certificate'))
        {
            foreach($request->file('certificate') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                $file->move(public_path().'/storage/student_info/',$name);
                $certificate[] = '/storage/student_info/'.$name;
            }        
        }else{
            $certificate = null;
        }


        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        } 

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        } 

        $date_of_birth = $request->date_of_birth;
        $date = date('d-M-Y');;

        $student_info = new StudentInfo();
        $student_info->name_mm                  =   $request->name_mm;
        $student_info->name_eng                 =   $request->name_eng;
        $student_info->nrc_state_region         =   $request['nrc_state_region'];
        $student_info->nrc_township             =   $request['nrc_township'] ;
        $student_info->nrc_citizen              =   $request['nrc_citizen'] ;
        $student_info->nrc_number               =   $request['nrc_number'];
        $student_info->nrc_front                =   $nrc_front;
        $student_info->nrc_back                 =   $nrc_back;
        $student_info->father_name_mm           =   $request->father_name_mm;
        $student_info->father_name_eng          =   $request->father_name_eng;
        $student_info->race                     =   $request->race;
        $student_info->religion                 =   $request->religion;
        $student_info->date_of_birth            =   $date_of_birth;
        $student_info->address                  =   $request->address;
        $student_info->current_address          =   $request->current_address;
        $student_info->phone                    =   $request->phone;
        $student_info->image                    =   $image;
        $student_info->approve_reject_status    =  0;
        $student_info->date                     =   $date; 
        $student_info->email                    =   strtolower($request->email);
        $student_info->course_type_id           =   3;
        $student_info->password                 =   Hash::make($request->password);
        $student_info->verify_code              =   $request->verify_code;
        $student_info->payment_method           =   $request->payment_method;
        if($student_info->save()){
            $qualifiedtest = new QualifiedTest;
            $qualifiedtest->student_info_id             = $student_info->id;
            $qualifiedtest->current_job                 = $request->current_job;
            $qualifiedtest->local_education             = json_encode($request->edu_status_local);
            $qualifiedtest->foreign_education           = $request->edu_status_foreign;
            $qualifiedtest->organization_name           = $request->organization_name;
            $qualifiedtest->organization_address        = $request->organization_address;
            $qualifiedtest->organization_email          = $request->organization_email;
            $qualifiedtest->exam_date                   = $request->exam_date;
            $qualifiedtest->exam_reg_no                 = $request->exam_register_no;
            $qualifiedtest->approve_reject_status       = $request->approve_reject_status;
            $qualifiedtest->know_policy                 = $request->submit_confirm_policy;
            $qualifiedtest->local_education_certificate = json_encode($certificate);
            $qualifiedtest->save();
            return response()->json([
                'message' => "You have successfully register",
            ],200);
        }
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function get_user(Request $request){
        $qt = QualifiedTest::with('studentinfo')
            ->where('approve_reject_status',$request->status)
            ->get();
      
        return DataTables::of($qt)
            ->addColumn('action', function ($infos) {
                if($infos->grade == 1){
                    return "<div class='btn-group'>
                                <a href='" . route("entry_exam_detail", ['id' => $infos->id]) . "'class='btn btn-primary btn-xs'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </a>
                                <a href='#' class='btn btn-info btn-xs' >
                                    <li class='fa fa-file-text-o fa-sm'></li>
                                </a>
                            </div>";
                }
                return "<div class='btn-group'>
                            <a href='entry_exam_detail/$infos->id' class='btn btn-primary btn-xs' >
                                <li class='fa fa-eye fa-sm'></li>
                            </a>
                        </div>";
            })
            ->addColumn('status', function ($infos){
              if($infos->approve_reject_status == 0){
                  return "PENDING";
              }else if($infos->approve_reject_status == 1){
                  return "APPROVED";
              }else{
                  return "REJECTED";
              }
            })
            // ->addColumn('remark', function ($infos){
            //     if($infos->grade == 0){
            //       return "-";
            //     }
            //     else if($infos->grade == 1){
            //       return "PASSED";
            //     }
            //     else{
            //       return "FAILED";
            //     }
            // })
            // , 'print','exam_type''module'
            ->rawColumns(['action','status'])
            ->make(true);
    }
}
