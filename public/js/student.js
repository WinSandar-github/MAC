
function getStudentSelfStudy(){
    destroyDatatable("#tbl_student_self_study", "#tbl_student_self_study_body");    
    $.ajax({
        url: BACKEND_URL+"/student_register",
        type: 'get',
        data:"",
        success: function(data){
            var student_data=data.data;
            student_data.forEach(function (element) {
                if(element.student_register!=null){
                    var student_info = element.student_register;
                    if(student_info.type == 0)
                    {
                        var tr = "<tr>";
                        tr += "<td>" +  + "</td>";
                        tr += "<td>" + element.name_eng + "</td>";
                        tr += "<td>" + element.email + "</td>";
                        tr += "<td>" + element.registration_no+ "</td>";
                        tr += "<td>" + element.phone + "</td>";
                        tr += "<td>" + element.student_register.reg_reason + "</td>";
                        tr += "<td>" + element.student_register.status + "</td>";
                        tr += "<td ><div class='btn-group'>";
                        tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentSelfStudy(" + element.id + ")'>" +
                            "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                        tr += "</tr>";
                        $("#tbl_student_self_study_body").append(tr); 
                    } 
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

    $("input[name = student_id]").val(id);
    $.ajax({
        type: "GET",
        url:BACKEND_URL+ "/student_register/"+id,
        success: function (data) {
            var student_data = data.data;
            student_data.forEach(function(element){
                var student_info=element.student_register;
                $("#student_name").append(element.name_eng+"/"+element.name_mm);
                $("#student_nrc").append(element.nrc);
                $("#student_dob").append(element.date_of_birth);
                $("#student_father").append(element.father_name_eng);
                $("#student_email").append(element.email);
                $("#student_phone").append(element.phone);
                $("#student_registration_no").append(element.registration_no);
                $("#student_registration_reason").append(element.student_register.reg_reason);
            })
        }
    })
}

function getStudentPrivateSchool(){
    destroyDatatable("#tbl_student_private_school", "#tbl_student_private_school_body");    
    $.ajax({
        url: BACKEND_URL+"/student_register",
        type: 'get',
        data:"",
        success: function(data){
            var student_data = data.data;
            student_data.forEach(function (element) {
                if(element.student_register!=null){
                    var student_info = element.student_register;
                    if(student_info.type == 1)
                    {
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
        url: BACKEND_URL+"/student_register/"+id,
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
        url: BACKEND_URL+"/student_register",
        type: 'get',
        data:"",
        success: function(data){
            var student_data=data.data;
            student_data.forEach(function (element) {
                if(element.student_register!=null){
                    var student_info = element.student_register;
                    if(student_info.type == 2)
                    {
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
        url: BACKEND_URL+"/student_register/"+id,
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

function approveStudent(){ 
    var id = $("input[name = student_id]").val();
    $.ajax({
        url: "/api/approve_student/"+id,
        type: 'PATCH',        
        success: function(result){
            console.log(result)
            successMessage("You have approved that student!");  
            location.href = "/index";           
            getStudentSelfStudy();
        }
    });
}

function rejectStudent(){ 
    var id = $("input[name = student_id]").val();
    console.log(id)
    $.ajax({
        url: "/api/reject_student/"+id,
        type: 'patch',        
        success: function(result){
            console.log(result)
            successMessage("You have rejected that student!");  
            location.href = "/index";          
            getStudentSelfStudy();
        }
    });
}