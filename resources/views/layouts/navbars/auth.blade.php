<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="{{ route('page.index', 'dashboard') }}" class="simple-text logo-normal">
            {{ __('MAC') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>

            <li class="{{ $elementActive == '' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#adminstration" class="nav-link">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('Administraion') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse in" id="adminstration">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'administration' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'administration') }}">
                                <i class="fa fa-user-o" aria-hidden="true text-white"></i>
                                <span>{{ __('အသုံးပြုသူများ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'course_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'course_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('သင်တန်း') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'batch_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'batch_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('သင်တန်းအမှတ်စဥ်') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'requirement_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'requirement_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('ဘွဲ့လိုအပ်ချက်') }}</span>
                            </a>
                        </li>
                        {{--<li class="{{ $elementActive == 'da_one_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_one_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 1 Application List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da_two_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_two_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 2 Application List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_one_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_one_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 1 Application List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_two_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_two_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 2 Application List') }}</span>
                            </a>
                        </li>--}}
                        {{--<li class="{{ $elementActive == 'index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 1 Registration List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da_two_index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_two_index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 2 Registration List') }}</span>
                            </a>
                        </li>
                        <!-- {{-- <li class="{{ $elementActive == 'index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA Registration Form') }}</span>
                            </a>
                        </li> --}}

                        <!-- CPA One -->
                        {{--<li class="{{ $elementActive == 'cpa_one_index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_one_index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 1 Registration List') }}</span>
                            </a>
                        </li>

                        <!-- CPA Two -->
                        <li class="{{ $elementActive == 'cpa_two_index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_two_index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 2 Registration List') }}</span>
                            </a>
                        </li>--}}

                        <li class="{{ $elementActive == 'cpa_ff_registration_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_ff_registration_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA Full Fleged List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'papp_registration_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'papp_registration_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('PAPP List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'audit-firm-list' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'audit-firm-list') }}">
                                        <i class="nc-icon nc-single-copy-04"></i>
                                        <span>{{ __('Audit Firm List') }}</span>
                                    </a>
                        </li>
                        <li class="{{ $elementActive == 'non-audit-firm-list' ? 'active' : '' }}">
                                    <a  href="{{ route('page.index', 'non-audit-firm-list') }}">
                                        <i class="nc-icon nc-single-copy-04"></i>
                                        <span>Non Audit Firm List</span>
                                    </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="{{ $elementActive == 'studentapplication' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#studentapplication">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Student Application') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse in" id="studentapplication">
                    <ul class="nav">
                    <li class="{{ $elementActive == 'da_one_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_one_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 1 Application List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da_two_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_two_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 2 Application List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_one_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_one_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 1 Application List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_two_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_two_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 2 Application List') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'studentregistration' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#studentregistration">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Student Registration') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse in" id="studentregistration">
                    <ul class="nav">
                    <li class="{{ $elementActive == 'index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 1 Registration List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da_two_index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_two_index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 2 Registration List') }}</span>
                            </a>
                        </li>
                        {{-- <li class="{{ $elementActive == 'index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA Registration Form') }}</span>
                            </a>
                        </li> --}}

                        <!-- CPA One -->
                        <li class="{{ $elementActive == 'cpa_one_index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_one_index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 1 Registration List') }}</span>
                            </a>
                        </li>

                        <!-- CPA Two -->
                        <li class="{{ $elementActive == 'cpa_two_index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_two_index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 2 Registration List') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'examregisteration' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#examregisteration">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Exam Registration') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse in" id="examregisteration">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'da_exam_one' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_exam_one') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 1 Exam List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da_two_exam' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_two_exam') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 2 Exam List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_exam_one' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_exam_one') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 1 Exam List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_two_exam' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_two_exam') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 2 Exam List') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'examresults' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#examresults">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Exam Results') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse in" id="examresults">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'da1_exam_result_edit' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da1_exam_result_edit') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 1 Exam Result List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da2_exam_result_edit' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da2_exam_result_edit') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 2 Exam Result List') }}</span>
                            </a>
                        </li>
                        <li >
                            <a href="#">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('Qualified Test List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa1_exam_result_edit' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa1_exam_result_edit') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 1 Exam Result List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa2_exam_result_edit' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa2_exam_result_edit') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 2 Exam Result List') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'school_registration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'school_registration') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('School') }}</p>
                </a>
            </li> 
            <li class="{{ $elementActive == 'teacher_registration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'teacher_registration') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Teacher') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'mentor_list' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'mentor_list') }}">
                    <i class="nc-icon nc-paper"></i>
                    <span>{{ __('Mentors') }}</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="nc-icon nc-paper"></i>
                    <span>{{ __('Entry Exam List') }}</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="nc-icon nc-paper"></i>
                    <span>{{ __('Qualified Test Payment List') }}</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="nc-icon nc-paper"></i>
                    <span>{{ __('Reporting') }}</span>
                </a>
            </li>

            <li class="{{ $elementActive == '' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#adminstration" class="nav-link">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('Administraion') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse in" id="adminstration">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'administration' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'administration') }}">
                                <i class="fa fa-user-o" aria-hidden="true text-white"></i>
                                <span>{{ __('အသုံးပြုသူများ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'course_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'course_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('သင်တန်း') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'batch_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'batch_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('သင်တန်းအမှတ်စဥ်') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'requirement_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'requirement_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('ဘွဲ့လိုအပ်ချက်') }}</span>
                            </a>
                        </li>
                        {{--<li class="{{ $elementActive == 'da_one_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_one_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 1 Application List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da_two_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_two_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 2 Application List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_one_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_one_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 1 Application List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_two_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_two_app_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 2 Application List') }}</span>
                            </a>
                        </li>--}}
                        {{--<li class="{{ $elementActive == 'index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 1 Registration List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da_two_index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_two_index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA 2 Registration List') }}</span>
                            </a>
                        </li>--}}
                        {{-- <li class="{{ $elementActive == 'index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA Registration Form') }}</span>
                            </a>
                        </li> --}}

                        <!-- CPA One -->
                        {{--<li class="{{ $elementActive == 'cpa_one_index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_one_index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 1 Registration List') }}</span>
                            </a>
                        </li>

                        <!-- CPA Two -->
                        <li class="{{ $elementActive == 'cpa_two_index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_two_index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA 2 Registration List') }}</span>
                            </a>
                        </li>--}}

                        <li class="{{ $elementActive == 'cpa_ff_registration_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_ff_registration_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA Full Fleged List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'papp_registration_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'papp_registration_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('PAPP List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'audit-firm-list' ? 'active' : '' }}">
                                    <a href="{{ route('page.index', 'audit-firm-list') }}">
                                        <i class="nc-icon nc-single-copy-04"></i>
                                        <span>{{ __('Audit Firm List') }}</span>
                                    </a>
                        </li>
                        <li class="{{ $elementActive == 'non-audit-firm-list' ? 'active' : '' }}">
                                    <a  href="{{ route('page.index', 'non-audit-firm-list') }}">
                                        <i class="nc-icon nc-single-copy-04"></i>
                                        <span>Non Audit Firm List</span>
                                    </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            {{-- <li class="{{ $elementActive == 'qt_application_registration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'qt_application_registration') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('QT Application') }}</p>
                </a>
            </li> --}}
            {{-- <li class="{{ $elementActive == 'article' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'article') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Article') }}</p>
                </a>
            </li> --}}
            {{--<li class="{{ $elementActive == 'school_registration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'school_registration') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('School') }}</p>
                </a>
            </li> --}}
            {{-- <li class="{{ $elementActive == '' ? 'active' : '' }}">
                <a href="#audit" class="nav-link" data-toggle="collapse">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>Audit Firm<b class='caret'></b></p>

                </a>
                <div class="collapse " id='audit'>
                <ul class="nav">
                    <li class="{{ $elementActive == 'audit_firm_registration' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'audit_firm_registration') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>{{ __('Audit Firm Registration') }}</span>
                        </a>
                    </li>

                    <li class="{{ $elementActive == 'non_audit_firm_registration' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'non_audit_firm_registration') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>Non Audit Firm Registration</span>
                        </a>
                    </li>
                 </ul>
                </div>
            </li> --}}

            {{-- <li class="{{ $elementActive == '' ? 'active' : '' }}">
                <a href="#audit_frim_card" class="nav-link" data-toggle="collapse">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>Audit Firm Card<b class='caret'></b></p>
                </a>
                <div class="collapse " id='audit_frim_card'>
                <ul class="nav">
                    <li class="{{ $elementActive == 'audit_firm_card' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'audit_firm_card') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>{{ __('Audit Firm Card') }}</span>
                        </a>
                    </li>

                    <li class="{{ $elementActive == 'non_audit_firm_card' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'non_audit_firm_card') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>Non Audit Firm Card</span>
                        </a>
                    </li>
                 </ul>
                </div>
            </li> --}}

            {{-- <li class="{{ $elementActive == '' ? 'active' : '' }}">
                <a href="#cpa" class="nav-link" data-toggle="collapse">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>CPA<b class='caret'></b></p>
                </a>
                <div class="collapse " id='cpa'>
                <ul class="nav">
                    <li class="{{ $elementActive == 'cpa_part1_registration' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'cpa_part1_registration') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>{{ __('CPA Part1 Registration') }}</span>
                        </a>

                    </li>

                    <li class="{{ $elementActive == 'cpa_part2_registration' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'cpa_part2_registration') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>CPA Part2 Registration</span>
                        </a>
                    </li>

                    <li class="{{ $elementActive == 'cpa_ff_pa' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'cpa_ff_pa') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>{{ __('CPA FF & PA') }}</span>
                        </a>
                    </li>
                    <li class="{{ $elementActive == 'cpa_ff_registration' ? 'active' : '' }}">
                        <a class="link" href="{{ route('cpa_ff_registration') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>CPA(FF)</span>
                        </a>
                    </li>
                 </ul>
                </div>
            </li> --}}
            {{-- <li class="{{ $elementActive == '' ? 'active' : '' }}">
                <a href="#papp" class="nav-link" data-toggle="collapse">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>PAPP<b class='caret'></b></p>

                </a>
                <div class="collapse " id='papp'>
                <ul class="nav">
                    <li class="{{ $elementActive == 'papp_registration' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'papp_registration') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>{{ __('PAPP(Initial)') }}</span>
                        </a>

                    </li>

                    <li class="{{ $elementActive == 'papp_registration_renew' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'papp_registration_renew') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>PAPP(Renew)</span>
                        </a>
                    </li>

                 </ul>
                </div>
            </li> --}}

            {{-- <li class="{{ $elementActive == '' ? 'active' : '' }}">
                <a href="#da" class="nav-link" data-toggle="collapse">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>DA<b class='caret'></b></p>

                </a>
                <div class="collapse " id='da'>
                <ul class="nav">
                    <li class="{{ $elementActive == 'da_part1_registration' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'da_part1_registration') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>{{ __('DA Part1 Registration') }}</span>
                        </a>
                    </li>

                    <li class="{{ $elementActive == 'da_part2_registration' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'da_part2_registration') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>DA Part2 Registration</span>
                        </a>
                    </li>
                 </ul>
                </div>
            </li> --}}
            {{-- <li class="{{ $elementActive == 'mentor_registration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'mentor') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Mentor') }}</p>
                </a>
            </li> --}}

        </ul>
    </div>
</div>
