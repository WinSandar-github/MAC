@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'user_register'
])

@section('content')
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('password_status'))
            <div class="alert alert-success" role="alert">
                {{ session('password_status') }}
            </div>
        @endif
        <div class="row">
            {{-- <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('paper/img/damir-bosnjak.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{ asset('paper/img/mike.jpg') }}" alt="...">

                                <h5 class="title">{{ __(auth()->user()->name)}}</h5>
                            </a>
                            <p class="description">
                            @ {{ __(auth()->user()->name)}}
                            </p>
                        </div>
                        <p class="description text-center">
                            {{ __('I like the way you work it') }}
                            <br> {{ __('No diggity') }}
                            <br> {{ __('I wanna bag it up') }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="button-container">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                    <h5>{{ __('12') }}
                                        <br>
                                        <small>{{ __('Files') }}</small>
                                    </h5>
                                </div>
                                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                    <h5>{{ __('2GB') }}
                                        <br>
                                        <small>{{ __('Used') }}</small>
                                    </h5>
                                </div>
                                <div class="col-lg-3 mr-auto">
                                    <h5>{{ __('24,6$') }}
                                        <br>
                                        <small>{{ __('Spent') }}</small>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Team Members') }}</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="{{ asset('paper/img/faces/ayo-ogunseinde-2.jpg') }}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        {{ __('DJ Khaled') }}
                                        <br />
                                        <span class="text-muted">
                                            <small>{{ __('Offline') }}</small>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="{{ asset('paper/img/faces/joe-gardner-2.jpg') }}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                            {{ __('Creative Tim') }}
                                        <br />
                                        <span class="text-success">
                                            <small>{{ __('Available') }}</small>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="{{ asset('paper/img/faces/clem-onojeghuo-2.jpg') }}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-ms-7 col-7">
                                        {{ __('Flume') }}
                                        <br />
                                        <span class="text-danger">
                                            <small>{{ __('Busy') }}</small>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-12 text-center">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Create Profile') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-3 photo-adjust">
                                    <img src="{{asset('paper/img/mike.jpg')}}" id="image" height="150px" width="153px" class="imagePreview" style="border: 1px solid gray;">
                                    <label class="btn btn-info btn-top">
                                        Upload Profile<input type="file" onchange="displaySelectedPhoto('upload_photo','image')" id="upload_photo" name="photo" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                    </label>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="အမည်" required>
                                    </div>
                                    {{-- @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif --}}
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၂။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အဘအမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="father_name" class="form-control" placeholder="အဘအမည်" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၃။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nrc_no" class="form-control" placeholder="နိုင်ငံသားစီစစ်ရေးကတ်ပြားအမှတ်" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၄။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('မွေးသက္ကရာဇ်/အသက်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" name="date_of_birth" class="form-control" placeholder="မွေးသက္ကရာဇ်/အသက်" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၅။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ပညာအရည်အချင်း (ရရှိထားသော တက္ကသိုလ်/ဘွဲ့/ဒီပလိုမာ)') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="education" class="form-control" placeholder="ပညာအရည်အချင်း" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၆။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လူမျိုး/ဘာသာ') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="race" class="form-control" placeholder="လူမျိုး/ဘာသာ" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၇။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လက်ရှိနေရပ်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="address" class="form-control" placeholder="လက်ရှိနေရပ်" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၈။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('ဇနီး/ခင်ပွန်းအမည်') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="partner_name" class="form-control" placeholder="ဇနီး/ခင်ပွန်းအမည်" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၉။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လက်ရှိရာထူး/လစာနှုန်း/ဌာန/နေရာ‌‌ဒေသ‌') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="current_position" class="form-control" placeholder="လက်ရှိရာထူး/လစာနှုန်း/ဌာန/နေရာ‌‌ဒေသ‌" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၀။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('လက်ရှိအဆင့်တွင်စတင်တာဝန်ထမ်းဆောင်သည့်နေ့') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" name="position_got_date" class="form-control" placeholder="လက်ရှိအဆင့်တွင်စတင်တာဝန်ထမ်းဆောင်သည့်နေ့" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၁။') }}</label>
                                <label class="col-md-2 col-form-label">{{ __('အလုပ်စတင်ဝင်ရောက်သည့်နေ့') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="date" name="job_date" class="form-control" placeholder="အလုပ်စတင်ဝင်ရောက်သည့်နေ့" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၂။') }}</label>
                                <label class="col-md-3 col-form-label" style="text-align: left">{{ __('ရာထူးအဆင့်ဆင့်ထမ်းဆောင်ခဲ့မှု -') }}</label>
                                {{-- <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="partner_name" class="form-control" placeholder="" required>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                {{-- <div class="col-md-12"> --}}
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="card" style="background-color: rgb(186, 224, 241)">
                                            <div class="card-body">
                                                {{-- <div class="table-responsive"> --}}
                                                    <table id="myTable" class="table profile table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th rowspan="2">တာဝန်ထမ်းဆောင်ခဲ့သောရာထူးများ</th>
                                                                <th rowspan="2">ထမ်းဆောင်ခဲ့သည့်ဌာန/နေရာဒေသ</th>
                                                                <th colspan="2">ထမ်းဆောင်ခဲ့သည့်ကာလ</th>
                                                                <th rowspan="2" style="text-align: right;">
                                                                    <input type="button" class="btn btn-primary btn-sm" id="add" value="+">
                                                                </th> 
                                                            </tr>
                                                            <tr>
                                                                <td>မှ</td>
                                                                <td>ထိ</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" value="hello" class="form-control"></td>
                                                                <td><input type="text" value="hello" class="form-control"></td>
                                                                <td><input type="text" value="1" class="form-control"></td>
                                                                <td><input type="text" value="1" class="form-control"></td>
                                                                <td><input type="button" class="delete btn btn-sm btn-danger "  value="X"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                {{-- </div> --}}
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၃။') }}</label>
                                <label class="col-md-10 col-form-label" style="text-align: left">{{ __('ဗဟိုဝန်ထမ်းတက္ကသိုလ် အရာထမ်းအခြေခံသင်တန်း/အရာထမ်းလောင်းအခြေခံသင်တန်း တက်ရောက်ခဲ့သည့် သင်တန်းအမှတ်စဥ်/ခုနှစ်နှင့် တက္ကသိုလ်အမည်') }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea name="description_1" id="description_1" cols="120" rows="6" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၄။') }}</label>
                                <label class="col-md-10 col-form-label" style="text-align: left">{{ __('တပ်မတော်မှအငြိမ်းစားအရာရှိဖြစ်ပါက ခြေလျင်တပ်စုရင်းသင်တန်းနှင့် အလားတူအဆင့်ရှိသင်တန်း တက်ရောက်ခဲ့သည့် သင်တန်းအမှတ်စဥ်/ခုနှစ်နှင့် တက္ကသိုလ်အမည်') }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <textarea name="description_2" id="description_2" cols="120" rows="6" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-1 col-form-label">{{ __('၁၅။') }}</label>
                                <label class="col-md-10 col-form-label" style="text-align: left">{{ __('နိုင်ငံခြားသို့ရောက်ရှိနေသောအခြေအနေ - ') }}</label>
                            </div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="card" style="background-color: rgb(186, 224, 241)">
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">ကာလ</th>
                                                        <th rowspan="2">သွားရောက်ခဲ့သည့်နိုင်ငံ</th>
                                                        <th rowspan="2">တက်ရောက်ခဲ့သည့်သင်တန်း/ဆွေးနွေးပွဲ/အစည်းအဝေး</th>
                                                    </tr>
                                                    <tr>
                                                        <th width="150px">မှ</th>
                                                        <th width="150px">ထိ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="date" class="form-control"></td>
                                                        <td><input type="date" class="form-control"></td>
                                                        <td><input type="text" class="form-control"></td>
                                                        <td><input type="text" class="form-control"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            {{-- <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- <form class="col-md-12" action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Change Password') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Old Password') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="old_password" class="form-control" placeholder="Old password" required>
                                    </div>
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('New Password') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Password Confirmation') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
    $(document).ready(function () {
      var counter = 0;
  
      $("#add").on("click", function () {
        //   alert('hello world');
          var newRow = $("<tr>");
          var cols = "";
  
          cols += '<td><input type="text" class="form-control"/></td>';
          cols += '<td><input type="text" class="form-control"/></td>';
          cols += '<td><input type="text" class="form-control" /></td>';
          cols += '<td><input type="text" class="form-control" /></td>';
  
          cols += '<td><input type="button" class="delete btn btn-sm btn-danger "  value="X"></td>';
          newRow.append(cols);
          $("table.profile").append(newRow);
          counter++;
      });
  
  
  
      $("table.profile").on("click", ".delete", function (event) {
          $(this).closest("tr").remove();      
          counter -= 1
      });
  
  });
  </script>
@endpush