function GetStudentRegistration(course_code) {
    destroyDatatable("#tbl_student_self_study", "#tbl_student_self_study_body");
    destroyDatatable("#tbl_student_private_school", "#tbl_student_private_school_body");
    destroyDatatable("#tbl_student_mac", "#tbl_student_mac_body");
    var send_data = new FormData();
    send_data.append('name', $("input[name=filter_by_name_ss]").val());
    send_data.append('status', $("#selected_status").val());
    send_data.append('batch', $("#selected_batch_id").val());
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
    $("#student_name").html("");
    // $("#student_nrc").html("");
    $("#student_dob").html("");
    $("#student_father").html("");
    $("#student_email").html("");
    $("#student_phone").html("");
    $("#student_registration_no").html("");
    $("#student_registration_reason").html("");

    console.log({
        id
    });
    $.ajax({
        type: "GET",
        url: BACKEND_URL + "/show_student_register/" + id,
        success: function (data) {
            var element = data.data;
            console.log({
                element
            });
            $("#student_name").append(element.student_info.name_eng + "/" + element.student_info.name_mm);
            $("#student_nrc").append(element.student_info.nrc_state_region + "/" + element.student_info.nrc_township + "(" + element.student_info.nrc_citizen + ")" + element.student_info.nrc_number);
            $("#student_dob").append(element.student_info.date_of_birth);
            $("#student_father").append(element.student_info.father_name_eng);
            $("#student_email").append(element.student_info.email);
            $("#student_phone").append(element.student_info.phone);
            $("#student_registration_no").append(element.student_info.registration_no);
            $("#student_registration_reason").append(element.reg_reason);
            $("input[name = student_register_id]").val(element.id);
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
            if (course_code == "da_1") {
                location.href = FRONTEND_URL + "/index";
            } else if (course_code == "da_2") {
                location.href = FRONTEND_URL + "/da_two_index";
            } else if (course_code == "cpa_1") {
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
            if (course_code == "da_1") {
                location.href = FRONTEND_URL + "/index";
            } else if (course_code == "da_2") {
                location.href = FRONTEND_URL + "/da_two_index";
            } else if (course_code == "cpa_1") {
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
