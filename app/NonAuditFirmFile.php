<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NonAuditFirmFile extends Model
{
    protected $filable = ['accountancy_firm_info_id','letter_head','passport_photo','owner_profile','education_certificate','work_exp','nrc_passport','tax_clearance','permit_foreign','financial_statement','representative','certi_or_reg','deeds_memo','certificate_incor','tax_reg_certificate'];

}
