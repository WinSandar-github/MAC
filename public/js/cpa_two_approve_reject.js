function getCPATwoSelfStudyStudent(){
    destroyDatatable("#tbl_cpa_two_self_study", "#tbl_cpa_two_self_study_body");    
    $.ajax({
        url: BACKEND_URL+"/cpa_two_registration",
        type: 'get',
        data:"",
        success: function(data){
            var cpa_two_student_data=data.data;
            cpa_two_student_data.forEach(function (element) {
            // console.log('cpa_two_student_data',element);

                var nrc_no     =   element.cpa_one.nrc_state_region+"/";
                    nrc_no    +=   element.cpa_one.nrc_township;
                    nrc_no    +=   "("+ element.cpa_one.nrc_citizen+")";
                    nrc_no    +=   element.cpa_one.nrc_number;
                
                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }

                if(element.cpa_two_type == 1)
                {
                    // console.log('cpatwo_selfstudy_data',element);
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.cpa_one.name_en + "</td>";                            
                    tr += "<td>" + nrc_no+ "</td>";                    
                    tr += "<td>" + element.cpa_one.academic_year + "</td>";
                    tr += "<td>" + element.cpa_one.phone + "</td>";
                    tr += "<td>" + status+ "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showCPATwoSelfStudyStudent(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_cpa_two_self_study_body").append(tr); 
                }
                                       
                 
            });
            getIndexNumber('#tbl_cpa_two_self_study tr');
            createDataTable("#tbl_cpa_two_self_study");      
        },
        error:function (message){
            dataMessage(message, "#tbl_cpa_two_self_study", "#tbl_cpa_two_self_study_body");        
        }
    });
}

function showCPATwoSelfStudyStudent(studentID){
    localStorage.setItem("cpa_two_selfstudy_student_id",studentID);
    // console.log('cpa_two_selfstudy_student_id',studentID);
    location.href=FRONTEND_URL+"/cpa_two_selfstudy_edit";
}

function loadCPATwoSelfStudyStudentData(){
    var id=localStorage.getItem("cpa_two_selfstudy_student_id");
    // console.log('cpa_two_selfstudy_student_id',id);
    $("#name_en").html("");
    $("#name_mm").html("");
    $("#nrc_no").html("");
    $("#father_name_en").html("");
    $("#father_name_mm").html("");
    $("#race").html("");
    $("#religion").html("");
    $("#birth_date").html("");
    $("#address").html("");
    $("#current_address").html("");
    $("#phone").html("");
    $("#email").html("");
    $("#civil_servant").html("");    
    
    $("#education").html("");
    $("#position").html("");
    $("#department").html("");
    $("#office_area").html("");

    $("#photo").html("");
    // $("#direct_access_no").html("");
    // $("#entry_success_no").html("");
    $("#enrol_no_exam").html("");
    $("#attendance").html("");
    $("#fail_exam").html("");
    $("#resigned").html("");
    $("#module_id").html("");
    $("#batch_session_no").html("");
    $("#entrance_part").html("");
    $("#entrance_exam_no").html("");
    $("#status").html("");
    $("#academic_year").html("");   

    $("input[name = cpa_two_student_id]").val(id);
    // console.log('id',id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/cpa_two_registration/"+id,
        success: function (data) {
            var cpa_two_student_data=data;
            // console.log('data',cpa_two_student_data);
            cpa_two_student_data.forEach(function(element){
                // console.log('cpa_two_student_data',element);

                var nrc_no     =   element.cpa_one.nrc_state_region+"/";
                    nrc_no    +=   element.cpa_one.nrc_township;
                    nrc_no    +=   "("+ element.cpa_one.nrc_citizen+")";
                    nrc_no    +=   element.cpa_one.nrc_number;
                
                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }  

                if(element.enrol_no_exam==0){
                    enrol_no_exam="No";
                }else{
                    enrol_no_exam="Yes";
                }
                
                if(element.attendance==0){
                    attendance="No";
                }else{
                    attendance="Yes";
                }

                if(element.fail_exam==0){
                    fail_exam="No";
                }else{
                    fail_exam="Yes";
                }

                if(element.resigned==0){
                    resigned="No";
                }else{
                    resigned="Yes";
                }

                if(element.cpa_one.module_id==1){
                    module_id="Module - 1";
                }else if(element.cpa_one.module_id==2){
                    module_id="Module - 2";
                }
                else if(element.cpa_one.module_id==3){
                    module_id="All Module";
                }else {
                    module_id = "-";
                }

                if(element.cpa_one.civil_servant==0){
                    civil_servant="No Civil Servant";
                }
                else{
                    civil_servant="Civil Servant";
                }

                $("#name_en").append(element.cpa_one.name_en);
                $("#name_mm").append(element.cpa_one.name_mm);
                $("#nrc_no").append(nrc_no);
                $("#father_name_en").append(element.cpa_one.father_name_en);
                $("#father_name_mm").append(element.cpa_one.father_name_mm);
                $("#race").append(element.cpa_one.race);
                $("#religion").append(element.cpa_one.religion);
                $("#birth_date").append(element.cpa_one.birth_date);
                $("#address").append(element.cpa_one.address);
                $("#current_address").append(element.cpa_one.current_address);
                $("#phone").append(element.cpa_one.phone);
                $("#email").append(element.cpa_one.email);
                $("#civil_servant").append(civil_servant);

                $("#education").append(element.cpa_one.education);
                $("#position").append(element.cpa_one.position);
                $("#department").append(element.cpa_one.department);
                $("#office_area").append(element.cpa_one.office_area);

                document.getElementById('photo').src=PDF_URL+element.cpa_one.photo;
                $("#photo").append(element.cpa_one.photo);
                // $("#direct_access_no").append(element.cpa_one.direct_access_no);
                // $("#entry_success_no").append(element.cpa_one.entry_success_no);
                $("#enrol_no_exam").append(enrol_no_exam);
                $("#attendance").append(attendance);
                $("#fail_exam").append(fail_exam);
                $("#resigned").append(resigned);
                $("#module_id").append(module_id);
                $("#batch_session_no").append(element.batch_session_no);
                $("#entrance_part").append(element.entrance_part);
                $("#entrance_exam_no").append(element.entrance_exam_no);
                $("#status").append(status);
                $("#academic_year").append(element.cpa_one.academic_year);  

                $("#cpa_two_student_id").append(element.id);                
            })
        }
    })
}

function getCPATwoPrivateSchoolStudent(){
    destroyDatatable("#tbl_cpa_two_private_school", "#tbl_cpa_two_private_school_body");    
    $.ajax({
        url: BACKEND_URL+"/cpa_two_registration",
        type: 'get',
        data:"",
        success: function(data){
            var cpa_two_student_data=data.data;
            cpa_two_student_data.forEach(function (element) {

                var nrc_no     =   element.cpa_one.nrc_state_region+"/";
                    nrc_no    +=   element.cpa_one.nrc_township;
                    nrc_no    +=   "("+ element.cpa_one.nrc_citizen+")";
                    nrc_no    +=   element.cpa_one.nrc_number;
                
                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }

                if(element.cpa_two_type == 0)
                {
                    // console.log('cpatwo_privatschool_data',element);
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.cpa_one.name_en + "</td>";                            
                    tr += "<td>" + nrc_no+ "</td>";                    
                    tr += "<td>" + element.cpa_one.academic_year + "</td>";
                    tr += "<td>" + element.cpa_one.phone + "</td>";
                    tr += "<td>" + status+ "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showCPATwoPrivateSchoolStudent(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_cpa_two_private_school").append(tr); 
                }
                                       
                 
            });
            getIndexNumber('#tbl_cpa_two_private_school tr');
            createDataTable("#tbl_cpa_two_private_school");      
        },
        error:function (message){
            dataMessage(message, "#tbl_cpa_two_private_school", "#tbl_cpa_two_private_school_body");        
        }
    });
}

function showCPATwoPrivateSchoolStudent(studentID){
    localStorage.setItem("cpa_two_private_student_id",studentID);
    // console.log('cpa_two_private_student_id',studentID);
    location.href=FRONTEND_URL+"/cpa_two_privateschool_edit";
}

function loadCPATwoPrivateSchoolStudentData(){
    var id=localStorage.getItem("cpa_two_private_student_id");
    // console.log('cpa_two_private_student_id',id);
    $("#name_en").html("");
    $("#name_mm").html("");
    $("#nrc_no").html("");
    $("#father_name_en").html("");
    $("#father_name_mm").html("");
    $("#race").html("");
    $("#religion").html("");
    $("#birth_date").html("");
    $("#address").html("");
    $("#current_address").html("");
    $("#phone").html("");
    $("#email").html("");
    $("#civil_servant").html("");    
    
    $("#education").html("");
    $("#position").html("");
    $("#department").html("");
    $("#office_area").html("");

    $("#photo").html("");
    // $("#direct_access_no").html("");
    // $("#entry_success_no").html("");
    // $("#enrol_no_exam").html("");
    // $("#attendance").html("");
    // $("#fail_exam").html("");
    // $("#resigned").html("");    
    $("#cpa_one_pass_date").html("");
    $("#cpa_one_access_no").html("");
    $("#cpa_one_success_no").html("");
    $("#module_id").html("");
    // $("#batch_session_no").html("");
    // $("#entrance_part").html("");
    // $("#entrance_exam_no").html("");
    $("#status").html("");
    $("#academic_year").html("");   
    $("#private_school_name").html("");

    $("input[name = cpa_two_student_id]").val(id);
    // console.log('id',id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/cpa_two_registration/"+id,
        success: function (data) {
            var cpa_two_student_data=data;
            // console.log('data',cpa_one_student_data);
            cpa_two_student_data.forEach(function(element){
                // console.log('cpa_two_student_data',element);

                var nrc_no     =   element.cpa_one.nrc_state_region+"/";
                    nrc_no    +=   element.cpa_one.nrc_township;
                    nrc_no    +=   "("+ element.cpa_one.nrc_citizen+")";
                    nrc_no    +=   element.cpa_one.nrc_number;
                
                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }  

                // if(element.enrol_no_exam==0){
                //     enrol_no_exam="No";
                // }else{
                //     enrol_no_exam="Yes";
                // }
                
                // if(element.attendance==0){
                //     attendance="No";
                // }else{
                //     attendance="Yes";
                // }

                // if(element.fail_exam==0){
                //     fail_exam="No";
                // }else{
                //     fail_exam="Yes";
                // }

                // if(element.resigned==0){
                //     resigned="No";
                // }else{
                //     resigned="Yes";
                // }

                if(element.cpa_one.module_id==1){
                    module_id="Module - 1";
                }else if(element.cpa_one.module_id==2){
                    module_id="Module - 2";
                }
                else if(element.cpa_one.module_id==3){
                    module_id="All Module";
                }else {
                    module_id= "-";
                }

                if(element.cpa_one.civil_servant==0){
                    civil_servant="No Civil Servant";
                }
                else{
                    civil_servant="Civil Servant";
                }

                $("#name_en").append(element.cpa_one.name_en);
                $("#name_mm").append(element.cpa_one.name_mm);
                $("#nrc_no").append(nrc_no);
                $("#father_name_en").append(element.cpa_one.father_name_en);
                $("#father_name_mm").append(element.cpa_one.father_name_mm);
                $("#race").append(element.cpa_one.race);
                $("#religion").append(element.cpa_one.religion);
                $("#birth_date").append(element.cpa_one.birth_date);
                $("#address").append(element.cpa_one.address);
                $("#current_address").append(element.cpa_one.current_address);
                $("#phone").append(element.cpa_one.phone);
                $("#email").append(element.cpa_one.email);
                $("#civil_servant").append(civil_servant);

                $("#education").append(element.cpa_one.education);
                $("#position").append(element.cpa_one.position);
                $("#department").append(element.cpa_one.department);
                $("#office_area").append(element.cpa_one.office_area);

                document.getElementById('photo').src=PDF_URL+element.cpa_one.photo;
                $("#photo").append(element.cpa_one.phto);
                // $("#direct_access_no").append(element.direct_access_no);
                // $("#entry_success_no").append(element.entry_success_no);
                // $("#enrol_no_exam").append(enrol_no_exam);
                // $("#attendance").append(attendance);
                // $("#fail_exam").append(fail_exam);
                // $("#resigned").append(resigned);
                $("#cpa_one_pass_date").append(element.cpa_one_pass_date);
                $("#cpa_one_access_no").append(element.cpa_one_access_no);
                $("#cpa_one_success_no").append(element.cpa_one_success_no);
                $("#module_id").append(module_id);                
                // $("#batch_session_no").append(element.batch_session_no);
                // $("#entrance_part").append(element.entrance_part);
                // $("#entrance_exam_no").append(element.entrance_exam_no);
                $("#status").append(status);
                $("#academic_year").append(element.cpa_one.academic_year);
                $("#private_school_name").append(element.cpa_one.private_school_name);  

                $("#cpa_two_student_id").append(element.id);
                
            })
        }
    })
}

function getCPATwoMACStudent(){
    destroyDatatable("#tbl_cpa_two_mac", "#tbl_cpa_two_mac_body");    
    $.ajax({
        url: BACKEND_URL+"/cpa_two_registration",
        type: 'get',
        data:"",
        success: function(data){
            var cpa_two_student_data=data.data;
            cpa_two_student_data.forEach(function (element) {
                // console.log('cpaonedata',element);
                var nrc_no     =   element.cpa_one.nrc_state_region+"/";
                    nrc_no    +=   element.cpa_one.nrc_township;
                    nrc_no    +=   "("+ element.cpa_one.nrc_citizen+")";
                    nrc_no    +=   element.cpa_one.nrc_number;
                
                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }

                if(element.cpa_two_type == 2)
                {
                    console.log('cpatwo_mac_data',element);
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.cpa_one.name_en + "</td>";                            
                    tr += "<td>" + nrc_no+ "</td>";                    
                    tr += "<td>" + element.cpa_one.academic_year + "</td>";
                    tr += "<td>" + element.cpa_one.phone + "</td>";
                    tr += "<td>" + status+ "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showCPATwoMACStudent(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_cpa_two_mac_body").append(tr); 
                }
                                       
                 
            });
            getIndexNumber('#tbl_cpa_two_mac tr');
            createDataTable("#tbl_cpa_two_mac");      
        },
        error:function (message){
            dataMessage(message, "#tbl_cpa_two_mac", "#tbl_cpa_two_mac_body");        
        }
    });
}

function showCPATwoMACStudent(studentID){
    localStorage.setItem("cpa_two_mac_student_id",studentID);
    console.log('cpa_two_mac_student_id',studentID);
    location.href=FRONTEND_URL+"/cpa_two_mac_edit";
}

function loadCPATwoMACStudentData(){
    var id=localStorage.getItem("cpa_two_mac_student_id");
    console.log('cpa_two_mac_student_id',id);
    $("#name_en").html("");
    $("#name_mm").html("");
    $("#nrc_no").html("");
    $("#father_name_en").html("");
    $("#father_name_mm").html("");
    $("#race").html("");
    $("#religion").html("");
    $("#birth_date").html("");
    $("#address").html("");
    $("#current_address").html("");
    $("#phone").html("");
    $("#email").html("");
    $("#civil_servant").html("");    
    
    $("#education").html("");
    $("#position").html("");
    $("#department").html("");
    $("#office_area").html("");

    $("#photo").html("");
    // $("#direct_access_no").html("");
    // $("#entry_success_no").html("");
    // $("#gov_department").html("");
    // $("#personal_acc_training").html("");
    // $("#after_second_exam").html("");
    // $("#good_morale_file").html("");
    // $("#no_crime_file").html("");
    $("#cpa_one_pass_date").html("");
    $("#cpa_one_access_no").html("");
    $("#cpa_one_success_no").html("");
    $("#module_id").html("");
    
    // $("#entrance_part").html("");
    // $("#entrance_exam_no").html("");
    $("#status").html("");
    $("#academic_year").html("");   

    $("input[name = cpa_two_student_id]").val(id);
    // console.log('id',id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/cpa_two_registration/"+id,
        success: function (data) {
            var cpa_two_student_data=data;
            // console.log('data',cpa_two_student_data);
            cpa_two_student_data.forEach(function(element){
                console.log('cpa_two_student_data',element);

                var nrc_no     =   element.cpa_one.nrc_state_region+"/";
                    nrc_no    +=   element.cpa_one.nrc_township;
                    nrc_no    +=   "("+ element.cpa_one.nrc_citizen+")";
                    nrc_no    +=   element.cpa_one.nrc_number;
                
                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }  

                // if(element.gov_department==0){
                //     gov_department="No";
                // }else{
                //     gov_department="Yes";
                // }
                
                // if(element.personal_acc_training==0){
                //     personal_acc_training="No";
                // }else{
                //     personal_acc_training="Yes";
                // }

                // if(element.after_second_exam==0){
                //     after_second_exam="No";
                // }else{
                //     after_second_exam="Yes";
                // }

                // if(element.resigned==0){
                //     resigned="No";
                // }else{
                //     resigned="Yes";
                // }

                if(element.cpa_one.module_id==1){
                    module_id="Module - 1";
                }else if(element.cpa_one.module_id==2){
                    module_id="Module - 2";
                }
                else if(element.cpa_one.module_id==3){
                    module_id="All Module";
                }else {
                    module_id= "-";
                }

                if(element.cpa_one.civil_servant==0){
                    civil_servant="No Civil Servant";
                }
                else{
                    civil_servant="Civil Servant";
                }

                $("#name_en").append(element.cpa_one.name_en);
                $("#name_mm").append(element.cpa_one.name_mm);
                $("#nrc_no").append(nrc_no);
                $("#father_name_en").append(element.cpa_one.father_name_en);
                $("#father_name_mm").append(element.cpa_one.father_name_mm);
                $("#race").append(element.cpa_one.race);
                $("#religion").append(element.cpa_one.religion);
                $("#birth_date").append(element.birth_date);
                $("#address").append(element.cpa_one.address);
                $("#current_address").append(element.cpa_one.current_address);
                $("#phone").append(element.cpa_one.phone);
                $("#email").append(element.cpa_one.email);
                $("#civil_servant").append(civil_servant);

                $("#education").append(element.cpa_one.education);
                $("#position").append(element.cpa_one.position);
                $("#department").append(element.cpa_one.department);
                $("#office_area").append(element.cpa_one.office_area);

                document.getElementById('photo').src=PDF_URL+element.cpa_one.photo;
                $("#photo").append(element.cpa_one.phto);
                // $("#direct_access_no").append(element.direct_access_no);
                // $("#entry_success_no").append(element.entry_success_no);
                // $("#gov_department").append(gov_department);
                // $("#personal_acc_training").append(personal_acc_training);
                // $("#after_second_exam").append(after_second_exam);
                // $("#good_morale_file").append(element.good_morale_file);
                // $("#no_crime_file").append(element.no_crime_file);
                $("#cpa_one_pass_date").append(element.cpa_one_pass_date);
                $("#cpa_one_access_no").append(element.cpa_one_access_no);
                $("#cpa_one_success_no").append(element.cpa_one_success_no);
                $("#module_id").append(module_id);
                // $("#no_crime_file").append(element.no_crime_file);
                // $("#entrance_part").append(element.entrance_part);
                // $("#entrance_exam_no").append(element.entrance_exam_no);
                $("#status").append(status);
                $("#academic_year").append(element.cpa_one.academic_year);  

                $("#cpa_two_student_id").append(element.id);



                
            })
        }
    })
}

function approveCPATwoStudent(){ 
    var id = $("input[name = cpa_two_student_id]").val();
    $.ajax({
        url: BACKEND_URL+"/approve_cpa_two_student/"+id,
        type: 'patch',        
        success: function(result){
            // console.log(result.data)
            successMessage("You have approved that student!");  
            location.href=FRONTEND_URL+"/cpa_two_registration_list";        
            getCPATwoSelfStudyStudent();
            getCPATwoPrivateSchoolStudent();
            getCPATwoMACStudent();
        }
    });
}

function rejectCPATwoStudent(){ 
    var id = $("input[name = cpa_two_student_id]").val();
    $.ajax({
        url: BACKEND_URL+"/reject_cpa_two_student/"+id,
        type: 'patch',        
        success: function(result){
            // console.log(result.data)
            successMessage("You have rejected that student!");  
            location.href=FRONTEND_URL+"/cpa_two_registration_list";        
            getCPATwoSelfStudyStudent();
            getCPATwoPrivateSchoolStudent();
            getCPATwoMACStudent();
        }
    });
}