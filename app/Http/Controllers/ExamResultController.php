<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentInfo;
use App\ExamResult;
use App\ExamRegister;
use Alert;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = ExamResult::with('student_info')->get();
        //return view('pages.mark.mark_list', compact('marks'));
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
        
        //$form = $request->all();        
        // $data = $this->prepareData($request->all());
        // $data['student_info_id']  = $student_info_id;
        // $data['registeration_id'] = $registeration_id;
        // $data['date']             = $date;
        // ExamResult::create($data);
        // Alert::success('Success', 'Successfully Added Marks');
        // return view('pages.exam_result.exam_result_list');
        $std_data = ExamRegister::where('id',$request->exam_register_id)->first();
        $std_data->total_mark = $request->total_mark;
        $std_data->save();
  
        // $reg_data = ExamRegister::where('batch_id',$request->batch_id)->get('id');
        // $registeration_id = $reg_data[0]['id'];
        $date = date('Y-m-d');
        $exam_result=new ExamResult;                
        $exam_result->student_info_id=$std_data->student_info_id;
        $exam_result->registeration_id=$request->exam_register_id;
        $exam_result->result=json_encode(['subjects'=>$subjects,'marks'=>$marks,'grades'=>$grades]);;
        $exam_result->date=$date;
        $exam_result->save();

        return response()->json($exam_result,200);
    }

    // private function prepareData($data) 
    // {
    //     $result = [
    //         'subject_name' => $data['subject_name'],
    //         'mark' => $data['mark'],
    //         'grade' => $data['grade']
    //     ];

    //     $insert = [
    //         'result' => json_encode($result)
    //     ];
    //     return $insert;
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam_result = ExamResult::where('id',$id)->with('student_info')->get();
        return response()->json([
            'data' => $exam_result
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
        $mark = ExamResult::find($id);
        $result = json_decode($mark->result, TRUE);
        if(empty($mark)) {
            Alert::error('Error', 'mark Not Found');
            //return redirect(route('mark.mark_list'));
        }
        //return view('pages.mark.mark_list_edit', compact('mark','result'));
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
        $exam_result = ExamResult::find($id);
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
        
        // $std_data = ExamRegister::where('batch_id',$request->batch_id)->get('student_info_id');
        // $student_info_id = $std_data[0]['student_info_id'];
        // $reg_data = ExamRegister::where('batch_id',$request->batch_id)->get('id');
        // $registeration_id = $reg_data[0]['id'];
         $date = date('Y-m-d');               
        // $exam_result->student_info_id=$student_info_id;
        // $exam_result->registeration_id=$registeration_id ;
        $exam_result->result=json_encode(['subjects'=>$subjects,'marks'=>$marks,'grades'=>$grades]);;
        $exam_result->date=$date;
        $exam_result->save();

        return response()->json($exam_result,200);
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

    public function SearchExamResult($id){
        $std_data = ExamRegister::where('id',$id)->get('student_info_id');
        $student_info_id = $std_data[0]['student_info_id'];
     
        $reg_data = ExamRegister::where('id',$id)->get('id');
        $registeration_id = $reg_data[0]['id'];

        $total_marks = ExamRegister::where('id',$id)->get('total_mark');
        $total_mark = $total_marks[0]['total_mark'];

        $exam_result=ExamResult::where('student_info_id',$student_info_id)
            ->where('registeration_id', $registeration_id)->first();
        return response()->json([
            'data' => $exam_result,
            'total_mark'=>$total_mark
        ],200);
    }


    public function passExam($id,Request $request)
    {
        
        $exam_register = ExamRegister::find($id);
        $exam_register->grade = 1;
        $exam_register->pass_module = $request->pass_module ? $request->pass_module : $exam_register->is_full_module;
        $exam_register->save();

        $student_info_id = StudentInfo::find($exam_register->student_info_id);
        $student_info_id->approve_reject_status  =  3;
        $student_info_id->save();
        return response()->json([
            'message' => "You have successfully pass that Student!"
        ],200);
    }

    public function rejectExam($id)
    {
        $exam_register = ExamRegister::find($id);
        $exam_register->grade = 2;
        $exam_register->save();
        return response()->json([
            'message' => "You have successfully fail that Student!"
        ],200);
    }

  
}
