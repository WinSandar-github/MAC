<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfServiceProvided extends Model
{
    protected $fillable = ['name','audit_firm_type_id'];

    public function audit_firm_type()
    {
        return $this->belongsTo(AuditFirmType::class,'audit_firm_type_id','id');
    }
}
