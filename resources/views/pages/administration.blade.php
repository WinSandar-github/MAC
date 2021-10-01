@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'administration'
])

@section('content')
    <div class="content">
        {{--<div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('administration') }}
            </div>
        </div>--}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#users" role="tab" aria-controls="home" aria-selected="true">Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#course" role="tab" aria-controls="profile" aria-selected="false">Course</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Messages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Settings</a>
                            </li> -->
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="users" role="tabpanel" aria-labelledby="home-tab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4>Account</h4>
                                        </div>
                                        <div class="col-md-9 mt-4">
                                            <nav class="nav flex-column">
                                                <a class="nav-link active" href="{{ route('page.index', 'lms_accounts') }}">Accounts</a>
                                                <a class="nav-link" href="#">Link</a>
                                                <a class="nav-link" href="#">Link</a>
                                                <a class="nav-link disabled" href="#">Disabled</a>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="tab-pane" id="course" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4>Training</h4>
                                        </div>
                                        <div class="col-md-9 mt-4">
                                            <nav class="nav flex-column">
                                                <a class="nav-link active" href="{{ route('page.index', 'batch') }}">သင်တန်းအပတ်စဥ်</a>
                                                <a class="nav-link active" href="{{ route('page.index', 'training') }}">သင်ကြားပေးသောသင်တန်းများ</a>
                                                <a class="nav-link active" href="{{ route('page.index', 'training_type') }}">သင်တန်းအမျိုးအစား</a>
                                            </nav>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h4>Course</h4>
                                        </div>
                                        <div class="col-md-9 mt-4">
                                            <nav class="nav flex-column">
                                                <a class="nav-link active" href="{{ route('page.index', 'manage_course_category') }}">Manage Course & Categories</a>

                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">Messages</div>
                            <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">Settings</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-javascript')
    <script type="text/javascript">

    </script>
@endsection


