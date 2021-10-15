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
        route_name: 'da_attend',
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
