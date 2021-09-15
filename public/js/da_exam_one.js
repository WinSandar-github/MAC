function getExam(course_code) {
    destroyDatatable("#tbl_da_pending_exam", "#tbl_da_pending_exam_body");
    destroyDatatable("#tbl_da_approved_exam", "#tbl_da_approved_exam_body");
    destroyDatatable("#tbl_da_rejected_exam", "#tbl_da_rejected_exam_body");
    var batch = $("#selected_batch_id").val();
    var send_data = new FormData();
    send_data.append('name', $("input[name=filter_by_name]").val());
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
    send_data.append('batch', batch);
    $.ajax({
        url: BACKEND_URL + "/filter",
        type: 'post',
        data: send_data,
        contentType: false,
        processData: false,
        success: function (data) {
            console.log({
                data
            });
            var da_data = data.data;
            da_data.forEach(function (element) {
// <<<<<<< HEAD
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
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showExam(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";

                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + exam_type_id + "</td>";
                    tr += "<td>" + grade + "</td>";
                    tr += "<td>" + status + "</td>";
                    // tr += "<td>" + element.batch_id+ "</td>";

                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='printExamCard(" + element.student_info.id + ',' + element.batch_id + ")'>" +
                        "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_da_pending_exam_body").append(tr);
                } else if (element.status == 1) {
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showExam(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";

                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + exam_type_id + "</td>";
                    tr += "<td>" + grade + "</td>";
                    tr += "<td>" + status + "</td>";
                    // tr += "<td>" + element.batch_id+ "</td>";

                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='printExamCard(" + element.student_info.id + ',' + element.batch_id + ")'>" +
                        "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_da_approved_exam_body").append(tr);
                } else if (element.status == 2) {
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showExam(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";

                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + exam_type_id + "</td>";
                    tr += "<td>" + grade + "</td>";
                    tr += "<td>" + status + "</td>";
                    // tr += "<td>" + element.batch_id+ "</td>";

                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='printExamCard(" + element.student_info.id + ',' + element.batch_id + ")'>" +
                        "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_da_rejected_exam_body").append(tr);
                }
// =======
//                     $.ajax({
//                         url: BACKEND_URL+"/course/"+element.form_type,
//                         type: 'get',
//                         data:"",
//                         success:function(courses){
//                             var course=courses.data;

//                             if(course.code=="da_1")
//                             {
//                                 if(element.status==0){
//                                     status="PENDING";
//                                 }
//                                 else if(element.status==1){
//                                     status="APPROVED";
//                                 }
//                                 else{
//                                     status="REJECTED";
//                                 }
//                                 if(element.exam_type_id == 0){
//                                     exam_type_id = "SELF STUDY";
//                                 }
//                                 else if(element.exam_type_id==1){
//                                     exam_type_id="PRIVATE SCHOOL";
//                                 }
//                                 else{
//                                     exam_type_id="MAC STUDENT";
//                                 }
//                                 if(element.grade == 0){
//                                     grade = "-";
//                                 }
//                                 else if(element.grade==1){
//                                     grade="PASSED";
//                                 }
//                                 else{
//                                     grade="FAILED";
//                                 }
//                                 var tr = "<tr>";
//                                 tr += "<td>" +  + "</td>";
//                                 tr += "<td>" + element.student_info.name_eng + "</td>";
//                                 tr += "<td>" + exam_type_id + "</td>";
//                                 tr += "<td>" + grade + "</td>";
//                                 tr += "<td>" + status+ "</td>";
//                                 tr += "<td ><div class='btn-group'>";
//                                 tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showExam(" + element.id + ")'>" +
//                                     "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
//                                 tr += "<td ><div class='btn-group'>";
//                                 tr+="<button type='button' class='btn btn-primary btn-xs' onClick='printExamCard(" + element.student_info.id+','+ element.batch_id + ")'>" +
//                                 "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
//                                 tr += "</tr>";
//                                 $("#tbl_da_exam_one_body").append(tr);
//                             }
//                             else if(course.code=="da_2")
//                             {
//                                 if(element.status==0){
//                                     status="PENDING";
//                                 }
//                                 else if(element.status==1){
//                                     status="APPROVED";
//                                 }
//                                 else{
//                                     status="REJECTED";
//                                 }
//                                 if(element.exam_type_id == 0){
//                                     exam_type_id = "SELF STUDY";
//                                 }
//                                 else if(element.exam_type_id==1){
//                                     exam_type_id="PRIVATE SCHOOL";
//                                 }
//                                 else{
//                                     exam_type_id="MAC STUDENT";
//                                 }
//                                 if(element.grade == 0){
//                                     grade = "-";
//                                 }
//                                 else if(element.grade==1){
//                                     grade="PASSED";
//                                 }
//                                 else{
//                                     grade="FAILED";
//                                 }
//                                 var tr = "<tr>";
//                                 tr += "<td>" +  + "</td>";
//                                 tr += "<td>" + element.student_info.name_eng + "</td>";
//                                 tr += "<td>" + exam_type_id + "</td>";
//                                 tr += "<td>" + grade + "</td>";
//                                 tr += "<td>" + status+ "</td>";
//                                 tr += "<td ><div class='btn-group'>";
//                                 tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showDaTwoExam(" + element.id + ")'>" +
//                                     "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
//                                 tr += "<td ><div class='btn-group'>";
//                                 tr+="<button type='button' class='btn btn-primary btn-xs' onClick='printExamCard(" + element.student_info.id +','+ element.batch_id + ")'>" +
//                                 "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
//                                 tr += "</tr>";
//                                 $("#tbl_da_exam_two_body").append(tr);
//                             }

//                             getIndexNumber('#tbl_da_exam_one tr');
//                             createDataTable(".tbl_da_exam_one");

//                             getIndexNumber('#tbl_da_exam_two tr');
//                             createDataTable(".tbl_da_exam_two");
//                         }
//                     })
//>>>>>>> ac67ed3c0efebdce43c2dac463280128b110edb1
            });
            getIndexNumber('#tbl_da_pending_exam tr');
            createDataTable("#tbl_da_pending_exam");
            getIndexNumber('#tbl_da_approved_exam tr');
            createDataTable("#tbl_da_approved_exam");
            getIndexNumber('#tbl_da_rejected_exam tr');
            createDataTable("#tbl_da_rejected_exam");
        },
        error: function (message) {
            dataMessage(message, "#tbl_da_pending_exam", "#tbl_da_pending_exam_body");
            dataMessage(message, "#tbl_da_approved_exam", "#tbl_da_approved_exam_body");
            dataMessage(message, "#tbl_da_rejected_exam", "#tbl_da_rejected_exam_body");
        }
    });
}

function showExam(studentId) {
    localStorage.setItem("student_id", studentId);
    location.href = FRONTEND_URL + "/da_exam_one_edit";
}

function showDaTwoExam(studentId) {
    localStorage.setItem("student_id", studentId);
    location.href = FRONTEND_URL + "/da_two_exam_edit";
}

function printExamCard(studentId, batch_id) {
    localStorage.setItem("student_id", studentId);
    localStorage.setItem("batch_id_for_examcard", batch_id);
    location.href = FRONTEND_URL + "/da1_examcard";
}

function loadDAExamData() {
    var id = localStorage.getItem("student_id");
    console.log(id);
    $("#school_name").html("");
    $("#exam_type").html("");
    $("#student_grade").html("");
    $("#student_status").html("");
    $("#exam_department").html("");

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
            console.log(">>>",exam_data);
            exam_data.forEach(function (element) {
                if (element.exam_type_id == 0) {
                    exam_type_id = "SELF STUDY";
                } else if (element.exam_type_id == 1) {
                    exam_type_id = "PRIVATE SCHOOL";
                } else {
                    exam_type_id = "MAC STUDENT";
                }
                if (element.status == 0) {
                    status = "PENDING";
                } else if (element.status == 1) {
                    status = "APPROVED";
                } else {
                    status = "REJECTED";
                }
                if (element.grade == 0) {
                    grade = "-";
                } else if (element.grade == 1) {
                    grade = "PASSED";
                } else {
                    grade = "FAILED";
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
                $("#gov_staff").append(element.gov_staff == 0 ? "ဟုတ်" : "မဟုတ်");
                $("#image").append(element.image);
                $("#registration_no").append(element.registration_no);

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
                $("#exam_department").append(element.exam_department.name);
            })
        }
    })
}

function loadStudentDataForExamCard() {
    var id = localStorage.getItem("student_id");
    var batch_id = localStorage.getItem("batch_id_for_examcard");
    console.log('batch_id', batch_id);
    $("#roll_no").html("");
    $("#name").html("");
    $("#nrc").html("");
    console.log(id);
    //$("input[name = student_info_id]").val(id);

    $.ajax({
        type: "GET",
        url: BACKEND_URL + "/exam_register/" + id,
        success: function (data) {
            var exam_datas = data.data;
            exam_datas.forEach(function (exam_data) {
            document.getElementById('student_img').src = PDF_URL + exam_data.student_info.image;
            $("#roll_no").append(exam_data.id);
            $("#name").append(exam_data.student_info.name_mm);
            $("#nrc").append(exam_data.student_info.nrc_state_region + "/" + exam_data.student_info.nrc_township + "(" + exam_data.student_info.nrc_citizen + ")" + exam_data.student_info.nrc_number);
            $("#exam_date").append(exam_data.batch.exam_start_date);
            $("#exam_place").append(exam_data.batch.exam_place);
            $("#exam_time").append(exam_data.batch.exam_time);
            });
        }
    })
}

function approveDAOneExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/approve_exam/" + id,
        type: 'PATCH',
        success: function (result) {
            console.log(result)
            successMessage("You have approved that form!");
            location.href = FRONTEND_URL + "/da_exam_one";
            getExam();
        }
    });
}

function rejectDAOneExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/reject_exam/" + id,
        type: 'PATCH',
        success: function (result) {
            console.log(result)
            successMessage("You have rejected that form!");
            location.href = FRONTEND_URL + "/da_exam_one";
            getExam();
        }
    });
}

function approveDATwoExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/approve_exam/" + id,
        type: 'PATCH',
        success: function (result) {
            console.log(result)
            successMessage("You have approved that form!");
            location.href = FRONTEND_URL + "/da_two_exam";
            getExam();
        }
    });
}

function rejectDATwoExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/reject_exam/" + id,
        type: 'PATCH',
        success: function (result) {
            console.log(result)
            successMessage("You have rejected that form!");
            location.href = FRONTEND_URL + "/da_two_exam";
            getExam();
        }
    });
}

function loadBatchData(course_code){
    var select = document.getElementById("selected_batch_id");
    show_loader();
    $.ajax({
        url: BACKEND_URL + "/course_by_course_code/" + course_code,
        type: 'get',
        contentType: false,
        processData: false,
         success: function(data){

            var course_data=data.data;
            console.log('course_data',course_data);
            course_data.forEach(function (element) {
                element.batches.forEach(function (batch) {
                    var option = document.createElement('option');
                    option.text = batch.name;
                    option.value = batch.id;
                    select.add(option, 0);
                });
            });
            EasyLoading.hide();

        },
        error:function (message){
            EasyLoading.hide();

        }
    });
}

function SearchByID() {
    var id = $('#selected_batch_id').val();
    console.log('id', id);
    destroyDatatable("#tbl_da_exam_one", "#tbl_da_exam_one_body");
    $.ajax({
        url: BACKEND_URL + "/filter/" + id,
        type: 'get',
        data: "",
        success: function (data) {
            var da_data = data.data;
            da_data.forEach(function (element) {
                console.log(element)
                var tr = "<tr>";
                tr += "<td>" + +"</td>";
                tr += "<td ><div class='btn-group'>";
                tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showExam(" + element.id + ")'>" +
                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                tr += "<td>" + element.private_school_name + "</td>";
                tr += "<td>" + element.exam_type_id + "</td>";
                tr += "<td>" + element.grade + "</td>";
                tr += "<td>" + element.status + "</td>";
                tr += "<td>" + element.batch_id + "</td>";

                tr += "<td ><div class='btn-group'>";
                tr += "<button type='button' class='btn btn-primary btn-xs' onClick='printExamCard(" + element.id + ")'>" +
                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                tr += "</tr>";
                $("#tbl_da_exam_one_body").append(tr);
            });
            getIndexNumber('#tbl_da_exam_one tr');
            createDataTable("#tbl_da_exam_one");
        },
        error: function (message) {
            dataMessage(message, "#tbl_da_exam_one", "#tbl_da_exam_one_body");
        }
    });
}

function chooseBatch() {
    var id = $('#selected_batch_id').val();
    // console.log(id)
    $.ajax({
        url: BACKEND_URL + "/exam_register/" + id,
        type: 'get',
        success: function (result) {
            localStorage.setItem("batch_id", id);
            location.href = FRONTEND_URL + "/exam_result_edit";
            // loadStudent();
        }
    });
}


function loadStudent(course_type) {
    destroyDatatable("#tbl_exam_pending_result", "#tbl_exam_pending_result_body");
    destroyDatatable("#tbl_exam_approved_result", "#tbl_exam_approved_result_body");
    destroyDatatable("#tbl_exam_rejected_result", "#tbl_exam_rejected_result_body");
    localStorage.setItem("course_type",course_type);

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
    send_data.append('name',$("input[name=filter_by_name]").val());
    send_data.append('grade',$('#selected_grade_id').val());
    console.log($("input[name=filter_by_name]").val(),$('#selected_grade_id').val());
    show_loader();
    $.ajax({
        url: BACKEND_URL + "/filter_exam_register",
        type: 'post',
        data: send_data,
        contentType: false,
        processData: false,
        success: function (data) {
            var da_data = data.data;
            console.log({da_data});
            da_data.forEach(function (element) {
                if (element.status == 0) {
                    status = "PENDING";
                } else if (element.status == 1) {
                    status = "APPROVED";
                } else {
                    status = "REJECTED";
                }

                // if(element.exam_register.exam_type_id == 0){
                if (element.exam_type_id == 0) {
                    exam_type_id = "SELF STUDY";
                } else if (element.exam_type_id == 1) {
                    exam_type_id = "PRIVATE SCHOOL";
                } else {
                    exam_type_id = "MAC STUDENT";
                }

                // if(element.exam_register.is_full_module==0){
                if (element.is_full_module == 1) {
                    is_full_module = "Module 1";
                } else if (element.is_full_module == 2) {
                    is_full_module = "Module 2";
                } else {
                    is_full_module = "Full Module";
                }

                if (element.grade == 0) {
                    student_grade = "-";
                } else if (element.grade == 1) {
                    student_grade = "PASSED";
                } else {
                    student_grade = "FAILED";
                }
                if(element.grade == 0){
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    // tr+="<button type='button' class='btn btn-primary btn-xs' onClick='fillMark(" + element.exam_register.id + "," + element.exam_register.is_full_module +")'>" +
                    //     "<li class='fa fa-eye fa-sm'></li></button></div></td> ";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='fillMark(" + element.id + "," + element.is_full_module + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + exam_type_id + "</td>";
                    tr += "<td>" + student_grade + "</td>";
                    //tr += "<td>" + status+ "</td>";
                    tr += "<td>" + element.batch.name + "</td>";
                    tr += "<td>" + is_full_module + "</td>";

                    // tr += "<td ><div class='btn-group'>";
                    $("#tbl_exam_pending_result_body").append(tr);
                }
                else if(element.grade == 1){
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    // tr+="<button type='button' class='btn btn-primary btn-xs' onClick='fillMark(" + element.exam_register.id + "," + element.exam_register.is_full_module +")'>" +
                    //     "<li class='fa fa-eye fa-sm'></li></button></div></td> ";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='fillMark(" + element.id + "," + element.is_full_module + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + exam_type_id + "</td>";
                    tr += "<td>" + student_grade + "</td>";
                    //tr += "<td>" + status+ "</td>";
                    tr += "<td>" + element.batch.name + "</td>";
                    tr += "<td>" + is_full_module + "</td>";

                    // tr += "<td ><div class='btn-group'>";
                    $("#tbl_exam_approved_result_body").append(tr);
                }
                else if(element.grade == 2){
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    // tr+="<button type='button' class='btn btn-primary btn-xs' onClick='fillMark(" + element.exam_register.id + "," + element.exam_register.is_full_module +")'>" +
                    //     "<li class='fa fa-eye fa-sm'></li></button></div></td> ";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='fillMark(" + element.id + "," + element.is_full_module + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    //tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + exam_type_id + "</td>";
                    tr += "<td>" + student_grade + "</td>";
                    //tr += "<td>" + status+ "</td>";
                    tr += "<td>" + element.batch.name + "</td>";
                    tr += "<td>" + is_full_module + "</td>";

                    // tr += "<td ><div class='btn-group'>";
                    $("#tbl_exam_rejected_result_body").append(tr);
                }

            });
            getIndexNumber('#tbl_exam_pending_result tr');
            createDataTable("#tbl_exam_pending_result");
            getIndexNumber('#tbl_exam_approved_result tr');
            createDataTable("#tbl_exam_approved_result");
            getIndexNumber('#tbl_exam_rejected_result tr');
            createDataTable("#tbl_exam_rejected_result");
            EasyLoading.hide();
        },
        error:function (message){
            EasyLoading.hide();
            dataMessage(message, "#tbl_exam_pending_result", "#tbl_exam_pending_result_body");
            dataMessage(message, "#tbl_exam_approved_result", "#tbl_exam_approved_result_body");
            dataMessage(message, "#tbl_exam_rejected_result", "#tbl_exam_rejected_result_body");
        }
    });
}

function fillMark(id, isFullModule) {
    localStorage.setItem("exam_register_id", id);
    localStorage.setItem("is_full_module", isFullModule);
    var is_full_module = localStorage.getItem("is_full_module");
    console.log(is_full_module);
    if (is_full_module == 1) {
        location.href = FRONTEND_URL + "/fill_mark_one";
    } else if (is_full_module == 2) {
        location.href = FRONTEND_URL + "/fill_mark_two";
    } else {
        location.href = FRONTEND_URL + "/fill_mark_full";
    }

}

function getModuleStd() {
    var id = localStorage.getItem("exam_register_id");
    console.log('exam',id);
    var module_type = localStorage.getItem("is_full_module");
    // $("input[name = batch_id]").val(id);

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
                // console.log(std)
// <<<<<<< HEAD
                if (element.status == 0) {
                    status = "PENDING";
                    $('.pass_fail_btn').hide();
                } else if (element.status == 1) {
                    status = "APPROVED";
                } else {
                    status = "REJECTED";
// =======
//                 if(element.status==0){
//                     status="PENDING";

// >>>>>>> ac67ed3c0efebdce43c2dac463280128b110edb1
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
                    is_full_module = "Full Module";
                }



                if (element.grade == 0) {
                    grade = "PENDING";
                } else if (element.grade == 1) {
                    grade = "PASSED";
                } else {
                    grade = "FAILED";
                }

                setTimeout(() => {
                    if(element.grade == 1 )
                    {

                        $('.ex_res_btn').hide();
                        $('.pass_fail_btn').hide();

                    }

                }, 2000);
                 
                // $("#std_name").append(std.name_eng);
                $("#school_name").append(element.private_school_name);
                $("#exam_type").append(exam_type_id);
                // $("#student_grade").append(element.grade);
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
                $("#gov_staff").append(std.gov_staff == 0 ? "ဟုတ်" : "မဟုတ်");
                $("#image").append(std.image);
                $("#registration_no").append(std.registration_no);

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
            });

            $.ajax({
                url: BACKEND_URL + "/search_exam_result/" + id,
                type: 'get',
                data: "",
                success: function (result) {
                    console.log(result)
                        if(result.data !=null)
                        {
                            $('.ex_res_btn').hide();

                            $('.pass_fail_btn').show();


                            $("input[name = result_id]").val(result.data.id);
                            console.log('search_exam_result',JSON.parse(result.data.result));
                            var rData=JSON.parse(result.data.result);
                            console.log(rData.subjects[1]);

                            console.log('is_full_module',module_type);
                            if(module_type == 1)
                            {
                                for (var i = 0; i < 3; i++)
                                {
                                    var j=i+1;
                                    var sunject=document.getElementById('subject'+j);
                                    sunject.value = rData.subjects[i];
                                }
                                for (var i = 0; i < 3; i++)
                                {
                                    var j=i+1;
                                    var mark=document.getElementById('mark'+j);
                                    mark.value = rData.marks[i];
                                }
                                for (var i = 0; i < 3; i++)
                                {
                                    var j=i+1;
                                    var grade=document.getElementById('grade'+j);
                                    grade.value = rData.grades[i];
                                }
                            }
                            else if(module_type == 2){
                                for (var i = 0; i < 2; i++) {
                                    var j = i + 1;
                                    var sunject = document.getElementById('subject' + j);
                                    sunject.value = rData.subjects[i];
                                }
                                for (var i = 0; i < 2; i++) {
                                    var j = i + 1;
                                    var mark = document.getElementById('mark' + j);
                                    mark.value = rData.marks[i];
                                }
                                for (var i = 0; i < 2; i++) {
                                    var j = i + 1;
                                    var grade = document.getElementById('grade' + j);
                                    grade.value = rData.grades[i];
                                }
                            }
                            else if(module_type == 3){
                                for (var i = 0; i < 5; i++) {
                                    var j = i + 1;
                                    var sunject = document.getElementById('subject' + j);
                                    sunject.value = rData.subjects[i];
                                }
                                for (var i = 0; i < 5; i++) {
                                    var j = i + 1;
                                    var mark = document.getElementById('mark' + j);
                                    mark.value = rData.marks[i];
                                }
                                for (var i = 0; i < 5; i++) {
                                    var j = i + 1;
                                    var grade = document.getElementById('grade' + j);
                                    grade.value = rData.grades[i];
                                }
                            }
                        }else{
                            $('.pass_fail_btn').hide();
                        }
                    },
                error:function (message){
                    console.log(message);
                    }
            });
        }
    });
}

function Exam_Result_Submit() {
    var id = localStorage.getItem("exam_register_id");
    var course_code = localStorage.getItem("course_code");
    var course_type = localStorage.getItem("course_type");
    var table = document.getElementById("tbl_fillmarks");
    var result_id = $("input[name = result_id]").val();
    var totalRowCount = table.rows.length;
    var data = new FormData();
    for (var i = 1; i < totalRowCount; i++) {
        data.append('subject[]', $('#subject' + i).val());
    }
    for (var i = 1; i < totalRowCount; i++) {
        data.append('mark[]', $('#mark' + i).val());
    }
    for (var i = 1; i < totalRowCount; i++) {
        data.append('grade[]', $('#grade' + i).val());
    }
    data.append('exam_register_id', id);
    if (result_id == "") {
        $.ajax({
            url: BACKEND_URL + "/exam_result",
            type: 'post',
            data: data,
            contentType: false,
            processData: false,
            success: function (result) {
                successMessage("Insert Successfully");
                if (course_code == 1) {
                    location.href = FRONTEND_URL + "/da1_exam_result_edit";
                } else if (course_code == 2) {
                    location.href = FRONTEND_URL + "/da2_exam_result_edit";
                } else if (course_code == 3) {
                    location.href = FRONTEND_URL + "/cpa1_exam_result_edit";
                } else {
                    location.href = FRONTEND_URL + "/cpa2_exam_result_edit";
                }
            },
            error: function (message) {
                console.log(message);
            }
        });
    } else {
        data.append('_method', 'PUT');
        $.ajax({
            url: BACKEND_URL + "/exam_result/" + result_id,
            type: 'post',
            data: data,
            contentType: false,
            processData: false,
            success: function (result) {
                console.log(result.message);
                successMessage("Updated Successfully");
                if (course_code == 1) {
                    location.href = FRONTEND_URL + "/da1_exam_result_edit";
                } else if (course_code == 2) {
                    location.href = FRONTEND_URL + "/da2_exam_result_edit";
                } else if (course_code == 3) {
                    location.href = FRONTEND_URL + "/cpa1_exam_result_edit";
                } else {
                    location.href = FRONTEND_URL + "/cpa2_exam_result_edit";
                }
            },
            error: function (message) {
                console.log(message);
            }
        });
    }
}
