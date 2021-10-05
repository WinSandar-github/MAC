function thousands_separators(num) {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
}

function removeComma(number) {
    var number_part = parseInt(number.split(',').join(""));
    return number_part;
}

function getCourseList() {
    $('#tbl_sub_course').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: BACKEND_URL + "/filter_course/all",
        columns: [
            { data: "id", name: 'No' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'Description' },
            { data: 'form_fee', name: 'Application Fee' },
            { data: 'selfstudy_registration_fee', name: 'Self-Study Registration Fee' },
            { data: 'privateschool_registration_fee', name: 'Private School Registration Fee' },
            { data: 'mac_registration_fee', name: 'MAC Registration Fee' },
            { data: 'exam_fee', name: 'Exam Fee' },
            { data: 'tution_fee', name: 'Course Fee' },
            { data: 'cpa_subject_fee', name: 'CPA Subject Fee' },
            { data: 'da_subject_fee', name: 'DA Subject Fee' },
            { data: 'requirements', name: 'Requirement' },
        ],
    });
}

function createMainCourse() {
    var course_name = $("input[name=main_cousre_name]").val();
    var course_name_mm = $("input[name=main_course_name_mm]").val();
    var course_description = $("input[name=main_cousre_description]").val();
    var formData = new FormData(document.getElementById("main_course_form"));

    if (course_name !== "" && course_description !== "" && course_name_mm == "") {
        show_loader();
        $.ajax({
            url: FRONTEND_URL + "/main_course",
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                EasyLoading.hide();
                successMessage(result.message);
                setInterval(() => {
                    window.location.reload();
                }, 3000);
            },
            error: function (response) {
                EasyLoading.hide();
                errorMessage(response.responseJSON.message);
            }
        });
    }else{
        errorMessage("Please Fill Required Field!");
    }
}

function createCourse() {
    var send_data = new FormData();
    send_data.append('name', $("input[name=course_name]").val());
    send_data.append('name_mm', $("input[name=course_name_mm]").val());
    send_data.append('form_fee', removeComma($("input[name=form_fee]").val()));
    send_data.append('selfstudy_registration_fee', removeComma($("input[name=selfstudy_registration_fee]").val()));
    send_data.append('privateschool_registration_fee', removeComma($("input[name=privateschool_registration_fee]").val()));
    send_data.append('mac_registration_fee', removeComma($("input[name=mac_registration_fee]").val()));
    // send_data.append('exam_fee',removeComma($("input[name=exam_fee]").val()));
    send_data.append('tution_fee', removeComma($("input[name=tution_fee]").val()));
    send_data.append('cpa_subject_fee', removeComma($("input[name=cpa_subject_fee]").val()));
    send_data.append('da_subject_fee', removeComma($("input[name=da_subject_fee]").val()));

    send_data.append('description', $("input[name=description]").val());
    send_data.append('code', $("input[name=code]").val());
    send_data.append('exam_fee', $("input[name=exam_fee]").val());
    send_data.append('course_type_id', $('.course_type').val());
    send_data.append('requirement_id', $('.requirement_id').val());

    // $('select[name="requirement_id[]"]').map(function(){
    //     for (var i = 0; i < $(this).get(0).selected.length; ++i) {
    //         send_data.append('requirement_id[]',$(this).get(0).files[i]);
    //     }
    // });

    show_loader();
    $.ajax({
        url: BACKEND_URL + "/course",
        type: 'post',
        data: send_data,
        contentType: false,
        processData: false,
        success: function (result) {

            EasyLoading.hide();
            successMessage("Insert Successfully");
            setInterval(() => {
                window.location.reload();
            }, 3000);
            // getCourseList();
            // location.reload();
        },
        error: function (message) {
            EasyLoading.hide();
            errorMessage(message);
        }
    });
}

function getCourse() {

    destroyDatatable("#tbl_course", "#tbl_course_body");

    var course_name = $("input[name=filter_name]").val();

    if ($("input[name=filter_name]").val() == "") {
        course_name = "all";
    } else {
        course_name = $("input[name=filter_name]").val();
    }

    show_loader();

    $.ajax({
        url: BACKEND_URL + "/filter_course/" + course_name,
        type: 'get',
        data: "",
        success: function (data) {

            EasyLoading.hide();

            var course_data = data.data;
            console.log('data', data.data)
            course_data.forEach(function (element) {
                console.log('course_element', element)

                // var requirements = element.requirement_id;
                // console.log(requirements)
                // console.log(requirement_list,"Requirement")

                filter_requirement = requirement_list.filter((req_list) => element.requirement_id.includes(req_list.id))

                // var requirements_name=requirements.replace(/[\[\]"]+/g,"");
                var tr = "<tr>";
                tr += "<td>" + +"</td>";
                tr += "<td ><div class='btn-group'>";
                tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showCourseInfo(" + element.id + ")'>" +
                    "<li class='fa fa-edit fa-sm'></li></button> ";
                tr += "<button type='button' class='btn btn-danger btn-xs' onClick='deleteCourseInfo(\"" + encodeURIComponent(element.name) + "\"," + element.id + ")'><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
                tr += "<td>" + element.name + "</td>";
                tr += "<td>" + element.description + "</td>";
                tr += "<td>" + thousands_separators(element.form_fee) + "</td>";
                tr += "<td>" + thousands_separators(element.selfstudy_registration_fee) + "</td>";
                tr += "<td>" + thousands_separators(element.privateschool_registration_fee) + "</td>";
                tr += "<td>" + thousands_separators(element.mac_registration_fee) + "</td>";
                // tr += "<td>" + thousands_separators(element.exam_fee) + "</td>";
                tr += "<td>" + thousands_separators(element.tution_fee) + "</td>";
                tr += "<td>" + thousands_separators(element.cpa_subject_fee) + "</td>";
                tr += "<td>" + thousands_separators(element.da_subject_fee) + "</td>";
                tr += `<td>${filter_requirement.map((req) => `<p>${req.name}</p>`)}</td>`;

                tr += "</tr>";
                $("#tbl_course_body").append(tr);

            });

            getIndexNumber('#tbl_course tr');
            createDataTable("#tbl_course");
        },
        error: function (message) {
            dataMessage(message, "#tbl_course", "#tbl_course_body");
        }

    });
}

function showMainCourseInfo(id) {
    $("#main_course_form").get(0).reset();
    $('#mainModalLabel').text("Update Main Course");
    $("#main_course_form").attr('action', 'javascript:updateMainCourse()');
    $('input[name=main_course_id]').val(id);
    $.ajax({
        type: "get",
        url: FRONTEND_URL + "/main_course/" + id,
        success: function (result) {
            $('input[name=main_course_name]').val(result.course_name);
            $('#main_summernote').summernote('code', result.course_description);
            $('#main_course_modal').modal('toggle');
        },
        error: function (res) {
            errorMessage(res.responseJSON.message);
        }
    });
}

function showCourseInfo(id) {
    $("#course_form").attr('action', 'javascript:updateCourse()');
    $("input[name=course_id]").val(id);
    $.ajax({
        type: "get",
        url: BACKEND_URL + "/course/" + id,
        success: function (data) {
            var course_data = data.data;
            console.log('show course', course_data);
            // removeBracketed(course_data.requirement_id,"requirement_id");
            $('input[name=course_name]').val(course_data.name);
            $('input[name=course_name_mm]').val(course_data.name_mm);
            $('input[name=form_fee]').val(course_data.form_fee);
            $('input[name=selfstudy_registration_fee]').val(course_data.selfstudy_registration_fee);
            $('input[name=privateschool_registration_fee]').val(course_data.privateschool_registration_fee);
            $('input[name=mac_registration_fee]').val(course_data.mac_registration_fee);
            $('input[name=exam_fee]').val(course_data.exam_fee);
            $('input[name=tution_fee]').val(course_data.tution_fee);
            $('input[name=registration_start_date]').val(course_data.registration_start_date);
            $('input[name=registration_end_date]').val(course_data.registration_end_date);
            $('input[name=description]').val(course_data.description);
            $('input[name=code]').val(course_data.code);
            $('.course_type').val(course_data.course_type_id);
            $("input[name=cpa_subject_fee]").val(course_data.cpa_subject_fee);
            $("input[name=da_subject_fee]").val(course_data.da_subject_fee);
            // $('.requirement_id').val(course_data.requirement_id);

            // if(course_data.requirement_id!=null){

            //     removeBracketed(course_data.requirement_id,"requirement_id");

            // }else {
            //     $(".requirement_id").append("<select name='requirement_id[]' class='form-control requirement_id multiple-requirement' multiple='multiple' required style='width:100%'></select>");

            // }

            var req_str = course_data.requirement_id.replace(",", "");
            console.log(req_str, "Req String")

            //change string to array
            var req_arr = [...req_str];
            $('.requirement_id').select2().val(req_arr).trigger('change');

            $('#create_course_modal').modal('toggle');
        },

        error: function (message) {
            errorMessage(message);
        }
    });

}

// function removeBracketed(selectdata,divname){
//     var new_selectdata=selectdata.replace(/[\'"[\]']+/g, '');
//     // var split_new_selectdata=new_selectdata.split(',');
//     console.log('split_new_selectdata',new_selectdata);
//     for(var i=0;i<new_selectdata.length;i++){
//         var selectdata="<option value=('"+new_selectdata[i]+"')>"+new_selectdata[i]+" </option>";
//         $("."+divname).append(selectdata);
//     }
// }

function updateMainCourse() {
    var id = $('input[name=main_course_id]').val();
    var formData = new FormData(document.getElementById('main_course_form'));
    $.ajax({
        type: 'patch',
        url: FRONTEND_URL + '/main_course/' + id,
        data: {
            main_course_name: formData.get('main_course_name'),
            main_course_description: formData.get("main_course_description")
        },
        success: function (result) {
            successMessage(result.message);
            setInterval(() => {
                window.location.reload();
            }, 3000);
        },
        error: function (response) {
            errorMessage(response.responseJSON.message);
        }
    });
}

function updateCourse() {
    var id = $("input[name=course_id]").val();
    var name = $("input[name=course_name]").val();
    var name_mm = $("input[name=course_name_mm]").val();
    var form_fee = $("input[name=form_fee]").val();
    var selfstudy_registration_fee = $("input[name=selfstudy_registration_fee]").val();
    var privateschool_registration_fee = $("input[name=privateschool_registration_fee]").val();
    var mac_registration_fee = $("input[name=mac_registration_fee]").val();
    var exam_fee = $("input[name=exam_fee]").val();
    var tution_fee = $("input[name=tution_fee]").val();
    var registration_start_date = $("input[name=registration_start_date]").val()
    var registration_end_date = $("input[name=registration_end_date]").val()
    var description = $("input[name=description]").val();
    var code = $("input[name=code]").val();

    var course_type_id = $('.course_type').val();
    var requirement_id = $('.requirement_id').val();
    // var cpa_subject_fee = $("input[name=cpa_subject_fee]").val();
    // var da_subject_fee = $("input[name=da_subject_fee]").val();
    var cpa_subject_fee = $("input[name=cpa_subject_fee]").val();
    var da_subject_fee = $("input[name=da_subject_fee]").val();
    console.log('requirement_id', requirement_id);
    show_loader();

    $.ajax({
        url: BACKEND_URL + "/course/" + id,
        type: 'patch',
        data: {
            name: name,
            name_mm: name_mm,
            form_fee: form_fee,
            selfstudy_registration_fee: selfstudy_registration_fee,
            privateschool_registration_fee: privateschool_registration_fee,
            mac_registration_fee: mac_registration_fee,
            exam_fee: exam_fee,
            tution_fee: tution_fee,
            registration_start_date: registration_start_date,
            registration_end_date: registration_end_date,
            description: description,
            code: code,
            course_type_id: course_type_id,
            requirement_id: requirement_id,
            cpa_subject_fee: cpa_subject_fee,
            da_subject_fee: da_subject_fee
        },
        success: function (result) {

            EasyLoading.hide();
            successMessage("Update Successfully");
            $('#create_course_modal').modal('toggle');
            //getCourseList();
            //window.location.reload();
            // getCourse();


        }
    });
}

function deleteMainCourseInfo(courseName, id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: FRONTEND_URL + 'main_course/' + id,
                success: function (result) {
                    Swal.fire({
                        title: 'Deleted',
                        text: result.message,
                        icon: 'success',
                    }).then(() => {
                        window.location.reload();
                    });
                },
                error: function (res) {
                    errorMessage(res.responseJSON.message);
                }
            });
        }
    })
}

function deleteCourseInfo(courseName, courseId) {
    var result = confirm("WARNING: This will delete Course Name " + decodeURIComponent(courseName) + " and all related data! Press OK to proceed.");
    if (result) {
        $.ajax({
            type: "DELETE",
            url: BACKEND_URL + '/course/' + courseId,
            success: function (result) {
                successMessage("Delete Successfully");
                getCourse();
            },
            error: function (message) {
                errorMessage(message);
            }
        });
    }
}

function loadCourse() {
    var select = document.getElementById("selected_course_id");
    $.ajax({
        url: BACKEND_URL + "/course",
        type: 'get',
        data: "",
        success: function (data) {

            var course_data = data.data;
            course_data.forEach(function (element) {
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

function loadCourseToFilter() {
    var select = document.getElementById("filter_course_id");
    $.ajax({
        url: BACKEND_URL + "/course",
        type: 'get',
        data: "",
        success: function (data) {

            var course_data = data.data;
            course_data.forEach(function (element) {
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

function getRequirementCourse() {
    $.ajax({
        url: BACKEND_URL + '/get_requirement_id',
        type: 'GET',
        success: function (response) {
            requirement_list = response.data;
        }
    });
}
