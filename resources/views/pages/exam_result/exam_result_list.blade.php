@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'exam_result_list'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                {{ Breadcrumbs::render('exam_result_list') }}
            </div>
        </div>
        <form action="" method="post">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card custom-border-top card-stats">
                        <div class="card-header ">
                            
                        </div>
                        <div class="card-body">
                            <div class="col-md-9">
                                <nav class="nav flex-column">
                                	<a href="#my-modal" data-toggle="modal">DA Exam (1)</a>
                                	<li>DA Exam (2)</li>
                                	<li>CPA Exam (1)</li>
                                	<li>CPA Exam (2)</li>
                                </nav>
                            </div>
                        </div>

                        <div class="card-footer ">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </form>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="my-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
	            <form action="" method="get" enctype="multipart/form-data">
	                <div class="modal-body">
	                    <div class="row">
	                    	<table width="100%">
	                    		<tr>
	                    			<td width="90%">
	                    				<select class="form-control form-select" name="selected_batch_id" id="selected_batch_id">
	                    				    <option value="selected_batch_id" disabled selected>Select Batch</option>
	                    				</select>
	                    			</td>
	                    			<td width="10%">
	                    				<button type="submit" onclick="viewStudent()" class="btn btn-primary btn-hover-dark" style="float: right;">View</button>
	                    			</td>
	                    		</tr>
	                    	</table>
	                    </div> 
	                </div>
	            </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
	loadBatchData();
</script>
@endpush
