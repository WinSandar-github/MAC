<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeacherRegister;
use App\StudentInfo;
use Hash;
use Illuminate\Support\Facades\DB;

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
        $teacher = new TeacherRegister();
        $teacher->name_mm = $request->name_mm;
        $teacher->name_eng = $request->name_eng;
        $teacher->father_name_mm = $request->father_name_mm;
        $teacher->father_name_eng = $request->father_name_eng;
        $teacher->reg_date = date('y-m-d');
        $teacher->phone = $request->phone_number;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->nrc_state_region = $request->nrc_state_region;
        $teacher->nrc_township = $request->nrc_township;
        $teacher->nrc_citizen = $request->nrc_citizen;
        $teacher->nrc_number = $request->nrc_number;
        $teacher->gov_employee = $request->gov_employee;
        $teacher->exp_desc = $request->exp_desc;
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
        //
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
        $teacher->approve_reject_status = $request->status;
        $teacher->save();
        return response()->json([
            'message' => 'You have approved this user.'
        ],200);
    }

    public function FilterTeacher(Request $request)
    {
        $teacher = TeacherRegister::orderBy('created_at','desc');
        if($request->name!=""){
            $teacher=$teacher->where('name_mm', 'like', '%' . $request->name. '%')
                        ->orWhere('name_eng', 'like', '%' . $request->name. '%');
        }
        if($request->nrc!=""){
            $teacher=$teacher->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
        }
        $teacher=$teacher->get();
        return  response()->json([
            'data' => $teacher
        ],200);
    }

    public function teacherStatus($id)
    {
        $data = StudentInfo::where('id',$id)->get('approve_reject_status');
        return response()->json($data,200);
    }
}
