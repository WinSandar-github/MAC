
function getExam() {
    $('#tbl_exam').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        searching: false,
        paging: true,
        ajax: {
            url: BACKEND_URL + "/filter_exam",
            type: "POST",
            data: function (d) {
                d.name = $("input[name=filter_by_name]").val(),
                    d.course_name = $('#filter_course_id').val(),
                    d.start_date = $("input[name=filter_by_start_date]").val(),
                    d.end_date = $("input[name=filter_by_end_date]").val()

            }
        },
        columns: [
            { data: "id", name: 'No' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
            { data: 'course.name', name: 'course.name' },
            { data: 'batch.name', name: 'batch.name' },
            { data: 'exam_start_date', name: 'start_date' },
            { data: 'exam_end_date', name: 'end_date' },
            { data: 'exam_start_time', name: 'exam_start_time' },
            { data: 'exam_end_time', name: 'exam_end_time' },
            { data: 'exam_place', name: 'exam_place' },
        ],
        "dom": '<"float-left"l><"float-right"f>rt<"bottom float-left"i><"bottom float-right"p><"clear">',

    });
}

function createExam() {
    var send_data = new FormData();
    send_data.append('course_id', $('#selected_ecourse_id').val());
    send_data.append('batch_id', $('#selected_ebatch_id').val() !== null ? $('#selected_ebatch_id').val() : 0);
    send_data.append('exam_type_id', $('#selected_examtype_id').val());
    send_data.append('exam_start_date', $("input[name=exam_start_date]").val());
    send_data.append('exam_end_date', $("input[name=exam_end_date]").val());
    send_data.append('exam_start_time', $("input[name=exam_start_time]").val());
    send_data.append('exam_end_time', $("input[name=exam_end_time]").val());
    send_data.append('exam_place', $("input[name=exam_place]").val());
    show_loader();
    $.ajax({
        url: BACKEND_URL + "/exam",
        type: 'post',
        data: send_data,
        contentType: false,
        processData: false,
        success: function (result) {
            EasyLoading.hide();

            successMessage(result.message);

            setInterval(() => {
                window.location.reload();
            }, 3000);
        },
        error: function (res) {
            errorMessage(res.responseJSON.message);
        }
    });
}

function loadeCourse() {

    let exam_type_id = document.getElementById("selected_examtype_id").value;

    $.ajax({
        url: BACKEND_URL + "/course",
        type: 'get',
        data: "",
        success: function (data) {
            var course_data;
            $('#selected_ecourse_id').empty();
            $('#selected_ebatch_id').empty().append("<option>Select batch </option>");
            course_data = exam_type_id == 1 ? data.data : data.data.filter(course => course.code == 'cpa_1');


            var opt = `<option select disabled  >Select Course </option>`;

            console.log(course_data);
            // course_data.length == 1 && loadeBatch(course_data[0]['id']);
            course_data.forEach(function (element) {
                opt += `<option value=${element.id}  >${element.name}</option>`;

            });
            $("#selected_ecourse_id").append(opt);

            loadeBatch();

        },
        error: function (message) {

        }

    });
}

function loadExamType() {

    var select = document.getElementById("selected_examtype_id");
    $.ajax({
        url: BACKEND_URL + "/get_exam_type",
        type: 'get',
        data: "",
        success: function (data) {

            var exam_type_data = data.data;


            exam_type_data.forEach(function (element) {
                var option = document.createElement('option');
                option.text = element.name;
                option.value = element.id;
                select.add(option, 1);


            });



        },
        error: function (message) {

        }

    });
}

function loadeBatch() {
    let course_id = document.getElementById("selected_ecourse_id").value;




    // var select = document.getElementById("selected_ebatch_id");
    $.ajax({
        url: BACKEND_URL + "/get_batch/" + course_id,
        type: 'get',
        data: "",
        success: function (data) {

            var batch_data = data.data;
            $('#selected_ebatch_id').empty();
            var opt = `<option select disabled  >Select Batch </option>`;

            batch_data.forEach(function (element) {
                console.log("Exam >>", element.name)

                opt += `<option value=${element.id}  >${element.name}</option>`;



            });
            $("#selected_ebatch_id").append(opt);
        },
        error: function (message) {

        }

    });
}

function updateExam() {
    var send_data = new FormData();
    send_data.append('course_id', $('#selected_ecourse_id').val());
    send_data.append('batch_id', $('#selected_ebatch_id').val() !== null ? $('#selected_ebatch_id').val() : 0);

    send_data.append('exam_type_id', $('#selected_examtype_id').val());

    send_data.append('exam_start_date', $("input[name=exam_start_date]").val());
    send_data.append('exam_end_date', $("input[name=exam_end_date]").val());
    send_data.append('exam_start_time', $("input[name=exam_start_time]").val());
    send_data.append('exam_end_time', $("input[name=exam_end_time]").val());
    send_data.append('exam_place', $("input[name=exam_place]").val());
    send_data.append('_method', 'PUT');
    var id = $("input[name=exam_id]").val();


    show_loader();
    $.ajax({
        url: BACKEND_URL + "/exam/" + id,
        type: 'post',
        data: send_data,
        contentType: false,
        processData: false,
        success: function (result) {
            EasyLoading.hide();
            successMessage("Update Successfully");
            $('#create_exam_modal').modal('toggle');
            location.reload();
        }
    });
}



function showExamInfo(id) {

    $("#exam_form").attr('action', 'javascript:updateExam()');
    $("input[name=exam_id]").val(id);
    $.ajax({
        type: "get",
        url: BACKEND_URL + "/exam/" + id,
        success: function (data) {
            var exam_data = data.data;
            console.log(exam_data)
            $('#selected_examtype_id').val(exam_data.exam_type_id);
            loadeCourse();
            $('#selected_ecourse_id').val(exam_data.course_id);
            loadeBatch();
            $('#selected_ebatch_id').val(exam_data.batch_id);
            $("input[name=exam_start_date]").val(exam_data.exam_start_date);
            $("input[name=exam_end_date]").val(exam_data.exam_end_date);
            $("input[name=exam_start_time]").val(exam_data.exam_start_time);
            $("input[name=exam_end_time]").val(exam_data.exam_end_time);
            $("input[name=exam_place]").val(exam_data.exam_place);

            $('#create_exam_modal').modal('toggle');
        },

        error: function (message) {
            errorMessage(message);
        }
    });
}


function deleteExamInfo(exam_id) {
    var result = confirm("WARNING: This will delete Exam and all related data! Press OK to proceed.");
    if (result) {
        $.ajax({
            type: "DELETE",
            url: BACKEND_URL + '/exam/' + exam_id,
            success: function (result) {
                successMessage("Delete Successfully");
                location.reload();
            },
            error: function (message) {
                errorMessage(message);
            }
        });
    }
}


function showExamRoomModal(student_info_id, exam_id) {
    $('#exam_register_id').val(exam_id)
    $.ajax({
        type: "get",
        url: BACKEND_URL + "/exam_register/" + exam_id,
        success: function (data) {
            console.log(data[0])
            var exam_data = data.data;

            $("input[name=exam_room]").val(exam_data[0].exam_room);
            $("input[name=exam_building]").val(exam_data[0].exam_building);
            $("input[name=exam_place]").val(exam_data[0].exam_place);

            $('#exam_room_model').modal('show');

        },

        error: function (message) {
            errorMessage(message);
        }
    });



}

function createExamRoom() {
    let formData = new FormData();
    formData.append('exam_room', $("input[name=exam_room]").val());
    formData.append('exam_building', $("input[name=exam_building]").val());
    // formData.append('exam_place', $("input[name=exam_place]").val());
    formData.append('id', $("input[name=exam_register_id]").val());


    show_loader();
    $.ajax({
        url: BACKEND_URL + "/create_exam_room",
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (result) {
            EasyLoading.hide();
            successMessage(result.message);
            $('#exam_room_model').modal('toggle');
            location.reload();
        }
    });


}