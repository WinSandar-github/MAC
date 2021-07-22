function getExam(){
    destroyDatatable("#tbl_da_exam_one", "#tbl_da_exam_one_body");    
    $.ajax({
        url: "/api/exam_register",
        type: 'get',
        data:"",
        success: function(data){
            var da_data = data.data;
            da_data.forEach(function (element) {
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.private_school_name + "</td>";
                    tr += "<td>" + element.exam_type_id + "</td>";
                    tr += "<td>" + element.grade + "</td>";
                    tr += "<td>" + element.status+ "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showExam(" + element.id + ")'>" +
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

function showExam(studentId){
    localStorage.setItem("student_id",studentId);
    location.href="/da_exam_one_edit";
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
                $("#school_name").append(element.private_school_name);
                $("#exam_type").append(element.exam_type_id);
                $("#student_grade").append(element.grade);
                $("#student_status").append(element.status);
            })
        }
    })
}

function approveExam(){ 
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: "/api/approve_exam/"+id,
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
        url: "/api/reject_exam/"+id,
        type: 'PATCH',        
        success: function(result){
            console.log(result)
            successMessage("You have rejected that form!");  
            location.href = "/da_exam_one";         
            getExam();
        }
    });
}