<?php

namespace App\Http\Controllers\ArticleController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ApprenticeAccountant;
use App\ApprenticeAccountantGov;
use App\leave_request;
use App\Http\Requests\AppAccRequest;
use App\Invoice;
use App\StudentInfo;
use App\Membership;
use App\Mentor;
use App\EducationHistroy;

use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Hash;
use Carbon\Carbon;

class ArticleController extends Controller
{

    protected $header = array (
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
    );

    protected $options = JSON_UNESCAPED_UNICODE;

    public function index()
    {
        $app_acc = ApprenticeAccountant::get();
        return $app_acc[0]->mentor;

    }

    public function show($id)
    {
        if($id != ""){

            $app_acc = ApprenticeAccountant::where('id', $id)->with('student_info','mentor')->first();

            return response()->json($app_acc, 200, $this->header, $this->options) ;

        }

        return response()->json(['message' => 'No INFO PROVIDE FORM CLIENT!'], 500, $this->header, $this->options);
    }

    public function store(Request $request)
    {
        if ($request->hasfile('request_papp_attach')) {
            $file = $request->file('request_papp_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $request_papp_attach = '/storage/student_info/'.$name;
        }else{
            $request_papp_attach = "";
        }

        if($request->hasfile('apprentice_exp_file'))
        {
            foreach($request->file('apprentice_exp_file') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $apprentice_exp_file[] = '/storage/student_info/'.$name;
            }
        }else{
            $apprentice_exp_file = null;
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = $request->image;
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = $request->nrc_front;
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = $request->nrc_back;
        }
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $degrees_certificates[] = $name;
             }

        }else{
            $degrees_certificates=null;
        }
        if ($request->hasfile('experience_file')) {
            foreach($request->file('experience_file') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $apprentice_exp_file[] = $name;
             }

        }else{
            $experience_file=null;
        }
        if ($request->hasfile('office_order_attach')) {
            $file = $request->file('office_order_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $office_order_attach = '/storage/student_info/'.$name;
        }else{
            $office_order_attach = "";
        }
        if($request->offline_user=="true"){
            //$total_experience = $request->exp_year . "," .$request->exp_month. "," .$request->exp_days;
            $total_experience = [$request->exp_year,$request->exp_month,$request->exp_days];
            //array_push($total_experience,$request->exp_year,$request->exp_month,$request->exp_days);

            //Student Info
            if($request->student_info_id==null){
                $std_info = new StudentInfo();
                $std_info->email = $request->email;
                $std_info->password = Hash::make($request->password);
                $std_info->name_mm = $request->name_mm;
                $std_info->name_eng = $request->name_eng;
                $std_info->father_name_mm = $request->father_name_mm;
                $std_info->father_name_eng = $request->father_name_eng;
                $std_info->phone = $request->phone;
                $std_info->nrc_state_region = $request->nrc_state_region;
                $std_info->nrc_township = $request->nrc_township;
                $std_info->nrc_citizen = $request->nrc_citizen;
                $std_info->nrc_number = $request->nrc_number;
                $std_info->cpersonal_no = $request->personal_no;
                $std_info->nrc_front = $nrc_front;
                $std_info->nrc_back = $nrc_back;
                $std_info->image = $image;
                $std_info->race = $request->race;
                $std_info->religion = $request->religion;
                $std_info->date_of_birth = $request->date_of_birth;
                $std_info->address = $request->address;
                $std_info->current_address = $request->current_address;
                $std_info->gender = $request->gender;
                $std_info->save();
            }else{
                $std_info = StudentInfo::find($request->student_info_id);
                $std_info->password = Hash::make($request->update_password);
                $std_info->phone = $request->phone;
                $std_info->image = $image;
                $std_info->nrc_front = $nrc_front;
                $std_info->nrc_back = $nrc_back;
                $std_info->current_address = $request->current_address;
                $std_info->address = $request->address;
                $std_info->save();
            }
            
            //article
            $acc_app = new ApprenticeAccountant();
            if($request->student_info_id==null){
                $acc_app->student_info_id = $std_info->id;
                
            }else{
                $acc_app->student_info_id = $request->student_info_id;
                
            }
            $acc_app->article_form_type = $request->article_form_type;
            $acc_app->apprentice_exp = $request->experience == "undefined" ? null : $request->experience ;
            $acc_app->apprentice_exp_file = json_encode($apprentice_exp_file) ;
            $acc_app->gov_staff = $request->current_job;
            $acc_app->gov_position = $request->gov_position;
            $acc_app->gov_joining_date = $request->gov_joining_date;
            $acc_app->request_papp = $request->papp_name;
            $acc_app->mentor_id = $request->mentor_id;
            $acc_app->request_papp_attach = $request_papp_attach;
            $acc_app->exam_pass_date = $request->pass_date;
            $acc_app->exam_pass_batch = $request->pass_no;
            $acc_app->current_address = $request->current_address;
            $acc_app->office_order_attach = $office_order_attach;
            //$acc_app->m_email = $request->email;
            $acc_app->ex_papp = $request->previous_papp_name;
            $acc_app->exp_start_date = $request->previous_papp_start_date;
            $acc_app->exp_end_date = $request->previous_papp_end_date;
            $acc_app->total_experience = json_encode($total_experience);
            $acc_app->gender = $request->gender2;
            $acc_app->course_part = $request->course_part;
            $acc_app->school_name = $request->school_name;
            $acc_app->attend_or_fail = $request->attend_fail;
            $acc_app->accept_policy = 1;
            $acc_app->offline_user = true;
            $acc_app->resign_status = 0;
            $acc_app->status = 0;
            $acc_app->done_status = 0;
            $acc_app->course_exam = $request->course_exam;
            $acc_app->save();
            if($degrees_certificates!=null){
                $degrees_certificates=implode(',', $degrees_certificates);
                $new_degrees_certificates= explode(',',$degrees_certificates);
                for($i=0;$i < sizeof($request->degrees);$i++){

                    $education_histroy  =   new EducationHistroy();
                    $education_histroy->student_info_id = $std_info->id;
                    $education_histroy->degree_name = $request->degrees[$i];
                    $education_histroy->certificate     ='/storage/student_info/'.$new_degrees_certificates[$i];
                    $education_histroy->save();
                }
            }
         //invoice
         $invoice = new Invoice();
         $invoice->student_info_id = $std_info->id;

         $invoice->name_eng        = $request->name_eng;
         $invoice->email           = $request->email;
         $invoice->phone           = $request->phone;

         $invoice->invoiceNo = $request->article_form_type.$acc_app->id;
         $invoice->productDesc     = 'Reg Fee, Article Registration Form';
         $invoice->amount          = '5000';
         $invoice->status          = 0;
         //$invoice->save();
        }else{
            
            $total_experience = [$request->exp_year,$request->exp_month,$request->exp_days];
            $acc_app = new ApprenticeAccountant();
            $acc_app->student_info_id = $request->student_info_id;
            $acc_app->article_form_type = $request->article_form_type;
            $acc_app->apprentice_exp = $request->apprentice_exp == "undefined" ? null : $request->apprentice_exp ;

            $acc_app->apprentice_exp_file = json_encode($apprentice_exp_file) ;
            $acc_app->gov_staff = $request->gov_staff;
            $acc_app->gov_position = $request->gov_position;
            $acc_app->gov_joining_date = $request->gov_joining_date;
            if($request->request_papp==""){
                $acc_app->request_papp = $request->papp_name;
            }else{
                $acc_app->request_papp = $request->request_papp;
            }
            
            $acc_app->mentor_id = $request->mentor_id;
            $acc_app->request_papp_attach = $request_papp_attach;
            $acc_app->exam_pass_date = $request->exam_pass_date;
            if($request->exam_pass_batch==""){
                $acc_app->exam_pass_batch = $request->pass_no;
            }else{
                $acc_app->exam_pass_batch = $request->exam_pass_batch;
            }
            
            $acc_app->office_order_attach = $office_order_attach;
            $acc_app->current_address = $request->current_address;
            $acc_app->m_email = $request->m_email;
            if($request->ex_papp==""){
                $acc_app->ex_papp = $request->previous_papp_name;
            }else{
                $acc_app->ex_papp = $request->ex_papp;
            }
            if($request->exp_start_date==""){
                $acc_app->exp_start_date = $request->previous_papp_start_date;
            }else{
                $acc_app->exp_start_date = $request->exp_start_date;
            }
            if($request->exp_end_date==""){
                $acc_app->exp_end_date = $request->previous_papp_end_date;
            }else{
                $acc_app->exp_end_date = $request->exp_end_date;
            }
            $acc_app->course_part = $request->update_course_part;
            $acc_app->school_name = $request->update_school;
            $acc_app->attend_or_fail = $request->???update_attend_or_fail;
            $acc_app->total_experience = json_encode($total_experience);
            $acc_app->accept_policy = $request->accept_policy;
            $acc_app->resign_date = $request->resign_date ?? "N/A";
            $acc_app->resign_reason = $request->resign_reason ?? "N/A";
            $acc_app->recent_org = $request->recent_org ?? "N/A";
            $acc_app->resign_approve_file = $request->resign_approve_file ?? "N/A";
            $acc_app->know_policy = $request->know_policy;
            $acc_app->save();

        //invoice
        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_info_id;

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no=="" ? $request->phone: $std_info->phone;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        $invoice->name_eng        = $std_info->name_eng;
        $invoice->email           = $std_info->email;
        $invoice->phone           = $std_info->phone;

        $invoice->invoiceNo = $request->article_form_type.$acc_app->id;
        $invoice->productDesc     = 'Reg Fee, Article Registration Form';
        $invoice->amount          = '5000';
        $invoice->status          = 0;
        //$invoice->save();
        }

        if($invoice->save()){
            return response()->json(['message' => 'Create Artile Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function update(Request $request, $id)
    {
        if ($request->hasfile('request_papp_attach')) {
            $file = $request->file('request_papp_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $request_papp_attach = '/storage/student_info/'.$name;
        }else{
            $request_papp_attach = "";
        }

        if($request->hasfile('apprentice_exp_file'))
        {
            foreach($request->file('apprentice_exp_file') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $apprentice_exp_file[] = '/storage/student_info/'.$name;
            }
        }else{
            $apprentice_exp_file = null;
        }

        if ($request->hasfile('update_image')) {
            $file = $request->file('update_image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image=$request->update_image;
        }

        if ($request->hasfile('update_nrc_front')) {
            $file = $request->file('update_nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = $request->update_nrc_front;
        }

        if ($request->hasfile('update_nrc_back')) {
            $file = $request->file('update_nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = $request->update_nrc_back;
        }
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $degrees_certificates[] = $name;
             }

        }else{
            $degrees_certificates=null;
        }
        if ($request->hasfile('update_experience_file')) {
            foreach($request->file('update_experience_file') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $apprentice_exp_file[] = $name;
                 
             }
             
             if($request->exp_attach){
                $new_business_license=str_replace(',', '",', $request->exp_attach);
                $apprentice_exp_file[]=$new_business_license;
            }
            $apprentice_exp_file=json_encode($apprentice_exp_file);
        }else{
            $apprentice_exp_file=$request->exp_attach;
        }
        if ($request->hasfile('office_order_attach')) {
            $file = $request->file('office_order_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $office_order_attach = '/storage/student_info/'.$name;
        }else{
            $office_order_attach = $request->office_order_attach;
        }
        if($request->offline_user==true){
            //$total_experience = $request->exp_year . "," .$request->exp_month. "," .$request->exp_days;
            $total_experience = [$request->update_exp_year,$request->update_exp_month,$request->update_exp_days];
            //array_push($total_experience,$request->exp_year,$request->exp_month,$request->exp_days);

            //Student Info
            $std_info = StudentInfo::find($request->student_info_id);
            $std_info->email = $request->update_email;
            $std_info->password = Hash::make($request->update_password);
            $std_info->name_mm = $request->update_name_mm;
            $std_info->name_eng = $request->update_name_eng;
            $std_info->father_name_mm = $request->update_father_name_mm;
            $std_info->father_name_eng = $request->update_father_name_eng;
            $std_info->phone = $request->update_phone;
            $std_info->nrc_state_region = $request->update_nrc_state_region;
            $std_info->nrc_township = $request->update_nrc_township;
            $std_info->nrc_citizen = $request->update_nrc_citizen;
            $std_info->nrc_number = $request->update_nrc_number;
            $std_info->cpersonal_no = $request->update_personal_no;
            $std_info->nrc_front = $nrc_front;
            $std_info->nrc_back = $nrc_back;
            $std_info->image = $image;
            $std_info->race = $request->update_race;
            $std_info->religion = $request->update_religion;
            $std_info->date_of_birth = $request->update_date_of_birth;
            $std_info->address = $request->update_address;
            $std_info->current_address = $request->update_current_address;
            $std_info->gender = $request->update_gender;
            $std_info->save();
            //article
            $acc_app = ApprenticeAccountant::find($id);
            $acc_app->apprentice_exp = $request->update_experience == "undefined" ? null : $request->update_experience ;
            $acc_app->apprentice_exp_file = ($apprentice_exp_file); ;
            $acc_app->gov_staff = $request->update_current_job;
            $acc_app->gov_position = $request->update_gov_position;
            $acc_app->gov_joining_date = $request->update_gov_joining_date;
            $acc_app->request_papp = $request->update_papp_name;
            $acc_app->mentor_id = $request->update_mentor_name;
            $acc_app->request_papp_attach = $request_papp_attach;
            $acc_app->exam_pass_date = $request->pass_date;
            $acc_app->exam_pass_batch = $request->update_pass_no;
            $acc_app->current_address = $request->update_current_address;
            $acc_app->office_order_attach = $office_order_attach;
            $acc_app->ex_papp = $request->update_previous_papp_name;
            $acc_app->exp_start_date = $request->update_previous_papp_start_date;
            $acc_app->exp_end_date = $request->update_previous_papp_end_date;
            $acc_app->total_experience = json_encode($total_experience);
            $acc_app->gender = $request->update_gender2;
            $acc_app->course_part = $request->update_course_part;
            $acc_app->school_name = $request->update_school;
            $acc_app->attend_or_fail = $request->???update_attend_or_fail;
            
            $acc_app->course_exam = $request->update_course_exam;
            $acc_app->status = 0;
            $acc_app->remark = "";
            // if($degrees_certificates!=null){
            //     $degrees_certificates=implode(',', $degrees_certificates);
            //     $new_degrees_certificates= explode(',',$degrees_certificates);
            //     for($i=0;$i < sizeof($request->degrees);$i++){

            //         $education_histroy  =   new EducationHistroy();
            //         $education_histroy->degree_name = $request->degrees[$i];
            //         $education_histroy->certificate     ='/storage/student_info/'.$new_degrees_certificates[$i];
            //         $education_histroy->save();
            //     }
            // }else{
                
            // }
            if($degrees_certificates!=null){
                $degrees_certificates=implode(',', $degrees_certificates);
                $new_degrees_certificates= explode(',',$degrees_certificates);
                for($i=0;$i < sizeof($request->degrees);$i++){
               
                    $education_histroy  =   new EducationHistroy();
                    $education_histroy->student_info_id = $request->student_info_id;
                    $education_histroy->degree_name = $request->degrees[$i];
                    $education_histroy->certificate     ='/storage/student_info/'.$new_degrees_certificates[$i];
                    $education_histroy->save();
                }
            }else{
                
                if ($request->hasfile('old_degrees_certificates')) {
                    foreach($request->file('old_degrees_certificates') as $file)
                    {
                        $name  = uniqid().'.'.$file->getClientOriginalExtension();
                        $file->move(public_path().'/storage/student_info/',$name);
                        $old_degrees_certificates_all[] = $name;
                        
                    }
                }
                if($request->old_degrees!=null){
                    for($i=0;$i < sizeof($request->old_degrees);$i++){
                        if(isset($request->old_degrees_certificates[$i])){
                            
                            if(sizeof($old_degrees_certificates_all)==sizeof($request->old_degrees)){
                                $education_histroy  =EducationHistroy::find($request->old_degrees_id[$i]);
                                $education_histroy->degree_name = $request->old_degrees[$i];
                                $education_histroy->certificate     = '/storage/student_info/'.$old_degrees_certificates_all[$i];
                                $education_histroy->save();
                                
                            }else{
                                foreach($old_degrees_certificates_all as $file)
                                {
                                    $old_degrees_certificates_one = $file;
                                        
                                }
                                $education_histroy  =EducationHistroy::find($request->old_degrees_id[$i]);
                                $education_histroy->degree_name = $request->old_degrees[$i];
                                $education_histroy->certificate     = '/storage/student_info/'.$old_degrees_certificates_one;
                                $education_histroy->save();
                                
                            }
                               
                        }else{
                            $old_degrees_certificates_h=$request->old_degrees_certificates_h;
                            $education_histroy  =EducationHistroy::find($request->old_degrees_id[$i]);
                            $education_histroy->degree_name = $request->old_degrees[$i];
                            $education_histroy->certificate     =$old_degrees_certificates_h[$i];
                            $education_histroy->save();
                            
                        }
                        
                    }
                }
                
                
            }
        }

        if($acc_app->save()){
            return response()->json(['message' => 'Create Artile Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function destory()
    {
        return "destory";
    }

    public function updateRejectFirmArticle(Request $request)
    {
        if ($request->hasfile('request_papp_attach')) {
            $file = $request->file('request_papp_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $request_papp_attach = '/storage/student_info/'.$name;
        }else{
            $request_papp_attach = "";
        }

        if($request->hasfile('apprentice_exp_file'))
        {
            foreach($request->file('apprentice_exp_file') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $apprentice_exp_file[] = '/storage/student_info/'.$name;
            }
        }else{
            $apprentice_exp_file = null;
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = "";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = "";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = "";
        }
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $degrees_certificates[] = $name;
             }

        }else{
            $degrees_certificates=null;
        }
        if ($request->hasfile('experience_file')) {
            foreach($request->file('experience_file') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/student_info/',$name);
                 $apprentice_exp_file[] = $name;
             }

        }else{
            $experience_file=null;
        }
        if ($request->hasfile('office_order_attach')) {
            $file = $request->file('office_order_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $office_order_attach = '/storage/student_info/'.$name;
        }else{
            $office_order_attach = "";
        }
        $acc_app = ApprenticeAccountant::find($request->article_id);
        $acc_app->student_info_id = $request->student_info_id;
        $acc_app->article_form_type = $request->article_form_type;
        $acc_app->apprentice_exp = $request->apprentice_exp == "undefined" ? null : $request->apprentice_exp ;

        $acc_app->apprentice_exp_file = $apprentice_exp_file == null ? $acc_app->apprentice_exp_file : json_encode($apprentice_exp_file) ;
        $acc_app->gov_staff = $request->gov_staff;
        $acc_app->gov_position = $request->gov_position;
        $acc_app->gov_joining_date = $request->gov_joining_date;
        $acc_app->request_papp = $request->request_papp;
        $acc_app->mentor_id = $request->mentor_id;
        $acc_app->request_papp_attach = $request_papp_attach == "" ? $acc_app->request_papp_attach : $request_papp_attach;
        $acc_app->exam_pass_date = $request->exam_pass_date;
        $acc_app->exam_pass_batch = $request->exam_pass_batch;
        $acc_app->current_address = $request->current_address;
        $acc_app->m_email = $request->m_email;
        $acc_app->ex_papp = $request->ex_papp;
        $acc_app->exp_start_date = $request->exp_start_date;
        $acc_app->exp_end_date = $request->exp_end_date;
        $acc_app->accept_policy = $request->accept_policy;
        $acc_app->resign_date = $request->resign_date ?? "N/A";
        $acc_app->resign_reason = $request->resign_reason ?? "N/A";
        $acc_app->recent_org = $request->recent_org ?? "N/A";
        $acc_app->resign_approve_file = $request->resign_approve_file ?? "N/A";
        $acc_app->know_policy = $request->know_policy;
        $acc_app->status = 0;

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back    =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image    =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        if($acc_app->save()){
            return response()->json(['message' => 'Create Artile Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function FilterArticle(Request $request)
    {
        $article = ApprenticeAccountant::where('status',$request->status)
        ->where('article_form_type' ,'<>', 'resign')
        ->where('offline_user',$request->offline_user)
        ->where('done_status','<>',3)
        ->with('student_info')->get();

        $result_article = [];
        for($i=0;$i<count($article);$i++){
            if($article[$i]->contract_end_date != null && ($article[$i]->resign_date ==  null || $article[$i]->resign_date ==  "N/A")){
                $end_time = strtotime($article[$i]->contract_end_date);
                $today = strtotime(Carbon::now());
                if($end_time > $today){
                    array_push($result_article , $article[$i]);
                }
            }else{
                array_push($result_article , $article[$i]);
            }
        }

        $datatable = DataTables::of($result_article)
            ->addColumn('action', function ($infos) {
                if($infos->offline_user==1){
                    return "<div class='btn-group'>
                                <a href='article_show?id=$infos->id&offline_user=true' class='btn btn-primary btn-xs'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </a>
                            </div>";
                }else{
                    return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-sm' onclick='showArticle($infos->id)'>
                                <li class='fa fa-eye fa-sm'></li>
                            </button>
                            </div>";
                }
            })
            ->addColumn('name_mm', function ($infos){
                return $infos->student_info->name_mm;
            })
            ->addColumn('m_email', function ($infos){
                return $infos->student_info->m_email;
            })
            ->addColumn('phone_no', function ($infos){
                return $infos->student_info->phone;
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('status', function ($infos){
                if($infos->status == 0){
                    return "PENDING";
                }else if($infos->status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })

            ->addColumn('registration_fee', function ($infos){
                return "<button type='button' class='btn btn-info mt-0' onclick='showPaymentInfoFirm($infos)'>View Payment</button>";
            })

            ->addColumn('contract_start', function ($infos){
                return $infos->contract_start_date;
            })

            ->addColumn('contract_end', function ($infos){
                return $infos->contract_end_date;
            })

            ->addColumn('mentor_attach_file', function ($infos){
                if($infos->mentor_attach_file){
                  return "<span class='approve'>Submited</span>";
                }
                else{
                  return "<span class='pending'>Not Submited</span>";
                }
            })

            ->addColumn('mentor_name', function ($infos){
              $mentor_name = Mentor::where('id',$infos->mentor_id)->select('name_eng')->get();
              if(sizeof($mentor_name)){
                foreach($mentor_name as $val){
                  return $val->name_eng;
                }
              }
              else{
                return $infos->mentor_id;
              }
            })

            ->addColumn('payment_status', function ($infos){
              $invoice_status = Invoice::where('invoiceNo',$infos->article_form_type.$infos->id)->select('status')->get();
              foreach($invoice_status as $value){
                if($value->status == '0' ){
                  return "<span class='pending'>Incomplete</span>";
                }
                else{
                  return "<span class='approve'>Complete</span>";
                }
              }

            })

            ->addColumn('form_type', function ($infos){
                if($infos->article_form_type == 'c12'){
                    return "CPA I,II";
                }else if($infos->article_form_type == 'c2_pass_1yr'){
                    return "CPA II pass 1 yr";
                }else if($infos->article_form_type == 'c2_pass_3yr'){
                    return "CPA II pass 3 yr";
                }else if($infos->article_form_type == 'qt_firm'){
                    return "QT pass";
                }else if($infos->article_form_type == 'c2_pass_renew'){
                    return "CPA II Pass Renew";
                }else if($infos->article_form_type == 'c12_renew'){
                    return "CPA I,II Renew";
                }else if($infos->article_form_type == 'c2_pass_qt_pass_3yr'){
                    return "CPA II Pass/QT Pass 3 yr";
                }
            });
            $datatable = $datatable->addColumn('contract_start_date', function ($infos){
                if($infos->status == 0){
                    return "<div class='btn-group'>
                        <button type='button' class='btn btn-primary btn-sm' disabled onclick='showContractDate($infos)'>
                            <li class='fa fa-calendar fa-sm'></li>
                        </button>
                    </div>";
                }else if($infos->status == 1){
                    if($infos->contract_start_date == null && $infos->contract_end_date == null){
                        if($infos->mentor_attach_file == null){
                            return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm mr-3' disabled onclick='showContractDate($infos)'>
                                    <li class='fa fa-calendar fa-sm'></li>
                                </button>
                                <button type='button' class='btn btn-warning btn-sm p' disabled onclick='updateContractDate($infos)'>
                                    <li class='fa fa-pencil' fa-sm'></li>
                                </button>
                            </div>";
                        }else{
                            return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm mr-3' onclick='showContractDate($infos)'>
                                    <li class='fa fa-calendar fa-sm'></li>
                                </button>
                                <button type='button' class='btn btn-warning btn-sm p' disabled onclick='updateContractDate($infos)'>
                                    <li class='fa fa-pencil' fa-sm'></li>
                                </button>
                            </div>";
                        }
                    }else if($infos->done_status == 0){
                        return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-sm mr-3' disabled onclick='showContractDate($infos)'>
                                <li class='fa fa-calendar fa-sm'></li>
                            </button>
                            <button type='button' class='btn btn-warning btn-sm p' onclick='updateContractDate($infos)'>
                                <li class='fa fa-pencil' fa-sm'></li>
                            </button>
                        </div>";
                    }else{
                        return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-sm mr-3' disabled onclick='showContractDate($infos)'>
                                <li class='fa fa-calendar fa-sm'></li>
                            </button>
                            <button type='button' class='btn btn-warning btn-sm p' disabled onclick='updateContractDate($infos)'>
                                <li class='fa fa-pencil' fa-sm'></li>
                            </button>
                        </div>";
                    }
                }else{
                    return "<div class='btn-group'>
                        <button type='button' class='btn btn-primary btn-sm' disabled onclick='showContractDate($infos)'>
                            <li class='fa fa-calendar fa-sm'></li>
                        </button>
                    </div>";
                }
            });
            $datatable = $datatable->rawColumns(['contract_start_date', 'status', 'nrc', 'phone_no', 'm_email', 'name_mm', 'action','registration_fee','payment_status','contract_start','contract_end','mentor_name','mentor_attach_file'])->make(true);
            return $datatable;
    }

    public function saveContractDate(Request $request)
    {
        $approve = ApprenticeAccountant::find($request->id);
        $approve->contract_start_date = $request->contract_start_date;
        $approve->contract_end_date = $request->contract_end_date;
        //$approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveDoneForm(Request $request)
    {
        $approve = ApprenticeAccountant::find($request->id);
        if ($request->hasfile('done_form')) {
            $file = $request->file('done_form');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $done_form = '/storage/student_info/'.$name;
        }
        $approve->done_form_attach = $done_form;
        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function filterDoneArticle(Request $request)
    {

        if($request->status == 1){
            //$article=ApprenticeAccountant::where('done_status',$request->status)->get();
            //foreach($article as $article){

                if($request->offline_user==1){
                    $article = ApprenticeAccountant::where('offline_user',$request->offline_user)->where('done_status',$request->status)->orwhere('done_status',2)->where('article_form_type' ,'<>', 'resign')->with('student_info')->get();
                }else{
                    $article = ApprenticeAccountant::where('offline_user',$request->offline_user)->where('done_status',$request->status)->orwhere('done_status',2)->where('article_form_type' ,'<>', 'resign')->where('article_form_type' ,'<>', 'c2_pass_3yr')
                    ->where('article_form_type' ,'<>', 'c2_pass_qt_pass_3yr')
                    ->where('article_form_type' ,'<>', 'c2_pass_1yr')
                    ->with('student_info')->get();
                }
            //}

        }else{
            if($request->offline_user==1){
                $article = ApprenticeAccountant::where('offline_user',$request->offline_user)->where('done_status',$request->status)->orwhere('done_status',2)->where('article_form_type' ,'<>', 'resign')->with('student_info')->get();
            }else{
                $article = ApprenticeAccountant::where('offline_user',$request->offline_user)->where('done_status',$request->status)->orwhere('done_status',2)->where('article_form_type' ,'<>', 'resign')->where('status' , '=' , 1)->with('student_info')->get();
            }

        }

        $result_article = [];
        for($i=0;$i<count($article);$i++){
            if($article[$i]->contract_end_date != null && ($article[$i]->resign_date ==  null || $article[$i]->resign_date ==  "N/A")){
                $end_time = strtotime($article[$i]->contract_end_date);
                $today = strtotime(Carbon::now());
                if($end_time <= $today){
                    array_push($result_article , $article[$i]);
                }
            }
        }


        $datatable = DataTables::of($result_article)
            ->addColumn('action', function ($infos) {
                if($infos->offline_user==1){
                    return "<div class='btn-group'>
                                <a href='article_show?id=$infos->id&offline_user=true' class='btn btn-primary btn-xs'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </a>
                            </div>";
                }else{
                    return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-sm' onclick='showArticle($infos->id)'>
                                <li class='fa fa-eye fa-sm'></li>
                            </button>
                            </div>";
                }

            })
            ->addColumn('name_mm', function ($infos){
                return $infos->student_info->name_mm;
            })
            ->addColumn('email', function ($infos){
                return $infos->student_info->email;
            })
            ->addColumn('contract_start_date', function ($infos){
                return $infos->contract_start_date;
            })
            ->addColumn('contract_end_date', function ($infos){
                return $infos->contract_end_date;
            })
            ->addColumn('leave_days', function ($infos){
                $leave_req = leave_request::where('student_info_id',$infos->student_info_id)
                                          ->where('form_type',$infos->article_form_type)
                                          ->get();
                $total_leave = 0;
                foreach($leave_req as $val){
                  $total_leave += $val->total_leave;
                }
                return $total_leave;
            })
            ->addColumn('mentor_name', function ($infos){
              $mentor_name = Mentor::where('id',$infos->mentor_id)->select('name_eng')->get();
              if(sizeof($mentor_name)){
                foreach($mentor_name as $val){
                  return $val->name_eng;
                }
              }
              else{
                return $infos->mentor_id;
              }
            })
            ->addColumn('phone_no', function ($infos){
                return $infos->student_info->phone;
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('status', function ($infos){
                if($infos->done_status == 0){
                    return "PENDING";
                }else if($infos->done_status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })
            ->addColumn('form_type', function ($infos){
                if($infos->article_form_type == 'c12'){
                    return "CPA I,II";
                }else if($infos->article_form_type == 'c2_pass_1yr'){
                    return "CPA II pass 1 yr";
                }else if($infos->article_form_type == 'c2_pass_3yr'){
                    return "CPA II pass 3 yr";
                }else if($infos->article_form_type == 'qt_firm'){
                    return "QT pass";
                }else if($infos->article_form_type == 'c2_pass_renew'){
                    return "CPA II Pass Renew";
                }else if($infos->article_form_type == 'c12_renew'){
                    return "CPA I,II Renew";
                }else if($infos->article_form_type == 'c2_pass_qt_pass_3yr'){
                    return "CPA II Pass/QT Pass 3 yr";
                }
            })
            ->setRowClass(function ($infos) {
                return $infos->done_form_attach != null && $infos->done_status != 1 ? 'bg-success' : 'bg-light';
            });
            // $datatable = $datatable->addColumn('check_end_date', function ($infos){
            //     return "<div class='btn-group'>
            //                     <button type='button' class='btn btn-warning btn-sm' onclick='checkEndArticle($infos)'>
            //                         <li class='fa fa-pencil fa-sm'></li>
            //                     </button>
            //                 </div>";
            // });
            $datatable = $datatable->rawColumns(['status', 'nrc', 'phone_no', 'email','contract_start_date','contract_end_date','leave_days', 'name_mm', 'action'])->make(true);
            return $datatable;
    }

    public function filterOfflineDoneArticle(Request $request)
    {

        $article = ApprenticeAccountant::where('offline_user',$request->offline_user)->where('done_status',$request->status)->orwhere('done_status',3)->orwhere('done_status',2)->with('student_info')->get();

        // $result_article = [];
        // for($i=0;$i<count($article);$i++){
        //     if($article[$i]->contract_end_date != null && $article[$i]->resign_date ==  null){
        //         $end_time = strtotime($article[$i]->contract_end_date);
        //         $today = strtotime(Carbon::now());
        //         if($end_time <= $today){
        //             array_push($result_article , $article[$i]);
        //         }
        //     }
        // }


        $datatable = DataTables::of($article)
            ->addColumn('action', function ($infos) {
                if($infos->offline_user==1){
                    return "<div class='btn-group'>
                                <a href='article_show?id=$infos->id&offline_user=true' class='btn btn-primary btn-xs'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </a>
                            </div>";
                }else{
                    return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-sm' onclick='showArticle($infos->id)'>
                                <li class='fa fa-eye fa-sm'></li>
                            </button>
                            </div>";
                }

            })
            ->addColumn('name_mm', function ($infos){
                return $infos->student_info->name_mm;
            })
            ->addColumn('email', function ($infos){
                return $infos->student_info->email;
            })
            ->addColumn('contract_start_date', function ($infos){
                return $infos->contract_start_date;
            })
            ->addColumn('contract_end_date', function ($infos){
                return $infos->contract_end_date;
            })
            ->addColumn('leave_days', function ($infos){
                $leave_req = leave_request::where('student_info_id',$infos->student_info_id)
                                          ->where('form_type',$infos->article_form_type)
                                          ->get();
                $total_leave = 0;
                foreach($leave_req as $val){
                  $total_leave += $val->total_leave;
                }
                return $total_leave;
            })
            ->addColumn('mentor_name', function ($infos){
              $mentor_name = Mentor::where('id',$infos->mentor_id)->select('name_eng')->get();
              if(sizeof($mentor_name)){
                foreach($mentor_name as $val){
                  return $val->name_eng;
                }
              }
              else{
                return $infos->mentor_id;
              }
            })
            ->addColumn('phone_no', function ($infos){
                return $infos->student_info->phone;
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('status', function ($infos){
                if($infos->done_status == 0){
                    return "PENDING";
                }else if($infos->done_status == 1){
                    return "APPROVED";
                }else if($infos->done_status == 3){
                    return "Done";
                }else{
                    return "REJECTED";
                }
            })
            ->addColumn('form_type', function ($infos){
                if($infos->article_form_type == 'c12'){
                    return "CPA I,II";
                }else if($infos->article_form_type == 'c2_pass_1yr'){
                    return "CPA II pass 1 yr";
                }else if($infos->article_form_type == 'c2_pass_3yr'){
                    return "CPA II pass 3 yr";
                }else if($infos->article_form_type == 'qt_firm'){
                    return "QT pass";
                }else if($infos->article_form_type == 'c2_pass_renew'){
                    return "CPA II Pass Renew";
                }else if($infos->article_form_type == 'c12_renew'){
                    return "CPA I,II Renew";
                }else if($infos->article_form_type == 'resign'){
                    return "Resign";
                }else if($infos->article_form_type == 'c2_pass_qt_pass_3yr'){
                    return "CPA II Pass/QT Pass 3 yr";
                }
            });
            // ->setRowClass(function ($infos) {
            //     return $infos->done_form_attach != null && $infos->done_status != 1 ? 'bg-success' : 'bg-light';
            // });
            // $datatable = $datatable->addColumn('check_end_date', function ($infos){
            //     return "<div class='btn-group'>
            //                     <button type='button' class='btn btn-warning btn-sm' onclick='checkEndArticle($infos)'>
            //                         <li class='fa fa-pencil fa-sm'></li>
            //                     </button>
            //                 </div>";
            // });
            $datatable = $datatable->rawColumns(['status', 'nrc', 'phone_no', 'email','contract_start_date','contract_end_date','leave_days', 'name_mm', 'action'])->make(true);
            return $datatable;
    }

    public function approve($id)
    {
        $approve = ApprenticeAccountant::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function reject($id,Request $request)
    {
        $reject = ApprenticeAccountant::find($id);
        $reject->status = 2;
        $reject->remark = $request->remark_firm;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function approveDone($id)
    {
        $approve = ApprenticeAccountant::find($id);

        $firm = ApprenticeAccountant::where('student_info_id',$approve->student_info_id)->get();

        $gov = ApprenticeAccountantGov::where('student_info_id',$approve->student_info_id)->get();

        if(count($gov) == 0){
            if($firm[0]->offline_user == 1){
                $start_article = Carbon::parse($firm[0]->exp_start_date);
            }else{
                $start_article = Carbon::parse($firm[0]->contract_start_date);
            }
        }else{
            $start_article = Carbon::parse($gov[0]->contract_start_date);
        }
        $end_article = Carbon::parse($firm[count($firm) - 1]->contract_end_date);

        $diff_days = $end_article->diffInDays($start_article);


        if($diff_days > 1095){  // 1095 = 3yrs
            if(count($gov) != 0){
                $gov[0]->done_status = 3;
                $gov[0]->save();
            }
            for($i = 0; $i<count($firm); $i++){
                $firm[$i]->done_status = 3;
                $firm[$i]->save();
            }
        }else{
            $approve->done_status = 1;
            $approve->save();
        }
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function rejectDone($id)
    {
        $reject = ApprenticeAccountant::find($id);
        $reject->done_status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function saveGovArticle(Request $request)
    {
        $acc_app = new ApprenticeAccountantGov();
        $acc_app->student_info_id = $request->student_info_id;
        $acc_app->labor_registration_no = $request->labor_registration_no;

        // if ($request->hasfile('labor_registration_attach')) {
        //     $file = $request->file('labor_registration_attach');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $labor_registration_attach = '/storage/student_info/'.$name;
        // }

        if($request->hasfile('labor_registration_attach'))
        {
            foreach($request->file('labor_registration_attach') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $labor_registration_attach[] = '/storage/student_info/'.$name;
            }
        }else{
            $labor_registration_attach = null;
        }

        if($request->hasfile('recommend_attach'))
        {
            foreach($request->file('recommend_attach') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $recommend_attach[] = '/storage/student_info/'.$name;
            }
        }else{
            $recommend_attach = null;
        }

        if($request->hasfile('police_attach'))
        {
            foreach($request->file('police_attach') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $police_attach[] = '/storage/student_info/'.$name;
            }
        }else{
            $police_attach = null;
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = "";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = "";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = "";
        }

        // if ($request->hasfile('recommend_attach')) {
        //     $file = $request->file('recommend_attach');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $recommend_attach = '/storage/student_info/'.$name;
        // }

        // if ($request->hasfile('police_attach')) {
        //     $file = $request->file('police_attach');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $police_attach = '/storage/student_info/'.$name;
        // }

        $acc_app->father_job = $request->father_job;
        $acc_app->father_address = $request->father_address;
        $acc_app->married = $request->married;
        $acc_app->married_name = $request->married_name;
        $acc_app->married_job = $request->married_job;
        $acc_app->home_address = $request->home_address;
        $acc_app->current_address = $request->current_address;
        $acc_app->address = $request->address;
        $acc_app->tempory_address = $request->tempory_address;
        $acc_app->m_email = $request->m_email;
        $acc_app->permanent_address = $request->permanent_address;
        $acc_app->labor_registration_attach = json_encode($labor_registration_attach) ;
        $acc_app->recommend_attach = json_encode($recommend_attach);
        $acc_app->police_attach = json_encode($police_attach);
        $acc_app->accept_policy = $request->accept_policy;
        $acc_app->save();

        //invoice
        $fees = \App\Membership::where('membership_name', '=', 'Article')->first(['registration_fee']);
        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_info_id;

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        $invoice->name_eng        = $std_info->name_eng;
        $invoice->email           = $std_info->email;
        $invoice->phone           = $std_info->phone;

        $invoice->invoiceNo = "gov".$acc_app->id;
        $invoice->productDesc     = 'Reg Fee, Article Registration Form';
        $invoice->amount          = $fees->registration_fee;
        $invoice->status          = 0;
        //$invoice->save();

        if($invoice->save()){
            return response()->json(['message' => 'Create Artile Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function updateRejectGovArticle(Request $request)
    {
        if($request->hasfile('labor_registration_attach'))
        {
            foreach($request->file('labor_registration_attach') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $labor_registration_attach[] = '/storage/student_info/'.$name;
            }
        }else{
            $labor_registration_attach = null;
        }

        if($request->hasfile('recommend_attach'))
        {
            foreach($request->file('recommend_attach') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $recommend_attach[] = '/storage/student_info/'.$name;
            }
        }else{
            $recommend_attach = null;
        }

        if($request->hasfile('police_attach'))
        {
            foreach($request->file('police_attach') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $police_attach[] = '/storage/student_info/'.$name;
            }
        }else{
            $police_attach = null;
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = "";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = "";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = "";
        }

        $acc_app = ApprenticeAccountantGov::find($request->article_id);
        $acc_app->student_info_id = $request->student_info_id;
        $acc_app->labor_registration_no = $request->labor_registration_no;
        $acc_app->father_job = $request->father_job;
        $acc_app->father_address = $request->father_address;
        $acc_app->married = $request->married;
        $acc_app->married_name = $request->married_name;
        $acc_app->married_job = $request->married_job;
        $acc_app->home_address = $request->home_address;
        $acc_app->current_address = $request->current_address;
        $acc_app->address = $request->address;
        $acc_app->tempory_address = $request->tempory_address;
        $acc_app->m_email = $request->m_email;
        $acc_app->permanent_address = $request->permanent_address;
        $acc_app->labor_registration_attach = $labor_registration_attach == null ? $acc_app->labor_registration_attach : json_encode($labor_registration_attach) ;
        $acc_app->recommend_attach = $recommend_attach == null ? $acc_app->recommend_attach : json_encode($recommend_attach);
        $acc_app->police_attach = $police_attach == null ?  $acc_app->police_attach : json_encode($police_attach);
        $acc_app->accept_policy = $request->accept_policy;
        $acc_app->status = 0;

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        if($acc_app->save()){
            return response()->json(['message' => 'Create Artile Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function showGovArticle($id)
    {
        if($id != ""){

            $app_acc = ApprenticeAccountantGov::where('id', $id)->with('student_info')->first();

            return response()->json($app_acc, 200, $this->header, $this->options) ;

        }

        return response()->json(['message' => 'No INFO PROVIDE FORM CLIENT!'], 500, $this->header, $this->options);
    }

    public function FilterGovArticle(Request $request)
    {
        $article = ApprenticeAccountantGov::where('status',$request->status)->where('done_status','<>',3)->with('student_info')->get();

        $result_article = [];
        $article_type = "gov";
        for($i=0;$i<count($article);$i++){
            if($article[$i]->contract_end_date != null && ($article[$i]->resign_date ==  null || $article[$i]->resign_date ==  "N/A")){
                $end_time = strtotime($article[$i]->contract_end_date);
                $today = strtotime(Carbon::now());
                if($end_time > $today){
                    array_push($result_article , $article[$i]);
                }
            }else{
                array_push($result_article , $article[$i]);
            }
        }
        $datatable = DataTables::of($result_article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showGovArticle($infos->id)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            })
            ->addColumn('name_mm', function ($infos){
                return $infos->student_info->name_mm;
            })
            ->addColumn('m_email', function ($infos){
                return $infos->student_info->m_email;
            })
            ->addColumn('phone_no', function ($infos){
                return $infos->student_info->phone;
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('status', function ($infos){
                if($infos->status == 0){
                    return "PENDING";
                }else if($infos->status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })

            ->addColumn('registration_fee', function ($infos){

                return "<button type='button' class='btn btn-info mt-0' onclick='showPaymentInfo($infos)'>View Payment</button>";
            })

            ->addColumn('contract_start', function ($infos){
                if($infos->contract_start_date){
                  return $infos->contract_start_date;
                }
                else{
                  return "-";
                }
            })

            ->addColumn('contract_end', function ($infos){
                if($infos->contract_end_date){
                  return $infos->contract_end_date;
                }
                else{
                  return "-";
                }
            })

            ->addColumn('mentor_attach_file', function ($infos){
                if($infos->mentor_attach_file){
                  return "<span class='approve'>Submited</span>";
                }
                else{
                  return "<span class='pending'>Not Submited</span>";
                }
            })

            // ->addColumn('mentor_name', function ($infos){
            //   $mentor_name = Mentor::where('id',$infos->mentor_id)->select('name_eng')->get();
            //   if($mentor_name){
            //     foreach($mentor_name as $val){
            //       return $val->name_eng;
            //     }
            //   }
            //   else{
            //     return $infos->mentor_id;
            //   }
            // })

            ->addColumn('payment_status', function ($infos){
              $invoice_status = Invoice::where('invoiceNo','gov'.$infos->id)->select('status')->get();
              foreach($invoice_status as $value){
                if($value->status == '0' ){
                  return "<span class='pending'>Incomplete</span>";
                }
                else{
                  return "<span class='approve'>Complete</span>";
                }
              }

            })

            ->addColumn('form_type', function ($infos){
                return "Gov Form";
            });
        $datatable = $datatable->addColumn('contract_start_date', function ($infos){
            if($infos->status == 0){
                return "<div class='btn-group'>
                    <button type='button' class='btn btn-primary btn-sm' disabled onclick='showGovContractDate($infos)'>
                        <li class='fa fa-calendar fa-sm'></li>
                    </button>
                </div>";
            }else if($infos->status == 1){
                if($infos->contract_start_date == null && $infos->contract_end_date == null){
                    return "<div class='btn-group'>
                        <button type='button' class='btn btn-primary btn-sm mr-3' onclick='showGovContractDate($infos)'>
                            <li class='fa fa-calendar fa-sm'></li>
                        </button>
                        <button type='button' class='btn btn-warning btn-sm p' disabled onclick='updateGovContractDate($infos)'>
                            <li class='fa fa-pencil' fa-sm'></li>
                        </button>
                    </div>";
                }else if($infos->done_status == 0){
                    return "<div class='btn-group'>
                        <button type='button' class='btn btn-primary btn-sm mr-3' disabled onclick='showGovContractDate($infos)'>
                            <li class='fa fa-calendar fa-sm'></li>
                        </button>
                        <button type='button' class='btn btn-warning btn-sm p' onclick='updateGovContractDate($infos)'>
                            <li class='fa fa-pencil' fa-sm'></li>
                        </button>
                    </div>";
                }else{
                    return "<div class='btn-group'>
                        <button type='button' class='btn btn-primary btn-sm mr-3' disabled onclick='showGovContractDate($infos)'>
                            <li class='fa fa-calendar fa-sm'></li>
                        </button>
                        <button type='button' class='btn btn-warning btn-sm p' disabled onclick='updateGovContractDate($infos)'>
                            <li class='fa fa-pencil' fa-sm'></li>
                        </button>
                    </div>";
                }
            }else{
                return "<div class='btn-group'>
                    <button type='button' class='btn btn-primary btn-sm' disabled onclick='showGovContractDate($infos)'>
                        <li class='fa fa-calendar fa-sm'></li>
                    </button>
                </div>";
            }
        });
        $datatable = $datatable->rawColumns(['contract_start_date', 'status', 'nrc', 'phone_no', 'm_email', 'name_mm', 'action','registration_fee','payment_status','contract_start','contract_end','mentor_attach_file'])->make(true);
        return $datatable;
    }

    public function saveGovContractDate(Request $request)
    {
        $approve = ApprenticeAccountantGov::find($request->id);
        $approve->contract_start_date = $request->contract_start_date;
        $approve->contract_end_date = $request->contract_end_date;
        //$approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveGovDoneForm(Request $request)
    {
        $approve = ApprenticeAccountantGov::find($request->id);
        if ($request->hasfile('done_form')) {
            $file = $request->file('done_form');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $done_form = '/storage/student_info/'.$name;
        }
        $approve->done_form_attach = $done_form;
        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function filterGovDoneArticle(Request $request)
    {
        if($request->status == 1){
            // $article = ApprenticeAccountant::join('ApprenticeAccountantGov')
            //             ->join('student_info_id', '=', 'ApprenticeAccountantGov.student_info_id')
            //             ->where('done_status',$request->status)->with('student_info')->get();
            // $data = DB::table('apprentice_accountants')
            //     ->join('apprentice_accountants_gov', 'apprentice_accountants.student_info_id', '=', 'apprentice_accountants_gov.student_info_id')
            //     ->where('apprentice_accountants.done_status','=', 1)
            //     ->where('apprentice_accountants_gov.done_status','=', 1)
            //     ->get();

            $article = ApprenticeAccountantGov::where('done_status',$request->status)->orwhere('done_status',2)->with('student_info')->get();
        }else{
            $article = ApprenticeAccountantGov::where('done_status',$request->status)->orwhere('done_status',2)->where('status' , '=' , 1)->with('student_info')->get();
        }

        $result_article = [];
        for($i=0;$i<count($article);$i++){
            if($article[$i]->contract_end_date != null && ($article[$i]->resign_date ==  null || $article[$i]->resign_date ==  "N/A")){
                $end_time = strtotime($article[$i]->contract_end_date);
                $today = strtotime(Carbon::now());
                if($end_time <= $today){
                    array_push($result_article , $article[$i]);
                }
            }
        }



        $datatable = DataTables::of($result_article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showGovArticle($infos->id)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            })
            ->addColumn('name_mm', function ($infos){
                return $infos->student_info->name_mm;
            })
            ->addColumn('email', function ($infos){
                return $infos->student_info->email;
            })
            ->addColumn('contract_start_date', function ($infos){
                return $infos->contract_start_date;
            })
            ->addColumn('contract_end_date', function ($infos){
                return $infos->contract_end_date;
            })
            ->addColumn('leave_days', function ($infos){
                $leave_req = leave_request::where('student_info_id',$infos->student_info_id)
                                          ->where('form_type','gov')
                                          ->get();
                $total_leave = 0;
                foreach($leave_req as $val){
                  $total_leave += $val->total_leave;
                }
                return $total_leave;
            })

            ->addColumn('phone_no', function ($infos){
                return $infos->student_info->phone;
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('status', function ($infos){
                if($infos->done_status == 0){
                    return "PENDING";
                }else if($infos->done_status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })
            ->addColumn('form_type', function ($infos){
                return "Gov Form";
            })
            ->setRowClass(function ($infos) {
                return $infos->done_form_attach != null && $infos->done_status != 1 ? 'bg-success' : 'bg-light';
            });
        // $datatable = $datatable->addColumn('check_end_date', function ($infos){
        //     return "<div class='btn-group'>
        //                     <button type='button' class='btn btn-warning btn-sm' onclick='checkEndGovArticle($infos)'>
        //                         <li class='fa fa-pencil fa-sm'></li>
        //                     </button>
        //                 </div>";
        // });
        $datatable = $datatable->rawColumns(['status', 'nrc', 'phone_no', 'email','contract_start_date','contract_end_date','leave_days', 'name_mm', 'action'])->make(true);
        return $datatable;
    }

    public function approveGov($id)
    {
        $approve = ApprenticeAccountantGov::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function rejectGov($id,Request $request)
    {
        $reject = ApprenticeAccountantGov::find($id);
        $reject->status = 2;
        $reject->remark = $request->remark_gov;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function approveDoneGov($id)
    {
        $approve = ApprenticeAccountantGov::find($id);
        $approve->done_status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function rejectDoneGov($id)
    {
        $reject = ApprenticeAccountantGov::find($id);
        $reject->done_status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function saveResignArticle(Request $request)
    {
        $acc_app = new ApprenticeAccountant();
        $acc_app->student_info_id = $request->student_info_id;

        if ($request->hasfile('resign_approve_attach')) {
            $file = $request->file('resign_approve_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $resign_approve_attach = '/storage/student_info/'.$name;
        }else{
            $resign_approve_attach = "";
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = "";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = "";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = "";
        }

        $acc_app->resign_date = $request->resign_date;
        $acc_app->resign_reason = $request->resign_reason;
        $acc_app->recent_org = $request->recent_org;
        $acc_app->m_email = $request->m_email;
        $acc_app->resign_approve_file = $resign_approve_attach;
        $acc_app->know_policy = $request->know_policy;
        $acc_app->article_form_type = $request->article_form_type;
        $acc_app->gov_staff = 0;
        $acc_app->offline_user = $request->offline_user;
        $acc_app->contract_start_date = $request->contract_start_date;
        //$acc_app->contract_end_date = $request->contract_end_date;
        $acc_app->mentor_id = $request->mentor_id;
        $acc_app->save();

        $gov_article = ApprenticeAccountantGov::where('student_info_id',$request->student_info_id)->get();
        $article = ApprenticeAccountant::where('student_info_id',$request->student_info_id)->get();
        if(count($gov_article) != 0){
            $gov_article[(count($gov_article))-1]->resign_date = $request->resign_date;
            $gov_article[(count($gov_article))-1]->save();
        }else{
            $article[(count($article))-2]->resign_date = $request->resign_date;
            $article[(count($article))-2]->save();
        }

        //invoice
        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_info_id;

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        $invoice->name_eng        = $std_info->name_eng;
        $invoice->email           = $std_info->email;
        $invoice->phone           = $std_info->phone;

        $invoice->invoiceNo = $request->article_form_type.$acc_app->id;
        $invoice->productDesc     = 'Resign Fee, Article Resign Form';
        $invoice->amount          = '300000';
        $invoice->status          = 0;
        //$invoice->save();

        // return $acc_app;
        if($invoice->save()){
            return response()->json($invoice, 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function updateRejectResignArticle(Request $request)
    {
        if ($request->hasfile('resign_approve_attach')) {
            $file = $request->file('resign_approve_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $resign_approve_attach = '/storage/student_info/'.$name;
        }else{
            $resign_approve_attach = "";
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = "";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = "";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = "";
        }

        $acc_app = ApprenticeAccountant::find($request->article_id);
        $acc_app->student_info_id = $request->student_info_id;
        $acc_app->resign_date = $request->resign_date;
        $acc_app->resign_reason = $request->resign_reason;
        $acc_app->recent_org = $request->recent_org;
        $acc_app->m_email = $request->m_email;
        $acc_app->resign_approve_file = $resign_approve_attach == "" ? $acc_app->resign_approve_file : $resign_approve_attach;
        $acc_app->know_policy = $request->know_policy;
        $acc_app->article_form_type = $request->article_form_type;
        $acc_app->gov_staff = 0;
        $acc_app->offline_user = $request->offline_user;
        $acc_app->resign_status = 0;

        $gov_article = ApprenticeAccountantGov::where('student_info_id',$request->student_info_id)->get();
        $article = ApprenticeAccountant::where('student_info_id',$request->student_info_id)->get();
        if(count($gov_article) != 0){
            $gov_article[(count($gov_article))-1]->resign_date = $request->resign_date;
            $gov_article[(count($gov_article))-1]->save();
        }else{
            $article[(count($article))-2]->resign_date = $request->resign_date;
            $article[(count($article))-2]->save();
        }

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        if($acc_app->save()){
            return response()->json(['message' => 'Update Artile Update!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function showResignArticle($id)
    {
        if($id != ""){

            $app_acc = ApprenticeAccountant::where('id', $id)->with('student_info')->first();

            return response()->json($app_acc, 200, $this->header, $this->options) ;

        }

        return response()->json(['message' => 'No INFO PROVIDE FORM CLIENT!'], 500, $this->header, $this->options);
    }

    public function FilterResignArticle(Request $request)
    {
        $article = ApprenticeAccountant::where('resign_status',$request->status)->where('done_status',0)->where('article_form_type', '=' , 'resign')->where('offline_user',$request->offline_user)->with('student_info')->get();

        // foreach($article as $val){
        //   $resign_date = $val->resign_date;
        //   $article_result = ApprenticeAccountant::where('student_info_id',$val->student_info_id)
        //                                           ->where('article_form_type','<>','resign')
        //                                           ->get();
        //   $article_result_gov = ApprenticeAccountantGov::where('student_info_id',$val->student_info_id)->get();
        //   if($article_result_gov){
        //     $contract_start_date = $article_result_gov[0]->contract_start_date;
        //   }
        //
        // }
        $article_resign_result = [];
        foreach($article as $article_resign){
            foreach($article_resign->student_info->invoice as $article_invice){
                if($article_invice->invoiceNo == 'resign'.$article_resign->id && $article_invice->status != '0'){
                    array_push($article_resign_result , $article_resign);
                }
            }
        }

        $article_type = "resign";

        $datatable = DataTables::of($article_resign_result)
            ->addColumn('action', function ($infos) {
                // return "<div class='btn-group'>
                //                 <button type='button' class='btn btn-primary btn-sm' onclick='showResignArticle($infos->id)'>
                //                     <li class='fa fa-eye fa-sm'></li>
                //                 </button>
                //             </div>";
                if($infos->offline_user==1){
                    return "<div class='btn-group'>
                                <a href='resign_article_show?id=$infos->id&offline_user=true' class='btn btn-primary btn-xs'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </a>
                            </div>";
                }else{
                    return "<div class='btn-group'>
                            <button type='button' class='btn btn-primary btn-sm' onclick='showResignArticle($infos->id)'>
                                <li class='fa fa-eye fa-sm'></li>
                            </button>
                            </div>";
                }
            })
            ->addColumn('name_mm', function ($infos){
                return $infos->student_info->name_mm;
            })
            ->addColumn('m_email', function ($infos){
                return $infos->student_info->m_email;
            })
            ->addColumn('phone_no', function ($infos){
                return $infos->student_info->phone;
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })

            ->addColumn('resign_fee', function ($infos){
                $length = count($infos->student_info->invoice);
                for($i=0 ; $i< $length; $i++){
                    if($infos->student_info->invoice[$i]->invoiceNo == 'resign'.$infos->id){
                        // if($infos->student_info->invoice[$i]->status == '0'){
                        //     return "PENDING";
                        // }else{
                        //     return "COMPLETED";
                        // }
                        return "<button type='button' class='btn btn-info mt-0' onclick='showPaymentInfoResign($infos)'>View Payment</button>";
                    }
                }
            })

            ->addColumn('payment_status', function ($infos){
              $invoice_status = Invoice::where('invoiceNo','resign'.$infos->id)->select('status')->get();
              foreach($invoice_status as $value){
                if($value->status == '0' ){
                  return "<span class='pending'>Incomplete</span>";
                }
                else{
                  return "<span class='approve'>Complete</span>";
                }
              }

            })

            ->addColumn('status', function ($infos){
                if($infos->resign_status == 0){
                    return "PENDING";
                }else if($infos->resign_status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })

            ->addColumn('net_experience', function ($infos){
                return "N/A";
            })

            ->addColumn('contract_start_date', function ($infos){
                return $infos->contract_start_date;
            })

            ->addColumn('contract_end_date', function ($infos){
                return $infos->contract_end_date;
            })

            ->addColumn('form_type', function ($infos){
                return $infos->article_form_type;
            })

            ->addColumn('mentor_attach_file', function ($infos){
                if($infos->mentor_attach_file){
                  return "<span class='approve'>Submited</span>";
                }
                else{
                  return "<span class='pending'>Not Submited</span>";
                }
            })

            ->addColumn('mentor_name', function ($infos){
              $mentor_name = Mentor::where('id',$infos->mentor_id)->select('name_eng')->get();
              if(sizeof($mentor_name)){
                foreach($mentor_name as $val){
                  return $val->name_eng;
                }
              }
              else{
                return $infos->mentor_id;
              }
            })

            ->addColumn('resign_date', function ($infos){
                return $infos->resign_date;
            });

            $datatable = $datatable->rawColumns(['status', 'nrc', 'phone_no', 'm_email', 'name_mm', 'action','resign_fee','resign_date','net_experience','payment_status','mentor_name','contract_start_date','contract_end_date','form_type','mentor_attach_file'])->make(true);
            return $datatable;
    }

    public function approveResign($id)
    {
        $approve = ApprenticeAccountant::find($id);
        $approve->resign_status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function rejectResign($id,Request $request)
    {
        $reject = ApprenticeAccountant::find($id);
        $reject->resign_status = 2;
        $reject->remark = $request->remark_resign;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }



    public function filterDone3yrsArticle(Request $request)
    {
        $article = ApprenticeAccountant::where('done_status',3)->with('student_info')->where('offline_user',0)->get();
        $article_gov = ApprenticeAccountantGov::where('done_status',3)->with('student_info')->get();

        $result_article = [];
        for($i=0;$i<count($article);$i++){
            array_push($result_article , $article[$i]);
        }
        for($i=0;$i<count($article_gov);$i++){
            array_push($result_article , $article_gov[$i]);
        }

        $datatable = DataTables::of($result_article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showArticle($infos->id)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            })
            ->addColumn('name_mm', function ($infos){
                return $infos->student_info->name_mm;
            })
            ->addColumn('email', function ($infos){
                return $infos->student_info->email;
            })
            ->addColumn('contract_start_date', function ($infos){
                return $infos->contract_start_date;
            })
            ->addColumn('contract_end_date', function ($infos){
                return $infos->contract_end_date;
            })
            ->addColumn('leave_days', function ($infos){
                $leave_req = leave_request::where('student_info_id',$infos->student_info_id)
                                          ->where('form_type','gov')
                                          ->get();
                $total_leave = 0;
                foreach($leave_req as $val){
                  $total_leave += $val->total_leave;
                }
                return $total_leave;
            })
            ->addColumn('phone_no', function ($infos){
                return $infos->student_info->phone;
            })
            ->addColumn('mentor_name', function ($infos){
              if($infos->article_form_type == 'gov' ){
                return "-";
              }
              else{
                $mentor_name = Mentor::where('id',$infos->mentor_id)
                                     ->select('name_eng')
                                     ->get();
                if(sizeof($mentor_name)){
                  foreach($mentor_name as $val){
                    return $val->name_eng;
                  }
                }
                else{
                  return $infos->mentor_id;
                }
              }
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('status', function ($infos){
                if($infos->done_status == 0){
                    return "PENDING";
                }else if($infos->done_status == 1){
                    return "APPROVED";
                }else if($infos->done_status == 2){
                    return "REJECTED";
                }else{
                    return "Done";
                }
            })
            ->addColumn('form_type', function ($infos){
                if($infos->article_form_type == 'c12'){
                    return "CPA I,II";
                }else if($infos->article_form_type == 'c2_pass_1yr'){
                    return "CPA II pass 1 yr";
                }else if($infos->article_form_type == 'c2_pass_3yr'){
                    return "CPA II pass 3 yr";
                }else if($infos->article_form_type == 'qt_firm'){
                    return "QT pass";
                }else if($infos->article_form_type == 'c2_pass_renew'){
                    return "CPA II Pass Renew";
                }else if($infos->article_form_type == 'c12_renew'){
                    return "CPA I,II Renew";
                }else if($infos->article_form_type == 'resign'){
                    return "Resign";
                }else{
                    return "Government";
                }
            });
            // ->setRowClass(function ($infos) {
            //     return $infos->done_form_attach != null ? 'bg-success' : 'bg-warning';
            // });
            $datatable = $datatable->rawColumns(['status', 'nrc', 'phone_no', 'email','contract_start_date','contract_end_date','leave_days', 'name_mm', 'action'])->make(true);
            return $datatable;
    }

    public function filterDoneResignArticle(Request $request)
    {
        $article = ApprenticeAccountant::where('done_status',1)->where('article_form_type' ,'resign')->with('student_info')->get();

        $datatable = DataTables::of($article)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                                <button type='button' class='btn btn-primary btn-sm' onclick='showResignArticle($infos->id)'>
                                    <li class='fa fa-eye fa-sm'></li>
                                </button>
                            </div>";
            })
            ->addColumn('name_mm', function ($infos){
                return $infos->student_info->name_mm;
            })
            ->addColumn('m_email', function ($infos){
                return $infos->student_info->m_email;
            })
            ->addColumn('phone_no', function ($infos){
                return $infos->student_info->phone;
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->student_info->nrc_state_region . "/" . $infos->student_info->nrc_township . "(" . $infos->student_info->nrc_citizen . ")" . $infos->student_info->nrc_number;
                return $nrc_result;
            })
            ->addColumn('registration_fee', function ($infos){
                return $infos->registration_fee == null ? "-" : $infos->registration_fee;
            })
            ->addColumn('status', function ($infos){
                if($infos->resign_status == 0){
                    return "PENDING";
                }else if($infos->resign_status == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            });
            // ->setRowClass(function ($infos) {
            //     return $infos->done_form_attach != null ? 'bg-success' : 'bg-warning';
            // });
            $datatable = $datatable->rawColumns(['status', 'nrc', 'phone_no', 'm_email', 'name_mm', 'action'])->make(true);
            return $datatable;
    }

    public function saveRegistrationFee(Request $request)
    {
        $article = ApprenticeAccountant::find($request->id);
        $article->registration_fee = 'yes';
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveGovRegistrationFee(Request $request)
    {
        $article = ApprenticeAccountantGov::find($request->id);
        $article->registration_fee = 'yes';
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveAttachFile(Request $request)
    {
        $article = ApprenticeAccountant::find($request->id);

        // if ($request->hasfile('attach_file')) {
        //     $file = $request->file('attach_file');
        //     $name  = uniqid().'.'.$file->getClientOriginalExtension();
        //     $file->move(public_path().'/storage/student_info/',$name);
        //     $attach_file = '/storage/student_info/'.$name;
        // }

        if($request->hasfile('attach_file'))
        {
            foreach($request->file('attach_file') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $attach_file[] = '/storage/student_info/'.$name;
            }
        }else{
            $attach_file = null;
        }

        $article->mentor_attach_file = $attach_file;
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveGovAttachFile(Request $request)
    {
        $article = ApprenticeAccountantGov::find($request->id);

        if($request->hasfile('gov_attach_file'))
        {
            foreach($request->file('gov_attach_file') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/student_info/',$name);
                $gov_attach_file[] = '/storage/student_info/'.$name;
            }
        }else{
            $gov_attach_file = null;
        }

        $article->mentor_attach_file = $gov_attach_file;
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveRenewArticle(Request $request)
    {
        $acc_app = new ApprenticeAccountant();
        $acc_app->student_info_id = $request->student_info_id;
        $acc_app->article_form_type = $request->article_form_type;
        $acc_app->apprentice_exp = $request->apprentice_exp == "undefined" ? null : $request->apprentice_exp ;

        if ($request->hasfile('request_papp_attach')) {
            $file = $request->file('request_papp_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $request_papp_attach = '/storage/student_info/'.$name;
        }else{
            $request_papp_attach = "";
        }

        if ($request->hasfile('office_order_attach')) {
            $file = $request->file('office_order_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $office_order_attach = '/storage/student_info/'.$name;
        }else{
            $office_order_attach = "";
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = "";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = "";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = "";
        }

        // $acc_app->gov_staff = $request->gov_staff;
        // $acc_app->gov_position = $request->gov_position;
        // $acc_app->gov_joining_date = $request->gov_joining_date;
        $acc_app->request_papp = $request->request_papp;
        $acc_app->mentor_id = $request->mentor_id;
        $acc_app->request_papp_attach = $request_papp_attach;
        $acc_app->office_order_attach = $office_order_attach;
        $acc_app->current_address = $request->current_address;
        $acc_app->m_email = $request->m_email;
        $acc_app->ex_papp = $request->ex_papp;
        $acc_app->exp_start_date = $request->exp_start_date;
        $acc_app->exp_end_date = $request->exp_end_date;
        $acc_app->accept_policy = $request->accept_policy;
        $acc_app->offline_user = $request->offline_user;
        $acc_app->save();

        //invoice
        $invoice = new Invoice();
        $invoice->student_info_id = $request->student_info_id;

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        $invoice->name_eng        = $std_info->name_eng;
        $invoice->email           = $std_info->email;
        $invoice->phone           = $std_info->phone;

        $invoice->invoiceNo = $request->article_form_type.$acc_app->id;
        $invoice->productDesc     = 'Reg Fee, Article Renew Form';
        $invoice->amount          = '5000';
        $invoice->status          = 0;
        //$invoice->save();

        if($invoice->save()){
            return response()->json(['message' => 'Create Artile Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function updateRejectRenewArticle(Request $request)
    {
        if ($request->hasfile('request_papp_attach')) {
            $file = $request->file('request_papp_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $request_papp_attach = '/storage/student_info/'.$name;
        }else{
            $request_papp_attach = "";
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = "";
        }

        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = "";
        }

        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = "";
        }

        $acc_app = ApprenticeAccountant::find($request->article_id);
        $acc_app->student_info_id = $request->student_info_id;
        $acc_app->article_form_type = $request->article_form_type;
        $acc_app->apprentice_exp = $request->apprentice_exp == "undefined" ? null : $request->apprentice_exp ;
        $acc_app->request_papp = $request->request_papp;
        $acc_app->mentor_id = $request->mentor_id;
        $acc_app->request_papp_attach = $request_papp_attach == "" ? $acc_app->request_papp_attach  : $request_papp_attach;
        $acc_app->current_address = $request->current_address;
        $acc_app->m_email = $request->m_email;
        $acc_app->ex_papp = $request->ex_papp;
        $acc_app->exp_start_date = $request->exp_start_date;
        $acc_app->exp_end_date = $request->exp_end_date;
        $acc_app->accept_policy = $request->accept_policy;
        $acc_app->offline_user = $request->offline_user;
        $acc_app->status = 0;

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        if($acc_app->save()){
            return response()->json(['message' => 'Create Artile Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function getResignEndDate($student_info_id)
    {
        $article = ApprenticeAccountant::where('student_info_id', $student_info_id)->with('student_info')->get();
        return $article;
    }

    public function saveLeaveRequest(Request $request)
    {
        if($request->form_name == "gov"){
            $approve = ApprenticeAccountantGov::find($request->id);
            $form_type = "gov";
        }else{
            $approve = ApprenticeAccountant::find($request->id);
            $form_type = $approve->article_form_type;
        }

        $leave_request = new leave_request();
        $leave_request->student_info_id = $approve->student_info_id;
        $leave_request->form_type = $form_type;
        $leave_request->start_date = $request->start_date;
        $leave_request->end_date = $request->end_date;
        $leave_request->total_leave = $request->total_date;
        $leave_request->remark = $request->remark;
        if($leave_request->save()){
            return response()->json(['message' => 'Create Leave Request Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function getLeaveRequest(Request $request)
    {
        if($request->form_name == 'gov'){
            $approve = ApprenticeAccountantGov::find($request->id);
            $form_type = 'gov';
        }else{
            $approve = ApprenticeAccountant::find($request->id);
            $form_type = $approve->article_form_type;
        }
        $data = leave_request::where('student_info_id',$approve->student_info_id)->where('form_type',$form_type)->get();
        return $data;
    }

    public function getUpdateLeaveRequest($id)
    {
        $result = leave_request::find($id);
        return $result;
    }

    public function updateLeaveRequest(Request $request)
    {
        $leave_request = leave_request::find($request->id);
        $leave_request->start_date = $request->start_date;
        $leave_request->end_date = $request->end_date;
        $leave_request->total_leave = $request->total_date;
        $leave_request->remark = $request->remark;
        if($leave_request->save()){
            return response()->json(['message' => 'Create Leave Request Success!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }

    public function getArticleList($id)
    {
        $article = ApprenticeAccountant::where('mentor_id', $id)->with('student_info')->get();
        return $article;
    }

    public function saveContractEndDate(Request $request)
    {
        $approve = ApprenticeAccountant::find($request->id);
        $approve->contract_end_date = $request->contract_end_date;

        $leave_request = leave_request::where('student_info_id',$request->student_info_id)->where('form_type',$request->article_form_type)->get();
        for($i = 0 ; $i < count($leave_request) ; $i++){
            $leave_request[$i]->status = 1;
            $leave_request[$i]->save();
        }

        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveGovContractEndDate(Request $request)
    {
        $approve = ApprenticeAccountantGov::find($request->id);
        $approve->contract_end_date = $request->contract_gov_end_date;

        $leave_request = leave_request::where('student_info_id',$request->student_info_id)->where('form_type',$request->article_form_type)->get();
        for($i = 0 ; $i < count($leave_request) ; $i++){
            $leave_request[$i]->status = 1;
            $leave_request[$i]->save();
        }

        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function createDoneFormLink($id)
    {
        $article = ApprenticeAccountant::find($id);
        $article->yes_done_attach = 1;
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function govCreateDoneFormLink($id)
    {
        $article = ApprenticeAccountantGov::find($id);
        $article->yes_done_attach = 1;
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function saveRenewContractDate(Request $request)
    {
        $approve = ApprenticeAccountant::find($request->id);
        $approve->contract_start_date = $request->renew_start_date;
        $approve->contract_end_date = $request->renew_end_date;
        //$approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function continueArticle(Request $request)
    {
        $article = ApprenticeAccountant::find($request->id);

        $article->contract_end_date = $request->contract_end_date;
        $article->save();
        return response()->json([
            'message' => "You have successfully!"
        ],200);
    }

    public function rejectDoneAttach(Request $request)
    {
        $reject = ApprenticeAccountant::find($request->id);
        $reject->done_remark = $request->reason;
        $reject->done_status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that done attach!"
        ],200);
    }

    public function rejectGovDoneAttach(Request $request)
    {
        $reject = ApprenticeAccountantGov::find($request->id);
        $reject->done_remark = $request->reason;
        $reject->done_status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that done attach!"
        ],200);
    }
    public function updateResignArticle(Request $request,$id)
    {
        if ($request->hasfile('update_resign_approve_attach')) {
            $file = $request->file('update_resign_approve_attach');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $resign_approve_attach = '/storage/student_info/'.$name;
        }else{
            $resign_approve_attach = $request->update_resign_approve_attach;
        }

        if ($request->hasfile('update_image')) {
            $file = $request->file('update_image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/storage/student_info/', $name);
            $image = '/storage/student_info/' . $name;
        }else{
            $image = $request->update_image;
        }

        if ($request->hasfile('update_nrc_front')) {
            $file = $request->file('update_nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_front = '/storage/student_info/'.$name;
        }else{
            $nrc_front = $request->update_nrc_front;
        }

        if ($request->hasfile('update_nrc_back')) {
            $file = $request->file('update_nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $nrc_back = '/storage/student_info/'.$name;
        }else{
            $nrc_back = $request->update_nrc_back;
        }

        $acc_app = ApprenticeAccountant::find($id);
        $acc_app->resign_date = $request->update_resign_date;
        $acc_app->resign_reason = $request->update_resign_reason;
        $acc_app->recent_org = $request->update_recent_org;
        $acc_app->m_email = $request->update_m_email;
        $acc_app->resign_approve_file = $resign_approve_attach == "" ? $acc_app->resign_approve_file : $resign_approve_attach;
        $acc_app->resign_status = 0;
        $acc_app->remark = "";

        $gov_article = ApprenticeAccountantGov::where('student_info_id',$request->student_info_id)->get();
        $article = ApprenticeAccountant::where('student_info_id',$request->student_info_id)->get();
        if(count($gov_article) != 0){
            $gov_article[(count($gov_article))-1]->resign_date = $request->update_resign_date;
            $gov_article[(count($gov_article))-1]->save();
        }else{
            $article[(count($article))-2]->resign_date = $request->update_resign_date;
            $article[(count($article))-2]->save();
        }

        $std_info = StudentInfo::where('id' , $request->student_info_id)->first();
        $std_info->phone        =   $request->update_phone_no;
        $std_info->nrc_front    =   $nrc_front == "" ? $std_info->nrc_front : $nrc_front;
        $std_info->nrc_back     =   $nrc_back == "" ? $std_info->nrc_back : $nrc_back;
        $std_info->image        =   $image == "" ? $std_info->image : $image;
        $std_info->save();

        if($acc_app->save()){
            return response()->json(['message' => 'Update Artile Update!'], 200, $this->header, $this->options);
        }
        return response()->json(['message' => 'Error While Data Save!'], 500, $this->header, $this->options);
    }
}
