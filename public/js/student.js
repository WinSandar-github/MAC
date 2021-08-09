
function getStudentSelfStudy(){
    destroyDatatable("#tbl_student_self_study", "#tbl_student_self_study_body");
    destroyDatatable("#da_two_self_study", "#da_two_study_body");   
    destroyDatatable("#tbl_cpa1_student_self_study", "#tbl_cpa1_student_self_study_body");
    destroyDatatable("#tbl_cpa2_student_self_study", "#tbl_cpa2_student_self_study_body"); 
    $.ajax({
        url: BACKEND_URL+"/student_register",
        type: 'get',
        data:"",
        success: function(data){
            var student_data=data.data;
            student_data.forEach(function (element) {
                // console.log('element',element);
                if(element.student_register!=null){
                    var student_info = element.student_register;
                    student_info.forEach(function(item){
                        $.ajax({
                            url:BACKEND_URL+"/course/"+item.form_type,
                            type: 'get',
                            data:"",
                            success:function(courses){
                                console.log('courses',courses);
                                var course=courses.data;
                                console.log('type',item.type);
                                if(item.type == 0 && course[0].code=="da_1")
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
                                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentSelfStudy(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                    tr += "</tr>";
                                    $("#tbl_student_self_study_body").append(tr); 

                                }                                
                                
                                if(item.type == 0 && course[0].code=="da_2"){
                                    
                                    var tr = "<tr>";
                                    tr += "<td>" +  + "</td>";
                                    tr += "<td>" + element.name_eng + "</td>";
                                    tr += "<td>" + element.email + "</td>";
                                    tr += "<td>" + element.registration_no+ "</td>";
                                    tr += "<td>" + element.phone + "</td>";
                                    tr += "<td>" + item.reg_reason + "</td>";
                                    tr += "<td>" + item.status + "</td>";
                                    tr += "<td ><div class='btn-group'>";
                                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentSelfStudy(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                    tr += "</tr>";
                                    $("#da_two_self_study_body").append(tr);                                                     
                                    
                                    
                                } 
                                if(item.type == 0 && course[0].code=="cpa_1")
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
                                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentSelfStudy(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                    tr += "</tr>";
                                    $("#tbl_cpa1_student_self_study_body").append(tr); 

                                }
                                if(item.type == 0 && course[0].code=="cpa_2"){
                                    var tr = "<tr>";
                                    tr += "<td>" +  + "</td>";
                                    tr += "<td>" + element.name_eng + "</td>";
                                    tr += "<td>" + element.email + "</td>";
                                    tr += "<td>" + element.registration_no+ "</td>";
                                    tr += "<td>" + element.phone + "</td>";
                                    tr += "<td>" + item.reg_reason + "</td>";
                                    tr += "<td>" + item.status + "</td>";
                                    tr += "<td ><div class='btn-group'>";
                                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentSelfStudy(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                    tr += "</tr>";
                                    $("#tbl_cpa2_student_self_study_body").append(tr);                                                     
                                    
                                } 
                                 
                                getIndexNumber('#tbl_student_self_study tr');                                  
                                createDataTable(".tbl_student_self_study");                                                     
                                getIndexNumber('#da_two_self_study tr');
                                getIndexNumber('#tbl_cpa1_student_self_study tr');
                                getIndexNumber('#tbl_cpa2_student_self_study tr');    
                                createDataTable(".da_two_self_study");
                                createDataTable(".tbl_cpa1_student_self_study");
                                createDataTable(".tbl_cpa2_student_self_study");
                            }
                            
                        });                                   
                        
                    }); 
                }  
            }); 
             
        },
        error:function (message){
            dataMessage(message, "#tbl_student_self_study", "#tbl_student_self_study_body");
            dataMessage(message, "#da_two_self_study", "#da_two_self_study_body");  
            dataMessage(message, "#tbl_cpa1_student_self_study", "#tbl_cpa1_student_self_study_body");
            dataMessage(message, "#tbl_cpa2_student_self_study", "#tbl_cpa2_student_self_study_body");      
        }
    });
}

function showStudentSelfStudy(studentId,course_code){
    localStorage.setItem("student_id",studentId);
    localStorage.setItem("course_code",course_code);
    console.log(course_code);
    location.href= FRONTEND_URL + "/self_study_edit";
}

function loadStudentSelfStudy(){
    var id=localStorage.getItem("student_id");
    var course_code=localStorage.getItem("course_code");
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
                   if(item.type==0 && course_code=="da_1"){
                    $("#student_registration_reason").append(item.reg_reason);
                    $("input[name = student_register_id]").val(item.id);
                   }
                   if(item.type==0 && course_code=="da_2"){
                    $("#student_registration_reason").append(item.reg_reason);
                    $("input[name = student_register_id]").val(item.id);
                   }
                   if(item.type==0 && course_code=="cpa_1"){
                    $("#student_registration_reason").append(item.reg_reason);
                    $("input[name = student_register_id]").val(item.id);
                   }
                   if(item.type==0 && course_code=="cpa_2"){
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
    destroyDatatable("#tbl_cpa1_student_private_school", "#tbl_cpa1_student_private_school_body");
    destroyDatatable("#tbl_cpa2_student_private_school", "#tbl_cpa2_student_private_school_body");
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
                        $.ajax({
                            url: BACKEND_URL+"/course/"+item.form_type,
                            type: 'get',
                            data:"",
                            success:function(courses){
                                var course =courses.data;
                                console.log(item.type,course[0].code);
                                if(item.type == 1 && course[0].code=="da_1")
                                {
                                var tr = "<tr>";
                                tr += "<td>" +  + "</td>";
                                tr += "<td>" + element.name_eng + "</td>";
                                tr += "<td>" + element.email + "</td>";
                                tr += "<td>" + element.registration_no+ "</td>";
                                tr += "<td>" + element.phone + "</td>";
                                tr += "<td>" + item.status + "</td>";
                                tr += "<td ><div class='btn-group'>";
                                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentPrivateSchool(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                tr += "</tr>";
                                $("#tbl_student_private_school_body").append(tr); 

                                
                                }
                                if(item.type == 1 && course[0].code=="da_2")
                                {
                                var tr = "<tr>";
                                tr += "<td>" +  + "</td>";
                                tr += "<td>" + element.name_eng + "</td>";
                                tr += "<td>" + element.email + "</td>";
                                tr += "<td>" + element.registration_no+ "</td>";
                                tr += "<td>" + element.phone + "</td>";
                                tr += "<td>" + item.status + "</td>";
                                tr += "<td ><div class='btn-group'>";
                                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentPrivateSchool(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                tr += "</tr>";
                                $("#da_two_private_school_body").append(tr); 
                                
                                } 
                                if(item.type == 1 && course[0].code=="cpa_1")
                                {
                                   
                                var tr = "<tr>";
                                tr += "<td>" +  + "</td>";
                                tr += "<td>" + element.name_eng + "</td>";
                                tr += "<td>" + element.email + "</td>";
                                tr += "<td>" + element.registration_no+ "</td>";
                                tr += "<td>" + element.phone + "</td>";
                                tr += "<td>" + item.status + "</td>";
                                tr += "<td ><div class='btn-group'>";
                                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentPrivateSchool(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                tr += "</tr>";
                                $("#tbl_cpa1_student_private_school_body").append(tr); 

                                
                                }
                                if(item.type == 1 && course[0].code=="cpa_2")
                                {
                                console.log(element,"Cpa Two")
                                var tr = "<tr>";
                                tr += "<td>" +  + "</td>";
                                tr += "<td>" + element.name_eng + "</td>";
                                tr += "<td>" + element.email + "</td>";
                                tr += "<td>" + element.registration_no+ "</td>";
                                tr += "<td>" + element.phone + "</td>";
                                tr += "<td>" + item.status + "</td>";
                                tr += "<td ><div class='btn-group'>";
                                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentPrivateSchool(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                    "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                tr += "</tr>";
                                $("#tbl_cpa2_student_private_school_body").append(tr); 

                                
                                }
                                
                                getIndexNumber('#tbl_student_private_school tr');
                                createDataTable(".tbl_student_private_school");
                                getIndexNumber('#da_two_private_school tr');
                                createDataTable(".da_two_private_school"); 
                                getIndexNumber('#tbl_cpa1_student_private_school tr');
                                createDataTable(".tbl_cpa1_student_private_school");
                                getIndexNumber('#tbl_cpa2_student_private_school tr');
                                createDataTable(".tbl_cpa2_student_private_school");
                            }
                        })
                             
                    })
                      
                }  
            });
                  
        },
        error:function (message){
            dataMessage(message, "#tbl_student_private_school", "#tbl_student_private_school_body");
            dataMessage(message, "#da_two_private_school", "#da_two_private_school_body");
            dataMessage(message, "#tbl_cpa1_student_private_school", "#tbl_cpa1_student_private_school_body");
            dataMessage(message, "#tbl_cpa2_student_private_school", "#tbl_cpa2_student_private_school_body");        
        }
    
    });
}

function showStudentPrivateSchool(studentId,course_code){
    localStorage.setItem("student_id",studentId);
    localStorage.setItem("course_code",course_code);
    location.href= FRONTEND_URL + "/private_school";
}

function loadStudentPrivateSchool(){
    var id=localStorage.getItem("student_id");
    var course_code=localStorage.getItem("course_code");
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
                    if(item.type==1 && course_code=="da_1"){
                        $("input[name = student_register_id]").val(item.id);
                    }
                    if(item.type==1 && course_code=="da_2"){
                        $("input[name = student_register_id]").val(item.id);
                    }
                    if(item.type==1 && course_code=="cpa_1"){
                        $("input[name = student_register_id]").val(item.id);
                    }
                    if(item.type==1 && course_code=="cpa_2"){
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
    destroyDatatable("#tbl_cpa1_student_mac", "#tbl_cpa1_student_mac_body"); 
    destroyDatatable("#tbl_cpa2_student_mac", "#tbl_cpa2_student_mac_body");  
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
                        $.ajax({
                            url: BACKEND_URL+"/course/"+item.form_type,
                            type: 'get',
                            data:"",
                            success:function(courses){
                                var course=courses.data;
                                if(item.type == 2 && course[0].code=="da_1")
                                {
                                    var tr = "<tr>";
                                    tr += "<td>" +  + "</td>";
                                    tr += "<td>" + element.name_eng + "</td>";
                                    tr += "<td>" + element.email + "</td>";
                                    tr += "<td>" + element.registration_no+ "</td>";
                                    tr += "<td>" + element.phone + "</td>";
                                    tr += "<td>" + item.status + "</td>";
                                    tr += "<td ><div class='btn-group'>";
                                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentMac(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                    tr += "</tr>";
                                    $("#tbl_student_mac_body").append(tr);

                                }
                                if(item.type == 2 && course[0].code=="da_2")
                                {
                                    var tr = "<tr>";
                                    tr += "<td>" +  + "</td>";
                                    tr += "<td>" + element.name_eng + "</td>";
                                    tr += "<td>" + element.email + "</td>";
                                    tr += "<td>" + element.registration_no+ "</td>";
                                    tr += "<td>" + element.phone + "</td>";
                                    tr += "<td>" + item.status + "</td>";
                                    tr += "<td ><div class='btn-group'>";
                                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentMac(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                    tr += "</tr>";
                                    $("#da_two_mac_body").append(tr);
                                }      
                                if(item.type == 2 && course[0].code=="cpa_1")
                                {
                                    var tr = "<tr>";
                                    tr += "<td>" +  + "</td>";
                                    tr += "<td>" + element.name_eng + "</td>";
                                    tr += "<td>" + element.email + "</td>";
                                    tr += "<td>" + element.registration_no+ "</td>";
                                    tr += "<td>" + element.phone + "</td>";
                                    tr += "<td>" + item.status + "</td>";
                                    tr += "<td ><div class='btn-group'>";
                                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentMac(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                    tr += "</tr>";
                                    $("#tbl_cpa1_student_mac_body").append(tr);

                                    
                                }
                                
                                if(item.type == 2 && course[0].code=="cpa_2")
                                {
                                    var tr = "<tr>";
                                    tr += "<td>" +  + "</td>";
                                    tr += "<td>" + element.name_eng + "</td>";
                                    tr += "<td>" + element.email + "</td>";
                                    tr += "<td>" + element.registration_no+ "</td>";
                                    tr += "<td>" + element.phone + "</td>";
                                    tr += "<td>" + item.status + "</td>";
                                    tr += "<td ><div class='btn-group'>";
                                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showStudentMac(" + element.id +','+ "\""+course[0].code+"\"" + ")'>" +
                                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                                    tr += "</tr>";
                                    $("#tbl_cpa2_student_mac_body").append(tr);

                                }
                                
                                    
                                getIndexNumber('#tbl_student_mac tr');
                                createDataTable(".tbl_student_mac"); 
                                getIndexNumber('#da_two_mac tr');
                                createDataTable(".da_two_mac"); 
                                getIndexNumber('#tbl_cpa1_student_mac tr');
                                createDataTable(".tbl_cpa1_student_mac");                                     
                                getIndexNumber('#tbl_cpa2_student_mac tr');
                                createDataTable(".tbl_cpa2_student_mac"); 
                            }
                        })
                        
                    })
                    
                }    
            });
            
                 
        },
        error:function (message){
            dataMessage(message, "#tbl_student_mac", "#tbl_student_mac_body");
            dataMessage(message, "#da_two_mac", "#da_two_mac_body");        
            dataMessage(message, "#tbl_cpa1_student_mac", "#tbl_cpa1_student_mac_body");
            dataMessage(message, "#tbl_cpa2_student_mac", "#tbl_cpa2_student_mac_body");
        }
    });
}

function showStudentMac(studentId,course_code){
    localStorage.setItem("student_id",studentId);
    localStorage.setItem("course_code",course_code);
    location.href= FRONTEND_URL + "/mac";
}

function loadStudentMac(){
    var id=localStorage.getItem("student_id");
    var course_code=localStorage.getItem("course_code");
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
                    if(item.type==2 && course_code=="da_1"){
                        $("input[name = student_register_id]").val(item.id);
                    }
                    if(item.type==2 && course_code=="da_2"){
                        $("input[name = student_register_id]").val(item.id);
                    }
                    if(item.type==2 && course_code=="cpa_1"){
                        $("input[name = student_register_id]").val(item.id);
                    }
                    if(item.type==2 && course_code=="cpa_2"){
                        $("input[name = student_register_id]").val(item.id);
                    }
                })
            })
        }
    })
}

function approveStudent(){ 

    var id = $("input[name = student_register_id]").val();
    
    var course_code=localStorage.getItem("course_code");
    console.log(id);
    $.ajax({
        url: BACKEND_URL+"/approve_student/"+id,
        type: 'patch',        
        success: function(result){
            console.log(result.data)
            successMessage("You have approved that student!");  
            if(course_code=="da_1"){
                location.href =  FRONTEND_URL + "/index";
            }else if(course_code=="da_2"){
                location.href =  FRONTEND_URL + "/da_two_index";
            }   
            else if(course_code=="cpa_1"){
                location.href =  FRONTEND_URL + "/cpa_one_index";
            }
            else{
                location.href =  FRONTEND_URL + "/cpa_two_index";
            }        
            getStudentSelfStudy();
            getStudentPrivateSchool();
            getStudentMac();
        },
        error:function(e){
             console.log(e);
        }
    });
}

function rejectStudent(){ 
    var id = $("input[name = student_register_id]").val();
    var course_code=localStorage.getItem("course_code");
    console.log(id)
    $.ajax({
        url: BACKEND_URL+"/reject_student/"+id,
        type: 'patch',        
        success: function(result){
            console.log(result)
            successMessage("You have rejected that student!");  
            if(course_code=="da_1"){
                location.href =  FRONTEND_URL + "/index";
            }
            else if(course_code=="da_2"){
                location.href =  FRONTEND_URL + "/da_two_index";
            }           
            else if(course_code=="cpa_1"){
                location.href =  FRONTEND_URL + "/cpa_one_index";
            }
            else{
                location.href =  FRONTEND_URL + "/cpa_two_index";
            }
            getStudentSelfStudy();
            getStudentPrivateSchool();
            getStudentMac();
        }
    });
}