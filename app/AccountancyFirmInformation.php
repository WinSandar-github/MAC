<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountancyFirmInformation extends Model
{
    protected $fillable = ['audit_firm_type_id','accountancy_frim_reg_no',
    'accountancy_firm_name','township','postcode','state_region','telephones','h_email',
    'website','managing_director','organization_structure_id','name_of_sole_proprietor',
    'type_of_service_provided_id','other','permanent_suspension','status','form_fee','nrc_fee','register_date','verify_status'];

    public function service_provided()
    {
        return $this->belongsTo(TypeOfServiceProvided::class,'type_of_service_provided_id','id');
    }

    public function organization_structure()
    {
        return $this->belongsTo(OrganizationStructure::class);
    }


    public function branch_offices()
    {
        return $this->hasMany(BranchOffice::class,'accountancy_firm_info_id','id');
    }

    //audit
    public function firm_owner_audits()
    {
        return $this->hasMany(FirmOwnershipAudit::class,'accountancy_firm_info_id','id');
    }

    public function director_officer_audits()
    {
        return $this->hasMany(DirectorsOfficersAudit::class,'accountancy_firm_info_id','id');
    }

    public function audit_staffs()
    {
        return $this->hasMany(AuditStaff::class,'accountancy_firm_info_id','id');
    }

    public function audit_total_staffs()
    {
        return $this->hasMany(AuditTotalStaff::class,'accountancy_firm_info_id','id');
    }

    //non audit
    public function firm_owner_non_audits()
    {
        return $this->hasMany(FirmOwnershipNonAudit::class,'accountancy_firm_info_id','id');
    }

    public function director_officer_non_audits()
    {
        return $this->hasMany(DirectorsOfficersNonAudit::class,'accountancy_firm_info_id','id');
    }

    public function non_audit_total_staffs()
    {
        return $this->hasMany(NonAuditTotalStaff::class,'accountancy_firm_info_id','id');
    }

    public function my_cpa_foreigns()
    {
        return $this->hasMany(MyanmarCpaNonAuditForeign::class,'accountancy_firm_info_id','id');
    }

    public function audit_firm_file()
    {
        return $this->hasMany(AuditFirmFile::class,'accountancy_firm_info_id','id');
    }

    public function non_audit_firm_file()
    {
        return $this->hasMany(NonAuditFirmFile::class,'accountancy_firm_info_id','id');
    }

    // public function student_infos()
    // {
    //     return $this->belongsTo(StudentInfo::class,'id','id');
    // }
}
