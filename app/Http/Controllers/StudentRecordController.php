<?php

namespace App\Http\Controllers;

use App\Education;
use App\Region;
use App\UserProfile;
use Illuminate\Http\Request;
use App\TrainingClass;
use Illuminate\Support\Facades\Hash;

class StudentRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_classes = TrainingClass::where('part','second')->get();
        $regions = Region::all();
        return view('pages.student_record', compact('training_classes', 'regions'));
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
        $student_record = new UserProfile;
        $student_record->name = $request->name;
        $student_record->email = $request->email;
        $student_record->nrc_state_region = $request->get('nrc_state_region');
        $student_record->nrc_township = $request->get('nrc_township');
        $student_record->nrc_citizen = $request->get('nrc_citizen');
        $student_record->nrc_number = $request->get('nrc_number');
        $student_record->age = $request->get('age');
        $student_record->current_position = $request->get('current_position');
        $student_record->current_salary = $request->get('current_salary');
        // $student_record->education = $request->get('education');
        $student_record->current_job_region = $request->get('current_job_region');
        $student_record->training_class_id = $request->get('training_class');
        $student_record->contact_number = $request->get('contact_number');
        $student_record->login_admin = auth()->user()->id;
        $student_record->save();

        $education_count = count($request->get('education'));
        for($i = 0; $i < $education_count; $i++){
            Education::create([
                'graduation_name' => $request->get('education')[$i],
                'user_profile_id' => $student_record['id'],    
            ]);
        }

        return redirect()->route('registered_user_list.index')->with('success','Student Records are Successfully Saved');
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
