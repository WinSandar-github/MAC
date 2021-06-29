<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseFee;

class CourseFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_fees = CourseFee::all();
        return response()->json([
            'data' => $course_fees
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
        $course_fee = new CourseFee();
        $course_fee->form_fee = $request->form_fee;
        $course_fee->nrc_fee  = $request->nrc_fee;
        $course_fee->save();
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
        $course_fee = CourseFee::find($id);
        return response()->json([
            'data' => $course_fee
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
        $course_fee = CourseFee::find($id);
        $course_fee->form_fee = $request->form_fee;
        $course_fee->nrc_fee  = $request->nrc_fee;
        $course_fee->save();
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
        $course_fee = CourseFee::find($id);
        $course_fee->delete();
        return response()->json([
            'message' => "Delete Successfully"
        ],200);
    }
}
