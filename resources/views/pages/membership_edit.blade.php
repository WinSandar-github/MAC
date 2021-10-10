@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'description_list'
])

@section('content')


    <div class="content">
        @include('flash-message')
        <div class="row">
            <div class="col-md-12">
            {{ Breadcrumbs::render('Membership Edit') }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">

                                <div class="float-right">

                                    <button type="button" id="create_btn" class="btn btn-primary btn-round" data-toggle="modal" data-target="#create_membership_model">Create</button>
                                </div>
                                <h5 class="card-title">{{ __('Membership List') }}</h5>


                        </div>

                        <form id="membership_form" method="post" action="javascript:createMembership();" enctype="multipart/form-data">
                        <input type="hidden"  name="membership_id" >

                        <div class="card-body">
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('1.') }}</label>
                                <label class="col-md-3 form-label">{{ __('Membership Name') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input readonly type="text" name="membership_name" class="form-control" id="ms_name" placeholder="Membership Name Eg.School" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('2.') }}</label>
                                <label class="col-md-3 form-label">{{ __('Application Fee') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="form_fee" class="form-control" id="form_fee" placeholder="Application Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            @if($membership_id != 2)
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('3.') }}</label>
                                <label class="col-md-3 form-label">{{ __('Registration Fee') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="registration_fee" class="form-control" id="registration_fee" placeholder="Registration Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($membership_id == 2)
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('3.') }}</label>
                                <label class="col-md-4 form-label">{{ __('Registration Fee') }}</label>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('') }}</label>
                                <label class="col-md-3 form-label">{{ __('Sole Proprietorship') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="reg_fee_sole" class="form-control" id="reg_fee_sole" placeholder="Delayed Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('') }}</label>
                                <label class="col-md-3 form-label">{{ __('Partnership and Company') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="reg_fee_partner" class="form-control" id="reg_fee_partner" placeholder="Delayed Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($membership_id != 6)
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('4.') }}</label>
                                <label class="col-md-3 form-label">{{ __('Yearly Fee') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="yearly_fee" class="form-control" id="yearly_fee" placeholder="Yearly Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($membership_id == 6)
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('4.') }}</label>
                                <label class="col-md-3 form-label">{{ __('Renew Fee') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="renew_fee" class="form-control" id="renew_fee" placeholder="Renew Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                  <label class="col-md-1 form-label">{{ __('5.') }}</label>
                                  <label class="col-md-3 form-label">{{ __('Delayed Fee') }}</label>
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <input type="number" name="late_fee" class="form-control" id="late_fee" placeholder="Delayed Fee" autocomplete="off">
                                      </div>
                                  </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('6.') }}</label>
                                <label class="col-md-3 form-label">{{ __('Reconnected Fee') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="reconnected_fee" class="form-control" id="reconnected_fee" placeholder="Reconnected Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('7.') }}</label>
                                <label class="col-md-3 form-label"><b>{{ __('Subject Fee') }}</b></label>
                                
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('') }}</label>
                                <label class="col-md-3 form-label">{{ __('CPA Subject Fee') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="cpa_subject_fee" class="form-control" id="cpa_subject_fee" placeholder="CPA Subject Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('') }}</label>
                                <label class="col-md-3 form-label">{{ __('DA Subject Fee') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="da_subject_fee" class="form-control" id="da_subject_fee" placeholder="DA Subject Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if($membership_id != 2 && $membership_id !=6)
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('5.') }}</label>
                                <label class="col-md-3 form-label">{{ __('Renew Fee') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="renew_fee" class="form-control" id="yearly_fee" placeholder="Yearly Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- for Non-Audit -->
                            @if($membership_id == 2)
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('5.') }}</label>
                                <label class="col-md-4 form-label">{{ __('Renew Fee') }}</label>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('') }}</label>
                                <label class="col-md-3 form-label">{{ __('Sole Proprietorship') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="renew_fee_sole" class="form-control" id="renew_fee_sole" placeholder="Delayed Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('') }}</label>
                                <label class="col-md-3 form-label">{{ __('Partnership and Company') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="renew_fee_partner" class="form-control" id="renew_fee_partner" placeholder="Delayed Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($membership_id != 1 && $membership_id != 2 && $membership_id !=6)
                              <div class="row mb-1">
                                  <label class="col-md-1 form-label">{{ __('6.') }}</label>
                                  <label class="col-md-3 form-label">{{ __('Delayed Fee') }}</label>
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <input type="number" name="late_fee" class="form-control" id="late_fee" placeholder="Delayed Fee" autocomplete="off">
                                      </div>
                                  </div>
                              </div>
                            @endif

                            <!-- for audit firm nad non-audit firm -->
                            @if($membership_id == 1 || $membership_id == 2)
                              <div class="row mb-1">
                                  <label class="col-md-1 form-label">{{ __('6.') }}</label>
                                  <label class="col-md-4 form-label">{{ __('Delayed Fee(within January)') }}</label>
                              </div>
                              <div class="row mb-1">
                                  <label class="col-md-1 form-label">{{ __('') }}</label>
                                  <label class="col-md-3 form-label">{{ __('Sole Proprietorship') }}</label>
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <input type="number" name="late_fee_within_jan_sole" class="form-control" id="late_fee" placeholder="Delayed Fee" autocomplete="off">
                                      </div>
                                  </div>
                              </div>
                              <div class="row mb-1">
                                  <label class="col-md-1 form-label">{{ __('') }}</label>
                                  <label class="col-md-3 form-label">{{ __('Partnership and Company') }}</label>
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <input type="number" name="late_fee_within_jan_partner" class="form-control" id="late_fee" placeholder="Delayed Fee" autocomplete="off">
                                      </div>
                                  </div>
                              </div>
                              <!-- /// -->
                              <div class="row mb-1">
                                  <label class="col-md-1 form-label">{{ __('7.') }}</label>
                                  <label class="col-md-4 form-label">{{ __('Delayed Fee(from February to April)') }}</label>
                              </div>
                              <div class="row mb-1">
                                  <label class="col-md-1 form-label">{{ __('') }}</label>
                                  <label class="col-md-3 form-label">{{ __('Sole Proprietorship') }}</label>
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <input type="number" name="late_fee_feb_to_apr_sole" class="form-control" id="late_fee" placeholder="Delayed Fee" autocomplete="off">
                                      </div>
                                  </div>
                              </div>
                              <div class="row mb-1">
                                  <label class="col-md-1 form-label">{{ __('') }}</label>
                                  <label class="col-md-3 form-label">{{ __('Partnership and Company') }}</label>
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <input type="number" name="late_fee_feb_to_apr_partner" class="form-control" id="late_fee" placeholder="Delayed Fee" autocomplete="off">
                                      </div>
                                  </div>
                              </div>
                              <!-- /// -->
                              <div class="row mb-1">
                                  <label class="col-md-1 form-label">{{ __('8.') }}</label>
                                  <label class="col-md-4 form-label">{{ __('Reconnect Fee(per year)') }}</label>
                              </div>
                              <div class="row mb-1">
                                  <label class="col-md-1 form-label">{{ __('') }}</label>
                                  <label class="col-md-3 form-label">{{ __('Sole Proprietorship') }}</label>
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <input type="number" name="reconnect_fee_sole" class="form-control" id="reconnect_fee_sole" placeholder="Delayed Fee" autocomplete="off">
                                      </div>
                                  </div>
                              </div>
                              <div class="row mb-1">
                                  <label class="col-md-1 form-label">{{ __('') }}</label>
                                  <label class="col-md-3 form-label">{{ __('Partnership and Company') }}</label>
                                  <div class="col-md-8">
                                      <div class="form-group">
                                          <input type="number" name="reconnect_fee_partner" class="form-control" id="reconnect_fee_sole" placeholder="Delayed Fee" autocomplete="off">
                                      </div>
                                  </div>
                              </div>
                            @endif

                            @if($membership_id != 1 && $membership_id != 2 && $membership_id != 6)
                            <div class="row mb-1">
                                <label class="col-md-1 form-label">{{ __('7.') }}</label>
                                <label class="col-md-3 form-label">{{ __('Reconnected Fee') }}</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="number" name="reconnected_fee" class="form-control" id="reconnected_fee" placeholder="Reconnected Fee" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="row mb-1">
                                @if($membership_id == 2 || $membership_id == 1)
                                <label class="col-md-1 form-label">{{ __('9.') }}</label>
                                @else
                                <label class="col-md-1 form-label">{{ __('8.') }}</label>
                                @endif
                                <label class="col-md-2 form-label">{{ __('Requirement') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <!-- <select name="requirement_id[]"
                                                class="form-control requirement_id multiple-requirement" multiple="multiple"
                                                required style="width:100%">


                                        </select> -->
                                        <textarea   name="requirement" id="requirement"  width="100%"
                                                    height="auto"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                              @if($membership_id == 2 || $membership_id == 1)
                              <label class="col-md-1 form-label">{{ __('10.') }}</label>
                              @else
                              <label class="col-md-1 form-label">{{ __('9.') }}</label>
                              @endif
                              <label class="col-md-2 form-label">{{ __('Description') }}</label>
                              <div class="col-md-9">
                                  <div class="form-group ">
                                      <!-- <select name="description_id[]"
                                              class="form-control description_id multiple-requirement" multiple="multiple"
                                              required style="width:100%">


                                      </select> -->
                                      <textarea   name="description" id="mem_desc" width="100%"
                                                  height="auto"></textarea>
                                  </div>
                              </div>
                            </div>

                        </div>
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary" form="membership_form">Save</button>

                        </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')
<script>
    $(document).ready(function() {


    $('#mem_desc').summernote({
       placeholder: 'your Message'
    });

    $('#requirement').summernote({
       placeholder: 'your Message',

    });
    var id = location.pathname.substring(location.pathname.lastIndexOf('/') + 1);

    showMembershipInfo(id);

    });


</script>
@endpush
