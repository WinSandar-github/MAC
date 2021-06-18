<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountancyFirmInformation;
use App\BranchOffice;
use App\FirmOwnershipAudit;
use App\FirmOwnershipNonAudit;
use App\DirectorsOfficersAudit;
use App\DirectorsOfficersNonAudit;

use App\AuditTotalStaff;
use App\NonAuditTotalStaff;
use App\MyanmarCpaNonAuditForeign;
use App\AuditStaff;
use App\Declaration;
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
        'firm_owner_non_audits','director_officer_non_audits','non_audit_total_staffs','my_cpa_foreigns')->get();
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Main Table
        $acc_firm_info = new AccountancyFirmInformation();
        $acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        $acc_firm_info->accountancy_firm_name   = $request->accountancy_firm_name;
        $acc_firm_info->township                = $request->township;
        $acc_firm_info->postcode                = $request->post_code;
        $acc_firm_info->city                    = $request->city;
        $acc_firm_info->state_region            = $request->state;
        $acc_firm_info->telephones              = $request->phone_no;
        $acc_firm_info->email                   = $request->email;
        $acc_firm_info->website                 = $request->website;
        $acc_firm_info->audit_firm_type_id      = $request->audit_firm_type_id; 
        $acc_firm_info->local_foreign_id        = $request->local_foreign_id;
        $acc_firm_info->organization_structure_id    = $request->org_stru_id;
        $acc_firm_info->type_of_service_provided_id  = $request->t_s_p_id;
        //name of sole_propietor == name of manager
        $acc_firm_info->name_of_sole_proprietor      = $request->name_sole_proprietor;
        $acc_firm_info->declaration                  = $request->declaration;   
        $acc_firm_info->save();

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

            if($request->local_foreign_id == 2){
                //Myanmar cpa non audit foreigns
                for($i=0;$i<sizeof($request->nats_total);$i++){
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
            'message' => "Added Successfully"
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
        $acc_firm_info = AccountancyFirmInformation::where('id',$id)->with('branch_offices','firm_owner_audits','director_officer_audits','audit_staffs','audit_total_staffs',
        'firm_owner_non_audits','director_officer_non_audits','non_audit_total_staffs','my_cpa_foreigns')->get();
        return response()->json([
            'data' => $acc_firm_info
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
        $acc_firm_info = AccountancyFirmInformation::find($id);
        $acc_firm_info->accountancy_firm_reg_no = $request->accountancy_firm_reg_no;
        $acc_firm_info->accountancy_firm_name   = $request->accountancy_firm_name;
        $acc_firm_info->township                = $request->township;
        $acc_firm_info->postcode                = $request->post_code;
        $acc_firm_info->city                    = $request->city;
        $acc_firm_info->state_region            = $request->state;
        $acc_firm_info->telephones              = $request->phone_no;
        $acc_firm_info->email                   = $request->email;
        $acc_firm_info->website                 = $request->website;
        $acc_firm_info->audit_firm_type_id      = $request->audit_firm_type_id; 
        $acc_firm_info->local_foreign_id        = $request->local_foreign_id;
        $acc_firm_info->organization_structure_id    = $request->org_stru_id;
        $acc_firm_info->type_of_service_provided_id  = $request->t_s_p_id;
        //name of sole_propietor == name of manager
        $acc_firm_info->name_of_sole_proprietor      = $request->name_sole_proprietor;
        $acc_firm_info->declaration                  = $request->declaration;   
        $acc_firm_info->save();

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
            if($request->local_foreign_id == 2){
                //Myanmar cpa non audit foreigns
                for($i=0;$i<sizeof($request->nats_total);$i++){
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
        BranchOffice::where('accountancy_firm_info_id',$id)->delete();

        if($acc_firm_info->audit_firm_type_id == 1){
            FirmOwnershipAudit::where('accountancy_firm_info_id',$id)->delete();
            DirectorsOfficersAudit::where('accountancy_firm_info_id',$id)->delete();
            AuditStaff::where('accountancy_firm_info_id',$id)->delete();
            AuditTotalStaff::where('accountancy_firm_info_id',$id)->delete();
        }else{
            FirmOwnershipNonAudit::where('accountancy_firm_info_id',$id)->delete();
            DirectorsOfficersNonAudit::where('accountancy_firm_info_id',$id)->delete();
             NonAuditTotalStaff::where('accountancy_firm_info_id',$id)->delete();
            if($acc_firm_info->local_foreign_id == 2){
                NonAuditTotalStaff::where('accountancy_firm_info_id',$id)->delete(); 
            }
        }
         
        $acc_firm_info->delete();
        return "Delete Successfully";
    }
}
