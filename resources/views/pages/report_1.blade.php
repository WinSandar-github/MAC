@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'report_1'
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
                                    <tr>
                                        <th rowspan="2" width="80px">
                                            စဥ်
                                        </th>
                                        <th rowspan="2" width="400px">
                                            သင်တန်းအမည်
                                        </th>
                                        <th rowspan="2" width="160px">
                                            ဖွင့်လှစ်သည့်အချိန်
                                        </th>
                                        <th colspan="3" style="text-align: center">
                                            သင်တန်းဆင်းဦးရေ
                                        </th>
                                        <th rowspan="2">
                                            မှတ်ချက်
                                        </th>
                                    </tr>
                                    <tr style="text-align: center">
                                        <th>ကျား</th>
                                        <th>မ</th>
                                        <th>ပေါင်း</th>
                                    </tr>  
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> ၁ </td>
                                        <td> ဝန်ထမ်းအဖွဲ့အစည်းအကြီးအမှူးစီမံခန့်ခွဲမှုသင်တန်း </td>
                                        <td> ၂ ကြိမ် </td>
                                        <td style="text-align: center"> ၅၅ </td>
                                        <td style="text-align: center"> ၅၅ </td>
                                        <td style="text-align: center"> ၅၅ </td>
                                        <td> hello </td>
                                    </tr>
                                    <tr>
                                        <td> ၂ </td>
                                        <td> ဝန်ထမ်းအဖွဲ့အစည်းအကြီးအမှူးစီမံခန့်ခွဲမှုသင်တန်း </td>
                                        <td> ၂ ကြိမ် </td>
                                        <td style="text-align: center"> ၅၅ </td>
                                        <td style="text-align: center"> ၅၅ </td>
                                        <td style="text-align: center"> ၅၅ </td>
                                        <td> hello </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th></th>
                                        <th style="text-align: center">စုစုပေါင်း</th>
                                        <th>၄ ကြိမ်</th>
                                        <th style="text-align: center">၁၀၀ </th>
                                        <th style="text-align: center">၁၀၀ </th>
                                        <th style="text-align: center">၁၀၀ </th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection