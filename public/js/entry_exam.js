function loadEntryDetail(id) {

    $("#school_name").html("");
    $("#exam_type").html("");
    $("#student_grade").html("");
    $("#student_status").html("");
    // $("#exam_department").html("");

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
                console.log('exam_data',exam_data)
                // if (element.exam_type_id == 0) {
                //     exam_type_id = "SELF STUDY";
                // } else if (element.exam_type_id == 1) {
                //     exam_type_id = "PRIVATE SCHOOL";
                // } else {
                //     exam_type_id = "MAC STUDENT";
                // }
                if (element.status == 0) {
                    status = "PENDING";
                } else if (element.status == 1) {
                    status = "APPROVED";
                } else {
                    status = "REJECTED";
                }
                // if (element.grade == 0) {
                //     grade = "-";
                // } else if (element.grade == 1) {
                //     grade = "PASSED";
                // } else {
                //     grade = "FAILED";
                // }


                // $("#school_name").append(element.private_school_name);
                $("#exam_type").append("CPA One Entry Exam");
                // $("#student_grade").append(grade);
                $("#student_status").append(status);

                console.log($('#entry_result').val())
                if ($('#entry_result').val() == 1) {

                    if (element.status == 0) {
                        document.getElementById("approve").style.display = 'block';
                        document.getElementById("reject").style.display = 'block';
                        document.getElementById("print").style.display = 'none';

                    } else {
                        document.getElementById("print").style.display = 'block';
                        document.getElementById("approve").style.display = 'none';
                        document.getElementById("reject").style.display = 'none';
                    }

                } else {
                    if (element.grade == 1) {
                        document.getElementById("pass").style.display = 'none';
                        document.getElementById("fail").style.display = 'none';

                    } else {
                        document.getElementById("pass").style.display = 'block';
                        document.getElementById("fail").style.display = 'block';
                    }

                }


                // $("#exam_department").append(element.exam_department.name);

                let student_info = element.student_info;

                var education_history = student_info.student_education_histroy;
                var job = student_info.student_job;
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
                $("#phone").append(student_info.phone);
                $("#email").append(student_info.email);
                $("#gov_staff").append(student_info.gov_staff == 0 ? "မဟုတ်" : "ဟုတ်");
                // $("#image").append(student_info.image);
                // $("#registration_no").append(student_info?.student_register[0]?.personal_no);

                if (student_info.gov_staff == 1) {
                    $(".recommend_row").show();
                    // let recommend_letter = JSON.parse(student_info.recommend_letter);
                    // $.each(recommend_letter,function(fileCount,fileName){
                    $(".recommend_letter").append(`<a href='${PDF_URL + student_info.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                    // })
                } else {
                    $(".recommend_row").hide();
                }

                $("#university_name").append(education_history.university_name);
                $("#degree_name").append(education_history.degree_name);
                $("#qualified_date").append(education_history.qualified_date);
                $("#roll_number").append(education_history.roll_number);

                let certificate = JSON.parse(education_history.certificate);
                $.each(certificate, function (fileCount, fileName) {

                    $(".certificate").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);

                })

                $(".nrc_front").append(`<a href='${PDF_URL + student_info.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);
                $(".nrc_back").append(`<a href='${PDF_URL + student_info.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);

                $("#name").append(job.name);
                $("#position").append(job.position);
                $("#department").append(job.department);
                $("#organization").append(job.organization);
                $("#company_name").append(job.company_name);
                $("#salary").append(job.salary);
                $("#office_address").append(job.office_address);
                attached_file = student_info.student_education_histroy.certificate;


                //show Exam Card Data
                document.getElementById('student_img').src = PDF_URL + student_info.image;

                $('#exam_batch_no').text(mm2en(element.batch.number.toString()));
                $('#exam_roll_no').text(element.student_info.cpersonal_no)
                $('#exam_student_name').text(student_info.name_mm);
                $('#exam_student_nrc').text(student_info.nrc_state_region + "/" + student_info.nrc_township + "(" + student_info.nrc_citizen + ")" + student_info.nrc_number);
                get_exam_info().then(data => {
                    console.log(exam)
                    let exams = data.data;

                    var exam = exams.filter(exam => { if (exam.exam_type_id == 2 && exam.batch_id == element.batch.id) return true });
                    console.log('exam', exam)

                    if(exam.length != 0){
                        $('#exam_date').text(exam[0].exam_start_date);
                        $('#exam_time').text(`နံနက် ${exam[0].exam_start_time} နာရီ မှ ${exam[0].exam_end_time} နာရီ အထိ`);
                        $('#exam_place').text(exam[0].exam_place);
                    }else{
                        $('#exam_date').text("");
                        $('#exam_time').text("");
                        $('#exam_place').text("");
                    }
                    
                    
                    

                })

            })
        }
    })

}


function approveEntryExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/approve_exam/" + id,
        type: 'PATCH',
        success: function (result) {
            console.log(result)
            successMessage("You have approved that form!");
            location.href = FRONTEND_URL + "/entry_exam_list";
            getExam();
        }
    });
}

function rejectEntryExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/reject_exam/" + id,
        type: 'PATCH',
        success: function (result) {

            successMessage("You have rejected that form!");
            location.href = FRONTEND_URL + "/entry_exam_list";
            getExam();
        }
    });
}


function PrintExamCard() {

    var backup = document.body.innerHTML;

    var divcontent = document.getElementById("printdiv").innerHTML;
    document.body.innerHTML = divcontent;
    window.print();
    document.body.innerHTML = backup;
}



async function get_exam_info() {
    let response = await fetch(BACKEND_URL + "/exam/")
    let data = await response.json()
    return data;
}



function passEntryExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/pass_entry_exam/" + id,
        type: 'PATCH',
        success: function (result) {
            console.log(result)
            successMessage("You have approved that form!");
            location.href = FRONTEND_URL + "/entry_exam_result";
            getExam();
        }
    });
}

function failEntryExam() {
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/fail_entry_exam/" + id,
        type: 'PATCH',
        success: function (result) {

            successMessage("You have rejected that form!");
            location.href = FRONTEND_URL + "/entry_exam_result";
            getExam();
        }
    });
}

