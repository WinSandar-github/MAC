<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Batch;
use App\CourseType;
use App\Requirement;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('batches', 'active_batch')->get();

        return response()->json([
            'data' => $courses
        ], 200);
    }

    public function loadCourseByCourseCode($code)
    {
        $courses = Course::where('code', $code)->with('batches', 'active_batch')->get();
        return response()->json([
            'data' => $courses
        ], 200);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $requirements = [];
        // foreach ($request->requirement_id as $require) {
        //     array_push($requirements, $require);
        // }
        // return $requirements;

        $request->validate([
            'name' => 'required',
            'form_fee' => 'required',
            'selfstudy_registration_fee' => 'required',
            'privateschool_registration_fee' => 'required',
            'mac_registration_fee' => 'required',
            // 'exam_fee' => 'required',
            // 'exam_fee' => 'required',
            'tution_fee' => 'required',
            'description' => 'required',
            'course_type_id' => 'required',
            'code' => 'required',
            'requirement_id' => 'required'
        ]);
        $course = new Course();

        $course->name = $request->name;
        $course->form_fee = $request->form_fee;
        $course->selfstudy_registration_fee = $request->selfstudy_registration_fee;
        $course->privateschool_registration_fee = $request->privateschool_registration_fee;
        $course->mac_registration_fee = $request->mac_registration_fee;
        $course->exam_fee = $request->exam_fee;
        $course->tution_fee = $request->tution_fee;
        $course->description = $request->description;
        $course->course_type_id = $request->course_type_id;
        $course->code = $request->code;
        $course->requirement_id     = $request->requirement_id;
        // $course->requirement_id = json_encode($requirements);

        $course->save();
        return response()->json([
            'message' => "Insert Successfully"
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::where('id', $id)->with('requirement')->first();
        return response()->json([
            'data' => $course
        ], 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requirements = [];
        foreach ($request->requirement_id as $require) {
            array_push($requirements, $require);
        }

        $course = Course::find($id);
        $course->name = $request->name;
        $course->form_fee = $request->form_fee;
        $course->selfstudy_registration_fee = $request->selfstudy_registration_fee;
        $course->privateschool_registration_fee = $request->privateschool_registration_fee;
        $course->mac_registration_fee = $request->mac_registration_fee;
        $course->exam_fee = $request->exam_fee;
        $course->tution_fee = $request->tution_fee;
        $course->description = $request->description;
        $course->course_type_id = $request->course_type_id;
        $course->code = $request->code;
        // $course->requirement_id     = $request->requirement_id;
        $course->requirement_id = json_encode($requirements);
        $course->save();
        return response()->json([
            'message' => "Update Successfully"
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ], 200);
    }

    public function studentCourse()
    {
        $courses = Course::with('batches')->get();
        return response()->json([
            'data' => $courses
        ], 200);
    }

    public function getCourseType()
    {
        $course_type = CourseType::get();
        return response()->json([
            'data' => $course_type
        ], 200);
    }
    public function loadCourseByCourseType($course_type_id)
    {
        $courses = Course::where('course_type_id',$course_type_id)->with('batches')->get();
        return response()->json([
            'data' => $courses
        ],200);
    }    

    public function getRequirement()
    {
        $requiement_id = Requirement::get();
        return response()->json([
            'data' => $requiement_id
        ], 200);
    }

    public function getMainCourse(){
        $main_course = CourseType::get();

        return DataTables::of($main_course)
            ->addColumn('action', function ($course) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-xs' onclick='showCourseInfo($course->id)'>
                                    <li class='fa fa-edit fa-sm'></li>
                                </button>
                                 <button type='button' class='btn btn-danger btn-xs' onclick='deleteCourseInfo(\"$course->name\", $course->id)'>
                                    <li class='fa fa-trash fa-sm'></li>
                                </button>
                            </div>";
            })
            ->editColumn('course_description', function ($course){
                return Str::limit($course->course_description, 50, '...');
            })
            ->editColumn('created_at', function ($c){
                return $c->created_at == null ? 'N/A' : $c->created_at;
            })
            ->editColumn('updated_at', function ($c){
                return $c->updated_at == null ? 'N/A' : $c->updated_at;
            })
            ->removeColumn('course_code')
            ->make(true);
    }

    public function FilterCourse($course_name)
    {
        if($course_name == 'all') {

            $courses = Course::with('batches', 'course_type')->get();

            return DataTables::of($courses)
                ->addColumn('action', function ($course) {
                    return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-xs' onclick='showCourseInfo($course->id)'>
                                    <li class='fa fa-edit fa-sm'></li>
                                </button>
                                 <button type='button' class='btn btn-danger btn-xs' onclick='deleteCourseInfo(\"$course->name\", $course->id)'>
                                    <li class='fa fa-trash fa-sm'></li>
                                </button>
                            </div>";
                })
                ->addColumn('description', function ($course) {
                    return $course->course_type ? Str::limit($course->course_type->course_description, 50, '...') : '';
                })
                ->addColumn('requirements', function ($course) {
                    $requirements = Requirement::whereIn('id', explode(',', $course->requirement_id))->get('requirement_name');

                    $result = $requirements->map(function ($val) {
                        return $val->requirement_name ? "<small class='d-block '> - " . Str::limit($val->requirement_name, 30, '...') . "</small>" : '';
                    });

                    return str_replace(',', '', implode(',', $result->toArray()));
                })
                ->rawColumns(['action', 'requirements'])
                ->make(true);
        }else{
            $courses = Course::where('name', 'like', '%' . $course_name. '%')->with('batches')->get();
            return response()->json([
                'data' => $courses
            ],200);
        }
    }

    public function getCourses()
    {
        $courses = Course::get();
        return response()->json([
            'data' => $courses
        ], 200);
    }
    
}
