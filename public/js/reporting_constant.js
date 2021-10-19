const _MAIN_TITLE = [
    "DA",
    "CPA",
    "CPA_QUALIFIED_TEST",
    "CPA_FF_PAPP",
    "ARTICLE",
    "ARTICLE_MENTOR",
    "FIRM",
    "TEACHER_SCHOOL",
    "REGISTER_LIST",
    "EXAMINEE",
    "EXAM_PASS_LIST"
]

const _DA = [
    {
        route_name: "/da_attend",
        fun_name : 'daAttendList($(this).data(\'url\'))',
        sub_title:"သင်တန်းတက်ရောက်ခွင့်ရရှိသူစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ အက္ခရာအစဥ်အလိုက်)"
    },

    {
        route_name: "/da_reg",
        fun_name : 'daRegList($(this).data(\'url\'))',
        sub_title: "မှတ်ပုံတင်ထားသူသင်တန်းသားစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ MODULEအလိုက်)"
    },

    {
        route_name: "/da_exam_reg",
        fun_name : 'daExamRegList($(this).data(\'url\'))',
        sub_title: "စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ စာဖြေဌာနအလိုက်၊ MODULEအလိုက်)"
    },

    {
        route_name: "/da_pass",
        fun_name : 'daPassList($(this).data(\'url\'))',
        sub_title: "စာမေးပွဲအောင်မြင်သူစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ စာဖြေဌာနအလိုက်၊ MODULEအလိုက်၊ ကျောင်းအလိုက်)"
    }

    // `စာမေးပွဲကြိမ်ရေ (၅) ကြိမ် ဖြေဆိုပြီးသော်လည်း MODULE နှစ်ခုလုံး အောင်မြင်မှုမရှိသေးသူများစာရင်း၊
    // MODULE (၂)ခုအနက် (၁)ခုအောင်မြင်မှု မရှိသေးသူများစာရင်း၊
    // တဆက်တည်း စာမေးပွဲဝင်ရောက်ဖြေဆိုမှုမရှိသူများစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ စာဖြေဌာနအလိုက်၊ MODULEအလိုက်၊ ကျောင်းအလိုက်)`
]

const _CPA = [
    {
        // route_name: "ca_report_template",
        route_name: '/da_attend',
        fun_name : 'daAttendList($(this).data(\'url\'))',
        sub_title:"သင်တန်းတက်ရောက်ခွင့်ရရှိသူစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ အက္ခရာအစဥ်အလိုက်)"
    },

    {
        // route_name: "ca_report_template",
        route_name: "/da_reg",
        fun_name : 'daRegList($(this).data(\'url\'))',
        sub_title: "မှတ်ပုံတင်ထားသူသင်တန်းသားစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ MODULEအလိုက်)"
    },

    {
        // route_name: "ca_report_template",
        route_name: "/da_exam_reg",
        fun_name : 'daExamRegList($(this).data(\'url\'))',
        sub_title: "စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ စာဖြေဌာနအလိုက်၊ MODULEအလိုက်)"
    },

    {
        // route_name: "ca_report_template",
        route_name: "/da_pass",
        fun_name : 'daPassList($(this).data(\'url\'))',
        sub_title: "စာမေးပွဲအောင်မြင်သူစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ စာဖြေဌာနအလိုက်၊ MODULEအလိုက်၊ ကျောင်းအလိုက်)"
    }

    // `စာမေးပွဲကြိမ်ရေ (၅) ကြိမ် ဖြေဆိုပြီးသော်လည်း MODULE နှစ်ခုလုံး အောင်မြင်မှုမရှိသေးသူများစာရင်း၊
    // MODULE (၂)ခုအနက် (၁)ခုအောင်မြင်မှု မရှိသေးသူများစာရင်း၊
    // တဆက်တည်း စာမေးပွဲဝင်ရောက်ဖြေဆိုမှုမရှိသူများစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ စာဖြေဌာနအလိုက်၊ MODULEအလိုက်၊ ကျောင်းအလိုက်)`
]

const _ARTICLE_SECTION_MENTOR = [
    {
        route_name: "/article_mentor_registered_intern",
        fun_name: "articleMentorInternRegister($(this).data(\'url\'))",
        sub_title: "မှတ်ပုံတင်ထားသော အလုပ်သင်ကြားပေးသူစာရင်း (လုပ်ငန်းအမျိုးအစားအလိုက် / status အလိုက်)"
    },

    // {
    //     sub_title: "PA သက်တမ်းပြတ်တောက်နေသည့် mentor များစာရင်း"
    // },

    // {
    //     sub_title: "Mentor ရပ်နားတင်ထားသူများစာရင်း"
    // },

    // {
    //     sub_title: "အလုပ်သင်ကြားပေးသူနှစ်စဥ် စစ်ဆေးခဲ့သည့် Company စာရင်း"
    // },

    {
        route_name: "/article_mentor_intern",
        fun_name: "articleMentorIntern($(this).data(\'url\'))",
        sub_title: "အလုပ်သင်ကြားပေးနေသူထံတွင် အလုပ်သင်ဆင်းနေသူစာရင်း (ကျောင်းသား status အလိုက်)"
    },

    // {
    //     sub_title: "Mentor တစ်ဦးချင်းစီ၏ History (Initial Registeration, သက်တမ်းပြတ်ကာလ, Renew ပြန်လုပ်သည့်ကာလ"
    // }
]

const _FIRM_NAME = [
    // {
    //     sub_title: `လုပ်သင်အသားတင်(ရေတွက်ခွင့်မရှိသောခွင့်ကာလနှုတ်ပြီး) လုပ်သက် ၂ နှစ်
    //                 (CPA မအောင်သေးသူများ၊ ၁ နှစ် နှင့် ၃ နှစ် (CPA အောင်ပြီးသူများ) ပြည့်သူများစာရင်း`
    // },

    // {
    //     sub_title: `အလုပ်သင်နှုတ်ထွက်သူများစာရင်း`
    // },

    {
        route_name: "/firm_individual",
        fun_name: "firmIndividual($(this).data(\'url\'))",
        sub_title: `အလုပ်သင်ကြားပေးနိုင်သည့် အများပြည်သူသို့ စာရင်းဝန်ဆောင်မှုပေးသူတစ်ဦးချင်း`
    },

    {
        route_name: "/firm_daily_attendence",
        fun_name: "frimDailyAttendence($(this).data(\'url\'))",
        sub_title: `နေ့စဥ်ရုံးတက်ရုံးဆင်းမှတ်တမ်း၊ ခွင့်ပုံစံ`
    },

    // {
    //     sub_title: `အလုပ်သင်မှတ်တမ်း - ၂ နှစ်ပြည့်၊ ၃ နှစ်ပြည့်`
    // }

]

const _TEACHER_SCHOOL = [
    {
        route_name: "/teacher_school_license",
        fun_name: "teacherSchoolLicense($(this).data(\'url\'))",
        sub_title: "ကနဦးမှတ်ပုံတင်၊ သက်တမ်းတိုး၊ သက်တမ်းပြတ်တောက်နေသော ကိုယ်ပိုင်ကျောင်းစာရင်း (လုပ်ငန်းအမျိုးအစားအလိုက်)"
    },

    {
        route_name: "/teacher_school_private",
        fun_name: "teacherSchoolPrivate($(this).data(\'url\'))",
        sub_title: `ကိုယ်ပိုင်သင်တန်းကျောင်းများတွင် သင်ကြားနေသောသင်တန်းဆရာများစာရင်း 
                    ( အမျိုးအစားအလိုက် (Private/Individual)၊ ကျောင်းအလိုက်၊ ခုနှစ်အလိုက်၊ ဘာသာရပ်အလိုက်၊ သင်တန်းအမျိုးအစားအလိုက်`
    },

    {
        route_name: "/teacher_school_license_plate",
        fun_name: "teacherSchoolLicensePlate($(this).data(\'url\'))",
        sub_title: "Teacher / School အလိုက်မှတ်ပုံတင်ကတ်များ (ကနဦး / သက်တမ်းတိုး) ထုတ်ယူနိုင်ရေးဆောင်ရွက်ပေးရန်"
    }
]

const _CPA_QUALIFIED = [
    { 
        route_name: "/cpa_qualified_enrol",
        fun_name : 'cpaQualifiedList($(this).data(\'url\'))',
        sub_title: "လျှောက်ထားသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)" 
    },

    {
        route_name: "/cpa_qualified_exam_enrol",
        fun_name : 'cpaQualifiedExamEnRol($(this).data(\'url\'))',
        sub_title: "ဖြေဆိုခွင့်ရရှိသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)"
    },

    {
        route_name: "/cpa_qualified_exam_reg",
        fun_name : 'cpaQualifiedExamReg($(this).data(\'url\'))',
        sub_title: "ဖြေဆိုသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)"
    },

    {
        route_name: "/cpa_qualified_pass",
        fun_name : 'cpaQualifiedPass($(this).data(\'url\'))',
        sub_title: "အောင်မြင်သူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)"
    },

    {
        route_name: "/cpa_qualified_fail",
        fun_name : 'cpaQualifiedFail($(this).data(\'url\'))',
        sub_title: "ကျရှံးသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)"
    }
    
]

const _CPA_PAPP = [
    { 
        route_name: "/cpa_papp_yearly_list",
        fun_name : 'cpaPAPPYealyList($(this).data(\'url\'))',
        sub_title: "CPA (FF)/ PA တစ်ဦး၏ သက်တမ်းတိုးမည့် ပြက္ဒဒိန်နှစ်အပါအ၀င် ကပ်လျက်ရှိသော ၂နှစ်၏ CPD နာရီမှတ်တမ်း" 
    },

    {
        route_name: "/cpa_papp_yearly_reg_list",
        fun_name : 'cpaPAPPYearlyRegList($(this).data(\'url\'))',
        sub_title: "ပြက္ဒဒိန်နှစ် အလိုက် မှတ်ပုံတင်လုပ်ငန်းများစာရင်း"
    },

    {
        
        route_name: "/cpa_papp_take_out_reg_list",
        fun_name : 'cpaPAPPTakeOutRegList($(this).data(\'url\'))',
        sub_title: "မှတ်ပုံတင်ကတ်ပြားများကို စနစ်ဖြင့် ထုတ်ယူခြင်း"
    }
    
]

const _ARTICLE = [
    { 
        route_name: "/article_list",
        fun_name : 'articleList($(this).data(\'url\'))',
        sub_title: "အလုပ်သင်ကြားပေးနိုင်သည့် အများပြည်သူသို့ စာရင်းဝန်ဆောင်မှု ပေးသူတစ်ဦးချင်းးစာရင်း" 
    },

    {
        route_name: "/article_daily_in_out_list",
        fun_name : 'articleDailyInOutList($(this).data(\'url\'))',
        sub_title: "နေ့စဥ်ရုံးတက်ရုံးဆင်းမှတ်တမ်း၊ ခွင့်ပုံစံ။"
    },

    { 
        route_name: "/article_intern_position_list",
        fun_name : 'articleInternPosList($(this).data(\'url\'))',
        sub_title: "စာရင်းကိုင်အလုပ်သင်ခန့်အပ်စာရင်း (Batch အလိုက်)"
    },

    { 
        route_name: "/article_internship_list",
        fun_name : 'articleInternshipList($(this).data(\'url\'))',
        sub_title: "အလုပ်သင်ဆင်းသူများစာရင်း (Batch အလိုက်)"
    }
    
]