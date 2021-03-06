function loadMarkedStudent()
{
    $.ajax({
        url: BACKEND_URL+"/exam_result",
        type: 'get',
        data:"",
        success: function(data){
            // console.log(data);
            var da_data = data.data;
            da_data.forEach(function (element) {
                var std = element.student_info;
                // console.log(std)

                var tr = "<tr>";
                tr += "<td>" +  + "</td>";
                tr += "<td>" + std.name_eng + "</td>";
                tr += "<td>" + element.student_info_id + "</td>";
                tr += "<td>" + element.registeration_id + "</td>";
                tr += "<td ><div class='btn-group'>";
                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='viewMark(" + element.id + ")'>" +
                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
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

function viewMark(resultID){
    localStorage.setItem("id",resultID);
    location.href =  FRONTEND_URL + "/edit_marked_list";
}

function getResult()
{
    var id = localStorage.getItem("id");
    $.ajax({
        url: BACKEND_URL + "/exam_result/"+id,
        type: 'get',
        data:"",
        success: function(data){
            // console.log(data);
            var da_data = data.data;
            da_data.forEach(function (element) {
                var std = element.student_info;
                // console.log(std)
                var result = jQuery.parseJSON(element.result);
                // console.log(result)
                $("#std_name").append(std.name_eng);
                $("#std_info_id").append(element.student_info_id);
                $("#reg_id").append(element.registeration_id);
                $("#result").append(result);
            });
        }
    });
}


function passExam(){
    if(!confirm("Are you sure you want to pass this student?"))
    {
        return;
    }
    else{
        var id = localStorage.getItem("exam_register_id");
        var course_type = localStorage.getItem("course_type");
        $.ajax({
            url: BACKEND_URL + "/pass_exam/"+id,
            type: 'PATCH',
            success: function(result){
                //aggaio
                successMessage(result.message);
                if (course_type == 'da_1') {
                    location.href = FRONTEND_URL + "/da1_exam_result_edit";
                } else if (course_type == 'da_2') {
                    location.href = FRONTEND_URL + "/da2_exam_result_edit";
                } else if (course_type == 'cpa_1') {
                    location.href = FRONTEND_URL + "/cpa1_exam_result_edit";
                } else {
                    location.href = FRONTEND_URL + "/cpa2_exam_result_edit";
                }
            },
            error: function (message) {
                console.log(message);
            }
        });
    }    
}

function failExam(){
    if(!confirm("Are you sure you want to fail this student?"))
    {
        return;
    }
    else{
        var id = localStorage.getItem("exam_register_id");
        var course_type = localStorage.getItem("course_type");
        $.ajax({
            url:  BACKEND_URL + "/fail_exam/"+id,
            type: 'PATCH',
            success: function(result){
                //aggaio
                errorMessage(result.message);
                if (course_type == 'da_1') {
                    location.href = FRONTEND_URL + "/da1_exam_result_edit";
                } else if (course_type == 'da_2') {
                    location.href = FRONTEND_URL + "/da2_exam_result_edit";
                } else if (course_type == 'cpa_1') {
                    location.href = FRONTEND_URL + "/cpa1_exam_result_edit";
                } else {
                    location.href = FRONTEND_URL + "/cpa2_exam_result_edit";
                }
            },
            error: function (message) {
                console.log(message);
            }
        });
    }
}

