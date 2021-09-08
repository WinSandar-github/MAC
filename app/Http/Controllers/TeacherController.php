<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeacherRegister;
use App\StudentInfo;
use Hash;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;    

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = TeacherRegister::orderBy('created_at','desc')->get();
        return  response()->json([
            'data' => $teacher
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // profile photo
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $image = '/storage/teacher_info/'.$name;
        }
        // nrc front image
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_front = '/storage/teacher_info/'.$name;
        }
        // nrc back image
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_back = '/storage/teacher_info/'.$name;
        }

        $teacher = new TeacherRegister();
        $teacher->name_mm = $request->name_mm;
        $teacher->name_eng = $request->name_eng;
        $teacher->father_name_mm = $request->father_name_mm;
        $teacher->father_name_eng = $request->father_name_eng;
        $teacher->reg_date = date('Y-m-d');
        $teacher->phone = $request->phone_number;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->nrc_state_region = $request->nrc_state_region;
        $teacher->nrc_township = $request->nrc_township;
        $teacher->nrc_citizen = $request->nrc_citizen;
        $teacher->nrc_number = $request->nrc_number;
        $teacher->nrc_front = $nrc_front;
        $teacher->nrc_back = $nrc_back;
        $teacher->gov_employee = $request->gov_employee;
        $teacher->exp_desc = $request->exp_desc;
        $teacher->image = $image;
        $degrees = "";$certificates = ""; $diplomas = "";
        foreach($request->degrees as $d){
            $degrees = $degrees . $d . ',';

        }
        foreach($request->certificates as $c){
            $certificates = $certificates . $c . ',';

        }
        foreach($request->diplomas as $d){
            $diplomas = $diplomas . $d . ',';

        }
        $teacher->degrees = rtrim($degrees, ',');
        $teacher->certificates = rtrim($certificates, ',');
        $teacher->diplomas = rtrim($diplomas, ',');
        $teacher->save();

        //Student Info
        $std_info = new StudentInfo();
        $std_info->teacher_id = $teacher->id;
        $std_info->email = $request->email;
        $std_info->password = Hash::make($request->password);
        $std_info->save();

        return response()->json([
            'message' => 'Success Registration.'
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
        $teacher = TeacherRegister::find($id);
        return  response()->json([
            'data' => $teacher
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $image = '/storage/teacher_info/'.$name;
        }else{
            $image =$request->profile_photo;
        }
        // nrc front image
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_front = '/storage/teacher_info/'.$name;
        }else{
            $nrc_front =$request->nrc_front;
        }
        
        // nrc back image
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_back = '/storage/teacher_info/'.$name;
        }else{
            $nrc_back =$request->nrc_back;
        }
        $teacher = TeacherRegister::find($id);
        $teacher->name_mm = $request->name_mm;
        $teacher->name_eng = $request->name_eng;
        $teacher->father_name_mm = $request->father_name_mm;
        $teacher->father_name_eng = $request->father_name_eng;
        $teacher->phone = $request->phone_number;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->nrc_state_region = $request->nrc_state_region;
        $teacher->nrc_township = $request->nrc_township;
        $teacher->nrc_citizen = $request->nrc_citizen;
        $teacher->nrc_number = $request->nrc_number;
        $teacher->nrc_front = $nrc_front;
        $teacher->nrc_back = $nrc_back;
        $teacher->gov_employee = $request->gov_employee;
        $teacher->exp_desc = $request->exp_desc;
        $teacher->image = $image;
        
        $degrees = "";$certificates = ""; $diplomas = "";
        foreach($request->degrees as $d){
            $degrees = $degrees . $d . ',';

        }
        foreach($request->certificates as $c){
            $certificates = $certificates . $c . ',';

        }
        foreach($request->diplomas as $d){
            $diplomas = $diplomas . $d . ',';

        }
        $teacher->degrees = rtrim($degrees, ',');
        $teacher->certificates = rtrim($certificates, ',');
        $teacher->diplomas = rtrim($diplomas, ',');
        $teacher->renew_date = date('Y-m-d');
        $teacher->save();
        $std_info = StudentInfo::where('teacher_id', $id)->first();
        $std_info->email = $request->email;
        $std_info->password = Hash::make($request->password);
        $std_info->save();
        return response()->json([
            'message' => 'You have renewed successfully.'
        ],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve_teacher_register(Request $request)
    {
        $std_info = StudentInfo::where('teacher_id', $request->id)->first();
        $std_info->approve_reject_status = 1;
        $std_info->save();
        $teacher = TeacherRegister::find($request->id);
        $teacher->renew_date = date('Y-m-d');
        $teacher->approve_reject_status = $request->status;
        $teacher->save();
        return response()->json([
            'message' => 'You have approved this user.'
        ],200);
    }

    public function FilterTeacher(Request $request)
    {
        $teacher = TeacherRegister::where('approve_reject_status',$request->status)->orderBy('created_at','desc');
        if($request->name!=""){
            $teacher=$teacher->where('name_mm', 'like', '%' . $request->name. '%')
                        ->orWhere('name_eng', 'like', '%' . $request->name. '%');
        }
        if($request->nrc!=""){
            $teacher=$teacher->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
        }
        $teachers=$teacher->get();
        return DataTables::of($teachers)
                ->addColumn('action', function ($infos) {
                    return "<div class='btn-group'>
                                    <a href='teacher_edit?id=$infos->id' class='btn btn-primary btn-xs' onclick='showMentorStudent($infos->id)'>
                                        <li class='fa fa-eye fa-sm'></li>
                                    </a>
                                </div>";
                })
                ->addColumn('nrc', function ($infos){
                    $nrc_result = $infos->nrc_state_region . "/" . $infos->nrc_township . "(" . $infos->nrc_citizen . ")" . $infos->nrc_number;
                    return $nrc_result;
                })
                ->addColumn('status', function ($infos){
                    if($infos->approve_reject_status	 == 0){
                        return "PENDING";
                    }else if($infos->approve_reject_status	 == 1){
                        return "APPROVED";
                    }else{
                        return "REJECTED";
                    }
                })
                ->make(true);
        // return  response()->json([
        //     'data' => $teacher
        // ],200);
    }

    // public function FilterTeacher(Request $request)
    // {
    //     $teacher = TeacherRegister::orderBy('created_at','desc');
    //     if($request->name!=""){
    //         $teacher=$teacher->where('name_mm', 'like', '%' . $request->name. '%')
    //                     ->orWhere('name_eng', 'like', '%' . $request->name. '%');
    //     }
    //     if($request->nrc!=""){
    //         $teacher=$teacher->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
    //     }
    //     $teacher = $teacher->paginate(3);
    //     return view('pages.teacher.teacher_list', compact('teacher'));
    // }

    public function teacherStatus($id)
    {
        $data = StudentInfo::where('id',$id)->get('approve_reject_status');
        return response()->json($data,200);
    }

    public function approveTeacher($id)
    { 
        $std_info = StudentInfo::find($id) ;
        $std_info->payment_method = 'CASH';
        $std_info->save();
        return response()->json([
            'data' => $std_info,
        ],200);
    }

    public function check_payment($id)
    {
        $data = StudentInfo::where('id',$id)->get();
        return response()->json($data,200);
    }

}
