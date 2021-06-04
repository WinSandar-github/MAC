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
            <li class="{{ $elementActive == 'report_1' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'report_1') }}">
                    <i class="nc-icon nc-vector"></i>
                    <p>{{ __('Report 1') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'report_2' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'report_2') }}">
                    <i class="nc-icon nc-vector"></i>
                    <p>{{ __('Report 2') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'report_3' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'report_3') }}">
                    <i class="nc-icon nc-vector"></i>
                    <p>{{ __('Report 3') }}</p>
                </a>
            </li>
            
            <!-- <li class="{{ $elementActive == 'lms_accounts' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'lms_accounts') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __('LMS Accounts') }}</p>
                </a>
            </li> -->
            <!-- <li class="{{ $elementActive == 'batch' || $elementActive == 'training' || $elementActive == 'training_type' ? 'active' : '' }}">
                <a data-toggle="collapse" data-target="#course_scheduling">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>
                            {{ __('သင်တန်းများစီစဥ်ခြင်း') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="course_scheduling">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'batch' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'batch') }}">
                                <i class="nc-icon nc-air-baloon"></i>
                                <p>{{ __('သင်တန်းအပတ်စဥ်') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'training' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'training') }}">
                                <i class="nc-icon nc-air-baloon"></i>
                                <p>{{ __('သင်ကြားပေးသောသင်တန်းများ') }}</p>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'training_type' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'training_type') }}">
                                <i class="nc-icon nc-air-baloon"></i>
                                <p>{{ __('သင်တန်းအမျိုးအစားများ') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> -->
            <li class="{{ $elementActive == 'administration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'administration') }}">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Administraion') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'school_registration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'school_registration') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('School') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == '' ? 'active' : '' }}">
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
            </li>
            <li class="{{ $elementActive == '' ? 'active' : '' }}">
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
                    <li class="{{ $elementActive == 'cpa_ff_registration' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'cpa_ff_registration') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>CPA(FF)</span>
                        </a>
                    </li>
                 </ul>
                </div>
            </li>
            <li class="{{ $elementActive == '' ? 'active' : '' }}">
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
            </li>
            <!-- <li class="{{ $elementActive == 'papp_registration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'papp_registration') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('PAPP') }}</p>
                </a>
            </li> -->
            <li class="{{ $elementActive == '' ? 'active' : '' }}">
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
            </li>
            <li class="{{ $elementActive == 'mentor_registration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'mentor') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Mentor') }}</p>
                </a>
            </li>
            <!-- {{-- <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li> --}}
            {{-- <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                            {{ __('Laravel examples') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'map') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'notifications') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li> --}}
            {{-- <li class="active-pro {{ $elementActive == 'upgrade' ? 'active' : '' }} bg-danger">
                <a href="{{ route('page.index', 'upgrade') }}">
                    <i class="nc-icon nc-spaceship text-white"></i>
                    <p class="text-white">{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}} -->
        </ul>
    </div>
</div>
