function loadCPABatchData(){ 
    var select = document.getElementById("selected_batch_id");  
    $.ajax({
        url: BACKEND_URL+"/course_by_course_type/2",
        type: 'get',
        data:"",
        success: function(data){
            var course_data=data.data;            
            
            course_data.forEach(function (element) {
                element.batch.forEach(function (batch){
                    var option = document.createElement('option');
                    option.text = batch.name;
                    option.value = batch.id;
                    select.add(option, 0);
                });
            });              
        },
        error:function (message){
                   
        }
    });
}

function getCPAExam(){
    destroyDatatable("#tbl_cpa_exam_one", "#tbl_cpa_exam_one_body");
    var batch = $("#selected_batch_id").val();
    console.log("selected",batch);
    $.ajax({
        url: BACKEND_URL + "/filter/"+batch,
        type: 'get',
        data:"",
        success: function(data){
            console.log(data);
            var da_data = data.data;
            da_data.forEach(function (element) {
                console.log('element',element.student_info.course_type_id);
                if(element.student_info.course_type_id==2)
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
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + element.exam_type_id + "</td>";
                    tr += "<td>" + element.grade + "</td>";
                    tr += "<td>" + status+ "</td>";
                    tr += "<td>" + element.batch_id+ "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showCPAOneExam(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='printCPAOneExamCard(" + element.student_info.id + ")'>" +
                    "<li class='fa fa-print fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_cpa_exam_one_body").append(tr);
                }
            });
            getIndexNumber('#tbl_cpa_exam_one tr');
            createDataTable("#tbl_cpa_exam_one");
        },
        error:function (message){
            dataMessage(message, "#tbl_cpa_exam_one", "#tbl_cpa_exam_one_body");
        }
    });
}

function showCPAOneExam(studentId){
    localStorage.setItem("student_id",studentId);
    location.href="/cpa_exam_one_edit";
}
function printCPAOneExamCard(studentId){
    localStorage.setItem("student_id",studentId);
    location.href="/cpa1_examcard";
}
function loadStudentDataForExamCard()
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
            location.href = "/cpa_exam_one";
            getExam();
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
            location.href = "/cpa_exam_one";
            getExam();
        }
    });
}

function loadCPAOneExamData()
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