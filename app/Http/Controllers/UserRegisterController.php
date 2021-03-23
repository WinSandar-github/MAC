<?php

namespace App\Http\Controllers;

use App\CentralStaff;
use Illuminate\Http\Request;
use App\TrainingClass;
use App\UserProfile;
use App\Education;
use App\ForeignCondition;
use App\PensionOfficer;
use App\StepbyStepPosition;

class UserRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $training_classes = TrainingClass::where('part','first')->get();
        return view('pages.user_register', compact('training_classes'));
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
        $user_profile = new UserProfile;

        $image = $request->file('image');
        $destination_path = public_path('img/user_profile');
        $filename = uniqid().''.$image->getClientOriginalName();
        $image->move($destination_path, $filename);

        $user_profile->image = $filename;
        $user_profile->name = $request->get('name');
        $user_profile->father_name = $request->get('father_name');
        $user_profile->nrc_state_region = $request->get('nrc_state_region');
        $user_profile->nrc_township = $request->get('nrc_township');
        $user_profile->nrc_citizen = $request->get('nrc_citizen');
        $user_profile->nrc_number = $request->get('nrc_number');
        $user_profile->date_of_birth = $request->get('date_of_birth');
        $user_profile->age = $request->get('age');
        $user_profile->race = $request->get('race');
        $user_profile->religion = $request->get('religion');
        $user_profile->current_address = $request->get('current_address');
        $user_profile->partner_name = $request->get('partner_name');
        $user_profile->current_position = $request->get('current_position');
        $user_profile->current_salary = $request->get('current_salary');
        $user_profile->current_department = $request->get('current_department');
        $user_profile->current_job_location = $request->get('current_job_location');
        $user_profile->current_position_start_date = $request->get('current_position_start_date');
        $user_profile->job_start_date = $request->get('job_start_date');
        $user_profile->training_class_id = $request->get('training_class');
        $user_profile->login_admin = auth()->user()->id;
        $user_profile->save();
        

        $education_count = count($request->get('education'));
        for($i = 0; $i < $education_count; $i++){
            Education::create([
                'graduation_name' => $request->get('education')[$i],
                'user_profile_id' => $user_profile['id'],    
            ]);
        }

        $stepbystep_position_count = count($request->get('stepbystep_position'));
        for($i = 0; $i < $stepbystep_position_count; $i++){
            StepbyStepPosition::create([
                'position' => $request->get('stepbystep_position')[$i],
                'department' => $request->get('stepbystep_department')[$i],
                'region' => $request->get('stepbystep_region')[$i],
                'start_date' => $request->get('stepbystep_start_date')[$i],
                'end_date' => $request->get('stepbystep_end_date')[$i],
                'user_profile_id' => $user_profile['id'],    
            ]);
        }

        $foreign_count = count($request->get('foreign_start_date'));
        for($i = 0; $i < $foreign_count; $i++){
            ForeignCondition::create([
                'foreign_start_date' => $request->get('foreign_start_date')[$i],
                'foreign_end_date' => $request->get('foreign_end_date')[$i],
                'foreign_travel_country' => $request->get('foreign_travel_country')[$i],
                'foreign_attendance_class' => $request->get('foreign_attendance_class')[$i],
                'user_profile_id' => $user_profile['id'],    
            ]);
        }

        $central_count = count($request->get('central_class_number'));
        $central_data = $request->get('central_class_number');
        $pension_count = count($request->get('pension_class_number'));
        $pension_data = $request->get('pension_class_number');
        if($pension_data[0] !== null && $central_data[0] !== null){
            for($i = 0; $i < $central_count; $i++){
                CentralStaff::create([
                    'central_class_number' => $request->get('central_class_number')[$i],
                    'central_year' => $request->get('central_year')[$i],
                    'central_university' => $request->get('central_university')[$i],
                    'user_profile_id' => $user_profile['id'],
                ]);
            }
            for($j = 0; $j < $pension_count; $j++){
                PensionOfficer::create([
                    'pension_class_number' => $request->get('pension_class_number')[$j],
                    'pension_year' => $request->get('pension_year')[$j],
                    'pension_university' => $request->get('pension_university')[$j],
                    'user_profile_id' => $user_profile['id'],
                ]);
            }
        }elseif($pension_data[0] !== null && $central_data[0] == null){
            for($i = 0; $i < $pension_count; $i++){
                PensionOfficer::create([
                    'pension_class_number' => $request->get('pension_class_number')[$i],
                    'pension_year' => $request->get('pension_year')[$i],
                    'pension_university' => $request->get('pension_university')[$i],
                    'user_profile_id' => $user_profile['id'],
                ]);
            }
        }else{
            for($i = 0; $i < $central_count; $i++){
                CentralStaff::create([
                    'central_class_number' => $request->get('central_class_number')[$i],
                    'central_year' => $request->get('central_year')[$i],
                    'central_university' => $request->get('central_university')[$i],
                    'user_profile_id' => $user_profile['id'],
                ]);
            }    
        }

        return redirect()->route('registered_user_list.index')->with('success','User Registers are Successfully Saved');
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
