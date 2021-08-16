@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'mentor_list'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('mentor_list') }}
            </div>
        </div>
        <form action="" method="post">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                        <div class="card-header ">
                            <div class="row">
                                <table width="100%">
                                    <tr>
                                        <td width="90%"><h5 style="text-align: center;" class="card-title">{{ __('Mentor Lists (MAC)') }}</h5></td>
                                        <td width="10%">
                                            <button type="button" onclick="createForm()" class="btn btn-primary btn-round">Create</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row"> 
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="tbl_mentor"class="table table-hover  text-center">
                                                <thead class=" text-nowrap">
                                                    <tr>
                                                        <th class="bold-font-weight" >No</th>
                                                        <th class="bold-font-weight" >Name</th>
                                                        <th class="bold-font-weight" >Email</th>     
                                                        <th class="bold-font-weight" >Phone Number</th>
                                                        <th class="bold-font-weight" >NRC</th>
                                                        <!-- <th class="bold-font-weight" >Status</th> -->
                                                        <th class="bold-font-weight" >Type</th>
                                                        <th class="bold-font-weight" >Detail</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_mentor_body" class="hoverTable">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer ">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
@push('scripts')
<script>
    getMentorList();
</script>
@endpush
