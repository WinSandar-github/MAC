@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'lms_accounts'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('lms_account_update') }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="lms-create-user-accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">{{ __('Update LMS Account') }}</h5>
                        </div>
                        <div class="card-body">
                        <form action="{{ route('account.update', $user_by_id->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="user-id" value="{{ $user_by_id->id }}">
                            <div class="container">
                                <div class="form-group">
                                    <div class="row col-md-12">
                                        <label class="col-md-2 col-form-label">Username</label>
                                        <div class="col-md-5">
                                            <input type="text" name="username" class="form-control" autocomplete="off" value="{{ $user_by_id->firstname.' '.$user_by_id->lastname }}">
                                            <div class="mt-3">
                                                <input type="checkbox" name="suspended" value="">
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
                                            <input type="password" name="password" class="form-control" id="showPassword">
                                            <div class="mt-3">
                                                <input type="checkbox" id="togglePassword">
                                                <label for="">Show Password</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row col-md-12" >
                                        <label class="col-md-2 col-form-label">First name</label>
                                        <div class="col-md-5">
                                            <input type="text" name="firstname" class="form-control" autocomplete="off" value="{{ $user_by_id->firstname }}">
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
                                            <input type="text" name="lastname" class="form-control" autocomplete="off" value="{{ $user_by_id->lastname }}">
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
                                            <input type="email" name="email" class="form-control" autocomplete="off" value="{{ $user_by_id->email }}" required>
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
                                    Update Account
                                </button>
                            </div>
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
            var suspended_val = <?php echo $user_by_id->suspended; ?>;
            // Make suspended checkbox status check or not according to value returned from controller //
            if ( suspended_val == 1 ) {
                $('input[name="suspended"]').prop("checked", true).val(1);
            } else {
                $('input[name="suspended"]').prop("checked", false).val(0);
            }

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
