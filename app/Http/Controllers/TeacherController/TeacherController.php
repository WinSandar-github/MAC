<?php

namespace App\Http\Controllers\TeacherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TeacherRegister;
use App\StudentInfo;
use App\EducationHistroy;
use App\Invoice;
use App\Membership;

use Hash;
use DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;    
use Carbon\Carbon;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = TeacherRegister::orderBy('created_at','desc')->get();
        $count_invoice_no=DB::table('teacher_registers')->select(DB::raw('COUNT(invoice_no) as count_invoice_no'))->get();
        return  response()->json([
            'data' => $teacher,
            'count_invoice_no'=>$count_invoice_no
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
        // profile photo
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $image = '/storage/teacher_info/'.$name;
        }
        // nrc front image
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_front = '/storage/teacher_info/'.$name;
        }
        // nrc back image
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_back = '/storage/teacher_info/'.$name;
        }
        if ($request->hasfile('recommend_letter')) {
            $file = $request->file('recommend_letter');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $recommend_letter = '/storage/teacher_info/'.$name;
        }else{
            $recommend_letter=null;
        }
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/teacher_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }else{
            $degrees_certificates=null;
        }
        if ($request->hasfile('teacher_card')) {
            $file = $request->file('teacher_card');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $teacher_card = '/storage/teacher_info/'.$name;
        }else{
            $teacher_card=null;
        }
        $teacher = new TeacherRegister();
        $teacher->name_mm = $request->name_mm;
        $teacher->name_eng = $request->name_eng;
        $teacher->father_name_mm = $request->father_name_mm;
        $teacher->father_name_eng = $request->father_name_eng;
        $teacher->reg_date = date('Y-m-d');
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->password = Hash::make($request->password);
        $teacher->nrc_state_region = $request->nrc_state_region;
        $teacher->nrc_township = $request->nrc_township;
        $teacher->nrc_citizen = $request->nrc_citizen;
        $teacher->nrc_number = $request->nrc_number;
        $teacher->nrc_front = $nrc_front;
        $teacher->nrc_back = $nrc_back;
        $teacher->gov_employee = $request->gov_employee;
        $teacher->exp_desc = $request->exp_desc;
        $teacher->image = $image;
        
        $certificates = ""; $diplomas = "";$cpa_subject_count=0;$da_subject_count=0;
        if($request->certificates!=null){
            foreach($request->certificates as $c){
                $certificates = $certificates . $c . ',';
    
            }
            $cpa_subject_count=sizeof($request->certificates);
        }
        
        if($request->diplomas!=null){
            foreach($request->diplomas as $d){
                $diplomas = $diplomas . $d . ',';
    
            }
            $da_subject_count=sizeof($request->diplomas);
        }
        
        $teacher->certificates = rtrim($certificates, ',');
        $teacher->diplomas = rtrim($diplomas, ',');
        $teacher->race = $request->race;
        $teacher->religion = $request->religion;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->address = $request->address;
        $teacher->eng_address = $request->eng_address;
        $teacher->current_address = $request->current_address;
        $teacher->eng_current_address = $request->eng_current_address;
        $teacher->recommend_letter = $recommend_letter;
        $teacher->position = $request->position;
        $teacher->department = $request->department;
        $teacher->organization = $request->organization;
        $teacher->school_id = $request->selected_school_id;
        $teacher->school_type = $request->school_type;
        $teacher->school_name = $request->school_name;
        if($request->offline_user){
            $teacher->offline_user = true;
        }
        $teacher->from_valid_date = $request->from_valid_date;
        $teacher->t_code = $request->t_code;
        $teacher->teacher_card = $teacher_card;
        $teacher->save();
           
        //Student Info
        if($request->student_info_id!=0){
            $std_info =StudentInfo::find($request->student_info_id);
            $std_info->teacher_id = $teacher->id;
            $std_info->password = Hash::make($request->password);
            $std_info->save();
        }else{
            $std_info = new StudentInfo();
            $std_info->teacher_id = $teacher->id;
            $std_info->email = $request->email;
            $std_info->password = Hash::make($request->password);
            $std_info->save();
        }
        $teacher->regno = 'T-'.$teacher->id;
        $teacher->student_info_id = $std_info->id;
        $teacher->save();

        if($degrees_certificates!=null){
            $degrees_certificates=implode(',', $degrees_certificates);
            $new_degrees_certificates= explode(',',$degrees_certificates);
            for($i=0;$i < sizeof($request->degrees);$i++){
           
                $education_histroy  =   new EducationHistroy();
                $education_histroy->student_info_id = $std_info->id;
                $education_histroy->degree_name = $request->degrees[$i];
                $education_histroy->certificate     ='/storage/teacher_info/'.$new_degrees_certificates[$i];
                $education_histroy->teacher_id      = $teacher->id;
                $education_histroy->save();
            }
        }
        
        $memberships = Membership::where('membership_name', 'like', 'Teacher')->get();
        
        //invoice
        if($request->offline_user==null){
            $invoice = new Invoice();
            $invoice->student_info_id = $std_info->id;
            $invoice->invoiceNo = 'init_tec'.$teacher->id;//
            
            $invoice->name_eng        = $request->name_eng;
            $invoice->email           = $request->email;
            $invoice->phone           = $request->phone;

            foreach($memberships as $memberships){
                $invoice->productDesc     = 'Application Fee,Registration Fee,'.$cpa_subject_count.'x CPA One Subject Yearly Fee('.$memberships->cpa_subject_fee.'),'.$da_subject_count.'x DA One Subject Yearly Fee('.$memberships->da_subject_fee.'),Teacher Registration';
                $invoice->amount          = $memberships->form_fee.','.$memberships->registration_fee.','.$cpa_subject_count*$memberships->cpa_subject_fee.','.$da_subject_count*$memberships->da_subject_fee;
            }
           
            $invoice->status          = 0;
            $invoice->save();
        }
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
        $teacher = TeacherRegister::with('student_info')->where('id',$id)->get();
        return  response()->json([
            'data' => $teacher
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
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $image = '/storage/teacher_info/'.$name;
        }
        // nrc front image
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_front = '/storage/teacher_info/'.$name;
        }else{
            $nrc_front =$request->nrc_front;
        }
        
        // nrc back image
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_back = '/storage/teacher_info/'.$name;
        }else{
            $nrc_back =$request->nrc_back;
        }
        if ($request->hasfile('recommend_letter')) {
            $file = $request->file('recommend_letter');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $recommend_letter = '/storage/teacher_info/'.$name;
        }else{
            $recommend_letter=$request->recommend_letter;
        }
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/teacher_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }else{
            $degrees_certificates='null';
        }
        if ($request->hasfile('teacher_card')) {
            $file = $request->file('teacher_card');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $teacher_card = '/storage/teacher_info/'.$name;
        }else{
            $teacher_card=$request->teacher_card;
        }
        $teacher = TeacherRegister::find($id);
        $teacher->phone = $request->phone_number;
        $teacher->nrc_front = $nrc_front;
        $teacher->nrc_back = $nrc_back;
        $teacher->nrc_state_region = $request->update_nrc_state_region;
        $teacher->nrc_township = $request->update_nrc_township;
        $teacher->nrc_citizen = $request->update_nrc_citizen;
        $teacher->nrc_number = $request->update_nrc_number;
        $teacher->gov_employee = $request->gov_employee;
        $teacher->exp_desc = $request->exp_desc;
        $teacher->image = $image;

        $certificates = ""; $diplomas = "";$cpa_subject_count=0;$da_subject_count=0;
        if($request->certificates!=null){
            foreach($request->certificates as $c){
                $certificates = $certificates . $c . ',';
    
            }
            $cpa_subject_count=sizeof($request->certificates);
        }
        
        if($request->diplomas!=null){
            foreach($request->diplomas as $d){
                $diplomas = $diplomas . $d . ',';
    
            }
            $da_subject_count=sizeof($request->diplomas);
        }
        $teacher->certificates = rtrim($certificates, ',');
        $teacher->diplomas = rtrim($diplomas, ',');
        $teacher->address = $request->address;
        $teacher->eng_address = $request->eng_address;
        $teacher->current_address = $request->current_address;
        $teacher->eng_current_address = $request->eng_current_address;
        $teacher->recommend_letter = $recommend_letter;
        $teacher->position = $request->position;
        $teacher->department = $request->department;
        $teacher->organization = $request->organization;
        $teacher->school_id = $request->update_selected_school_id;
        $teacher->school_type = $request->update_school_type;
        $teacher->school_name = $request->update_school_name;
        $teacher->approve_reject_status = 0;
        $teacher->reason = $request->reason;
        $teacher->from_valid_date = $request->from_valid_date;
        $teacher->t_code = $request->t_code;
        $teacher->teacher_card = $teacher_card;
        $teacher->save();

       
        if($request->degrees!=null){
            $degrees_certificates=implode(',', $degrees_certificates);
            $new_degrees_certificates= explode(',',$degrees_certificates);
            for($i=0;$i < sizeof($request->degrees);$i++){
           
                $education_histroy  =   new EducationHistroy();
                $education_histroy->student_info_id = $request->student_info_id;
                $education_histroy->degree_name = $request->degrees[$i];
                $education_histroy->certificate     ='/storage/teacher_info/'.$new_degrees_certificates[$i];
                $education_histroy->teacher_id       = $teacher->id;
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
        $memberships = Membership::where('membership_name', 'like', 'Teacher')->get();
        if($request->offline_user!=1){
            $invoice =Invoice::where("invoiceNo",'init_tec'.$id)->get();
            // $invoice->student_info_id = $std_info->id;
            // $invoice->invoiceNo = 'init_tec'.$teacher->id;
            
            foreach($invoice as $inNo){
                $inNo->name_eng        = $request->name_eng;
                $inNo->email           = $request->email;
                $inNo->phone           = $request->phone;

                foreach($memberships as $memberships){
                    $inNo->productDesc     = 'Application Fee,Registration Fee,'.$cpa_subject_count.'x CPA One Subject Yearly Fee('.$memberships->cpa_subject_fee.'),'.$da_subject_count.'x DA One Subject Yearly Fee('.$memberships->da_subject_fee.'),Teacher Registration';
                    $inNo->amount          = $memberships->form_fee.','.$memberships->registration_fee.','.$cpa_subject_count*$memberships->cpa_subject_fee.','.$da_subject_count*$memberships->da_subject_fee;
                }
            
                $inNo->status          = 0;
                $inNo->save();
            }
        }
        // $std_info = StudentInfo::find($request->student_info_id);
        // $std_info->payment_method = null;
        // $std_info->approve_reject_status = 0;
        // $std_info->save();
        return response()->json([
            'message' => 'You have updated successfully.'
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
        //
    }

    public function approve_teacher_register(Request $request)
    {
        $std_info = StudentInfo::find($request->student_info_id);
        $std_info->approve_reject_status = $request->status;
        $std_info->save();
        $teacher = TeacherRegister::find($request->id);
        $teacher->approve_reject_status = $request->status;
        $teacher->reason = $request->reason;
        $teacher->save();
        return response()->json([
            'message' => 'You have approved this user.'
        ],200);
    }

    public function FilterTeacher(Request $request)
    {
        if($request->offline_user==true){
            $teacher = TeacherRegister::where('approve_reject_status',$request->status)
                                        ->where('offline_user',1)
                                        ->orderBy('created_at','desc');
            if($request->name!=""){
                $teacher=$teacher->where('name_mm', 'like', '%' . $request->name. '%')
                ->orWhere('name_eng', 'like', '%' . $request->name. '%');
            }
            if($request->nrc!=""){
                $teacher=$teacher->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
            }
            $teachers=$teacher->get();
            return DataTables::of($teachers)
            ->addColumn('action', function ($infos) {
                return "<div class='btn-group'>
                            <a href='teacher_edit?id=$infos->id&offline_user=true' class='btn btn-primary btn-xs'>
                                <li class='fa fa-eye fa-sm'></li>
                            </a>
                            </div>";
            })
            ->addColumn('nrc', function ($infos){
                $nrc_result = $infos->nrc_state_region . "/" . $infos->nrc_township . "(" . $infos->nrc_citizen . ")" . $infos->nrc_number;
                return $nrc_result;
            })
            ->addColumn('status', function ($infos){
                if($infos->approve_reject_status	 == 0){
                    return "PENDING";
                }else if($infos->approve_reject_status	 == 1){
                    return "APPROVED";
                }else{
                    return "REJECTED";
                }
            })
            ->addColumn('reason', function ($infos){
                if($infos->reason == ""){
                    return "";
                   
                }else{
                    return $infos->reason;
                   
                }
            })
            // ->addColumn('exp_date', function ($infos){
            //     return $infos->from_valid_date.' to 31-Dec-'.date('Y');
            // })
            ->addColumn('card', function ($infos) {
                return "<div class='btn-group'>
                            <a href='MAC/public$infos->teacher_card' class='btn btn-info btn-xs' target='_blank'>
                                <li class='nc-icon nc-tap-01'></li>
                            </a>
                        </div>";
                
            })
            ->rawColumns(['card','action'])
            ->make(true);
        }else{
            // $teacher = DB::table('teacher_registers')
            //             ->join('invoices', 'invoices.transRef','=', 'teacher_registers.payment_menthod')
            //             ->

           $teacher = TeacherRegister::where('approve_reject_status',$request->status)
                                        ->where('initial_status',$request->initial_status)
                                        ->where('offline_user',null)
                                        //->select('teacher_registers.*');
                                        
                                        ->orderBy('teacher_registers.created_at','desc');
                                       // ->distinct();
                                       // ->groupBy('teacher_registers.id');
            //$teacher = StudentInfo::where('id',$id)->with('teacher', 'invoice')->get();             
            // if($request->name!=""){
            //     $teacher=$teacher->where('name_mm', 'like', '%' . $request->name. '%')
            //                 ->orWhere('name_eng', 'like', '%' . $request->name. '%');
            // }
            // if($request->nrc!=""){
            //     $teacher=$teacher->where(DB::raw('CONCAT(nrc_state_region, "/", nrc_township,"(",nrc_citizen,")",nrc_number)'),$request->nrc);
            // }
            $teachers=$teacher->get();
           
            return DataTables::of($teachers)
                ->addColumn('action', function ($infos) {
                    $btn='';
                    if($infos->initial_status==0){
                        $btn="<div class='btn-group'>
                                    <a href='teacher_edit?id=$infos->id' class='btn btn-primary btn-xs' onclick='showMentorStudent($infos->id)'>
                                        <li class='fa fa-eye fa-sm'></li>
                                    </a>
                                </div>";
                        return $btn;
                    }else if($infos->initial_status==1){
                        $btn="<div class='btn-group'>
                                    <a href='renew_teacher_edit?id=$infos->id' class='btn btn-primary btn-xs' onclick='showMentorStudent($infos->id)'>
                                        <li class='fa fa-eye fa-sm'></li>
                                    </a>
                                </div>";
                        return $btn;
                    }
                    
                })
                ->addColumn('nrc', function ($infos){
                    $nrc_result = $infos->nrc_state_region . "/" . $infos->nrc_township . "(" . $infos->nrc_citizen . ")" . $infos->nrc_number;
                    return $nrc_result;
                })
                ->addColumn('status', function ($infos){
                    if($infos->approve_reject_status	 == 0){
                        return "PENDING";
                    }else if($infos->approve_reject_status	 == 1){
                        return "APPROVED";
                    }else{
                        
                        return "REJECTED";
                    }
                })
                
                ->addColumn('payment_method', function ($infos){
                    if($infos->initial_status==0){
                        $invoice=Invoice::when($infos->payment_method, function($q) use ($infos){
                            $q->where('tranRef', '=', $infos->payment_method);
                        })
                        ->where('student_info_id',$infos->student_info_id)
                        ->where('invoiceNo',"init_tec".$infos->id)
                        
                        ->get();
                       
                    }else{
                        $invoice=Invoice::when($infos->payment_method, function($q) use ($infos){
                            $q->where('tranRef', '=', $infos->payment_method);
                        })
                        ->where('student_info_id',$infos->student_info_id)
                        ->where('invoiceNo',"renew_tec".$infos->id)
                        ->get();
                       
                    }
                    foreach($invoice as $i){
                        return $i->status == "0"
                            ? "Payment Incomplete"
                            : "Payment Complete";
                    }
                    
                    
                })
                
                ->addColumn('exp_date', function ($infos){
                    // if($infos->initial_status==0){
                    //     if($infos->payment_method =="" && $infos->from_valid_date==""){//$infos->from_valid_date
                    //         return "";
                    //     }else{
                    //         $date = Carbon::createFromFormat('Y-m-d H:i:s', $infos->from_valid_date);
                    //         return $date->format('d-m-Y').' to 31-12-'.date('Y');
                    //     }
                    // }else if($infos->initial_status==1){
                    //     if(	$infos->payment_method =="" && $infos->from_valid_date==""){//$infos->from_valid_date
                    //         return "";
                    //     }else{
                    //         return '01-01-'.date('Y').' to 31-12-'.date('Y');
                    //     }
                    // }
                    if($infos->initial_status==0){
                        $invoice=Invoice::when($infos->payment_method, function($q) use ($infos){
                            $q->where('tranRef', '=', $infos->payment_method);
                        })
                        ->where('student_info_id',$infos->student_info_id)
                        ->where('invoiceNo',"init_tec".$infos->id)
                        
                        ->get();
                        foreach($invoice as $i){
                            return $i->status == "0"
                                ? ""
                                : $i->dateTime.' to '.date('Y').'-12-31';
                        }
                    }else{
                        $invoice=Invoice::when($infos->payment_method, function($q) use ($infos){
                            $q->where('tranRef', '=', $infos->payment_method);
                        })
                        ->where('student_info_id',$infos->student_info_id)
                        ->where('invoiceNo',"renew_tec".$infos->id)
                        ->get();
                        foreach($invoice as $i){
                            return $i->status == "0"
                                ? ""
                                : date('Y').'-01-01 to '.date('Y').'-12-31';
                        }
                    }
                    
                })
                ->addColumn('card', function ($infos) {
                    $btn='';
                    if($infos->initial_status==0){
                        $invoice=Invoice::when($infos->payment_method, function($q) use ($infos){
                            $q->where('tranRef', '=', $infos->payment_method);
                        })
                        ->where('student_info_id',$infos->student_info_id)
                        ->where('invoiceNo',"init_tec".$infos->id)
                        
                        ->get();
                       
                    }else{
                        $invoice=Invoice::when($infos->payment_method, function($q) use ($infos){
                            $q->where('tranRef', '=', $infos->payment_method);
                        })
                        ->where('student_info_id',$infos->student_info_id)
                        ->where('invoiceNo',"renew_tec".$infos->id)
                        ->get();
                       
                    }
                    foreach($invoice as $i){
                        return $i->status == "0"
                            ? ""
                            : "<div class='btn-group'>
                                    <a href='teacher_card?id=$infos->id' class='btn btn-primary btn-xs'>
                                        <li class='fa fa-id-card-o fa-sm'></li>
                                    </a>
                                </div>";
                    }
                    // if($infos->payment_method != ""){
                        // $btn = "<div class='btn-group'>
                        //             <a href='teacher_card?id=$infos->id' class='btn btn-primary btn-xs'>
                        //                 <li class='fa fa-id-card-o fa-sm'></li>
                        //             </a>
                        //         </div>";
                    //     return $btn;
                        
                    // }else{
                    //     return $btn;
                    // }
                    
                })
                ->addColumn('remark', function ($infos){
                    if($infos->cessation_reason == ""){
                        return "";
                       
                    }else{
                        return $infos->cessation_reason;
                       
                    }
                })
                ->addColumn('reason', function ($infos){
                    if($infos->reason == ""){
                        return "";
                       
                    }else{
                        return $infos->reason;
                       
                    }
                })
                ->addColumn('payment_date', function ($infos){
                    // if($infos->initial_status==0){
                    //     if($infos->from_valid_date	 == ""){
                    //         return "";
                    //     }else{
                    //         $date = Carbon::createFromFormat('Y-m-d H:i:s', $infos->from_valid_date);
                    //         return $date->format('d-m-Y');
                    //     }
                    // }else if($infos->initial_status==1){
                    //     if($infos->from_valid_date	 == ""){
                    //         return "";
                    //     }else{
                    //         $date = Carbon::createFromFormat('Y-m-d', $infos->from_valid_date);
                    //         return $date->format('d-m-Y');
                    //     }
                    // }
                    if($infos->initial_status==0){
                        $invoice=Invoice::when($infos->payment_method, function($q) use ($infos){
                            $q->where('tranRef', '=', $infos->payment_method);
                        })
                        ->where('student_info_id',$infos->student_info_id)
                        ->where('invoiceNo',"init_tec".$infos->id)
                        
                        ->get();
                       
                    }else{
                        $invoice=Invoice::when($infos->payment_method, function($q) use ($infos){
                            $q->where('tranRef', '=', $infos->payment_method);
                        })
                        ->where('student_info_id',$infos->student_info_id)
                        ->where('invoiceNo',"renew_tec".$infos->id)
                        ->get();
                       
                    }
                    foreach($invoice as $i){
                        return $i->status == "0"
                            ? ""
                            : $i->dateTime;
                    }
                })
                ->addColumn('yearly', function ($infos){
                    if($infos->renew_date	 == ""){
                        return "";
                    }else{
                        $date = Carbon::createFromFormat('Y-m-d', $infos->renew_date);
                        return $date->format('Y');
                    }
                })
                ->rawColumns(['card','action'])
                ->make(true);
        }
        
        
    }
    public function teacherStatus($id)
    {
        $data = StudentInfo::where('id',$id)->with('teacher', 'invoice')->get();
        return response()->json($data,200);
    }

    public function approveTeacher(Request $request)
    { 
        $teacher = TeacherRegister::find($request->id);
        $teacher->payment_method = 'CASH';
        $teacher->invoice_no = $request->invoice_no;
        $teacher->t_code = $request->invoice_no;
        $teacher->from_valid_date = $request->current_date;
        $teacher->to_valid_date = '31-12-'.date('Y');
        $teacher->save();
        return response()->json([
            'data' => $teacher,
        ],200);
    }

    public function check_payment($id)
    {
        $data = TeacherRegister::where('id',$id)->get();
        return response()->json($data,200);
    }
    public function getEducationHistory(Request $request)
    {
        if($request->school_id){
            $data = EducationHistroy::where('school_id',$request->school_id)->get();
            return response()->json([
                'data' => $data
            ],200);
        }else if($request->teacher_id){
            $data = EducationHistroy::where('teacher_id',$request->teacher_id)->get();
            return response()->json([
                'data' => $data
            ],200);
        }else if($request->schoolstudent_info_id){
            $data = EducationHistroy::where('student_info_id',$request->schoolstudent_info_id)
                                    ->where('teacher_id','=',null)
                                    ->get();
            return response()->json([
                'data' => $data
            ],200);
        }else{
            $data = EducationHistroy::where('student_info_id',$request->student_info_id)
                                    ->where('school_id','=',null)
                                    ->get();
            return response()->json([
                'data' => $data
            ],200);
        }
        
    }
    public function getTeacher($id)
    {
        $data = TeacherRegister::where('student_info_id',$id)->get();
        return response()->json([
            'data' => $data
        ],200);
    }
    public function getTeacherByTCode($t_code)
    {
        $data = TeacherRegister::where('t_code',$t_code)->get();
        return response()->json([
            'data' => $data
        ],200);
    }
    public function cessation_teacher_register(Request $request)
    {
        $std_info = StudentInfo::find($request->student_info_id);
        $std_info->approve_reject_status = $request->status;
        $std_info->save();
        $teacher = TeacherRegister::find($request->id);
        $teacher->approve_reject_status = $request->status;
        $teacher->cessation_reason = $request->cessation_reason;
        $teacher->initial_status = $request->initial_status;
        $teacher->save();
        return response()->json([
            'message' => 'You have approved this user.'
        ],200);
    }
    public function renewTeacher(Request $request)
    {
        // profile photo
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $image = '/storage/teacher_info/'.$name;
        }
        // nrc front image
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_front = '/storage/teacher_info/'.$name;
        }else{
            $nrc_front =null;
        }
        // nrc back image
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_back = '/storage/teacher_info/'.$name;
        }else{
            $nrc_back =null;
        }
        
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/teacher_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }else{
            $degrees_certificates=null;
        }
        // card 
        if ($request->hasfile('teacher_card')) {
            $file = $request->file('teacher_card');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $teacher_card = '/storage/teacher_info/'.$name;
        }else{
            $teacher_card =null;
        }
        $teacher = new TeacherRegister();
        $teacher->name_mm = $request->name_mm;
        $teacher->name_eng = $request->name_eng;
        $teacher->father_name_mm = $request->father_name_mm;
        $teacher->father_name_eng = $request->father_name_eng;
        $teacher->reg_date = date('Y-m-d');
        $teacher->renew_date = date('Y-m-d');
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->nrc_state_region = $request->nrc_state_region;
        $teacher->nrc_township = $request->nrc_township;
        $teacher->nrc_citizen = $request->nrc_citizen;
        $teacher->nrc_number = $request->nrc_number;
        $teacher->nrc_front = $nrc_front;
        $teacher->nrc_back = $nrc_back;
        $teacher->image = $image;
        $teacher->teacher_card = $teacher_card;
        
        $certificates = ""; $diplomas = "";$cpa_subject_count=0;$da_subject_count=0;
        if($request->certificates!=null){
            foreach($request->certificates as $c){
                $certificates = $certificates . $c . ',';
    
            }
            $cpa_subject_count=sizeof($request->certificates);
        }
        
        if($request->diplomas!=null){
            foreach($request->diplomas as $d){
                $diplomas = $diplomas . $d . ',';
    
            }
            $da_subject_count=sizeof($request->diplomas);
        }
        $teacher->certificates = rtrim($certificates, ',');
        $teacher->diplomas = rtrim($diplomas, ',');
        $teacher->current_address = $request->current_address;
        $teacher->eng_current_address = $request->eng_current_address;
        $teacher->school_id = $request->selected_school_id;
        $teacher->school_type = $request->school_type;
        $teacher->school_name = $request->school_name;
        $teacher->t_code = $request->t_code;
        $teacher->regno = $request->regno;
        $teacher->initial_status  = 1;
        $teacher->student_info_id  = $request->student_info_id;
        $teacher->from_valid_date  = $request->from_valid_date;
        $teacher->save();
        
        
        if($degrees_certificates!=null){
            $degrees_certificates=implode(',', $degrees_certificates);
            $new_degrees_certificates= explode(',',$degrees_certificates);
            for($i=0;$i < sizeof($request->degrees);$i++){
           
                $education_histroy  =   new EducationHistroy();
                $education_histroy->student_info_id = $request->student_info_id;
                $education_histroy->degree_name = $request->degrees[$i];
                $education_histroy->certificate     ='/storage/teacher_info/'.$new_degrees_certificates[$i];
                $education_histroy->teacher_id      = $teacher->id;
                $education_histroy->save();
            }
        }
        $memberships = Membership::where('membership_name', 'like', 'Teacher')->get();
        
        //invoice
            
            $invoice = new Invoice();
            $invoice->student_info_id = $request->student_info_id;
            $invoice->invoiceNo = 'renew_tec'.$teacher->id;//
            
            $invoice->name_eng        = $request->name_eng;
            $invoice->email           = $request->email;
            $invoice->phone           = $request->phone;
            
            foreach($memberships as $memberships){
                $invoice->productDesc     = 'Application Fee,'.$cpa_subject_count.'x CPA One Subject Renew Fee('.$memberships->renew_cpa_subject_fee.'),'.$da_subject_count.'x DA One Subject Renew Fee('.$memberships->renew_da_subject_fee.'),Teacher Registration';
                $invoice->amount          = $memberships->form_fee.','.$cpa_subject_count*$memberships->renew_cpa_subject_fee.','.$da_subject_count*$memberships->renew_da_subject_fee;
            }
           
            $invoice->status          = 0;
            $invoice->save();

        return response()->json([
            'message' => 'Success Registration.'
        ],200);
    }
    
    public function approveRenewTeacher(Request $request)
    { 
        $currentDate = Carbon::now();
        $teacher = TeacherRegister::find($request->id);
        $teacher->payment_method = 'CASH';
        $teacher->from_valid_date = date('Y-m-d');
        $teacher->to_valid_date = '31-12-'.$currentDate->format('Y');
        $teacher->save();
        return response()->json([
            'data' => $teacher,
        ],200);
    }
    public function renewTeacherUpdate(Request $request,$id)
    {
        // profile photo
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $image = '/storage/teacher_info/'.$name;
        }
        // nrc front image
        if ($request->hasfile('nrc_front')) {
            $file = $request->file('nrc_front');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_front = '/storage/teacher_info/'.$name;
        }else{
            $nrc_front =$request->nrc_front;
        }
        // nrc back image
        if ($request->hasfile('nrc_back')) {
            $file = $request->file('nrc_back');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $nrc_back = '/storage/teacher_info/'.$name;
        }else{
            $nrc_back =$request->nrc_back;
        }
        
        if ($request->hasfile('degrees_certificates')) {
            foreach($request->file('degrees_certificates') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/teacher_info/',$name);
                 $degrees_certificates[] = $name;
             }
            
        }else{
            $degrees_certificates=null;
        }
        if ($request->hasfile('renew_teacher_card')) {
            $file = $request->file('renew_teacher_card');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/teacher_info/',$name);
            $teacher_card = '/storage/teacher_info/'.$name;
        }else{
            $teacher_card=$request->teacher_card;
        }
        $teacher =TeacherRegister::find($id);
        // $teacher->name_mm = $request->name_mm;
        // $teacher->name_eng = $request->name_eng;
        // $teacher->father_name_mm = $request->father_name_mm;
        // $teacher->father_name_eng = $request->father_name_eng;
        $teacher->renew_date = date('Y-m-d');
        // $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        // $teacher->nrc_state_region = $request->nrc_state_region;
        // $teacher->nrc_township = $request->nrc_township;
        // $teacher->nrc_citizen = $request->nrc_citizen;
        // $teacher->nrc_number = $request->nrc_number;
        $teacher->nrc_front = $nrc_front;
        $teacher->nrc_back = $nrc_back;
        $teacher->image = $image;
        
        $certificates = ""; $diplomas = "";$cpa_subject_count=0;$da_subject_count=0;
        if($request->certificates!=null){
            foreach($request->certificates as $c){
                $certificates = $certificates . $c . ',';
    
            }
            $cpa_subject_count=sizeof($request->certificates);
        }
        
        if($request->diplomas!=null){
            foreach($request->diplomas as $d){
                $diplomas = $diplomas . $d . ',';
    
            }
            $da_subject_count=sizeof($request->diplomas);
        }
        $teacher->certificates = rtrim($certificates, ',');
        $teacher->diplomas = rtrim($diplomas, ',');
        $teacher->current_address = $request->current_address;
        $teacher->eng_current_address = $request->eng_current_address;
        $teacher->school_id = $request->renew_selected_school_id;
        $teacher->school_type = $request->school_type_renew;
        $teacher->school_name = $request->school_name_renew;
        $teacher->reason = $request->reason;
        $teacher->approve_reject_status = 0;
        $teacher->teacher_card  = $teacher_card;
        // $teacher->student_info_id  = $request->student_info_id;
        $teacher->save();
        
        
        if($degrees_certificates!=null){
            $degrees_certificates=implode(',', $degrees_certificates);
            $new_degrees_certificates= explode(',',$degrees_certificates);
            for($i=0;$i < sizeof($request->degrees);$i++){
           
                $education_histroy  =   new EducationHistroy();
                $education_histroy->student_info_id = $request->student_info_id;
                $education_histroy->degree_name = $request->degrees[$i];
                $education_histroy->certificate     ='/storage/teacher_info/'.$new_degrees_certificates[$i];
                $education_histroy->teacher_id      = $teacher->id;
               
                $education_histroy->save();
            }
        }else{
            
            if ($request->hasfile('old_renewdegrees_certificates')) {
                foreach($request->file('old_renewdegrees_certificates') as $file)
                {
                    $name  = uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/storage/student_info/',$name);
                    $old_renewdegrees_certificates_all[] = $name;
                    
                }
            }
            if($request->old_renewdegrees!=null){
                for($i=0;$i < sizeof($request->old_renewdegrees);$i++){
                    if(isset($request->old_renewdegrees_certificates[$i])){
                        
                        if(sizeof($old_renewdegrees_certificates_all)==sizeof($request->old_renewdegrees)){
                            $education_histroy  =EducationHistroy::find($request->old_renewdegrees_id[$i]);
                            $education_histroy->degree_name = $request->old_renewdegrees[$i];
                            $education_histroy->certificate     = '/storage/student_info/'.$old_renewdegrees_certificates_all[$i];
                            $education_histroy->save();
                           
                        }else{
                            foreach($old_renewdegrees_certificates_all as $file)
                            {
                                $old_renewdegrees_certificates_one = $file;
                                    
                            }
                            $education_histroy  =EducationHistroy::find($request->old_renewdegrees_id[$i]);
                            $education_histroy->degree_name = $request->old_renewdegrees[$i];
                            $education_histroy->certificate     = '/storage/student_info/'.$old_renewdegrees_certificates_one;
                            $education_histroy->save();
                            
                        }
                           
                    }else{
                        $old_renewdegrees_certificates_h=$request->old_renewdegrees_certificates_h;
                        $education_histroy  =EducationHistroy::find($request->old_renewdegrees_id[$i]);
                        $education_histroy->degree_name = $request->old_renewdegrees[$i];
                        $education_histroy->certificate     =$old_renewdegrees_certificates_h[$i];
                        $education_histroy->save();
                        
                    }
                    
                }
            }
            
            
        }
        $memberships = Membership::where('membership_name', 'like', 'Teacher')->get();
        //invoice
        $invoice = Invoice::where('invoiceNo','renew_tec'.$id)->get();
        //$invoice->student_info_id = $request->student_info_id;
        //$invoice->invoiceNo = 'renew_tec'.$teacher->id;
        foreach($invoice as $inNo){
            $inNo->name_eng        = $request->name_eng;
            $inNo->email           = $request->email;
            $inNo->phone           = $request->phone;
            
            foreach($memberships as $memberships){
                $inNo->productDesc     = 'Application Fee,'.$cpa_subject_count.'x CPA One Subject Renew Fee('.$memberships->renew_cpa_subject_fee.'),'.$da_subject_count.'x DA One Subject Renew Fee('.$memberships->renew_da_subject_fee.'),Teacher Registration';
                $inNo->amount          = $memberships->form_fee.','.$cpa_subject_count*$memberships->renew_cpa_subject_fee.','.$da_subject_count*$memberships->renew_da_subject_fee;
            }
        
            $inNo->status          = 0;
            $inNo->save();
        }
        

        return response()->json([
            'message' => 'Updated Successfully.'
        ],200);
    }
    
}
