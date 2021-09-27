<?php

namespace App\Http\Controllers\CourseController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\CourseType;

class MainCourseController extends Controller
{
    public function index()
    {
        return "Index";
    }

    public function show($id){
        if($id != ""){

            $course_type = CourseType::where('id', $id)->first();

            return $course_type ;

        }

        return response()->json(['message' => 'No INFO PROVIDE FORM CLIENT!'], 500);
    }

    public function store(Request $request)
    {
        if($request->main_course_name != "" && $request->main_course_description){

            $course_type = new CourseType();
            $course_type->course_code = "";
            $course_type->course_name = $request->main_course_name;
            $course_type->course_description = $request->main_course_description;
            
            if($course_type->save()){
                
                $course_type->course_code = preg_replace('/[^A-Za-z0-9]/', '', Str::lower($request->main_course_name)) . '_' . $course_type->id ;

                $course_type->save();

                return response()->json(['message' => 'Course Create Success!'], 200);
            }

            return response()->json(['message' => 'Error While Data Save!'], 500);

        }

        return response()->json(['message' => 'No INFO PROVIDE FORM CLIENT!'], 500);
    }

    public function update(Request $request, $id)
    {
        if($id != null){

            $course_type = CourseType::where('id', $id)->first();
            $course_type->course_name = $request->main_course_name;
            $course_type->course_description = $request->main_course_description;

            if($course_type->save()){

                return response()->json(['message' => 'Course Update Success!'], 200);
            }

            return response()->json(['message' => 'Error While Data Save!'], 500);
        }

        return response()->json(['message' => 'No INFO PROVIDE FORM CLIENT!'], 500);
    }

    public function destory($id)
    {
        if($id != null){

            $course_type = CourseType::where('id', $id)->first();

            if($course_type->delete()){

                return response()->json(['message' => 'Course Delete Success!'], 200);
            }

            return response()->json(['message' => 'Error While Data Delete!'], 500);
        }

        return response()->json(['message' => 'No INFO PROVIDE FORM CLIENT!'], 500);
    }
}
