
function getStudentSelfStudy(){
    destroyDatatable("#tbl_student_self_study", "#tbl_student_self_study_body");
    destroyDatatable("#da_two_self_study", "#da_two_study_body");    
    $.ajax({
        url: BACKEND_URL+"/student_register",
        type: 'get',
        data:"",
        success: function(data){
            var student_data=data.data;
            student_data.forEach(function (element) {
                if(element.student_register!=null){
                    var student_info = element.student_register;
                    student_info.forEach(function(item){
                        if(item.type == 0 && item.form_type=="da one")
                        {
                            var tr = "<tr>";
                            tr += "<td>" +  + "</td>";
                            tr += "<td>" + element.name_eng + "</td>";
                            tr += "<td>" + element.email + "</td>";
                            tr += "<td>" + element.registration_no+ "</td>";
                            tr += "<td>" + element.phone + "</td>";
                            tr += "<td>" + item.reg_reason + "</td>";
                            tr += "<td>" + item.status + "</td>";
                            tr += "<td ><div class='btn-group'>";
                            tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentSelfStudy(" + element.id + ")'>" +
                                "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                            tr += "</tr>";
                            $("#tbl_student_self_study_body").append(tr); 
                        }else if(item.type == 0 && item.form_type=="da two"){
                            var tr = "<tr>";
                            tr += "<td>" +  + "</td>";
                            tr += "<td>" + element.name_eng + "</td>";
                            tr += "<td>" + element.email + "</td>";
                            tr += "<td>" + element.registration_no+ "</td>";
                            tr += "<td>" + element.phone + "</td>";
                            tr += "<td>" + item.reg_reason + "</td>";
                            tr += "<td>" + item.status + "</td>";
                            tr += "<td ><div class='btn-group'>";
                            tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentSelfStudy(" + element.id + ")'>" +
                                "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                            tr += "</tr>";
                            $("#da_two_self_study_body").append(tr); 
                        } 
                    })
                    
                }  
            });
            
            getIndexNumber('#tbl_student_self_study tr');
            createDataTable("#tbl_student_self_study");
            getIndexNumber('#da_two_self_study tr');
            createDataTable("#da_two_self_study");      
        },
        error:function (message){
            dataMessage(message, "#tbl_student_self_study", "#tbl_student_self_study_body");
            dataMessage(message, "#da_two_self_study", "#da_two_self_study_body");        
        }
    });
}

function showStudentSelfStudy(studentId){
    localStorage.setItem("student_id",studentId);
    location.href= FRONTEND_URL + "/self_study_edit";
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
        url:BACKEND_URL+ "/student_register/"+id,
        success: function (data) {
            var student_data = data.data;
            student_data.forEach(function(element){
                var student_info=element.student_register;
                $("#student_name").append(element.name_eng+"/"+element.name_mm);
                $("#student_nrc").append(element.nrc_state_region+"/"+element.nrc_township+"("+element.nrc_citizen+")"+element.nrc_number);
                $("#student_dob").append(element.date_of_birth);
                $("#student_father").append(element.father_name_eng);
                $("#student_email").append(element.email);
                $("#student_phone").append(element.phone);
                $("#student_registration_no").append(element.registration_no);
                student_info.forEach(function(item){
                   if(item.type==0 && item.form_type=="da one"){
                    $("#student_registration_reason").append(item.reg_reason);
                    $("input[name = student_register_id]").val(item.id);
                   }else if(item.type==0 && item.form_type=="da two"){
                    $("#student_registration_reason").append(item.reg_reason);
                    $("input[name = student_register_id]").val(item.id);
                   }
                })
                
            })
        }
    })
}

function getStudentPrivateSchool(){
    destroyDatatable("#tbl_student_private_school", "#tbl_student_private_school_body");
    destroyDatatable("#da_two_private_school", "#da_two_private_school_body");    
    $.ajax({
        url: BACKEND_URL+"/student_register",
        type: 'get',
        data:"",
        success: function(data){
            var student_data = data.data;
            student_data.forEach(function (element) {
                if(element.student_register!=null){
                    var student_info = element.student_register;
                    student_info.forEach(function(item){
                        if(item.type == 1 && item.form_type=="da one")
                        {
                           var tr = "<tr>";
                           tr += "<td>" +  + "</td>";
                           tr += "<td>" + element.name_eng + "</td>";
                           tr += "<td>" + element.email + "</td>";
                           tr += "<td>" + element.registration_no+ "</td>";
                           tr += "<td>" + element.phone + "</td>";
                           tr += "<td>" + item.status + "</td>";
                           tr += "<td ><div class='btn-group'>";
                           tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentPrivateSchool(" + element.id + ")'>" +
                               "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                           tr += "</tr>";
                           $("#tbl_student_private_school_body").append(tr); 
                        }else if(item.type == 1 && item.form_type=="da two")
                        {
                           var tr = "<tr>";
                           tr += "<td>" +  + "</td>";
                           tr += "<td>" + element.name_eng + "</td>";
                           tr += "<td>" + element.email + "</td>";
                           tr += "<td>" + element.registration_no+ "</td>";
                           tr += "<td>" + element.phone + "</td>";
                           tr += "<td>" + item.status + "</td>";
                           tr += "<td ><div class='btn-group'>";
                           tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentPrivateSchool(" + element.id + ")'>" +
                               "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                           tr += "</tr>";
                           $("#da_two_private_school_body").append(tr); 
                        }      
                    })
                      
                }  
            });
            
            getIndexNumber('#tbl_student_private_school tr');
            createDataTable("#tbl_student_private_school"); 
            getIndexNumber('#da_two_private_school tr');
            createDataTable("#da_two_private_school");      
        },
        error:function (message){
            dataMessage(message, "#tbl_student_private_school", "#tbl_student_private_school_body");
            dataMessage(message, "#da_two_private_school", "#da_two_private_school_body");        
        }
    
    });
}

function showStudentPrivateSchool(studentId){
    localStorage.setItem("student_id",studentId);
    location.href= FRONTEND_URL + "/private_school";
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
                var student_info=element.student_register;
                $("#student_name").append(element.name_eng+"/"+element.name_mm);
                $("#student_nrc").append(element.nrc_state_region+"/"+element.nrc_township+"("+element.nrc_citizen+")"+element.nrc_number);
                $("#student_dob").append(element.date_of_birth);
                $("#student_father").append(element.father_name_eng);
                $("#student_email").append(element.email);
                $("#student_phone").append(element.phone);
                $("#student_registration_no").append(element.registration_no);
                student_info.forEach(function(item){
                    if(item.type==1 && item.form_type=="da one"){
                        $("input[name = student_register_id]").val(item.id);
                    }else if(item.type==1 && item.form_type=="da two"){
                        $("input[name = student_register_id]").val(item.id);
                    }
                })
                
            })
        }
    })
}

function getStudentMac(){
    destroyDatatable("#tbl_student_mac", "#tbl_student_mac_body"); 
    destroyDatatable("#da_two_mac", "#da_two_mac_body");    
    $.ajax({
        url: BACKEND_URL+"/student_register",
        type: 'get',
        data:"",
        success: function(data){
            var student_data=data.data;
            student_data.forEach(function (element) {
                if(element.student_register!=null){
                    var student_info = element.student_register;
                    student_info.forEach(function(item){
                        if(item.type == 2 && item.form_type=="da one")
                        {
                            var tr = "<tr>";
                            tr += "<td>" +  + "</td>";
                            tr += "<td>" + element.name_eng + "</td>";
                            tr += "<td>" + element.email + "</td>";
                            tr += "<td>" + element.registration_no+ "</td>";
                            tr += "<td>" + element.phone + "</td>";
                            tr += "<td>" + item.status + "</td>";
                            tr += "<td ><div class='btn-group'>";
                            tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentMac(" + element.id + ")'>" +
                                "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                            tr += "</tr>";
                            $("#tbl_student_mac_body").append(tr);
                        }else if(item.type == 2 && item.form_type=="da two")
                        {
                            var tr = "<tr>";
                            tr += "<td>" +  + "</td>";
                            tr += "<td>" + element.name_eng + "</td>";
                            tr += "<td>" + element.email + "</td>";
                            tr += "<td>" + element.registration_no+ "</td>";
                            tr += "<td>" + element.phone + "</td>";
                            tr += "<td>" + item.status + "</td>";
                            tr += "<td ><div class='btn-group'>";
                            tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentMac(" + element.id + ")'>" +
                                "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                            tr += "</tr>";
                            $("#da_two_mac_body").append(tr);
                        }      
                    })
                    
                }    
            });
            
            getIndexNumber('#tbl_student_mac tr');
            createDataTable("#tbl_student_mac"); 
            getIndexNumber('#da_two_mac tr');
            createDataTable("#da_two_mac");      
        },
        error:function (message){
            dataMessage(message, "#tbl_student_mac", "#tbl_student_mac_body");
            dataMessage(message, "#da_two_mac", "#da_two_mac_body");        
        }
    });
}

function showStudentMac(studentId){
    localStorage.setItem("student_id",studentId);
    location.href= FRONTEND_URL + "/mac";
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
                var student_info=element.student_register;
                $("#student_name").append(element.name_eng+"/"+element.name_mm);
                $("#student_nrc").append(element.nrc_state_region+"/"+element.nrc_township+"("+element.nrc_citizen+")"+element.nrc_number);
                $("#student_dob").append(element.date_of_birth);
                $("#student_father").append(element.father_name_eng);
                $("#student_email").append(element.email);
                $("#student_phone").append(element.phone);
                $("#student_registration_no").append(element.registration_no);
                student_info.forEach(function(item){
                    if(item.type==2 && item.form_type=="da one"){
                        $("input[name = student_register_id]").val(item.id);
                    }else if(item.type==2 && item.form_type=="da two"){
                        $("input[name = student_register_id]").val(item.id);
                    }
                })
            })
        }
    })
}

function approveStudent(){ 
    var id = $("input[name = student_register_id]").val();
    $.ajax({
        url: BACKEND_URL+"/approve_student/"+id,
        type: 'patch',        
        success: function(result){
            console.log(result.data)
            successMessage("You have approved that student!");  
            if(result.data=="da one"){
                location.href =  FRONTEND_URL + "/index";
            }else{
                location.href =  FRONTEND_URL + "/da_two_index";
            }           
            getStudentSelfStudy();
            getStudentPrivateSchool();
            getStudentMac();
        }
    });
}

function rejectStudent(){ 
    var id = $("input[name = student_register_id]").val();
    console.log(id)
    $.ajax({
        url: BACKEND_URL+"/reject_student/"+id,
        type: 'patch',        
        success: function(result){
            console.log(result)
            successMessage("You have rejected that student!");  
            if(result.data=="da one"){
                location.href =  FRONTEND_URL + "/index";
            }else{
                location.href =  FRONTEND_URL + "/da_two_index";
            }             
            getStudentSelfStudy();
            getStudentPrivateSchool();
            getStudentMac();
        }
    });
}