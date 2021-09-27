<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AccountancyFirmInformation;
use App\BranchOffice;
use App\FirmOwnershipNonAudit;
use App\DirectorsOfficersNonAudit;
use Illuminate\Support\Facades\Storage;
use App\NonAuditTotalStaff;
use App\NonAuditTotalStaffType;
use App\MyanmarCpaNonAuditForeign;
use App\TypeOfServiceProvided;
use App\AuditStaff;
use App\Declaration;
use App\NonAuditFirmFile;
use App\StudentInfo;
use App\OrganizationStructure;

class ShowNonAuditFirmInfoController extends Controller
{
  public function showNonAuditFirmInfo($id)
  {
    $data = AccountancyFirmInformation::where('id',$id)->get();
    $branch_offices = BranchOffice::where('accountancy_firm_info_id',$id)->get();
    $firm_ownership = FirmOwnershipNonAudit::where('accountancy_firm_info_id',$id)->get();
    $directors_officers = DirectorsOfficersNonAudit::where('accountancy_firm_info_id',$id)->get();
    $total_staff = NonAuditTotalStaff::where('accountancy_firm_info_id',$id)->get();
    $total_staff_type = NonAuditTotalStaffType::all();
    $attach_files = NonAuditFirmFile::where('accountancy_firm_info_id',$id)->get();
    $organization_structure = OrganizationStructure::get();
    $service_provided = TypeOfServiceProvided::where('audit_firm_type_id','2')->get();
    $myn_cpa_foreign = MyanmarCpaNonAuditForeign::where('accountancy_firm_info_id',$id)->get();

    return view('pages.audit_firm.non-audit-firm-show_info',compact('data',
                                                            'branch_offices',
                                                            'firm_ownership',
                                                            'directors_officers',
                                                            'total_staff',
                                                            'total_staff_type',
                                                            'attach_files',
                                                            'organization_structure',
                                                            'service_provided',
                                                            'myn_cpa_foreign'
                                                            ));
  }
}
