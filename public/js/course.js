function thousands_separators(num) {
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
}
function removeComma(number){
    var number_part=parseInt(number.split(',').join(""));
    return number_part;
}

function createCourse(){    
    var send_data=new FormData();
    send_data.append('name',$("input[name=name]").val());
    send_data.append('form_fee',removeComma($("input[name=form_fee]").val()));
    send_data.append('registration_fee',removeComma($("input[name=registration_fee]").val()));
    send_data.append('exam_fee',removeComma($("input[name=exam_fee]").val()));
    send_data.append('tution_fee',removeComma($("input[name=tution_fee]").val()));
    send_data.append('description',$("input[name=description]").val());   
    send_data.append('code',$("input[name=code]").val());   

    send_data.append('course_type_id',$('.course_type').val());
     
    $.ajax({
            url: BACKEND_URL+"/course",
            type: 'post',
            data:send_data,
            contentType: false,
            processData: false,
            success: function(result){
                 
                successMessage("Insert Successfully");
                location.reload();
            },
            error:function (message){
                errorMessage(message);
            }

    });
}

function getCourse(){
    destroyDatatable("#tbl_course", "#tbl_course_body");    
    $.ajax({
        url: BACKEND_URL+"/course",
        type: 'get',
        data:"",
        success: function(data){
            var course_data=data.data;
            course_data.forEach(function (element) {          
                var tr = "<tr>";
                tr += "<td>" +  + "</td>";
                tr += "<td>" + element.name + "</td>";
                tr += "<td>" + thousands_separators(element.form_fee) + "</td>";
                tr += "<td>" + thousands_separators(element.registration_fee) + "</td>";
                tr += "<td>" + thousands_separators(element.exam_fee) + "</td>";
                tr += "<td>" + thousands_separators(element.tution_fee) + "</td>";
                tr += "<td>" + element.description + "</td>";
            
                tr += "<td ><div class='btn-group'>";
                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showCourseInfo(" + element.id + ")'>" +
                    "<li class='fa fa-edit fa-sm'></li></button> ";
                tr += "<button type='button' class='btn btn-danger btn-xs' onClick='deleteCourseInfo(\"" + encodeURIComponent(element.name) + "\"," + element.id + ")'><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
    
                tr += "</tr>";
                $("#tbl_course_body").append(tr);         
    
            });
            
            getIndexNumber('#tbl_course tr');
            createDataTable("#tbl_course");      
        },
        error:function (message){
            dataMessage(message, "#tbl_course", "#tbl_course_body");        
        }
    
    });
}

function showCourseInfo(id) {
    
    $("#course_form").attr('action', 'javascript:updateCourse()');    
    $("input[name=course_id]").val(id);
    $.ajax({
        type: "get",
        url: BACKEND_URL+"/course/"+id,
        success: function (data) {
            var course_data=data.data;                     
            $('input[name=name]').val(course_data[0].name);
            $('input[name=form_fee]').val(course_data[0].form_fee);
            $('input[name=registration_fee]').val(course_data[0].registration_fee);
            $('input[name=exam_fee]').val(course_data[0].exam_fee);
            $('input[name=tution_fee]').val(course_data[0].tution_fee);
            $('input[name=registration_start_date]').val(course_data[0].registration_start_date);
            $('input[name=registration_end_date]').val(course_data[0].registration_end_date);
            $('input[name=description]').val(course_data[0].description);
            $('input[name=code]').val(course_data[0].code);
            $('.course_type').val(course_data[0].course_type_id);
                        
            $('#create_course_modal').modal('toggle');
        },

        error:function (message){
            errorMessage(message);
        }
    });
    
}

function updateCourse(){
    var id= $("input[name=course_id]").val();    
    var name=$("input[name=name]").val();
    var form_fee=$("input[name=form_fee]").val();
    var registration_fee=$("input[name=registration_fee]").val();
    var exam_fee=$("input[name=exam_fee]").val();
    var tution_fee=$("input[name=tution_fee]").val();
    var registration_start_date=$("input[name=registration_start_date]").val()
    var registration_end_date=$("input[name=registration_end_date]").val()
    var description =   $("input[name=description]").val();    
    var code        =   $("input[name=code]").val();   

    var course_type_id = $('.course_type').val();
   
    $.ajax({
        url: BACKEND_URL+"/course/"+id,
        type: 'patch',
        data:{
            name:name,
            form_fee:form_fee,
            registration_fee:registration_fee,
            exam_fee:exam_fee,
            tution_fee:tution_fee,
            registration_start_date:registration_start_date,
            registration_end_date:registration_end_date,
            description:description,
            code:code,
            course_type_id:course_type_id
        },        
        success: function(result){
            successMessage("Update Successfully");
            $('#create_course_modal').modal('toggle');  
            location.reload();          
            getCourse();
            
        
        }
    });
}

function deleteCourseInfo(courseName,courseId){
    var result = confirm("WARNING: This will delete Course Name " + decodeURIComponent(courseName) + " and all related data! Press OK to proceed.");
        if (result) {
            $.ajax({
                type: "DELETE",
                url: BACKEND_URL+'/course/'+courseId,
                success: function (result) {
                    successMessage("Delete Successfully");
                    getCourse();
                },
                error: function (message) {
                    errorMessage(message);
                }
            });
        }
}

function loadCourse(){ 
    var select = document.getElementById("selected_course_id");  
    $.ajax({
        url: BACKEND_URL+"/course",
        type: 'get',
        data:"",
        success: function(data){

            var course_data=data.data;            
            course_data.forEach(function (element) {
                var option = document.createElement('option');
                option.text = element.name;
                option.value = element.id;
                select.add(option, 1);
                

            });              
        },
        error:function (message){
                   
        }
    
    });
}

