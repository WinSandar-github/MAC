<?php
use App\CPAFF;
use App\Papp;
use App\AccountancyFirmInformation;

function generateCpaffNo($id){
    $old = CPAFF::where('is_renew',0)->orderBy('cpaff_reg_no', 'desc')->first();
    // return $old->cpaff_reg_no;
    if($old->cpaff_reg_no == '' && $old->cpaff_reg_no == NULL){
        $reg_no = 1129;
    }else{
        $reg_no = $old->cpaff_reg_no +1;
    }
    $cpaff = CPAFF::find($id);
    $cpaff->cpaff_reg_no = $reg_no;
    $cpaff->reg_date     = date('Y-m-d');
    $cpaff->save();
}

function generateCpaffPaymentDate($id){
    $cpaff = CPAFF::find($id);
    $cpaff->reg_date = date('Y-m-d');
    $cpaff->save();
}

function generatePappNo($id){
    $old = Papp::where('type',0)->orderBy('papp_reg_no', 'desc')->first();
        // return $old->cpaff_reg_no;
    if($old->papp_reg_no == '' && $old->papp_reg_no == NULL){
        $reg_no = 1445;
    }else{
        $reg_no = $old->papp_reg_no +1;
    }
    $papp = Papp::find($id);
    $papp->papp_reg_no   = $reg_no;
    $papp->reg_date = date('Y-m-d');
    $papp->save();
}

function generatePappPaymentDate($id){
    $papp = Papp::find($id);
    $papp->reg_date = date('Y-m-d');
    $papp->save();
}

function generateNonAuditNo($id){
    $org_stru_id = AccountancyFirmInformation::where('id',$id)->first();
    $local_foreign = AccountancyFirmInformation::where('id',$id)->get('local_foreign_type');
    // return $local_foreign[0]->local_foreign_type;
    if($local_foreign[0]->local_foreign_type == 1){
        switch ($org_stru_id->organization_structure_id) {
            case '1':
                $old = AccountancyFirmInformation::where('local_foreign_type',1)->where('organization_structure_id',1)->where('is_renew',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();
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
                $old = AccountancyFirmInformation::where('local_foreign_type',1)->where('organization_structure_id',2)->where('is_renew',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

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
                $old = AccountancyFirmInformation::where('local_foreign_type',1)->where('organization_structure_id',3)->where('is_renew',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

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
        $old = AccountancyFirmInformation::where('local_foreign_type',2)->where('is_renew',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

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

    $non_audit = AccountancyFirmInformation::find($id);
    $non_audit->accountancy_firm_reg_no = $reg_no;
    $non_audit->register_date = date('Y-m-d');
    $non_audit->save();
}

function generateAuditNo($id){
    $std_info = StudentInfo::where('accountancy_firm_info_id', $id)->first();

    $org_stru_id = AccountancyFirmInformation::where('id',$id)->get('organization_structure_id');
    switch ($org_stru_id[0]->organization_structure_id) {
        case '1':
            $old = AccountancyFirmInformation::where('organization_structure_id',1)->where('is_renew',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

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
            $old = AccountancyFirmInformation::where('organization_structure_id',2)->where('is_renew',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

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
            $old = AccountancyFirmInformation::where('organization_structure_id',3)->where('is_renew',0)->orderBy('accountancy_firm_reg_no', 'desc')->first();

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

    $audit = AccountancyFirmInformation::find($id);
    $audit->accountancy_firm_reg_no = $reg_no;
    $audit->register_date = date('Y-m-d');
    $audit->save();
}

function getLastOneYearCpd($id,$year){
    // LAST ONE YEAR
    $fmonth_initial = 1;
    $tmonth_initial = 12;
    $fday_initial = 1;
    $tday_initial = 31; 

    $fmonth_renewal = 1;//
    $tmonth_renewal = 12;
    $fday_renewal = 11;//
    $tday_renewal = 31; //

    $y = $year - 1;
    $last_one_year = $year - 2;
    $fdate_initial_last_one_year = strftime("%F", strtotime($y."-".$fmonth_initial."-".$fday_initial));
    $tdate_initial_last_one_year = strftime("%F", strtotime($y."-".$tmonth_initial."-".$tday_initial));

    $fdate_renewal_last_one_year = strftime("%F", strtotime($last_one_year."-".$fmonth_renewal."-".$fday_renewal));
    $tdate_renewal_last_one_year = strftime("%F", strtotime($y."-".$tmonth_renewal."-".$tday_renewal));

    $cpd_last_one_year = CPAFF::where('student_info_id', $id)
                ->whereBetween('reg_date', [$fdate_initial_last_one_year, $tdate_initial_last_one_year])
                ->whereBetween('reg_date', [$fdate_renewal_last_one_year, $tdate_renewal_last_one_year])
                ->get('total_hours');
    return $cpd_last_one_year;
}

function getLastTwoYearCpd($id,$year){
    // LAST ONE YEAR
    $fmonth_initial = 1;
    $tmonth_initial = 12;
    $fday_initial = 1;
    $tday_initial = 31; 

    $fmonth_renewal = 1;//
    $tmonth_renewal = 12;
    $fday_renewal = 11;//
    $tday_renewal = 31; //

    $y = $year - 2;
    $last_two_year = $year - 3;
    $fdate_initial_last_two_year = strftime("%F", strtotime($y."-".$fmonth_initial."-".$fday_initial));
    $tdate_initial_last_two_year = strftime("%F", strtotime($y."-".$tmonth_initial."-".$tday_initial));

    $fdate_renewal_last_two_year = strftime("%F", strtotime($last_two_year."-".$fmonth_renewal."-".$fday_renewal));
    $tdate_renewal_last_two_year = strftime("%F", strtotime($y."-".$tmonth_renewal."-".$tday_renewal));

    $cpd_last_two_year = CPAFF::where('student_info_id', $id)
                ->whereBetween('reg_date', [$fdate_initial_last_two_year, $tdate_initial_last_two_year])
                ->whereBetween('reg_date', [$fdate_renewal_last_two_year, $tdate_renewal_last_two_year])
                ->get('total_hours');
    return $cpd_last_two_year;
}

function getPappLastOneYearCpd($id,$year){
    // LAST ONE YEAR
    $fmonth_initial = 1;
    $tmonth_initial = 12;
    $fday_initial = 1;
    $tday_initial = 31; 

    $fmonth_renewal = 1;//
    $tmonth_renewal = 12;
    $fday_renewal = 11;//
    $tday_renewal = 31; //

    $y = $year - 1;
    $last_one_year = $year - 2;
    $fdate_initial_last_one_year = strftime("%F", strtotime($y."-".$fmonth_initial."-".$fday_initial));
    $tdate_initial_last_one_year = strftime("%F", strtotime($y."-".$tmonth_initial."-".$tday_initial));

    $fdate_renewal_last_one_year = strftime("%F", strtotime($last_one_year."-".$fmonth_renewal."-".$fday_renewal));
    $tdate_renewal_last_one_year = strftime("%F", strtotime($y."-".$tmonth_renewal."-".$tday_renewal));

    $cpd_last_one_year = Papp::where('student_id', $id)
                ->whereBetween('reg_date', [$fdate_initial_last_one_year, $tdate_initial_last_one_year])
                ->whereBetween('reg_date', [$fdate_renewal_last_one_year, $tdate_renewal_last_one_year])
                ->get('cpd_hours');
    return $cpd_last_one_year;
}

function getPappLastTwoYearCpd($id,$year){
    // LAST ONE YEAR
    $fmonth_initial = 1;
    $tmonth_initial = 12;
    $fday_initial = 1;
    $tday_initial = 31; 

    $fmonth_renewal = 1;//
    $tmonth_renewal = 12;
    $fday_renewal = 11;//
    $tday_renewal = 31; //

    $y = $year - 2;
    $last_two_year = $year - 3;
    $fdate_initial_last_two_year = strftime("%F", strtotime($y."-".$fmonth_initial."-".$fday_initial));
    $tdate_initial_last_two_year = strftime("%F", strtotime($y."-".$tmonth_initial."-".$tday_initial));

    $fdate_renewal_last_two_year = strftime("%F", strtotime($last_two_year."-".$fmonth_renewal."-".$fday_renewal));
    $tdate_renewal_last_two_year = strftime("%F", strtotime($y."-".$tmonth_renewal."-".$tday_renewal));

    $cpd_last_two_year = Papp::where('student_id', $id)
                ->whereBetween('reg_date', [$fdate_initial_last_two_year, $tdate_initial_last_two_year])
                ->whereBetween('reg_date', [$fdate_renewal_last_two_year, $tdate_renewal_last_two_year])
                ->get('cpd_hours');
    return $cpd_last_two_year;
}