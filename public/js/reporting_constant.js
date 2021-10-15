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
        route_name: "ca_report_template",
        sub_title:"သင်တန်းတက်ရောက်ခွင့်ရရှိသူစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ အက္ခရာအစဥ်အလိုက်)" 
    },

    {
        route_name: "ca_report_template",
        sub_title: "မှတ်ပုံတင်ထားသူသင်တန်းသားစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ MODULEအလိုက်)"
    },

    {
        route_name: "ca_report_template",
        sub_title: "စာမေးပွဲဖြေဆိုခွင့်ရရှိသူစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ စာဖြေဌာနအလိုက်၊ MODULEအလိုက်)"
    },

    {
        route_name: "ca_report_template",
        sub_title: "စာမေးပွဲအောင်မြင်သူစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ စာဖြေဌာနအလိုက်၊ MODULEအလိုက်၊ ကျောင်းအလိုက်)"
    }

    // `စာမေးပွဲကြိမ်ရေ (၅) ကြိမ် ဖြေဆိုပြီးသော်လည်း MODULE နှစ်ခုလုံး အောင်မြင်မှုမရှိသေးသူများစာရင်း၊ 
    // MODULE (၂)ခုအနက် (၁)ခုအောင်မြင်မှု မရှိသေးသူများစာရင်း၊ 
    // တဆက်တည်း စာမေးပွဲဝင်ရောက်ဖြေဆိုမှုမရှိသူများစာရင်း (ကျောင်းသားအမျိုးအစားအလိုက်၊ စာဖြေဌာနအလိုက်၊ MODULEအလိုက်၊ ကျောင်းအလိုက်)`
]

const _CPA_QUALIFIED = [
    { 
        route_name: "/cpa_qualified_enrol",
        // fun_name : 'cpaQualifiedList($(this).data(\'url\'))',
        sub_title:"လျှောက်ထားသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)" 
    },

    {
        route_name: "ca_qualified_exam_enrol",
        // fun_name : 'cpaQualifiedList($(this).data(\'url\'))',
        sub_title: "ဖြေဆိုခွင့်ရရှိသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)"
    },

    {
        route_name: "/ca_qualified_exam_reg",
        // fun_name : 'cpaQualifiedList($(this).data(\'url\'))',
        sub_title: "ဖြေဆိုသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)"
    },

    {
        route_name: "/ca_qualified_pass",
        // fun_name : 'cpaQualifiedList($(this).data(\'url\'))',
        sub_title: "အောင်မြင်သူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)"
    },

    {
        route_name: "/ca_qualified_fail",
        // fun_name : 'cpaQualifiedList($(this).data(\'url\'))',
        sub_title: "ကျရှံးသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)"
    }
    
]

const _CPA_PAPP = [
    { 
        route_name: "/cpa_papp_report_template",
        // fun_name : 'cpaPAPPList($(this).data(\'url\'))',
        sub_title: "CPA (FF)/ PA တစ်ဦး၏ သက်တမ်းတိုးမည့် ပြက္ဒဒိန်နှစ်အပါအ၀င် ကပ်လျက်ရှိသော ၂နှစ်၏ CPD နာရီမှတ်တမ်း" 
    },

    {
        route_name: "/cpa_papp_report_template",
        // fun_name : 'cpaPAPPList($(this).data(\'url\'))',
        sub_title: "ပြက္ဒဒိန်နှစ် အလိုက် မှတ်ပုံတင်လုပ်ငန်းများစာရင်း"
    },

    {
        
        route_name: "/cpa_papp_report_template",
        // fun_name : 'cpaPAPPList($(this).data(\'url\'))',
        sub_title: "မှတ်ပုံတင်ကတ်ပြားများကို စနစ်ဖြင့် ထုတ်ယူခြင်း"
    }
    
]

const _ARTICLE = [
    { 
        route_name: "/article_report_template",
        // fun_name : 'articleList($(this).data(\'url\'))',
        sub_title: "အလုပ်သင်ကြားပေးနိုင်သည့် အများပြည်သူသို့ စာရင်းဝန်ဆောင်မှု ပေးသူတစ်ဦးချင်း" 
    },

    {
        route_name: "/article_report_template",
        // fun_name : 'articleList($(this).data(\'url\'))',
        sub_title: "နေ့စဥ်ရုံးတက်ရုံးဆင်းမှတ်တမ်း၊ ခွင့်ပုံစံ။"
    },

    { 
        route_name: "/article_report_template",
        // fun_name : 'articleList($(this).data(\'url\'))',
        sub_title: "စာရင်းကိုင်အလုက်သင်ခန့်အပ်စာရင်း (Batch အလိုက်)"
    },

    { 
        route_name: "/article_report_template",
        // fun_name : 'articleList($(this).data(\'url\'))',
        sub_title: "အလုပ်သင်ဆင်းသူများစာရင်း (Batch အလိုက်)"
    }
    
]