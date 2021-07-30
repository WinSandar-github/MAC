function getExam(){
    destroyDatatable("#tbl_da_exam_one", "#tbl_da_exam_one_body");
    $.ajax({
        url: BACKEND_URL + "/exam_register",
        type: 'get',
        data:"",
        success: function(data){
            // console.log(data);
            var da_data = data.data;
            da_data.forEach(function (element) {
                console.log('element',element);

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
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + exam_type_id + "</td>";
                    tr += "<td>" + element.grade + "</td>";
                    tr += "<td>" + status+ "</td>";
                    tr += "<td>" + element.batch_id+ "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showExam(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='printExamCard(" + element.id + ")'>" +
                    "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_da_exam_one_body").append(tr);
            });
            getIndexNumber('#tbl_da_exam_one tr');
            createDataTable("#tbl_da_exam_one");
        },
        error:function (message){
            dataMessage(message, "#tbl_da_exam_one", "#tbl_da_exam_one_body");
        }
    });
}

function showExam(studentId){
    localStorage.setItem("student_id",studentId);
    location.href="/da_exam_one_edit";
}
function printExamCard(studentId){
    localStorage.setItem("student_id",studentId);
    location.href="/da1_examcard";
}

function loadExamData()
{
    var id=localStorage.getItem("student_id");
    // console.log(id)
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
            exam_data.forEach(function (element){
                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }
                $("#school_name").append(element.private_school_name);
                $("#exam_type").append(element.exam_type_id);
                $("#student_grade").append(element.grade);
                $("#student_status").append(status);
            })
        }
    })
}

function loadStudentDataForExamCard()
{
    var id=localStorage.getItem("student_id");
    $("#roll_no").html("");
    $("#name").html("");
    $("#nrc").html("");

    $("input[name = student_info_id]").val(id);

    $.ajax({
        type: "GET",
        url: "/api/da_register/"+id,
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

            })
        }
    })
}

function approveExam(){
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: BACKEND_URL + "/approve_exam/"+id,
        type: 'PATCH',
        success: function(result){
            console.log(result)
            successMessage("You have approved that form!");
            location.href = "/da_exam_one";
            getExam();
        }
    });
}

function rejectExam(){
    var id = $("input[name = student_id]").val();
    $.ajax({
        url:  BACKEND_URL + "/reject_exam/"+id,
        type: 'PATCH',
        success: function(result){
            console.log(result)
            successMessage("You have rejected that form!");
            location.href = "/da_exam_one";
            getExam();
        }
    });
}

function loadBatchData(){ 
    var select = document.getElementById("selected_batch_id");  
    $.ajax({
        url: BACKEND_URL+"/batch",
        type: 'get',
        data:"",
        success: function(data){

            var batch_data=data.data;            
            
            batch_data.forEach(function (element) {
                var option = document.createElement('option');
                option.text = element.name;
                option.value = element.id;
                select.add(option, 0);
            });              
        },
        error:function (message){
                   
        }
    });
}

function SearchByID(){
    var id = $('#selected_batch_id').val();
    console.log('id',id);
    destroyDatatable("#tbl_da_exam_one", "#tbl_da_exam_one_body");
    $.ajax({
        url: BACKEND_URL + "/filter/"+id,
        type: 'get',
        data:"",
        success: function(data){
            var da_data = data.data;
            da_data.forEach(function (element) {
                console.log(element)
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + element.exam_type_id + "</td>";
                    tr += "<td>" + element.grade + "</td>";
                    tr += "<td>" + element.status+ "</td>";
                    tr += "<td>" + element.batch_id+ "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showExam(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='printExamCard(" + element.id + ")'>" +
                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_da_exam_one_body").append(tr);
            });
            getIndexNumber('#tbl_da_exam_one tr');
            createDataTable("#tbl_da_exam_one");
        },
        error:function (message){
            dataMessage(message, "#tbl_da_exam_one", "#tbl_da_exam_one_body");
        }
    });
}

function chooseBatch(){
    var id = $('#selected_batch_id').val();
    // console.log(id)
    $.ajax({
            url:  BACKEND_URL + "/exam_register/"+id,
            type: 'get',
            success: function(result){
                localStorage.setItem("batch_id",id);
                location.href = "/exam_result_edit";
                // loadStudent();
            }
        });
}

function loadStudent()
{
    var id = localStorage.getItem("batch_id");
    // console.log(id);
    $.ajax({
        url: BACKEND_URL + "/std/"+id,
        type: 'get',
        data:"",
        success: function(data){
            // console.log(data);
            var da_data = data.data;
            da_data.forEach(function (element) {
                var std = element.student_info;
                // console.log(std)
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

                var tr = "<tr>";
                tr += "<td>" +  + "</td>";
                tr += "<td>" + std.name_eng + "</td>";
                tr += "<td>" + element.private_school_name + "</td>";
                tr += "<td>" + exam_type_id + "</td>";
                tr += "<td>" + element.grade + "</td>";
                tr += "<td>" + status+ "</td>";
                tr += "<td>" + element.batch_id+ "</td>";
                tr += "<td>" + is_full_module+ "</td>";
                tr += "<td ><div class='btn-group'>";
                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='fillMark(" + element.batch_id + "," + element.is_full_module +")'>" +
                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                tr += "<td ><div class='btn-group'>";
                $("#tbl_exam_result_body").append(tr);
            });
            getIndexNumber('#tbl_exam_result tr');
            createDataTable("#tbl_exam_result");
        },
        error:function (message){
            dataMessage(message, "#tbl_exam_result", "#tbl_exam_result_body");
        }
    });
}

function fillMark(batchID, isFullModule){
    localStorage.setItem("batch_id",batchID);
    localStorage.setItem("is_full_module",isFullModule);
    var is_full_module = localStorage.getItem("is_full_module");
    // console.log(is_full_module)
    if(is_full_module == 0)
    {
        location.href="/fill_mark_one";
    }
    else if(is_full_module == 1)
    {
        location.href="/fill_mark_two";
    }
    else
    {
        location.href="/fill_mark_full";
    }
}

function getModuleStd(){
    var id = localStorage.getItem("batch_id");
    // console.log(id);
    $("input[name = batch_id]").val(id);
    $.ajax({
        url: BACKEND_URL + "/std/"+id,
        type: 'get',
        data:"",
        success: function(data){
            // console.log(data);
            var da_data = data.data;
            da_data.forEach(function (element) {
                var std = element.student_info;
                // console.log(std)
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

                $("#std_name").append(std.name_eng);
                $("#school_name").append(element.private_school_name);
                $("#exam_type").append(exam_type_id);
                $("#student_grade").append(element.grade);
                $("#student_status").append(status);
                $("#is_full_module").append(is_full_module);
            });
        }
    });
}