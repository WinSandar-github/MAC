<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExamRegister;

class ExamRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exam_registers = ExamRegister::all();
        return response()->json([
            'data' => $exam_registers
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
        if ($request->hasfile('invoice_image')) 
        {
            $file = $request->file('invoice_image');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/exam_register/',$name);
            $invoice_image = '/storage/exam_register/'.$name;
        }
        $date = date('Y-m-d');
        $invoice_date = date('Y-m-d');

        $exam = new ExamRegister();
        $exam->student_info_id = $request->student_info_id;
        $exam->date = $date;
        $exam->invoice_image = $invoice_image;
        $exam->invoice_date = $invoice_date;
        $exam->private_school_name = $request->private_school_name;
        $exam->grade = $request->grade;
        $exam->batch_id = $request->batch_id;
        $exam->is_full_module = $request->is_full_module;
        $exam->exam_type_id = $request->exam_type_id;
        $exam->save();
        return "You have successfully registerd!";
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
}
