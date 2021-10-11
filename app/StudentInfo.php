<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $fillable = ['name_mm','name_eng','nrc_state_region','nrc_township','nrc_citizen','nrc_number','nrc_front','nrc_back','father_name_mm','father_name_eng','race','religion',
    'date_of_birth','address','current_address','phone','gov_staff','image','registration_no','date','approve_reject_status','email','password','accountancy_firm_info_id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student_job()
    {
        return $this->hasOne(StudentJobHistroy::class,'student_info_id','id')
            ->withDefault(['name' => 'N/A', 'position' => 'N/A', 'department' => 'N/A', 'organization' => 'N/A', 'company_name' => 'N/A', 'salary' => 'N/A', 'office_address' => 'N/A']);
    }

    public function student_education_histroy()
    {
        return $this->hasOne(EducationHistroy::class,'student_info_id','id')
            ->withDefault(['university_name' => 'N/A', 'degree_name' => 'N/A', 'qualified_date' => 'N/A', 'roll_number' => 'N/A', 'certificate' => array() ]);
    }

    public function student_course()
    {
        return $this->hasOne(StudentCourseReg::class,'student_info_id','id')->with('batch');
    }

    public function student_self_study()
    {
        return $this->hasOne(registration_self_study::class,'student_info_id','id');
    }

    public function student_private_school()
    {
        return $this->hasOne(registration_private_school::class,'student_info_id','id');
    }

    public function student_mac()
    {
        return $this->hasOne(registration_mac::class,'student_info_id','id');
    }

    public function student_register()
    {
        return $this->hasMany(StudentRegister::class,'student_info_id','id')->with('course');
    }

    public function current_register()
    {
        return $this->hasOne(StudentRegister::class,'student_info_id','id');
    }
    public function exam_register()
    {
        return $this->hasOne(ExamRegister::class,'student_info_id','id');
    }

    public function exam_result()
    {
        return $this->hasOne(ExamResult::class,'student_info_id','id');
    }

    public function cpa_ff(){
        return $this->hasOne(CPAFF::class,'student_info_id','id');
    }
    public function papp(){
        return $this->hasOne(Papp::class,'student_id','id');
    }

    public function cpa_one_direct(){
        return $this->hasOne(CpaOneTrainingAddmissionDirect::class,'student_info_id','id');

    }

    public function accountancy_firm(){
        return $this->belongsTo(AccountancyFirmInformation::class,'accountancy_firm_info_id','id');

    }

    public function firm_ownerships_audits(){
        return $this->hasMany(FirmOwnershipAudit::class,'accountancy_firm_info_id','accountancy_firm_info_id');

    }

     public function exam_registers()
    {
        return $this->hasMany(ExamRegister::class,'student_info_id','id')->with('course','batch');

    }

    public function student_course_regs()
    {
        return $this->hasMany(StudentCourseReg::class,'student_info_id','id')->with('batch');
    }

    public function school(){
        return $this->belongsTo(SchoolRegister::class);

    }

    public function mentor(){
        return $this->belongsTo(Mentor::class);

    }

    public function teacher(){
        return $this->belongsTo(TeacherRegister::class);

    }

    public function article(){
        return $this->hasMany(ApprenticeAccountant::class,'student_info_id','id');

    }

    public function gov_article(){
        return $this->hasMany(ApprenticeAccountantGov::class,'student_info_id','id');

    }

    public function exam_results()
    {
        return $this->hasMany(ExamResult::class,'student_info_id','id')->with('exam_register');

    }
}
