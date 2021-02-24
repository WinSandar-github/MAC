@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'student_record'
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
                                        <th width="80px">
                                            စဥ်
                                        </th>
                                        <th width="190px">
                                            အမည်နှင့်နိုင်ငံသားစီစစ်ရေးကတ်ပြား
                                        </th>
                                        <th>
                                            အသက်
                                        </th>
                                        <th width="180px">
                                            ရာထူးအမည်နှင့် လစာနှုန်း
                                        </th>
                                        <th>
                                            ပညာအရည်အချင်း
                                        </th>
                                        <th width="140px">
                                            အမှုထမ်းသောရုံးစိုက်ရာတိုင်းဒေသကြီး/ပြည်နယ်
                                        </th>
                                        <th width="160px">
                                            ဆက်သွယ်ရန်ဖုန်းနံပါတ်/ e-mailလိပ်စာ
                                        </th>
                                    </tr>  
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>၁</td>
                                        <td>မခိုင်သဇင်မခိုင်သဇင် (၁၂/ကကက(နိုင်)၀၉၈၆၅၄)</td>
                                        <td>၂၅</td>
                                        <td>အကြီးတန်းစာရေး (၅၀၀,၀၀၀)</td>
                                        <td>BSc.Botany</td>
                                        <td>နေပြည်တော်</td>
                                        <td>09992345678</td>
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