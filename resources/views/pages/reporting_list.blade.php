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
                        <p class="card-text">There are <span></span> reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="DA">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CPA SECTION</h5>
                        <p class="card-text">There are <span></span> reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="CPA">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CPA (QUALIFIED TEST) SECTION</h5>
                        <p class="card-text">There are <span></span> reports related to this title.</p>
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
                        <p class="card-text">There are <span></span> reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="CPA_FF_PAPP">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ARTICLE SECTION</h5>
                        <p class="card-text">There are <span></span> reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="ARTICLE">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ARTICLE SECTION (MENTOR)</h5>
                        <p class="card-text">There are <span></span> reports related to this title.</p>
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
                        <p class="card-text">There are <span></span> reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="FIRM">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">TEACHER / SCHOOL</h5>
                        <p class="card-text">There are <span></span> reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="TEACHER_SCHOOL">Show More</a>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">မှတ်ပုံတင်ထားသူများစာရင်း ထုတ်ပြန်ခြင်း</h5>
                        <p class="card-text">There are <span></span> reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="REGISTER_LIST">Show More</a>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">စာမေးပွဲဖြေဆိုခွင့်ရသူများထုတ်ပြန်ခြင်း</h5>
                        <p class="card-text">There are <span></span> reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="EXAMINEE">Show More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">စာမေးပွဲအောင်စာရင်းထုတ်ပြန်ခြင်း</h5>
                        <p class="card-text">There are <span></span> reports related to this title.</p>
                        <a href="#" class="btn btn-primary show-more-modal" data-section="EXAM_PASS_LIST">Show More</a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <div class="modal right fade" id="more-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" id="report-form" target="_blank">
                    <div class="modal-body" id="more-title">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <select class="form-control" id="select-course" name='course'>
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <select class="form-control" id="select-batch" name='batch'>
                                    <option value="">Select Batch</option>
                                    {{-- @foreach ($batches as $batch)
                                        <option value="{{ $batch->id }}">{{ $batch->name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endsection

@push('scripts')
    <script src="/js/reporting_constant.js"></script>
    <script src="{{ asset('js/reporting_route_functions.js') }}"></script>
    <script type="text/javascript">
        $('.show-more-modal').on('click', function() {

            let MAIN_REPORT = this.dataset.section

            let course = {!! $courses !!};

            switch (MAIN_REPORT) {
                case _MAIN_TITLE[0]: // DA
                    clearModalContent()
                    setModalContent('DA SECTION', _DA)

                    $('#select-course').empty();

                    $('#select-course').append($('<option>', {
                        value: '',
                        text: 'Select Course'
                    }));

                    let da_course = course.filter(val => {
                        return val.course_type_id == 1
                    });

                    da_course.forEach(val => {
                        $('#select-course').append($('<option>', {
                            value: val.id,
                            text: val.name_mm
                        }));
                    });

                    $('#more-modal').modal('show')

                    break;
                case _MAIN_TITLE[1]: // CPA
                    clearModalContent()
                    setModalContent('CPA SECTION', _CPA);

                    $('#select-course').empty();

                    $('#select-course').append($('<option>', {
                        value: '',
                        text: 'Select Course'
                    }));

                    let cpa_course = course.filter(val => {
                        return val.course_type_id == 2
                    });

                    cpa_course.forEach(val => {
                        $('#select-course').append($('<option>', {
                            value: val.id,
                            text: val.name_mm
                        }));
                    });

                    $('#more-modal').modal('show')

                    break;
                case _MAIN_TITLE[2]: // CPA (Qualified)
                    clearModalContent()
                    setModalContent('CPA (Qualified Test) SECTION', _CPA_QUALIFIED);

                    $('#select-course').empty();

                    $('#select-course').append($('<option>', {
                        value: '',
                        text: 'Select Course'
                    }));

                    let cpa_qualified_course = course.filter(val => {
                        return val.course_type_id == 2
                    });

                    cpa_qualified_course.forEach(val => {
                        $('#select-course').append($('<option>', {
                            value: val.id,
                            text: val.name_mm
                        }));
                    });

                    $('#more-modal').modal('show')

                    break;
                case _MAIN_TITLE[3]: // CPA FF PAPP
                    clearModalContent()
                    setModalContent('CPA(FF) AND PAPP SECTION', _CPA_PAPP);

                    $('#select-course').empty();

                    $('#select-course').append($('<option>', {
                        value: '',
                        text: 'Select Course'
                    }));

                    let cpa_papp_course = course.filter(val => {
                        return val.course_type_id == 2
                    });

                    cpa_papp_course.forEach(val => {
                        $('#select-course').append($('<option>', {
                            value: val.id,
                            text: val.name_mm
                        }));
                    });

                    $('#more-modal').modal('show')

                    break;
                case _MAIN_TITLE[4]: // CPA FF PAPP
                    clearModalContent()
                    setModalContent('Article Section', _ARTICLE);

                    $('#select-course').empty();

                    $('#select-course').append($('<option>', {
                        value: '',
                        text: 'Select Course'
                    }));

                    let article = course.filter(val => {
                        return val.course_type_id == 2
                    });

                    article.forEach(val => {
                        $('#select-course').append($('<option>', {
                            value: val.id,
                            text: val.name_mm
                        }));
                    });

                    $('#more-modal').modal('show')

                    break;
                case _MAIN_TITLE[5]: 
                    clearModalContent()
                    setModalContent('ARTICLE SECTION (MENTOR)', _ARTICLE_SECTION_MENTOR)

                    $('#more-modal').modal('show')

                    break;
                case _MAIN_TITLE[6]: 
                    clearModalContent()
                    setModalContent('FIRM NAME', _FIRM_NAME)

                    $('#more-modal').modal('show')

                    break;
                case _MAIN_TITLE[7]: 
                    clearModalContent()
                    setModalContent('TEACHER / SCHOOL', _TEACHER_SCHOOL)

                    $('#more-modal').modal('show')

                    break;
                default:
                    clearModalContent()

                    $('#more-modal').modal('show')

                    $('#title').text('No Title is Set')

                    $('#more-title').append(`<p>Not Sub Title is Set</p`)
            }
        })

        function setModalContent(title, body) {

            $('#title').text(title)

            body.map((val, index) => {

                let elem = `<div class="row mb-2">
                    <div class="col-md-12">
                        <div class="list-group">
                            <button type="button" data-url="${val.route_name}" class="list-group-item list-group-item-action disabled" onclick="${val.fun_name}">
                                ${val.sub_title}
                            </button>
                        </div>
                    </div>
                </div>`

                $('#more-title').append(elem)
            });

            // onChangeBatch()
        }

        function clearModalContent() {
            // Fist Clear The Contents of The Modal
            $('#title').text('')

            $('#more-title').children().not(':first').remove()

            $('#select-batch').val('')
        }

        $('#select-course').on('change', function() {

            $.getJSON(`${BACKEND_URL}/get_batch/${$(this).val()}`, function(data) {
                if (data != null) {
                    $('#select-batch').empty();

                    $('#select-batch').append($('<option>', {
                        value: '',
                        text: 'Select Batch'
                    }));

                    data.data.forEach(val => {
                        $('#select-batch').append($('<option>', {
                            value: val.id,
                            text: val.name_mm
                        }));
                    });
                }
            });

        });

        // function onChangeBatch() {
        //     $('#select-batch').on('change', function() {
        //         let batch = $(this).val()

        //         if (batch !== '') {
        //             $('.list-group').each(function() {
        //                 $(this).find('a').removeClass('disabled')

        //                 let base_url = $(this).find('a').attr('href')
        //                 let url_split = base_url.split('/')

        //                 if (url_split.length > 4) {
        //                     base_url = base_url.slice(0, base_url.lastIndexOf('/'))

        //                     $(this).find('a').attr('href', base_url + `/${batch}`)
        //                 } else {
        //                     $(this).find('a').attr('href', base_url + `/${batch}`)
        //                 }
        //             })
        //         } else {
        //             $('.list-group').each(function() {
        //                 $(this).find('a').addClass('disabled')

        //                 let base_url = $(this).find('a').attr('href')
        //                 base_url = base_url.slice(0, base_url.lastIndexOf('/'))

        //                 $(this).find('a').attr('href', base_url)
        //             })
        //         }
        //     })
        // }

        $('document').ready(function() {
            $('.card').each(function() {
                let title = $(this).find('.show-more-modal').data('section')
                let span_text = $(this).find('span')

                switch (title) {
                    case _MAIN_TITLE[0]:
                        span_text.text(_DA.length)
                        break;
                    case _MAIN_TITLE[1]:
                        span_text.text(_CPA.length)
                        break;
                    case _MAIN_TITLE[2]:
                    span_text.text(_CPA_QUALIFIED.length)
                    break;
                    case _MAIN_TITLE[3]:
                        span_text.text(_CPA_PAPP.length)
                        break;
                    case _MAIN_TITLE[4]: 
                        span_text.text(_ARTICLE.length)
                        break;
                    case _MAIN_TITLE[5]: 
                        span_text.text(_ARTICLE_SECTION_MENTOR.length)
                        break;
                    case _MAIN_TITLE[6]: 
                        span_text.text(_FIRM_NAME.length)
                        break;
                    case _MAIN_TITLE[7]: 
                        span_text.text(_TEACHER_SCHOOL.length)
                        break;
                    default:
                        span_text.text('0')
                }
            })
        })

        function daAttendList(url) {
            
            if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
                $('#report-form').attr('action', url);
                $('#report-form').submit();
            } else {
                alert('select course and batch');
            }
        }

        function daRegList(url) {
            if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
                $('#report-form').attr('action', url);
                $('#report-form').submit();
            } else {
                alert('select course and batch');
            }
        }

        function daExamRegList(url) {
            if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
                $('#report-form').attr('action', url);
                $('#report-form').submit();
            } else {
                alert('select course and batch');
            }
        }

        function daPassList(url) {
            if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
                $('#report-form').attr('action', url);
                $('#report-form').submit();
            } else {
                alert('select course and batch');
            }
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
            right: 0;
	    }   

        .modal.right.fade .modal-dialog {
            -webkit-transform: translate(100%, 0)scale(1);
            transform: translate(100%, 0)scale(1);
        }

        .modal.fade.show .modal-dialog {
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
            display: flex;
            align-items: stretch;
            -webkit-box-align: stretch;
            height: 100%;
        }

        a.disabled {
            pointer-events: none;
        }

    </style>
@endpush
