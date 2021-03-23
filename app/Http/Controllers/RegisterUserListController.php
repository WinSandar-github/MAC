<?php

namespace App\Http\Controllers;

use App\CentralStaff;
use App\Education;
use App\ForeignCondition;
use App\PensionOfficer;
use App\Region;
use App\StepbyStepPosition;
use App\TrainingClass;
use App\UserProfile;
use Illuminate\Http\Request;

class RegisterUserListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $register_lists = UserProfile::all();
        return view('pages.register_list', compact('register_lists'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regions = Region::all();
        $training_classes = TrainingClass::all();
        $register_list = UserProfile::with('job_region','training_class', 'educations','stepbystep_positions', 'central_staffes', 'pension_officers', 'foreign_conditions')->find($id);
        // return $register_list;
        $data = $register_list['training_class_id'];
        if($data <= 4){
            return view('pages.edit_first_register_list', compact('register_list', 'regions', 'training_classes'));
        }elseif($data > 4){
            return view('pages.edit_second_register_list', compact('register_list', 'regions', 'training_classes'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'data';
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
        return $id;
    }

    public function user_update(Request $request, $id)
    {   
        $student_list = UserProfile::with('job_region','training_class', 'educations','stepbystep_positions', 'central_staffes', 'pension_officers', 'foreign_conditions')->find($id);
        // return $student_list;

        if($student_list['image'] == null){
            $student_list->name = $request->name;
            $student_list->email = $request->email;
            $student_list->nrc_state_region = $request->nrc_state_region;
            $student_list->nrc_township = $request->nrc_township;
            $student_list->nrc_citizen = $request->nrc_citizen;
            $student_list->nrc_number = $request->nrc_number;
            $student_list->age = $request->age;
            $student_list->current_position = $request->current_position;
            $student_list->current_salary = $request->current_salary;
            $student_list->contact_number = $request->contact_number;
            $student_list->current_job_region = $request->current_job_region;
            $student_list->training_class_id = $request->training_class;
            $student_list->save();

            $education_count = count($request->get('education'));
            Education::where('user_profile_id',$id)->delete();
            for($i = 0; $i < $education_count; $i++){
                Education::create([
                    'graduation_name' => $request->get('education')[$i],
                    'user_profile_id' => $student_list['id'],    
                ]);
            }
        }else{
            $image = $request->file('image');
            if(empty($image)){
               $filename = $student_list['image'];
            }else{
                $destination_path = public_path('img/user_profile');
                $filename = uniqid().''.$image->getClientOriginalName();
                $image->move($destination_path, $filename);

                $image_path = public_path().'/img/user_profile/'.$student_list->image;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $student_list->image = $filename;
            $student_list->name = $request->name;
            $student_list->father_name = $request->father_name;
            $student_list->nrc_state_region = $request->nrc_state_region;
            $student_list->nrc_township = $request->nrc_township;
            $student_list->nrc_citizen = $request->nrc_citizen;
            $student_list->nrc_number = $request->nrc_number;
            $student_list->date_of_birth = $request->date_of_birth;
            $student_list->age = $request->age;
            $student_list->race = $request->race;
            $student_list->religion = $request->religion;
            $student_list->current_address = $request->current_address;
            $student_list->partner_name = $request->partner_name;
            $student_list->current_position = $request->current_position;
            $student_list->current_salary = $request->current_salary;
            $student_list->current_department = $request->current_department;
            $student_list->current_job_location = $request->current_job_location;
            $student_list->job_start_date = $request->job_start_date;
            $student_list->current_job_region = $request->current_job_region;
            $student_list->training_class_id = $request->training_class;
            $student_list->save();

            $education_count = count($request->get('education'));
            Education::where('user_profile_id',$id)->delete();
            for($i = 0; $i < $education_count; $i++){
                Education::create([
                    'graduation_name' => $request->get('education')[$i],
                    'user_profile_id' => $student_list['id'],    
                ]);
            }

            $stepbystep_count = count($request->get('stepbystep_position'));
            StepbyStepPosition::where('user_profile_id',$id)->delete();
            for($i = 0; $i < $stepbystep_count; $i++){
                StepbyStepPosition::create([
                    'position' => $request->get('stepbystep_position')[$i],
                    'department' => $request->get('stepbystep_department')[$i],
                    'region' => $request->get('stepbystep_region')[$i],
                    'start_date' => $request->get('stepbystep_start_date')[$i],
                    'end_date' => $request->get('stepbystep_end_date')[$i],
                    'user_profile_id' => $student_list['id'], 
                ]);
            }

            $central = count($student_list['central_staffes']);
            if($central >= 1){
                $central_count = count($request->get('central_class_number'));
                CentralStaff::where('user_profile_id',$id)->delete();
                for($i = 0; $i < $central_count; $i++){
                    CentralStaff::create([
                        'central_class_number' => $request->get('central_class_number')[$i],
                        'central_year' => $request->get('central_year')[$i],
                        'central_university' => $request->get('central_university')[$i],
                        'user_profile_id' => $student_list['id'],    
                    ]);
                }
            }

            $pension = count($student_list['pension_officers']);
            if($pension >= 1){
                $pension_count = count($request->get('pension_class_number'));
                PensionOfficer::where('user_profile_id',$id)->delete();
                for($i = 0; $i < $pension_count; $i++){
                    PensionOfficer::create([
                        'pension_class_number' => $request->get('pension_class_number')[$i],
                        'pension_year' => $request->get('pension_year')[$i],
                        'pension_university' => $request->get('pension_university')[$i],
                        'user_profile_id' => $student_list['id'],    
                    ]);
                }
            }

            $foreign_count = count($request->get('foreign_start_date'));
            ForeignCondition::where('user_profile_id',$id)->delete();
            for($i = 0; $i < $foreign_count; $i++){
                ForeignCondition::create([
                    'foreign_start_date' => $request->get('foreign_start_date')[$i],
                    'foreign_end_date' => $request->get('foreign_end_date')[$i],
                    'foreign_travel_country' => $request->get('foreign_travel_country')[$i],
                    'foreign_attendance_class' => $request->get('foreign_attendance_class')[$i],
                    'user_profile_id' => $student_list['id'],    
                ]);
            }
        }

        return redirect()->route('registered_user_list.index')->with('success', 'Student Records are Successfully Updated');
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
