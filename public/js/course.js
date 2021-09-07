function thousands_separators(num) {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
}

function removeComma(number) {
    var number_part = parseInt(number.split(',').join(""));
    return number_part;
}

function createCourse() {
    var send_data = new FormData();
    send_data.append('name', $("input[name=course_name]").val());
    send_data.append('form_fee', removeComma($("input[name=form_fee]").val()));
    send_data.append('selfstudy_registration_fee', removeComma($("input[name=selfstudy_registration_fee]").val()));
    send_data.append('privateschool_registration_fee', removeComma($("input[name=privateschool_registration_fee]").val()));
    send_data.append('mac_registration_fee', removeComma($("input[name=mac_registration_fee]").val()));
    // send_data.append('exam_fee',removeComma($("input[name=exam_fee]").val()));
    send_data.append('tution_fee', removeComma($("input[name=tution_fee]").val()));
    send_data.append('description', $("input[name=description]").val());
    send_data.append('code', $("input[name=code]").val());

    send_data.append('course_type_id', $('.course_type').val());
    send_data.append('requirement_id[]', $('.requirement_id').val());

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
            location.reload();
        },
        error: function (message) {
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

function showCourseInfo(id) {
    console.log('id', id);

    $("#course_form").attr('action', 'javascript:updateCourse()');
    $("input[name=course_id]").val(id);
    $.ajax({
        type: "get",
        url: BACKEND_URL + "/course/" + id,
        success: function (data) {
            var course_data = data.data;
            console.log('show course', course_data);
            // removeBracketed(course_data.requirement_id,"requirement_id");
            $('input[name=course_name]').val(course_data.course_name);
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

function updateCourse() {
    var id = $("input[name=course_id]").val();
    var name = $("input[name=name]").val();
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

    show_loader();

    $.ajax({
        url: BACKEND_URL + "/course/" + id,
        type: 'patch',
        data: {
            name: name,
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
            requirement_id: requirement_id
        },
        success: function (result) {
            EasyLoading.hide();
            successMessage("Update Successfully");
            $('#create_course_modal').modal('toggle');
            // location.reload();
            getCourse();


        }
    });
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
