<?php

namespace App\Http\Controllers\QualifiedTest;

use App\StudentInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QualifiedTest;
use App\ExamResult;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Course;
use App\Invoice;



class QualifiedTestController extends Controller
{
    public function index()
    {
        

    }
    public function create()
    {
        //
    }

    public function qualifyTestDetail($id)
    {
       return view("pages.qualified_test.qualified_test_detail");
    }
    public function qualifyTestFillMark($id)
    {
       return view("pages.qualified_test.qt_fill_mark");
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
        $student_info->gender                   =   $request->gender;
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
            $qualifiedtest->office_address             = $request->office_address;
            $qualifiedtest->grade                      = 0;
            $qualifiedtest->other_edu_foreign          = $request->other_edu_foreign;
            $qualifiedtest->save();
            // $std = StudentCourseReg::with('batch')->where("student_info_id", $student_info->id)->first();
            $course = Course::where('code','cpaqualifiedtest_3')->first();

            $invoice = new Invoice();
            $invoice->student_info_id = $student_info->id;
            $invoice->name_eng            = $student_info->name_eng;
            $invoice->email           = $student_info->email;
            $invoice->phone           = $student_info->phone;
            $invoice->productDesc     = 'Application Fee,QT Exam Fee';
            $invoice->amount          = $course->form_fee.','.$course->exam_fee;
            $invoice->status          = 0;  
            $invoice->invoiceNo       = "";
            $invoice->save();

          
            return response()->json([
                'message' => "You have successfully register",
            ],200);
        }
    }
    public function show($id)
    {
        $qualified_test =  QualifiedTest::where('id',$id)->with('student_info')->first();
        return response()->json([
            'data' => $qualified_test
        ],200);
     }
    public function edit($id)
    {
        
    }
    public function update(Request $request, $id)
    {
         
        
    
 

    if ($request->hasfile('image')) {
        $file = $request->file('image');
        $name  = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path().'/storage/student_info/',$name);
        $image = '/storage/student_info/'.$name;
    }else{
        $image = $request->old_image;
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
        if($request->old_certificate){
            $certificate = json_decode($request->old_certificate);
        }else{

            $certificate = null;
        }
    }


    if ($request->hasfile('nrc_front')) {
        $file = $request->file('nrc_front');
        $name  = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path().'/storage/student_info/',$name);
        $nrc_front = '/storage/student_info/'.$name;
    }else{
        $nrc_front = $request->old_nrc_front;
    }

    if ($request->hasfile('nrc_back')) {
        $file = $request->file('nrc_back');
        $name  = uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path().'/storage/student_info/',$name);
        $nrc_back = '/storage/student_info/'.$name;
    }else{
        $nrc_back = $request->old_nrc_back;
    }

    $date_of_birth = $request->date_of_birth;
    $date = date('d-M-Y');;

    $student_info = StudentInfo::where('id',$request->student_info_id)->first();
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
    $student_info->gender                   =   $request->gender;
    $student_info->race                     =   $request->race;
    $student_info->religion                 =   $request->religion;
    $student_info->date_of_birth            =   $date_of_birth;
    $student_info->address                  =   $request->address;
    $student_info->current_address          =   $request->current_address;
    $student_info->phone                    =   $request->phone;
    $student_info->image                    =   $image;
    $student_info->approve_reject_status    =  0;
    $student_info->date                     =   $date; 

    $student_info->course_type_id           =   3; 
    if($student_info->save()){
        $qualifiedtest = QualifiedTest::find($id);
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
        if($request->edu_status_foreign == 3){

            $qualifiedtest->other_edu_foreign          = $request->other_edu_foreign;
        }else{
            $qualifiedtest->other_edu_foreign  = NULL;

        }
        $qualifiedtest->office_address             = $request->office_address;
        $qualifiedtest->save();
        return response()->json([
            'message' => "You have successfully updated",
        ],200);
    }
    }
    public function destroy($id)
   
    {
        //
    }
    public function get_user(Request $request){
        $qt = QualifiedTest::with('student_info')
            ->where('approve_reject_status',$request->status)
            ->get();
        ;
          
            


    
        return DataTables::of($qt)
            ->addColumn('action', function ($infos) {
               
                    return "<div class='btn-group'>
                                <a href='qualify_test_detail/$infos->id' class='btn btn-primary btn-xs'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </a>
                                </div>";
                                // <a href='#' class='btn btn-info btn-xs' >
                                //     <li class='fa fa-file-text-o fa-sm'></li>
                                // </a>
              
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
            ->addColumn('local_edu', function ($infos) {
                $local_arr = [];
                $local_edu_arr = json_decode($infos->local_education);
                foreach($local_edu_arr as $local){
                    array_push($local_arr,"<p> - " . Str::limit($local, 30, '...') . "</p>");
                }
                return str_replace(',', '', implode(',', $local_arr));
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
            ->rawColumns(['action','status','local_edu'])
            ->make(true);
    }

    public function approveQT($id)
    {
        $approve = QualifiedTest::find($id);
        $approve->approve_reject_status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that form!"
        ], 200);
    }

    public function rejectQT($id)
    {
        $reject = QualifiedTest::find($id);
        $reject->approve_reject_status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that form!"
        ], 200);
    }

    public function filterQTResult(Request $request){
      
 
        $qualified_test = QualifiedTest::with('student_info')
                        ->where('approve_reject_status','=',1)
                        ->where('grade','=',$request->grade)
                         ->get();
 
 
        
          return DataTables::of($qualified_test)
                ->addColumn('action', function ($infos) {

                    
                    return "<div class='btn-group'>
                                <a href='qt_fill_mark/$infos->id' class='btn btn-primary btn-xs' >
                                    <li class='fa fa-eye fa-sm'></li>
                                </a>
                            </div>";
                })
                ->addColumn('remark', function ($infos){
                    if($infos->grade == 0){
                        return "-";
                    }
                    else if($infos->grade == 1){
                        return "PASSED";
                    }
                    else{
                        return "FAIED";
                    }
                })
                ->addColumn('foreign_edu', function ($infos){
                    if($infos->foreign_education == 0){
                        return "ACCA";
                    }
                     
                    else{
                        return "CIMA";
                    }
                })
                ->addColumn('local_edu', function ($infos) {
                    $local_arr = [];
                    $local_edu_arr = json_decode($infos->local_education);
                    foreach($local_edu_arr as $local){
                        array_push($local_arr,"<p> - " . Str::limit($local, 30, '...') . "</p>");
                    }
                    return str_replace(',', '', implode(',', $local_arr));
                })
                ->rawColumns(['action','remark','local_edu','foreign_edu'])
                ->make(true);
                
                // ->addColumn('exam_type', function ($infos){
                   
                //     return "Qualified Test";
                //     } 
                // })
        
    }

    public function fillMarkQt(Request $request)
    {
        
        foreach($request->subject as $sub)
        {
            $subjects[] = $sub;
        }
        foreach($request->mark as $m)
        {
            $marks[] = $m;
        }
        foreach($request->grade as $g)
        {
            $grades[] = $g;
        }
        $date = date('Y-m-d');               
        
       
        $qualified_test = QualifiedTest::where('id',$request->id)->first();
        if($request->pass_fail === 'pass')
        {
            $qualified_test->grade = 1;
        }else
        {
            $qualified_test->grade = 2;

        }
      
        $qualified_test->save();
         
         
        $date = date('Y-m-d');
        $exam_result=new ExamResult;                
        $exam_result->student_info_id=$qualified_test->student_info_id;
        $exam_result->registeration_id=$qualified_test->id;
        $exam_result->result=json_encode(['subjects'=>$subjects,'marks'=>$marks,'grades'=>$grades]);;
        $exam_result->date=$date;
        $exam_result->save();

        return response()->json($exam_result,200);
    }

    public function currentQualifiedTestList()  
    {
         
        return view('reporting.current_qualifiedtest_list');
    }

    public function publishesQualifiedTestResult()  
    {
         
        return view('reporting.publishes_qualifiedtest_result');
    }

    public function qualifiedTestResultList()  
    {
         
        return view('reporting.qualifiedtest_result_list');
    }

    public function generateQtSrNo()
    {
        
        $qualified_tests = QualifiedTest::where('qualified_tests.approve_reject_status',1)
                            ->join('student_infos','student_infos.id','=','qualified_tests.student_info_id')              
                            ->orderBy('student_infos.name_mm','asc')
                            ->with('student_info')
                            ->select('qualified_tests.*')
                            ->get();
        
        $count = 0;
        foreach($qualified_tests as $key => $qt){
                $qt->sr_no = ++$count;
                $qt->save();    
        }
        return "Update Serial Number in Qualified form";
    }

    public function showPublishQTList(Request $request)
    {
         
        
        $qualified_tests = QualifiedTest::join('student_infos','student_infos.id','=','qualified_tests.student_info_id')              
        ->where('qualified_tests.approve_reject_status',1)
        ->orderBy('student_infos.name_mm','asc')
        ->with('student_info')
        ->select('qualified_tests.*');

        $request->grade && $qualified_tests =  $qualified_tests->Where('grade',$request->grade);

        $qualified_tests = $qualified_tests->get();
       
          return DataTables::of($qualified_tests)
                ->addColumn('nrc', function ($infos){
                    $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                    return $nrc_result;
                })
                ->addColumn('status', function ($infos) {
                    if ($infos->approve_reject_status == 0) {
                        return "PENDING";
                    } else if ($infos->approve_reject_status == 1) {
                        return "APPROVED";
                    } else {
                        return "REJECTED";
                    }
                })
                ->make(true);
         

    }


    public function currentQtList(Request $request)
    {
        
        $current_year = Carbon::now()->format('Y');
       

        $student_infos = QualifiedTest::with('student_info')
                        ->whereNotNull('sr_no')
                        ->whereYear('created_at',$current_year);
                      
                       

        if($request->grade){
            $student_infos =  $student_infos->Where('grade',$request->grade);
            
        }else{
            $student_infos =  $student_infos->orderBy('sr_no','asc');
            
        }
        $student_infos =  $student_infos->get(); 


        return DataTables::of($student_infos)
        ->addColumn('nrc', function ($infos){
            $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
            return $nrc_result;
        })
        ->make(true);

        // return response()->json([
        //     'data' => $student_infos
        // ]);


    }

}
