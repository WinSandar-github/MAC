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
use App\Papp;
use App\Invoice;
use Hash;
use File;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

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
                $ppa_certi[] = '/storage/acc_firm/'.$name;
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
                $letterhead[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $letterhead = null;
        }

        if($request->hasfile('certi_or_regs'))
        {
            foreach($request->file('certi_or_regs') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $certi_or_reg[] = '/storage/acc_firm/'.$name;
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
            $deeds_memo[] = '/storage/acc_firm/'.$name;
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
            $certi_incor[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $certi_incor = null;
        }

        if($request->hasfile('tax_reg_certificate'))
        {
            foreach($request->file('tax_reg_certificate') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $tax_reg_certificate[] = '/storage/acc_firm/'.$name;
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
            $pass_photo[] = '/storage/acc_firm/'.$name;
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
            $edu_cert[] = '/storage/acc_firm/'.$name;
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
            $owner_profile[] = '/storage/acc_firm/'.$name;
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
            $work_exp[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $work_exp = null;
        }


        if($request->hasfile('nrc_passports_front'))
        {
            foreach($request->file('nrc_passports_front') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $nrc_passport_front[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $nrc_passport_front = null;
        }

        if($request->hasfile('nrc_passports_back'))
        {
            foreach($request->file('nrc_passports_back') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $nrc_passport_back[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $nrc_passport_back = null;
        }

        if($request->hasfile('tax_clearances'))
        {
            foreach($request->file('tax_clearances') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $tax_clearance[] = '/storage/acc_firm/'.$name;
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
            $permit_foreigns[] ='/storage/acc_firm/'.$name;
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
            $financial_statement[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $financial_statement = null;
        }

        // profile photo
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $image = '/storage/student_info/'.$name;
        }

        $register_date = date('Y-m-d');

        $t_s_p_ary = array();
        foreach($request->t_s_p_id as $val){
          array_push($t_s_p_ary,$val);
        }
        // $t_s_p_id = "";
        // if($request->t_s_p_id!=null){
        //     foreach($request->t_s_p_id as $t){
        //         $t_s_p_id = $t_s_p_id . $t . ',';

        //     }
        // }

        //Main Table
        $acc_firm_info = new AccountancyFirmInformation();
        // $acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        // $acc_firm_info->accountancy_firm_reg_no =  uniqid();
        $acc_firm_info->accountancy_firm_name   = $request->accountancy_firm_name;
        $acc_firm_info->head_office_address   = $request->head_office_address;
        $acc_firm_info->head_office_address_mm   = $request->head_office_address_mm;
        //$acc_firm_info->township                = $request->township;
        $acc_firm_info->postcode                = $request->post_code;
        //$acc_firm_info->city                    = $request->city;
        //$acc_firm_info->state_region            = $request->state;
        $acc_firm_info->telephones              = $request->phone_no;
        $acc_firm_info->h_email                 = $request->h_email;
        $acc_firm_info->website                 = $request->website;
        $acc_firm_info->audit_firm_type_id      = $request->audit_firm_type_id;
        //$acc_firm_info->local_foreign_id        = $request->local_foreign_id;
        $acc_firm_info->local_foreign_type        = $request->local_foreign_type;
        $acc_firm_info->organization_structure_id    = $request->org_stru_id;
        $acc_firm_info->type_of_service_provided_id  = json_encode($t_s_p_ary);
        // $acc_firm_info->type_of_service_provided_id  = rtrim($t_s_p_id, ',');
        $acc_firm_info->other  = $request->other;
        //name of sole_propietor == name of manager
        $acc_firm_info->name_of_sole_proprietor      = $request->name_sole_proprietor;
        if($request->dir_passport_csc){
          $acc_firm_info->dir_passport_csc = $request->dir_passport_csc;
        }
        $acc_firm_info->declaration                  = $request->declaration;
        $acc_firm_info->declaration_mm                  = $request->declaration_mm;
        $acc_firm_info->status   = 0;
        // $acc_firm_info->form_fee = $request->form_fee;
        // $acc_firm_info->nrc_fee  = $request->nrc_fee;
        $acc_firm_info->register_date  = $register_date;
        $acc_firm_info->last_registered_year  = date('Y'); //date('Y-m-d')
        $acc_firm_info->image  = $image;

        $acc_firm_info->verify_status  = 0;
        $acc_firm_info->save();

        //Student Info
        $std_info = new StudentInfo();
        $std_info->accountancy_firm_info_id = $acc_firm_info->id;
        //$std_info->accountancy_firm_name = $acc_firm_info->accountancy_firm_name;
        $std_info->email            =   strtolower($request->email);
        $std_info->password         =   Hash::make($request->password);
        $std_info->verify_code      =   uniqid();
        $std_info->save();

        $student_data = AccountancyFirmInformation::find($acc_firm_info->id);
        $student_data->student_info_id = $std_info->id;
        $student_data->save();

        //Branch Office
        if($request->bo_branch_name){
          for($i=0;$i<sizeof($request->bo_branch_name);$i++){
              $branch_office = new BranchOffice();
              $branch_office->branch_name = $request->bo_branch_name[$i];
              $branch_office->branch_address = $request->bo_address[$i];
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
        }

        if($request->audit_firm_type_id == 1)
        {
            // Audit Firm
            if($request->org_stru_id){
                $audit_file= new AuditFirmFile();
                $audit_file->accountancy_firm_info_id = $acc_firm_info->id;
                $audit_file->ppa_certificate    = json_encode($ppa_certi);
                $audit_file->letterhead        = json_encode($letterhead);
                $audit_file->tax_clearance    = json_encode($tax_clearance);
                // $audit_file->representative     = json_encode($representative);
                $audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
                $audit_file->deeds_memo        = json_encode($deeds_memo);
                $audit_file->certificate_incor    = json_encode($certi_incor);
                // $audit_file->form6_form26_form_e= json_encode($form6_26e);
                // $audit_file->form_a1           = json_encode($form_a1);
                $audit_file->certi_or_reg      = json_encode($certi_or_reg);
                $audit_file->save();

             }

            //Audit
            if($request->foa_name){
              for($i=0;$i<sizeof($request->foa_name);$i++){
                  $firm_owner_audit = new FirmOwnershipAudit();
                  $firm_owner_audit->name                     = $request->foa_name[$i];
                  $firm_owner_audit->public_private_reg_no    = $request->foa_pub_pri_reg_no[$i];
                  $firm_owner_audit->authority_to_sign        = $request->foa_authority_to_sign[$i];
                  $firm_owner_audit->accountancy_firm_info_id = $acc_firm_info->id;
                  $firm_owner_audit->save();
              }
            }

            if($request->do_name){
              for($i=0;$i<sizeof($request->do_name);$i++){
                  $director_officer = new DirectorsOfficersAudit();
                  $director_officer->name                     = $request->do_name[$i];
                  $director_officer->position                 = $request->do_position[$i];
                  $director_officer->cpa_reg_no               = $request->do_cpa_reg_no[$i];
                  $director_officer->public_private_reg_no    = $request->do_pub_pri_reg_no[$i];
                  $director_officer->accountancy_firm_info_id = $acc_firm_info->id;
                  $director_officer->save();
              }
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

            //invoice for audit
            $invoice = new Invoice();
            $invoice->student_info_id = $std_info->id;
            //$invoice->student_info_id = $request->student_id;
            $invoice->invoiceNo = 'audit_initial'.$acc_firm_info->id;
            $invoice->name_eng        = $acc_firm_info->accountancy_firm_name;
            $invoice->email           = $std_info->email;
            $invoice->phone           = $acc_firm_info->telephones;
            $invoice->status          = 0;

            $fees = \App\Membership::where('membership_name', '=', 'Audit')->first(['form_fee', 'registration_fee']);
            $papp_count = FirmOwnershipAudit::where('accountancy_firm_info_id', '=', $acc_firm_info->id)
                          ->where('authority_to_sign', '=', 1)->count();

            $invoice->productDesc     = 'Audit App Fee, Reg Fee, Audit Firm';
            $invoice->amount          = $fees->form_fee . ',' . $papp_count * $fees->registration_fee;
            $invoice->status          = 0;
            $invoice->save();
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
                $non_audit_file->nrc_passport_front     = json_encode($nrc_passport_front);
                $non_audit_file->nrc_passport_back      = json_encode($nrc_passport_back);
                $non_audit_file->tax_clearance    = json_encode($tax_clearance);
                $non_audit_file->permit_foreign= json_encode($permit_foreigns);
                $non_audit_file->financial_statement    = json_encode($financial_statement);
                // $non_audit_file->representative     = json_encode($representative);
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
                // $director_officer_non_audit->csc_no     = $request->dona_csc_no[$i];
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

            // for foreign firm type
            if($request->local_foreign_type == 2)
            {
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

            //invoice for non-audit
            $invoice = new Invoice();
            $invoice->student_info_id = $std_info->id;
            //$invoice->student_info_id = $request->student_id;
            $invoice->invoiceNo = 'non_audit_initial'.$acc_firm_info->id;
            $invoice->name_eng        = $acc_firm_info->accountancy_firm_name;
            $invoice->email           = $std_info->email;
            $invoice->phone           = $acc_firm_info->telephones;
            $invoice->status          = 0;

            $fees = \App\Membership::where('membership_name', '=', 'Non-Audit')->first(['form_fee', 'reg_fee_sole','reg_fee_partner']);

            $invoice->productDesc     = 'Non-Audit App Fee, Reg Fee, Non-Audit Firm';
            if($request->org_stru_id == 1){
              // for Sole Proprietorship
              $invoice->amount          = $fees->form_fee . ',' . $fees->reg_fee_sole;
            }
            else if($request->org_stru_id == 2 || $request->org_stru_id == 3 || $request->org_stru_id == 4){
              // for Partnership and Company
              $invoice->amount          = $fees->form_fee . ',' . $fees->reg_fee_partner;
            }
            else{
              // for Other
              $invoice->amount          = $fees->form_fee . ',' . $fees->reg_fee_partner;
            }
            $invoice->save();
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
        $org_stru_id = AccountancyFirmInformation::where('id',$id)->get('organization_structure_id');
        switch ($org_stru_id[0]->organization_structure_id) {
            case '1':
                $old = AccountancyFirmInformation::where('organization_structure_id',1)->where('offline_user',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

                $old_number = trim($old->accountancy_firm_reg_no, 'ACS-');
                // return $old_number;
                if($old_number == null && $old_number == '')
                {
                    $reg_no = 'ACS-'. 262;
                }
                else{
                    $reg_no = 'ACS-'. ($old_number +1);
                }
            break;
            case '2':
                $old = AccountancyFirmInformation::where('organization_structure_id',2)->where('offline_user',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

                $old_number = trim($old->accountancy_firm_reg_no, 'ACP-');
                // return $old_number;
                if($old_number == null && $old_number == '')
                {
                    $reg_no = 'ACP-'. str_pad(17, 3, "0", STR_PAD_LEFT);
                }
                else{
                    $reg_no = 'ACP-'. str_pad($old_number +1, 3, "0", STR_PAD_LEFT);
                }
            break;
            case '3':
                $old = AccountancyFirmInformation::where('organization_structure_id',3)->where('offline_user',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

                $old_number = trim($old->accountancy_firm_reg_no, 'ACC-');
                // return $old_number;
                if($old_number == null && $old_number == '')
                {
                    $reg_no = 'ACC-'. str_pad(33, 3, "0", STR_PAD_LEFT);
                }
                else{
                    $reg_no = 'ACC-'. str_pad($old_number +1, 3, "0", STR_PAD_LEFT);
                }
            break;
            default:
                $reg_no = '';
            break;
        }

        $approve = AccountancyFirmInformation::find($id);
        $approve->status = 1;
        $approve->accountancy_firm_reg_no = $reg_no;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function approveNon($id)
    {
        $std_info = StudentInfo::where('accountancy_firm_info_id', $id)->first();
        $std_info->approve_reject_status = 1;
        $std_info->save();
        $org_stru_id = AccountancyFirmInformation::where('id',$id)->first();
        $local_foreign = AccountancyFirmInformation::where('id',$id)->get('local_foreign_type');
        // return $local_foreign[0]->local_foreign_type;
        if($local_foreign[0]->local_foreign_type == 1){
            switch ($org_stru_id->organization_structure_id) {
                case '1':
                    $old = AccountancyFirmInformation::where('local_foreign_type',1)->where('organization_structure_id',1)->where('offline_user',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();
                    // return $old;
                    $old_number = trim($old->accountancy_firm_reg_no, 'NCS-');
                    // return $old_number;
                    if($old_number == null && $old_number == '')
                    {
                        $reg_no = 'NCS-'. str_pad(61, 3, "0", STR_PAD_LEFT);
                    }
                    else{
                        $reg_no = 'NCS-'. str_pad($old_number +1, 3, "0", STR_PAD_LEFT);
                    }
                break;
                case '2':
                    $old = AccountancyFirmInformation::where('local_foreign_type',1)->where('organization_structure_id',2)->where('offline_user',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

                    $old_number = trim($old->accountancy_firm_reg_no, 'NCP-');
                    // return $old_number;
                    if($old_number == null && $old_number == '')
                    {
                        $reg_no = 'NCP-'. str_pad(4, 3, "0", STR_PAD_LEFT);
                    }
                    else{
                        $reg_no = 'NCP-'. str_pad($old_number +1, 3, "0", STR_PAD_LEFT);
                    }
                break;
                case '3':
                    $old = AccountancyFirmInformation::where('local_foreign_type',1)->where('organization_structure_id',3)->where('offline_user',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

                    $old_number = trim($old->accountancy_firm_reg_no, 'NCC-');
                    // return $old_number;
                    if($old_number == null && $old_number == '')
                    {
                        $reg_no = 'NCC-'. str_pad(70, 3, "0", STR_PAD_LEFT);
                    }
                    else{
                        $reg_no = 'NCC-'. str_pad($old_number +1, 3, "0", STR_PAD_LEFT);
                    }
                break;
                default:
                    $reg_no = '';
                break;
            }
        }else{
            $old = AccountancyFirmInformation::where('local_foreign_type',2)->where('offline_user',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

            $old_number = trim($old->accountancy_firm_reg_no, 'NFC-');
            // return $old_number;
            if($old_number == null && $old_number == '')
            {
                $reg_no = 'NFC-'. str_pad(27, 3, "0", STR_PAD_LEFT);
            }
            else{
                $reg_no = 'NFC-'. str_pad($old_number +1, 3, "0", STR_PAD_LEFT);
            }
        }


        $approve = AccountancyFirmInformation::find($id);
        $approve->status = 1;
        $approve->accountancy_firm_reg_no = $reg_no;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function approveRenew($id,$firm_id)
    {
        $std_info = StudentInfo::where('id', $id)->first();
        $std_info->approve_reject_status = 1;
        $std_info->save();
        $approve = AccountancyFirmInformation::find($firm_id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function approveReconnect($id,$firm_id)
    {
        $std_info = StudentInfo::where('id', $id)->first();
        $std_info->approve_reject_status = 1;
        $std_info->save();
        $approve = AccountancyFirmInformation::find($firm_id);
        $approve->status = 1;
        $approve->save();
        return response()->json([
            'message' => "You have successfully approved that user!"
        ],200);
    }

    public function reject($id,Request $request)
    {
        $std_info = StudentInfo::where('accountancy_firm_info_id', $id)->first();
        $std_info->approve_reject_status = 2;
        $std_info->save();
        $reject = AccountancyFirmInformation::find($id);
        $reject->status = 2;
        $reject->remark = $request->remark;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function rejectRenew($id,Request $request,$firm_id)
    {
        $std_info = StudentInfo::where('id', $id)->first();
        $std_info->approve_reject_status = 2;
        $std_info->save();
        $reject = AccountancyFirmInformation::find($firm_id);
        $reject->status = 2;
        $reject->remark = $request->remark;
        $reject->save();
        return response()->json([
            'message' => "You have successfully rejected that user!"
        ],200);
    }

    public function rejectReconnect($id,Request $request,$firm_id)
    {
        $std_info = StudentInfo::where('id', $id)->first();
        $std_info->approve_reject_status = 2;
        $std_info->save();
        $reject = AccountancyFirmInformation::find($firm_id);
        $reject->status = 2;
        $reject->remark = $request->remark;
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
              $ppa_certi[] = '/storage/acc_firm/'.$name;
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
              $letterhead[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $letterhead = null;
      }

      if($request->hasfile('certi_or_regs'))
      {
          foreach($request->file('certi_or_regs') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $certi_or_reg[] = '/storage/acc_firm/'.$name;
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
          $deeds_memo[] = '/storage/acc_firm/'.$name;
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
          $certi_incor[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $certi_incor = null;
      }

      if($request->hasfile('tax_reg_certificate'))
      {
          foreach($request->file('tax_reg_certificate') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $tax_reg_certificate[] = '/storage/acc_firm/'.$name;
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
          $pass_photo[] = '/storage/acc_firm/'.$name;
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
          $edu_cert[] = '/storage/acc_firm/'.$name;
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
          $owner_profile[] = '/storage/acc_firm/'.$name;
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
          $work_exp[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $work_exp = null;
      }


      if($request->hasfile('nrc_passports_front'))
      {
          foreach($request->file('nrc_passports_front') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $nrc_passport_front[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $nrc_passport_front = null;
      }

      if($request->hasfile('nrc_passports_back'))
      {
          foreach($request->file('nrc_passports_back') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $nrc_passport_back[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $nrc_passport_back = null;
      }

      if($request->hasfile('tax_clearances'))
      {
          foreach($request->file('tax_clearances') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $tax_clearance[] = '/storage/acc_firm/'.$name;
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
          $permit_foreigns[] ='/storage/acc_firm/'.$name;
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
          $financial_statement[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $financial_statement = null;
      }

         // profile photo
         $image= '';
         if ($request->hasfile('profile_photo')) {
             $file = $request->file('profile_photo');
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/student_info/',$name);
             $image = '/storage/student_info/'.$name;
         }
         //return $image;

        $register_date = date('Y-m-d');
        $t_s_p_ary = array();
        foreach($request->t_s_p_id as $val){
          array_push($t_s_p_ary,$val);
        }

        $acc_firm_info = AccountancyFirmInformation::find($id);
        //$acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        if($request->accountancy_firm_reg_no){
          $acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        }
        $acc_firm_info->accountancy_firm_name   = $request->accountancy_firm_name;
        $acc_firm_info->head_office_address   = $request->head_office_address;
        $acc_firm_info->head_office_address_mm   = $request->head_office_address_mm;
        //$acc_firm_info->township                = $request->township;
        $acc_firm_info->postcode                = $request->post_code;
        //$acc_firm_info->city                    = $request->city;
        //$acc_firm_info->state_region            = $request->state;
        $acc_firm_info->telephones              = $request->phone_no;
        $acc_firm_info->h_email                   = $request->h_email;
        $acc_firm_info->website                 = $request->website;
        $acc_firm_info->audit_firm_type_id      = $request->audit_firm_type_id;
        //$acc_firm_info->verify_status      = 1;
        //$acc_firm_info->local_foreign_id        = $request->local_foreign_id;
        if($request->local_foreign_type){
          $acc_firm_info->local_foreign_type        = $request->local_foreign_type;
        }

        $acc_firm_info->organization_structure_id    = $request->org_stru_id;
        $acc_firm_info->type_of_service_provided_id  = json_encode($t_s_p_ary);
        //name of sole_propietor == name of manager
        $acc_firm_info->name_of_sole_proprietor      = $request->name_sole_proprietor;
        if($request->dir_passport_csc){
          $acc_firm_info->dir_passport_csc      = $request->dir_passport_csc;
        }
        $acc_firm_info->declaration  = $request->declaration;
        $acc_firm_info->declaration_mm  = $request->declaration_mm;
        if($image != ''){
          $acc_firm_info->image  = $image;
        }
        $acc_firm_info->status   = 0;
        // $acc_firm_info->form_fee = $request->form_fee;
        // $acc_firm_info->nrc_fee  = $request->nrc_fee;
        $acc_firm_info->register_date  = $register_date;
        $acc_firm_info->other  = $request->other;
        $acc_firm_info->verify_status  = 0;
        $acc_firm_info->req_for_stop    = $request->req_for_stop;
        $acc_firm_info->last_registered_year    = $request->last_registered_year;
        $acc_firm_info->suspended_year    = $request->suspended_year;
        $acc_firm_info->save();

        //Student Info
        // $std_info = new StudentInfo();
        // $std_info->accountancy_firm_info_id = $acc_firm_info->id;
        // $std_info->email = $request->email;
        // //$std_info->password = Hash::make($request->password);
        // $std_info->password = $request->password;
        // $std_info->save();

        //Student Info
        // $std_info = StudentInfo::find($id);
        // $std_info->approve_reject_status = 0;
        // $std_info->save();

        //Student Info
        $std_info = StudentInfo::find($acc_firm_info->student_info_id);

        //Branch Office
        BranchOffice::where('accountancy_firm_info_id',$id)->delete();
        if($request->bo_branch_name){
          for($i=0;$i<sizeof($request->bo_branch_name);$i++){
              $branch_office = new BranchOffice();
              $branch_office->branch_name = $request->bo_branch_name[$i];
              $branch_office->branch_address = $request->bo_address[$i];
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
        }

        if($request->audit_firm_type_id == 1){
          AuditFirmFile::where('accountancy_firm_info_id',$id)->delete();
           $audit_file= new AuditFirmFile();
           $audit_file->accountancy_firm_info_id = $acc_firm_info->id;
           $audit_file->ppa_certificate    = json_encode($ppa_certi);
           $audit_file->letterhead         = json_encode($letterhead);
           $audit_file->tax_clearance         = json_encode($tax_clearance);
           //$audit_file->representative     = json_encode($representative);
           $audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
           $audit_file->deeds_memo        = json_encode($deeds_memo);
           $audit_file->certificate_incor    = json_encode($certi_incor);
           //$audit_file->form6_form26_form_e= json_encode($form6_26e);
           //$audit_file->form_a1           = json_encode($form_a1);
           $audit_file->certi_or_reg      = json_encode($certi_or_reg);
           $audit_file->save();

           //Audit
            FirmOwnershipAudit::where('accountancy_firm_info_id',$id)->delete();
            if($request->foa_name){
              for($i=0;$i<sizeof($request->foa_name);$i++){
                  $firm_owner_audit = new FirmOwnershipAudit();
                  $firm_owner_audit->name                     = $request->foa_name[$i];
                  $firm_owner_audit->public_private_reg_no    = $request->foa_pub_pri_reg_no[$i];
                  $firm_owner_audit->authority_to_sign        = $request->foa_authority_to_sign[$i];
                  $firm_owner_audit->accountancy_firm_info_id = $acc_firm_info->id;
                  $firm_owner_audit->save();
              }
            }

            DirectorsOfficersAudit::where('accountancy_firm_info_id',$id)->delete();
            if($request->do_name){
              for($i=0;$i<sizeof($request->do_name);$i++){
                  $director_officer = new DirectorsOfficersAudit();
                  $director_officer->name                     = $request->do_name[$i];
                  $director_officer->position                 = $request->do_position[$i];
                  $director_officer->cpa_reg_no               = $request->do_cpa_reg_no[$i];
                  $director_officer->public_private_reg_no    = $request->do_pub_pri_reg_no[$i];
                  $director_officer->accountancy_firm_info_id = $acc_firm_info->id;
                  $director_officer->save();
              }
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

            // for($i=0;$i<sizeof($request->ats_audit_staff);$i++){
            //     $audit_total_staff = new AuditTotalStaff();
            //     $audit_total_staff->audit_staff              = $request->ats_audit_staff[$i];
            //     $audit_total_staff->non_audit_staff          = $request->ats_non_audit_staff[$i];
            //     $audit_total_staff->total                    = $request->ats_total[$i];
            //     $audit_total_staff->audit_total_staff_type_id= $request->ats_audit_total_staff_type_id[$i];
            //     $audit_total_staff->accountancy_firm_info_id = $acc_firm_info->id;
            //     $audit_total_staff->save();
            // }

            //invoice update for audit
            $invoice_info = Invoice::where('invoiceNo','audit_initial'.$id)->get();

            foreach($invoice_info as $invoice){
              $invoice->name_eng        = $std_info->email;
              $invoice->email           = $std_info->email;
              $invoice->phone           = '';
              $invoice->status          = 0;

              $fees = \App\Membership::where('membership_name', '=', 'Audit')->first(['form_fee', 'registration_fee']);
              $papp_count = FirmOwnershipAudit::where('accountancy_firm_info_id', '=', $acc_firm_info->id)
                            ->where('authority_to_sign', '=', 1)->count();

              $invoice->productDesc     = 'Audit App Fee, Reg Fee, Audit Firm';
              $invoice->amount          = $fees->form_fee . ',' . $papp_count * $fees->registration_fee;
              $invoice->status          = 0;
              $invoice->save();
            }

        }

        else
        {
          //Non-Audit
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
                //$director_officer_non_audit->csc_no     = $request->dona_csc_no[$i];
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

            // Firm Files
            NonAuditFirmFile::where('accountancy_firm_info_id',$id)->delete();
             $non_audit_file= new NonAuditFirmFile();
             $non_audit_file->accountancy_firm_info_id = $acc_firm_info->id;
             $non_audit_file->letterhead        = json_encode($letterhead);
             $non_audit_file->passport_photo    = json_encode($pass_photo);
             $non_audit_file->education_certificate  = json_encode($edu_cert);
             $non_audit_file->owner_profile     = json_encode($owner_profile);
             $non_audit_file->work_exp          = json_encode($work_exp);
             $non_audit_file->nrc_passport_front     = json_encode($nrc_passport_front);
             $non_audit_file->nrc_passport_back      = json_encode($nrc_passport_back);
             $non_audit_file->tax_clearance    = json_encode($tax_clearance);
             $non_audit_file->permit_foreign= json_encode($permit_foreigns);
             $non_audit_file->financial_statement    = json_encode($financial_statement);
             // $non_audit_file->representative     = json_encode($representative);
             $non_audit_file->certi_or_reg      = json_encode($certi_or_reg);
             $non_audit_file->deeds_memo        = json_encode($deeds_memo);
             $non_audit_file->certificate_incor    = json_encode($certi_incor);
             $non_audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
             $non_audit_file->save();

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

            //Student Info
            $std_info = StudentInfo::find($acc_firm_info->student_info_id);

            //invoice update for non-audit

            // $invoice_info = Invoice::where('invoiceNo','non_audit_initial'.$id)->get();
            // foreach($invoice_info as $invoice){
            //   // $invoice->student_info_id = $std_info->id;
            //   // $invoice->invoiceNo = 'non_audit_initial'.$acc_firm_info->id;
            //   $invoice->name_eng        = $std_info->email;
            //   $invoice->email           = $std_info->email;
            //   $invoice->phone           = '';
            //   $invoice->status          = 0;
            //
            //   $fees = \App\Membership::where('membership_name', '=', 'Non-Audit')->first(['form_fee', 'reg_fee_sole','reg_fee_partner']);
            //
            //   $invoice->productDesc     = 'Non-Audit Application Fee, Registration Fee,Non-Audit Firm';
            //   if($request->org_stru_id == 1){
            //     // for Sole Proprietorship
            //     $invoice->amount          = $fees->form_fee . ',' . $fees->reg_fee_sole;
            //   }
            //   else if($request->org_stru_id == 2 || $request->org_stru_id == 3 || $request->org_stru_id == 4){
            //     // for Partnership and Company
            //     $invoice->amount          = $fees->form_fee . ',' . $fees->reg_fee_partner;
            //   }
            //   else{
            //     // for Other
            //     $invoice->amount          = $fees->form_fee . ',' . $fees->reg_fee_partner;
            //   }
            //   $invoice->save();
            // }
        }


        return response()->json([
            'data' => "Update Successfully"
        ],200);

    }

    public function updateInitial(Request $request, $id){
      if($request->hasfile('ppa_certis'))
      {
          foreach($request->file('ppa_certis') as $file)
          {
              $name  = uniqid().'.'.$file->getClientOriginalExtension();
              $file->move(public_path().'/storage/acc_firm/',$name);
              $ppa_certi[] = '/storage/acc_firm/'.$name;
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
              $letterhead[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $letterhead = null;
      }

      if($request->hasfile('certi_or_regs'))
      {
          foreach($request->file('certi_or_regs') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $certi_or_reg[] = '/storage/acc_firm/'.$name;
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
          $deeds_memo[] = '/storage/acc_firm/'.$name;
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
          $certi_incor[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $certi_incor = null;
      }

      if($request->hasfile('tax_reg_certificate'))
      {
          foreach($request->file('tax_reg_certificate') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $tax_reg_certificate[] = '/storage/acc_firm/'.$name;
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
          $pass_photo[] = '/storage/acc_firm/'.$name;
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
          $edu_cert[] = '/storage/acc_firm/'.$name;
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
          $owner_profile[] = '/storage/acc_firm/'.$name;
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
          $work_exp[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $work_exp = null;
      }

      if($request->hasfile('nrc_passports_front'))
      {
          foreach($request->file('nrc_passports_front') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $nrc_passport_front[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $nrc_passport_front = null;
      }

      if($request->hasfile('nrc_passports_back'))
      {
          foreach($request->file('nrc_passports_back') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $nrc_passport_back[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $nrc_passport_back = null;
      }

      if($request->hasfile('tax_clearances'))
      {
          foreach($request->file('tax_clearances') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $tax_clearance[] = '/storage/acc_firm/'.$name;
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
          $permit_foreigns[] ='/storage/acc_firm/'.$name;
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
          $financial_statement[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $financial_statement = null;
      }

         // profile photo
         $image= '';
         if ($request->hasfile('profile_photo')) {
             $file = $request->file('profile_photo');
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/student_info/',$name);
             $image = '/storage/student_info/'.$name;
         }
         //return $image;

        $register_date = date('Y-m-d');
        $t_s_p_ary = array();
        foreach($request->t_s_p_id as $val){
          array_push($t_s_p_ary,$val);
        }

        $acc_firm_info = AccountancyFirmInformation::find($id);
        //$acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        if($request->accountancy_firm_reg_no){
          $acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        }
        $acc_firm_info->accountancy_firm_name   = $request->accountancy_firm_name;
        $acc_firm_info->head_office_address   = $request->head_office_address;
        $acc_firm_info->head_office_address_mm   = $request->head_office_address_mm;
        //$acc_firm_info->township                = $request->township;
        $acc_firm_info->postcode                = $request->post_code;
        //$acc_firm_info->city                    = $request->city;
        //$acc_firm_info->state_region            = $request->state;
        $acc_firm_info->telephones              = $request->phone_no;
        $acc_firm_info->h_email                   = $request->h_email;
        $acc_firm_info->website                 = $request->website;
        $acc_firm_info->audit_firm_type_id      = $request->audit_firm_type_id;
        //$acc_firm_info->verify_status      = 1;
        //$acc_firm_info->local_foreign_id        = $request->local_foreign_id;
        if($request->local_foreign_type){
          $acc_firm_info->local_foreign_type        = $request->local_foreign_type;
        }

        $acc_firm_info->organization_structure_id    = $request->org_stru_id;
        $acc_firm_info->type_of_service_provided_id  = json_encode($t_s_p_ary);
        //name of sole_propietor == name of manager
        $acc_firm_info->name_of_sole_proprietor      = $request->name_sole_proprietor;
        if($request->dir_passport_csc){
          $acc_firm_info->dir_passport_csc      = $request->dir_passport_csc;
        }
        $acc_firm_info->declaration  = $request->declaration;
        $acc_firm_info->declaration_mm  = $request->declaration_mm;
        if($image != ''){
          $acc_firm_info->image  = $image;
        }
        $acc_firm_info->status   = 0;
        // $acc_firm_info->form_fee = $request->form_fee;
        // $acc_firm_info->nrc_fee  = $request->nrc_fee;
        $acc_firm_info->register_date  = $register_date;
        $acc_firm_info->other  = $request->other;
        $acc_firm_info->verify_status  = 0;
        $acc_firm_info->req_for_stop    = $request->req_for_stop;
        $acc_firm_info->last_registered_year    = $request->last_registered_year;
        $acc_firm_info->suspended_year    = $request->suspended_year;
        $acc_firm_info->save();

        //Student Info
        // $std_info = new StudentInfo();
        // $std_info->accountancy_firm_info_id = $acc_firm_info->id;
        // $std_info->email = $request->email;
        // //$std_info->password = Hash::make($request->password);
        // $std_info->password = $request->password;
        // $std_info->save();

        //Student Info
        // $std_info = StudentInfo::find($id);
        // $std_info->approve_reject_status = 0;
        // $std_info->save();

        //Student Info
        $std_info = StudentInfo::find($acc_firm_info->student_info_id);

        //Branch Office
        BranchOffice::where('accountancy_firm_info_id',$id)->delete();
        if($request->bo_branch_name){
          for($i=0;$i<sizeof($request->bo_branch_name);$i++){
              $branch_office = new BranchOffice();
              $branch_office->branch_name = $request->bo_branch_name[$i];
              $branch_office->branch_address = $request->bo_address[$i];
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
        }

        if($request->audit_firm_type_id == 1){
          AuditFirmFile::where('accountancy_firm_info_id',$id)->delete();
           $audit_file= new AuditFirmFile();
           $audit_file->accountancy_firm_info_id = $acc_firm_info->id;
           $audit_file->ppa_certificate    = json_encode($ppa_certi);
           $audit_file->letterhead         = json_encode($letterhead);
           $audit_file->tax_clearance         = json_encode($tax_clearance);
           //$audit_file->representative     = json_encode($representative);
           $audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
           $audit_file->deeds_memo        = json_encode($deeds_memo);
           $audit_file->certificate_incor    = json_encode($certi_incor);
           //$audit_file->form6_form26_form_e= json_encode($form6_26e);
           //$audit_file->form_a1           = json_encode($form_a1);
           $audit_file->certi_or_reg      = json_encode($certi_or_reg);
           $audit_file->save();

           //Audit
            FirmOwnershipAudit::where('accountancy_firm_info_id',$id)->delete();
            if($request->foa_name){
              for($i=0;$i<sizeof($request->foa_name);$i++){
                  $firm_owner_audit = new FirmOwnershipAudit();
                  $firm_owner_audit->name                     = $request->foa_name[$i];
                  $firm_owner_audit->public_private_reg_no    = $request->foa_pub_pri_reg_no[$i];
                  $firm_owner_audit->authority_to_sign        = $request->foa_authority_to_sign[$i];
                  $firm_owner_audit->accountancy_firm_info_id = $acc_firm_info->id;
                  $firm_owner_audit->save();
              }
            }

            DirectorsOfficersAudit::where('accountancy_firm_info_id',$id)->delete();
            if($request->do_name){
              for($i=0;$i<sizeof($request->do_name);$i++){
                  $director_officer = new DirectorsOfficersAudit();
                  $director_officer->name                     = $request->do_name[$i];
                  $director_officer->position                 = $request->do_position[$i];
                  $director_officer->cpa_reg_no               = $request->do_cpa_reg_no[$i];
                  $director_officer->public_private_reg_no    = $request->do_pub_pri_reg_no[$i];
                  $director_officer->accountancy_firm_info_id = $acc_firm_info->id;
                  $director_officer->save();
              }
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

            // for($i=0;$i<sizeof($request->ats_audit_staff);$i++){
            //     $audit_total_staff = new AuditTotalStaff();
            //     $audit_total_staff->audit_staff              = $request->ats_audit_staff[$i];
            //     $audit_total_staff->non_audit_staff          = $request->ats_non_audit_staff[$i];
            //     $audit_total_staff->total                    = $request->ats_total[$i];
            //     $audit_total_staff->audit_total_staff_type_id= $request->ats_audit_total_staff_type_id[$i];
            //     $audit_total_staff->accountancy_firm_info_id = $acc_firm_info->id;
            //     $audit_total_staff->save();
            // }

            //invoice update for audit

            $invoice_info = Invoice::where('invoiceNo','audit_initial'.$id)->get();

            foreach($invoice_info as $invoice){
              $invoice->name_eng        = $std_info->email;
              $invoice->email           = $std_info->email;
              $invoice->phone           = '';
              $invoice->status          = 0;

              $fees = \App\Membership::where('membership_name', '=', 'Audit')->first(['form_fee', 'registration_fee']);
              $papp_count = FirmOwnershipAudit::where('accountancy_firm_info_id', '=', $acc_firm_info->id)
                            ->where('authority_to_sign', '=', 1)->count();

              $invoice->productDesc     = 'Audit App Fee, Reg Fee, Audit Firm';
              $invoice->amount          = $fees->form_fee . ',' . $papp_count * $fees->registration_fee;
              $invoice->status          = 0;
              $invoice->save();
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
                //$director_officer_non_audit->csc_no     = $request->dona_csc_no[$i];
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

            // Firm Files
            NonAuditFirmFile::where('accountancy_firm_info_id',$id)->delete();
             $non_audit_file= new NonAuditFirmFile();
             $non_audit_file->accountancy_firm_info_id = $acc_firm_info->id;
             $non_audit_file->letterhead        = json_encode($letterhead);
             $non_audit_file->passport_photo    = json_encode($pass_photo);
             $non_audit_file->education_certificate  = json_encode($edu_cert);
             $non_audit_file->owner_profile     = json_encode($owner_profile);
             $non_audit_file->work_exp          = json_encode($work_exp);
             $non_audit_file->nrc_passport_front     = json_encode($nrc_passport_front);
             $non_audit_file->nrc_passport_back      = json_encode($nrc_passport_back);
             $non_audit_file->tax_clearance    = json_encode($tax_clearance);
             $non_audit_file->permit_foreign= json_encode($permit_foreigns);
             $non_audit_file->financial_statement    = json_encode($financial_statement);
             // $non_audit_file->representative     = json_encode($representative);
             $non_audit_file->certi_or_reg      = json_encode($certi_or_reg);
             $non_audit_file->deeds_memo        = json_encode($deeds_memo);
             $non_audit_file->certificate_incor    = json_encode($certi_incor);
             $non_audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
             $non_audit_file->save();

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

            //Student Info
            $std_info = StudentInfo::find($acc_firm_info->student_info_id);

            //invoice update for non-audit

            $invoice_info = Invoice::where('invoiceNo','non_audit_initial'.$id)->get();
            foreach($invoice_info as $invoice){
              // $invoice->student_info_id = $std_info->id;
              // $invoice->invoiceNo = 'non_audit_initial'.$acc_firm_info->id;
              $invoice->name_eng        = $std_info->email;
              $invoice->email           = $std_info->email;
              $invoice->phone           = '';
              $invoice->status          = 0;

              $fees = \App\Membership::where('membership_name', '=', 'Non-Audit')->first(['form_fee', 'reg_fee_sole','reg_fee_partner']);

              $invoice->productDesc     = 'Non-Audit App Fee, Reg Fee, Non-Audit Firm';
              if($request->org_stru_id == 1){
                // for Sole Proprietorship
                $invoice->amount          = $fees->form_fee . ',' . $fees->reg_fee_sole;
              }
              else if($request->org_stru_id == 2 || $request->org_stru_id == 3 || $request->org_stru_id == 4){
                // for Partnership and Company
                $invoice->amount          = $fees->form_fee . ',' . $fees->reg_fee_partner;
              }
              else{
                // for Other
                $invoice->amount          = $fees->form_fee . ',' . $fees->reg_fee_partner;
              }
              $invoice->save();
            }
        }


        return response()->json([
            'data' => "Update Successfully"
        ],200);
    }

    public function updateRenewReject(Request $request, $id){

      if($request->hasfile('ppa_certis'))
      {
          foreach($request->file('ppa_certis') as $file)
          {
              $name  = uniqid().'.'.$file->getClientOriginalExtension();
              $file->move(public_path().'/storage/acc_firm/',$name);
              $ppa_certi[] = '/storage/acc_firm/'.$name;
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
              $letterhead[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $letterhead = null;
      }

      if($request->hasfile('certi_or_regs'))
      {
          foreach($request->file('certi_or_regs') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $certi_or_reg[] = '/storage/acc_firm/'.$name;
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
          $deeds_memo[] = '/storage/acc_firm/'.$name;
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
          $certi_incor[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $certi_incor = null;
      }

      if($request->hasfile('tax_reg_certificate'))
      {
          foreach($request->file('tax_reg_certificate') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $tax_reg_certificate[] = '/storage/acc_firm/'.$name;
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
          $pass_photo[] = '/storage/acc_firm/'.$name;
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
          $edu_cert[] = '/storage/acc_firm/'.$name;
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
          $owner_profile[] = '/storage/acc_firm/'.$name;
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
          $work_exp[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $work_exp = null;
      }


      if($request->hasfile('nrc_passports_front'))
      {
          foreach($request->file('nrc_passports_front') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $nrc_passport_front[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $nrc_passport_front = null;
      }

      if($request->hasfile('nrc_passports_back'))
      {
          foreach($request->file('nrc_passports_back') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $nrc_passport_back[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $nrc_passport_back = null;
      }

      if($request->hasfile('tax_clearances'))
      {
          foreach($request->file('tax_clearances') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $tax_clearance[] = '/storage/acc_firm/'.$name;
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
          $permit_foreigns[] ='/storage/acc_firm/'.$name;
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
          $financial_statement[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $financial_statement = null;
      }

         // profile photo
         $image= '';
         if ($request->hasfile('profile_photo')) {
             $file = $request->file('profile_photo');
             $name  = uniqid().'.'.$file->getClientOriginalExtension();
             $file->move(public_path().'/storage/student_info/',$name);
             $image = '/storage/student_info/'.$name;
         }
         //return $image;

        $register_date = date('Y-m-d');
        $t_s_p_ary = array();
        foreach($request->t_s_p_id as $val){
          array_push($t_s_p_ary,$val);
        }
        $acc_firm_info = AccountancyFirmInformation::find($id);
        //$acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        if($request->accountancy_firm_reg_no){
          $acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        }
        $acc_firm_info->accountancy_firm_name   = $request->accountancy_firm_name;
        $acc_firm_info->head_office_address   = $request->head_office_address;
        $acc_firm_info->head_office_address_mm   = $request->head_office_address_mm;
        //$acc_firm_info->township                = $request->township;
        $acc_firm_info->postcode                = $request->post_code;
        //$acc_firm_info->city                    = $request->city;
        //$acc_firm_info->state_region            = $request->state;
        $acc_firm_info->telephones              = $request->phone_no;
        $acc_firm_info->h_email                   = $request->h_email;
        $acc_firm_info->website                 = $request->website;
        $acc_firm_info->audit_firm_type_id      = $request->audit_firm_type_id;
        //$acc_firm_info->verify_status      = 1;
        //$acc_firm_info->local_foreign_id        = $request->local_foreign_id;
        if($request->local_foreign_type){
          $acc_firm_info->local_foreign_type        = $request->local_foreign_type;
        }

        $acc_firm_info->organization_structure_id    = $request->org_stru_id;
        $acc_firm_info->type_of_service_provided_id  = json_encode($t_s_p_ary);
        //name of sole_propietor == name of manager
        $acc_firm_info->name_of_sole_proprietor      = $request->name_sole_proprietor;
        if($request->dir_passport_csc){
          $acc_firm_info->dir_passport_csc      = $request->dir_passport_csc;
        }
        $acc_firm_info->declaration  = $request->declaration;
        $acc_firm_info->declaration_mm  = $request->declaration_mm;
        $acc_firm_info->other  = $request->other;
        if($image != ''){
          $acc_firm_info->image  = $image;
        }
        $acc_firm_info->status   = 0;
        // $acc_firm_info->form_fee = $request->form_fee;
        // $acc_firm_info->nrc_fee  = $request->nrc_fee;
        $acc_firm_info->register_date  = $register_date;
        $acc_firm_info->verify_status  = 0;
        if($request->req_for_stop){
          $acc_firm_info->req_for_stop    = $request->req_for_stop;
        }
        if($request->last_registered_year){
          $acc_firm_info->last_registered_year    = $request->last_registered_year;
        }
        if($request->suspended_year){
          $acc_firm_info->suspended_year    = $request->suspended_year;
        }

        $acc_firm_info->save();

        //Student Info
        // $std_info = new StudentInfo();
        // $std_info->accountancy_firm_info_id = $acc_firm_info->id;
        // $std_info->email = $request->email;
        // //$std_info->password = Hash::make($request->password);
        // $std_info->password = $request->password;
        // $std_info->save();

        //Student Info
        // $std_info = StudentInfo::find($id);
        // $std_info->approve_reject_status = 0;
        // $std_info->save();

        //Branch Office
        BranchOffice::where('accountancy_firm_info_id',$id)->delete();
        if($request->bo_branch_name){
          for($i=0;$i<sizeof($request->bo_branch_name);$i++){
              $branch_office = new BranchOffice();
              $branch_office->branch_name = $request->bo_branch_name[$i];
              $branch_office->branch_address = $request->bo_address[$i];
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
        }

        if($request->audit_firm_type_id == 1){
          AuditFirmFile::where('accountancy_firm_info_id',$id)->delete();
           $audit_file= new AuditFirmFile();
           $audit_file->accountancy_firm_info_id = $acc_firm_info->id;
           $audit_file->ppa_certificate    = json_encode($ppa_certi);
           $audit_file->letterhead         = json_encode($letterhead);
           $audit_file->tax_clearance         = json_encode($tax_clearance);
           //$audit_file->representative     = json_encode($representative);
           $audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
           $audit_file->deeds_memo        = json_encode($deeds_memo);
           $audit_file->certificate_incor    = json_encode($certi_incor);
           //$audit_file->form6_form26_form_e= json_encode($form6_26e);
           //$audit_file->form_a1           = json_encode($form_a1);
           $audit_file->certi_or_reg      = json_encode($certi_or_reg);
           $audit_file->save();

           //Audit
            FirmOwnershipAudit::where('accountancy_firm_info_id',$id)->delete();
            if($request->foa_name){
              for($i=0;$i<sizeof($request->foa_name);$i++){
                  $firm_owner_audit = new FirmOwnershipAudit();
                  $firm_owner_audit->name                     = $request->foa_name[$i];
                  $firm_owner_audit->public_private_reg_no    = $request->foa_pub_pri_reg_no[$i];
                  $firm_owner_audit->authority_to_sign        = $request->foa_authority_to_sign[$i];
                  $firm_owner_audit->accountancy_firm_info_id = $acc_firm_info->id;
                  $firm_owner_audit->save();
              }
            }


            DirectorsOfficersAudit::where('accountancy_firm_info_id',$id)->delete();
            if($request->do_name){
              for($i=0;$i<sizeof($request->do_name);$i++){
                  $director_officer = new DirectorsOfficersAudit();
                  $director_officer->name                     = $request->do_name[$i];
                  $director_officer->position                 = $request->do_position[$i];
                  $director_officer->cpa_reg_no               = $request->do_cpa_reg_no[$i];
                  $director_officer->public_private_reg_no    = $request->do_pub_pri_reg_no[$i];
                  $director_officer->accountancy_firm_info_id = $acc_firm_info->id;
                  $director_officer->save();
              }
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

            // for($i=0;$i<sizeof($request->ats_audit_staff);$i++){
            //     $audit_total_staff = new AuditTotalStaff();
            //     $audit_total_staff->audit_staff              = $request->ats_audit_staff[$i];
            //     $audit_total_staff->non_audit_staff          = $request->ats_non_audit_staff[$i];
            //     $audit_total_staff->total                    = $request->ats_total[$i];
            //     $audit_total_staff->audit_total_staff_type_id= $request->ats_audit_total_staff_type_id[$i];
            //     $audit_total_staff->accountancy_firm_info_id = $acc_firm_info->id;
            //     $audit_total_staff->save();
            // }

            // invoice update
            if($request->offline_user == 1){
              $invoice_info = Invoice::where('invoiceNo','off_audit_renew'.$id)->get();
            }
            else{
              $invoice_info = Invoice::where('invoiceNo','audit_renew'.$id)->get();
            }
            //
            foreach($invoice_info as $invoice){
              //invoice for audit

              $fees = \App\Membership::where('membership_name', '=', 'Audit')->first(['form_fee', 'renew_fee_sole',
                                                                                      'renew_fee_partner','late_fee_within_jan_sole',
                                                                                      'late_fee_within_jan_partner','late_fee_feb_to_apr_sole',
                                                                                      'late_fee_feb_to_apr_partner','reconnect_fee_sole',
                                                                                      'reconnect_fee_partner','renew_fee']);
              $papp_count = FirmOwnershipAudit::where('accountancy_firm_info_id', '=', $acc_firm_info->id)
                            ->where('authority_to_sign', '=', 1)->count();

              $invoice->status          = 0;
              //$invoice->save();

              $current_year = date('Y');
              $current_month_name = date('M');
              $current_month = date('m');
              $last_registered_year = $request->last_registered_year;
              //$invoice->productDesc     = 'Audit Application Fee, Renew Fee(per PAPP who will sign the audit report),Reconnect Fee';

              if($request->req_for_stop == 1){
                // suspended
                $suspended_year = $request->suspended_year;
                $number_of_reconnect_pay_year = $suspended_year - $last_registered_year - 1;
                if($request->org_stru_id == 1){
                  // for Sole Proprietorship
                  if($current_month_name == 'Jan'){
                    // within January
                    $delay_fee = $fees->late_fee_within_jan_sole;
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee, Reconnect Fee, Delay Fee, Audit Firm';
                    $invoice->save();
                  }
                  else if($current_month >= 2 && $current_month <= 4){
                    // from Feb to Apr
                    $delay_fee = $fees->late_fee_feb_to_apr_sole;
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee, Reconnect Fee, Delay Fee, Audit Firm';
                    $invoice->save();
                  }
                  else{
                    // not late
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee, Reconnect Fee, Audit Firm';
                    $invoice->save();
                  }
                }
                else if($request->org_stru_id == 2 || $request->org_stru_id == 3 || $request->org_stru_id == 4){
                  // for Partnership and Company
                  if($current_month_name == 'Jan'){
                    // within January
                    $delay_fee = $fees->late_fee_within_jan_partner;
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee, Reconnect Fee, Delay Fee, Audit Firm';
                    $invoice->save();
                  }
                  else if($current_month >= 2 && $current_month <= 4){
                    // from Feb to Apr
                    $delay_fee = $fees->late_fee_feb_to_apr_partner;
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                    $invoice->save();
                  }
                  else{
                    // not late
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Audit Firm';
                    $invoice->save();
                  }
                }
                else{
                  ///
                }
              }
              else{

                // not suspended
                $last_registered_year = $request->last_registered_year;
                $number_of_reconnect_pay_year = $current_year - $last_registered_year - 1;
                if($request->org_stru_id == 1){
                  // for Sole Proprietorship
                  if($current_month_name == 'Jan'){
                    // within January
                    $delay_fee = $fees->late_fee_within_jan_sole;
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                    $invoice->save();
                  }
                  else if($current_month >= 2 && $current_month <= 4){
                    // from Feb to Apr
                    $delay_fee = $fees->late_fee_feb_to_apr_sole;
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                    $invoice->save();
                  }
                  else{
                    // not late
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Audit Firm';
                    $invoice->save();
                  }
                }
                else if($request->org_stru_id == 2 || $request->org_stru_id == 3 || $request->org_stru_id == 4){
                  // for Partnership and Company
                  if($current_month_name == 'Jan'){
                    // within January
                    $delay_fee = $fees->late_fee_within_jan_partner;
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                    $invoice->save();
                  }
                  else if($current_month >= 2 && $current_month <= 4){
                    // from Feb to Apr
                    $delay_fee = $fees->late_fee_feb_to_apr_partner;
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                    $invoice->save();
                  }
                  else{
                    // not late
                    $renew_fee = $fees->renew_fee * $papp_count;
                    $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                    $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Audit Firm';
                    $invoice->save();
                  }
                }
                else{
                  ///
                }
              }
              $invoice->save();
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
                //$director_officer_non_audit->csc_no     = $request->dona_csc_no[$i];
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

            // Firm Files
            NonAuditFirmFile::where('accountancy_firm_info_id',$id)->delete();
             $non_audit_file= new NonAuditFirmFile();
             $non_audit_file->accountancy_firm_info_id = $acc_firm_info->id;
             $non_audit_file->letterhead        = json_encode($letterhead);
             $non_audit_file->passport_photo    = json_encode($pass_photo);
             $non_audit_file->education_certificate  = json_encode($edu_cert);
             $non_audit_file->owner_profile     = json_encode($owner_profile);
             $non_audit_file->work_exp          = json_encode($work_exp);
             $non_audit_file->nrc_passport_front     = json_encode($nrc_passport_front);
             $non_audit_file->nrc_passport_back      = json_encode($nrc_passport_back);
             $non_audit_file->tax_clearance    = json_encode($tax_clearance);
             $non_audit_file->permit_foreign= json_encode($permit_foreigns);
             $non_audit_file->financial_statement    = json_encode($financial_statement);
             // $non_audit_file->representative     = json_encode($representative);
             $non_audit_file->certi_or_reg      = json_encode($certi_or_reg);
             $non_audit_file->deeds_memo        = json_encode($deeds_memo);
             $non_audit_file->certificate_incor    = json_encode($certi_incor);
             $non_audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
             $non_audit_file->save();

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

            // invoice update
            //invoice for non-audit
            if($request->offline_user == 1){
              $invoice_info = Invoice::where('invoiceNo','off_non_audit_renew'.$id)->get();
            }
            else{
              $invoice_info = Invoice::where('invoiceNo','non_audit_renew'.$id)->get();
            }
            //$invoice_info = Invoice::where('invoiceNo','off_non_audit_renew'.$id)->get();
            foreach($invoice_info as $invoice){
              $fees = \App\Membership::where('membership_name', '=', 'Non-Audit')->first(['form_fee', 'renew_fee_sole',
                                                                                      'renew_fee_partner','late_fee_within_jan_sole',
                                                                                      'late_fee_within_jan_partner','late_fee_feb_to_apr_sole',
                                                                                      'late_fee_feb_to_apr_partner','reconnect_fee_sole',
                                                                                      'reconnect_fee_partner','renew_fee']);



              $invoice->status          = 0;
              $invoice->save();

              $current_year = date('Y');
              $current_month_name = date('M');
              $current_month = date('m');
              $last_registered_year = $request->last_registered_year;
              //$invoice->productDesc     = 'Non-Audit Application Fee, Renew Fee(per PAPP who will sign the audit report),Reconnect Fee';

              if($request->req_for_stop == 1){
                // suspended
                $suspended_year = $request->suspended_year;
                $number_of_reconnect_pay_year = $suspended_year - $last_registered_year - 1;
                if($request->org_stru_id == 1){
                  // for Sole Proprietorship
                  if($current_month_name == 'Jan'){
                    // within January
                    $delay_fee = $fees->late_fee_within_jan_sole;
                    $renew_fee = $fees->renew_fee_sole;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                  }
                  else if($current_month >= 2 && $current_month <= 4){
                    // from Feb to Apr
                    $delay_fee = $fees->late_fee_feb_to_apr_sole;
                    $renew_fee = $fees->renew_fee_sole;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                  }
                  else{
                    // not late
                    $renew_fee = $fees->renew_fee_sole;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Non-Audit Firm';
                  }
                }
                else if($request->org_stru_id == 2 || $request->org_stru_id == 3 || $request->org_stru_id == 4){
                  // for Partnership and Company
                  if($current_month_name == 'Jan'){
                    // within January
                    $delay_fee = $fees->late_fee_within_jan_partner;
                    $renew_fee = $fees->renew_fee_partner;
                    $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                  }
                  else if($current_month >= 2 && $current_month <= 4){
                    // from Feb to Apr
                    $delay_fee = $fees->late_fee_feb_to_apr_partner;
                    $renew_fee = $fees->renew_fee_partner;
                    $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                  }
                  else{
                    // not  late
                    $renew_fee = $fees->renew_fee_partner;
                    $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Non-Audit Firm';
                  }
                }
                else{
                  // for Other
                  // if($current_month_name == 'Jan'){
                  //   // within January
                  //   $delay_fee = 0;
                  //   $renew_fee = 0;
                  //   $reconnect_fee = 0;
                  //   $invoice->amount = $fees->form_fee + $renew_fee + $reconnect_fee + $delay_fee;
                  // }
                  // else if($current_month >= 2 && $current_month <= 4){
                  //   // from Feb to Apr
                  //   $delay_fee = 0;
                  //   $renew_fee = 0;
                  //   $reconnect_fee = 0;
                  //   $invoice->amount = $fees->form_fee + $renew_fee + $reconnect_fee + $delay_fee;
                  // }
                  // else{
                  //   $renew_fee = 0;
                  //   $reconnect_fee = 0;
                  //   $invoice->amount = $fees->form_fee + $renew_fee + $reconnect_fee;
                  // }
                }
              }
              else{
                // not suspended
                $last_registered_year = $request->last_registered_year;
                $number_of_reconnect_pay_year = $current_year - $last_registered_year - 1;
                if($request->org_stru_id == 1){
                  // for Sole Proprietorship
                  if($current_month_name == 'Jan'){
                    // within January
                    $delay_fee = $fees->late_fee_within_jan_sole;
                    $renew_fee = $fees->renew_fee_sole;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee, Delay Fee,Non-Audit Firm';
                  }
                  else if($current_month >= 2 && $current_month <= 4){
                    // from Feb to Apr
                    $delay_fee = $fees->late_fee_feb_to_apr_sole;
                    $renew_fee = $fees->renew_fee_sole;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                  }
                  else{
                    // not late
                    $renew_fee = $fees->renew_fee_sole;
                    $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Non-Audit Firm';
                  }
                }
                else if($request->org_stru_id == 2 || $request->org_stru_id == 3 || $request->org_stru_id == 4){
                  // for Partnership and Company
                  if($current_month_name == 'Jan'){
                    // within January
                    $delay_fee = $fees->late_fee_within_jan_partner;
                    $renew_fee = $fees->renew_fee_partner;
                    $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                  }
                  else if($current_month >= 2 && $current_month <= 4){
                    // from Feb to Apr
                    $delay_fee = $fees->late_fee_feb_to_apr_partner;
                    $renew_fee = $fees->renew_fee_partner;
                    $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                  }
                  else{
                    // not late
                    $renew_fee = $fees->renew_fee_partner;
                    $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                    $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                    $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee,Reconnect Fee,Non-Audit Firm';
                  }
                }
                else{
                  // for Other
                  // if($current_month_name == 'Jan'){
                  //   // within January
                  //   $delay_fee = 0;
                  //   $renew_fee = 0;
                  //   $reconnect_fee = 0;
                  //   $invoice->amount = $fees->form_fee + $renew_fee + $reconnect_fee + $delay_fee;
                  // }
                  // else if($current_month >= 2 && $current_month <= 4){
                  //   // from Feb to Apr
                  //   $delay_fee = 0;
                  //   $renew_fee = 0;
                  //   $reconnect_fee = 0;
                  //   $invoice->amount = $fees->form_fee + $renew_fee + $reconnect_fee + $delay_fee;
                  // }
                  // else{
                  //   $renew_fee = 0;
                  //   $reconnect_fee = 0;
                  //   $invoice->amount = $fees->form_fee + $renew_fee + $reconnect_fee;
                  // }
                }
              }
              $invoice->save();

            }

        }

        return response()->json([
            'data' => "Updated Successfully"
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
        $data = AccountancyFirmInformation::where('student_info_id',$id)
                                          ->latest()
                                          ->first();
        $student_infos = StudentInfo::where('id',$id)->select('email')->get();
        $firm_id = AccountancyFirmInformation::where('student_info_id',$id)
                                            ->select('id')
                                            ->latest()
                                            ->first();

        $other_data = AccountancyFirmInformation::where('id',$firm_id->id)
                                                ->with('branch_offices','firm_owner_audits','director_officer_audits',
                                                  'audit_staffs','audit_total_staffs','firm_owner_non_audits','director_officer_non_audits',
                                                  'non_audit_total_staffs','my_cpa_foreigns','audit_firm_file','non_audit_firm_file')->get();


        return response()->json([
          'data' => $data,
          'other_data' => $other_data,
          'student_infos' => $student_infos
        ],200);
    }

    // Non Audit Feedback
    public function nonAuditFeedback($id)
    {
        // $data = AccountancyFirmInformation::where('id',$id)
        //                                     ->with('branch_offices','firm_owner_audits','director_officer_audits',
        //                                             'audit_staffs','audit_total_staffs','firm_owner_non_audits','director_officer_non_audits',
        //                                             'non_audit_total_staffs','my_cpa_foreigns','audit_firm_file','non_audit_firm_file')
        //                                     ->get();
        // return response()->json($data,200);

        $data = AccountancyFirmInformation::where('student_info_id',$id)
                                          ->latest()
                                          ->first();
        $student_infos = StudentInfo::where('id',$id)->select('email')->get();
        $firm_id = AccountancyFirmInformation::where('student_info_id',$id)
                                            ->select('id')
                                            ->latest()
                                            ->first();

        $other_data = AccountancyFirmInformation::where('id',$firm_id->id)
                                                ->with('branch_offices','firm_owner_audits','director_officer_audits',
                                                  'audit_staffs','audit_total_staffs','firm_owner_non_audits','director_officer_non_audits',
                                                  'non_audit_total_staffs','my_cpa_foreigns','audit_firm_file','non_audit_firm_file')->get();


        return response()->json([
          'data' => $data,
          'other_data' => $other_data,
          'student_infos' => $student_infos
        ],200);
    }

    public function auditStatus($id)
    {
        $data = AccountancyFirmInformation::where('id',$id)
                                            ->with('branch_offices','firm_owner_audits','director_officer_audits',
                                            'audit_staffs','audit_total_staffs','firm_owner_non_audits','director_officer_non_audits',
                                            'non_audit_total_staffs','my_cpa_foreigns','audit_firm_file','non_audit_firm_file')
                                            ->get('status');
        return response()->json($data,200);
    }

    public function nonAuditStatus($id)
    {
        $data = AccountancyFirmInformation::where('id',$id)
                                          ->where('audit_firm_type_id',2)
                                          ->with('branch_offices','firm_owner_audits','director_officer_audits',
                                                'audit_staffs','audit_total_staffs','firm_owner_non_audits','director_officer_non_audits',
                                                'non_audit_total_staffs','my_cpa_foreigns','audit_firm_file','non_audit_firm_file')
                                          ->get('status');
        return response()->json($data,200);
    }

    // get date range
    public function dateRange($id)
    {
        date_default_timezone_set("Asia/Yangon");
        $date = AccountancyFirmInformation::where('student_info_id',$id)
                                          ->select('register_date')
                                          ->latest()
                                          ->first();

        $reg_date = strtotime($date['register_date']);

        // $date_range = strtotime(date('2021-09-30'));
        //$date = AccountancyFirmInformation::find($id);
        $register_date = Carbon::parse($reg_date)->format('M');

        $verify = "You are verified!";
        $next = "Your registration will start in next year!";
        $renew = "Your registration is expired! You need to submit new registration form again.";

        $accept_date = date("Y-m-d H:i:s", strtotime('+ 1 year', $reg_date));
        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");
        $currentDate =  date("Y-m-d H:i:s", strtotime($currentDate . $currentTime));

        if($currentDate >= $accept_date)
        {
            $renew_user = AccountancyFirmInformation::where('student_info_id',$id)
                                              ->latest()
                                              ->first();
            $firm_type = $renew_user->audit_firm_type_id;
            $status = $renew_user->status;
            $renew_user->verify_status = 3;
            $renew_user->save();

            return response()->json([
                'message' => $renew,
                'type' => 'renew',
                'firm_type' => $firm_type,
                'status' => $status
            ],200);
        }

        if('Oct' == $register_date || 'Nov' == $register_date || 'Dec' == $register_date)
        {
            $next_year_user = AccountancyFirmInformation::where('student_info_id',$id)
                                              ->latest()
                                              ->first();
            $firm_type = $next_year_user->audit_firm_type_id;
            $status = $next_year_user->status;
            $next_year_user->verify_status = 2;
            $next_year_user->save();

            return response()->json([
                'message' => $next,
                'type' => 'next',
                'firm_type' => $firm_type,
                'status' => $status
            ],200);
        }
        else
        {
            $verify_user = AccountancyFirmInformation::where('student_info_id',$id)
                                              ->latest()
                                              ->first();
            $firm_type = $verify_user->audit_firm_type_id;
            $status = $verify_user->status;
            $verify_user->verify_status = 1;
            $verify_user->save();

            return response()->json([
                'message' => $verify,
                'type' => 'verify',
                'firm_type' => $firm_type,
                'status' => $status
            ],200);
        }
    }

    public function nonAuditDateRange($id)
    {
        date_default_timezone_set("Asia/Yangon");
        $date = AccountancyFirmInformation::where('id',$id)->get('register_date');
        $reg_date = strtotime($date[0]['register_date']);
        // $date_range = strtotime(date('2021-09-30'));
        $date = AccountancyFirmInformation::find($id);
        $register_date = Carbon::parse($date->register_date)->format('M');

        $verify = "You are verified!";
        $next = "Your registration will start in next year!";
        $renew = "Your registration is expired! You need to submit new registration form again.";

        $accept_date = date("Y-m-d H:i:s", strtotime('+ 1 year', $reg_date));
        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");
        $currentDate =  date("Y-m-d H:i:s", strtotime($currentDate . $currentTime));

        if($currentDate >= $accept_date)
        {
            $renew_user = AccountancyFirmInformation::find($id);
            $renew_user->verify_status = 3;
            $renew_user->save();
            // return $verify;
            return response()->json($renew,200);
        }

        if('Oct' == $register_date || 'Nov' == $register_date || 'Dec' == $register_date)
        {
            $next_year_user = AccountancyFirmInformation::find($id);
            $next_year_user->verify_status = 2;
            $next_year_user->save();
            // return $next;
            return response()->json($next,200);
        }
        else
        {
            $verify_user = AccountancyFirmInformation::find($id);
            $verify_user->verify_status = 1;
            $verify_user->save();
            // return $verify;
            return response()->json($verify,200);
        }
    }

    // Renew
    public function renewSubscribe(Request $request)
    {

        $register_date = date('Y-m-d');

        if($request->hasfile('ppa_certis'))
        {
            foreach($request->file('ppa_certis') as $file)
            {
                $name  = uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path().'/storage/acc_firm/',$name);
                $ppa_certi[] = '/storage/acc_firm/'.$name;
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
                $letterhead[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $letterhead = null;
        }

        if($request->hasfile('certi_or_regs'))
        {
            foreach($request->file('certi_or_regs') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $certi_or_reg[] = '/storage/acc_firm/'.$name;
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
            $deeds_memo[] = '/storage/acc_firm/'.$name;
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
            $certi_incor[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $certi_incor = null;
        }

        if($request->hasfile('tax_reg_certificate'))
        {
            foreach($request->file('tax_reg_certificate') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $tax_reg_certificate[] = '/storage/acc_firm/'.$name;
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
            $pass_photo[] = '/storage/acc_firm/'.$name;
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
            $edu_cert[] = '/storage/acc_firm/'.$name;
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
            $owner_profile[] = '/storage/acc_firm/'.$name;
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
            $work_exp[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $work_exp = null;
        }


        if($request->hasfile('nrc_passports_front'))
        {
            foreach($request->file('nrc_passports_front') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $nrc_passport_front[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $nrc_passport_front = null;
        }

        if($request->hasfile('nrc_passports_back'))
        {
            foreach($request->file('nrc_passports_back') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $nrc_passport_back[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $nrc_passport_back = null;
        }

        if($request->hasfile('tax_clearances'))
        {
            foreach($request->file('tax_clearances') as $file)
            {
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/acc_firm/',$name);
            $tax_clearance[] = '/storage/acc_firm/'.$name;
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
            $permit_foreigns[] ='/storage/acc_firm/'.$name;
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
            $financial_statement[] = '/storage/acc_firm/'.$name;
            }

        }else{
            $financial_statement = null;
        }

        // profile photo
        if ($request->hasfile('profile_photo')) {
            $file = $request->file('profile_photo');
            $name  = uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/storage/student_info/',$name);
            $image = '/storage/student_info/'.$name;
        }

        $t_s_p_ary = array();
        foreach($request->t_s_p_id as $val){
          array_push($t_s_p_ary,$val);
        }

        //Main Table
        $acc_firm_info = new AccountancyFirmInformation();
        // $acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        $acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        $acc_firm_info->accountancy_firm_name   = $request->accountancy_firm_name;
        $acc_firm_info->head_office_address   = $request->head_office_address;
        $acc_firm_info->head_office_address_mm   = $request->head_office_address_mm;
        //$acc_firm_info->township                = $request->township;
        $acc_firm_info->postcode                = $request->post_code;
        //$acc_firm_info->city                    = $request->city;
        //$acc_firm_info->state_region            = $request->state;
        $acc_firm_info->telephones              = $request->phone_no;
        $acc_firm_info->h_email                 = $request->h_email;
        $acc_firm_info->website                 = $request->website;
        $acc_firm_info->audit_firm_type_id      = $request->audit_firm_type_id;
        //$acc_firm_info->local_foreign_id        = $request->local_foreign_id;
        $acc_firm_info->local_foreign_type        = $request->local_foreign_type;
        $acc_firm_info->organization_structure_id    = $request->org_stru_id;
        $acc_firm_info->type_of_service_provided_id  = json_encode($t_s_p_ary);
        $acc_firm_info->other  = $request->other;
        //name of sole_propietor == name of manager
        $acc_firm_info->name_of_sole_proprietor      = $request->name_sole_proprietor;
        if($request->dir_passport_csc){
          $acc_firm_info->dir_passport_csc = $request->dir_passport_csc;
        }
        $acc_firm_info->declaration                  = $request->declaration;
        $acc_firm_info->declaration_mm                  = $request->declaration_mm;
        $acc_firm_info->status   = 0;
        $acc_firm_info->register_date  = $register_date;
        $acc_firm_info->image  = $image;
        $acc_firm_info->is_renew  = 1;  // renew user status
        $acc_firm_info->verify_status  = 1;
        $acc_firm_info->student_info_id  = $request->student_id;
        $acc_firm_info->req_for_stop  = $request->req_for_stop;
        $acc_firm_info->offline_user  = $request->offline_user;
        $acc_firm_info->last_registered_year  = $request->last_registered_year;
        $acc_firm_info->suspended_year  = $request->suspended_year;
        $acc_firm_info->save();

        //Student Info
        // $std_info = new StudentInfo();
        // $std_info->accountancy_firm_info_id = $acc_firm_info->id;
        // $std_info->email            =   strtolower($request->email);
        // $std_info->password         =   Hash::make($request->password);
        // $std_info->verify_code      =   uniqid();
        // $std_info->save();

        // $student_data = AccountancyFirmInformation::find($acc_firm_info->id);
        // $student_data->student_info_id = $std_info->id;
        // $student_data->save();

        //Branch Office
        if($request->bo_branch_name){
          for($i=0;$i<sizeof($request->bo_branch_name);$i++){
              $branch_office = new BranchOffice();
              $branch_office->branch_name = $request->bo_branch_name[$i];
              $branch_office->branch_address = $request->bo_address[$i];
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
        }

        if($request->audit_firm_type_id == 1){
            //Audit Firm
            if($request->org_stru_id){
                $audit_file= new AuditFirmFile();
                $audit_file->accountancy_firm_info_id = $acc_firm_info->id;
                $audit_file->ppa_certificate    = json_encode($ppa_certi);
                $audit_file->letterhead        = json_encode($letterhead);
                $audit_file->tax_clearance    = json_encode($tax_clearance);
                // $audit_file->representative     = json_encode($representative);
                $audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
                $audit_file->deeds_memo        = json_encode($deeds_memo);
                $audit_file->certificate_incor    = json_encode($certi_incor);
                // $audit_file->form6_form26_form_e= json_encode($form6_26e);
                // $audit_file->form_a1           = json_encode($form_a1);
                $audit_file->certi_or_reg      = json_encode($certi_or_reg);
                $audit_file->save();

             }

            if($request->foa_name){
              for($i=0;$i<sizeof($request->foa_name);$i++){
                  $firm_owner_audit = new FirmOwnershipAudit();
                  $firm_owner_audit->name                     = $request->foa_name[$i];
                  $firm_owner_audit->public_private_reg_no    = $request->foa_pub_pri_reg_no[$i];
                  $firm_owner_audit->authority_to_sign        = $request->foa_authority_to_sign[$i];
                  $firm_owner_audit->accountancy_firm_info_id = $acc_firm_info->id;
                  $firm_owner_audit->save();
              }
            }

            if($request->do_name){
              for($i=0;$i<sizeof($request->do_name);$i++){
                  $director_officer = new DirectorsOfficersAudit();
                  $director_officer->name                     = $request->do_name[$i];
                  $director_officer->position                 = $request->do_position[$i];
                  $director_officer->cpa_reg_no               = $request->do_cpa_reg_no[$i];
                  $director_officer->public_private_reg_no    = $request->do_pub_pri_reg_no[$i];
                  $director_officer->accountancy_firm_info_id = $acc_firm_info->id;
                  $director_officer->save();
              }
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

            //Student Info
            $std_info = StudentInfo::find($request->student_id);

            //invoice for audit

            $fees = \App\Membership::where('membership_name', '=', 'Audit')->first(['form_fee', 'renew_fee_sole',
                                                                                    'renew_fee_partner','late_fee_within_jan_sole',
                                                                                    'late_fee_within_jan_partner','late_fee_feb_to_apr_sole',
                                                                                    'late_fee_feb_to_apr_partner','reconnect_fee_sole',
                                                                                    'reconnect_fee_partner','renew_fee']);
            $papp_count = FirmOwnershipAudit::where('accountancy_firm_info_id', '=', $acc_firm_info->id)
                          ->where('authority_to_sign', '=', 1)->count();

                          // is offline user
                          //$invoice = Invoice::where('student_info_id',$request->student_id)->first();
                          $invoice = New Invoice();
                          $invoice->student_info_id = $request->student_id;
                          if($request->offline_user == 1){
                            $invoice->invoiceNo = 'off_audit_renew'.$acc_firm_info->id;
                          }
                          else{
                            $invoice->invoiceNo = 'audit_renew'.$acc_firm_info->id;
                          }

                          $invoice->name_eng        = $acc_firm_info->accountancy_firm_name;
                          $invoice->email           = $std_info->email;
                          $invoice->phone           = $acc_firm_info->telephones;
                          $invoice->status          = 0;
                          $invoice->save();

                          $current_year = date('Y');
                          $current_month_name = date('M');
                          $current_month = date('m');
                          $last_registered_year = $request->last_registered_year;
                          //$invoice->productDesc     = 'Audit Application Fee, Renew Fee(per PAPP who will sign the audit report),Reconnect Fee';

                          if($request->req_for_stop == 1){
                            // suspended
                            $suspended_year = $request->suspended_year;
                            $number_of_reconnect_pay_year = $suspended_year - $last_registered_year - 1;
                            if($request->org_stru_id == 1){
                              // for Sole Proprietorship
                              if($current_month_name == 'Jan'){
                                // within January
                                $delay_fee = $fees->late_fee_within_jan_sole;
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                                $invoice->save();
                              }
                              else if($current_month >= 2 && $current_month <= 4){
                                // from Feb to Apr
                                $delay_fee = $fees->late_fee_feb_to_apr_sole;
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                                $invoice->save();
                              }
                              else{
                                // not late
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Audit Firm';
                                $invoice->save();
                              }
                            }
                            else if($request->org_stru_id == 2 || $request->org_stru_id == 3 || $request->org_stru_id == 4){
                              // for Partnership and Company
                              if($current_month_name == 'Jan'){
                                // within January
                                $delay_fee = $fees->late_fee_within_jan_partner;
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                                $invoice->save();
                              }
                              else if($current_month >= 2 && $current_month <= 4){
                                // from Feb to Apr
                                $delay_fee = $fees->late_fee_feb_to_apr_partner;
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                                $invoice->save();
                              }
                              else{
                                // not late
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Audit Firm';
                                $invoice->save();
                              }
                            }
                            else{
                              ////
                            }
                          }
                          else{
                            // not suspended
                            $last_registered_year = $request->last_registered_year;
                            $number_of_reconnect_pay_year = $current_year - $last_registered_year - 1;
                            if($request->org_stru_id == 1){
                              // for Sole Proprietorship
                              if($current_month_name == 'Jan'){
                                // within January
                                $delay_fee = $fees->late_fee_within_jan_sole;
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                                $invoice->save();
                              }
                              else if($current_month >= 2 && $current_month <= 4){
                                // from Feb to Apr
                                $delay_fee = $fees->late_fee_feb_to_apr_sole;
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                                $invoice->save();
                              }
                              else{
                                // not late
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Audit Firm';
                                $invoice->save();
                              }
                            }
                            else if($request->org_stru_id == 2 || $request->org_stru_id == 3 || $request->org_stru_id == 4){
                              // for Partnership and Company
                              if($current_month_name == 'Jan'){
                                // within January
                                $delay_fee = $fees->late_fee_within_jan_partner;
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                                $invoice->save();
                              }
                              else if($current_month >= 2 && $current_month <= 4){
                                // from Feb to Apr
                                $delay_fee = $fees->late_fee_feb_to_apr_partner;
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Delay Fee,Audit Firm';
                                $invoice->save();
                              }
                              else{
                                $renew_fee = $fees->renew_fee * $papp_count;
                                $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                                $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                                $invoice->productDesc     = 'Audit App Fee, Renew Fee,Reconnect Fee,Audit Firm';
                                $invoice->save();
                              }
                            }
                            else{
                              ////
                            }
                          }

        }
        //Non-Audit Firm
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
                $non_audit_file->nrc_passport_front     = json_encode($nrc_passport_front);
                $non_audit_file->nrc_passport_back      = json_encode($nrc_passport_back);
                $non_audit_file->tax_clearance    = json_encode($tax_clearance);
                $non_audit_file->permit_foreign= json_encode($permit_foreigns);
                $non_audit_file->financial_statement    = json_encode($financial_statement);
                // $non_audit_file->representative     = json_encode($representative);
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
                // $director_officer_non_audit->csc_no     = $request->dona_csc_no[$i];
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
                // foreign firm type
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

            //Student Info
            $std_info = StudentInfo::find($request->student_id);

            //invoice for non-audit
            $fees = \App\Membership::where('membership_name', '=', 'Non-Audit')->first(['form_fee', 'renew_fee_sole',
                                                                                    'renew_fee_partner','late_fee_within_jan_sole',
                                                                                    'late_fee_within_jan_partner','late_fee_feb_to_apr_sole',
                                                                                    'late_fee_feb_to_apr_partner','reconnect_fee_sole',
                                                                                    'reconnect_fee_partner','renew_fee']);


            //$invoice = Invoice::where('student_info_id',$request->student_id)->first();
            $invoice = New Invoice();
            $invoice->student_info_id = $request->student_id;
            if($request->offline_user == 1){
              $invoice->invoiceNo = 'off_non_audit_renew'.$acc_firm_info->id;
            }
            else{
              $invoice->invoiceNo = 'non_audit_renew'.$acc_firm_info->id;
            }

            $invoice->name_eng        = $acc_firm_info->accountancy_firm_name;
            $invoice->email           = $std_info->email;
            $invoice->phone           = $acc_firm_info->telephones;
            $invoice->status          = 0;
            $invoice->save();

            $current_year = date('Y');
            $current_month_name = date('M');
            $current_month = date('m');
            $last_registered_year = $request->last_registered_year;
            //$invoice->productDesc     = 'Non-Audit Application Fee, Renew Fee(per PAPP who will sign the audit report),Reconnect Fee';

            if($request->req_for_stop == 1){
              // suspended
              $suspended_year = $request->suspended_year;
              $number_of_reconnect_pay_year = $suspended_year - $last_registered_year - 1;
              if($request->org_stru_id == 1){
                // for Sole Proprietorship
                if($current_month_name == 'Jan'){
                  // within January
                  $delay_fee = $fees->late_fee_within_jan_sole;
                  $renew_fee = $fees->renew_fee_sole;
                  $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                }
                else if($current_month >= 2 && $current_month <= 4){
                  // from Feb to Apr
                  $delay_fee = $fees->late_fee_feb_to_apr_sole;
                  $renew_fee = $fees->renew_fee_sole;
                  $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                }
                else{
                  // not late
                  $renew_fee = $fees->renew_fee_sole;
                  $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Non-Audit Firm';
                }
              }
              else if($request->org_stru_id == 2 || $request->org_stru_id == 3 || $request->org_stru_id == 4){
                // for Partnership and Company
                if($current_month_name == 'Jan'){
                  // within January
                  $delay_fee = $fees->late_fee_within_jan_partner;
                  $renew_fee = $fees->renew_fee_partner;
                  $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                }
                else if($current_month >= 2 && $current_month <= 4){
                  // from Feb to Apr
                  $delay_fee = $fees->late_fee_feb_to_apr_partner;
                  $renew_fee = $fees->renew_fee_partner;
                  $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                }
                else{
                  // not  late
                  $renew_fee = $fees->renew_fee_partner;
                  $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Non-Audit Firm';
                }
              }
              else{
                ////
              }
            }
            else{
              // not suspended
              $last_registered_year = $request->last_registered_year;
              $number_of_reconnect_pay_year = $current_year - $last_registered_year - 1;
              if($request->org_stru_id == 1){
                // for Sole Proprietorship
                if($current_month_name == 'Jan'){
                  // within January
                  $delay_fee = $fees->late_fee_within_jan_sole;
                  $renew_fee = $fees->renew_fee_sole;
                  $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee, Delay Fee,Non-Audit Firm';
                }
                else if($current_month >= 2 && $current_month <= 4){
                  // from Feb to Apr
                  $delay_fee = $fees->late_fee_feb_to_apr_sole;
                  $renew_fee = $fees->renew_fee_sole;
                  $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                }
                else{
                  // not late
                  $renew_fee = $fees->renew_fee_sole;
                  $reconnect_fee = $fees->reconnect_fee_sole * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Non-Audit Firm';
                }
              }
              else if($request->org_stru_id == 2 || $request->org_stru_id == 3 || $request->org_stru_id == 4){
                // for Partnership and Company
                if($current_month_name == 'Jan'){
                  // within January
                  $delay_fee = $fees->late_fee_within_jan_partner;
                  $renew_fee = $fees->renew_fee_partner;
                  $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                }
                else if($current_month >= 2 && $current_month <= 4){
                  // from Feb to Apr
                  $delay_fee = $fees->late_fee_feb_to_apr_partner;
                  $renew_fee = $fees->renew_fee_partner;
                  $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee .','. $delay_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee, Reconnect Fee,Delay Fee,Non-Audit Firm';
                }
                else{
                  // not late
                  $renew_fee = $fees->renew_fee_partner;
                  $reconnect_fee = $fees->reconnect_fee_partner * $number_of_reconnect_pay_year;
                  $invoice->amount = $fees->form_fee .','. $renew_fee .','. $reconnect_fee;
                  $invoice->productDesc     = 'Non-Audit App Fee, Renew Fee,Reconnect Fee,Non-Audit Firm';
                }
              }
              else{
                ////
              }
            }
            $invoice->save();

        }

        return "success";
    }

    public function createOfflineUser(Request $request)
    {

      if($request->hasfile('ppa_certis'))
      {
          foreach($request->file('ppa_certis') as $file)
          {
              $name  = uniqid().'.'.$file->getClientOriginalExtension();
              $file->move(public_path().'/storage/acc_firm/',$name);
              $ppa_certi[] = '/storage/acc_firm/'.$name;
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
              $letterhead[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $letterhead = null;
      }

      if($request->hasfile('certi_or_regs'))
      {
          foreach($request->file('certi_or_regs') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $certi_or_reg[] = '/storage/acc_firm/'.$name;
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
          $deeds_memo[] = '/storage/acc_firm/'.$name;
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
          $certi_incor[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $certi_incor = null;
      }

      if($request->hasfile('tax_reg_certificate'))
      {
          foreach($request->file('tax_reg_certificate') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $tax_reg_certificate[] = '/storage/acc_firm/'.$name;
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
          $pass_photo[] = '/storage/acc_firm/'.$name;
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
          $edu_cert[] = '/storage/acc_firm/'.$name;
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
          $owner_profile[] = '/storage/acc_firm/'.$name;
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
          $work_exp[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $work_exp = null;
      }


      if($request->hasfile('nrc_passports_front'))
      {
          foreach($request->file('nrc_passports_front') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $nrc_passport_front[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $nrc_passport_front = null;
      }

      if($request->hasfile('nrc_passports_back'))
      {
          foreach($request->file('nrc_passports_back') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $nrc_passport_back[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $nrc_passport_back = null;
      }

      if($request->hasfile('tax_clearances'))
      {
          foreach($request->file('tax_clearances') as $file)
          {
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/acc_firm/',$name);
          $tax_clearance[] = '/storage/acc_firm/'.$name;
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
          $permit_foreigns[] ='/storage/acc_firm/'.$name;
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
          $financial_statement[] = '/storage/acc_firm/'.$name;
          }

      }else{
          $financial_statement = null;
      }

      // profile photo
      if ($request->hasfile('profile_photo')) {
          $file = $request->file('profile_photo');
          $name  = uniqid().'.'.$file->getClientOriginalExtension();
          $file->move(public_path().'/storage/student_info/',$name);
          $image = '/storage/student_info/'.$name;
      }

      $register_date = date('Y-m-d');

      $t_s_p_ary = array();
      foreach($request->t_s_p_id as $val){
        array_push($t_s_p_ary,$val);
      }

      //Main Table
      $acc_firm_info = new AccountancyFirmInformation();
      // $acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
      $acc_firm_info->accountancy_firm_reg_no =  $request->registration_no;
      $acc_firm_info->accountancy_firm_name   = $request->accountancy_firm_name;
      $acc_firm_info->head_office_address   = $request->head_office_address;
      $acc_firm_info->head_office_address_mm   = $request->head_office_address_mm;
      //$acc_firm_info->township                = $request->township;
      $acc_firm_info->postcode                = $request->post_code;
      //$acc_firm_info->city                    = $request->city;
      //$acc_firm_info->state_region            = $request->state;
      $acc_firm_info->telephones              = $request->phone_no;
      $acc_firm_info->h_email                 = $request->h_email;
      $acc_firm_info->website                 = $request->website;
      $acc_firm_info->audit_firm_type_id      = $request->audit_firm_type_id;
      //$acc_firm_info->local_foreign_id        = $request->local_foreign_id;
      $acc_firm_info->local_foreign_type        = $request->local_foreign_type;
      $acc_firm_info->organization_structure_id    = $request->org_stru_id;
      $acc_firm_info->type_of_service_provided_id  = json_encode($t_s_p_ary);
      $acc_firm_info->other  = $request->other;
      //name of sole_propietor == name of manager
      $acc_firm_info->name_of_sole_proprietor      = $request->name_sole_proprietor;
      if($request->dir_passport_csc){
        $acc_firm_info->dir_passport_csc = $request->dir_passport_csc;
      }
      $acc_firm_info->declaration                  = $request->declaration;
      $acc_firm_info->declaration_mm                  = $request->declaration_mm;
      $acc_firm_info->status   = 0;
      // $acc_firm_info->form_fee = $request->form_fee;
      // $acc_firm_info->nrc_fee  = $request->nrc_fee;
      $acc_firm_info->register_date  = $register_date;
      $acc_firm_info->image  = $image;
      $acc_firm_info->verify_status  = 0;
      $acc_firm_info->req_for_stop    = $request->req_for_stop;
      $acc_firm_info->last_registered_year    = $request->last_registered_year;
      $acc_firm_info->suspended_year    = $request->suspended_year;
      $acc_firm_info->offline_user    = true;
      $acc_firm_info->save();

      //Student Info
      $std_info = new StudentInfo();
      $std_info->accountancy_firm_info_id = $acc_firm_info->id;
      //$std_info->accountancy_firm_name = $acc_firm_info->accountancy_firm_name;
      $std_info->email            =   strtolower($request->email);
      $std_info->password         =   Hash::make($request->password);
      $std_info->verify_code      =   uniqid();
      // $data = array(
      //     'email' => 'macadmin@gmail.com',
      //     'verify_code' => $student_info['verify_code']
      // );
      // Mail::to($student_info['email'])->send(new ContactMail($data));
      // $std_info->verify_status    =   1;
      $std_info->save();

      $student_data = AccountancyFirmInformation::find($acc_firm_info->id);
      $student_data->student_info_id = $std_info->id;
      $student_data->save();

      //Branch Office
      if($request->bo_branch_name){
        for($i=0;$i<sizeof($request->bo_branch_name);$i++){
            $branch_office = new BranchOffice();
            $branch_office->branch_name = $request->bo_branch_name[$i];
            $branch_office->branch_address = $request->bo_address[$i];
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
      }

      if($request->audit_firm_type_id == 1)
      {
          // Audit Firm
          if($request->org_stru_id){
              $audit_file= new AuditFirmFile();
              $audit_file->accountancy_firm_info_id = $acc_firm_info->id;
              $audit_file->ppa_certificate    = json_encode($ppa_certi);
              $audit_file->letterhead        = json_encode($letterhead);
              $audit_file->tax_clearance    = json_encode($tax_clearance);
              // $audit_file->representative     = json_encode($representative);
              $audit_file->tax_reg_certificate= json_encode($tax_reg_certificate);
              $audit_file->deeds_memo        = json_encode($deeds_memo);
              $audit_file->certificate_incor    = json_encode($certi_incor);
              // $audit_file->form6_form26_form_e= json_encode($form6_26e);
              // $audit_file->form_a1           = json_encode($form_a1);
              $audit_file->certi_or_reg      = json_encode($certi_or_reg);
              $audit_file->save();

           }

          //Audit
          if($request->foa_name){
            for($i=0;$i<sizeof($request->foa_name);$i++){
                $firm_owner_audit = new FirmOwnershipAudit();
                $firm_owner_audit->name                     = $request->foa_name[$i];
                $firm_owner_audit->public_private_reg_no    = $request->foa_pub_pri_reg_no[$i];
                $firm_owner_audit->authority_to_sign        = $request->foa_authority_to_sign[$i];
                $firm_owner_audit->accountancy_firm_info_id = $acc_firm_info->id;
                $firm_owner_audit->save();
            }
          }

          if($request->do_name){
            for($i=0;$i<sizeof($request->do_name);$i++){
                $director_officer = new DirectorsOfficersAudit();
                $director_officer->name                     = $request->do_name[$i];
                $director_officer->position                 = $request->do_position[$i];
                $director_officer->cpa_reg_no               = $request->do_cpa_reg_no[$i];
                $director_officer->public_private_reg_no    = $request->do_pub_pri_reg_no[$i];
                $director_officer->accountancy_firm_info_id = $acc_firm_info->id;
                $director_officer->save();
            }
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
              $non_audit_file->nrc_passport_front     = json_encode($nrc_passport_front);
              $non_audit_file->nrc_passport_back      = json_encode($nrc_passport_back);
              $non_audit_file->tax_clearance    = json_encode($tax_clearance);
              $non_audit_file->permit_foreign= json_encode($permit_foreigns);
              $non_audit_file->financial_statement    = json_encode($financial_statement);
              // $non_audit_file->representative     = json_encode($representative);
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
              // $director_officer_non_audit->csc_no     = $request->dona_csc_no[$i];
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

          // for foreign firm type
          if($request->local_foreign_type == 2)
          {
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

    //check verify
    public function checkVerify($id,$firm_id)
    {
        $data = array();
        $acc_firm = AccountancyFirmInformation::where('student_info_id',$id)->latest()->first();

        //$audit_invoice_status = Invoice::where('invoiceNo','audit_initial'.$firm_id)->select('status')->get();
        $invoice_status = Invoice::where('invoiceNo','like','%'.$acc_firm->id)
                                  ->where('student_info_id',$id)
                                  ->select('status')->get();
        //$nonaudit_invoice_status = Invoice::where('invoiceNo','non_audit_initial'.$firm_id)->select('status')->get();

        array_push($data , ['acc_firm'=>$acc_firm,
                            // 'audit_invoice_status'=> $audit_invoice_status,
                            // 'nonaudit_invoice_status' => $nonaudit_invoice_status,
                            'invoice_status' => $invoice_status
                           ]);
        return response()->json($data,200);
    }

    public function nonAuditCheckVerify($id)
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

    public function FilterAuditRegistration($status,$firm_type){

      $acc_firm_info = AccountancyFirmInformation::with('accountancy_firm_invoices')
                                                  ->where('status','=',$status)
                                                  ->where('is_renew','=',0)
                                                  ->where('offline_user','=',0)
                                                  ->where('audit_firm_type_id','=',$firm_type)
                                                  ->get();
                                                  //dd($acc_firm_info);
      if($firm_type == 1){
        return DataTables::of($acc_firm_info)
          ->addColumn('action', function ($infos) {
              // return "<div class='btn-group'>
              //             <button type='button' class='btn btn-primary btn-xs' onclick='showAuditInfo($infos->id)'>
              //                 <li class='fa fa-eye fa-sm'></li>
              //             </button>

              //         </div>";
              //dd($infos->id);
              $invoice = Invoice::where('student_info_id',$infos->student_info_id)
                                ->where('invoiceNo','audit_initial'.$infos->id)
                                ->first('status');
              //dd($invoice);
              if($invoice){
                if($infos->status == 1 && $invoice->status == 'AP'){
                  return "<div class='btn-group'>
                    <button type='button' class='btn btn-primary btn-sm mr-3' onclick='showAuditInfo($infos->id)'>
                        <li class='fa fa-eye fa-sm'></li>
                    </button>

                    <a href='" . route('get_audit_card', ['id' => $infos->id]) . "' class='btn btn-primary btn-xs'>
                        <li class='fa fa-id-card-o fa-sm'></li>
                    </a>

                </div>";
                }else if($infos->status == 1 && $invoice->status != 'AP'){
                    return "<div class='btn-group'>
                      <button type='button' class='btn btn-primary btn-sm mr-3' onclick='showAuditInfo($infos->id)'>
                          <li class='fa fa-eye fa-sm'></li>
                      </button>

                  </div>";
                }else{
                  return "<div class='btn-group'>
                    <button type='button' class='btn btn-primary btn-sm mr-3' onclick='showAuditInfo($infos->id)'>
                        <li class='fa fa-eye fa-sm'></li>
                    </button>

                </div>";
                }
              }
              else{
                // if no invoice condition
                return "<div class='btn-group'>
                  <button type='button' class='btn btn-primary btn-sm mr-3' onclick='showAuditInfo($infos->id)'>
                      <li class='fa fa-eye fa-sm'></li>
                  </button>

              </div>";
              }

          })

          ->addColumn('accountancy_firm_reg_no', function ($infos){
              return $infos->accountancy_firm_reg_no;
          })

          ->addColumn('local_foreign_type', function ($infos){
            if($infos->local_foreign_type == 1){
              return "Local";
            }
            else{
              return "Foreign";
            }

          })

          ->addColumn('status', function ($infos){
              if($infos->status == 0){
                return "<span class='pending'>PENDING</span>";
              }
              else if($infos->status == 1){
                return "<span class='approve'>APPROVED</span>";
              }
              else{
                return "<span class='reject'>REJECTED</span>";
              }
          })

          ->addColumn('accountancy_firm_name', function ($infos){
              return $infos->accountancy_firm_name;
          })

          ->addColumn('payment_status', function ($infos){
            // if($infos->offline_user == 1){
            //   $invoice_status = Invoice::where('invoiceNo','off_audit_renew'.$infos->id)->select('status')->get();
            // }
            // else{
            //   $invoice_status = Invoice::where('invoiceNo','audit_initial'.$infos->id)->select('status')->get();
            // }

            $invoice_status = Invoice::where('invoiceNo','audit_initial'.$infos->id)->select('status')->get();

            foreach($invoice_status as $value){
              if($value->status == '0' ){
                return "<span class='pending'>Incomplete</span>";
              }
              else{
                return "<span class='approve'>Complete</span>";
              }
            }
          })

          ->addColumn('township', function ($infos){
              return $infos->township;
          })

          ->addColumn('postcode', function ($infos){
              return $infos->postcode;
          })

          ->addColumn('city', function ($infos){
              return $infos->city;
          })

          ->addColumn('state_region', function ($infos){
              return $infos->state_region;
          })

          ->addColumn('telephones', function ($infos){
              return $infos->telephones;
          })

          ->addColumn('h_email', function ($infos){
              return $infos->h_email;
          })

          ->addColumn('website', function ($infos){
              return $infos->website;
          })

          // ->addColumn('payment_status', function ($infos){
          //     return $infos->website;
          // })
          // ->addColumn('payment_date', function ($infos){
          //     return $infos->website;
          // })

          ->rawColumns(['action','local_foreign_type','accountancy_firm_reg_no','accountancy_firm_name','status','township','postcode','payment_status','city','state_region','telephones','h_email','website'])
          ->make(true);
      }
      else{
        // non-audit
        return DataTables::of($acc_firm_info)
          // ->addColumn('action', function ($infos) {
          //     return "<div class='btn-group'>
          //                 <a type='button' class='btn btn-primary btn-xs' href='show_non_audit_firm_info/$infos->id'>
          //                     <li class='fa fa-eye fa-sm'></li>
          //                 </a>

          //             </div>";
          // })

          ->addColumn('action', function ($infos) {
            $invoice = Invoice::where('student_info_id',$infos->student_info_id)->first('status');
            if($invoice){
              if($infos->local_foreign_type == 1 && $infos->status == 1){
                    if($infos->status == 1 && $invoice->status == 'AP') {
                        return "<div class='btn-group'>
                                      <a type='button' class='btn btn-primary btn-sm mr-3' href='show_non_audit_firm_info/$infos->id'>
                                      <li class='fa fa-eye fa-sm'></li>
                                      </a>
                                      <a href='" . route('get_non_audit_card', ['id' => $infos->id]) . "' class='btn btn-primary btn-xs'>
                                          <li class='fa fa-id-card-o fa-sm'></li>
                                      </a>

                                </div>";
                    }else if($infos->status == 1 && $invoice->status != 'AP'){
                        return "<div class='btn-group'>
                                      <a type='button' class='btn btn-primary btn-sm mr-3' href='show_non_audit_firm_info/$infos->id'>
                                      <li class='fa fa-eye fa-sm'></li>
                                      </a>

                                </div>";
                    }else{
                        return "<div class='btn-group'>
                                      <a type='button' class='btn btn-primary btn-sm mr-3' href='show_non_audit_firm_info/$infos->id'>
                                      <li class='fa fa-eye fa-sm'></li>
                                      </a>

                                </div>";
                    }
              }else if($infos->local_foreign_type == 2 && $infos->status == 1){
                     if($infos->status == 1 && $invoice->status == 'AP'){
                        return "<div class='btn-group'>
                                  <a type='button' class='btn btn-primary btn-sm mr-3' href='show_non_audit_firm_info/$infos->id'>
                                  <li class='fa fa-eye fa-sm'></li>
                                  </a>
                                  <a href='" . route('get_non_audit_foreign_card', ['id' => $infos->id]) . "' class='btn btn-primary btn-xs'>
                                      <li class='fa fa-id-card-o fa-sm'></li>
                                  </a>

                            </div>";
                        }else if($infos->status == 1 && $invoice->status != 'AP'){
                            return "<div class='btn-group'>
                                  <a type='button' class='btn btn-primary btn-sm mr-3' href='show_non_audit_firm_info/$infos->id'>
                                  <li class='fa fa-eye fa-sm'></li>
                                  </a>

                            </div>";
                        }else{
                           return "<div class='btn-group'>
                                  <a type='button' class='btn btn-primary btn-sm mr-3' href='show_non_audit_firm_info/$infos->id'>
                                  <li class='fa fa-eye fa-sm'></li>
                                  </a>

                            </div>";
                        }

              }  else{
                return "<div class='btn-group'>
                              <a type='button' class='btn btn-primary btn-sm mr-3' href='show_non_audit_firm_info/$infos->id'>
                              <li class='fa fa-eye fa-sm'></li>
                              </a>

                        </div>";
              }
            }
            else{
              // if no invoice condition
              return "<div class='btn-group'>
                            <a type='button' class='btn btn-primary btn-sm mr-3' href='show_non_audit_firm_info/$infos->id'>
                            <li class='fa fa-eye fa-sm'></li>
                            </a>

                      </div>";
            }

          })

          ->addColumn('local_foreign_type', function ($infos){
              if($infos->local_foreign_type == 1){
                return "Local";
              }else{
                return "Foreign";
              }
          })

          ->addColumn('accountancy_firm_reg_no', function ($infos){
              return $infos->accountancy_firm_reg_no;
          })

          ->addColumn('status', function ($infos){
              if($infos->status == 0){
                return "<span class='pending'>PENDING</span>";
              }
              else if($infos->status == 1){
                return "<span class='approve'>APPROVED</span>";
              }
              else{
                return "<span class='reject'>REJECTED</span>";
              }
          })

          ->addColumn('accountancy_firm_name', function ($infos){
              return $infos->accountancy_firm_name;
          })

          ->addColumn('payment_status', function ($infos){
            // if($infos->offline_user == 1){
            //   $invoice_status = Invoice::where('invoiceNo','off_non_audit_renew'.$infos->id)->select('status')->get();
            // }
            // else{
            //   $invoice_status = Invoice::where('invoiceNo','non_audit_initial'.$infos->id)->select('status')->get();
            // }

            $invoice_status = Invoice::where('invoiceNo','non_audit_initial'.$infos->id)->select('status')->get();
            foreach($invoice_status as $value){
              if($value->status == '0' ){
                return "<span class='pending'>Incomplete</span>";
              }
              else{
                return "<span class='approve'>Complete</span>";
              }
            }
          })

          ->addColumn('township', function ($infos){
              return $infos->township;
          })

          ->addColumn('postcode', function ($infos){
              return $infos->postcode;
          })

          ->addColumn('city', function ($infos){
              return $infos->city;
          })

          ->addColumn('state_region', function ($infos){
              return $infos->state_region;
          })

          ->addColumn('telephones', function ($infos){
              return $infos->telephones;
          })

          ->addColumn('h_email', function ($infos){
              return $infos->h_email;
          })

          ->addColumn('website', function ($infos){
              return $infos->website;
          })

          ->rawColumns(['action','local_foreign_type','accountancy_firm_reg_no','accountancy_firm_name','status','township','postcode','city','state_region','payment_status','telephones','h_email','website'])
          ->make(true);
      }
    }

    public function FilterAuditRegistrationRenew($status,$firm_type){
      $acc_firm_info = AccountancyFirmInformation::where('status','=',$status)
                                                  ->where('is_renew','=',1)
                                                  //->orWhere('offline_user', '1')
                                                  ->where('audit_firm_type_id','=',$firm_type)
                                                  ->get();

      if($firm_type == 1){
        return DataTables::of($acc_firm_info)
          ->addColumn('action', function ($infos) {
              return "<div class='btn-group'>
                          <button type='button' class='btn btn-primary btn-xs' onclick='showAuditInfo($infos->id)'>
                              <li class='fa fa-eye fa-sm'></li>
                          </button>

                      </div>";
          })

          ->addColumn('accountancy_firm_reg_no', function ($infos){
              return $infos->accountancy_firm_reg_no;
          })

          ->addColumn('local_foreign_type', function ($infos){
            if($infos->local_foreign_type == 1){
              return "Local";
            }
            else{
              return "Foreign";
            }

          })

          ->addColumn('status', function ($infos){
              if($infos->status == 0){
                return "<span class='pending'>PENDING</span>";
              }
              else if($infos->status == 1){
                return "<span class='approve'>APPROVED</span>";
              }
              else{
                return "<span class='reject'>REJECTED</span>";
              }
          })

          ->addColumn('accountancy_firm_name', function ($infos){
              return $infos->accountancy_firm_name;
          })

          ->addColumn('payment_status', function ($infos){
            if($infos->offline_user == 1){
              $invoice_status = Invoice::where('invoiceNo','off_audit_renew'.$infos->id)->select('status')->get();
            }
            else{
              $invoice_status = Invoice::where('invoiceNo','audit_renew'.$infos->id)->select('status')->get();
            }

            foreach($invoice_status as $value){
              if($value->status == '0' ){
                return "<span class='pending'>Incomplete</span>";
              }
              else{
                return "<span class='approve'>Complete</span>";
              }
            }
          })

          ->addColumn('township', function ($infos){
              return $infos->township;
          })

          ->addColumn('postcode', function ($infos){
              return $infos->postcode;
          })

          ->addColumn('city', function ($infos){
              return $infos->city;
          })

          ->addColumn('state_region', function ($infos){
              return $infos->state_region;
          })

          ->addColumn('telephones', function ($infos){
              return $infos->telephones;
          })

          ->addColumn('h_email', function ($infos){
              return $infos->h_email;
          })

          ->addColumn('website', function ($infos){
              return $infos->website;
          })


          ->rawColumns(['action','local_foreign_type','accountancy_firm_reg_no','accountancy_firm_name','status','township','postcode','city','state_region','telephones','h_email','website','payment_status'])
          ->make(true);
      }
      else{
        return DataTables::of($acc_firm_info)
          ->addColumn('action', function ($infos) {
              return "<div class='btn-group'>
                          <a type='button' class='btn btn-primary btn-xs' href='show_non_audit_firm_info/$infos->id'>
                              <li class='fa fa-eye fa-sm'></li>
                          </a>

                      </div>";
          })

          ->addColumn('accountancy_firm_reg_no', function ($infos){
              return $infos->accountancy_firm_reg_no;
          })

          ->addColumn('local_foreign_type', function ($infos){
            if($infos->local_foreign_type == 1){
              return "Local";
            }
            else{
              return "Foreign";
            }

          })

          ->addColumn('status', function ($infos){
              if($infos->status == 0){
                return "<span class='pending'>PENDING</span>";
              }
              else if($infos->status == 1){
                return "<span class='approve'>APPROVED</span>";
              }
              else{
                return "<span class='reject'>REJECTED</span>";
              }
          })

          ->addColumn('accountancy_firm_name', function ($infos){
              return $infos->accountancy_firm_name;
          })

          ->addColumn('payment_status', function ($infos){
            if($infos->offline_user == 1){
              $invoice_status = Invoice::where('invoiceNo','off_non_audit_renew'.$infos->id)->select('status')->get();
            }
            else{
              $invoice_status = Invoice::where('invoiceNo','non_audit_renew'.$infos->id)->select('status')->get();
            }
            foreach($invoice_status as $value){
              if($value->status == '0' ){
                return "<span class='pending'>Incomplete</span>";
              }
              else{
                return "<span class='approve'>Complete</span>";
              }
            }
          })

          ->addColumn('township', function ($infos){
              return $infos->township;
          })

          ->addColumn('postcode', function ($infos){
              return $infos->postcode;
          })

          ->addColumn('city', function ($infos){
              return $infos->city;
          })

          ->addColumn('state_region', function ($infos){
              return $infos->state_region;
          })

          ->addColumn('telephones', function ($infos){
              return $infos->telephones;
          })

          ->addColumn('h_email', function ($infos){
              return $infos->h_email;
          })

          ->addColumn('website', function ($infos){
              return $infos->website;
          })

          ->rawColumns(['action','local_foreign_type','accountancy_firm_reg_no','accountancy_firm_name','status','township','postcode','city','state_region','telephones','h_email','website','payment_status'])
          ->make(true);
      }
    }

    public function FilterOfflineRegistration($status,$firm_type){
      $acc_firm_info = AccountancyFirmInformation::where('status','=',$status)
                                                  ->where('offline_user','=',1)
                                                  ->where('is_renew','=',0)
                                                  ->where('audit_firm_type_id','=',$firm_type)
                                                  ->get();

      if($firm_type == 1){
        return DataTables::of($acc_firm_info)
          ->addColumn('action', function ($infos) {
              return "<div class='btn-group'>
                          <button type='button' class='btn btn-primary btn-xs' onclick='showReconnectAuditInfo($infos->id)'>
                              <li class='fa fa-eye fa-sm'></li>
                          </button>

                      </div>";
          })

          ->addColumn('accountancy_firm_name', function ($infos){
              return $infos->accountancy_firm_name;
          })

          ->addColumn('email', function ($infos){
              return $infos->h_email;
          })

          ->addColumn('accountancy_firm_reg_no', function ($infos){
              return $infos->accountancy_firm_reg_no;
          })

          ->addColumn('phone', function ($infos){
              return $infos->telephones;
          })

          ->addColumn('status', function ($infos){
              if($infos->status == 0){
                return "<span class='pending'>PENDING</span>";
              }
              else if($infos->status == 1){
                return "<span class='approve'>APPROVED</span>";
              }
              else{
                return "<span class='reject'>REJECTED</span>";
              }
          })

          ->rawColumns(['action','accountancy_firm_reg_no','accountancy_firm_name','status','email','phone'])
          ->make(true);
      }
      else{
        return DataTables::of($acc_firm_info)
        ->addColumn('action', function ($infos) {
            return "<div class='btn-group'>
                        <a type='button' class='btn btn-primary btn-xs' href='show_non_audit_reconnect_info/$infos->id'>
                            <li class='fa fa-eye fa-sm'></li>
                        </a>

                    </div>";
        })

          ->addColumn('accountancy_firm_name', function ($infos){
              return $infos->accountancy_firm_name;
          })

          ->addColumn('email', function ($infos){
              return $infos->h_email;
          })

          ->addColumn('accountancy_firm_reg_no', function ($infos){
              return $infos->accountancy_firm_reg_no;
          })

          ->addColumn('phone', function ($infos){
              return $infos->telephones;
          })

          ->addColumn('status', function ($infos){
              if($infos->status == 0){
                return "<span class='pending'>PENDING</span>";
              }
              else if($infos->status == 1){
                return "<span class='approve'>APPROVED</span>";
              }
              else{
                return "<span class='reject'>REJECTED</span>";
              }
          })

          ->rawColumns(['action','accountancy_firm_reg_no','accountancy_firm_name','status','email','phone'])
          ->make(true);
      }
    }

    public function check_payment($id)
    {
        $data = StudentInfo::where('id',$id)->get();
        return response()->json($data,200);
    }

    public function approvePayment($id)
    {
        $std_info = StudentInfo::find($id) ;
        $std_info->payment_method = 'CASH';
        $std_info->save();
        return response()->json([
            'data' => $std_info,
        ],200);
    }

    public function checkPAPP($reg_no,$status)
    {

      $papp = Papp::where('papp_reg_no',$reg_no)
                  ->with('student_info','student_job', 'student_education_histroy','student_register')
                  ->get();

      // foreach($papp as $pa){
      //   $pa_id = $pa->id;
      //   $invoice = Invoice::pluck("invoiceNo");
      //   if($invoice){
      //       foreach($invoice as $val){
      //         $pattern = $val;
      //         $find_word = $pa_id;
      //         preg_match($pattern, $find_word, $matches, PREG_OFFSET_CAPTURE);
      //         dd($matches);
      //       }
      //   }
      // }

      return response()->json([
          'data'  => $papp
      ]);
    }


}
