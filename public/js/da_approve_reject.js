var attached_file;

function getDAList(course_code) {
    destroyDatatable("#tbl_da_pending_list", "#tbl_da_pending_list_body");
    destroyDatatable("#tbl_da_approved_list", "#tbl_da_approved_list_body");
    destroyDatatable("#tbl_da_rejected_list", "#tbl_da_rejected_list_body");
    // var tab = document.getElementById('link1');
    var send_data = new FormData();
    send_data.append('name', $("input[name=filter_by_name]").val());
    send_data.append('nrc', $("input[name=filter_by_nrc]").val());
    send_data.append('batch', $("#selected_batch_id").val());
    show_loader();
    $.ajax({
        url: BACKEND_URL + "/filter_student_info",
        type: 'post',
        data: send_data,
        contentType: false,
        processData: false,
        success: function (data) {
            EasyLoading.hide();
            var da_data = data.data;
            // console.log({
            //     data
            // });
            let da_one_list = da_data.filter(function (v) {
                return v.batch.course.code == course_code
            })
            // console.log(da_one_list)
            da_one_list.forEach(function (element) {
                var status;
                if (element.approve_reject_status == 0) {
                    status = "PENDING";
                } else if (element.approve_reject_status == 1) {
                    status = "APPROVED";
                } else {
                    status = "REJECTED";
                }
                if (element.approve_reject_status == 0) {
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showDAList(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td >";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    tr += "<td>" + element.batch.name + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";
                    tr += "<td>" + element.student_info.phone + "</td>";
                    tr += "<td>" + element.student_info.nrc_state_region + "/" + element.student_info.nrc_township + "(" + element.student_info.nrc_citizen + ")" + element.student_info.nrc_number + "</td>";
                    tr += "<td>" + status + "</td>";

                    tr += "</tr>";
                    $("#tbl_da_pending_list_body").append(tr);
                } else if (element.approve_reject_status == 1) {
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showDAList(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    tr += "<td>" + element.batch.name + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";
                    tr += "<td>" + element.student_info.phone + "</td>";
                    tr += "<td>" + element.student_info.nrc_state_region + "/" + element.student_info.nrc_township + "(" + element.student_info.nrc_citizen + ")" + element.student_info.nrc_number + "</td>";
                    tr += "<td>" + status + "</td>";

                    tr += "</tr>";
                    $("#tbl_da_approved_list_body").append(tr);
                } else if (element.approve_reject_status == 2) {
                    var tr = "<tr>";
                    tr += "<td>" + +"</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showDAList(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    tr += "<td>" + element.batch.name + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";
                    tr += "<td>" + element.student_info.phone + "</td>";
                    tr += "<td>" + element.student_info.nrc_state_region + "/" + element.student_info.nrc_township + "(" + element.student_info.nrc_citizen + ")" + element.student_info.nrc_number + "</td>";
                    tr += "<td>" + status + "</td>";

                    tr += "</tr>";
                    $("#tbl_da_rejected_list_body").append(tr);
                }
            });
            getIndexNumber('#tbl_da_pending_list tr');
            createDataTable("#tbl_da_pending_list");
            getIndexNumber('#tbl_da_approved_list tr');
            createDataTable("#tbl_da_approved_list");
            getIndexNumber('#tbl_da_rejected_list tr');
            createDataTable("#tbl_da_rejected_list");
        },
        error: function (message) {
            dataMessage(message, "#tbl_da_pending_list", "#tbl_da_pending_list_body");
            dataMessage(message, "#tbl_da_approved_list", "#tbl_da_approved_list_body");
            dataMessage(message, "#tbl_da_rejected_list", "#tbl_da_rejected_list_body");
        }
    });
}

function showDAList(student_course_id) {
    localStorage.setItem("student_course_id", student_course_id);
    location.href = FRONTEND_URL + "/da_edit";
}

function loadData() {
    var id = localStorage.getItem("student_course_id");
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
    $("input[name = student_course_id]").val(id);
    $('.course').html("");
    var course_html;
    $.ajax({
        type: "GET",
        url: BACKEND_URL + "/da_register/" + id,
        success: function (data) {
            var student = data.data;

            student.forEach(function (student_course) {
                if (student_course.type == 0) {
                    $("#attend_place").append("ကိုယ်တိုင်လေ့လာသင်ယူသူ");
                } else if (student_course.type == 1) {
                    $("#attend_place").append("ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း");
                } else if (student_course.type == 2 && student_course.mac_type == 1) {
                    $("#attend_place").append("စာရင်းကောင်စီ (ရန်ကုန်သင်တန်းကျောင်း)");
                } else if (student_course.type == 2 && student_course.mac_type == 2) {
                    $("#attend_place").append("စာရင်းကောင်စီ (နေပြည်တော်သင်တန်းကျောင်း)");
                } else {
                    $("#attend_place").append("-");
                }
                let current_course = student_course.batch.course;
                // console.log('current_course',current_course)

                let element = student_course.student_info;
                // console.log('student_info',element)

                if (student_course.approve_reject_status == 0) {
                    document.getElementById("approve_reject").style.display = "block";

                } else {
                    document.getElementById("approve_reject").style.display = "none";
                }

                var education_history = element.student_education_histroy;
                var job = element.student_job;

                $("#id").append(element.id);
                document.getElementById('image').src = PDF_URL + element.image;
                $("#name_eng").append(element.name_eng);
                $("#name_mm").append(element.name_mm);
                $("#nrc").append(element.nrc_state_region + "/" + element.nrc_township + "(" + element.nrc_citizen + ")" + element.nrc_number);
                $("#father_name_mm").append(element.father_name_mm);
                $("#father_name_eng").append(element.father_name_eng);
                $("#gender").append(element.gender);
                $("#race").append(element.race);
                $("#religion").append(element.religion);
                $("#date_of_birth").append(element.date_of_birth);
                $("#address").append(element.address);
                $("#current_address").append(element.current_address);
                $("#phone").append(element.phone);
                $("#email").append(element.email);
                $("#gov_staff").append(element.gov_staff == 0 ? "မဟုတ်" : "ဟုတ်");
                // $("#image").append(element.image);
                if (current_course.course_type_id == 1) {
                    $("#registration_no").append((element.personal_no == null || element.personal_no == "") ? "-" : element.personal_no);
                } else if (current_course.course_type_id == 2) {
                    $("#registration_no").append((element.cpersonal_no == null || element.cpersonal_no == "") ? "-" : element.cpersonal_no);
                } else {
                    $("#registration_no").append("-");
                }
                $("#date").append(element.date);
                $("#batch_name").append(student_course.batch.name);
                if (element.gov_staff == 1) {
                    if(element.recommend_letter){
                        $(".recommend_row").show();
                        $(".recommend_letter").append(`<a href='${PDF_URL + element.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                    }else{
                        $(".recommend_row").hide();
                    }                    
                    
                } else {
                    $(".recommend_row").hide();
                }

                if (!element.da_pass_roll_number) {
                    $(".da_two_pass_info").hide();
                } else {
                    $(".da_two_pass_info").show();
                    if (element.da_pass_certificate == null) {


                        $(".da_pass_certificate").append(`<a href='${PDF_URL}/get_certificate/${element.id}?course_code=da_2' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`)

                        // $(".da_pass_certificate").append(`<a href='#' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>File not available</a>`)
                    } else {
                        $(".da_pass_certificate").append(`<a href='${PDF_URL + element.da_pass_certificate}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`)
                    }
                    $(".da_pass_date").append(element.da_pass_date);
                    $(".da_pass_roll_number").append(element.da_pass_roll_number);
                }

                if (!element.acca_cima) {
                    $(".acca_cima_info").hide();
                } else {
                    $(".acca_cima_info").show();
                    if (element.acca_cima == 1) {
                        $(".acca_cima").append("ACCA");
                    } else {
                        $(".acca_cima").append("CIMA");
                    }
                    $(".acca_cima_pass_roll_no").append(element.direct_degree);
                    $(".acca_cima_pass_date").append(element.degree_date);
                    $(".acca_cima_id_no").append(element.degree_rank);
                    if (element.degree_certificate_image == null) {
                        $(".acca_cima_certificate").append(`<a href='#' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>File Not Available</a>`)
                    } else {
                        $(".acca_cima_certificate").append(`<a href='${PDF_URL + element.degree_certificate_image}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                    }


                    if (element.da_pass_certificate == null) {
                        $(".da_pass_certificate").append(`<a href='#' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>File Not Available</a>`)
                    } else {
                        $(".da_pass_certificate").append(`<a href='${PDF_URL + element.da_pass_certificate}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`)
                    }
                    $(".da_pass_date").append(element.da_pass_date);
                    $(".da_pass_roll_number").append(element.da_pass_roll_number);
                }


                $("#university_name").append(education_history.university_name);
                $("#degree_name").append(education_history.degree_name);
                $("#qualified_date").append(education_history.qualified_date);
                $("#roll_number").append(education_history.roll_number);

                let certificate = JSON.parse(education_history.certificate);
                // console.log('certificate',certificate);
                $.each(certificate, function (fileCount, fileName) {

                    $(".certificate").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);

                })

                $(".nrc_front").append(`<a href='${PDF_URL + element.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);
                $(".nrc_back").append(`<a href='${PDF_URL + element.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);

                $("#name").append(job.name);
                $("#position").append(job.position);
                $("#department").append(job.department);
                $("#organization").append(job.organization);
                $("#company_name").append(job.company_name);
                $("#salary").append(job.salary);
                $("#office_address").append(job.office_address);
                attached_file = element.student_education_histroy.certificate;
                //document.getElementById('attach_file').src=attached_file;
                $.ajax({
                    url: BACKEND_URL + "/get_passed_exam_student/" + element.id,
                    type: 'get',
                    success: function (result) {
                        if (result.data.length != 0) {
                            // console.log(result.data,"aa");
                            result.data.forEach(function (course) {
                                var success_year = new Date(course.updated_at);
                                var module_name;
                                if (course.pass_module == 1) {
                                    module_name = "Module 1";
                                }
                                else if (course.pass_module == 2) {
                                    module_name = "Module 2";
                                }
                                else if (course.pass_module == 3) {
                                    module_name = "All Module";
                                }
                                else {
                                    module_name = "-";
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


                if (student_course.approve_reject_status == 1 || student_course.approve_reject_status == 0) {
                    $("#payment_info_card").show();
                } else {
                    $("#payment_info_card").hide();
                }
                let invoice_no = current_course.code == "da_1" ? 'app_form' : 'cpa_app';
                // console.log('invoice_no',invoice_no)
                $.ajax({
                    url: BACKEND_URL + "/get_payment_info_by_student/" + invoice_no + "/" + element.id,
                    type: 'get',
                    success: function (result) {
                        // console.log("papp invoice",result.productDesc);
                        if (result.status == 0) {
                            $('#payment_status').append("Incomplete");
                        }
                        else if (result.status == 'AP') {
                            $('#payment_status').append("Complete");
                        }
                        else {
                            $('#payment_status').append("-");
                        }
                        var productDesc = result.productDesc.split(",");
                        var amount = result.amount.split(",");
                        var total = 0;
                        for (var i in amount) {
                            total += parseInt(amount[i]);
                        }
                        // console.log(total);
                        for (let i = 0; i < amount.length; i++) {
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

            })
        }
    })
}

// function getPaymentInfo(){
//     var id = localStorage.getItem("student_course_id");
//     $.ajax({
//         url: BACKEND_URL + "/get_payment_info/" + 'app_form'+id,
//         type: 'get',
//         success: function (result) {
//             console.log("papp invoice",result);
//             if(result.status==0){
//                 $('#payment_status').append("Unpaid");
//             }
//             else if(result.status=='AP'){
//                 $('#payment_status').append("Paid");
//             }
//             else{
//                 $('#payment_status').append("-");
//             }
//             var productDesc = result.productDesc.split(",");
//             var amount = result.amount.split(",");
//             var total=0;
//             for(var i in amount) { 
//                 total += parseInt(amount[i]);
//             }
//             console.log(total);
//             for(let i=0 ; i<amount.length ; i++){
//                 $('.fee_list').append(`
//                     <li
//                         class="list-group-item d-flex justify-content-between lh-condensed">
//                         <h6 class="my-0">${productDesc[i]}</h6>
//                         <span class="text-muted">- ${amount[i]} MMK</span>
//                     </li>
//                 `);
//             }
//             $('.fee_list').append(`
//                 <li class="list-group-item d-flex justify-content-between">
//                     <span>Total (MMK)</span>
//                     <span id="total">
//                         - <strong>${total}</strong> MMK
//                     </span>
//                 </li>
//             `);
//         }
//     });
// }

function approveUser(student_info_id) {
    var student_info_id = student_info_id || $("input[name = student_course_id]").val();
    Swal.fire({
        title: 'Approve Student?',
        text: "Are you sure to approve this student?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Approve it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: BACKEND_URL + "/approve/" + student_info_id,
                type: 'patch',
                success: function (result) {
                    let url;
                    if (result) {
                        switch (result.code) {
                            case 'da_1':
                                url = '/da_one_app_list';
                                break;
                            case 'da_2':
                                url = '/da_two_app_list';
                                break;
                            case 'cpa_1':
                                url = '/cpa_one_app_list';
                                break;
                            case 'cpa_2':
                                url = '/cpa_two_app_list';
                                break;
                            default:
                                url = '/da_one_app_list';
                                break;
                        }
                        // successMessage("You have approved that user!");

                        Swal.fire(
                            'Approved!',
                            'Approved Student',
                            'success'
                        ).then(() => {
                            setInterval(() => {
                                location.href = FRONTEND_URL + url;
                            }, 2000);
                        });
                    }
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

    /*if (!confirm('Are you sure you want to approve this student?')) {
        return;
    } else {
        var id = $("input[name = student_course_id]").val();
        $.ajax({
            url: BACKEND_URL + "/approve/" + id,
            type: 'patch',
            success: function (result) {
                let url;
                if (result) {

                    switch (result.code) {
                        case 'da_1':
                            url = '/da_one_app_list';
                            break;
                        case 'da_2':
                            url = '/da_two_app_list';
                            break;
                        case 'cpa_1':
                            url = '/cpa_one_app_list';
                            break;
                        case 'cpa_2':
                            url = '/cpa_two_app_list';
                            break;
                        default:
                            url = '/da_one_app_list';
                            break;



                    }
                    successMessage("You have approved that user!");
                    location.href = FRONTEND_URL + url;
                }
            }
        });
    }*/
}

function rejectUser(student_info_id) {
    var student_info_id = student_info_id || $("input[name = student_course_id]").val();
    Swal.fire({
        title: 'Reject Student?',
        text: "Are you sure to reject this student?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Reject it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData();
            formData.append('remark', $('#remark').val());
            formData.append('_method', 'PATCH')
            // var id = $("#student_info_id").val();

            $.ajax({
                url: BACKEND_URL + "/reject/" + student_info_id,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    let url;
                    if (result) {
                        switch (result.code) {
                            case 'da_1':
                                url = '/da_one_app_list';
                                break;
                            case 'da_2':
                                url = '/da_two_app_list';
                                break;
                            case 'cpa_1':
                                url = '/cpa_one_app_list';
                                break;
                            case 'cpa_2':
                                url = '/cpa_two_app_list';
                                break;
                            default:
                                url = '/da_one_app_list';
                                break;
                        }
                        Swal.fire(
                            'Rejected!',
                            'Rejected Student',
                            'success'
                        ).then(() => {
                            setInterval(() => {
                                location.href = FRONTEND_URL + url;
                            }, 2000);
                        });
                    }
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
    } else {
        var formData = new FormData();
        formData.append('remark', $('#remark').val());
        formData.append('_method', 'PATCH')
        var id = $("#student_info_id").val();

        $.ajax({
            url: BACKEND_URL + "/reject/" + id,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                let url;
                if (result) {
                    switch (result.code) {
                        case 'da_1':
                            url = '/da_one_app_list';
                            break;
                        case 'da_2':
                            url = '/da_two_app_list';
                            break;
                        case 'cpa_1':
                            url = '/cpa_one_app_list';
                            break;
                        case 'cpa_2':
                            url = '/cpa_two_app_list';
                            break;
                        default:
                            url = '/da_one_app_list';
                            break;
                    }
                    successMessage("You have rejected that user!");
                    location.href = FRONTEND_URL + url;
                }
                // location.href = FRONTEND_URL + "/da_one_app_list";
            }
        });
    }*/
}

function file_read(data) {
    if (data == 'certificate') {
        document.getElementById('attach_file').src = PDF_URL + attached_file;
        $('#myModal').modal({
            show: true
        });
    }
}
