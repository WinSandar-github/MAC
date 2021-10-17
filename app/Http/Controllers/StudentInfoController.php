<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use App\EducationHistroy;
use App\StudentCourseReg;
use App\StudentJobHistroy;
use App\registration_self_study;
use App\AccountancyFirmInformation;
use App\CPAFF;
use App\FirmOwnershipAudit;
use App\TeacherRegister;
use App\SchoolRegister;
use App\Mentor;
use Illuminate\Support\Facades\Hash;

class StudentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_infos = StudentInfo::with('student_job','student_education_histroy','student_course','exam_registers')->get();
        return response()->json([ 'data' => $student_infos],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->hasfile('image')) {
        //     $file = $request->file('image');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $image = '/storage/student_info/'.$name;
        // }

        // if ($request->hasfile('documents')) {
        //     foreach($request->file('documents') as $file){
        //         $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //         $file->move(public_path().'/storage/student_info/',$name);
        //         $document[] = '/storage/student_info/'.$name;
        //     }
        //  }

        $student_info = new StudentInfo();
        $student_info->name_mm          =   $request->name_mm;
        $student_info->name_eng          =   $request->name_eng;
        $student_info->nrc              =   $request->nrc;
        $student_info->father_name_mm   =   $request->father_name_mm;
        $student_info->father_name_eng  =   $request->father_name_eng;
        $student_info->race             =   $request->race;
        $student_info->religion         =   $request->religion;
        $student_info->date_of_birth    =   $request->dob;
        $student_info->address          =   $request->address;
        $student_info->current_address  =   $request->current_address;
        $student_info->phone            =   $request->phone;
        $student_info->gov_staff        =   $request->gov_staff;
        $student_info->image            =   $image;
        $student_info->registration_no  =   $request->registration_no;
        $student_info->date             =   date("Y-m-d");
        $student_info->email            =   $request->email;
        $student_info->password         =   Hash::make($request->password);

        $student_info->save();

        $student_job_histroy = new StudentJobHistroy;
        $student_job_histroy->student_info_id   = $student_info->id;
        $student_job_histroy->name              = $request->job_name;
        $student_job_histroy->position          = $request->position;
        $student_job_histroy->department        = $request->department;
        $student_job_histroy->organization      = $request->organization;
        $student_job_histroy->company_name      = $request->company_name;
        $student_job_histroy->salary            = $request->salary;
        $student_job_histroy->address           = $request->address;
        $student_job_histroy->save();

        for($i=0;$i < sizeof($request->uni_name);$i++){

        $education_histroy  =   new EducationHistroy();
        $education_histroy->student_info_id = $student_info->id;
        $education_histroy->university_name = $request->uni_name[$i];
        $education_histroy->degree_name     = isset($request->degree_name[$i])  ? $request->degree_name[$i] : null;
        $education_histroy->qualified_date  = isset($request->qualified_date[$i])  ? date("Y-m-d",strtotime($request->qualified_date[$i])) : null;
        $education_histroy->roll_number     = isset($request->roll_number[$i])  ? $request->roll_number[$i] : null;
        $education_histroy->document        = isset($document[$i])     ? $document[$i] : null;
        $education_histroy->save();
        }

        $student_course = new StudentCourseReg();
        $student_course->student_info_id = $student_info->id;
        $student_course->batch_id        = $request->batch_id;
        $student_course->date            = date("Y-m-d",strtotime($request->course_date));
        $student_course->status          = $request->course_status;
        $student_course->save();

        return response()->json([
            'message' => 'Insert Successfully'
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $student_info = StudentInfo::where('id',$id)->with('student_job','student_education_histroy','student_course','cpa_one_direct','exam_registers','student_course_regs','cpa_ff')->first();
         return response()->json(['data' => $student_info],200);
    }

    public function GetStudentByNRC($nrc)
    {
        $student_info = StudentInfo::where('nrc',$nrc)->with('student_job','student_education_histroy','student_course')->get();
        return response()->json(['data' => $student_info],200);
    }
    // public function GetStudentByNRC($nrc)
    // {
    //     $student_info = StudentInfo::where('nrc',$nrc)->with('student_job','education_histroy','student_course')->get();
    //     return response()->json(['data' => $student_info],200);
    // }




    //Update Da App Form
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

        
        if($request->hasfile('certificate'))
        {
            foreach($request->file('certificate') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension(); 
                $file->move(public_path().'/storage/student_info/',$name);
                $certificate[] = '/storage/student_info/'.$name;
            }        
        }else{
            $certificate = $request->old_certificate;
        }

        if($request->hasfile('recommend_letter'))
        {
            $file = $request->file('recommend_letter') ;
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $rec_letter = '/storage/student_info/'.$name;
        }else{
            $rec_letter = $request->old_rec_letter;
        }
        $date_of_birth = $request->date_of_birth;
        $date = date('d-M-Y');;
        $qualified_date = $request->qualified_date;
        $course_date = date('Y-m-d');
        $student_info = StudentInfo::find($id);
        $student_info->name_mm          =   $request->name_mm;
        $student_info->name_eng          =   $request->name_eng;
        $student_info->nrc_state_region =   $request['nrc_state_region'];
        $student_info->nrc_township     =   $request['nrc_township'] ;
        $student_info->nrc_citizen      =    $request['nrc_citizen'] ;
        $student_info->nrc_number       =   $request['nrc_number'];
        $student_info->nrc_front        =   $nrc_front;
        $student_info->nrc_back         =   $nrc_back;
        $student_info->father_name_mm   =   $request->father_name_mm;
        $student_info->father_name_eng  =   $request->father_name_eng;
        $student_info->gender           =   $request->gender;
        $student_info->race             =   $request->race;
        $student_info->religion         =   $request->religion;
        $student_info->date_of_birth    =   $date_of_birth;
        $student_info->address          =   $request->address;
        $student_info->current_address  =   $request->current_address;
        $student_info->phone            =   $request->phone;
        $student_info->gov_staff        =   $request->gov_staff;
        $student_info->image            =   $image;
        $student_info->registration_no  =   $request->registration_no;
        $student_info->approve_reject_status = 0;
        $student_info->date             =   $date;
        $student_info->recommend_letter =   $rec_letter;


        // $student_info->email            =   $request->email;
        // $student_info->password         =   Hash::make($request->password);
        $student_info->save();

        $student_job_histroy = StudentJobHistroy::where('student_info_id',$id)->first();
        $student_job_histroy->student_info_id   = $student_info->id;
        $student_job_histroy->name              = $request->job_name;
        $student_job_histroy->position          = $request->position;
        $student_job_histroy->department        = $request->department;
        $student_job_histroy->organization      = $request->organization;
        $student_job_histroy->company_name      = $request->company_name;
        $student_job_histroy->salary            = $request->salary;
        $student_job_histroy->office_address    = $request->office_address;
        $student_job_histroy->save();

        $education_histroy  =   EducationHistroy::where('student_info_id',$id)->first();
        $education_histroy->student_info_id = $student_info->id;
        $education_histroy->university_name = $request->university_name;
        $education_histroy->degree_name     = $request->degree_name;

        $education_histroy->qualified_date  = $qualified_date;
        $education_histroy->roll_number     = $request->roll_number;
        $education_histroy->save();


        $student_course = StudentCourseReg::where('student_info_id',$id)->first();
        $student_course->student_info_id = $student_info->id;
        $student_course->batch_id        = $request->batch_id;
        $student_course->approve_reject_status = 0;
        $student_course->status          = 1;
        $student_course->type            = $request->dtype;
        $student_course->date            = $course_date;

        if($request->dtype == 2){

        }
        $student_course->mac_type        = $request->mac_dtype;
        $student_course->save();

        return response()->json($student_info,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_info = StudentInfo::find($id);
        StudentJobHistroy::where('student_info_id',$id)->delete();
        EducationHistroy::where('student_info_id',$id)->delete();
        StudentCourseReg::where('student_info_id',$id)->delete();
        $student_info->delete();
        return response()->json([
            'message' => 'Delete Successfully'
        ],200);

    }

    public  function userProfile($id)
    {
        $student_info = StudentInfo::where('id',$id)->with('student_job','student_education_histroy','student_course_regs'
        ,'exam_registers','student_register','school','mentor','teacher','cpa_ff','papp',
        'article','gov_article','exam_results','qualified_test')->first();


        return response()->json(['data' => $student_info],200);
    }

    public  function getFirmDashboardData($id)
    {
        $student_info = StudentInfo::where('id',$id)->with('accountancy_firm')->latest()->first();
        $firm_id = AccountancyFirmInformation::where('student_info_id',$id)
                                            ->select('id')
                                            ->latest()
                                            ->first();

        $firm_ownerships_audits = FirmOwnershipAudit::where('accountancy_firm_info_id',$firm_id['id'])->get();

        return response()->json(['data' => $student_info,
                                  'firm_ownerships_audits' => $firm_ownerships_audits
                              ],200);
    }

    public function updateProfile(Request $request,$id){
           if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $image = '/storage/student_info/'.$name;
        }else{
            $image = $request->old_image;
        }
        
        if($request->membership == "audit"){
            return "Audit";
        }else  if($request->membership == "non_audit"){
            return "Non Audit";
        }else if($request->membership == "cpaff"){
            $cpaff=CPAFF::where('student_info_id',$id)->first();
            $cpaff->address     = $request->address;
            $cpaff->profile_photo         = $image;
            $cpaff->email         = $request->email;
            $cpaff->phone         = $request->phone;
            $cpaff->save();

            $student_info = StudentInfo::find($id);
            $student_info->email         = $request->email;
            $student_info->date_of_birth = $request->date_of_birth;
            $student_info->phone         = $request->phone;
            $student_info->address       = $request->address;
            $student_info->image         = $image;
            $student_info->save();

        }else if($request->membership == "papp"){
            return "papp";
        }else if($request->membership == "school"){
            $school = SchoolRegister::find($id);
            $school->phone         = $request->phone;
            $school->address       = $request->address;
            $school->eng_address   = $request->eng_address;
            $school->profile_photo = $image;
            $school->save();
        }else  if($request->membership == "teacher"){
            $teacher = TeacherRegister::find($id);
            $teacher->phone         = $request->phone;
            $teacher->current_address       = $request->address;
            $teacher->eng_current_address       = $request->eng_address;
            $teacher->image         = $image;
            $teacher->save();
        }else if($request->membership == "mentor"){
            $school = Mentor::find($id);
            $school->phone_no         = $request->phone;
            $school->address       = $request->address;
            $school->image = $image;
            $school->save();
        }else{

            $student_info = StudentInfo::find($id);
            $student_info->email         = $request->email;
            $student_info->date_of_birth = $request->date_of_birth;
            $student_info->phone         = $request->phone;
            $student_info->address       = $request->address;
            $student_info->image         = $image;
            $student_info->save();
        }

        return response()->json([
            'message' => "Successfully Update Message"
        ],200);

    }





}
