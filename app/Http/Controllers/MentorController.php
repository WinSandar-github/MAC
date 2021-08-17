<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mentor;
use App\StudentInfo;
use Hash;

class MentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mentor = Mentor::orderBy('created_at','desc')->get();
        return  response()->json([
            'data' => $mentor
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = StudentInfo::where('nrc_state_region', '=', $request['nrc_state_region'])
        ->where('nrc_township', '=', $request['nrc_township'])
        ->where('nrc_citizen', '=', $request['nrc_citizen'])
        ->where('nrc_number', '=', $request['nrc_number'])
        ->first();
        if($data)
        {
            return "NRC has been used, please check again!";
        }

        $email = $request->email;
        $emailcheck = StudentInfo::where('email', '=', $email)->first();
        if($emailcheck)
        {
            return "Email has been used, please check again!";
        }
        // $request->validate([
        //     'name_eng' => 'required',
        //     'email'    => 'required',
        //     'password'  => 'required',

        // ]);

        // $current_check_service = [];
        // foreach($request->current_check_services as $service){
        //     array_push($current_check_service,$service);
        // }
        $mentor = new Mentor();
        $mentor->current_check_service_id = $request->current_check_service_id;
        $mentor->name_mm = $request->name_mm;
        $mentor->name_eng = $request->name_eng;
        $mentor->father_name_mm     = $request->father_name_mm;
        $mentor->father_name_eng    = $request->father_name_eng;
        $mentor->nrc_state_region   = $request['nrc_state_region'];
        $mentor->nrc_township       = $request['nrc_township'];
        $mentor->nrc_citizen        = $request['nrc_citizen'];
        $mentor->nrc_number         = $request['nrc_number'];
        $mentor->race               = $request->race;
        $mentor->religion           = $request->religion;
        $mentor->date_of_birth      = date('Y-m-d',strtotime($request->date_of_birth));
        $mentor->education          = $request->education;
        $mentor->ra_cpa_success_year= $request->ra_cpa_success_year;
        $mentor->ra_cpa_personal_no = $request->ra_cpa_personal_no;
        $mentor->cpa_reg_no         = $request->cpa_reg_no;
        $mentor->cpa_reg_date       = date('Y-m-d',strtotime($request->cpa_reg_date));
        $mentor->ppa_reg_no         = $request->ppa_reg_no;
        $mentor->ppa_reg_date       = date('Y-m-d',strtotime($request->ppa_reg_date));
        $mentor->address            = $request->address;
        $mentor->phone_no           = $request->phone_no;
        $mentor->fax_no             = $request->fax_no;
        $mentor->m_email            = $request->m_email;
        $mentor->audit_firm_name    = $request->audit_firm_name;
        $mentor->audit_started_date = date('Y-m-d',strtotime($request->audit_started_date));
        $mentor->audit_structure    = $request->audit_structure;
        $mentor->audit_staff_no     = $request->audit_staff_no;
        // $mentor->current_check_services      = json_encode($current_check_service);
        $mentor->current_check_services_other= $request->current_check_services_other;
        $mentor->experience                  = $request->experience;
        $mentor->started_teaching_year       = date('Y-m-d',strtotime($request->started_teaching_year));
        $mentor->internship_accept_no        = $request->internship_accept_no;
        $mentor->current_accept_no           = $request->current_accept_no;
        $mentor->trained_trainees_no         = $request->trained_trainees_no;
        $mentor->repeat_yearly               = $request->repeat_yearly;
        $mentor->training_absent             = $request->training_absent;
        $mentor->training_absent_reason      = $request->training_absent_reason;
        $mentor->save();

        $std_info = new StudentInfo();
        $std_info->mentor_id = $mentor->id;
        $std_info->email = $request->email;
        $std_info->password = Hash::make($request->password);
        $std_info->save();
        return response()->json([
            'message' => "Successfully Added"
        ]);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mentor = Mentor::find($id);
        return  response()->json([
            'data' => $mentor
        ],200);
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
        $current_check_service = [];

        foreach($request->current_check_services as $service){
            array_push($current_check_service,$service);
        }
        $mentor = Mentor::find($id);
        $mentor->name_mm = $request->name_mm;
        $mentor->name_eng = $request->name_eng;
        $mentor->father_name_mm     = $request->father_name_mm;
        $mentor->father_name_eng    = $request->father_name_eng;
        $mentor->nrc_state_region   = $request->nrc_state_region;
        $mentor->nrc_township       = $request->nrc_township;
        $mentor->nrc_citizen        = $request->nrc_citizen;
        $mentor->nrc_number         = $request->nrc_number;
        $mentor->education          = $request->education;
        $mentor->ra_cpa_success_year = $request->ra_cpa_success_year;
        $mentor->ra_cpa_personal_no = $request->ra_cpa_personal_no;
        $mentor->cpa_reg_no         = $request->cpa_reg_no;
        $mentor->cpa_reg_date       = $request->cpa_reg_date;
        $mentor->ppa_reg_no         = $request->ppa_reg_no;
        $mentor->ppa_reg_date       = $request->ppa_reg_date;
        $mentor->address            = $request->address;
        $mentor->phone_no           = $request->phone_no;
        $mentor->fax_no             = $request->fax_no;
        $mentor->email              = $request->email;
        $mentor->audit_firm_name    = $request->audit_firm_name;
        $mentor->audit_started_date = $request->audit_started_name;
        $mentor->audit_structure    = $request->audit_structure;
        $mentor->audit_staff_no    = $request->audit_staff_no;
        $mentor->current_check_services      = json_encode($current_check_service);
        $mentor->current_check_services_other = $request->service_other;
        $mentor->started_teaching_year       = $request->started_teaching_year;
        $mentor->internship_accept_no        = $request->internship_accept_no;
        $mentor->current_accept_no           = $request->current_accept_no;
        $mentor->trained_trainees_no         = $request->trained_trainees_no;
        $mentor->yearly_training             = $request->yearly_training;
        $mentor->training_absent             = $request->training_absent;
        $mentor->training_absent_reason      = $request->training_absent_reason;
        $mentor->save();

        
        return response()->json([
            'message' => "Successfully Updated"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentor = Mentor::find($id);
        $mentor->delete();

        return response()->json([
            'message' => "Successfully Delete"
        ]);
    }
}
