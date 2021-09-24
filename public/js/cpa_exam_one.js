// function loadCPABatchData(){
//     var select = document.getElementById("selected_batch_id");
//     $.ajax({
//         url: BACKEND_URL+"/course_by_course_type/2",
//         type: 'get',
//         data:"",
//         success: function(data){
//             var course_data=data.data;
//             console.log("course_data",course_data);
//             course_data.forEach(function (element) {
//                 element.batches.forEach(function (batch){
//                     var option = document.createElement('option');
//                     option.text = batch.name;
//                     option.value = batch.id;
//                     select.add(option, 0);
//                 });
//             });
//         },
//         error:function (message){

//         }
//     });
// }

function getCPAExam(course_code) {
    destroyDatatable("#tbl_cpa_pending_exam", "#tbl_cpa_pending_exam_body");
    destroyDatatable("#tbl_cpa_approved_exam", "#tbl_cpa_approved_exam_body");
    destroyDatatable("#tbl_cpa_rejected_exam", "#tbl_cpa_rejected_exam_body");
    var batch = $("#selected_batch_id").val();
    var send_data = new FormData();
    send_data.append('name', $("input[name=filter_by_name]").val());
    send_data.append('batch', batch);
    if(course_code=="da_1"){
        course_id=1;
    }
    else if(course_code=="da_2"){
        course_id=2;
    }
    else if(course_code=="cpa_1"){
        course_id=3;
    }
    else if(course_code=="cpa_2"){
        course_id=4;
    }
    send_data.append('course_code', course_id);
    $.ajax({
        url: BACKEND_URL + "/filter",
        type: 'post',
        data: send_data,
        contentType: false,
        processData: false,
        success: function (data) {
            var da_data = data.data;
            console.log({
                da_data
            });
            da_data.forEach(function (element) {
                if (element.status == 0) {
                    status = "PENDING";
                } else if (element.status == 1) {
                    status = "APPROVED";
                } else {
                    status = "REJECTED";
                }

                if (element.exam_type_id == 0) {
                    exam_type_id = "SELF STUDY";
                } else if (element.exam_type_id == 1) {
                    exam_type_id = "PRIVATE SCHOOL";
                } else {
                    exam_type_id = "MAC STUDENT";
                }

                if (element.grade == 0) {
                    grade = "-";
                } else if (element.grade == 1) {
                    grade = "PASSED";
                } else {
                    grade = "FAILED";
                }
                if (element.status == 0) {
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showCPAOneExam(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";

                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + exam_type_id + "</td>";
                    tr += "<td>" + grade + "</td>";
                    tr += "<td>" + status + "</td>";
                    // tr += "<td>" + element.batch_id+ "</td>";

                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='printCPAOneExamCard(" + element.student_info.id + ")'>" +
                        "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_cpa_pending_exam_body").append(tr);
                } else if (element.status == 1) {
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showCPAOneExam(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";

                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + element.exam_type_id + "</td>";
                    tr += "<td>" + element.grade + "</td>";
                    tr += "<td>" + status + "</td>";
                    // tr += "<td>" + element.batch_id+ "</td>";

                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='printCPAOneExamCard(" + element.student_info.id + ")'>" +
                        "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_cpa_approved_exam_body").append(tr);
                } else if (element.status == 2) {
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showCPAOneExam(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";

                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + element.exam_type_id + "</td>";
                    tr += "<td>" + element.grade + "</td>";
                    tr += "<td>" + status + "</td>";
                    // tr += "<td>" + element.batch_id+ "</td>";

                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='printCPAOneExamCard(" + element.student_info.id + ")'>" +
                        "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_cpa_rejected_exam_body").append(tr);
                }
            });
            getIndexNumber('#tbl_cpa_pending_exam tr');
            createDataTable("#tbl_cpa_pending_exam");
            getIndexNumber('#tbl_cpa_approved_exam tr');
            createDataTable("#tbl_cpa_approved_exam");
            getIndexNumber('#tbl_cpa_rejected_exam tr');
            createDataTable("#tbl_cpa_rejected_exam");
        },
        error: function (message) {
            dataMessage(message, "#tbl_cpa_pending_exam", "#tbl_cpa_pending_exam_body");
            dataMessage(message, "#tbl_cpa_approved_exam", "#tbl_cpa_approved_exam_body");
            dataMessage(message, "#tbl_cpa_rejected_exam", "#tbl_cpa_rejected_exam_body");
        }
    });
}

function showCPAOneExam(studentId) {
    localStorage.setItem("student_id", studentId);
    location.href = FRONTEND_URL + "/cpa_exam_one_edit";
}

function showCPATwoExam(studentId) {
    localStorage.setItem("student_id", studentId);
    location.href = FRONTEND_URL + "/cpa_two_exam_edit";
}

function printCPAOneExamCard(studentId) {
    localStorage.setItem("student_id", studentId);
    location.href = FRONTEND_URL + "/cpa1_examcard";
}

function loadCPAStudentDataForExamCard() {
    var id = localStorage.getItem("student_id");
    $("#roll_no").html("");
    $("#name").html("");
    $("#nrc").html("");
    console.log(id);
    $("input[name = student_info_id]").val(id);

    $.ajax({
        type: "GET",
        url: BACKEND_URL + "/exam_register/" + id,
        success: function (data) {
            var exam_datas = data.data;
            exam_datas.forEach(function (exam_data) {
            console.log(exam_data.student_info.image);
            // document.getElementById('student_img').src = PDF_URL + exam_data.student_info.image;
            $("#roll_no").append(exam_data.id);
            $("#name").append(exam_data.student_info.name_mm);
            $("#nrc").append(exam_data.student_info.nrc_state_region + "/" + exam_data.student_info.nrc_township + "(" + exam_data.student_info.nrc_citizen + ")" + exam_data.student_info.nrc_number);
            $("#father_name").append(exam_data.student_info.father_name_mm);
            });
        }
    })
}

function approveCPAOneExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/approve_exam/" + id,
        type: 'PATCH',
        success: function (result) {
            console.log(result)
            successMessage("You have approved that form!");
            location.href = FRONTEND_URL + "/cpa_exam_one";
            getCPAExam();
        }
    });
}

function rejectCPAOneExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/reject_exam/" + id,
        type: 'PATCH',
        success: function (result) {
            console.log(result)
            successMessage("You have rejected that form!");
            location.href = FRONTEND_URL + "/cpa_exam_one";
            getCPAExam();
        }
    });
}

function approveCPATwoExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/approve_exam/" + id,
        type: 'PATCH',
        success: function (result) {
            console.log(result)
            successMessage("You have approved that form!");
            location.href = FRONTEND_URL + "/cpa_two_exam";
            getCPAExam();
        }
    });
}

function rejectCPATwoExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/reject_exam/" + id,
        type: 'PATCH',
        success: function (result) {
            console.log(result)
            successMessage("You have rejected that form!");
            location.href = FRONTEND_URL + "/cpa_two_exam";
            getCPAExam();
        }
    });
}

function loadCPAExamData() {
    var id = localStorage.getItem("student_id");
    // console.log(id);
    $("#school_name").html("");
    $("#exam_type").html("");
    $("#student_grade").html("");
    $("#student_status").html("");

    $("#name_eng").html("");
    $("#name_mm").html("");
    $("#nrc").html("");
    $("#father_name_mm").html("");
    $("#father_name_eng").html("");
    $("#race").html("");
    $("#religion").html("");
    $("#date_of_birth").html("");
    $("#address").html("");
    $("#current_address").html("");
    $("#phone").html("");
    $("#email").html("");
    $("#gov_staff").html("");
    $("#image").html("");
    $("#registration_no").html("");

    $("#university_name").html("");
    $("#degree_name").html("");
    $("#qualified_date").html("");
    $("#roll_number").html("");
    $("#certificate").html("");

    $("#name").html("");
    $("#position").html("");
    $("#department").html("");
    $("#organization").html("");
    $("#company_name").html("");
    $("#salary").html("");
    $("#office_address").html("");

    $("input[name = student_id]").val(id);

    $.ajax({
        type: "GET",
        url: BACKEND_URL + "/exam_register/" + id,
        success: function (data) {
            var exam_data = data.data;
            
            exam_data.forEach(function (element) {
                console.log('element',element);
                if (element.status == 0) {
                    status = "PENDING";
                } else if (element.status == 1) {
                    status = "APPROVED";
                } else {
                    status = "REJECTED";
                }

                // if (element.exam_type_id == 0) {
                //     exam_type_id = "SELF STUDY";
                // } else if (element.exam_type_id == 1) {
                //     exam_type_id = "PRIVATE SCHOOL";
                // } else {
                //     exam_type_id = "MAC STUDENT";
                // }

                if (element.exam_type_id == 1) {
                    $(".is_private_row").show();
                } else {
                    $(".is_private_row").hide();
                }

                if (element.grade == 0) {
                    grade = "-";
                } else if (element.grade == 1) {
                    grade = "PASSED";
                } else {
                    grade = "FAILED";
                }

                if (element.form_type == 1) {
                    exam_type_id = "DA - I";
                } else if (element.form_type == 2) {
                    exam_type_id = "DA - II";
                } else if (element.form_type == 3) {
                    exam_type_id = "CPA - I";
                } else {
                    exam_type_id = "CPA - II";
                }

                $("#school_name").append(element.private_school_name);
                $("#exam_type").append(exam_type_id);
                $("#student_grade").append(grade);
                $("#student_status").append(status);
                if (element.status == 0) {
                    document.getElementById("approve").style.display = 'block';
                    document.getElementById("reject").style.display = 'block';
                } else {
                    document.getElementById("approve").style.display = 'none';
                    document.getElementById("reject").style.display = 'none';
                }

                element = element.student_info;
                var education_history = element.student_education_histroy;
                console.log('education_history',education_history);
                var job = element.student_job;
                $("#id").append(element.id);
                document.getElementById('image').src = PDF_URL + element.image;
                $("#name_eng").append(element.name_eng);
                $("#name_mm").append(element.name_mm);
                $("#nrc").append(element.nrc_state_region + "/" + element.nrc_township + "(" + element.nrc_citizen + ")" + element.nrc_number);
                $("#father_name_mm").append(element.father_name_mm);
                $("#father_name_eng").append(element.father_name_eng);
                $("#race").append(element.race);
                $("#religion").append(element.religion);
                $("#date_of_birth").append(element.date_of_birth);
                $("#address").append(element.address);
                $("#current_address").append(element.current_address);
                $("#phone").append(element.phone);
                $("#email").append(element.email);
                $("#gov_staff").append(element.gov_staff == 0 ? "မဟုတ်" : "ဟုတ်");
                // $("#image").append(element.image);
                if(element.personal_no==null){
                    personal_no = "-";
                    $("#registration_no").append(personal_no);
                }else{
                    $("#registration_no").append(element.personal_no);
                }
                

                if(element.gov_staff == 1){
                    $(".recommend_row").show();
                    $(".recommend_letter").append(`<a href='${PDF_URL+element.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else{
                    $(".recommend_row").hide();
                }

                $("#university_name").append(education_history.university_name);
                $("#degree_name").append(education_history.degree_name);
                $("#qualified_date").append(education_history.qualified_date);
                $("#roll_number").append(education_history.roll_number);

                let certificate = JSON.parse(education_history.certificate);
                $.each(certificate,function(fileCount,fileName){
                    
                        $(".certificate").append(`<a href='${PDF_URL+fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);                    
                    
                })

                $(".nrc_front").append(`<a href='${PDF_URL+element.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);
                $(".nrc_back").append(`<a href='${PDF_URL+element.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);

                $("#name").append(job.name);
                $("#position").append(job.position);
                $("#department").append(job.department);
                $("#organization").append(job.organization);
                $("#company_name").append(job.company_name);
                $("#salary").append(job.salary);
                $("#office_address").append(job.office_address);
                attached_file = element.student_education_histroy.certificate;
            })
        }
    })
}

function chooseCPABatch() {
    var id = $('#cpa_batch_id').val();
    console.log(id);
    $.ajax({
        url: BACKEND_URL + "/exam_register/" + id,
        type: 'get',
        success: function (result) {
            console.log(result);
            localStorage.setItem("batch_id", id);
            location.href = FRONTEND_URL + "/cpa_exam_result_edit";
            // loadStudent();
        }
    });
}

function loadCPAStudent(course_type) {
    destroyDatatable("#tbl_cpa_exam_pending_result", "#tbl_cpa_exam_pending_result_body");
    destroyDatatable("#tbl_cpa_exam_approved_result", "#tbl_cpa_exam_approved_result_body");
    destroyDatatable("#tbl_cpa_exam_rejected_result", "#tbl_cpa_exam_rejected_result_body");
    localStorage.setItem("course_type", course_type);
    //var id = localStorage.getItem("batch_id");
    // console.log(id);
    if(course_type=="da_1"){
        course_id=1;
    }
    else if(course_type=="da_2"){
        course_id=2;
    }
    else if(course_type=="cpa_1"){
        course_id=3;
    }
    else if(course_type=="cpa_2"){
        course_id=4;
    }
    var send_data=new FormData();
    send_data.append('course_code',course_id);
    send_data.append('batch',$("#selected_batch_id").val());
    send_data.append('name', $("input[name=filter_by_name]").val());
    send_data.append('grade', $('#selected_grade_id').val());
    console.log($("#selected_batch_id").val());
    $.ajax({
        url: BACKEND_URL + "/filter_exam_register",
        type: 'post',
        data: send_data,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log("course", data);
            var da_data = data.data;
            da_data.forEach(function (element) {
                if (element.status == 0) {
                    status = "PENDING";
                } else if (element.status == 1) {
                    status = "APPROVED";
                } else {
                    status = "REJECTED";
                }
                if (element.exam_type_id == 0) {
                    exam_type_id = "SELF STUDY";
                } else if (element.exam_type_id == 1) {
                    exam_type_id = "PRIVATE SCHOOL";
                } else {
                    exam_type_id = "MAC STUDENT";
                }
                if (element.is_full_module == 1) {
                    is_full_module = "Module 1";
                } else if (element.is_full_module == 2) {
                    is_full_module = "Module 2";
                } else {
                    is_full_module = "All Module";
                }
                if (element.grade == 0) {
                    student_grade = "-";
                } else if (element.grade == 1) {
                    student_grade = "PASSED";
                } else {
                    student_grade = "FAILED";
                }
                if(element.grade==0){
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='fillCPAMark(" + element.id + "," + element.is_full_module + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + exam_type_id + "</td>";
                    tr += "<td>" + student_grade + "</td>";
                    //tr += "<td>" + status+ "</td>";
                    // tr += "<td>" + element.batch_id+ "</td>";
                    tr += "<td>" + element.batch.name + "</td>";
                    tr += "<td>" + is_full_module + "</td>";

                    //tr += "<td ><div class='btn-group'>";
                    $("#tbl_cpa_exam_pending_result_body").append(tr);
                }
                else if(element.grade==1){
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='fillCPAMark(" + element.id + "," + element.is_full_module + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + exam_type_id + "</td>";
                    tr += "<td>" + student_grade + "</td>";
                    //tr += "<td>" + status+ "</td>";
                    // tr += "<td>" + element.batch_id+ "</td>";
                    tr += "<td>" + element.batch.name + "</td>";
                    tr += "<td>" + is_full_module + "</td>";

                    //tr += "<td ><div class='btn-group'>";
                    $("#tbl_cpa_exam_approved_result_body").append(tr);
                }
                else if(element.grade==2){
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='fillCPAMark(" + element.id + "," + element.is_full_module + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + exam_type_id + "</td>";
                    tr += "<td>" + student_grade + "</td>";
                    //tr += "<td>" + status+ "</td>";
                    // tr += "<td>" + element.batch_id+ "</td>";
                    tr += "<td>" + element.batch.name + "</td>";
                    tr += "<td>" + is_full_module + "</td>";

                    //tr += "<td ><div class='btn-group'>";
                    $("#tbl_cpa_exam_rejected_result_body").append(tr);
                }
            });
            getIndexNumber('#tbl_cpa_exam_pending_result tr');
            createDataTable("#tbl_cpa_exam_pending_result");
            getIndexNumber('#tbl_cpa_exam_approved_result tr');
            createDataTable("#tbl_cpa_exam_approved_result");
            getIndexNumber('#tbl_cpa_exam_rejected_result tr');
            createDataTable("#tbl_cpa_exam_rejected_result");
        },
        error: function (message) {
            dataMessage(message, "#tbl_cpa_exam_pending_result", "#tbl_cpa_exam_pending_result_body");
            dataMessage(message, "#tbl_cpa_exam_approved_result", "#tbl_cpa_exam_approved_result_body");
            dataMessage(message, "#tbl_cpa_exam_rejected_result", "#tbl_cpa_exam_rejected_result_body");
        }
    });
}

function fillCPAMark(id, isFullModule) {
    console.log("exam_register_id", id);
    localStorage.setItem("exam_register_id", id);
    localStorage.setItem("is_full_module", isFullModule);
    var is_full_module = localStorage.getItem("is_full_module");
    // console.log(is_full_module)
    if (is_full_module == 1 || is_full_module == 2) {
        location.href = FRONTEND_URL + "/cpa_fill_mark_m1&2";
    } else {
        location.href = FRONTEND_URL + "/cpa_fill_mark_full";
    }
}

function getCPAModuleStd() {
    destroyDatatable("#tbl_cpa_exam_result", "#tbl_cpa_exam_result_body");
    var id = localStorage.getItem("exam_register_id");
    var module_type = localStorage.getItem("is_full_module");
    
    $("#name_eng").html("");
    $("#name_mm").html("");
    $("#nrc").html("");
    $("#father_name_mm").html("");
    $("#father_name_eng").html("");
    $("#race").html("");
    $("#religion").html("");
    $("#date_of_birth").html("");
    $("#address").html("");
    $("#current_address").html("");
    $("#phone").html("");
    $("#email").html("");
    $("#gov_staff").html("");
    $("#image").html("");
    $("#registration_no").html("");

    $("#university_name").html("");
    $("#degree_name").html("");
    $("#qualified_date").html("");
    $("#roll_number").html("");
    $("#certificate").html("");

    $("#name").html("");
    $("#position").html("");
    $("#department").html("");
    $("#organization").html("");
    $("#company_name").html("");
    $("#salary").html("");
    $("#office_address").html("");

    $.ajax({
        url: BACKEND_URL + "/std/" + id,
        type: 'get',
        data: "",
        success: function (data) {
            console.log(data);
            var da_data = data.data;
            da_data.forEach(function (element) {
                var std = element.student_info;
                console.log('std', std);
                if (element.status == 0) {
                    status = "PENDING";
                    //$('.pass_fail_btn').hide();
                } else if (element.status == 1) {
                    status = "APPROVED";
                } else {
                    status = "REJECTED";
                }

                if (element.exam_type_id == 1) {
                    $(".is_private_row").show();
                } else {
                    $(".is_private_row").hide();
                }

                if (element.is_full_module == 1) {
                    is_full_module = "Module 1";
                } else if (element.is_full_module == 2) {
                    is_full_module = "Module 2";
                } else {
                    is_full_module = "All Module";
                }

                if (element.form_type == 1) {
                    exam_type_id = "DA - I";
                } else if (element.form_type == 2) {
                    exam_type_id = "DA - II";
                } else if (element.form_type == 3) {
                    exam_type_id = "CPA - I";
                } else {
                    exam_type_id = "CPA - II";
                }

                if (element.grade == 0) {
                    grade = "PENDING";
                } else if (element.grade == 1) {
                    grade = "PASSED";
                }
                else {
                    grade = "FAILED";
                }


                  setTimeout(() => {
                      if(element.grade == 1 )
                      {

                        //   $('.ex_res_btn').hide();
                        //   $('.pass_fail_btn').hide();

                      }

                  }, 2000);

                // $("#std_name").append(std.name_eng);
                $("#school_name").append(element.private_school_name);
                $("#exam_type").append(exam_type_id);
                $("#student_grade").append(grade);
                $("#student_status").append(status);
                $("#is_full_module").append(is_full_module);

                // element = element.student_info;
                var education_history = std.student_education_histroy;
                var job = std.student_job;
                $("#id").append(std.id);
                document.getElementById('image').src = PDF_URL + std.image;
                $("#name_eng").append(std.name_eng);
                $("#name_mm").append(std.name_mm);
                $("#nrc").append(std.nrc_state_region + "/" + std.nrc_township + "(" + std.nrc_citizen + ")" + std.nrc_number);
                $("#father_name_mm").append(std.father_name_mm);
                $("#father_name_eng").append(std.father_name_eng);
                $("#race").append(std.race);
                $("#religion").append(std.religion);
                $("#date_of_birth").append(std.date_of_birth);
                $("#address").append(std.address);
                $("#current_address").append(std.current_address);
                $("#phone").append(std.phone);
                $("#email").append(std.email);
                $("#gov_staff").append(std.gov_staff == 0 ? "မဟုတ်" : "ဟုတ်");
                // $("#image").append(std.image);
                $("#registration_no").append(std.personal_no);

                if(std.gov_staff == 1){
                    $(".recommend_row").show();
                    $(".recommend_letter").append(`<a href='${PDF_URL+element.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else{
                    $(".recommend_row").hide();
                }

                $("#university_name").append(education_history.university_name);
                $("#degree_name").append(education_history.degree_name);
                $("#qualified_date").append(education_history.qualified_date);
                $("#roll_number").append(education_history.roll_number);

                let certificate = JSON.parse(education_history.certificate);
                $.each(certificate,function(fileCount,fileName){
                    
                        $(".certificate").append(`<a href='${PDF_URL+fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);                    
                    
                })

                $(".nrc_front").append(`<a href='${PDF_URL+std.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);
                $(".nrc_back").append(`<a href='${PDF_URL+std.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);

                $("#name").append(job.name);
                $("#position").append(job.position);
                $("#department").append(job.department);
                $("#organization").append(job.organization);
                $("#company_name").append(job.company_name);
                $("#salary").append(job.salary);
                $("#office_address").append(job.office_address);
                attached_file = std.student_education_histroy.certificate;

                var subjects = element.subjects;
                var i=1;
                subjects.forEach(function (subj) {
                    if (element.is_full_module == subj.module_id) {
                        var tr = "<tr>";
                        tr += "<td>" + i +"</td>";
                        tr += "<td><input type='text' name='subject"+i+"' id='subject"+i+"' value='" + subj.subject_name + "' class='form-control' required readonly></td>";
                        tr += "<td><input type='text' name='mark"+i+"' id='mark"+i+"' class='form-control' required></td>";
                        tr += "<td><input type='text' name='grade"+i+"' id='grade"+i+"' class='form-control' required></td>";
                        tr += "</tr>";
                        $(".tbl_fillmarks_body").append(tr);
                        i++;
                    }else if (element.is_full_module == 3 || element.is_full_module == 0 ){
                        var tr = "<tr>";
                        tr += "<td>" + i +"</td>";
                        tr += "<td><input type='text' name='subject"+i+"' id='subject"+i+"' value='" + subj.subject_name + "' class='form-control' required readonly></td>";
                        tr += "<td><input type='text' name='mark"+i+"' id='mark"+i+"' class='form-control' required></td>";
                        tr += "<td><input type='text' name='grade"+i+"' id='grade"+i+"' class='form-control' required></td>";
                        tr += "</tr>";
                        $(".tbl_fillmarks_body").append(tr);
                        i++;
                    }
                })

            });
            $.ajax({
                url: BACKEND_URL + "/search_exam_result/" + id,
                type: 'get',
                data: "",
                success: function (result) {
                        if(result.data !=null)
                        {
                            // $('.ex_res_btn').hide();

                            // $('.pass_fail_btn').show();

                            $('.pass_fail_btn').hide();

                            $("input[name = result_id]").val(result.data.id);
                            //console.log('search_exam_result',JSON.parse(result.data.result));

                            var rData=JSON.parse(result.data.result);
                            var row_length = rData.subjects.length;

                            console.log('is_full_module',module_type);
                            if(module_type == 1)
                            {
                                for (var i = 0; i < row_length; i++)
                                {
                                    var j=i+1;
                                    var sunject=document.getElementById('subject'+j);
                                    sunject.value = rData.subjects[i];
                                    sunject.setAttribute("readonly", "true");
                                }
                                for (var i = 0; i < row_length; i++)
                                {
                                    var j=i+1;
                                    var mark=document.getElementById('mark'+j);
                                    mark.value = rData.marks[i];
                                    mark.setAttribute("readonly", "true");
                                }
                                for (var i = 0; i < row_length; i++)
                                {
                                    var j=i+1;
                                    var grade=document.getElementById('grade'+j);
                                    grade.value = rData.grades[i];
                                    grade.setAttribute("readonly", "true");
                                }
                            }
                            else if(module_type == 2){
                                for (var i = 0; i < row_length; i++) {
                                    var j = i + 1;
                                    var subject = document.getElementById('subject' + j);
                                    subject.value = rData.subjects[i];
                                    subject.setAttribute("readonly", "true");
                                }
                                for (var i = 0; i < row_length; i++) {
                                    var j = i + 1;
                                    var mark = document.getElementById('mark' + j);
                                    mark.value = rData.marks[i];
                                    mark.setAttribute("readonly", "true");
                                }
                                for (var i = 0; i < row_length; i++) {
                                    var j = i + 1;
                                    var grade = document.getElementById('grade' + j);
                                    grade.value = rData.grades[i];
                                    grade.setAttribute("readonly", "true");
                                }
                            }
                            else if(module_type == 3){
                                for (var i = 0; i < row_length; i++) {
                                    var j = i + 1;
                                    var subject = document.getElementById('subject' + j);
                                    subject.value = rData.subjects[i];
                                    subject.setAttribute("readonly", "true");
                                }
                                for (var i = 0; i < row_length; i++) {
                                    var j = i + 1;
                                    var mark = document.getElementById('mark' + j);
                                    mark.value = rData.marks[i];
                                    mark.setAttribute("readonly", "true");
                                }
                                for (var i = 0; i < row_length; i++) {
                                    var j = i + 1;
                                    var grade = document.getElementById('grade' + j);
                                    grade.value = rData.grades[i];
                                    grade.setAttribute("readonly", "true");
                                }
                            }
                        }else{
                            // $('.pass_fail_btn').hide();
                        }
                    },
                error:function (message){
                    console.log(message);
                    }
            });
            // $.ajax({
            //     url: BACKEND_URL + "/search_exam_result/" + id,
            //     type: 'get',
            //     data: "",
            //     success: function (result) {
            //         console.log(result);
            //         if (result.data != null) {
            //             // $('.ex_res_btn').hide();

            //             // $('.pass_fail_btn').show();

            //             $('.pass_fail_btn').hide();

            //             $("input[name = result_id]").val(result.data.id);
            //             console.log('search_exam_result', result.data.id);
            //             var rData = JSON.parse(result.data.result);
            //             console.log(rData.subjects[1]);

            //             console.log('is_full_module', module_type);
            //             if (module_type == 1 || module_type == 2) {
            //                 for (var i = 0; i < 3; i++) {
            //                     var j = i + 1;
            //                     var subject = document.getElementById('subject' + j);
            //                     subject.value = rData.subjects[i];
            //                     subject.setAttribute("readonly", "true");
            //                 }
            //                 for (var i = 0; i < 3; i++) {
            //                     var j = i + 1;
            //                     var mark = document.getElementById('mark' + j);
            //                     mark.value = rData.marks[i];
            //                     mark.setAttribute("readonly", "true");
            //                 }
            //                 for (var i = 0; i < 3; i++) {
            //                     var j = i + 1;
            //                     var grade = document.getElementById('grade' + j);
            //                     grade.value = rData.grades[i];
            //                     grade.setAttribute("readonly", "true");
            //                 }
            //             } else {
            //                 for (var i = 0; i < 6; i++) {
            //                     var j = i + 1;
            //                     var subject = document.getElementById('subject' + j);
            //                     subject.value = rData.subjects[i];
            //                     subject.setAttribute("readonly", "true");
            //                 }
            //                 for (var i = 0; i < 6; i++) {
            //                     var j = i + 1;
            //                     var mark = document.getElementById('mark' + j);
            //                     mark.value = rData.marks[i];
            //                     mark.setAttribute("readonly", "true");
            //                 }
            //                 for (var i = 0; i < 6; i++) {
            //                     var j = i + 1;
            //                     var grade = document.getElementById('grade' + j);
            //                     grade.value = rData.grades[i];
            //                     grade.setAttribute("readonly", "true");
            //                 }
            //             }
            //         } else {
            //             // $('.pass_fail_btn').hide();
            //         }
            //     },
            //     error: function (message) {
            //         console.log(message);
            //     }
            // });
        }
    });
}
