<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeacherRegister;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
