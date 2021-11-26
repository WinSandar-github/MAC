function showContractDate(info) {
    if (info.article_form_type == "c2_pass_renew" || info.article_form_type == "c12_renew") {
        $("#renewContractModal").modal('show');
    } else {
        $("#contractModal").modal('show');
    }
    $("#article_id").val(info.id);
    $("#article_form_type").val(info.article_form_type);
    $("#student_info_id").val(info.student_info_id);
}

function saveRenewContractDate() {
    id = $("#article_id").val();
    article_form_type = $("#article_form_type").val();
    renew_start_date = $("input[name=renew_start_date]").val();
    renew_end_date = $("input[name=renew_end_date]").val();

    student_info_id = $("#student_info_id").val();

    if (renew_start_date && renew_end_date) {

        var data = new FormData();
        data.append('id', id);
        data.append('renew_start_date', renew_start_date);
        data.append('renew_end_date', renew_end_date);

        show_loader();
        $.ajax({
            type: "POST",
            data: data,
            url: BACKEND_URL + "/save_renew_contract_date",
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                EasyLoading.hide();
                successMessage("You have successfully registered.");
                location.reload();
            },
            error: function (message) {
                EasyLoading.hide();
                errorMessage(message);
            }
        });
    } else {
        alert("Please select date.");
    }
}

function saveContractDate() {
    id = $("#article_id").val();
    article_form_type = $("#article_form_type").val();
    contract_start_date = $("input[name=contract_start_date]").val();

    student_info_id = $("#student_info_id").val();

    if (contract_start_date) {

        let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var start_date = new Date(contract_start_date);
        var year = start_date.getFullYear();
        var month = start_date.getMonth();
        var day = start_date.getDate();

        if (article_form_type == "c2_pass_3yr") {
            var contract_end_date = new Date(year + 3, month, day - 1);
        } else if (article_form_type == "c12") {
            var contract_end_date = new Date(year + 2, month, day - 1);
        } else if (article_form_type == "c2_pass_1yr") {
            var contract_end_date = new Date(year + 1, month, day - 1);
        } else if (article_form_type == "qt_firm") {
            var contract_end_date = new Date(year + 3, month, day - 1);
        } else if (article_form_type == "c2_pass_renew") {
            //var contract_end_date = getContractEndDate(student_info_id , contract_start_date);;
        } else if (article_form_type == "c12_renew") {
            //var contract_end_date = getContractEndDate(student_info_id , contract_start_date);;
        }else if (article_form_type == "c2_pass_qt_pass_3yr") {
            var contract_end_date = new Date(year + 3, month, day - 1);
        }

        contract_end_date = String(contract_end_date.getDate()).padStart(2, '0') + "-" + months[contract_end_date.getMonth()] + "-" + contract_end_date.getFullYear();

        var data = new FormData();
        data.append('id', id);
        data.append('contract_start_date', contract_start_date);
        data.append('contract_end_date', contract_end_date);

        show_loader();
        $.ajax({
            type: "POST",
            data: data,
            url: BACKEND_URL + "/save_contract_date",
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                EasyLoading.hide();
                successMessage("You have successfully registered.");
                location.reload();
            },
            error: function (message) {
                EasyLoading.hide();
                errorMessage(message);
            }
        });
    } else {
        alert("Please select date.");
    }
}

function getContractEndDate(student_info_id, contract_start_date) {
    let resign_done_date;
    let form_pass_date;

    $.ajax({
        type: "GET",
        url: BACKEND_URL + "/get_resign_end_date/" + student_info_id,
        success: function (result) {
            result.forEach(function (element) {
                if (element.article_form_type == 'resign') {
                    resign_done_date = element.approve_resign_date;
                } else {
                    if (element.article_form_type != 'c2_pass_renew' && element.article_form_type != 'c12_renew' && element.done_status != 1) {
                        console.log(element.contract_end_date);
                        form_pass_date = element.contract_end_date;
                    }
                }
            });
            console.log(resign_done_date);
            console.log(form_pass_date);
        },
        error: function (message) {
            EasyLoading.hide();
            errorMessage(message);
        }
    });
}

function updateContractDate(info) {
    if (info.article_form_type == "c2_pass_renew" || info.article_form_type == "c12_renew") {
        $("#renewContractModal").modal('show');
        $("#renew_start_date").val(info.contract_start_date);
        $("#renew_end_date").val(info.contract_end_date);
    } else {
        $("#contractModal").modal('show');
        $("#contract_start_date").val(info.contract_start_date);
    }
    $("#article_id").val(info.id);
    $("#article_form_type").val(info.article_form_type);
}

function showArticle(id){
    localStorage.setItem("article_id",id);
    location.href=FRONTEND_URL+"/article_show";

}

function loadArticle()
{
    let result = window.location.href;
    let url = new URL(result);
    let offline_user = url.searchParams.get("offline_user");
    if(offline_user=="true"){
        var id = url.searchParams.get("id");
        $('#offline_user').val("true");
    }else{
        var id = localStorage.getItem("article_id");
    }
    $("input[name = article_id]").val(id);

    $.ajax({
        url: BACKEND_URL + "/acc_app/" + id,
        type: 'get',
        data: "",
        success: function (data) {
            var student_info = data.student_info;

            // var student_reg = student_info.student_register
            // var lastest_row = student_reg.length - 1;
            // var course = student_reg[lastest_row].course.code;  // cpa1/cpa2
            // var exam_result = student_reg[lastest_row].status;  // pass/fail
            // var module = student_reg[lastest_row].module;  // module 1/2/all
            // var type = student_reg[lastest_row].type;  //  0-self_study / 1-private / 2-mac

            // if(course == "cpa_1"){
            //     $("#course_name").text("ပထမပိုင်း");
            // }else{
            //     $("#course_name").text("ဒုတိယပိုင်း");
            // }

            // if(module == 1){
            //     $("#module_name").text("1");
            // }else if(module == 2){
            //     $("#module_name").text("2");
            // }else{
            //     $("#module_name").text("အားလုံး");
            // }

            // if(type == 0){
            //     $("#type_name").text("ကိုယ်တိုင်လေ့လာသင်ယူသူအဖြစ်");
            // }else if(type == 1){
            //     $("#type_name").text("ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်ကျောင်း");
            // }else{
            //     $("#type_name").text("သင်တန်းကျောင်း");
            // }

            // if(exam_result == 0){
            //     $("#result_name").text("တက်ရောက်နေ");
            // }else if(exam_result == 1){
            //     $("#result_name").text("အောင်မြင်");
            // }else{
            //     $("#result_name").text("ကျရုံး");
            //     $("#renew_row").show();
            //     document.getElementById('request_label').innerHTML="၃။";
            // }

            if(data.total_experience){
              var total_exp_array = JSON.parse(data.total_experience);
              var exp_year = total_exp_array[0];
              var exp_month = total_exp_array[1];
              var exp_days = total_exp_array[2];
            }

            if(data.article_form_type == 'c2_pass_renew' || data.article_form_type == 'c12_renew'){
              $("#previous_exp_box").css('display','block');
            }

            if(data.article_form_type == 'c12_renew'){
              //$("#previous_exp_box").css('display','block');
              $("#previous_info_box").css('display','block');
            }
            else if(data.article_form_type == 'c2_pass_renew'){
              $("#previous_info_box2").css('display','block');
            }else if(data.article_form_type == 'c2_pass_qt_pass_3yr'){
                $("#previous_info_box3").css('display','block');
            }

            var form_type;
            article_form_type = data.article_form_type;
            switch (article_form_type) {
                case 'c12':
                    form_type = 'CPA I,II';
                    break;
                case 'c2_pass_3yr':
                    form_type = 'CPA II Pass 3 yr';
                    break;
                case 'c2_pass_1yr':
                    form_type = 'CPA II Pass 1 yr';
                    break;
                case 'qt_firm':
                    form_type = 'QT Pass 3 yr';
                    break;
                case 'c2_pass_renew':
                    form_type = 'CPA II Pass Renew';
                    break;
                case 'c12_renew':
                    form_type = 'CPA I,II Renew';
                    break;
                case 'c2_pass_qt_pass_3yr':
                    form_type = 'CPA II Pass/QT Pass 3 yr';
                    break;
                default:
                    form_type = 'Resign';
                    break;
            }
            $("#form_type").text(form_type);
            $('#name_mm').val(student_info.name_mm);
            $("#name_eng").val(student_info.name_eng);
            $("#personal_no").val(student_info.cpersonal_no);
            $("#nrc_state_region").val(student_info.nrc_state_region);
            $("#nrc_township").val(student_info.nrc_township);
            $("#nrc_citizen").val(student_info.nrc_citizen);
            $("#nrc_number").val(student_info.nrc_number);
            $("#father_name_mm").val(student_info.father_name_mm);
            $("#father_name_eng").val(student_info.father_name_eng);
            $("#race").val(student_info.race);
            $("#religion").val(student_info.religion);
            $("#date_of_birth").val(student_info.date_of_birth);
            $("#ex_papp_name").val(data.ex_papp);
            $("#ex_papp_start_date").val(data.exp_start_date);
            $("#ex_papp_end_date").val(data.exp_end_date);
            $("#exp_year").val(exp_year);
            $("#exp_month").val(exp_month);
            $("#exp_days").val(exp_days);
            if(data.gender == 0){
              $("#gender").val("ကျွန်မ");
            }
            else{
              $("#gender").val("ကျွန်တော်");
            }
            $("#gender2").val(data.gender);
            $("#course_part").val(data.course_part);
            $("#exam_pass_batch").val(data.exam_pass_batch);
            $("#exam_pass_batch_2").val(data.exam_pass_batch);
            $("#school_name").val(data.school_name);
            $("#attend_or_fail").val(data.attend_or_fail);
            $("#exam_pass_date").val(data.exam_pass_date);

            if(student_info.gender == "ကျွန်တော်" ||student_info.gender == "Male"){
              $(".call_gender").text("ခင်ဗျာ");
            }
            else{
              $(".call_gender").text("ရှင့်");
            }
            if(student_info.gender == "1" ||student_info.gender == "Male"){
                $(".call_gender3").text("ခင်ဗျာ");

              }
              else{
                $(".call_gender3").text("ရှင့်");

              }
              if(student_info.gender == "1" ||student_info.gender == "Male"){
                $(".call_gender2").text("ခင်ဗျာ");

              }
              else{
                $(".call_gender2").text("ရှင့်");

              }
              if(data.gender == "1" ||student_info.gender == "Male"){
                 $("#gender3").val("ကျွန်တော်");
              }
              else{
                $("#gender3").val("ကျွန်မ");
              }
            if(data.gender == "1" ||student_info.gender == "Male"){
                $("#gender").val("ကျွန်တော်");
            }
            else{
               $("#gender").val("ကျွန်မ");
            }
            if(data.gender == "1" ||student_info.gender == "Male"){
                $("#gender2").val("ကျွန်တော်");
            }
            else{
               $("#gender2").val("ကျွန်မ");
            }
              $("#course_exam").val(data.course_exam);
            if (data.article_form_type == "qt_firm") {
                document.getElementById("qt_row").style.display = "block";
                document.getElementById("other_row").style.display = "none";
            } else {
                document.getElementById("qt_row").style.display = "none";
                document.getElementById("other_row").style.display = "block";
            }

            if (student_info.qualified_test != null) {
                $("#firm_education").hide();
                $("#qt_education").show();
                let lcl = JSON.parse(student_info.qualified_test.local_education);
                lcl.map(lcl_edu => $('#add_qt_education').append(`<p>${lcl_edu}</p>`));

                let certificate = JSON.parse(student_info.qualified_test.local_education_certificate);
                $.each(certificate, function (fileCount, fileName) {
                    $(".certificate").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Attach File</a>`);

                })

            } else {
                if (data.offline_user == 1) {
                    $('.offline_user').show();
                    $('#firm_education').hide();
                    $('#certificate_row').hide();
                    $('#office_order_row').show();
                    //$(".office_order_attach").append(`<a href='${PDF_URL + data.office_order_attach}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
                    loadEductaionHistoryByArticle(data.student_info_id);
                } else {
                    $("#education").val(student_info.student_education_histroy.degree_name);

                    let certificate = JSON.parse(student_info.student_education_histroy.certificate);
                    $.each(certificate, function (fileCount, fileName) {
                        $(".certificate").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Attach File</a>`);
                    })
                }
            }
            $("#address").val(student_info.address);
            $("#current_address").val(student_info.current_address);
            $("#phone_no").val(student_info.phone);
            if (student_info.email != null) {
                $("#m_email").val(student_info.email);
            } else {
                $("#m_email").val(data.m_email);
            }
            if (data.ex_papp == null) {
                document.getElementById("previous_papp_name_row").style.display = "none";
            } else if (data.ex_papp == "undefined" && data.exp_start_date == "undefined" && data.exp_end_date == "undefined") {
                document.getElementById("previous_papp_name_row").style.display = "none";
                document.getElementById("previous_papp_date_row").style.display = "none";
                $("#exam_pass_date_label").text('၁၅။');
            } else {
                $("#previous_papp_name").val(data.ex_papp);
                $("#previous_papp_start_date").val(data.exp_start_date);
                $("#previous_papp_end_date").val(data.exp_end_date);
                document.getElementById("previous_papp_name_row").style.display = "block";
                document.getElementById("previous_papp_date_row").style.display = "block";
            }
            if (data.exam_pass_date == null || data.exam_pass_batch == null) {
                document.getElementById("previous_exam_pass_row").style.display = "none";
            } else {
                $("#pass_date").val(data.exam_pass_date);
                $("#pass_no").val(data.exam_pass_batch);
                $("#exam_pass_date_label").text('၁၅။');
                document.getElementById("previous_exam_pass_row").style.display = "block";
            }
            // $("#pass_date").val(data.request_papp);
            // $("#pass_no").val(data.request_papp);

            if (data.article_form_type == "c2_pass_renew" || data.article_form_type == "c12_renew") {
                if ((data.offline_user == 1 && data.article_form_type == "c2_pass_renew")) {
                    $('#exp_row').css('display', 'none');
                    $('#exp_attach_row').css('display', 'none');
                    $("#gov_lab").text('၈။');
                    $("#current_lab").text('၉။');
                    $("#address_label").text('၁၀။');
                    $("#phone_lab").text('၁၁။');
                    $("#email_lab").text('၁၂။');
                    $("#c2_papp_lab").text('၁၃။');
                    $("#previous_papp_lab").text('၁၄။');
                    $("#previous_lab").text('၁၅။');
                    $("#exam_pass_date_label").text('၁၆။');
                    $('.praticle').hide();
                    $('.c2_pass_renew').show();
                    $("#c2_papp_name").val(data.request_papp);
                    if(data.mentor!=null){
                        $("#c2_mentor_name").val(data?.mentor?.name_eng);
                    }
                    else{
                        $("#c2_mentor_name").val(data.mentor_id);
                    }
                    $('#previous_papp_name_row').show();
                    $('#previous_papp_date_row').show();
                    $("#previous_papp_name").val(data.ex_papp);
                    $("#previous_papp_start_date").val(data.exp_start_date);
                    $("#previous_papp_end_date").val(data.exp_end_date);
                    $(".office_order_attach").append(`<a href='${PDF_URL + data.office_order_attach}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
                }else{
                        $('#exp_row').css('display','none');
                        $('#exp_attach_row').css('display','none');
                        $("#gov_lab").text('၈။');
                        $("#current_lab").text('၉။');
                        $("#address_label").text('၁၀။');
                        $("#phone_lab").text('၁၁။');
                        $("#email_lab").text('၁၂။');
                        $("#papp_lab").text('၁၃။');
                        $("#previous_papp_lab").text('၁၄။');
                        $("#previous_lab").text('၁၅။');
                        $("#exam_pass_date_label").text('၁၆။');
                        $("#papp_name").val(data.request_papp);
                        if(data.mentor!=null){
                            $("#mentor_name").val(data?.mentor?.name_eng);
                        }
                        else{
                            $("#mentor_name").val(data.mentor_id);
                        }
                        if(data.office_order_attach!=null){
                            $('#office_order_row').show();
                            $(".office_order_attach").append(`<a href='${PDF_URL + data.office_order_attach}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
                        }
                        
                }


            } else {
                if (data.apprentice_exp == 1) {
                    $('input:radio[name=experience][value=1]').attr('checked', true);
                    $('input:radio[name=experience][value=0]').attr('disabled', true);
                    $('#exp_row').css('display','block');
                    $('#exp_attach_row').css('display', 'block');
                    //let apprentice_exp_file=data.apprentice_exp_file.replace(/[\'"[\]']+/g, '');
                //    let apprentice_exp_file = JSON.parse(data.apprentice_exp_file);
                //     $.each(apprentice_exp_file, function (fileCount, fileName) {
                //         console.log("/storage/student_info/" + fileName);
                //         $(".exp_attachment").append(`<a href='${PDF_URL + "/storage/student_info/" + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);

                //     })
                removeBracketed(data.apprentice_exp_file,"exp_attachment");
                //$(".exp_attachment").append(`<a href='${PDF_URL + "/storage/student_info/" + data.apprentice_exp_file}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }
                else {
                    $('input:radio[name=experience][value=0]').attr('checked', true);
                    $('input:radio[name=experience][value=1]').attr('disabled', true);
                    $('#exp_attach_row').css('display', 'none');
                }

                //&& data.article_form_type == "c2_pass_1yr"
                if (data.offline_user == 1 ) {
                    $('.praticle').hide();
                    $('.c2_pass_renew').show();
                    $('#office_order_row').show();
                    $("#c2_papp_name").val(data.request_papp);
                    if(data.mentor!=null){
                        $("#c2_mentor_name").val(data?.mentor?.name_eng);
                    }
                    else{
                        $("#c2_mentor_name").val(data.mentor_id);
                    }
                    //$('#exp_row').hide();
                    $('#gov_lab').text('၈။');
                    $('#current_lab').text('၉။');
                    $('#address_label').text('၁၀။');
                    $('#phone_lab').text('၁၁။');
                    $('#email_lab').text('၁၂။');
                    $('#papp_lab').text('၁၃။');
                    $('#previous_papp_lab').text('၁၄။');
                    $('#previous_lab').text('၁၅။');
                    $('#exam_pass_date_label').text('၁၆။');

                    $(".office_order_attach").append(`<a href='${PDF_URL + data.office_order_attach}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);

                } else {
                    $("#papp_name").val(data.request_papp);
                    if(data.mentor!=null){
                        $("#mentor_name").val(data?.mentor?.name_eng);
                    }
                    else{
                        $("#mentor_name").val(data.mentor_id);
                    }
                }

            }

            if (data.gov_staff == 1) {
                $('input:radio[name=gov_staff][value=1]').attr('checked', true);
                $('input:radio[name=gov_staff][value=0]').attr('disabled', true);
                $('#gov_staff_row').css('display', 'block');
                $("#position").val(data.gov_position);
                $("#gov_joining_date").val(data.gov_joining_date);
            }
            else {
                $('input:radio[name=gov_staff][value=0]').attr('checked', true);
                $('input:radio[name=gov_staff][value=1]').attr('disabled', true);
                $('#gov_staff_row').css('display', 'none');
            }

            document.getElementById('image').src = PDF_URL + student_info.image;
            $(".nrc_front").append(`<a href='${PDF_URL + student_info.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View Photo</a>`);
            $(".nrc_back").append(`<a href='${PDF_URL + student_info.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'  align="center">View Photo</a>`);
            if (data.request_papp_attach != "") {
                $('.req-papp_attach').show();
                $(".request_papp_attach").append(`<a href='${PDF_URL + data.request_papp_attach}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'  align="center">View File</a>`);
            } else {
                $('.req-papp_attach').hide();
            }


            var leave_requests = student_info.leave_requests;
            var r = 1;
            leave_requests.forEach(function (element) {

                if (data.article_form_type == element.form_type) {
                    var status = element.status == 0 ? "-" : "Done";
                    const rowData = {
                      remark : element.remark,
                      start_date : element.start_date,
                      end_date: element.end_date,
                      total_leave : element.total_leave,
                      leave_id : element.id
                    };

                    var tr = "<tr>";
                    tr += "<td class='alignright'>" + r + "</td>";
                    tr += "<td>" + element.remark + "</td>";
                    tr += "<td>" + element.start_date + "</td>";
                    tr += "<td>" + element.end_date + "</td>";
                    tr += "<td>" + element.total_leave + "</td>";
                    tr += "<td>" + status + "</td>";
                    tr += "<td><button class='btn btn-warning btn-sm' onclick='editLeaveRequestData("+JSON.stringify(rowData)+")'><li class='fa fa-pencil'></li></button></td>";
                    tr += "</tr>";
                    r = r + 1;
                    $("#leave_request_body").append(tr);
                }
            })
            $('#leave_request_table').DataTable({
                'destroy': true,
                'paging': true,
                'lengthChange': false,
                "pageLength": 5,
                'searching': false,
                'info': false,
                'autoWidth': true,
                "scrollX": false,
            });

            if (data.contract_end_date != null) {
                var end_date = new Date(data.contract_end_date);
                var today = new Date();

                var end_time = end_date.getTime();
                var today_time = today.getTime();

                if (end_time <= today_time) {
                    console.log(data.yes_done_attach);
                    if (data.yes_done_attach == 0) {
                        document.getElementById("check_end_date").style.display = "block";
                    }
                    $("#article_id").val(data.id);
                    $("#article_form_type").val(data.article_form_type);
                    $("#contract_end_date").val(data.contract_end_date);
                    $("#student_info_id").val(data.student_info_id);
                }
            }

            if (data.status == 0) {
                document.getElementById("approve_reject_btn").style.display = "block";
            } else {
                document.getElementById("approve_reject_btn").style.display = "none";
            }

            if (data.mentor_attach_file != null) {
                $("#attach_file_row").show();
                let mentor_attach_file = JSON.parse(data.mentor_attach_file);
                $.each(mentor_attach_file, function (fileCount, fileName) {
                    $(".mentor_attach_file").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);

                })
            }

            if (data.done_form_attach != null) {
                $("#done_form_row").show();
                $(".done_form_attach").append(`<a href='${PDF_URL + data.done_form_attach}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'  align="center">View File</a>`);
                $("#reject_done_attach").show();
                $("#article_id").val(data.id);
                if (data.done_status == 0 || data.done_status == 2) {
                    document.getElementById("done_form_approve_reject_btn").style.display = "block";
                } else {
                    document.getElementById("done_form_approve_reject_btn").style.display = "none";
                }

            }

            autoLoadPaymentFirm(data.id,article_form_type); // load firm payment infos
        }
    });
}

function editLeaveRequestData(rowData) {
    $('#leaveRequestModel').modal('toggle');
    $("#remark").val(rowData.remark);
    $("#start_date").val(rowData.start_date);
    $("#end_date").val(rowData.end_date);
    $("#total_date").val(rowData.total_leave);
    $("#leave_request_id").val(rowData.leave_id);

    // $('#article_id').val(id);
    // $('#form_name').val('other');
    // getLeaveRequest();
}

function saveUpdateLeaveRequest() {
    var data = new FormData();
    data.append('id', $('#leave_request_id').val());
    data.append('remark', $("input[name=remark]").val());
    data.append('start_date', $("input[name=start_date]").val());
    data.append('end_date', $("input[name=end_date]").val());
    data.append('total_date', $("input[name=total_date]").val());

    show_loader();
    $.ajax({
        type: "POST",
        data: data,
        url: BACKEND_URL + "/update_leave_request",
        cache: false,
        contentType: false,
        processData: false,
        success: function (result) {
            EasyLoading.hide();
            successMessage("You have successfully updated.");
            $("#leave_request_form")[0].reset();
            $('#leave_request_table').DataTable().destroy();
            $('#leaveRequestModel').modal('toggle');
            location.reload();
            //getLeaveRequest();
            //$("#leave_request_form").attr('action', 'javascript:saveLeaveRequest()');
        },
        error: function (message) {
            EasyLoading.hide();
            errorMessage(message);
        }
    });
}

function approveArticle() {
    if (!confirm('Are you sure you want to approve this article?')) {
        return;
    }
    else{
        let result = window.location.href;
        let url = new URL(result);
        let offline_user = url.searchParams.get("offline_user");
        if(offline_user=="true"){
            var id = url.searchParams.get("id");
        }else{
            var id = $("input[name = article_id]").val();
        }

        $.ajax({
            url: BACKEND_URL + "/approve_article/" + id,
            type: 'patch',
            success: function (result) {
                successMessage("You have approved that user!");

                    setInterval(() => {
                        if(offline_user=="true"){
                            location.href = FRONTEND_URL + "/offline_user";
                        }else{
                            location.href = FRONTEND_URL + "/article_list";
                        }
                    }, 3000);



            }
        });
    }
}

function rejectArticle() {
    if (!confirm('Are you sure you want to reject this article?')) {
        return;
    }
    else {

        var formData = new FormData();
        formData.append('remark_firm', $('#remark_firm').val());
        let result = window.location.href;
        let url = new URL(result);
        let offline_user = url.searchParams.get("offline_user");
        if(offline_user=="true"){
            var id = url.searchParams.get("id");
        }else{
            var id = $("input[name = article_id]").val();
        }
        $.ajax({
            url: BACKEND_URL + "/reject_article/" + id,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                successMessage("You have rejected that user!");
                if(offline_user=="true"){
                    location.href = FRONTEND_URL + "/offline_user";
                }else{
                    location.href = FRONTEND_URL + "/article_list";
                }
            }
        });
    }
}

function approveDoneArticle() {
    if (!confirm('Are you sure you want to approve this article?')) {
        return;
    }
    else{
        let result = window.location.href;
        let url = new URL(result);
        let offline_user = url.searchParams.get("offline_user");
        if(offline_user=="true"){
            var id = url.searchParams.get("id");
        }else{
            var id = $("input[name = article_id]").val();
        }

        $.ajax({
            url: BACKEND_URL + "/approve_done_article/" + id,
            type: 'patch',
            success: function (result) {
                successMessage("You have approved that user!");
                setInterval(() => {
                    if(offline_user=="true"){
                        location.href = FRONTEND_URL + "/offline_user";
                    }else{
                        location.href = FRONTEND_URL + "/article_list";
                    }
                }, 3000);
            }
        });
    }
}

function rejectDoneArticle() {
    if (!confirm('Are you sure you want to reject this article?')) {
        return;
    }
    else {
        var id = $("input[name = article_id]").val();
        $.ajax({
            url: BACKEND_URL + "/reject_done_article/" + id,
            type: 'patch',
            success: function (result) {
                successMessage("You have rejected that user!");
                location.href = FRONTEND_URL + "/article_list";
            }
        });
    }
}

function showGovContractDate(info) {
    $("#contractGovModal").modal('show');
    $("#gov_article_id").val(info.id);
}

function showPaymentInfo(info) {
    $("#payment_detail_modal").modal('show');
    autoLoadPayment(info.id);
}

function showPaymentInfoResign(info) {
    $("#payment_detail_modal").modal('show');

    autoLoadPaymentResign(info.id);
}

function showPaymentInfoFirm(info){
    $("#payment_detail_modal").modal('show');
    autoLoadPaymentFirm(info.id,info.article_form_type);
}

function updateGovContractDate(info) {
    $("#contractGovModal").modal('show');
    $("#gov_article_id").val(info.id);
    $("#contract_gov_start_date").val(info.contract_start_date);
}

function saveGovContractDate() {
    id = $("#gov_article_id").val();
    contract_start_date = $("input[name=contract_gov_start_date]").val();
    if (contract_start_date) {
        let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        var start_date = new Date(contract_start_date);
        var year = start_date.getFullYear();
        var month = start_date.getMonth();
        var day = start_date.getDate();

        var contract_end_date = new Date(year + 2, month, day - 1);

        contract_end_date = String(contract_end_date.getDate()).padStart(2, '0') + "-" + months[contract_end_date.getMonth()] + "-" + contract_end_date.getFullYear();

        var data = new FormData();
        data.append('id', id);
        data.append('contract_start_date', contract_start_date);
        data.append('contract_end_date', contract_end_date);

        show_loader();
        $.ajax({
            type: "POST",
            data: data,
            url: BACKEND_URL + "/save_gov_contract_date",
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                EasyLoading.hide();
                successMessage("You have successfully registered.");
                location.reload();
            },
            error: function (message) {
                EasyLoading.hide();
                errorMessage(message);
            }
        });
    } else {
        alert("Please select date.");
    }
}

function showGovArticle(id) {
    localStorage.setItem("article_id", id);
    location.href = FRONTEND_URL + "/gov_article_show";
}

function loadGovArticle() {
    var id = localStorage.getItem("article_id");
    $("input[name = article_id]").val(id);
    $.ajax({
        url: BACKEND_URL + "/gov_article_show/" + id,
        type: 'get',
        data: "",
        success: function (data) {

            var student_info = data.student_info;

            var student_reg = student_info.student_register
            var lastest_row = student_reg.length - 1;

            $("#form_type").text("Government");

            $('#name_mm').val(student_info.name_mm);
            $("#name_eng").val(student_info.name_eng);
            $("#nrc_state_region").val(student_info.nrc_state_region);
            $("#nrc_township").val(student_info.nrc_township);
            $("#nrc_citizen").val(student_info.nrc_citizen);
            $("#nrc_number").val(student_info.nrc_number);
            $("#father_name_mm").val(student_info.father_name_mm);
            $("#father_name_eng").val(student_info.father_name_eng);
            $("#race").val(student_info.race);
            $("#religion").val(student_info.religion);
            $("#date_of_birth").val(student_info.date_of_birth);
            $("#education").val(student_info.student_education_histroy.degree_name);
            $("#address").val(student_info.address);
            $("#phone_no").val(student_info.phone);
            $("#m_email").val(data.m_email);

            if (data.married == 1) {
                $('input:radio[name=married][value=1]').attr('checked', true);
                $('input:radio[name=married][value=0]').attr('disabled', true);
                $('#married_row').css('display', 'block');
                $("#married_name").val(data.married_name);
                $("#married_job").val(data.married_job);
            }
            else {
                $('input:radio[name=married][value=0]').attr('checked', true);
                $('input:radio[name=married][value=1]').attr('disabled', true);
                $('#married_row').css('display', 'none');
            }
            $("#permanent_address").val(data.permanent_address);
            $("#tempory_address").val(data.tempory_address);
            $("#current_address").val(data.current_address);
            $("#home_address").val(data.home_address);
            $("#father_address").val(data.father_address);
            $("#father_job").val(data.father_job);
            $("#labor_registration_no").val(data.labor_registration_no);

            document.getElementById('image').src = PDF_URL + student_info.image;
            $(".nrc_front").append(`<a href='${PDF_URL + student_info.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View Photo</a>`);
            $(".nrc_back").append(`<a href='${PDF_URL + student_info.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'  align="center">View Photo</a>`);

            let certificate = JSON.parse(student_info.student_education_histroy.certificate);
            $.each(certificate, function (fileCount, fileName) {
                $(".certificate").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Attach File</a>`);

            })

            let labor_registration_attach = JSON.parse(data.labor_registration_attach);
            $.each(labor_registration_attach, function (fileCount, fileName) {
                $(".labor_registration_attach").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);

            })

            let recommend_attach = JSON.parse(data.recommend_attach);
            $.each(recommend_attach, function (fileCount, fileName) {
                $(".recommend_attach").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);

            })

            let police_attach = JSON.parse(data.police_attach);
            $.each(police_attach, function (fileCount, fileName) {
                $(".police_attach").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);

            })

            //$(".labor_registration_attach").append(`<a href='${PDF_URL+data.labor_registration_attach}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View Photo</a>`);
            // $(".recommend_attach").append(`<a href='${PDF_URL+data.recommend_attach}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'  align="center">View Photo</a>`);
            // $(".police_attach").append(`<a href='${PDF_URL+data.police_attach}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'  align="center">View Photo</a>`);

            var leave_requests = student_info.leave_requests;
            var r = 1;
            leave_requests.forEach(function (element) {
                if (element.form_type == 'gov') {
                    var status = element.status == 0 ? "-" : "Done";
                    var tr = "<tr>";
                    tr += "<td class='alignright'>" + r + "</td>";
                    tr += "<td>" + element.remark + "</td>";
                    tr += "<td>" + element.start_date + "</td>";
                    tr += "<td>" + element.end_date + "</td>";
                    tr += "<td>" + element.total_leave + "</td>";
                    tr += "<td>" + status + "</td>";
                    tr += "</tr>";
                    r = r + 1;
                    $("#leave_request_body").append(tr);
                }
            })
            $('#leave_request_table').DataTable({
                'destroy': true,
                'paging': true,
                'lengthChange': false,
                "pageLength": 5,
                'searching': false,
                'info': false,
                'autoWidth': true,
                "scrollX": false,
            });

            if (data.contract_end_date != null) {
                var end_date = new Date(data.contract_end_date);
                var today = new Date();
                var end_time = end_date.getTime();
                var today_time = today.getTime();

                if (end_time <= today_time) {
                    if (data.yes_done_attach == 0) {
                        document.getElementById("check_end_date").style.display = "block";
                    }
                    $("#gov_article_id").val(data.id);
                    $("#contract_gov_end_date").val(data.contract_end_date);
                    $("#student_info_id").val(data.student_info_id);
                }
            }

            if (data.status == 0) {
                document.getElementById("approve_reject_btn").style.display = "block";
            } else {
                document.getElementById("approve_reject_btn").style.display = "none";
            }

            if (data.mentor_attach_file != null) {
                $("#attach_file_row").show();
                let mentor_attach_file = JSON.parse(data.mentor_attach_file);
                $.each(mentor_attach_file, function (fileCount, fileName) {
                    $(".mentor_attach_file").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                })
            }

            if (data.done_form_attach != null) {
                $("#done_form_row").show();
                $(".done_form_attach").append(`<a href='${PDF_URL + data.done_form_attach}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'  align="center">View File</a>`);
                $("#reject_done_attach").show();
                $("#gov_article_id").val(data.id);
                if (data.done_status == 0 || data.done_status == 2) {
                    document.getElementById("done_form_approve_reject_btn").style.display = "block";
                } else {
                    document.getElementById("done_form_approve_reject_btn").style.display = "none";
                }
            }
        }
    });
}

function rejectDoneAttach() {
    $("#reject_done_attach_modal").modal('toggle');
}

function rejectArticleDoneAttach() {
    var id = $("#article_id").val();
    var reason = $("#reason").val();
    $.ajax({
        url: BACKEND_URL + "/reject_article_done_attach",
        data: 'id=' + id + "&reason=" + reason,
        type: 'post',
        success: function (result) {
            successMessage('You have successfully rejected that done attach!');
            location.href = FRONTEND_URL + "/article_list";
        }
    });

}

function rejectGovArticleDoneAttach() {
    var id = $("#gov_article_id").val();
    var reason = $("#reason").val();
    $.ajax({
        url: BACKEND_URL + "/reject_gov_article_done_attach",
        data: 'id=' + id + "&reason=" + reason,
        type: 'post',
        success: function (result) {
            successMessage('You have successfully rejected that done attach!');
            location.href = FRONTEND_URL + "/article_list";
//         }
//     });

// }

              if(result.status==0){
                  $('#payment_status').append("Incomplete");
                  $('#payment_status').addClass("text-warning");
              }
              else{
                  $('#payment_status').append("Complete");
                  $('#payment_status').addClass("text-success");
              }
              var productDesc = result.productDesc.split(",");
              var amount = result.amount.split(",");
              var total=0;
              for(var i in amount) {
                  total += parseInt(amount[i]);
              }
              console.log(total);
              for(let i=0 ; i<amount.length ; i++){
                  $('.fee_list').append(`
                      <li
                          class="list-group-item d-flex justify-content-between lh-condensed">
                          <h6 class="my-0">${productDesc[i]}</h6>
                          <span class="text-muted">- ${amount[i]} MMK</span>
                      </li >
                    `);
                }
            $('.fee_list').append(`
                    < li class= "list-group-item d-flex justify-content-between" >
                      <span>Total (MMK)</span>
                      <span id="total">
                          - <strong>${total}</strong> MMK
                      </span>
                  </li >
                    `);
        }
    });
}

function autoLoadPaymentResign(resign_id){
  $("#payment_detail_modal").find(".fee_list").html('');
    $.ajax({
        url: BACKEND_URL + "/get_payment_info/" + 'resign'+resign_id,
        type: 'get',
        success: function (result) {
            console.log("gov aricle",result);

            if(result.status==0){
                $('#payment_status').append("Incomplete");
                $('#payment_status').addClass("text-warning");
            }
            else{
                $('#payment_status').append("Complete");
                $('#payment_status').addClass("text-success");
            }
            var productDesc = result.productDesc.split(",");
            var amount = result.amount.split(",");
            var total=0;
            for(var i in amount) {
                total += parseInt(amount[i]);
            }
            console.log(total);
            for(let i=0 ; i<amount.length ; i++){
                $('.fee_list').append(`
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <h6 class="my-0">${productDesc[i]}</h6>
                        <span class="text-muted">- ${amount[i]} MMK</span>
                    </li>
                `);
            }
            $('.fee_list').append(`
                <li class= "list-group-item d-flex justify-content-between" >
                    <span>Total (MMK)</span>
                    <span id="total">
                        - <strong>${total}</strong> MMK
                    </span>
                </li>
                `);
        }
    });
}

function autoLoadPaymentFirm(firm_id,form_type){
  $("#payment_detail_modal").find(".fee_list").html('');
  $.ajax({
          url: BACKEND_URL + "/get_payment_info/" + form_type + firm_id,
          type: 'get',
          success: function (result) {
              console.log("firm aricle",result);

              if(result.status==0){
                
                  $('#payment_status').append("Incomplete");
                  $('#payment_status').addClass("text-warning");
              }
              else{
                  $('#payment_status').append("Complete");
                  $('#payment_status').addClass("text-success");
              }
              var productDesc = result.productDesc.split(",");
              var amount = result.amount.split(",");
              var total=0;
              for(var i in amount) {
                  total += parseInt(amount[i]);
              }
              console.log(total);
              for(let i=0 ; i<amount.length ; i++){
                  $('.fee_list').append(`
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <h6 class="my-0">${productDesc[i]}</h6>
                          <span class="text-muted">- ${amount[i]} MMK</span>
                      </li>
                    `);
            }
            $('.fee_list').append(`
                    <li class= "list-group-item d-flex justify-content-between" >
                      <span>Total (MMK)</span>
                      <span id="total">
                          - <strong>${total}</strong> MMK
                      </span>
                  </li>
                    `);
        }
    });
}

function autoLoadPayment(gov_id){
  $("#payment_detail_modal").find(".fee_list").html('');
  $.ajax({
      url: BACKEND_URL + "/get_payment_info/" + 'gov'+gov_id,
      type: 'get',
      success: function (result) {

          if(result.status==0){
              $('#payment_status').append("Incomplete");
              $('#payment_status').addClass("text-warning");
          }
          else{
              $('#payment_status').append("Complete");
              $('#payment_status').addClass("text-success");
          }
          var productDesc = result.productDesc.split(",");
          var amount = result.amount.split(",");
          var total=0;
          for(var i in amount) {
              total += parseInt(amount[i]);
          }
          console.log(total);
          for(let i=0 ; i<amount.length ; i++){
              $('.fee_list').append(`
                  <li class="list-group-item d-flex justify-content-between lh-condensed">
                      <h6 class="my-0">${productDesc[i]}</h6>
                      <span class="text-muted">- ${amount[i]} MMK</span>
                  </li>
              `);
          }
          $('.fee_list').append(`
              <li class= "list-group-item d-flex justify-content-between" >
                  <span>Total (MMK)</span>
                  <span id="total">
                      - <strong>${total}</strong> MMK
                  </span>
              </li>
              `);
      }
  });
}

function approveGovArticle() {
    if (!confirm('Are you sure you want to approve this article?')) {
        return;
    }
    else {
        var id = $("input[name = article_id]").val();
        console.log(id);
        $.ajax({
            url: BACKEND_URL + "/approve_gov_article/" + id,
            type: 'patch',
            success: function (result) {
                successMessage("You have approved that user!");
                setInterval(() => {
                    location.href = FRONTEND_URL + "/article_list";
                }, 3000);
            }
        });
    }
}

function rejectGovArticle() {
    if (!confirm('Are you sure you want to reject this article?')) {
        return;
    }
    else {
        var id = $("input[name = article_id]").val();
        var formData = new FormData();
        formData.append('remark_gov', $('#remark_gov').val());
        $.ajax({
            url: BACKEND_URL + "/reject_gov_article/" + id,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                successMessage("You have rejected that user!");
                location.href = FRONTEND_URL + "/article_list";
            }
        });
    }
}

function approveDoneGovArticle() {
    if (!confirm('Are you sure you want to approve this article?')) {
        return;
    }
    else {
        var id = $("input[name = article_id]").val();
        console.log(id);
        $.ajax({
            url: BACKEND_URL + "/approve_done_gov_article/" + id,
            type: 'patch',
            success: function (result) {
                successMessage("You have approved that user!");
                setInterval(() => {
                    location.href = FRONTEND_URL + "/article_list";
                }, 3000);
            }
        });
    }
}

function rejectDoneGovArticle() {
    if (!confirm('Are you sure you want to reject this article?')) {
        return;
    }
    else {
        var id = $("input[name = article_id]").val();
        $.ajax({
            url: BACKEND_URL + "/reject_done_gov_article/" + id,
            type: 'patch',
            success: function (result) {
                successMessage("You have rejected that user!");
                location.href = FRONTEND_URL + "/article_list";
            }
        });
    }
}

function showResignArticle(id) {
    localStorage.setItem("article_id", id);
    location.href = FRONTEND_URL + "/resign_article_show";
}

function loadResignArticle() {

    let result = window.location.href;
        let url = new URL(result);
        let offline_user = url.searchParams.get("offline_user");
        if(offline_user=="true"){
            var id = url.searchParams.get("id");
        }else{
            var id = localStorage.getItem("article_id");
            $("input[name = article_id]").val(id);
        }
    $.ajax({
        url: BACKEND_URL + "/resign_article_show/" + id,
        type: 'get',
        data: "",
        success: function (data) {
            var student_info = data.student_info;
            var qualified_test = student_info.qualified_test == null ? null : student_info.qualified_test;

            var student_reg = student_info.student_register
            var lastest_row = student_reg.length - 1;

            $('#name_mm').val(student_info.name_mm);
            $("#name_eng").val(student_info.name_eng);
            $("#personal_no").val(student_info.cpersonal_no);
            $("#nrc_state_region").val(student_info.nrc_state_region);
            $("#nrc_township").val(student_info.nrc_township);
            $("#nrc_citizen").val(student_info.nrc_citizen);
            $("#nrc_number").val(student_info.nrc_number);
            $("#father_name_mm").val(student_info.father_name_mm);
            $("#father_name_eng").val(student_info.father_name_eng);
            $("#race").val(student_info.race);
            $("#religion").val(student_info.religion);
            $("#date_of_birth").val(student_info.date_of_birth);

            if (qualified_test != null) {
                $("#firm_education").hide();
                $("#qt_education").show();
                let lcl = JSON.parse(qualified_test.local_education);
                lcl.map(lcl_edu => $('#add_qt_education').append(`< p > ${lcl_edu}</p > `));

                let certificate = JSON.parse(qualified_test.local_education_certificate);
                $.each(certificate, function (fileCount, fileName) {
                    $(".certificate").append(`<a href = '${PDF_URL + fileName}' style = 'display:block; font-size:16px;text-decoration: none;' target = '_blank' > View Attach File</a > `);

                })
            } else {
                $("#education").val(student_info.student_education_histroy.degree_name);
                // let certificate = JSON.parse(student_info.student_education_histroy.certificate);
                // $.each(certificate,function(fileCount,fileName){

                //      $(".certificate").append(`<a href='${PDF_URL+fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Attach File</a>`);

                // })
                if (student_info.student_education_histroy) {
                    $('.offline_user').show();
                    loadEductaionHistoryByArticle(student_info.id, 'tbl_degree');
                } else {
                    $('#firm_education').hide();
                    let certificate = JSON.parse(student_info.student_education_histroy.certificate);
                    $.each(certificate, function (fileCount, fileName) {

                        $(".stu_certificate").append(`<a href='${BASE_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Attach File</a>`);

                    })
                }
            }

            $("#address").val(student_info.address);
            $("#phone_no").val(student_info.phone);
            $("#m_email").val(data.m_email);

            $("#resign_date").val(data.resign_date);
            $("#resign_reason").val(data.resign_reason);
            $("#recent_org").val(data.recent_org);

            document.getElementById('image').src = PDF_URL + student_info.image;
            $(".nrc_front").append(`<a href = '${PDF_URL + student_info.nrc_front}' style = 'display:block; font-size:16px;text-decoration: none;' target = '_blank' align = "center" > View Photo</a > `);
            $(".nrc_back").append(`<a href = '${PDF_URL + student_info.nrc_back}' style = 'display:block; font-size:16px;text-decoration: none;' target = '_blank'  align = "center" > View Photo</a > `);

            if (data.resign_approve_file == "") {
                $(".resign_approve_file").append(``);
            } else {
                $(".resign_approve_file").append(`<a href = '${PDF_URL + data.resign_approve_file}' style = 'display:block; font-size:16px;text-decoration: none;' target = '_blank' align = "center" > View Photo</a > `);
            }

            //$(".office_order_attach").append(`<a href='${PDF_URL + data.office_order_attach}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);

            if (data.resign_status == 0) {
                document.getElementById("approve_reject_btn").style.display = "block";
            } else {
                document.getElementById("approve_reject_btn").style.display = "none";
            }

            autoLoadPaymentResign(id);
        }
    });
}

function approveResignArticle() {
    if (!confirm('Are you sure you want to approve this article?')) {
        return;
    }
    else {
        let result = window.location.href;
        let url = new URL(result);
        let offline_user = url.searchParams.get("offline_user");
        if(offline_user=="true"){
            var id = url.searchParams.get("id");
        }else{
            var id = $("input[name = article_id]").val();
        }

        $.ajax({
            url: BACKEND_URL + "/approve_resign_article/" + id,
            type: 'patch',
            success: function (result) {
                successMessage("You have approved that user!");
                setInterval(() => {
                    if(offline_user=="true"){
                        location.href = FRONTEND_URL + "/offline_user";
                    }else{
                        location.href = FRONTEND_URL + "/article_list";
                    }

                }, 3000);
            }
        });
    }
}

function rejectResignArticle() {
    if (!confirm('Are you sure you want to reject this article?')) {
        return;
    }
    else {
        let result = window.location.href;
        let url = new URL(result);
        let offline_user = url.searchParams.get("offline_user");
        if(offline_user=="true"){
            var id = url.searchParams.get("id");
        }else{
            var id = $("input[name = article_id]").val();
        }

        var formData = new FormData();
        formData.append('remark_resign', $('#remark_resign').val());

        $.ajax({
            url: BACKEND_URL + "/reject_resign_article/" + id,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                successMessage("You have rejected that user!");
                if(offline_user=="true"){
                    location.href = FRONTEND_URL + "/offline_user";
                }else{
                    location.href = FRONTEND_URL + "/article_list";
                }
            }
        });
    }
}

function checkEndArticle() {
    $("#endModal").modal('show');
    // $("#article_id").val(info.id);
    // $("#article_form_type").val(info.article_form_type);
    // $("#contract_end_date").val(info.contract_end_date);
}

function checkEndGovArticle() {
    $("#endGovModal").modal('show');
    // $("#gov_article_id").val(info.id);
    // $("#contract_gov_end_date").val(info.contract_end_date);
}

function saveEndArticle() {
    id = $("#article_id").val();
    article_form_type = $("#article_form_type").val();
    contract_end_date = $("input[name=contract_end_date]").val();

    student_info_id = $("#student_info_id").val();

    if (contract_end_date) {

        var data = new FormData();
        data.append('id', id);
        data.append('article_form_type', article_form_type);
        data.append('student_info_id', student_info_id);
        data.append('contract_end_date', contract_end_date);

        show_loader();
        $.ajax({
            type: "POST",
            data: data,
            url: BACKEND_URL + "/save_contract_end_date",
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                EasyLoading.hide();
                successMessage("You have successfully registered.");
                location.reload();
            },
            error: function (message) {
                EasyLoading.hide();
                errorMessage(message);
            }
        });
    } else {
        alert("Please select date.");
    }
}

function saveGovEndArticle() {
    id = $("#gov_article_id").val();
    contract_gov_end_date = $("input[name=contract_gov_end_date]").val();
    student_info_id = $("#student_info_id").val();

    if (contract_gov_end_date) {

        var data = new FormData();
        data.append('id', id);
        data.append('article_form_type', 'gov');
        data.append('student_info_id', student_info_id);
        data.append('contract_gov_end_date', contract_gov_end_date);

        show_loader();
        $.ajax({
            type: "POST",
            data: data,
            url: BACKEND_URL + "/save_gov_contract_end_date",
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                EasyLoading.hide();
                successMessage("You have successfully registered.");
                location.reload();
            },
            error: function (message) {
                EasyLoading.hide();
                errorMessage(message);
            }
        });
    } else {
        alert("Please select date.");
    }
}

function createDoneFormLink() {
    id = $("#article_id").val();

    $.ajax({
        url: BACKEND_URL + "/create_done_form_link/" + id,
        type: 'patch',
        success: function (result) {
            successMessage("Create download link!");
            if($('#offline_user').val()){
                location.href = FRONTEND_URL + "/offline_user";
            }else{
                location.href = FRONTEND_URL + "/article_list";
            }

        }
    });
}

function govCreateDoneFormLink() {
    id = $("#gov_article_id").val();

    $.ajax({
        url: BACKEND_URL + "/gov_create_done_form_link/" + id,
        type: 'patch',
        success: function (result) {
            successMessage("Create download link!");
            location.href = FRONTEND_URL + "/article_list";
        }
    });
}
function loadEductaionHistoryByArticle(id) {
    $.ajax({
        type: 'POST',
        url: BACKEND_URL + "/getEducationHistory",
        data: 'student_info_id=' + id,
        success: function (result) {
            $.each(result.data, function (index, value) {
                var tr = "<tr>";
                tr += `<td> ${index += 1}</td> `;
                tr += `<td> ${value.degree_name} </td> `;
                tr += `<td> <a href='${PDF_URL + value.certificate}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td> `;
                tr += "</tr>";
                $("#tbl_degree_body").append(tr);
            });

            createDataTableWithAsc('#tbl_degree');
        }
    });
}
function removeBracketed(file,divname){
    var new_file=file.replace(/[\'"[\]']+/g, '');
    var split_new_file=new_file.split(',');
    for(var i=0;i<split_new_file.length;i++){
        var file=`<a href='${BASE_URL+'/storage/student_info/'+split_new_file[i]}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'>View File</a>`;
        $("."+divname).append(file);
      }
}
