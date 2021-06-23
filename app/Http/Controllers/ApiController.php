<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AuditFirmType;
use App\AuditStaffType;
use App\AuditTotalStaffType;
use App\TrainingGround;
use App\EducationLevel;
use App\LocalForeign;
use App\Module;
use App\NonAuditTotalStaffType;
use App\OrganizationStructure;
use App\TypeOfServiceProvided;

class ApiController extends Controller
{
    public function audit_firm_type(){
        $audit_firm_type = AuditFirmType::get();
        return  response()->json([
            'data' => $audit_firm_type
        ],200);
    }

    public function audit_staff_type(){
        $audit_staff_type = AuditStaffType::get();
        return  response()->json([
            'data' => $audit_staff_type
        ],200);
    }

    public function audit_total_staff_type(){
        $audit__total_staff_type = AuditTotalStaffType::get();
        return  response()->json([
            'data' => $audit__total_staff_type
        ],200);
    }

    public function cpa_one_training_ground(){
        $training_ground = TrainingGround::get();
        return  response()->json([
            'data' => $training_ground
        ],200);
    }

    public function education_level(){
        $education_level = EducationLevel::get();
        return  response()->json([
            'data' => $education_level
        ],200);
    }

    public function local_foreign(){
        $local_foreign = LocalForeign::get();
        return  response()->json([
            'data' => $local_foreign
        ],200);
    }

    public function module(){
        $module = Module::get();
        return  response()->json([
            'data' => $module
        ],200);
    }

    public function non_audit_total_staff(){
         $non_audit_total_staff = NonAuditTotalStaffType::get();
        return  response()->json([
            'data' => $non_audit_total_staff
        ],200);
    }

    public function organization_structure(){
        $organization_structure = OrganizationStructure::get();
        return  response()->json([
            'data' => $organization_structure
        ],200);
    }

    public function type_service_provided(){
        $type_service_provided = TypeOfServiceProvided::get();
        return  response()->json([
            'data' => $type_service_provided
        ],200);
    }
}
