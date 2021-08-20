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

function getCPAExam(){
    destroyDatatable("#tbl_cpa_exam_one", "#tbl_cpa_exam_one_body");
    destroyDatatable("#tbl_cpa_exam_two", "#tbl_cpa_exam_two_body");
    var batch = $("#selected_batch_id").val();
    var send_data=new FormData();
    send_data.append('name',$("input[name=filter_by_name]").val());
    send_data.append('batch',batch);
    $.ajax({
        url: BACKEND_URL + "/filter",
        type: 'post',
        data:send_data,
        contentType: false,
        processData: false,
        success: function(data){
            var da_data = data.data;
            da_data.forEach(function (element) {
                    console.log(element.student_info.course_type_id);
                    $.ajax({
                        url: BACKEND_URL+"/course/"+element.form_type,
                        type: 'get',
                        data:"",
                        success:function(courses){
                            var course=courses.data;
                            if(course.code=="cpa_1")
                            {console.log("cpa 1");
                                if(element.status==0){
                                    status="PENDING";
                                }
                                else if(element.status==1){
                                    status="APPROVED";
                                }
                                else{
                                    status="REJECTED";
                                }

                                if(element.exam_type_id == 0){
                                    exam_type_id = "SELF STUDY";
                                }
                                else if(element.exam_type_id==1){
                                    exam_type_id="PRIVATE SCHOOL";
                                }
                                else{
                                    exam_type_id="MAC STUDENT";
                                }

                                if(element.grade==0){
                                    grade="PENDING";
                                }
                                else if(element.grade==1){
                                    grade="PASSED";
                                }
                                else{
                                    grade="FAILED";
                                }

                                var tr = "<tr>";
                                tr += "<td>" +  + "</td>";
                                tr += "<td>" + element.student_info.name_eng + "</td>";
                                tr += "<td>" + exam_type_id + "</td>";
                                tr += "<td>" + grade + "</td>";
                                tr += "<td>" + status+ "</td>";
                                tr += "<td ><div class='btn-group'>";
                                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showCPAOneExam(" + element.id + ")'>" +
                                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                tr += "<td ><div class='btn-group'>";
                                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='printCPAOneExamCard(" + element.student_info.id + ")'>" +
                                "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
                                tr += "</tr>";
                                $("#tbl_cpa_exam_one_body").append(tr);
                            }
                            else if(course.code=="cpa_2")
                            {
                                if(element.status==0){
                                    status="Pending";
                                }
                                else if(element.status==1){
                                    status="Approve";
                                }
                                else{
                                    status="Reject";
                                }
                                if(element.exam_type_id == 0){
                                    exam_type_id = "SELF STUDY";
                                }
                                else if(element.exam_type_id==1){
                                    exam_type_id="PRIVATE SCHOOL";
                                }
                                else{
                                    exam_type_id="MAC STUDENT";
                                }

                                if(element.grade==0){
                                    grade="PENDING";
                                }
                                else if(element.grade==1){
                                    grade="PASSED";
                                }
                                else{
                                    grade="FAILED";
                                }
                                var tr = "<tr>";
                                tr += "<td>" +  + "</td>";
                                tr += "<td>" + element.student_info.name_eng + "</td>";
                                tr += "<td>" + exam_type_id + "</td>";
                                tr += "<td>" + grade + "</td>";
                                tr += "<td>" + status+ "</td>";
                                tr += "<td ><div class='btn-group'>";
                                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showCPATwoExam(" + element.id + ")'>" +
                                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                tr += "<td ><div class='btn-group'>";
                                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='printCPAOneExamCard(" + element.student_info.id + ")'>" +
                                "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
                                tr += "</tr>";
                                $("#tbl_cpa_exam_two_body").append(tr);

                            }

                            getIndexNumber('#tbl_cpa_exam_one tr');
                            createDataTable(".tbl_cpa_exam_one");
                            getIndexNumber('#tbl_cpa_exam_two tr');
                            createDataTable(".tbl_cpa_exam_two");
                        }
                    })
            });

        },
        error:function (message){
            dataMessage(message, "#tbl_cpa_exam_one", "#tbl_cpa_exam_one_body");
            dataMessage(message, "#tbl_cpa_exam_two", "#tbl_cpa_exam_two_body");
        }
    });
}

function showCPAOneExam(studentId){
    localStorage.setItem("student_id",studentId);
    location.href= FRONTEND_URL + "/cpa_exam_one_edit";
}
function showCPATwoExam(studentId){
    localStorage.setItem("student_id",studentId);
    location.href= FRONTEND_URL + "/cpa_two_exam_edit";
}

function printCPAOneExamCard(studentId){
    localStorage.setItem("student_id",studentId);
    location.href= FRONTEND_URL + "/cpa1_examcard";
}
function loadCPAStudentDataForExamCard()
{
    var id=localStorage.getItem("student_id");
    $("#roll_no").html("");
    $("#name").html("");
    $("#nrc").html("");
    console.log(id);
    $("input[name = student_info_id]").val(id);

    $.ajax({
        type: "GET",
        url: BACKEND_URL + "/da_register/"+id,
        success: function (data) {
            console.log("data=",data);
            var exam_data = data.data;
            exam_data.forEach(function (element){
                console.log("element=",element.student_education_histroy.roll_number);
                // document.getElementById("student_img").src ='img/user_profile/vIqzOHXj.jpeg';
                console.log(element.image);
                document.getElementById('student_img').src=element.image;
                $("#roll_no").append(element.student_education_histroy.roll_number);
                $("#name").append(element.name_mm);
                $("#nrc").append(element.nrc_state_region+"/"+element.nrc_township+"("+element.nrc_citizen+")"+element.nrc_number);
                $("#father_name").append(element.father_name_mm);
            })
        }
    })
}

function approveCPAOneExam(){
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/approve_exam/"+id,
        type: 'PATCH',
        success: function(result){
            console.log(result)
            successMessage("You have approved that form!");
            location.href =  FRONTEND_URL + "/cpa_exam_one";
            getCPAExam();
        }
    });
}

function rejectCPAOneExam(){
    var id = $("input[name = student_id]").val();
    $.ajax({
        url:  BACKEND_URL + "/reject_exam/"+id,
        type: 'PATCH',
        success: function(result){
            console.log(result)
            successMessage("You have rejected that form!");
            location.href =  FRONTEND_URL + "/cpa_exam_one";
            getCPAExam();
        }
    });
}

function approveCPATwoExam(){
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/approve_exam/"+id,
        type: 'PATCH',
        success: function(result){
            console.log(result)
            successMessage("You have approved that form!");
            location.href =  FRONTEND_URL + "/cpa_two_exam";
            getCPAExam();
        }
    });
}

function rejectCPATwoExam(){
    var id = $("input[name = student_id]").val();
    $.ajax({
        url:  BACKEND_URL + "/reject_exam/"+id,
        type: 'PATCH',
        success: function(result){
            console.log(result)
            successMessage("You have rejected that form!");
            location.href =  FRONTEND_URL + "/cpa_two_exam";
            getCPAExam();
        }
    });
}

function loadCPAExamData()
{
    var id=localStorage.getItem("student_id");
    console.log(id);
    $("#school_name").html("");
    $("#exam_type").html("");
    $("#student_grade").html("");
    $("#student_status").html("");

    $("input[name = student_id]").val(id);

    $.ajax({
        type: "GET",
        url: BACKEND_URL+ "/exam_register/"+id,
        success: function (data) {
            var exam_data = data.data;
            console.log(exam_data);
            exam_data.forEach(function (element){
                if(element.status==0){
                    status="PENDING";
                }
                else if(element.status==1){
                    status="APPROVED";
                }
                else{
                    status="REJECTED";
                }

                if(element.exam_type_id == 0){
                    exam_type_id = "SELF STUDY";
                }
                else if(element.exam_type_id==1){
                    exam_type_id="PRIVATE SCHOOL";
                }
                else{
                    exam_type_id="MAC STUDENT";
                }

                if(element.grade==0){
                    grade="PENDING";
                }
                else if(element.grade==1){
                    grade="PASSED";
                }
                else{
                    grade="FAILED";
                }

                $("#school_name").append(element.private_school_name);
                $("#exam_type").append(exam_type_id);
                $("#student_grade").append(grade);
                $("#student_status").append(status);
                if(element.status==0){
                    document.getElementById("approve").style.display='block';
                    document.getElementById("reject").style.display='block';
                }
                else{
                    document.getElementById("approve").style.display='none';
                    document.getElementById("reject").style.display='none';
                }
            })
        }
    })
}

function chooseCPABatch(){
    var id = $('#cpa_batch_id').val();
    console.log(id);
    $.ajax({
            url:  BACKEND_URL + "/exam_register/"+id,
            type: 'get',
            success: function(result){
                console.log(result);
                localStorage.setItem("batch_id",id);
                location.href =  FRONTEND_URL + "/cpa_exam_result_edit";
                // loadStudent();
            }
        });
}
function loadCPAStudent(course_type)
{
    destroyDatatable("#tbl_cpa_exam_result", "#tbl_cpa_exam_result_body");
    localStorage.setItem("course_type",course_type);
    //var id = localStorage.getItem("batch_id");
    // console.log(id);
    var send_data=new FormData();
    send_data.append('name',$("input[name=filter_by_name]").val());
    send_data.append('grade',$('#selected_grade_id').val());
    $.ajax({
        url: BACKEND_URL + "/filter_exam_register",
        type: 'post',
        data:send_data,
        contentType: false,
        processData: false,
        success: function(data){
            console.log("course",data);
            var da_data = data.data;
            da_data.forEach(function (element) {
                    $.ajax({
                        url: BACKEND_URL+"/course/"+element.form_type,
                        type: 'get',
                        data:"",
                        success:function(courses){
                            console.log(courses,"Course")

                            var course=courses.data;
                            if(course.code==course_type){
                                console.log('check courses',course);
                                console.log(course.code,course_type);
                                if(element.status==0){
                                    status="PENDING";
                                }
                                else if(element.status==1){
                                    status="APPROVED";
                                }
                                else{
                                    status="REJECTED";
                                }
                                if(element.exam_type_id == 0){
                                    exam_type_id = "SELF STUDY";
                                }
                                else if(element.exam_type_id==1){
                                    exam_type_id="PRIVATE SCHOOL";
                                }
                                else{
                                    exam_type_id="MAC STUDENT";
                                }
                                if(element.is_full_module==0){
                                    is_full_module="Module 1";
                                }
                                else if(element.is_full_module==1){
                                    is_full_module="Module 2";
                                }
                                else{
                                    is_full_module="Full Module";
                                }
                                if(element.grade==0){
                                    student_grade="PENDING";
                                }
                                else if(element.grade==1){
                                    student_grade="PASSED";
                                }
                                else{
                                    student_grade="FAILED";
                                }
                                var tr = "<tr>";
                                tr += "<td>" +  + "</td>";
                                tr += "<td>" + element.student_info.name_eng + "</td>";
                                //tr += "<td>" + element.private_school_name + "</td>";
                                tr += "<td>" + exam_type_id + "</td>";
                                tr += "<td>" + student_grade + "</td>";
                                //tr += "<td>" + status+ "</td>";
                                // tr += "<td>" + element.batch_id+ "</td>";
                                tr += "<td>" + is_full_module+ "</td>";
                                tr += "<td ><div class='btn-group'>";
                                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='fillCPAMark(" + element.id + "," + element.is_full_module +")'>" +
                                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                tr += "<td ><div class='btn-group'>";
                                $("#tbl_cpa_exam_result_body").append(tr);


                                getIndexNumber('#tbl_cpa_exam_result tr');
                                createDataTable("#tbl_cpa_exam_result");
                            }
                         }
                    });
            });
        },
        error:function (message){
            dataMessage(message, "#tbl_cpa_exam_result", "#tbl_cpa_exam_result_body");
        }
    });
}

function fillCPAMark(id, isFullModule){
    console.log("exam_register_id",id);
    localStorage.setItem("exam_register_id",id);
    localStorage.setItem("is_full_module",isFullModule);
    var is_full_module = localStorage.getItem("is_full_module");
    // console.log(is_full_module)
    if(is_full_module == 0 || is_full_module == 1)
    {
        location.href= FRONTEND_URL + "/cpa_fill_mark_m1&2";
    }
    else
    {
        location.href= FRONTEND_URL + "/cpa_fill_mark_full";
    }
}

function getCPAModuleStd(){
    destroyDatatable("#tbl_cpa_exam_result", "#tbl_cpa_exam_result_body");
    var id = localStorage.getItem("exam_register_id");
    var module_type = localStorage.getItem("is_full_module");
    // console.log(id);
    //$("input[name = batch_id]").val(id);
    $.ajax({
        url: BACKEND_URL + "/std/"+id,
        type: 'get',
        data:"",
        success: function(data){
             console.log(data);
            var da_data = data.data;
            da_data.forEach(function (element) {
                var std = element.student_info;
                 console.log('ee',element);
                if(element.status==0){
                    status="PENDING";
                    $('.pass_fail_btn').hide();
                }
                else if(element.status==1){
                    status="APPROVED";
                }
                else{
                    status="REJECTED";
                }
                if(element.exam_type_id == 0){
                    exam_type_id = "SELF STUDY";
                }
                else if(element.exam_type_id==1){
                    exam_type_id="PRIVATE SCHOOL";
                }
                else{
                    exam_type_id="MAC STUDENT";
                }
                if(element.is_full_module==0){
                    is_full_module="Module 1";
                }
                else if(element.is_full_module==1){
                    is_full_module="Module 2";
                }
                else{
                    is_full_module="Full Module";
                }

                // if(element.grade == 1 )
                // {
                //      $('.ex_res_btn').hide();
                //     $('.pass_fail_btn').hide();

                // }

                if(element.grade==0){
                    grade="PENDING";
                }
                else if(element.grade==1){
                    grade="PASSED";
                }
                else{
                    grade="FAILED";
                }

                $("#std_name").append(std.name_eng);
                $("#school_name").append(element.private_school_name);
                $("#exam_type").append(exam_type_id);
                $("#student_grade").append(grade);
                $("#student_status").append(status);
                $("#is_full_module").append(is_full_module);
            });
            $.ajax({
                url: BACKEND_URL+"/search_exam_result/"+id,
                type: 'get',
                data:"",
                success: function(result){

                        if(result.data !=null)
                        {
                            $("input[name = result_id]").val(result.data.id);
                            console.log('search_exam_result',result.data.id);
                            var rData=JSON.parse(result.data.result);
                            console.log(rData.subjects[1]);

                            console.log('is_full_module',module_type);
                            if(module_type == 0 || module_type==1)
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
                            else
                            {
                                for (var i = 0; i < 6; i++)
                                {
                                    var j=i+1;
                                    var sunject=document.getElementById('subject'+j);
                                    sunject.value = rData.subjects[i];
                                }
                                for (var i = 0; i < 6; i++)
                                {
                                    var j=i+1;
                                    var mark=document.getElementById('mark'+j);
                                    mark.value = rData.marks[i];
                                }
                                for (var i = 0; i < 6; i++)
                                {
                                    var j=i+1;
                                    var grade=document.getElementById('grade'+j);
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
