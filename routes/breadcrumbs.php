<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('page.index', 'dashboard'));
});

// Home > Administration > Accounts > LMS Accounts
Breadcrumbs::for('lms_accounts', function ($trail) {
    $trail->parent('administration');
    $trail->push('LMS Accounts', route('page.index', 'lms_accounts'));
});

// Home > LMS Accounts > Create Account
Breadcrumbs::for('lms_account_create', function ($trail) {
    $trail->parent('lms_accounts');
    $trail->push('Create Account', route('page.index', 'lms_account_create'));
});

// Home > LMS Accounts > Update Account
Breadcrumbs::for('lms_account_update', function ($trail) {
    $trail->parent('lms_accounts');
    $trail->push('Update Account', route('page.index', 'lms_account_update'));
});

// Home > Administraion
Breadcrumbs::for('administration', function ($trail) {
    $trail->parent('home');
    $trail->push('Administration', route('page.index', 'administration'));
});

// Home > Administration > Course > သင်တန်းအပတ်စဥ်
Breadcrumbs::for('သင်တန်းအပတ်စဥ်', function ($trail) {
    $trail->parent('administration');
    $trail->push('သင်တန်းအပတ်စဥ်', route('page.index', 'batch'));
});

// Home > Administration > Course > သင်တန်းအပတ်စဥ် > Create
Breadcrumbs::for('create_batch', function ($trail) {
    $trail->parent('သင်တန်းအပတ်စဥ်');
    $trail->push('Create', route('page.index', 'batch'));
});

// Home > Administration > Course > သင်တန်းအပတ်စဥ် > Update
Breadcrumbs::for('update_batch', function ($trail) {
    $trail->parent('သင်တန်းအပတ်စဥ်');
    $trail->push('Update', route('page.index', 'edit_batch'));
});

// Home > Administration > Course > သင်ကြားပေးသောသင်တန်းများ
Breadcrumbs::for('training', function ($trail) {
    $trail->parent('administration');
    $trail->push('သင်ကြားပေးသောသင်တန်းများ', route('page.index', 'training'));
});

// Home > Administration > Course > သင်ကြားပေးသောသင်တန်းများ > Edit
Breadcrumbs::for('edit_training_class', function ($trail) {
    $trail->parent('training');
    $trail->push('Edit', route('page.index', 'edit_training'));
});

// Home > Administration > Course > သင်တန်းအမျိုးအစားများ
Breadcrumbs::for('training_type', function ($trail) {
    $trail->parent('administration');
    $trail->push('Training Type', route('page.index', 'training_type'));
});

// Home > Administration > Course > သင်တန်းအမျိုးအစားများ > Edit
Breadcrumbs::for('edit_training_type', function ($trail) {
    $trail->parent('training_type');
    $trail->push('Edit', route('page.index', 'edit_training_type'));
});

// Home > Administraion > Manage Course & Category 
Breadcrumbs::for('course-category', function ($trail) {
    $trail->parent('administration');
    $trail->push('Manage Course & Category', route('page.index', 'manage_course_category'));
});

// Home > Exam Registeration
Breadcrumbs::for('examregisteration', function ($trail) {
    $trail->parent('home');
    $trail->push('ExamRegisteration', route('page.index', 'examregisteration'));
});

// Home > DA Exam Form (1)
Breadcrumbs::for('da_exam_one', function ($trail) {
    $trail->parent('examregisteration');
    $trail->push('DA Exam Form (1)', route('page.index', 'da_exam_one'));
});

// Home > QT Application
Breadcrumbs::for('qt_application_registration', function ($trail) {
    $trail->parent('home');
    $trail->push('QT Application', route('page.index', 'qt_application_registration'));
});

// Home > Article
Breadcrumbs::for('article', function ($trail) {
    $trail->push('Article', route('page.index', 'article'));
});

// Home > Teacher
Breadcrumbs::for('teacher_registration', function ($trail) {
    $trail->push('Teacher', route('page.index', 'teacher_registration'));
});
Breadcrumbs::for('teacher-register-form1', function ($trail) {
    $trail->parent('teacher_registration');
    $trail->push('သင်တန်းဆရာ မှတ်ပုံတင်လျှောက်လွှာ', route('page.index', 'teacher-register-form1'));
});
Breadcrumbs::for('teacher-register-form2', function ($trail) {
    $trail->parent('teacher_registration');
    $trail->push('သင်တန်းဆရာ မှတ်ပုံတင်သက်တမ်းတိုးလျှောက်လွှာ', route('page.index', 'teacher-register-form2'));
});
Breadcrumbs::for('school_registration', function ($trail) {
    $trail->push('School', route('page.index', 'school_registration'));
});
Breadcrumbs::for('school-register-form1', function ($trail) {
    $trail->parent('school_registration');
    $trail->push('ကျောင်းဖွင့်လှစ်လုပ်ကိုင်ခွင့်လျှောက်လွှာ', route('page.index', 'school-register-form1'));
});
Breadcrumbs::for('school-register-form2', function ($trail) {
    $trail->parent('school_registration');
    $trail->push('သင်တန်းကျောင်းအချက်အလက်များ', route('page.index', 'school-register-form2'));
});
Breadcrumbs::for('school-register-form3', function ($trail) {
    $trail->parent('school_registration');
    $trail->push('အမည်စာရင်းနှင့်ကိုယ်ရေးအချက်အလက်များ', route('page.index', 'school-register-form3'));
});
Breadcrumbs::for('school-register-form4', function ($trail) {
    $trail->parent('school_registration');
    $trail->push('ကျောင်းမှတ်ပုံတင်သက်တမ်းတိုးလျှောက်လွှာ', route('page.index', 'school-register-form4'));
});
Breadcrumbs::for('batch_list', function ($trail) {
    $trail->push('Batch', route('page.index', 'batch_list'));
});
Breadcrumbs::for('course_list', function ($trail) {
    $trail->push('Course', route('page.index', 'course_list'));
});
Breadcrumbs::for('requirement_list', function ($trail) {
    $trail->push('Requirement', route('page.index', 'requirement_list'));
});
Breadcrumbs::for('audit_firm_registration', function ($trail) {
    $trail->push('Audit Firm', route('page.index', 'audit_firm_registration'));
});
Breadcrumbs::for('audit-firm-initial-accountancy', function ($trail) {
    $trail->parent('audit_firm_registration');
    $trail->push('Accountancy Firm Information(Initial)', route('page.index', 'audit-firm-initial-accountancy'));
});
Breadcrumbs::for('audit-firm-list', function ($trail) {
    $trail->parent('audit_firm_registration');
    $trail->push('Audit Firm List', route('page.index', 'audit-firm-list'));
});
Breadcrumbs::for('audit-firm-renew-accountancy', function ($trail) {
    $trail->parent('audit_firm_registration');
    $trail->push('Accountancy Firm Information(Renew)', route('page.index', 'audit-firm-renew-accountancy'));
});
Breadcrumbs::for('audit-firm-renew-organization', function ($trail) {
    $trail->parent('audit_firm_registration');
    $trail->push('Organization Structure(Renew)', route('page.index', 'audit-firm-renew-organization'));
});
Breadcrumbs::for('non_audit_firm_registration', function ($trail) {
    $trail->push('Non Audit Firm', route('page.index', 'non_audit_firm_registration'));
});
Breadcrumbs::for('non-audit-firm-local-initial', function ($trail) {
    $trail->parent('non_audit_firm_registration');
    $trail->push('Local Firm Information(Initial)', route('page.index', 'non-audit-firm-local-initial'));
});
Breadcrumbs::for('non-audit-firm-local-renew', function ($trail) {
    $trail->parent('non_audit_firm_registration');
    $trail->push('Local Firm Information(Renew)', route('page.index', 'non-audit-firm-local-renew'));
});
Breadcrumbs::for('non-audit-firm-foreign-initial', function ($trail) {
    $trail->parent('non_audit_firm_registration');
    $trail->push('Foreign Firm Information(Initial)', route('page.index', 'non-audit-firm-foreign-initial'));
});
Breadcrumbs::for('non-audit-firm-foreign-renew', function ($trail) {
    $trail->parent('non_audit_firm_registration');
    $trail->push('Foreign Firm Information(Renew)', route('page.index', 'non-audit-firm-foreign-renew'));
});
Breadcrumbs::for('non-audit-firm-list', function ($trail) {
    $trail->parent('non_audit_firm_registration');
    $trail->push('Non_Audit Firm List', route('page.index', 'non-audit-firm-list'));
});
Breadcrumbs::for('cpa_part1_registration', function ($trail) {
    $trail->push('CPA Part 1', route('page.index', 'cpa_part1_registration'));
});
Breadcrumbs::for('cpa-part1-register-form1', function ($trail) {
    $trail->parent('cpa_part1_registration');
    $trail->push('သင်တန်းတက်ရောက်ခွင့်လျှောက်လွှာ(တိုက်ရိုက်တက်ရောက်ခွင့်ရသူများ)', route('page.index', 'cpa-part1-register-form1'));
});
Breadcrumbs::for('cpa-part1-register-form2', function ($trail) {
    $trail->parent('cpa_part1_registration');
    $trail->push('မှတ်ပုံတင်ခွင့်လျှောက်လွှာ(ကိုယ်တိုင်လေ့လာသင်ယူမည့်သူများ)', route('page.index', 'cpa-part1-register-form2'));
});
Breadcrumbs::for('cpa-part1-register-form3', function ($trail) {
    $trail->parent('cpa_part1_registration');
    $trail->push('မှတ်ပုံတင်ခွင့်လျှောက်လွှာ(အသစ်တက်ခွင့်ရသူများ) ', route('page.index', 'cpa-part1-register-form3'));
});
Breadcrumbs::for('cpa-part1-register-form4', function ($trail) {
    $trail->parent('cpa_part1_registration');
    $trail->push('မှတ်ပုံတင်ခွင့်လျှောက်လွှာ(နှစ်ဟောင်းမှတက်ခွင့်ရသူများ)', route('page.index', 'cpa-part1-register-form4'));
});
Breadcrumbs::for('cpa-part1-register-form5', function ($trail) {
    $trail->parent('cpa_part1_registration');
    $trail->push('သင်တန်းစာမေးပွဲဖြေဆိုခွင့်လျှောက်လွှာ', route('page.index', 'cpa-part1-register-form5'));
});
Breadcrumbs::for('cpa_part2_registration', function ($trail) {
    $trail->push('CPA Part 2', route('page.index', 'cpa_part2_registration'));
});
Breadcrumbs::for('cpa-part2-register-form1', function ($trail) {
    $trail->parent('cpa_part2_registration');
    $trail->push('သင်တန်းတက်ရောက်ခွင့်နှင့်မှတ်ပုံတင်ခွင့်လျှောက်လွှာ', route('page.index', 'cpa-part2-register-form1'));
});

Breadcrumbs::for('cpa-part2-register-form2', function ($trail) {
    $trail->parent('cpa_part2_registration');
    $trail->push('သင်တန်းသားမှတ်ပုံတင်ခွင့်လျှောက်လွှာ(အသစ်တက်ခွင့်ရသူများ)', route('page.index', 'cpa-part2-register-form2'));
});
Breadcrumbs::for('cpa-part2-register-form3', function ($trail) {
    $trail->parent('cpa_part2_registration');
    $trail->push('သင်တန်းသားမှတ်ပုံတင်ခွင့်လျှောက်လွှာ(နှစ်ဟောင်းမှတက်ခွင့်ရသူများ)', route('page.index', 'cpa-part2-register-form3'));
});
Breadcrumbs::for('cpa-part2-register-form4', function ($trail) {
    $trail->parent('cpa_part2_registration');
    $trail->push('သင်တန်းစာမေးပွဲဖြေဆိုခွင့်လျှောက်လွှာ', route('page.index', 'cpa-part2-register-form4'));
});
Breadcrumbs::for('cpa_ff_pa', function ($trail) {
    $trail->push('CPA FF & PA', route('page.index', 'cpa_ff_pa'));
});
Breadcrumbs::for('cpa_ff_pa_form1', function ($trail) {
    $trail->parent('cpa_ff_pa');
    $trail->push('Certificate of Certified Public Accountant (Full-Fledged)', route('page.index', 'cpa_ff_pa_form1'));
});
Breadcrumbs::for('cpa_ff_pa_form2', function ($trail) {
    $trail->parent('cpa_ff_pa');
    $trail->push('Certificate of Professional Account in Public Practice', route('page.index', 'cpa_ff_pa_form2'));
});
Breadcrumbs::for('cpa_ff_registration', function ($trail) {
    $trail->push('CPA FF', route('page.index', 'cpa_ff_registration'));
});
Breadcrumbs::for('cpa_ff_register_form1', function ($trail) {
    $trail->parent('cpa_ff_registration');
    $trail->push('လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပြည့်မီ)အဖြစ်မှတ်ပုံတင်ခြင်း', route('page.index', 'cpa_ff_register_form1'));
});
Breadcrumbs::for('cpa_ff_register_form2', function ($trail) {
    $trail->parent('cpa_ff_registration');
    $trail->push('လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပြည့်မီ)အဖြစ်မှတ်ပုံတင်ထားခြင်းကိုသက်တမ်းတိုးမြှင့်ခြင်း', route('page.index', 'cpa_ff_register_form2'));
});
Breadcrumbs::for('papp_registration', function ($trail) {
    $trail->push('PAPP Initial', route('page.index', 'papp_registration'));
});
Breadcrumbs::for('papp_register_initial_form1', function ($trail) {
    $trail->parent('papp_registration');
    $trail->push('အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်သူအဖြစ်မှတ်ပုံတင်ရန်လျှောက်ထားခြင်း', route('page.index', 'papp_register_initial_form1'));
});
Breadcrumbs::for('papp_register_initial_form2', function ($trail) {
    $trail->parent('papp_registration');
    $trail->push('အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်သူများ ဖြည့်သွင်းပေးရန်အချက်များ', route('page.index', 'papp_register_initial_form2'));
});
Breadcrumbs::for('papp_register_initial_form3', function ($trail) {
    $trail->parent('papp_registration');
    $trail->push('ကိုယ်တိုင်ခံဝန်ချက်', route('page.index', 'papp_register_initial_form3'));
});
Breadcrumbs::for('papp_registration_renew', function ($trail) {
    $trail->push('PAPP Renew', route('page.index', 'papp_registration_renew'));
});
Breadcrumbs::for('papp_register_renew_form1', function ($trail) {
    $trail->parent('papp_registration_renew');
    $trail->push('အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်သူအဖြစ်သက်တမ်းတိုးရန်လျှောက်ထားခြင်း', route('page.index', 'papp_register_renew_form1'));
});
Breadcrumbs::for('papp_register_renew_form2', function ($trail) {
    $trail->parent('papp_registration_renew');
    $trail->push('အများပြည်သူသို့စာရင်းဝန်ဆောင်မှုပေးသည့် လုပ်ငန်းလုပ်ကိုင်သူများ ဖြည့်သွင်းပေးရန်အချက်များ', route('page.index', 'papp_register_renew_form2'));
});
Breadcrumbs::for('da_part1_registration', function ($trail) {
    $trail->push('DA Part 1', route('page.index', 'da_part1_registration'));
});
Breadcrumbs::for('da_part1_register_form1', function ($trail) {
    $trail->parent('da_part1_registration');
    $trail->push('သင်တန်းတက်ရောက်ခွင့်နှင့်မှတ်ပုံတင်ခွင့်လျှောက်လွှာ', route('page.index', 'da_part1_register_form1'));
});
Breadcrumbs::for('da_part1_register_form2', function ($trail) {
    $trail->parent('da_part1_registration');
    $trail->push('မှတ်ပုံတင်ခွင့်လျှောက်လွှာ(အသစ်တက်ခွင့်ရသူများ)', route('page.index', 'da_part1_register_form2'));
});
Breadcrumbs::for('da_part1_register_form3', function ($trail) {
    $trail->parent('da_part1_registration');
    $trail->push('မှတ်ပုံတင်ခွင့်လျှောက်လွှာ(နှစ်ဟောင်းမှတက်ခွင့်ရသူများ)', route('page.index', 'da_part1_register_form3'));
});
Breadcrumbs::for('da_part1_register_form4', function ($trail) {
    $trail->parent('da_part1_registration');
    $trail->push('သင်တန်းစာမေးပွဲဖြေဆိုခွင့်လျှောက်လွှာ', route('page.index', 'da_part1_register_form4'));
});
Breadcrumbs::for('da_part1_register_form5', function ($trail) {
    $trail->parent('da_part1_registration');
    $trail->push('သင်တန်းပြီးဆုံး(အောင်/ကျရှုံး)ကြောင်း အထောက်အထားတောင်းခံမှူပုံစံ', route('page.index', 'da_part1_register_form5'));
});
Breadcrumbs::for('da_part2_registration', function ($trail) {
    $trail->push('DA Part 2', route('page.index', 'da_part2_registration'));
});
Breadcrumbs::for('da_part2_register_form1', function ($trail) {
    $trail->parent('da_part2_registration');
    $trail->push('သင်တန်းတက်ရောက်ခွင့်နှင့်မှတ်ပုံတင်ခွင့်လျှောက်လွှာ', route('page.index', 'da_part2_register_form1'));
});
Breadcrumbs::for('da_part2_register_form2', function ($trail) {
    $trail->parent('da_part2_registration');
    $trail->push('မှတ်ပုံတင်ခွင့်လျှောက်လွှာ(အသစ်တက်ခွင့်ရသူများ)', route('page.index', 'da_part2_register_form2'));
});
Breadcrumbs::for('da_part2_register_form3', function ($trail) {
    $trail->parent('da_part2_registration');
    $trail->push('မှတ်ပုံတင်ခွင့်လျှောက်လွှာ(နှစ်ဟောင်းမှတက်ခွင့်ရသူများ)', route('page.index', 'da_part2_register_form3'));
});
Breadcrumbs::for('da_part2_register_form4', function ($trail) {
    $trail->parent('da_part2_registration');
    $trail->push('သင်တန်းစာမေးပွဲဖြေဆိုခွင့်လျှောက်လွှာ', route('page.index', 'da_part2_register_form4'));
});
Breadcrumbs::for('da_part2_register_form5', function ($trail) {
    $trail->parent('da_part2_registration');
    $trail->push('သင်တန်းပြီးဆုံး(အောင်/ကျရှုံး)ကြောင်း အထောက်အထားတောင်းခံမှူပုံစံ', route('page.index', 'da_part2_register_form5'));
});
Breadcrumbs::for('article-form1', function ($trail) {
    $trail->parent('article');
    $trail->push('လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ဒုတိယပိုင်း)သင်တန်းကိုအောင်မြင်ပြီး၍ လက်တွေ့အလုပ်သင်ကြားရန်ဆန္ဒပြုခြင်း', route('page.index', 'article-form1'));
});
Breadcrumbs::for('article-form2', function ($trail) {
    $trail->parent('article');
    $trail->push('လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပထမပိုင်း)(ဒုတိယပိုင်း)အတွက် လက်တွေ့အလုပ်သင်ကြားရန်ဆန္ဒပြုခြင်း', route('page.index', 'article-form2'));
});
Breadcrumbs::for('article-form3', function ($trail) {
    $trail->parent('article');
    $trail->push('လက်တွေ့အလုပ်သင်ကြားခြင်း(၂)နှစ်ပြည့်မြောက်ပြီး၍ လက်တွေ့အလုပ် (၁) နှစ် ထပ်မံဆင်းရန်ဆန္ဒပြုခြင်း', route('page.index', 'article-form3'));
});
Breadcrumbs::for('article-form4', function ($trail) {
    $trail->parent('article');
    $trail->push('လက်မှတ်ရပြည်သူ့စာရင်းကိုင် အရည်အချင်းစစ် စာမေးပွဲကိုအောင်မြင်ပြီး၍ လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒပြုခြင်း', route('page.index', 'article-form4'));
});
Breadcrumbs::for('article-form5', function ($trail) {
    $trail->parent('article');
    $trail->push('လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ဒုတိယပိုင်း) စာမေးပွဲကိုအောင်မြင်ပြီး၍ လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒပြုခြင်း', route('page.index', 'article-form5'));
});
Breadcrumbs::for('article-form6', function ($trail) {
    $trail->parent('article');
    $trail->push('လက်မှတ်ရပြည်သူ့စာရင်းကိုင်(ပထမပိုင်း)(ဒုတိယပိုင်း)သင်တန်းအတွက် လက်တွေ့အလုပ်သင်ကြားရန် ဆန္ဒပြုခြင်း', route('page.index', 'article-form6'));
});
Breadcrumbs::for('index', function ($trail) {
    $trail->push('da_registration_form', route('page.index', 'index'));
});
Breadcrumbs::for('da_list', function ($trail) {
    $trail->parent('home');
    $trail->push('DA Form List', route('page.index', 'da_list'));
});

// CPAFF List
Breadcrumbs::for('cpa_ff_registration_list', function ($trail) {
    $trail->parent('home');
    $trail->push('CPA Full Fleged Form List', route('page.index', 'cpa_ff_registration_list'));
});
Breadcrumbs::for('cpa_ff_edit', function ($trail) {
    $trail->parent('cpa_ff_registration_list');
    $trail->push('CPA Full Fleged Detail List', route('page.index', 'cpa_ff_edit'));
});

// PAPP List
Breadcrumbs::for('papp_registration_list', function ($trail) {
    $trail->parent('home');
    $trail->push('PAPP Form List', route('page.index', 'papp_registration_list'));
});
Breadcrumbs::for('papp_edit', function ($trail) {
    $trail->parent('papp_registration_list');
    $trail->push('PAPP Detail List', route('page.index', 'papp_edit'));
});