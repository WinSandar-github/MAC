@extends('reporting.main')

@section('content')
<div class="row">
    <div class="col-md-12 text-center">
           
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center m-3" style="font-weight:bold">မှတ်ပုံတင်ထားသူသင်တန်းသားစာရင်း။ (ကျောင်းသားအမျိုးအစားအလိုက်၊ Moduleအလိုက်)</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row"> 

                        <div class="col-md-12">
                          
                           
                        
                            <table width="100%" id="tbl_exam_result_list" class="table table-hover text-nowrap ">
                                <thead>
                                    <tr>
                                        <th class="bold-font-weight" >Serial number</th>
                                        <th class="bold-font-weight" >အမည်</th>
                                        <th class="bold-font-weight" >မှတ်ပုံတင်နံပါတ်</th>
                                        <th class="bold-font-weight" >ကိုယ်ပိုင်နံပါတ်</th>
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