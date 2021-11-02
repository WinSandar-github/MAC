function loadQualifiedTestDetail(id) {

    $("input[name = qt_id]").val(id);

    $.ajax({
        type: "GET",
        url: BACKEND_URL + "/qualifiedtest/" + id,
        success: function (data) {
            var element = data.data;

            if (element.approve_reject_status == 0) {
                status = "PENDING";
            } else if (element.approve_reject_status == 1) {
                status = "APPROVED";
            } else {
                status = "REJECTED";
            }
            let student_info = element.student_info;


            $("#exam_type").append("Qualify Test");
            $("#student_status").append(status);

            //check detail or fill mark page
            if ($('#fill_mark').val() !== "fill_mark") {

                if (element.approve_reject_status == 0) {
                    document.getElementById("approve").style.display = 'block';
                    document.getElementById("reject").style.display = 'block';
                    document.getElementById("print").style.display = 'none';

                } else {
                    document.getElementById("print").style.display = 'block';
                    document.getElementById("approve").style.display = 'none';
                    document.getElementById("reject").style.display = 'none';
                }
                document.getElementById('student_img').src = PDF_URL + student_info.image;


            }
            // $("#exam_department").append(element.exam_department.name);


            $("#id").append(student_info.id);
            document.getElementById('image').src = PDF_URL + student_info.image;
            $("#name_eng").append(student_info.name_eng);
            $("#name_mm").append(student_info.name_mm);
            $("#nrc").append(student_info.nrc_state_region + "/" + student_info.nrc_township + "(" + student_info.nrc_citizen + ")" + student_info.nrc_number);
            $("#father_name_mm").append(student_info.father_name_mm);
            $("#father_name_eng").append(student_info.father_name_eng);
            $("#race").append(student_info.race);
            $("#religion").append(student_info.religion);
            $("#date_of_birth").append(student_info.date_of_birth);
            $("#address").append(student_info.address);
            $("#current_address").append(student_info.current_address);
            $('#office_address').append(element.office_address);
            $("#phone").append(student_info.phone);

            $("#email").append(student_info.email);

            $(".nrc_front").append(`<a href='${PDF_URL + student_info.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);
            $(".nrc_back").append(`<a href='${PDF_URL + student_info.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);

            $("#current_job").append(element.current_job);

            //show local education
            let lcl = JSON.parse(element.local_education);
            lcl.map(lcl_edu => $('#local_education').append(`<p>${lcl_edu}</p>`));
            let certificate = JSON.parse(element.local_education_certificate);
            $.each(certificate, function (fileCount, fileName) {

                $(".certificate").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;margin-bottom:5px;' target='_blank'>View File</a>`);

            })

            // if (element.grade == 1) {
            //     $.ajax({
            //         url: BACKEND_URL + "/search_exam_result/" + id,
            //         type: 'get',
            //         data: "",
            //         success: function (result) {
            //             console.log("Result", result)
            //             if (result.data != null) {
            //                 var tr = "<tr id='row_total_mark' >";
            //                 tr += "<td colspan='2' style='text-align:center;font-weight:bold;'>Total Marks</td>";
            //                 tr += "<td colspan='2' id='total_mark' style='text-align:left;padding-left:20px;font-weight:bold;'>" + result.data.total_mark + "</td>";
            //                 tr += "</tr>";
            //                 $(".tbl_fillmarks_body").append(tr);
            //                 // $('.ex_res_btn').hide();

            //                 // $('.pass_fail_btn').show();

            //                 $('.pass_fail_btn').hide();

            //                 $("input[name = result_id]").val(result.data.id);
            //                 //console.log('search_exam_result',JSON.parse(result.data.result));
            //                 var rData = JSON.parse(result.data.result);
            //                 var row_length = rData.subjects.length;
            //                 //console.log(rData.subjects[1]);

            //                 for (var i = 0; i < row_length; i++) {
            //                     var j = i + 1;
            //                     var sunject = document.getElementById('subject' + j);
            //                     sunject.value = rData.subjects[i];
            //                     sunject.setAttribute("readonly", "true");
            //                 }
            //                 for (var i = 0; i < row_length; i++) {
            //                     var j = i + 1;
            //                     var mark = document.getElementById('mark' + j);
            //                     mark.value = rData.marks[i];
            //                     mark.setAttribute("readonly", "true");
            //                 }
            //                 for (var i = 0; i < row_length; i++) {
            //                     var j = i + 1;
            //                     var grade = document.getElementById('grade' + j);
            //                     grade.value = rData.grades[i];
            //                     grade.setAttribute("readonly", "true");
            //                 }


            //                 // var total_mark=0;
            //                 // for (var i = 0; i < row_length; i++) {
            //                 //     var mark=parseInt(rData.marks[i]);
            //                 //     total_mark += mark;
            //                 // }
            //                 // $('#total_mark').append(total_mark);
            //             } else {
            //                 // $('.pass_fail_btn').hide();
            //             }
            //         },
            //         error: function (message) {
            //             console.log(message);
            //         }
            //     });
            // }

            $("#degree_name").append(`${element.foreign_education == 1 ? 'ACCA' : 'CIMA'}`);
            $('#org_name').append(element.organization_name);
            $('#org_address').append(element.organization_address);
            $('#org_email').append(element.email)
            $('#exam_date').append(element.exam_date);
            $('#exam_reg_no').append(element.exam_reg_no);

            // console.log(student_info.image)
            // show Exam Card Data  console.log(element.grade)
            // $('#exam_batch_no').text(element.batch.number);
            $('#exam_roll_no').text(element.sr_no)
            $('#exam_student_name').text(student_info.name_mm);
            $('#exam_student_nrc').text(student_info.nrc_state_region + "/" + student_info.nrc_township + "(" + student_info.nrc_citizen + ")" + student_info.nrc_number);
            $('#father_name').text(student_info.father_name_mm);

            get_exam_info().then(data => {
                let exams = data.data;

                var exam = exams.filter(exam => {
                    if (exam.exam_type_id == 1 && exam.batch_id == 0) { return true }
                });
                console.log(exam)

                // $('#exam_date').text(exam[0].exam_start_date);
                // $('#exam_time').text(`နံနက် ${exam[0].exam_start_time} နာရီ မှ ${exam[0].exam_end_time} နာရီ အထိ`);
                $('#exam_place').text(exam[0].exam_place);

            })


        }
    })

}



function approveQT() {
    if(!confirm('Are you sure you want to approve this user?')){
        return;
    }else{
        var id = $("input[name = qt_id]").val();

        $.ajax({
            url: FRONTEND_URL + "/approve_qt/" + id,
            type: 'PATCH',
            success: function (result) {

                successMessage("You have approved that form!");
                location.href = FRONTEND_URL + "/qualified_test_list";
                getExam();
            }
        });
    } 
}

function rejectQT() {
    var id = $("input[name = qt_id]").val();
    $.ajax({
        url: FRONTEND_URL + "/reject_qt/" + id,
        type: 'PATCH',
        success: function (result) {

            successMessage("You have rejected that form!");
            location.href = FRONTEND_URL + "/qualified_test_list";
            getExam();
        }
    });
}


function qualifiedTestResultSubmit() {

    console.log(document.activeElement.value, "e");
    let id = $("input[name = qt_id]").val();


    var pass_fail = document.activeElement.value;
    if (!confirm("Are you sure you want to " + pass_fail + " this student?")) {
        return;
    }
    else {

        var table = document.getElementById("tbl_fillmarks");
        var result_id = $("input[name = result_id]").val();
        var totalRowCount = table.rows.length;
        // var totalRowCount = $('#tbl_fillmarks >tbody >tr').length;
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
        data.append('id', id);
        data.append('pass_fail', pass_fail)

        $.ajax({
            url: BACKEND_URL + "/fill_mark_qt",
            type: 'post',
            data: data,
            contentType: false,
            processData: false,
            success: function (result) {
                location.href = FRONTEND_URL + "/qualified_test_result_list";




            },
            error: function (message) {
                console.log(message);
            }
        });

    }
}


function generateQTSrNo() {


    show_loader();
    $.ajax({
        url: BACKEND_URL + "/generate_qt_sr_no",
        type: 'get',
        contentType: false,
        processData: false,
        success: function (result) {
            EasyLoading.hide();
            successMessage("Update Serial Number");
            // location.reload();

        }
    });
}


