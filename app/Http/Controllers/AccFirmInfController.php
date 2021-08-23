<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountancyFirmInformation;
use App\BranchOffice;
use App\FirmOwnershipAudit;
use App\FirmOwnershipNonAudit;
use App\DirectorsOfficersAudit;
use App\DirectorsOfficersNonAudit;
use Illuminate\Support\Facades\Storage;
use App\AuditTotalStaff;
use App\NonAuditTotalStaff;
use App\MyanmarCpaNonAuditForeign;
use App\AuditStaff;
use App\Declaration;
use App\AuditFirmFile;
use App\NonAuditFirmFile;
use App\StudentInfo;
use Hash;
use File;

class AccFirmInfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $acc_firm_info = AccountancyFirmInformation::with('service_provided','organization_structure','branch_offices','firm_owner_audits','director_officer_audits','audit_staffs','audit_total_staffs',
        'firm_owner_non_audits','director_officer_non_audits','non_audit_total_staffs','my_cpa_foreigns','audit_firm_file','non_audit_firm_file')->get();
        return response()->json([
            'data' => $acc_firm_info
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acc_firm_info');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasfile('ppa_certis'))
        {
            foreach($request->file('ppa_certis') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/acc_firm/',$name);
                $ppa_certi[] = $name;
            }

        }else{
            $ppa_certi = null;
        }

        if($request->hasfile('letterheads'))
        {
            foreach($request->file('letterheads') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/acc_firm/',$name);
                $letterhead[] = $name;
            }

        }else{
            $letterhead = null;
        }
       if($request->hasfile('representatives'))
        {
            foreach($request->file('representatives') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $representative[] =$name;
            }

        }else{
            $representative = null;
        }

        if($request->hasfile('certi_or_regs'))
        {
            foreach($request->file('certi_or_regs') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $certi_or_reg[] = $name;
            }

        }else{
            $certi_or_reg = null;
        }


        if($request->hasfile('deeds_memos'))
        {
            foreach($request->file('deeds_memos') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $deeds_memo[] = $name;
            }

        }else{
            $deeds_memo = null;
        }


        if($request->hasfile('certificate_incors'))
        {
            foreach($request->file('certificate_incors') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $certi_incor[] = $name;
            }

        }else{
            $certi_incor = null;
        }

        if($request->hasfile('form6_26e'))
        {
            foreach($request->file('form6_26e') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $form6_26e[] = $name;
            }

        }else{
            $form6_26e = null;
        }

        if($request->hasfile('form_a1'))
        {
            foreach($request->file('form_a1') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $form_a1[] = $name;
            }

        }else{
            $form_a1 = null;
        }


        if($request->hasfile('tax_reg_certificate'))
        {
            foreach($request->file('tax_reg_certificate') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $tax_reg_certificate[] = $name;
            }

        }
        else{
            $tax_reg_certificate = null;
        }
        if($request->hasfile('pass_photos'))
        {
            foreach($request->file('pass_photos') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $pass_photo[] = $name;
            }

        }else{
            $pass_photo = null;
        }


        if($request->hasfile('edu_certs'))
        {
            foreach($request->file('edu_certs') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $edu_cert[] = $name;
            }

        }else{
            $edu_cert = null;
        }

        if($request->hasfile('owner_profiles'))
        {
            foreach($request->file('owner_profiles') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $owner_profile[] = $name;
            }

        }else{
            $owner_profile = null;
        }


        if($request->hasfile('work_exps'))
        {
            foreach($request->file('work_exps') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $work_exp[] = $name;
            }

        }else{
            $work_exp = null;
        }


        if($request->hasfile('nrc_passports'))
        {
            foreach($request->file('nrc_passports') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $nrc_passport[] = $name;
            }

        }else{
            $nrc_passport = null;
        }

        if($request->hasfile('tax_clearances'))
        {
            foreach($request->file('tax_clearances') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $tax_clearance[] = $name;
            }

        }else{
            $tax_clearance = null;
        }

        if($request->hasfile('permit_foreigns'))
        {
            foreach($request->file('permit_foreigns') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $permit_foreigns[] =$name;
            }

        }else{
            $permit_foreigns = null;
        }


        if($request->hasfile('financial_statements'))
        {
            foreach($request->file('financial_statements') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $financial_statement[] = $name;
            }

        }else{
            $financial_statement = null;
        }

        $register_date = date('Y-m-d');

        //Main Table
        $acc_firm_info = new AccountancyFirmInformation();
        $acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        $acc_firm_info->accountancy_firm_name   = $request->accountancy_firm_name;
        $acc_firm_info->township                = $request->township;
        $acc_firm_info->postcode                = $request->post_code;
        $acc_firm_info->city                    = $request->city;
        $acc_firm_info->state_region            = $request->state;
        $acc_firm_info->telephones              = $request->phone_no;
        $acc_firm_info->h_email                 = $request->h_email;
        $acc_firm_info->website                 = $request->website;
        $acc_firm_info->audit_firm_type_id      = $request->audit_firm_type_id;
        //$acc_firm_info->local_foreign_id        = $request->local_foreign_id;
        $acc_firm_info->local_foreign_type        = $request->local_foreign_type;
        $acc_firm_info->organization_structure_id    = $request->org_stru_id;
        $acc_firm_info->type_of_service_provided_id  = $request->t_s_p_id;
        //name of sole_propietor == name of manager
        $acc_firm_info->name_of_sole_proprietor      = $request->name_sole_proprietor;
        $acc_firm_info->declaration                  = $request->declaration;
        $acc_firm_info->status   = 0;
        $acc_firm_info->form_fee = $request->form_fee;
        $acc_firm_info->nrc_fee  = $request->nrc_fee;
        $acc_firm_info->register_date  = $register_date;
        $acc_firm_info->verify_status  = 0;
        $acc_firm_info->save();

        //Student Info
        $std_info = new StudentInfo();
        $std_info->accountancy_firm_info_id = $acc_firm_info->id;
        //$std_info->accountancy_firm_name = $acc_firm_info->accountancy_firm_name;
        $std_info->email = $request->email;
        $std_info->password = Hash::make($request->password);
        $std_info->save();

        //Branch Office
        for($i=0;$i<sizeof($request->bo_branch_name);$i++){
            $branch_office = new BranchOffice();
            $branch_office->branch_name = $request->bo_branch_name[$i];
            $branch_office->township    = $request->bo_township[$i];
            $branch_office->postcode    = $request->bo_post_code[$i];
            $branch_office->city        = $request->bo_city[$i];
            $branch_office->state_region= $request->bo_state_region[$i];
            $branch_office->phones  = $request->bo_phone[$i];
            $branch_office->email       = $request->bo_email[$i];
            $branch_office->website      = $request->bo_website[$i];
            $branch_office->accountancy_firm_info_id = $acc_firm_info->id;
            $branch_office->save();
        }


        if($request->audit_firm_type_id == 1){
            if($request->org_stru_id){
                $audit_file= new AuditFirmFile();
                $audit_file->accountancy_firm_info_id = $acc_firm_info->id;
                $audit_file->ppa_certificate    = json_encode($ppa_certi);
                $audit_file->letterhead        = json_encode($letterhead);
                $audit_file->tax_clearance    = json_encode($tax_clearance);
                $audit_file->representative     = json_encode($representative);
                $audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
                $audit_file->deeds_memo        = json_encode($deeds_memo);
                $audit_file->certificate_incor    = json_encode($certi_incor);
                $audit_file->form6_form26_form_e= json_encode($form6_26e);
                $audit_file->form_a1           = json_encode($form_a1);
                $audit_file->certi_or_reg      = json_encode($certi_or_reg);
                $audit_file->save();

             }




            //Audit
            for($i=0;$i<sizeof($request->foa_name);$i++){
                $firm_owner_audit = new FirmOwnershipAudit();
                $firm_owner_audit->name                     = $request->foa_name[$i];
                $firm_owner_audit->public_private_reg_no    = $request->foa_pub_pri_reg_no[$i];
                $firm_owner_audit->authority_to_sign        = $request->foa_authority_to_sign[$i];
                $firm_owner_audit->accountancy_firm_info_id = $acc_firm_info->id;
                $firm_owner_audit->save();
            }

            for($i=0;$i<sizeof($request->do_name);$i++){
                $director_officer = new DirectorsOfficersAudit();
                $director_officer->name                     = $request->do_name[$i];
                $director_officer->position                 = $request->do_position[$i];
                $director_officer->cpa_reg_no               = $request->do_cpa_reg_no[$i];
                $director_officer->public_private_reg_no    = $request->do_pub_pri_reg_no[$i];
                $director_officer->accountancy_firm_info_id = $acc_firm_info->id;
                $director_officer->save();
            }


            for($i=0;$i<sizeof($request->as_part_time);$i++){
                $audit_staff = new AuditStaff();
                $audit_staff->part_time                = $request->as_part_time[$i];
                $audit_staff->full_time                = $request->as_full_time[$i];
                $audit_staff->total                    = $request->as_total[$i];
                $audit_staff->audit_staff_type_id      = $request->as_audit_staff_type_id[$i];
                $audit_staff->accountancy_firm_info_id = $acc_firm_info->id;
                $audit_staff->save();
            }

            for($i=0;$i<sizeof($request->ats_audit_staff);$i++){
                $audit_total_staff = new AuditTotalStaff();
                $audit_total_staff->audit_staff              = $request->ats_audit_staff[$i];
                $audit_total_staff->non_audit_staff          = $request->ats_non_audit_staff[$i];
                $audit_total_staff->total                    = $request->ats_total[$i];
                $audit_total_staff->audit_total_staff_type_id= $request->ats_audit_total_staff_type_id[$i];
                $audit_total_staff->accountancy_firm_info_id = $acc_firm_info->id;
                $audit_total_staff->save();
            }

        }
        //Non-Audit
        else
        {
            //Non-Audit Firm File
            if($request->org_stru_id){
                $non_audit_file= new NonAuditFirmFile();
                $non_audit_file->accountancy_firm_info_id = $acc_firm_info->id;
                $non_audit_file->letterhead        = json_encode($letterhead);
                $non_audit_file->passport_photo    = json_encode($pass_photo);
                $non_audit_file->education_certificate  = json_encode($edu_cert);
                $non_audit_file->owner_profile     = json_encode($owner_profile);
                $non_audit_file->work_exp          = json_encode($work_exp);
                $non_audit_file->nrc_passport      = json_encode($nrc_passport);
                $non_audit_file->tax_clearance    = json_encode($tax_clearance);
                $non_audit_file->permit_foreign= json_encode($permit_foreigns);
                $non_audit_file->financial_statement    = json_encode($financial_statement);
                $non_audit_file->representative     = json_encode($representative);
                $non_audit_file->certi_or_reg      = json_encode($certi_or_reg);
                $non_audit_file->deeds_memo        = json_encode($deeds_memo);
                $non_audit_file->certificate_incor    = json_encode($certi_incor);
                $non_audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
                $non_audit_file->save();
            }



            //Firm OwnerShip Non-Audit in ui (Sole Proprietor/Partners/Shareholders)
            for($i=0;$i<sizeof($request->fona_name);$i++){
                $firm_owner_non_audit = new FirmOwnershipNonAudit();
                $firm_owner_non_audit->name                     = $request->fona_name[$i];
                //pass = passport csc = csc_no inco = incoporation_certificate
                $firm_owner_non_audit->pass_csc_inco            = $request->fona_pass_csc_inco[$i];
                $firm_owner_non_audit->accountancy_firm_info_id = $acc_firm_info->id;
                $firm_owner_non_audit->save();
            }

            //director officers non audit
            for($i=0;$i<sizeof($request->dona_name);$i++){

                $director_officer_non_audit = new DirectorsOfficersNonAudit();
                $director_officer_non_audit->name       = $request->dona_name[$i];
                $director_officer_non_audit->position   = $request->dona_position[$i];
                $director_officer_non_audit->passport   = $request->dona_passport[$i];
                $director_officer_non_audit->csc_no     = $request->dona_csc_no[$i];
                $director_officer_non_audit->accountancy_firm_info_id = $acc_firm_info->id;
                $director_officer_non_audit->save();
            }


            //Non-Audit Total Staff
            for($i=0;$i<sizeof($request->nats_total);$i++){
                $audit_total_staff = new NonAuditTotalStaff();
                $audit_total_staff->total                    = $request->nats_total[$i];
                $audit_total_staff->non_audit_total_staff_type_id= $request->nats_type_id[$i];
                $audit_total_staff->accountancy_firm_info_id = $acc_firm_info->id;
                $audit_total_staff->save();
            }

            if($request->local_foreign_type == 2){
                //Myanmar cpa non audit foreigns
                for($i=0;$i<sizeof($request->mf_name);$i++){
                    $foreign = new MyanmarCpaNonAuditForeign();
                    $foreign->name                  = $request->mf_name[$i];
                    $foreign->position              = $request->mf_position[$i];
                    $foreign->cpa_passed_reg_no        = $request->mf_cpa_passed_reg_no[$i];
                    $foreign->cpa_full_reg_no          = $request->mf_cpa_full_reg_no[$i];
                    $foreign->public_practice_reg_no   = $request->mf_pub_pra_reg_no[$i];
                    $foreign->accountancy_firm_info_id = $acc_firm_info->id;
                    $foreign->save();
                }

            }
        }


        return "success";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $acc_firm_info = AccountancyFirmInformation::where('id',$id)->with('branch_offices','firm_owner_audits','director_officer_audits','audit_staffs','audit_total_staffs',
        'firm_owner_non_audits','director_officer_non_audits','non_audit_total_staffs','my_cpa_foreigns','audit_firm_file','non_audit_firm_file')->get();
        return response()->json([
            'data' => $acc_firm_info
        ],200);

    }

    public function auditData($id)
    {
        $audit_data = AccountancyFirmInformation::where('id',$id)->with('branch_offices','firm_owner_audits','director_officer_audits','audit_staffs','audit_total_staffs',
        'firm_owner_non_audits','director_officer_non_audits','non_audit_total_staffs','my_cpa_foreigns','audit_firm_file','non_audit_firm_file')->first();
        return response()->json([
            'data' => $audit_data
        ],200);

    }

    public function approve($id)
    {
        $std_info = StudentInfo::where('accountancy_firm_info_id', $id)->first();
        $std_info->approve_reject_status = 1;
        $std_info->save();
        $approve = AccountancyFirmInformation::find($id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function reject($id)
    {
        $reject = AccountancyFirmInformation::find($id);
        $reject->status = 2;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
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
         if($request->hasfile('ppa_certis'))
         {
             foreach($request->file('ppa_certis') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/acc_firm/',$name);
                 $ppa_certi[] = $name;
             }

         }else{
             $ppa_certi = null;
         }

         if($request->hasfile('letterheads'))
         {
             foreach($request->file('letterheads') as $file)
             {
                 $name  = uniqid().'.'.$file->getClientOriginalExtension();
                 $file->move(public_path().'/storage/acc_firm/',$name);
                 $letterhead[] = $name;
             }

         }else{
             $letterhead = null;
         }
        if($request->hasfile('representatives'))
         {
             foreach($request->file('representatives') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $representative[] =$name;
             }

         }else{
             $representative = null;
         }

         if($request->hasfile('certi_or_regs'))
         {
             foreach($request->file('certi_or_regs') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $certi_or_reg[] = $name;
             }

         }else{
             $certi_or_reg = null;
         }


         if($request->hasfile('deeds_memos'))
         {
             foreach($request->file('deeds_memos') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $deeds_memo[] = $name;
             }

         }else{
             $deeds_memo = null;
         }


         if($request->hasfile('certificate_incors'))
         {
             foreach($request->file('certificate_incors') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $certi_incor[] = $name;
             }

         }else{
             $certi_incor = null;
         }

         if($request->hasfile('form6_26e'))
         {
             foreach($request->file('form6_26e') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $form6_26e[] = $name;
             }

         }else{
             $form6_26e = null;
         }

         if($request->hasfile('form_a1'))
         {
             foreach($request->file('form_a1') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $form_a1[] = $name;
             }

         }else{
             $form_a1 = null;
         }


         if($request->hasfile('tax_reg_certificate'))
         {
             foreach($request->file('tax_reg_certificate') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $tax_reg_certificate[] = $name;
             }

         }
         else{
             $tax_reg_certificate = null;
         }
         if($request->hasfile('pass_photos'))
         {
             foreach($request->file('pass_photos') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $pass_photo[] = $name;
             }

         }else{
             $pass_photo = null;
         }


         if($request->hasfile('edu_certs'))
         {
             foreach($request->file('edu_certs') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $edu_cert[] = $name;
             }

         }else{
             $edu_cert = null;
         }

         if($request->hasfile('owner_profiles'))
         {
             foreach($request->file('owner_profiles') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $owner_profile[] = $name;
             }

         }else{
             $owner_profile = null;
         }


         if($request->hasfile('work_exps'))
         {
             foreach($request->file('work_exps') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $work_exp[] = $name;
             }

         }else{
             $work_exp = null;
         }


         if($request->hasfile('nrc_passports'))
         {
             foreach($request->file('nrc_passports') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $nrc_passport[] = $name;
             }

         }else{
             $nrc_passport = null;
         }

         if($request->hasfile('tax_clearances'))
         {
             foreach($request->file('tax_clearances') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $tax_clearance[] = $name;
             }

         }else{
             $tax_clearance = null;
         }

         if($request->hasfile('permit_foreigns'))
         {
             foreach($request->file('permit_foreigns') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $permit_foreigns[] =$name;
             }

         }else{
             $permit_foreigns = null;
         }


         if($request->hasfile('financial_statements'))
         {
             foreach($request->file('financial_statements') as $file)
             {
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/acc_firm/',$name);
             $financial_statement[] = $name;
             }

         }else{
             $financial_statement = null;
         }

        $register_date = date('Y-m-d');
        $acc_firm_info = AccountancyFirmInformation::find($id);
        $acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        $acc_firm_info->accountancy_firm_name   = $request->accountancy_firm_name;
        $acc_firm_info->township                = $request->township;
        $acc_firm_info->postcode                = $request->post_code;
        $acc_firm_info->city                    = $request->city;
        $acc_firm_info->state_region            = $request->state;
        $acc_firm_info->telephones              = $request->phone_no;
        $acc_firm_info->h_email                   = $request->h_email;
        $acc_firm_info->website                 = $request->website;
        $acc_firm_info->audit_firm_type_id      = $request->audit_firm_type_id;
        //$acc_firm_info->local_foreign_id        = $request->local_foreign_id;
        $acc_firm_info->local_foreign_type        = $request->local_foreign_type;
        $acc_firm_info->organization_structure_id    = $request->org_stru_id;
        $acc_firm_info->type_of_service_provided_id  = $request->t_s_p_id;
        //name of sole_propietor == name of manager
        $acc_firm_info->name_of_sole_proprietor      = $request->name_sole_proprietor;
        $acc_firm_info->declaration  = $request->declaration;
        $acc_firm_info->status   = 0;
        $acc_firm_info->form_fee = $request->form_fee;
        $acc_firm_info->nrc_fee  = $request->nrc_fee;
        $acc_firm_info->register_date  = $register_date;
        $acc_firm_info->verify_status  = 0;
        $acc_firm_info->save();

        //Student Info
        // $std_info = new StudentInfo();
        // $std_info->accountancy_firm_info_id = $acc_firm_info->id;
        // $std_info->email = $request->email;
        // //$std_info->password = Hash::make($request->password);
        // $std_info->password = $request->password;
        // $std_info->save();

        //Branch Office
        BranchOffice::where('accountancy_firm_info_id',$id)->delete();
        for($i=0;$i<sizeof($request->bo_branch_name);$i++){
            $branch_office = new BranchOffice();
            $branch_office->branch_name = $request->bo_branch_name[$i];
            $branch_office->township    = $request->bo_township[$i];
            $branch_office->postcode    = $request->bo_post_code[$i];
            $branch_office->city        = $request->bo_city[$i];
            $branch_office->state_region= $request->bo_state_region[$i];
            $branch_office->phones  = $request->bo_phone[$i];
            $branch_office->email       = $request->bo_email[$i];
            $branch_office->website      = $request->bo_website[$i];
            $branch_office->accountancy_firm_info_id = $acc_firm_info->id;
            $branch_office->save();
        }


            if($request->audit_firm_type_id == 1){
                if($request->org_stru_id){

                    $audit_file= new AuditFirmFile();
                    $audit_file->accountancy_firm_info_id = $acc_firm_info->id;
                    $audit_file->ppa_certificate    = json_encode($ppa_certi);
                    $audit_file->letterhead         = json_encode($letterhead);
                    $audit_file->representative     = json_encode($representative);
                    $audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
                    $audit_file->deeds_memo        = json_encode($deeds_memo);
                    $audit_file->certificate_incor    = json_encode($certi_incor);
                    $audit_file->form6_form26_form_e= json_encode($form6_26e);
                    $audit_file->form_a1           = json_encode($form_a1);
                    $audit_file->certi_or_reg      = json_encode($certi_or_reg);
                    $audit_file->save();

                }
            //Audit
                FirmOwnershipAudit::where('accountancy_firm_info_id',$id)->delete();

                for($i=0;$i<sizeof($request->foa_name);$i++){
                    $firm_owner_audit = new FirmOwnershipAudit();
                    $firm_owner_audit->name                     = $request->foa_name[$i];
                    $firm_owner_audit->public_private_reg_no    = $request->foa_pub_pri_reg_no[$i];
                    $firm_owner_audit->authority_to_sign        = $request->foa_authority_to_sign[$i];
                    $firm_owner_audit->accountancy_firm_info_id = $acc_firm_info->id;
                    $firm_owner_audit->save();
                }
                DirectorsOfficersAudit::where('accountancy_firm_info_id',$id)->delete();
                for($i=0;$i<sizeof($request->do_name);$i++){
                    $director_officer = new DirectorsOfficersAudit();
                    $director_officer->name                     = $request->do_name[$i];
                    $director_officer->position                 = $request->do_position[$i];
                    $director_officer->cpa_reg_no               = $request->do_cpa_reg_no[$i];
                    $director_officer->public_private_reg_no    = $request->do_pub_pri_reg_no[$i];
                    $director_officer->accountancy_firm_info_id = $acc_firm_info->id;
                    $director_officer->save();
                }

                AuditStaff::where('accountancy_firm_info_id',$id)->delete();
                for($i=0;$i<sizeof($request->as_part_time);$i++){
                    $audit_staff = new AuditStaff();
                    $audit_staff->part_time                = $request->as_part_time[$i];
                    $audit_staff->full_time                = $request->as_full_time[$i];
                    $audit_staff->total                    = $request->as_total[$i];
                    $audit_staff->audit_staff_type_id      = $request->as_audit_staff_type_id[$i];
                    $audit_staff->accountancy_firm_info_id = $acc_firm_info->id;
                    $audit_staff->save();
                }

                AuditTotalStaff::where('accountancy_firm_info_id',$id)->delete();
                for($i=0;$i<sizeof($request->ats_audit_staff);$i++){
                    $audit_total_staff = new AuditTotalStaff();
                    $audit_total_staff->audit_staff              = $request->ats_audit_staff[$i];
                    $audit_total_staff->non_audit_staff          = $request->ats_non_audit_staff[$i];
                    $audit_total_staff->total                    = $request->ats_total[$i];
                    $audit_total_staff->audit_total_staff_type_id= $request->ats_audit_total_staff_type_id[$i];
                    $audit_total_staff->accountancy_firm_info_id = $acc_firm_info->id;
                    $audit_total_staff->save();
                }

        }
        //Non-Audit
        else
        {



            //Firm OwnerShip Non-Audit in ui (Sole Proprietor/Partners/Shareholders)
            FirmOwnershipNonAudit::where('accountancy_firm_info_id',$id)->delete();
            for($i=0;$i<sizeof($request->fona_name);$i++){
                $firm_owner_non_audit = new FirmOwnershipNonAudit();
                $firm_owner_non_audit->name                     = $request->fona_name[$i];
                //pass = passport csc = csc_no inco = incoporation_certificate
                $firm_owner_non_audit->pass_csc_inco            = $request->fona_pass_csc_inco[$i];
                $firm_owner_non_audit->accountancy_firm_info_id = $acc_firm_info->id;
                $firm_owner_non_audit->save();
            }

            //director officers non audit
            DirectorsOfficersNonAudit::where('accountancy_firm_info_id',$id)->delete();

            for($i=0;$i<sizeof($request->dona_name);$i++){

                $director_officer_non_audit = new DirectorsOfficersNonAudit();
                $director_officer_non_audit->name       = $request->dona_name[$i];
                $director_officer_non_audit->position   = $request->dona_position[$i];
                $director_officer_non_audit->passport   = $request->dona_passport[$i];
                $director_officer_non_audit->csc_no     = $request->dona_csc_no[$i];
                $director_officer_non_audit->accountancy_firm_info_id = $acc_firm_info->id;
                $director_officer_non_audit->save();
            }


            //Non-Audit Total Staff
            NonAuditTotalStaff::where('accountancy_firm_info_id',$id)->delete();
            for($i=0;$i<sizeof($request->nats_total);$i++){
                $audit_total_staff = new NonAuditTotalStaff();
                $audit_total_staff->total                    = $request->nats_total[$i];
                $audit_total_staff->non_audit_total_staff_type_id= $request->nats_type_id[$i];
                $audit_total_staff->accountancy_firm_info_id = $acc_firm_info->id;
                $audit_total_staff->save();
            }

            MyanmarCpaNonAuditForeign::where('accountancy_firm_info_id',$id)->delete();
            if($request->local_foreign_type == 2){
                //Myanmar cpa non audit foreigns
                for($i=0;$i<sizeof($request->mf_name);$i++){
                    $foreign = new MyanmarCpaNonAuditForeign();
                    $foreign->name                  = $request->mf_name[$i];
                    $foreign->position              = $request->mf_position[$i];
                    $foreign->cpa_passed_reg_no        = $request->mf_cpa_passed_reg_no[$i];
                    $foreign->cpa_full_reg_no          = $request->mf_cpa_full_reg_no[$i];
                    $foreign->public_practice_reg_no   = $request->mf_pub_pra_reg_no[$i];
                    $foreign->accountancy_firm_info_id = $acc_firm_info->id;
                    $foreign->save();
                }

            }


        }


        return response()->json([
            'data' => "Update Successfully"
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
        $acc_firm_info = AccountancyFirmInformation::find($id);
        // BranchOffice::where('accountancy_firm_info_id',$id)->delete();

        if($acc_firm_info->audit_firm_type_id == 1){
            FirmOwnershipAudit::where('accountancy_firm_info_id',$id)->delete();
            DirectorsOfficersAudit::where('accountancy_firm_info_id',$id)->delete();
            AuditStaff::where('accountancy_firm_info_id',$id)->delete();
            AuditTotalStaff::where('accountancy_firm_info_id',$id)->delete();
            $audit_firm_file = AuditFirmFile::where('accountancy_firm_info_id',$id)->first();

            $ppa_certi      = json_decode($audit_firm_file->ppa_certificate);
            $letterhead     = json_decode($audit_firm_file->letterhead);
            $representative = json_decode($audit_firm_file->representative);
            $certi_or_reg   = json_decode($audit_firm_file->certi_or_reg);
            $deeds_memo     = json_decode($audit_firm_file->deeds_memo);
            $certi_incor    = json_decode($audit_firm_file->certificate_incor);
            $form6_26e          = json_decode($audit_firm_file->form6_form26_form_e);
            $form_a1        = json_decode($audit_firm_file->form_a1);
            $tax_reg_certificate = json_decode($audit_firm_file->tax_reg_certificate);


            if($ppa_certi!=null){
                foreach($ppa_certi as $certi){
                    File::delete(public_path($certi));

                }
            }

            if($letterhead!=null){
                foreach($letterhead as $letter){
                    File::delete(public_path($letter));
                }
            }

            if($representative!=null){
                foreach($representative as $represent){
                    File::delete(public_path($represent));
                }
            }


            if($certi_or_reg!=null){
                foreach($certi_or_reg as $reg){
                    File::delete(public_path($reg));
                }
            }

            if($deeds_memo!=null){
                foreach($deeds_memo as $memo){
                    File::delete(public_path($memo));
                }
            }
            if($certi_incor!=null){
                foreach($certi_incor as $incor){
                    File::delete(public_path($incor));
                }
            }
            if($form6_26e!=null){
                foreach($form6_26e as $form){
                    File::delete(public_path($form));
                }
            }
            if($form_a1!=null){
                foreach($form_a1 as $a1){
                    File::delete(public_path($a1));

                }
            }
            if($tax_reg_certificate!=null){
                foreach($tax_reg_certificate as $certificate){
                    File::delete(public_path($certificate));
                }
            }

            $audit_firm_file->delete();

        }else{


            FirmOwnershipNonAudit::where('accountancy_firm_info_id',$id)->delete();
            DirectorsOfficersNonAudit::where('accountancy_firm_info_id',$id)->delete();
            NonAuditTotalStaff::where('accountancy_firm_info_id',$id)->delete();
            $non_audit_firm_file = NonAuditFirmFile::where('accountancy_firm_info_id',$id)->first();

            $letterhead = json_decode($non_audit_firm_file->letterhead);
            $pass_photo = json_decode($non_audit_firm_file->passport_photo);
            $owner_profile = json_decode($non_audit_firm_file->owner_profile);
            $edu_cert = json_decode($non_audit_firm_file->education_certificate);
            $work_exp = json_decode($non_audit_firm_file->work_exp);
            $nrc_passport = json_decode($non_audit_firm_file->nrc_passport);
            $tax_clearance = json_decode($non_audit_firm_file->tax_clearance);
            $permit_foreigns = json_decode($non_audit_firm_file->permit_foreign);
            $financial_statement = json_decode($non_audit_firm_file->financial_statement);
            $representative = json_decode($non_audit_firm_file->representative);
            $certi_or_reg = json_decode($non_audit_firm_file->certi_or_reg);
            $deeds_memo = json_decode($non_audit_firm_file->deeds_memo);
            $tax_reg_certificate = json_decode($non_audit_firm_file->tax_reg_certificate);
            $certi_incor = json_decode($non_audit_firm_file->certificate_incor);

            if($letterhead!=null){
                foreach($letterhead as $letter){
                    File::delete(public_path($letter));
                }
            }
            if($pass_photo!=null){
                foreach($pass_photo as $photo){
                    File::delete(public_path($photo));

                }
            }
            if($edu_cert!=null){
                foreach($edu_cert as $cert){
                    File::delete(public_path($cert));
                }
            }
            if($owner_profile!=null){
                foreach($owner_profile as $profile){
                    File::delete(public_path($profile));

                }
            }
            if($work_exp!=null){
                foreach($work_exp as $exp){
                    File::delete(public_path($exp));
                }
            }
            if($nrc_passport!=null){
                foreach($nrc_passport as $passport){
                    File::delete(public_path($passport));
                }
            }
            if($tax_clearance!=null){
                foreach($tax_clearance as $clear){
                    File::delete(public_path($clear));
                }
            }
            if($permit_foreigns!=null){
                foreach($permit_foreigns as $foreign){
                    File::delete(public_path($foreign));
                }
            }
            if($financial_statement!=null){
                foreach($financial_statement as $statement){
                    File::delete(public_path($statement));
                }
            }
            if($representative!=null){
                foreach($representative as $represent){
                    File::delete(public_path($represent));
                }
            }
            if($certi_or_reg!=null){
                foreach($certi_or_reg as $reg){
                    File::delete(public_path($reg));
                }
            }
            if($deeds_memo!=null){
                foreach($deeds_memo as $memo){
                    File::delete(public_path($memo));
                }
            }
            if($certi_incor!=null){
                foreach($certi_incor as $incor){
                    File::delete(public_path($incor));
                }
            }
            if($tax_reg_certificate!=null){
                foreach($tax_reg_certificate as $certificate){
                    File::delete(public_path($certificate));
                }
            }
            $non_audit_firm_file->delete();


            if($acc_firm_info->local_foreign_type == 2){
                NonAuditTotalStaff::where('accountancy_firm_info_id',$id)->delete();
            }
        }

        $acc_firm_info->delete();
        return "Delete Successfully";
    }

    //Audit Feedback
    public function auditFeedback($id)
    {
        $data = AccountancyFirmInformation::where('id',$id)->get();
        return response()->json($data,200);
    }

    // Non Audit Feedback
    public function nonAuditFeedback($id)
    {
        $data = AccountancyFirmInformation::where('id',$id)->get();
        return response()->json($data,200);
    }

    public function auditStatus($id)
    {
        $data = AccountancyFirmInformation::where('id',$id)->get('status');
        return response()->json($data,200);
    }

    public function nonAuditStatus($id)
    {
        $data = AccountancyFirmInformation::where('id',$id)
                                          ->where('audit_firm_type_id',2)
                                          ->get('status');
        return response()->json($data,200);
    }

    // get date range
    public function dateRange($id)
    {
        $date = AccountancyFirmInformation::where('id',$id)->get('register_date');
        $check_date = strtotime($date[0]['register_date']);
        $date_range = strtotime(date('2021-09-30'));
        $verify = "You are verified!";
        $next = "Your registeration will start in next year!";

        if($check_date <= $date_range)
        {
            $verify_user = AccountancyFirmInformation::find($id);
            $verify_user->verify_status = 1;
            $verify_user->save();
            // return $verify;
            return response()->json($verify,200);
        }
        else
        {
            $next_year_user = AccountancyFirmInformation::find($id);
            $next_year_user->verify_status = 2;
            $next_year_user->save();
            // return $next;
            return response()->json($next,200);
        }
    }

    //check verify
    public function checkVerify($id)
    {
        $data = AccountancyFirmInformation::where('id',$id)->get('verify_status');
        return response()->json($data,200);
    }

    public function getNonAuditData($id){
      $non_audit_data = array();
      $acc_firm_info = AccountancyFirmInformation::where('id',$id)->get();
      $branch_office = BranchOffice::where('accountancy_firm_info_id',$id)->get();
      $firm_owners = FirmOwnershipNonAudit::where('accountancy_firm_info_id',$id)->get();
      $directors_officers = DirectorsOfficersNonAudit::where('accountancy_firm_info_id',$id)->get();
      $total_staff = NonAuditTotalStaff::where('accountancy_firm_info_id',$id)->get();
      $student_infos = StudentInfo::where('accountancy_firm_info_id',$id)->get();
      $myr_cpa_non_audit_foreign = MyanmarCpaNonAuditForeign::where('accountancy_firm_info_id',$id)->get();

      array_push($non_audit_data , ['acc_firm_info'=>$acc_firm_info,
                                    'branch_office'=> $branch_office,
                                    'firm_owners' => $firm_owners,
                                    'directors_officers'=> $directors_officers,
                                    'total_staff' => $total_staff,
                                    'student_infos' => $student_infos,
                                    'myr_cpa_non_audit_foreign' => $myr_cpa_non_audit_foreign
                                ]);

      return response()->json($non_audit_data,200);
    }


}
