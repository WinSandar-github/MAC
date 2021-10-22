function showOfflineStudentList(student_course_id) {
    localStorage.setItem("student_course_id", student_course_id);
    location.href = FRONTEND_URL + "/da_cpa_offline_detail";
}

function loadOfflineDACPAData(){
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
                console.log('student_course',student_course)

                let current_course = student_course.batch.course;
                // console.log('current_course',current_course)

                let element = student_course.student_info;
                // console.log('student_info',element)
                let student_register = student_course.student_info.student_register.slice(-1);                
                // console.log('student_register',student_register[0]);

                let exam_register = student_course.student_info.exam_registers;
                let student_course_regs = student_course.student_info.student_course_regs;
                console.log('exam_register',exam_register);
                console.log('student_course_regs',student_course_regs);

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
                    $("#registration_no").append((element.personal_no== null || element.personal_no== "")?"-":element.personal_no);
                } else if (current_course.course_type_id == 2) {
                    $("#registration_no").append((element.cpersonal_no== null || element.cpersonal_no== "")?"-":element.cpersonal_no);
                } else {
                    $("#registration_no").append("-");
                }

                $('#current_batch_name').append(student_course.batch.name);
                $("#date").append(element.date);
                // $("#batch_name").append(student_course.batch.name);
                if (element.gov_staff == 1) {
                    $(".recommend_row").show();
                    element.recommend_letter == null
                        ? $(".recommend_letter").append(`<a href='#' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>File not available</a>`)
                        : $(".recommend_letter").append(`<a href='${PDF_URL + element.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                } else {
                    $(".recommend_row").hide();
                }

                if(exam_register.length == 1){

                    if(element.course_type_id==1){
                        console.log("Hello")
                        $(".da_one_pass_info").show();
                        $(".cpa_one_pass_info").hide();  
                        $(".da_one_batch_name").append(exam_register[0].batch.name);
                        $(".da_one_pass_exam_date").append(exam_register[0].passed_date);
                        $(".da_one_pass_level").append(exam_register[0].passed_level);
                        $(".da_one_pass_personal_no").append(exam_register[0].passed_personal_no);
    
                        if(student_course_regs[0].type==0){
                            $(".da_one_attend_place").append("ကိုယ်တိုင်လေ့လာသင်ယူသူ");
                        }else if(student_course_regs[0].type==1){
                            $(".da_one_attend_place").append("ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း");
                        }else if(student_course_regs[0].type==2 && student_course_regs[0].mac_type==1){
                            $(".da_one_attend_place").append("စာရင်းကောင်စီ (ရန်ကုန်သင်တန်းကျောင်း)");
                        }else{
                            $(".da_one_attend_place").append("စာရင်းကောင်စီ (နေပြည်တော်သင်တန်းကျောင်း)");
                        }
    
                        if(exam_register[0].is_full_module == 1){
                            $(".da_one_module").append("Module 1");
                        }else if(exam_register[0].is_full_module == 2){
                            $(".da_one_module").append("Module 2");
                        }else if(exam_register[0].is_full_module == 3){
                            $(".da_one_module").append("All Module");
                        }else{
                            $(".da_one_module").append("-");
                        }
                                        
                        
                    }

                    if(element.course_type_id==2){
                        $(".da_one_pass_info").hide();
                        $(".cpa_one_pass_info").show();  
                        $(".cpa_one_batch_name").append(exam_register[0].batch.name);
                        $(".cpa_one_pass_exam_date").append(exam_register[0].passed_date);
                        $(".cpa_one_pass_level").append(exam_register[0].passed_level);
                        $(".cpa_one_pass_personal_no").append(exam_register[0].passed_personal_no);
    
                        if(student_course_regs[0].type==0){
                            $(".cpa_one_attend_place").append("ကိုယ်တိုင်လေ့လာသင်ယူသူ");
                        }else if(student_course_regs[0].type==1){
                            $(".cpa_one_attend_place").append("ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း");
                        }else if(student_course_regs[0].type==2 && student_course_regs[0].mac_type==1){
                            $(".cpa_one_attend_place").append("စာရင်းကောင်စီ (ရန်ကုန်သင်တန်းကျောင်း)");
                        }else{
                            $(".cpa_one_attend_place").append("စာရင်းကောင်စီ (နေပြည်တော်သင်တန်းကျောင်း)");
                        }
 
                        if(exam_register[0].is_full_module == 1){
                            $(".cpa_one_module").append("Module 1");
                        }else if(exam_register[0].is_full_module == 2){
                            $(".cpa_one_module").append("Module 2");
                        }else if(exam_register[0].is_full_module == 3){
                            $(".cpa_one_module").append("All Module");
                        }else{
                            $(".cpa_one_module").append("-");
                        }
                                        
                        
                    }
                }

                if(exam_register.length == 2){

                    if(element.course_type_id==1){

                        $(".da_one_pass_info").show();
                        $(".da_two_pass_info").show();

                        $(".cpa_one_pass_info").hide();
                        $(".cpa_two_pass_info").hide();  

                        $(".da_one_batch_name").append(exam_register[0].batch.name);
                        $(".da_one_pass_exam_date").append(exam_register[0].passed_date);
                        $(".da_one_pass_level").append(exam_register[0].passed_level);
                        $(".da_one_pass_personal_no").append(exam_register[0].passed_personal_no);
                        

                        $(".da_two_batch_name").append(exam_register[1].batch.name);
                        $(".da_two_pass_exam_date").append(exam_register[1].passed_date);
                        $(".da_two_pass_level").append(exam_register[1].passed_level);
                        $(".da_two_pass_personal_no").append(exam_register[1].passed_personal_no);
    
                        if(student_course_regs[0].type==0){
                            $(".da_one_attend_place").append("ကိုယ်တိုင်လေ့လာသင်ယူသူ");
                        }else if(student_course_regs[0].type==1){
                            $(".da_one_attend_place").append("ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း");
                        }else if(student_course_regs[0].type==2 && student_course_regs[0].mac_type==1){
                            $(".da_one_attend_place").append("စာရင်းကောင်စီ (ရန်ကုန်သင်တန်းကျောင်း)");
                        }else{
                            $(".da_one_attend_place").append("စာရင်းကောင်စီ (နေပြည်တော်သင်တန်းကျောင်း)");
                        }

                        if(student_course_regs[1].type==0){
                            $(".da_two_attend_place").append("ကိုယ်တိုင်လေ့လာသင်ယူသူ");
                        }else if(student_course_regs[1].type==1){
                            $(".da_two_attend_place").append("ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း");
                        }else if(student_course_regs[1].type==2 && student_course_regs[1].mac_type==1){
                            $(".da_two_attend_place").append("စာရင်းကောင်စီ (ရန်ကုန်သင်တန်းကျောင်း)");
                        }else{
                            $(".da_two_attend_place").append("စာရင်းကောင်စီ (နေပြည်တော်သင်တန်းကျောင်း)");
                        }
    
                        if(exam_register[0].is_full_module == 1){
                            $(".da_one_module").append("Module 1");
                        }else if(exam_register[0].is_full_module == 2){
                            $(".da_one_module").append("Module 2");
                        }else if(exam_register[0].is_full_module == 3){
                            $(".da_one_module").append("All Module");
                        }else{
                            $(".da_one_module").append("-");
                        }

                        if(exam_register[1].is_full_module == 1){
                            $(".da_two_module").append("Module 1");
                        }else if(exam_register[1].is_full_module == 2){
                            $(".da_two_module").append("Module 2");
                        }else if(exam_register[1].is_full_module == 3){
                            $(".da_two_module").append("All Module");
                        }else{
                            $(".da_two_module").append("-");
                        }
                                        
                        
                    }

                    if(element.course_type_id==2){
                        $(".da_one_pass_info").hide();
                        $(".da_two_pass_info").hide();

                        $(".cpa_one_pass_info").show();
                        $(".cpa_two_pass_info").show(); 

                        $(".cpa_one_batch_name").append(exam_register[0].batch.name);
                        $(".cpa_one_pass_exam_date").append(exam_register[0].passed_date);
                        $(".cpa_one_pass_level").append(exam_register[0].passed_level);
                        $(".cpa_one_pass_personal_no").append(exam_register[0].passed_personal_no);

                        $(".cpa_two_batch_name").append(exam_register[1].batch.name);
                        $(".cpa_two_pass_exam_date").append(exam_register[1].passed_date);
                        $(".cpa_two_pass_level").append(exam_register[1].passed_level);
                        $(".cpa_two_pass_personal_no").append(exam_register[1].passed_personal_no);
    
                        if(student_course_regs[0].type==0){
                            $(".cpa_one_attend_place").append("ကိုယ်တိုင်လေ့လာသင်ယူသူ");
                        }else if(student_course_regs[0].type==1){
                            $(".cpa_one_attend_place").append("ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း");
                        }else if(student_course_regs[0].type==2 && student_course_regs[0].mac_type==1){
                            $(".cpa_one_attend_place").append("စာရင်းကောင်စီ (ရန်ကုန်သင်တန်းကျောင်း)");
                        }else{
                            $(".cpa_one_attend_place").append("စာရင်းကောင်စီ (နေပြည်တော်သင်တန်းကျောင်း)");
                        }

                        if(student_course_regs[1].type==0){
                            $(".cpa_two_attend_place").append("ကိုယ်တိုင်လေ့လာသင်ယူသူ");
                        }else if(student_course_regs[1].type==1){
                            $(".cpa_two_attend_place").append("ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်းကျောင်း");
                        }else if(student_course_regs[1].type==2 && student_course_regs[1].mac_type==1){
                            $(".cpa_two_attend_place").append("စာရင်းကောင်စီ (ရန်ကုန်သင်တန်းကျောင်း)");
                        }else{
                            $(".cpa_two_attend_place").append("စာရင်းကောင်စီ (နေပြည်တော်သင်တန်းကျောင်း)");
                        }
    
                        
                        if(exam_register[0].is_full_module == 1){
                            $(".cpa_one_module").append("Module 1");
                        }else if(exam_register[0].is_full_module == 2){
                            $(".cpa_one_module").append("Module 2");
                        }else if(exam_register[0].is_full_module == 3){
                            $(".cpa_one_module").append("All Module");
                        }else{
                            $(".cpa_one_module").append("-");
                        }

                        if(exam_register[1].is_full_module == 1){
                            $(".cpa_two_module").append("Module 1");
                        }else if(exam_register[1].is_full_module == 2){
                            $(".cpa_two_module").append("Module 2");
                        }else if(exam_register[1].is_full_module == 3){
                            $(".cpa_two_module").append("All Module");
                        }else{
                            $(".cpa_two_module").append("-");
                        }
                                         
                        
                    }
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
                                if(course.is_full_module==1){
                                    module_name="Module 1";
                                }
                                else if(course.is_full_module==2){
                                    module_name="Module 2";
                                }
                                else if(course.is_full_module==3){
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

            })
        }
    })
}

function rejectOfflineDACPAUser() {


    if (!confirm('Are you sure you want to reject this student?')) {
        return;
    }
    else {
        var formData = new FormData();
        formData.append('remark', $('#remark').val());
        formData.append('_method', 'PATCH')
        var id = $("#student_info_id").val();


        $.ajax({
            url: BACKEND_URL + "/reject_offline_da_cpa/" + id,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                // console.log('result',result);
                successMessage("You have rejected that user!");
                location.href = FRONTEND_URL + "/offline_user";
                // let url;
                // if (result) {

                //     switch (result.code) {
                //         case 'da_1':
                //             url = '/da_one_app_list';
                //             break;
                //         case 'da_2':
                //             url = '/da_two_app_list';
                //             break;
                //         case 'cpa_1':
                //             url = '/cpa_one_app_list';
                //             break;
                //         case 'cpa_2':
                //             url = '/cpa_two_app_list';
                //             break;
                //         default:
                //             url = '/da_one_app_list';
                //             break;



                //     }
                //     successMessage("You have rejected that user!");
                //     location.href = FRONTEND_URL + url;
                // }
                // location.href = FRONTEND_URL + "/da_one_app_list";
            }
        });
    }
}

function approveOfflineDACPAUser() {
    if (!confirm('Are you sure you want to approve this student?')) {
        return;
    }
    else {

        var id = $("input[name = student_course_id]").val();
        $.ajax({
            url: BACKEND_URL + "/approve_offline_da_cpa/" + id,
            type: 'patch',
            success: function (result) {
                successMessage("You have approved that user!");
                location.href = FRONTEND_URL + "/offline_user";
                // let url;
                // if (result) {

                //     switch (result.code) {
                //         case 'da_1':
                //             url = '/da_one_app_list';
                //             break;
                //         case 'da_2':
                //             url = '/da_two_app_list';
                //             break;
                //         case 'cpa_1':
                //             url = '/cpa_one_app_list';
                //             break;
                //         case 'cpa_2':
                //             url = '/cpa_two_app_list';
                //             break;
                //         default:
                //             url = '/da_one_app_list';
                //             break;



                //     }
                //     successMessage("You have approved that user!");
                //     location.href = FRONTEND_URL + url;
                // }
            }
        });
    }
}