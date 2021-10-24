@extends('reporting.main')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
           
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center m-3" style="font-weight:bold">
                                {{ $data['title'] }}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" id="tbl_exam_result_list" class="table table-hover text-nowrap ">
                                <thead>
                                <!-- စဉ်၊ သင်တန်းဆရာအမှတ်၊ အမည်၊ နိုင်ငံသား စိစစ်ရေးကတ်ပြား၊ အဘအမည်၊ သင်တန်းဆရာ အမျိုးအစား၊ သင်ကြားသည့် သင်တန်းကျောင်း အမည်၊ သင်ကြားသည့် သင်တန်းအမျိုးအစား၊ ဘာသာရပ်များ၊ 
                                မှတ်ပုံတင် သက်တမ်းကာလ၊ သက်တမ်းတိုး/ရပ်နားသည့်နေ့၊ သက်တမ်းပြတ် ကာလ၊  -->
                                    <tr>
                                        <th class="bold-font-weight">စဥ်</th>
                                        <th class="bold-font-weight">သင်တန်းဆရာအမှတ်</th>
                                        <th class="bold-font-weight">အမည်</th>
                                        <th class="bold-font-weight">နိုင်ငံသားစိစစ်ရေးကတ်ပြားအမှတ်</th>
                                        <th class="bold-font-weight">အဘအမည်</th>
                                        <th class="bold-font-weight">သင်တန်းဆရာအမျိုးအစား</th>
                                        <th class="bold-font-weight">သင်ကြားနေသောသင်တန်းကျောင်းအမည်</th>
                                        <th class="bold-font-weight">သင်ကြားနေသောသင်တန်းအမျိုးအစား</th>
                                        <th class="bold-font-weight">ဘာသာရပ်များ</th>
                                        <th class="bold-font-weight">မှတ်ပုံတင်သက်တမ်းကာလ</th>
                                        <th class="bold-font-weight">သက်တမ်းတိုးသည့်နေ့</th>
                                        <th class="bold-font-weight">ရပ်နားသည့်နေ့</th>
                                        <th class="bold-font-weight">သက်တမ်းပြတ်ကာလ</th>
                                        <th>လုပ်သက်</th>

                                    </tr>
                                </thead>
                                <tbody id="tbl_app_list_body" class="hoverTable text-center">
                                    <tr>
                                        <td>1</td>
                                        <td>ဦးကျော်အောင်</td>
                                        <td>၁/ကမတ(နိုင်)၄၁၁၉၀၀</td>
                                        <td>cpa/1</td>
                                        <td>၅ နှစ်</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>ဦးရန်အောင်</td>
                                        <td>၁/ကမတ(နိုင်)၃၀၀၁၂၅</td>
                                        <td>cpa/2</td>
                                        <td>၄ နှစ်</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>ဒေါ် မိုးမိုး</td>
                                        <td>၁/ကမတ(နိုင်)၆၇၀၁၂၅</td>
                                        <td>cpa/3</td>
                                        <td>၄ နှစ်</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>‌‌ဒေါ် စိုးစိုး</td>
                                        <td>၁/ကမတ(နိုင်)၃၀၀၁၂၆</td>
                                        <td>cpa/4</td>
                                        <td>၂ နှစ်</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>‌‌ဒေါ်သွယ်သွယ်</td>
                                        <td>၁/ကမတ(နိုင်)၃၀၀၁၂၈</td>
                                        <td>cpa/5</td>
                                        <td>၁ နှစ်</td>
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

@push('scripts')
<script>
        $('document').ready(function(){
            var table_app = $('#tbl_exam_result_list').DataTable({
                scrollX: true,
                processing: true,
                serverSide: false,
                searching: false,
                paging:false,
                "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',

            });
        })
</script>


@endpush