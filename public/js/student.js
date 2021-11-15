function GetStudentRegistration(course_code) {
    destroyDatatable("#tbl_student_self_study", "#tbl_student_self_study_body");
    destroyDatatable("#tbl_student_private_school", "#tbl_student_private_school_body");
    destroyDatatable("#tbl_student_mac", "#tbl_student_mac_body");
    var send_data = new FormData();
    send_data.append('name', "");
    send_data.append('status', "all");
    send_data.append('batch', "all");
    if (course_code == "da_1") {
        course_id = 1;
    }
    else if (course_code == "da_2") {
        course_id = 2;
    }
    else if (course_code == "cpa_1") {
        course_id = 3;
    }
    else if (course_code == "cpa_2") {
        course_id = 4;
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
            // console.log("stu data", student_data);
            student_data.forEach(function (element) {
                // console.log(element.id,"id");
                // console.log("stu element", element);
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
    // console.log('course_code',id)
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
    $("#gender").html("");
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
    $('.course').html("");
    var course_html;
    $("input[name = student_course_id]").val(id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL + "/show_student_register/" + id,
        success: function (data) {
            // console.log(data,"yy");
            var element = data.data;

            let course_reg = element.student_info.student_course_regs.filter(function(v){
                        return v.batch.course.code == "da_1"  && v.batch.id == element.batch_id
            });

            let latest_course_reg=course_reg.at(-1);

            if(latest_course_reg.type == 0){
                $("#attend_place").append("ကိုယ်တိုင်လေ့လာသင်ယူသူ");
            }else if(latest_course_reg.type == 1){
                $("#attend_place").append("ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း");
            }else if(latest_course_reg.type ==2 && latest_course_reg.mac_type == 1){
                $("#attend_place").append("စာရင်းကောင်စီ (ရန်ကုန်သင်တန်းကျောင်း)");
            }else if(latest_course_reg.type == 2 && latest_course_reg.mac_type == 2){
                $("#attend_place").append("စာရင်းကောင်စီ (နေပြည်တော်သင်တန်းကျောင်း)");
            }else {
                $("#attend_place").append("-");
            }


            // let da_one_list = element.filter(function (v) {
            //     console.log('da_one_list',da_one_list)
            //     // return v.batch.course.code == course_code
            // })

            let student_course_regs = element.student_info.student_course_regs.slice(-1);
            // console.log('student_course_regs',element.student_info.student_course_regs)
            // $("#student_name").append(element.student_info.name_eng + "/" + element.student_info.name_mm);
            // $("#student_nrc").append(element.student_info.nrc_state_region + "/" + element.student_info.nrc_township + "(" + element.student_info.nrc_citizen + ")" + element.student_info.nrc_number);
            // $("#student_dob").append(element.student_info.date_of_birth);
            // $("#student_father").append(element.student_info.father_name_eng);
            // $("#student_email").append(element.student_info.email);
            // $("#student_phone").append(element.student_info.phone);
            if(student_course_regs[0].sr_no==null){
                $("#student_registration_no").append("-");
            }else{
                $("#student_registration_no").append(student_course_regs[0].sr_no);
            }           
            
            if (element.reg_reason) {
                $("#student_registration_reason").append(element.reg_reason);
            } else {
                $("#student_registration_reason").append("-");
            }

            if (element.module == "1") {
                $("#module_name").append("Module 1");
            }
            else if (element.module == "2") {
                $("#module_name").append("Module 2");
            }
            else if (element.module == "3") {
                $("#module_name").append("All Module");
            }else{
                $("#module_name").append("-");
            }

            $("input[name = student_register_id]").val(element.id);
            if (element.status == 0) {
                document.getElementById("approve_reject").style.display = "block";
            } else {
                document.getElementById("approve_reject").style.display = "none";
            }
            var student_info_data = element.student_info;
            
            var education_history = student_info_data.student_education_histroy;
            var job = student_info_data.student_job;

            // if (element.course.course_type_id == 1) {
            //     $("#registration_no").append(student_info_data.personal_no);
            // } else if (element.course.course_type_id == 2) {
            //     $("#registration_no").append(student_info_data.cpersonal_no);
            // } else {
            //     $("#registration_no").append("-");
            // }
            if (element.course.course_type_id == 1) {
                $("#registration_no").append((student_info_data.personal_no== null || student_info_data.personal_no== "")?"-":student_info_data.personal_no);
            } else if (element.course.course_type_id == 2) {
                $("#registration_no").append((student_info_data.cpersonal_no== null || student_info_data.cpersonal_no== "")?"-":student_info_data.cpersonal_no);
            } else {
                $("#registration_no").append("-");
            }
            $("#id").append(student_info_data.id);
            document.getElementById('image').src = PDF_URL + student_info_data.image;
            $("#name_eng").append(student_info_data.name_eng);
            $("#name_mm").append(student_info_data.name_mm);
            $("#nrc").append(student_info_data.nrc_state_region + "/" + student_info_data.nrc_township + "(" + student_info_data.nrc_citizen + ")" + student_info_data.nrc_number);
            $("#father_name_mm").append(student_info_data.father_name_mm);
            $("#father_name_eng").append(student_info_data.father_name_eng);
            $("#gender").append(student_info_data.gender);
            $("#race").append(student_info_data.race);
            $("#religion").append(student_info_data.religion);
            $("#date_of_birth").append(student_info_data.date_of_birth);
            $("#address").append(student_info_data.address);
            $("#current_address").append(student_info_data.current_address);
            $("#phone").append(student_info_data.phone);
            $("#email").append(student_info_data.email);
            $("#gov_staff").append(student_info_data.gov_staff == 0 ? "မဟုတ်" : "ဟုတ်");
            // $("#image").append(element.image);
            //$("#batch_name").append(element.name);
            // console.log("student_info_data",student_info_data);
            if (student_info_data.gov_staff == 1) {
                $(".recommend_row").show();
                $(".recommend_letter").append(`<a href='${PDF_URL + student_info_data.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
            } else {
                $(".recommend_row").hide();
            }

            if(element.private_school_name){

                // console.log("internship",element.internship);
                $(".private_school_name_row").show();
                $("#private_school_name").append(element.private_school_name);
            }else{
                $(".private_school_name_row").hide();
            }

            if(element.internship){

                // console.log("internship",element.internship);
                $(".internship_program_row").show();
                $("#internship_program").append(element.internship);
            }else{
                $(".internship_program_row").hide();
            }

            if(element.good_behavior){
                $(".good_morale_file_row").show();
                $(".good_morale_file").append(`<a href='${PDF_URL + element.good_behavior}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
            }else{
                $(".good_morale_file_row").hide();
            }

            if(element.no_crime){
                $(".no_crime_file_row").show();
                $(".no_crime_file").append(`<a href='${PDF_URL + element.no_crime}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
            }else{
                $(".no_crime_file_row").hide();
            }

            $("#university_name").append(education_history.university_name);
            $("#degree_name").append(education_history.degree_name);
            $("#qualified_date").append(education_history.qualified_date);
            $("#roll_number").append(education_history.roll_number);

            let certificate = JSON.parse(education_history.certificate);
            // console.log('certificate',certificate);
            $.each(certificate, function (fileCount, fileName) {

                $(".certificate").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);

            });

            if(!student_info_data.da_pass_roll_number){
                $(".da_two_pass_info").hide();
            }else{
                $(".da_two_pass_info").show();
                if(student_info_data.da_pass_certificate==null){
                    $(".da_pass_certificate").append(`<a href='#' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>File Not Found</a>`)
                }else{
                    $(".da_pass_certificate").append(`<a href='${PDF_URL + student_info_data.da_pass_certificate}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`)
                }
                $(".da_pass_date").append(student_info_data.da_pass_date);
                $(".da_pass_roll_number").append(student_info_data.da_pass_roll_number);
            }

            $(".nrc_front").append(`<a href='${PDF_URL + student_info_data.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);
            $(".nrc_back").append(`<a href='${PDF_URL + student_info_data.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);

            $("#name").append(job.name);
            $("#position").append(job.position);
            $("#department").append(job.department);
            $("#organization").append(job.organization);
            $("#company_name").append(job.company_name);
            $("#salary").append(job.salary);
            $("#office_address").append(job.office_address);
            // attached_file = element.student_education_histroy.certificate;
            $.ajax({
                url: BACKEND_URL + "/get_passed_exam_student/" + student_info_data.id,
                type: 'get',
                success: function (result) {
                    if (result.data.length != 0) {
                        result.data.forEach(function (course) {
                            var success_year = new Date(course.updated_at);
                            var module_name;
                            if(course.pass_module==1){
                                module_name="Module 1";
                            }
                            else if(course.pass_module==2){
                                module_name="Module 2";
                            }
                            else if(course.pass_module==3){
                                module_name="All Module";
                            }
                            else{
                                module_name="-";
                            }
                            course_html += `<tr>
                                                <td>${course.course.name}</td>
                                                <td>${course.batch.name}</td>
                                                <td>${module_name}</td>
                                                <td>${success_year.getFullYear()}</td>
                                            </tr>`
                        });
                        $('.course').html(course_html)
                    }
                    else {
                        $('#tbl_course').DataTable({
                            "bPaginate": false,
                            "bLengthChange": false,
                            "bInfo": false,
                            searching: false,
                        });
                    }
                }
            });

            if(element.status == 1 || element.status == 0){
                $("#payment_info_card").show();
            }else{
                $("#payment_info_card").hide();
            }

            // console.log('student_course_regs',element.student_info.student_course_regs);
            let course_code = element.course.code == "da_1"? 'da_1' : 
                                element.course.code == "da_2"? 'da_2' :
                                element.course.code == "cpa_1"? 'cpa_1' : 'cpa_2';

            let reg_type    = element.type == 0? 'self_reg_' : 
                                element.type == 1? 'prv_reg_' : 'mac_reg_';                               
            // console.log('reg_type',reg_type);
            // console.log('course_code',course_code);
            
            $.ajax({
                url: BACKEND_URL + "/get_payment_info_by_student/" + reg_type + course_code+"/"+ student_info_data.id ,
                type: 'get',
                success: function (result) {
                    // console.log("papp invoice",result.productDesc);
                    if(result.status==0){
                        $('#payment_status').append("Incomplete");
                    }
                    else if(result.status=='AP'){
                        $('#payment_status').append("Complete");
                    }
                    else{
                        $('#payment_status').append("-");
                    }
                    var productDesc = result.productDesc.split(",");
                    var amount = result.amount.split(",");
                    var total=0;
                    for(var i in amount) { 
                        total += parseInt(amount[i]);
                    }
                    // console.log(total);
                    for(let i=0 ; i<amount.length ; i++){
                        $('.fee_list').append(`
                            <li
                                class="list-group-item d-flex justify-content-between lh-condensed">
                                <h6 class="my-0">${productDesc[i]}</h6>
                                <span class="text-muted">- ${amount[i]} MMK</span>
                            </li>
                        `);
                    }
                    $('.fee_list').append(`
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (MMK)</span>
                            <span id="total">
                                - <strong>${total}</strong> MMK
                            </span>
                        </li>
                    `);
                }
            });
            
        }
    })
}



function approveStudent(student_info_id) {

    var student_info_id = student_info_id || $("input[name = student_register_id]").val();
    
    Swal.fire({
        title: 'Approve Student?',
        text: "Are you sure to approve this student?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Approve it!'
    }).then( result => {
        if(result.isConfirmed){
            $.ajax({
                url: BACKEND_URL + "/approve_student/" + student_info_id,
                type: 'patch',
                success: function (result) {
                    // if (course_code == 1) {
                    //     url = FRONTEND_URL + "/index";
                    // } else if (course_code == 2) {
                    //     url = FRONTEND_URL + "/da_two_index";
                    // } else if (course_code == 3) {
                    //     url = FRONTEND_URL + "/cpa_one_index";
                    // } else {
                    //     url = FRONTEND_URL + "/cpa_two_index";
                    // }

                    Swal.fire(
                        'Approved!',
                        'Approved Student',
                        'success'
                    ).then( ()=> {
                        setInterval(() => {
                            window.history.back();
                        }, 2000);
                    });
                },
                error: (error) => {
                    Swal.fire(
                        'Oops..!',
                        'Something want wrong.',
                        'error'
                    )
                }
            });
        }
    });

    
}

function rejectStudent(student_info_id) {

    var student_info_id = student_info_id || $("input[name = student_register_id]").val();

    Swal.fire({
        title: 'Reject Student?',
        text: "Are you sure to reject this student?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Reject it!'
    }).then( result => {
       if(result.isConfirmed){
           $.ajax({
               url: BACKEND_URL + "/reject_student/" + student_info_id,
               type: 'patch',
               success: function (result) {
                   // if (course_code == 1) {
                   //     url = FRONTEND_URL + "/index";
                   // } else if (course_code == 2) {
                   //     url = FRONTEND_URL + "/da_two_index";
                   // } else if (course_code == 3) {
                   //     url = FRONTEND_URL + "/cpa_one_index";
                   // } else {
                   //     url = FRONTEND_URL + "/cpa_two_index";
                   // }

                   Swal.fire(
                       'Rejected!',
                       'Rejected Student',
                       'success'
                   ).then( ()=> {
                       setInterval(() => {
                           window.history.back();
                       }, 2000);
                   });
               },
               error: (error) => {
                   Swal.fire(
                       'Oops..!',
                       'Something want wrong.',
                       'error'
                   )
               }
           });
       }
    });

    /*if (!confirm('Are you sure you want to reject this student?')) {
        return;
    }
    else {
        var id = $("input[name = student_register_id]").val();
        var course_code = localStorage.getItem("course_code");
        // console.log(id)
        $.ajax({
            url: BACKEND_URL + "/reject_student/" + id,
            type: 'patch',
            success: function (result) {
                // console.log(result)
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
    }*/
}
