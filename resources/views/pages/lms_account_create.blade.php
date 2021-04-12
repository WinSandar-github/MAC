@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'lms_accounts'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('lms_account_create') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="lms-create-user-accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">{{ __('Create LMS Account') }}</h5>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('account.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="form-group">
                                    <div class="row col-md-12"> 
                                        <label class="col-md-2 col-form-label">Username</label>
                                        <div class="col-md-5">
                                            <input type="text" name="username" class="form-control" autocomplete="off">
                                            <div class="mt-3">
                                                <input type="checkbox" name="suspended" value="0">
                                                <label for="">Suspended account</label>
                                            </div>
                                        </div>                                         
                                    </div>
                                </div>
                                <div class="form-group" hidden>
                                    <div class="row col-md-12" > 
                                        <label class="col-md-2 col-form-label">Choose an authentication method</label>
                                        <div class="col-md-5">
                                            <input type="text" name="auth" class="form-control" value="manual">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row col-md-12" > 
                                        <label class="col-md-2 col-form-label">Password</label>
                                        <div class="col-md-5">
                                            <input type="password" name="password" class="form-control" id="showPassword" required>
                                            <div class="mt-3">
                                                <input type="checkbox" id="togglePassword">
                                                <label for="">Show Password</label>
                                                <label for="">
                                                    <i class="nc-icon nc-alert-circle-i"></i>
                                                    Required
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row col-md-12" > 
                                        <label class="col-md-2 col-form-label">First name</label>
                                        <div class="col-md-5">
                                            <input type="text" name="firstname" class="form-control" autocomplete="off">
                                            <div class="mt-2">
                                                <!-- <label for="">
                                                    <i class="nc-icon nc-alert-circle-i"></i>
                                                    Required
                                                </label> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row col-md-12" > 
                                        <label class="col-md-2 col-form-label">Last name</label>
                                        <div class="col-md-5">
                                            <input type="text" name="lastname" class="form-control" autocomplete="off">
                                            <div class="mt-2">
                                                <!-- <label for="">
                                                    <i class="nc-icon nc-alert-circle-i"></i>
                                                    Required
                                                </label> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row col-md-12" > 
                                        <label class="col-md-2 col-form-label">Email address</label>
                                        <div class="col-md-5">
                                            <input type="email" name="email" class="form-control" autocomplete="off" required>
                                            <div class="mt-2">
                                                <label for="">
                                                    <i class="nc-icon nc-alert-circle-i"></i>
                                                    Required
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" hidden>
                                    <div class="row col-md-12" > 
                                        <label class="col-md-2 col-form-label">Email display</label>
                                        <div class="col-md-5">
                                            <input type="text" name="maildisplay" class="form-control" autocomplete="off" value=2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center" type="submit">
                                <button class="btn btn-primary">
                                    Create Account
                                </button>
                            </div>
                            <!-- <div class="container mb-3">
                                <p class="font-size-twenty">
                                    <a class="custom-link-accordion" data-toggle="collapse" href="#general" aria-expanded="false" aria-controls="general">
                                    <b class="caret"></b>
                                        General
                                    </a>
                                </p>
                                <div class="collapse" id="general">
                                    
                                </div>
                            </div> -->
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $('document').ready( function() {
            $('#togglePassword').on('click', function() {
                var x = document.getElementById("showPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            });   
            
            $('input[name="suspended"]').on('click', function() {
                if( $(this).prop("checked") == true ) {
                    $(this).val(1);
                } else  {
                    $(this).val(0);
                }
            })
        });
    </script>
@endpush