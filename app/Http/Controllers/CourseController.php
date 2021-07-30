<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Batch;
use App\CourseType;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('batch')->get();
        return response()->json([
            'data' => $courses
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
        $request->validate([
            'name'              => 'required',
            'form_fee'          => 'required',
            'registration_fee'  =>  'required',
            'exam_fee'          =>  'required',
            'tution_fee'        =>  'required',
            'description'       =>  'required',
            'course_type_id'       =>  'required',
            'code'              =>  'required'
        ]);
        $course = new Course();
        
        $course->name               = $request->name;
        $course->form_fee           = $request->form_fee;
        $course->registration_fee   = $request->registration_fee;
        $course->exam_fee           = $request->exam_fee;
        $course->tution_fee         = $request->tution_fee;
        $course->description        = $request->description;
        $course->course_type_id     = $request->course_type_id;
        $course->code               = $request->code;
        $course->save();
        return response()->json([
            'message' => "Insert Successfully"
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
        $course = Course::where('id',$id)->get();
            return response()->json([
            'data' => $course
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
        $course = Course::find($id);
        $course->name               = $request->name;
        $course->form_fee           = $request->form_fee;
        $course->registration_fee   = $request->registration_fee;
        $course->exam_fee           = $request->exam_fee;
        $course->tution_fee         = $request->tution_fee;
        $course->description        = $request->description;
        $course->course_type_id     = $request->course_type_id;
        $course->code               = $request->code;
        $course->save();
        return response()->json([
            'message' => "Update Successfully"
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
        $course = Course::find($id);
        $course->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);
    }
    public function studentCourse()
    {
        $courses = Course::with('batch')->get();
        return response()->json([
            'data' => $courses
        ],200);
    }
    public function getCourseType()
    {
        $course_type = CourseType::get();
        return response()->json([
            'data' => $course_type
        ],200);
    }
}
