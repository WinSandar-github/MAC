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
                <a href="{{ route('page.index', 'administration') }}">
                    <i class="nc-icon nc-tap-01"></i>
                    <p>{{ __('Administraion') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'teacher_registration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'teacher_registration') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Teacher') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'qt_application_registration' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'qt_application_registration') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('QT Application') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'article' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'article') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Article') }}</p>
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

                    <li class="{{ $elementActive == 'cpa_ff_pa' ? 'active' : '' }}">
                        <a class="link" href="{{ route('page.index', 'cpa_ff_pa') }}">
                            <i class="nc-icon nc-single-copy-04"></i>
                            <span class='sidebar-normal'>{{ __('CPA FF & PA') }}</span>
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
            
        </ul>
    </div>
</div>
