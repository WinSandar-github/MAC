<!DOCTYPE html>

<head>
    <title>MAC Certificate</title>
    <!-- <link href="{{ asset('paper/css/bootstrap.min.css') }}" rel="stylesheet" /> -->
</head>
<style>

   

    .input {
        border-bottom: dotted;
    }
    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    page[size="A4"] {
        width: 21cm;
        height: 29.7cm;
    }

    .border-style {
        background-image: url(https://demo.aggademo.me/MAC/public/img/dacpa_certificate.png);
        background-size: 97%;
        background-repeat: no-repeat;
        background-position: center;
    }

    @media print {

        body,
        page {
            margin: 0;
            box-shadow: 0;
        }
    }

    .table{
        width: 100%;
    }

    table.table td{
        border: 1px solid black;
    }

</style>

<body>
    
    <page size="A4" class="{{ $className }}">
        {{-- <table style="margin-right: 100px; margin-left: 100px;">
            <tbody>
                <tr>
                    <td style="text-align: center; font-size: 24px; font-weight: 800; padding-top: 150px; padding-bottom: 20px;">
                        ပြည်ထောင်စုသမ္မတမြန်မာနိုင်ငံတော်
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-size: 24px; font-weight: 800;">
                        မြန်မာနိုင်ငံစာရင်းကောင်စီ
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-size: 24px; padding: 20px;">
                        <img src="http://localhost:8000/assets/images/maclogo1.png" alt="logo" width="150px" height="150px">
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-size: 35px; font-weight: 800;">
                        ဂုဏ်ပြုလက်မှတ်
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center; font-size: 12px;">
                        ≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋≋
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: middle; text-align:justify; padding-top: 10px; padding-bottom: 10px;">
                        <p>
                            {{ studentName }} (အဖအမည် - {{ abaName }}၊ နိုင်ငံသားစိစစ်ရေးကတ်အမှတ် -
                            {{ nrcNumber }})
                            သည် {{ year }}
                            ခုနှစ်၊ {{ monthMM }} အတွင်း ကျင်းပခဲ့သော {{ courseName }} စာမေးပွဲတွင်
                            {{ grade }}
                            အဆင့်ဖြင့်ဖြေဆိုအောင်မြင်ပါသဖြင့် ဤဂုဏ်ပြုလက်မှတ်ကို ချီးမြှင့်လိုက်သည်။
                        </p>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-top: 10%; vertical-align: middle;">
                        {{ သန္တာလေး }}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right;">
                        မှတ်ပုံတင်အရာရှိ
                    </td>
                </tr>
                <tr>
                    <td style="padding-top: 20%;">
                        ရက်စွဲ၊ {{ yearMM }} ခုနှစ်၊ {{ monthMM }} {{ dayMM }} ရက်။
                    </td>
                </tr>
            </tbody>
        </table> --}}

        
        {!! htmlspecialchars_decode($template->cert_data) !!}

    </page>
    @if(isset($branch_template))

            {!! htmlspecialchars_decode($branch_template->cert_data) !!}

    @endif
</body>
<script src="{{ asset('js/certificate.js') }}"></script>
<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script> -->
<script type="text/javascript">
    $(document).ready(function(){
        var Status = localStorage.getItem("Status");
        // console.log(status)
        if(Status == 1){
            $('#save_btn').css("display","none");
            $('#approve_btn').css("display","block");
            $('#print_btn').css("display","block");
        }else if(Status == 2){
            $('#approve_btn').css("display","none");
            $('#save_btn').css("display","block");
            $('#print_btn').css("display","none");
        }else{
            $('#approve_btn').css("display","none");
            $('#save_btn').css("display","none");
        }

        var id = localStorage.getItem("id");
        $.ajax({
            url: BACKEND_URL + '/check_esignId/' + id,
            type: 'GET',
            success: function(data) {
                var firm_data = data.data[0];
                if(firm_data.esign_status == 1){
                    $('#approve_btn').css("display","none");
                }
            }
        });
    });
</script>
</html>

