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
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'administration' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#adminstration">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Administraion') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse in" id="adminstration">
                    <ul class="nav">
                        <li class="{{ $elementActive == '' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'administration') }}">
                                <i class="fa fa-user-o" aria-hidden="true text-white"></i>
                                <p>{{ __('အသုံးပြုသူများ') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'course_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'course_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <p>{{ __('သင်တန်း') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'batch_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'batch_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <p>{{ __('သင်တန်းအမှတ်စဥ်') }}</p>
                            </a>
                        </li>
            
                        <li class="{{ $elementActive == 'requirement_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'requirement_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <p>{{ __('ဘွဲ့လိုအပ်ချက်') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'da_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA Application Form') }}</span>
                            </a>
                        </li>
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
                        {{--<li class="{{ $elementActive == 'index' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'index') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA Registration Form') }}</span>
                            </a>
                        </li>--}}
                        <li class="{{ $elementActive == 'cpa_ff_registration_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_ff_registration_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA Full Fleged Form') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'papp_registration_list' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'papp_registration_list') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('PAPP Form') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'examregisteration' ? 'active' : '' }}">
                <a data-toggle="collapse" href="#examregisteration">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Exam Registeration') }}</p>
                    <b class="caret"></b>
                </a>
                <div class="collapse in" id="examregisteration">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'da_exam_one' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'da_exam_one') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('DA Exam Form (1)') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'cpa_exam_one' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'cpa_exam_one') }}">
                                <i class="nc-icon nc-paper"></i>
                                <span>{{ __('CPA(1) Exam List') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'exam_result_list' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'exam_result_list') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Exam Results') }}</p>
                </a>
            </li>
            {{-- <li class="{{ $elementActive == 'teacher_registration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'teacher_registration') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Teacher') }}</p>
                </a>
            </li> --}}
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
            {{-- <li class="{{ $elementActive == 'school_registration' ? 'active' : '' }}">
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
