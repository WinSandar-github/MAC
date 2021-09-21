function GetStudentRegistration(course_code) {
    destroyDatatable("#tbl_student_self_study", "#tbl_student_self_study_body");
    destroyDatatable("#tbl_student_private_school", "#tbl_student_private_school_body");
    destroyDatatable("#tbl_student_mac", "#tbl_student_mac_body");
    var send_data = new FormData();
    send_data.append('name', "");
    send_data.append('status',"all");
    send_data.append('batch', "all");
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
        url: BACKEND_URL + "/filter_registration",
        type: 'post',
        data: send_data,
        contentType: false,
        processData: false,
        success: function (data) {
            var student_data = data.data;
            console.log("stu data", student_data);
            student_data.forEach(function (element) {
                console.log(element.id,"id");
                console.log("stu element", element);
                if (element.type == 0) {
                    var status;
                    if (element.status == 0) {
                        status = "PENDING";
                    } else if (element.status == 1) {
                        status = "APPROVED";
                    } else {
                        status = "REJECTED";
                    }
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showRegistration(" + element.id + ',' + "\"" + element.course.code + "\"" + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";
                    tr += "<td>" + element.student_info.registration_no + "</td>";
                    tr += "<td>" + element.student_info.phone + "</td>";
                    tr += "<td>" + element.reg_reason + "</td>";
                    tr += "<td>" + status + "</td>";
                    
                    tr += "</tr>";
                    $("#tbl_student_self_study_body").append(tr);

                } else if (element.type == 1) {
                    var status;
                    if (element.status == 0) {
                        status = "PENDING";
                    } else if (element.status == 1) {
                        status = "APPROVED";
                    } else {
                        status = "REJECTED";
                    }
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showRegistration(" + element.id + ',' + "\"" + element.course.code + "\"" + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";
                    tr += "<td>" + element.student_info.registration_no + "</td>";
                    tr += "<td>" + element.student_info.phone + "</td>";
                    tr += "<td>" + status + "</td>";
                   
                    tr += "</tr>";
                    $("#tbl_student_private_school_body").append(tr);


                } else if (element.type == 2) {
                    var status;
                    if (element.status == 0) {
                        status = "PENDING";
                    } else if (element.status == 1) {
                        status = "APPROVED";
                    } else {
                        status = "REJECTED";
                    }
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showRegistration(" + element.id + ',' + "\"" + element.course.code + "\"" + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";
                    tr += "<td>" + element.student_info.registration_no + "</td>";
                    tr += "<td>" + element.student_info.phone + "</td>";
                    tr += "<td>" + status + "</td>";
                    
                    tr += "</tr>";
                    $("#tbl_student_mac_body").append(tr);

                }
            });

            getIndexNumber('#tbl_student_self_study tr');
            createDataTable("#tbl_student_self_study");
            getIndexNumber('#tbl_student_private_school tr');
            createDataTable("#tbl_student_private_school");
            getIndexNumber('#tbl_student_mac tr');
            createDataTable("#tbl_student_mac");
        },
        error: function (message) {
            dataMessage(message, "#tbl_student_self_study", "#tbl_student_self_study_body");
            dataMessage(message, "#tbl_student_private_school", "#tbl_student_private_school_body");
            dataMessage(message, "#tbl_student_mac", "#tbl_student_mac_body");
        }
    });
}

function showRegistration(studentId, course_code) {
    localStorage.setItem("student_id", studentId);
    localStorage.setItem("course_code", course_code);
    // console.log(course_code);
    location.href = FRONTEND_URL + "/self_study_edit";
}

function loadStudentSelfStudy() {
    var id = localStorage.getItem("student_id");
    var course_code = localStorage.getItem("course_code");
    // $("#student_name").html("");
    // // $("#student_nrc").html("");
    // $("#student_dob").html("");
    // $("#student_father").html("");
    // $("#student_email").html("");
    // $("#student_phone").html("");
    $("#student_registration_no").html("");
    $("#student_registration_reason").html("");

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

    $("input[name = student_course_id]").val(id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL + "/show_student_register/" + id,
        success: function (data) {
            var element = data.data;
            // $("#student_name").append(element.student_info.name_eng + "/" + element.student_info.name_mm);
            // $("#student_nrc").append(element.student_info.nrc_state_region + "/" + element.student_info.nrc_township + "(" + element.student_info.nrc_citizen + ")" + element.student_info.nrc_number);
            // $("#student_dob").append(element.student_info.date_of_birth);
            // $("#student_father").append(element.student_info.father_name_eng);
            // $("#student_email").append(element.student_info.email);
            // $("#student_phone").append(element.student_info.phone);
            $("#student_registration_no").append(element.student_info.registration_no);
            $("#student_registration_reason").append(element.reg_reason);
            $("input[name = student_register_id]").val(element.id);
            if (element.status == 0) {
                document.getElementById("approve_reject").style.display = "block";
            } else {
                document.getElementById("approve_reject").style.display = "none";
            }

            $("#registration_no").append(element.personal_no);
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
            $("#gov_staff").append(element.gov_staff == 0 ? "မဟုတ်" : "ဟုတ်");
            // $("#image").append(element.image);

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

            // if (course_code == "da_1") {
            //     $("#student_registration_reason").append(item.reg_reason);
            //     $("input[name = student_register_id]").val(item.id);
            // }
            // if (course_code == "da_2") {
            //     $("#student_registration_reason").append(item.reg_reason);
            //     $("input[name = student_register_id]").val(item.id);
            // }
            // if (course_code == "cpa_1") {
            //     $("#student_registration_reason").append(item.reg_reason);
            //     $("input[name = student_register_id]").val(item.id);
            // }
            // if (course_code == "cpa_2") {
            //     $("#student_registration_reason").append(item.reg_reason);
            //     $("input[name = student_register_id]").val(item.id);
            // }
        }
    })
}

// function getStudentPrivateSchool() {
//     destroyDatatable("#tbl_student_private_school", "#tbl_student_private_school_body");
//     destroyDatatable("#da_two_private_school", "#da_two_private_school_body");
//     destroyDatatable("#tbl_cpa1_student_private_school", "#tbl_cpa1_student_private_school_body");
//     destroyDatatable("#tbl_cpa2_student_private_school", "#tbl_cpa2_student_private_school_body");
//     var send_data = new FormData();
//     send_data.append('name', $("input[name=filter_by_name_ps]").val());
//     $.ajax({
//         url: BACKEND_URL + "/filter_registration",
//         type: 'post',
//         data: send_data,
//         contentType: false,
//         processData: false,
//         success: function (data) {
//             var student_data = data.data;
//             student_data.forEach(function (element) {
//                 if (element.status == 0) {
//                     status = "PENDING";
//                 } else if (element.status == 1) {
//                     status = "APPROVED";
//                 } else {
//                     status = "REJECTED";
//                 }

//                 if (element.type == 1 && element.course.code == "da_1") {
//                     var tr = "<tr>";
//                     tr += "<td>" + +"</td>";
//                     tr += "<td>" + element.student_info.name_eng + "</td>";
//                     tr += "<td>" + element.student_info.email + "</td>";
//                     tr += "<td>" + element.student_info.registration_no + "</td>";
//                     tr += "<td>" + element.student_info.phone + "</td>";
//                     tr += "<td>" + status + "</td>";
//                     tr += "<td ><div class='btn-group'>";
//                     tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showStudentPrivateSchool(" + element.student_info_id + ',' + "\"" + element.course.code + "\"" + ")'>" +
//                         "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
//                     tr += "</tr>";
//                     $("#tbl_student_private_school_body").append(tr);

//                 }
//                 if (element.type == 1 && element.course.code == "da_2") {
//                     var tr = "<tr>";
//                     tr += "<td>" + +"</td>";
//                     tr += "<td>" + element.student_info.name_eng + "</td>";
//                     tr += "<td>" + element.student_info.email + "</td>";
//                     tr += "<td>" + element.student_info.registration_no + "</td>";
//                     tr += "<td>" + element.student_info.phone + "</td>";
//                     tr += "<td>" + status + "</td>";
//                     tr += "<td ><div class='btn-group'>";
//                     tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showStudentPrivateSchool(" + element.student_info_id + ',' + "\"" + element.course.code + "\"" + ")'>" +
//                         "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
//                     tr += "</tr>";
//                     $("#da_two_private_school_body").append(tr);

//                 }
//                 if (element.type == 1 && element.course.code == "cpa_1") {

//                     var tr = "<tr>";
//                     tr += "<td>" + +"</td>";
//                     tr += "<td>" + element.student_info.name_eng + "</td>";
//                     tr += "<td>" + element.student_info.email + "</td>";
//                     tr += "<td>" + element.student_info.registration_no + "</td>";
//                     tr += "<td>" + element.student_info.phone + "</td>";
//                     tr += "<td>" + status + "</td>";
//                     tr += "<td ><div class='btn-group'>";
//                     tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showStudentPrivateSchool(" + element.student_info_id + ',' + "\"" + element.course.code + "\"" + ")'>" +
//                         "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
//                     tr += "</tr>";
//                     $("#tbl_cpa1_student_private_school_body").append(tr);


//                 }
//                 if (element.type == 1 && element.course.code == "cpa_2") {

//                     var tr = "<tr>";
//                     tr += "<td>" + +"</td>";
//                     tr += "<td>" + element.student_info.name_eng + "</td>";
//                     tr += "<td>" + element.student_info.email + "</td>";
//                     tr += "<td>" + element.student_info.registration_no + "</td>";
//                     tr += "<td>" + element.student_info.phone + "</td>";
//                     tr += "<td>" + status + "</td>";
//                     tr += "<td ><div class='btn-group'>";
//                     tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showStudentPrivateSchool(" + element.student_info_id + ',' + "\"" + element.course.code + "\"" + ")'>" +
//                         "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
//                     tr += "</tr>";


//                     $("#tbl_cpa2_student_private_school_body").append(tr);

//                 }

//             });

//             getIndexNumber('#tbl_student_private_school tr');
//             createDataTable("#tbl_student_private_school");
//             getIndexNumber('#da_two_private_school tr');
//             createDataTable("#da_two_private_school");
//             getIndexNumber('#tbl_cpa1_student_private_school tr');
//             createDataTable("#tbl_cpa1_student_private_school");
//             getIndexNumber('#tbl_cpa2_student_private_school tr');
//             createDataTable("#tbl_cpa2_student_private_school");
//         },
//         error: function (message) {
//             dataMessage(message, "#tbl_student_private_school", "#tbl_student_private_school_body");
//             dataMessage(message, "#da_two_private_school", "#da_two_private_school_body");
//             dataMessage(message, "#tbl_cpa1_student_private_school", "#tbl_cpa1_student_private_school_body");
//             dataMessage(message, "#tbl_cpa2_student_private_school", "#tbl_cpa2_student_private_school_body");
//         }

//     });
// }

// function showStudentPrivateSchool(studentId, course_code) {
//     localStorage.setItem("student_id", studentId);
//     localStorage.setItem("course_code", course_code);
//     location.href = FRONTEND_URL + "/private_school";
// }

// function loadStudentPrivateSchool() {
//     var id = localStorage.getItem("student_id");
//     var course_code = localStorage.getItem("course_code");
//     $("#student_name").html("");
//     $("#student_nrc").html("");
//     $("#student_dob").html("");
//     $("#student_father").html("");
//     $("#student_email").html("");
//     $("#student_phone").html("");
//     $("#student_registration_no").html("");

//     $.ajax({
//         type: "GET",
//         url: BACKEND_URL + "/student_register/" + id,
//         success: function (data) {
//             var student = data.data;
//             student.forEach(function (element) {
//                 var student_info = element.student_register;
//                 $("#student_name").append(element.name_eng + "/" + element.name_mm);
//                 $("#student_nrc").append(element.nrc_state_region + "/" + element.nrc_township + "(" + element.nrc_citizen + ")" + element.nrc_number);
//                 $("#student_dob").append(element.date_of_birth);
//                 $("#student_father").append(element.father_name_eng);
//                 $("#student_email").append(element.email);
//                 $("#student_phone").append(element.phone);
//                 $("#student_registration_no").append(element.registration_no);
//                 student_info.forEach(function (item) {
//                     if (item.type == 1 && course_code == "da_1") {
//                         $("input[name = student_register_id]").val(item.id);
//                     }
//                     if (item.type == 1 && course_code == "da_2") {
//                         $("input[name = student_register_id]").val(item.id);
//                     }
//                     if (item.type == 1 && course_code == "cpa_1") {
//                         $("input[name = student_register_id]").val(item.id);
//                     }
//                     if (item.type == 1 && course_code == "cpa_2") {
//                         $("input[name = student_register_id]").val(item.id);
//                     }
//                 })

//             })
//         }
//     })
// }

// function getStudentMac() {
//     destroyDatatable("#tbl_student_mac", "#tbl_student_mac_body");
//     destroyDatatable("#da_two_mac", "#da_two_mac_body");
//     destroyDatatable("#tbl_cpa1_student_mac", "#tbl_cpa1_student_mac_body");
//     destroyDatatable("#tbl_cpa2_student_mac", "#tbl_cpa2_student_mac_body");
//     var send_data = new FormData();
//     send_data.append('name', $("input[name=filter_by_name_mac]").val());
//     $.ajax({
//         url: BACKEND_URL + "/filter_registration",
//         type: 'post',
//         data: send_data,
//         contentType: false,
//         processData: false,
//         success: function (data) {
//             var student_data = data.data;
//             student_data.forEach(function (element) {
//                 if (element.type == 2 && element.course.code == "da_1") {
//                     var status;
//                     if (element.status == 0) {
//                         status = "PENDING";
//                     } else if (element.status == 1) {
//                         status = "APPROVED";
//                     } else {
//                         status = "REJECTED";
//                     }
//                     var tr = "<tr>";
//                     tr += "<td>" + +"</td>";
//                     tr += "<td>" + element.student_info.name_eng + "</td>";
//                     tr += "<td>" + element.student_info.email + "</td>";
//                     tr += "<td>" + element.student_info.registration_no + "</td>";
//                     tr += "<td>" + element.student_info.phone + "</td>";
//                     tr += "<td>" + status + "</td>";
//                     tr += "<td ><div class='btn-group'>";
//                     tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showStudentMac(" + element.student_info_id + ',' + "\"" + element.course.code + "\"" + ")'>" +
//                         "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
//                     tr += "</tr>";
//                     $("#tbl_student_mac_body").append(tr);

//                 }
//                 if (element.type == 2 && element.course.code == "da_2") {
//                     var status;
//                     if (element.status == 0) {
//                         status = "PENDING";
//                     } else if (element.status == 1) {
//                         status = "APPROVED";
//                     } else {
//                         status = "REJECTED";
//                     }
//                     var tr = "<tr>";
//                     tr += "<td>" + +"</td>";
//                     tr += "<td>" + element.student_info.name_eng + "</td>";
//                     tr += "<td>" + element.student_info.email + "</td>";
//                     tr += "<td>" + element.student_info.registration_no + "</td>";
//                     tr += "<td>" + element.student_info.phone + "</td>";
//                     tr += "<td>" + status + "</td>";
//                     tr += "<td ><div class='btn-group'>";
//                     tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showStudentMac(" + element.student_info_id + ',' + "\"" + element.course.code + "\"" + ")'>" +
//                         "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
//                     tr += "</tr>";
//                     $("#da_two_mac_body").append(tr);
//                 }
//                 if (element.type == 2 && element.course.code == "cpa_1") {
//                     var status;
//                     if (element.status == 0) {
//                         status = "PENDING";
//                     } else if (element.status == 1) {
//                         status = "APPROVED";
//                     } else {
//                         status = "REJECTED";
//                     }
//                     var tr = "<tr>";
//                     tr += "<td>" + +"</td>";
//                     tr += "<td>" + element.student_info.name_eng + "</td>";
//                     tr += "<td>" + element.student_info.email + "</td>";
//                     tr += "<td>" + element.student_info.registration_no + "</td>";
//                     tr += "<td>" + element.student_info.phone + "</td>";
//                     tr += "<td>" + status + "</td>";
//                     tr += "<td ><div class='btn-group'>";
//                     tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showStudentMac(" + element.student_info_id + ',' + "\"" + element.course.code + "\"" + ")'>" +
//                         "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
//                     tr += "</tr>";
//                     $("#tbl_cpa1_student_mac_body").append(tr);


//                 }

//                 if (element.type == 2 && element.course.code == "cpa_2") {
//                     var status;
//                     if (element.status == 0) {
//                         status = "PENDING";
//                     } else if (element.status == 1) {
//                         status = "APPROVED";
//                     } else {
//                         status = "REJECTED";
//                     }
//                     var tr = "<tr>";
//                     tr += "<td>" + +"</td>";
//                     tr += "<td>" + element.student_info.name_eng + "</td>";
//                     tr += "<td>" + element.student_info.email + "</td>";
//                     tr += "<td>" + element.student_info.registration_no + "</td>";
//                     tr += "<td>" + element.student_info.phone + "</td>";
//                     tr += "<td>" + status + "</td>";
//                     tr += "<td ><div class='btn-group'>";
//                     tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showStudentMac(" + element.student_info_id + ',' + "\"" + element.course.code + "\"" + ")'>" +
//                         "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
//                     tr += "</tr>";
//                     $("#tbl_cpa2_student_mac_body").append(tr);

//                 }
//             })
//             getIndexNumber('#tbl_student_mac tr');
//             createDataTable("#tbl_student_mac");
//             getIndexNumber('#da_two_mac tr');
//             createDataTable("#da_two_mac");
//             getIndexNumber('#tbl_cpa1_student_mac tr');
//             createDataTable("#tbl_cpa1_student_mac");
//             getIndexNumber('#tbl_cpa2_student_mac tr');
//             createDataTable("#tbl_cpa2_student_mac");
//         },
//         error: function (message) {
//             dataMessage(message, "#tbl_student_mac", "#tbl_student_mac_body");
//             dataMessage(message, "#da_two_mac", "#da_two_mac_body");
//             dataMessage(message, "#tbl_cpa1_student_mac", "#tbl_cpa1_student_mac_body");
//             dataMessage(message, "#tbl_cpa2_student_mac", "#tbl_cpa2_student_mac_body");
//         }
//     });
// }

// function showStudentMac(studentId, course_code) {
//     localStorage.setItem("student_id", studentId);
//     localStorage.setItem("course_code", course_code);
//     location.href = FRONTEND_URL + "/mac";
// }

// function loadStudentMac() {
//     var id = localStorage.getItem("student_id");
//     var course_code = localStorage.getItem("course_code");
//     $("#student_name").html("");
//     $("#student_nrc").html("");
//     $("#student_dob").html("");
//     $("#student_father").html("");
//     $("#student_email").html("");
//     $("#student_phone").html("");
//     $("#student_registration_no").html("");

//     $.ajax({
//         type: "GET",
//         url: BACKEND_URL + "/student_register/" + id,
//         success: function (data) {
//             var student = data.data;
//             student.forEach(function (element) {
//                 var student_info = element.student_register;
//                 $("#student_name").append(element.name_eng + "/" + element.name_mm);
//                 $("#student_nrc").append(element.nrc_state_region + "/" + element.nrc_township + "(" + element.nrc_citizen + ")" + element.nrc_number);
//                 $("#student_dob").append(element.date_of_birth);
//                 $("#student_father").append(element.father_name_eng);
//                 $("#student_email").append(element.email);
//                 $("#student_phone").append(element.phone);
//                 $("#student_registration_no").append(element.registration_no);
//                 student_info.forEach(function (item) {
//                     if (item.type == 2 && course_code == "da_1") {
//                         $("input[name = student_register_id]").val(item.id);
//                     }
//                     if (item.type == 2 && course_code == "da_2") {
//                         $("input[name = student_register_id]").val(item.id);
//                     }
//                     if (item.type == 2 && course_code == "cpa_1") {
//                         $("input[name = student_register_id]").val(item.id);
//                     }
//                     if (item.type == 2 && course_code == "cpa_2") {
//                         $("input[name = student_register_id]").val(item.id);
//                     }
//                 })
//             })
//         }
//     })
// }

function approveStudent() {

    var id = $("input[name = student_register_id]").val();

    var course_code = localStorage.getItem("course_code");
    console.log(id);
    $.ajax({
        url: BACKEND_URL + "/approve_student/" + id,
        type: 'patch',
        success: function (result) {
            console.log(result.data)
            successMessage("You have approved that student!");
            if (course_code == 1) {
                location.href = FRONTEND_URL + "/index";
            } else if (course_code == 2) {
                location.href = FRONTEND_URL + "/da_two_index";
            } else if (course_code == 3) {
                location.href = FRONTEND_URL + "/cpa_one_index";
            } else {
                location.href = FRONTEND_URL + "/cpa_two_index";
            }
            // getStudentSelfStudy();
            // getStudentPrivateSchool();
            // getStudentMac();
            GetStudentRegistration(course_code);
        },
        error: function (e) {
            console.log(e);
        }
    });
}

function rejectStudent() {
    var id = $("input[name = student_register_id]").val();
    var course_code = localStorage.getItem("course_code");
    console.log(id)
    $.ajax({
        url: BACKEND_URL + "/reject_student/" + id,
        type: 'patch',
        success: function (result) {
            console.log(result)
            successMessage("You have rejected that student!");
            if (course_code == 1) {
                location.href = FRONTEND_URL + "/index";
            } else if (course_code == 2) {
                location.href = FRONTEND_URL + "/da_two_index";
            } else if (course_code == 3) {
                location.href = FRONTEND_URL + "/cpa_one_index";
            } else {
                location.href = FRONTEND_URL + "/cpa_two_index";
            }
            // getStudentSelfStudy();
            // getStudentPrivateSchool();
            // getStudentMac();
            GetStudentRegistration(course_code);
        }
    });
}
