@extends('layouts.app', [
    'class' => '',
    'parentElement' => '',
    'elementActive' => 'reporting_list'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DA SECTION</h5>
                        <p class="card-text">There are 8 reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="DA">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CPA SECTION</h5>
                        <p class="card-text">There are 8 reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="CPA">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CPA (QUALIFIED TEST) SECTION</h5>
                        <p class="card-text">There are 8 reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="CPA_QUALIFIED_TEST">Show More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CPA(FF) AND PAPP SECTION</h5>
                        <p class="card-text">There are 8 reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="CPA_FF_PAPP">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ARTICLE SECTION</h5>
                        <p class="card-text">There are 8 reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="ARTICLE">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ARTICLE SECTION (MENTOR)</h5>
                        <p class="card-text">There are 8 reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="ARTICLE_MENTOR">Show More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">FIRM NAME SECTION</h5>
                        <p class="card-text">There are 8 reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="FIRM">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">TEACHER / SCHOOL</h5>
                        <p class="card-text">There are 8 reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="TEACHER_SCHOOL">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">မှတ်ပုံတင်ထားသူများစာရင်း ထုတ်ပြန်ခြင်း</h5>
                        <p class="card-text">There are 8 reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="REGISTER_LIST">Show More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">စာမေးပွဲဖြေဆိုခွင့်ရသူများထုတ်ပြန်ခြင်း</h5>
                        <p class="card-text">There are 8 reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="EXAMINEE">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">စာမေးပွဲအောင်စာရင်းထုတ်ပြန်ခြင်း</h5>
                        <p class="card-text">There are 8 reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="EXAM_PASS_LIST">Show More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal right fade" id="more-modal" tabindex="-1" role="dialog" >
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
                    <h5 class="modal-title" id="title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
				</div>

				<div class="modal-body" id="more-title">
					<div class="row mb-3">
                        <div class="col-md-3">
                            <select class="form-control" id="select-batch">
                                <option value="">Select Batch</option>
                            </select>
                        </div>
                    </div>
				</div>
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
@endsection

@push('scripts')
    <script src="/js/reporting_constant.js"></script>
    <script type="text/javascript">
        $('.show-more-modal').on('click', function() {
            let MAIN_REPORT = this.dataset.section

            switch(MAIN_REPORT) {
                case _MAIN_TITLE[0]: // DA
                    clearModalContent()
                    setModalContent('DA SECTION', _DA)

                    $('#more-modal').modal('show')

                    break;
                case _MAIN_TITLE[1]: // CPA
                    clearModalContent()
                    setModalContent('CPA SECTION', _CPA)

                    $('#more-modal').modal('show')

                    break;
                default:
                    clearModalContent()

                    $('#more-modal').modal('show')

                    $('#title').text('No Title is Set')

                    $('#more-title').append(`<p>Not Sub Title is Set</p`)
            }
        })

        function clearModalContent() {
            // Fist Clear The Contents of The Modal
            $('#title').text('')

            $('#more-title').children().not(':first').remove()
        }

        function setModalContent(title, body) {

            $('#title').text(title)

            body.map( (val, index) => {
                let elem = `<div class="row">
                    <div class="col-md-12">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action">
                                ${val}
                            </a>
                        </div>
                    </div>
                </div>`

                $('#more-title').append(elem)
            })
        }
    </script>

    <style>
        .card-title {
            font-size: 18px !important;
        }

        .modal.right {
            top: 0;
            bottom: 0;
            right: 0;
            left: auto !important;
            padding-right: 0 !important;
            width: 50%;
        }

        .modal.right .modal-content {
		    height: 100% !important;
		    overflow-y: auto;
	    }

        .modal.right .modal-body {
		    padding: 15px 15px 80px;
	    }

        .modal.right .modal-dialog {
            position: fixed;
            margin: auto;
            height: 100%;
            width: 50%;
	    }        
    </style>
@endpush


