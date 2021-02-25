@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'report_2'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Simple Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        အမှတ်စဥ်
                                    </th>
                                    <th width="200px">
                                        ဝန်ကြီးဌာန၊ အဖွဲ့အစည်းများနှင့် တိုင်းဒေသကြီး/ပြည်နယ်အစိုးရအဖွဲ့များ
                                    </th>
                                    <th width="50px">
                                        ရာထူးခန့်ထားရေးအတွက်ကြော်ငြာထုတ်ပြန်ခြင်း
                                    </th>
                                    <th>
                                        လျှောက်လွှာလက်ခံခြင်း
                                    </th>
                                    <th>
                                        ရေးဖြေစာမေးပွဲစစ်ဆေးပေးခြင်း
                                    </th>
                                    <th>
                                        လူတွေ့စစ်ဆေးခြင်း
                                    </th>
                                    <th>
                                        အပြီးသတ်ရွေးချယ်ပေးခြင်း
                                    </th>
                                    <th>
                                        သင်တန်းတက်ရောက်စေခြင်း
                                    </th>
                                    <th width="80px">
                                        ပုံမှန်သင်တန်းများတွင်လက်ခံသင်ကြားပေးခြင်း
                                    </th>
                                    <th width="100px">
                                        ရာထူးတိုးမြင့်ပေးရန်ညှိနှိုင်းချက်များအပေါ်သဘောတူညီချက်ပေးခြင်း
                                    </th>
                                    <th width="100px">
                                        အငြိမ်းစားတပ်မတော်အရာရှိ/ပြင်ပပုဂ္ဂိုလ်ပြန်လည်ခန့်ထားရေးအတွက်အရေးယူဆောင်ရွက်ခြင်း
                                    </th>
                                    <th>
                                        မှတ်ချက်
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center" class="col-count">၁</td>
                                        <td style="text-align: center" class="col-count">၂</td>
                                        <td style="text-align: center" class="col-count">၃</td>
                                        <td style="text-align: center" class="col-count">၄</td>
                                        <td style="text-align: center" class="col-count">၅</td>
                                        <td style="text-align: center" class="col-count">၆</td>
                                        <td style="text-align: center" class="col-count">၇</td>
                                        <td style="text-align: center" class="col-count">၈</td>
                                        <td style="text-align: center" class="col-count">၉</td>
                                        <td style="text-align: center" class="col-count">၁၀</td>
                                        <td style="text-align: center" class="col-count">၁၁</td>
                                        <td style="text-align: center" class="col-count">၁၂</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center">၁</td>
                                        <td>နိုင်ငံတော်သမ္မတရုံး</td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center">၁၆</td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center">၂</td>
                                        <td>ပြည်ထောင်စုအစိုးရအဖွဲ့ရုံး</td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center">၇</td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center">၃</td>
                                        <td>ပြည်ထောင်စုလွှတ်တော်ရုံး</td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center">၈၀</td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center">၄</td>
                                        <td>ပြည်သူ့လွှတ်တော်ရုံး</td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center">၁၈</td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                        <td style="text-align: center"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection