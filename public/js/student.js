function selectedRegistration(){
    var radioValue = $("input[name='register_name']:checked").val();
    if(radioValue==1){
        $('#self_study_container').css('display','block');
        $('#private_school_container').css('display','none');
        $('#mac_container').css('display','none');
    }else if(radioValue==2){
        $('#private_school_container').css('display','block');
        $('#self_study_container').css('display','none');
        $('#mac_container').css('display','none');
    }else{
        $('#self_study_container').css('display','none');
        $('#private_school_container').css('display','none');
        $('#mac_container').css('display','block');
    }
}
function getStudent(){
    destroyDatatable("#tbl_student", "#tbl_student_body");    
    $.ajax({
        url: "/student_self_study",
        type: 'get',
        data:"",
        success: function(data){
            var student_data=data.data;
            student_data.forEach(function (element) {   
                var student_info=element.student_info;
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + student_info.name_eng + "</td>";
                    tr += "<td>" + student_info.email + "</td>";
                    tr += "<td>" + student_info.registration_no+ "</td>";
                    tr += "<td>" + student_info.phone + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentInfo(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_student_body").append(tr);  
               
            });
            
            getIndexNumber('#tbl_student tr');
            createDataTable("#tbl_student");      
        },
        error:function (message){
            dataMessage(message, "#tbl_student", "#tbl_student_body");        
        }
    
    });
}