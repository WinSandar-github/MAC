<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountancyFirmInformation;

class nonAuditFirmShowInfoController extends Controller
{
  public function showNonAuditFirmInfo($id)
  {
    $data = AccountancyFirmInformation::where('id',$id)->with('branch_offices','firm_owner_audits','director_officer_audits','audit_staffs','audit_total_staffs',
    'firm_owner_non_audits','director_officer_non_audits','non_audit_total_staffs','my_cpa_foreigns','audit_firm_file','non_audit_firm_file')->get();

    return view('pages.audit_firm.non-audit-firm-show_info',compact('data'));
  }
}
