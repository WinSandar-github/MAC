<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/maclogo1.png">
            </div>
        </a>
        <a href="{{ route('page.index', 'dashboard') }}" class="simple-text logo-normal">
            {{ __('DPRMS') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            {{--Dashboard--}}
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>

            {{--Application Form--}}
            <li class="{{ $elementActive == 'da_one_app_list' || $elementActive == 'cpa_one_app_list' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#studentapplication">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Student Application') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse {{ $elementActive == 'da_one_app_list' || $elementActive == 'cpa_one_app_list' ? 'show' : 'in' }}" id="studentapplication">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'da_one_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_one_app_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('DA 1 Application List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_one_app_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_one_app_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('CPA 1 Application List') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{--Registration Form--}}
            <li class="{{ $elementActive == 'da_one_reg' || $elementActive == 'da_two_reg' || $elementActive == 'cpa_one_reg' || $elementActive == 'cpa_two_reg' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#studentregistration">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Student Registration') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse {{ $elementActive == 'da_one_reg' || $elementActive == 'da_two_reg' || $elementActive == 'cpa_one_reg' || $elementActive == 'cpa_two_reg' ? 'show' : 'in' }}" id="studentregistration">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'da_one_reg' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'index') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('DA 1 Registration List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da_two_reg' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_two_index') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('DA 2 Registration List') }}</span>
                            </a>
                        </li>
                        {{--<li class="{{ $elementActive == 'index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'index') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;"></i>
                                <span>{{ __('DA Registration Form') }}</span>
                            </a>
                        </li>--}}
                        <!-- CPA One -->
                        <li class="{{ $elementActive == 'cpa_one_reg' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_one_index') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('CPA 1 Registration List') }}</span>
                            </a>
                        </li>
                        <!-- CPA Two -->
                        <li class="{{ $elementActive == 'cpa_two_reg' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_two_index') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('CPA 2 Registration List') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{--Exam Registration Form--}}
            <li class="{{ $parentElement == 'exam_reg' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#examregisteration">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Exam Registration') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse {{ $parentElement == 'exam_reg' ? 'show' : 'in' }}" id="examregisteration">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'da_exam_one' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_exam_one') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">{{ __('DA 1 Exam List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da_two_exam' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_two_exam') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">{{ __('DA 2 Exam List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'entry_exam_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'entry_exam_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">{{ __('Entry Exam List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'qualified_test_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'qualified_test_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">{{ __('Qualified Test List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_exam_one' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_exam_one') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">{{ __('CPA 1 Exam List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_two_exam' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_two_exam') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">{{ __('CPA 2 Exam List') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{--Exam Result--}}
            <li class="{{ $parentElement == 'exam_result' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#examresults">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Exam Results') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse {{ $parentElement == 'exam_result' ? 'show' : 'in' }}" id="examresults">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'da1_exam_result_edit' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da1_exam_result_edit') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('DA 1 Exam Result List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da2_exam_result_edit' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da2_exam_result_edit') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('DA 2 Exam Result List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa1_exam_result_edit' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa1_exam_result_edit') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('CPA 1 Exam Result List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa2_exam_result_edit' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa2_exam_result_edit') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('CPA 2 Exam Result List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'qualified_test_result_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'qualified_test_result_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-size:11px;font-weight:normal;">{{ __('QT Result List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'entry_exam_result' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'entry_exam_result') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('Entry Exam Result List') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{--Membership--}}
            <li class="{{ $parentElement == 'membership' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#membership">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Membership') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse {{ $parentElement == 'membership' ? 'show' : 'in' }}" id="membership">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'cpa_ff_registration_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_ff_registration_list') }}">
                                <i class="nc-icon nc-paper nc-xs" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('CPA(Full-Fledged) List') }}</span>
                            </a>
                        </li>
                        {{--<li class="{{ $elementActive == 'cpa_ff_renew_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_ff_renew_list') }}">
                                <i class="nc-icon nc-paper nc-xs" style="font-size:18px;font-weight:normal;"></i>
                                <span
                                    style="font-weight:normal;font-size:11px;">{{ __('CPA(Full-Fledged) Renewal List') }}</span>
                            </a>
                        </li>--}}
                        <li class="{{ $elementActive == 'papp_registration_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'papp_registration_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">{{ __('PAPP List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'audit-firm-list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'audit-firm-list') }}">
                                <i class="nc-icon nc-single-copy-04" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">{{ __('Audit Firm List') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'non-audit-firm-list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'non-audit-firm-list') }}">
                                <i class="nc-icon nc-single-copy-04" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">Non Audit Firm List</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'school_registration' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'school_registration') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <p style="font-weight:normal;font-size:11px;">{{ __('School') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'teacher_registration' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'teacher_registration') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <p style="font-weight:normal;font-size:11px;">{{ __('Teacher') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'mentor_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'mentor_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">{{ __('Mentors') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'article_list' || $elementActive == 'firm_article_list' || $elementActive == 'gov_article_list' || $elementActive == 'resign_article_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'article_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">{{ __('Article') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- <li class="{{ $elementActive == 'exam_entry_list' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'exam_entry_list') }}">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Entry Exam List') }}</p>
                    <b class="caret"></b>
                </a>
            </li> -->
<!-- 
            <li class="{{ $elementActive == 'qualified_test_payment_list' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'qualified_test_payment_list') }}">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('QT Payment List') }}</p>
                </a>
            </li> -->

            <li class="{{ $elementActive == 'offline_user' ? 'active' : '' }}">
                <a href="{{ route('offline_user') }}">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>Existing User</p>
                </a>
            </li>

            <li class="{{ $elementActive == 'reporting_list' ? 'active' : '' }}">
                <a href="{{ route('report_list') }}">
                    <i class="nc-icon nc-paper"></i>
                    <span>{{ __('Reporting') }}</span>
                    <!-- <b class="caret"></b> -->
                </a>
            </li>

            <li class="{{ $parentElement == 'administrator' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#adminstration" class="nav-link">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('Administraion') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse {{ $parentElement == 'administrator' ? 'show' : 'in' }}" id="adminstration">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'administration' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'administration') }}">
                                <i class="fa fa-user-o" aria-hidden="true text-white"
                                   style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;">{{ __('??????????????????????????????????????????') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'course_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'course_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;">{{ __('?????????????????????') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'batch_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'batch_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;">{{ __('?????????????????????????????????????????????') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'exam_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'exam_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;">{{ __('????????????????????????') }}</span>
                            </a>
                        </li>

                        <li class="{{ $elementActive == 'requirement_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'requirement_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;">{{ __('???????????????????????????????????????????????????????????????') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'description_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'description_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;">{{ __('??????????????????????????????') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'esign_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'esign_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;">{{ __('E-Sign User Management') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'membership_list' ? 'active' : '' }}">
                            <a href="{{ route('membership_list') }}">
                                <i class="nc-icon nc-paper" style="font-size:18px;font-weight:normal;"></i>
                                <span style="font-weight:normal;font-size:11px;">{{ __('Membership') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
