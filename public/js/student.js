
function getStudentSelfStudy(){
    destroyDatatable("#tbl_student_self_study", "#tbl_student_self_study_body");    
    $.ajax({
        url: "/api/student_selfstudy",
        type: 'get',
        data:"",
        success: function(data){
            var student_data=data.data;
            student_data.forEach(function (element) {
                if(element.student_self_study!=null){
                    var student_info=element.student_self_study;
               
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.name_eng + "</td>";
                    tr += "<td>" + element.email + "</td>";
                    tr += "<td>" + element.registration_no+ "</td>";
                    tr += "<td>" + element.phone + "</td>";
                    tr += "<td>" + student_info.registration_reason + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentSelfStudy(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_student_self_study_body").append(tr);  
                }   
                
               
            });
            
            getIndexNumber('#tbl_student_self_study tr');
            createDataTable("#tbl_student_self_study");      
        },
        error:function (message){
            dataMessage(message, "#tbl_student_self_study", "#tbl_student_self_study_body");        
        }
    
    });
}
function showStudentSelfStudy(studentId){
    localStorage.setItem("student_id",studentId);
    location.href="/self_study_edit";
}

function loadStudentSelfStudy(){
    var id=localStorage.getItem("student_id");
    $("#student_name").html("");
    $("#student_nrc").html("");
    $("#student_dob").html("");
    $("#student_father").html("");
    $("#student_email").html("");
    $("#student_phone").html("");
    $("#student_registration_no").html("");
    $("#student_registration_reason").html("");
    $.ajax({
        type: "GET",
        url: "/api/student_selfstudy/"+id,
        success: function (data) {
            var student=data.data;
            student.forEach(function(element){
                var self_study=element.student_self_study;
                $("#student_name").append(element.name_eng+"/"+element.name_mm);
                $("#student_nrc").append(element.nrc);
                $("#student_dob").append(element.date_of_birth);
                $("#student_father").append(element.father_name_eng);
                $("#student_email").append(element.email);
                $("#student_phone").append(element.phone);
                $("#student_registration_no").append(element.registration_no);
                $("#student_registration_reason").append(self_study.registration_reason);
            })
        }
    })
}
function getStudentPrivateSchool(){
    destroyDatatable("#tbl_student_private_school", "#tbl_student_private_school_body");    
    $.ajax({
        url: "/api/student_privateschool",
        type: 'get',
        data:"",
        success: function(data){
            var student_data=data.data;
            student_data.forEach(function (element) {
                if(element.student_private_school!=null){
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.name_eng + "</td>";
                    tr += "<td>" + element.email + "</td>";
                    tr += "<td>" + element.registration_no+ "</td>";
                    tr += "<td>" + element.phone + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentPrivateSchool(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_student_private_school_body").append(tr);  
                }   
                
               
            });
            
            getIndexNumber('#tbl_student_private_school tr');
            createDataTable("#tbl_student_private_school");      
        },
        error:function (message){
            dataMessage(message, "#tbl_student_self_study_private_school", "#tbl_student_private_school_body");        
        }
    
    });
}
function showStudentPrivateSchool(studentId){
    localStorage.setItem("student_id",studentId);
    location.href="/private_school";
}

function loadStudentPrivateSchool(){
    var id=localStorage.getItem("student_id");
    $("#student_name").html("");
    $("#student_nrc").html("");
    $("#student_dob").html("");
    $("#student_father").html("");
    $("#student_email").html("");
    $("#student_phone").html("");
    $("#student_registration_no").html("");
    
    $.ajax({
        type: "GET",
        url: "/api/student_privateschool/"+id,
        success: function (data) {
            var student=data.data;
            student.forEach(function(element){
                $("#student_name").append(element.name_eng+"/"+element.name_mm);
                $("#student_nrc").append(element.nrc);
                $("#student_dob").append(element.date_of_birth);
                $("#student_father").append(element.father_name_eng);
                $("#student_email").append(element.email);
                $("#student_phone").append(element.phone);
                $("#student_registration_no").append(element.registration_no);
                
            })
        }
    })
}
function getStudentMac(){
    destroyDatatable("#tbl_student_mac", "#tbl_student_mac_body");    
    $.ajax({
        url: "/api/student_mac",
        type: 'get',
        data:"",
        success: function(data){
            var student_data=data.data;
            student_data.forEach(function (element) {
                if(element.student_mac!=null){
                    var student_info=element.student_mac;
               
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.name_eng + "</td>";
                    tr += "<td>" + element.email + "</td>";
                    tr += "<td>" + element.registration_no+ "</td>";
                    tr += "<td>" + element.phone + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentMac(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_student_mac_body").append(tr);  
                }   
                
               
            });
            
            getIndexNumber('#tbl_student_mac tr');
            createDataTable("#tbl_student_mac");      
        },
        error:function (message){
            dataMessage(message, "#tbl_student_mac", "#tbl_student_mac_body");        
        }
    
    });
}
function showStudentMac(studentId){
    localStorage.setItem("student_id",studentId);
    location.href="/mac";
}

function loadStudentMac(){
    var id=localStorage.getItem("student_id");
    $("#student_name").html("");
    $("#student_nrc").html("");
    $("#student_dob").html("");
    $("#student_father").html("");
    $("#student_email").html("");
    $("#student_phone").html("");
    $("#student_registration_no").html("");
    
    $.ajax({
        type: "GET",
        url: "/api/student_mac/"+id,
        success: function (data) {
            var student=data.data;
            student.forEach(function(element){
                $("#student_name").append(element.name_eng+"/"+element.name_mm);
                $("#student_nrc").append(element.nrc);
                $("#student_dob").append(element.date_of_birth);
                $("#student_father").append(element.father_name_eng);
                $("#student_email").append(element.email);
                $("#student_phone").append(element.phone);
                $("#student_registration_no").append(element.registration_no);
                
            })
        }
    })
}