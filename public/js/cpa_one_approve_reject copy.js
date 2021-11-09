function getCPAOneSelfStudyStudent(){
    destroyDatatable("#tbl_cpa_one_self_study", "#tbl_cpa_one_self_study_body");    
    $.ajax({
        url: BACKEND_URL+"/cpa_one_registration",
        type: 'get',
        data:"",
        success: function(data){
            var cpa_one_student_data=data.data;
            cpa_one_student_data.forEach(function (element) {

                var nrc_no     =   element.nrc_state_region+"/";
                    nrc_no    +=   element.nrc_township;
                    nrc_no    +=   "("+ element.nrc_citizen+")";
                    nrc_no    +=   element.nrc_number;
                
                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }

                if(element.cpa_one_type == 1)
                {
                    console.log('cpaone_selfstudy_data',element);
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.name_en + "</td>";                            
                    tr += "<td>" + nrc_no+ "</td>";                    
                    tr += "<td>" + element.academic_year + "</td>";
                    tr += "<td>" + element.phone + "</td>";
                    tr += "<td>" + status+ "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showSelfStudyStudent(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_cpa_one_self_study_body").append(tr); 
                }
                                       
                 
            });
            getIndexNumber('#tbl_cpa_one_self_study tr');
            createDataTable("#tbl_cpa_one_self_study");      
        },
        error:function (message){
            dataMessage(message, "#tbl_cpa_one_self_study", "#tbl_cpa_one_self_study_body");        
        }
    });
}

function showSelfStudyStudent(studentID){
    localStorage.setItem("cpa_one_selfstudy_student_id",studentID);
    // console.log('selectitem',studentID);
    location.href=FRONTEND_URL+"/cpa_one_selfstudy_edit";
}

function loadCPAOneSelfStudyStudentData(){
    var id=localStorage.getItem("cpa_one_selfstudy_student_id");
    console.log('cpa_one_selfstudy_student_id',id);
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
    $("#direct_access_no").html("");
    $("#entry_success_no").html("");
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

    $("input[name = cpa_one_student_id]").val(id);
    // console.log('id',id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/cpa_one_registration/"+id,
        success: function (data) {
            var cpa_one_student_data=data;
            // console.log('data',cpa_one_student_data);
            cpa_one_student_data.forEach(function(element){
                // console.log('cpa_one_student_data',element);

                var nrc_no     =   element.nrc_state_region+"/";
                    nrc_no    +=   element.nrc_township;
                    nrc_no    +=   "("+ element.nrc_citizen+")";
                    nrc_no    +=   element.nrc_number;
                
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

                if(element.module_id==1){
                    module_id="Module - 1";
                }else if(element.module_id==2){
                    module_id="Module - 2";
                }
                else if(element.module_id==3){
                    module_id="All Modules";
                }else{
                    module_id="-";
                }

                if(element.civil_servant==0){
                    civil_servant="No Civil Servant";
                }
                else{
                    civil_servant="Civil Servant";
                }

                $("#name_en").append(element.name_en);
                $("#name_mm").append(element.name_mm);
                $("#nrc_no").append(nrc_no);
                $("#father_name_en").append(element.father_name_en);
                $("#father_name_mm").append(element.father_name_mm);
                $("#race").append(element.race);
                $("#religion").append(element.religion);
                $("#birth_date").append(element.birth_date);
                $("#address").append(element.address);
                $("#current_address").append(element.current_address);
                $("#phone").append(element.phone);
                $("#email").append(element.email);
                $("#civil_servant").append(civil_servant);

                $("#education").append(element.education);
                $("#position").append(element.position);
                $("#department").append(element.department);
                $("#office_area").append(element.office_area);

                document.getElementById('photo').src=PDF_URL+element.photo;
                $("#photo").append(element.phto);
                $("#direct_access_no").append(element.direct_access_no);
                $("#entry_success_no").append(element.entry_success_no);
                $("#enrol_no_exam").append(enrol_no_exam);
                $("#attendance").append(attendance);
                $("#fail_exam").append(fail_exam);
                $("#resigned").append(resigned);
                $("#module_id").append(module_id);
                $("#batch_session_no").append(element.batch_session_no);
                $("#entrance_part").append(element.entrance_part);
                $("#entrance_exam_no").append(element.entrance_exam_no);
                $("#status").append(status);
                $("#academic_year").append(element.academic_year);  

                $("#cpa_one_student_id").append(element.id);



                
            })
        }
    })
}

function getCPAOnePrivateSchoolStudent(){
    destroyDatatable("#tbl_cpa_one_private_school", "#tbl_cpa_one_private_school_body");    
    $.ajax({
        url: BACKEND_URL+"/cpa_one_registration",
        type: 'get',
        data:"",
        success: function(data){
            var cpa_one_student_data=data.data;
            cpa_one_student_data.forEach(function (element) {

                var nrc_no     =   element.nrc_state_region+"/";
                    nrc_no    +=   element.nrc_township;
                    nrc_no    +=   "("+ element.nrc_citizen+")";
                    nrc_no    +=   element.nrc_number;
                
                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }

                if(element.cpa_one_type == 0)
                {
                    console.log('cpaone_privatschool_data',element);
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.name_en + "</td>";                            
                    tr += "<td>" + nrc_no+ "</td>";                    
                    tr += "<td>" + element.academic_year + "</td>";
                    tr += "<td>" + element.phone + "</td>";
                    tr += "<td>" + status+ "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showPrivateSchoolStudent(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_cpa_one_private_school").append(tr); 
                }
                                       
                 
            });
            getIndexNumber('#tbl_cpa_one_private_school tr');
            createDataTable("#tbl_cpa_one_private_school");      
        },
        error:function (message){
            dataMessage(message, "#tbl_cpa_one_private_school", "#tbl_cpa_one_private_school_body");        
        }
    });
}

function showPrivateSchoolStudent(studentID){
    localStorage.setItem("cpa_one_private_student_id",studentID);
    console.log('cpa_one_private_student_id',studentID);
    location.href=FRONTEND_URL+"/cpa_one_privateschool_edit";
}

function loadCPAOnePrivateSchoolStudentData(){
    var id=localStorage.getItem("cpa_one_private_student_id");
    console.log('cpa_one_selfstudy_student_id',id);
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
    $("#direct_access_no").html("");
    $("#entry_success_no").html("");
    // $("#enrol_no_exam").html("");
    // $("#attendance").html("");
    // $("#fail_exam").html("");
    // $("#resigned").html("");
    $("#module_id").html("");
    // $("#batch_session_no").html("");
    // $("#entrance_part").html("");
    // $("#entrance_exam_no").html("");
    $("#status").html("");
    $("#academic_year").html("");   
    $("#private_school_name").html("");

    $("input[name = cpa_one_student_id]").val(id);
    // console.log('id',id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/cpa_one_registration/"+id,
        success: function (data) {
            var cpa_one_student_data=data;
            // console.log('data',cpa_one_student_data);
            cpa_one_student_data.forEach(function(element){
                // console.log('cpa_one_student_data',element);

                var nrc_no     =   element.nrc_state_region+"/";
                    nrc_no    +=   element.nrc_township;
                    nrc_no    +=   "("+ element.nrc_citizen+")";
                    nrc_no    +=   element.nrc_number;
                
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

                if(element.module_id==1){
                    module_id="Module - 1";
                }else if(element.module_id==2){
                    module_id="Module - 2";
                }
                else if(element.module_id==3){
                    module_id="All Modules";
                }else {
                    module_id = "-";
                }

                if(element.civil_servant==0){
                    civil_servant="No Civil Servant";
                }
                else{
                    civil_servant="Civil Servant";
                }

                $("#name_en").append(element.name_en);
                $("#name_mm").append(element.name_mm);
                $("#nrc_no").append(nrc_no);
                $("#father_name_en").append(element.father_name_en);
                $("#father_name_mm").append(element.father_name_mm);
                $("#race").append(element.race);
                $("#religion").append(element.religion);
                $("#birth_date").append(element.birth_date);
                $("#address").append(element.address);
                $("#current_address").append(element.current_address);
                $("#phone").append(element.phone);
                $("#email").append(element.email);
                $("#civil_servant").append(civil_servant);

                $("#education").append(element.education);
                $("#position").append(element.position);
                $("#department").append(element.department);
                $("#office_area").append(element.office_area);

                document.getElementById('photo').src=PDF_URL+element.photo;
                $("#photo").append(element.phto);
                $("#direct_access_no").append(element.direct_access_no);
                $("#entry_success_no").append(element.entry_success_no);
                // $("#enrol_no_exam").append(enrol_no_exam);
                // $("#attendance").append(attendance);
                // $("#fail_exam").append(fail_exam);
                // $("#resigned").append(resigned);
                $("#module_id").append(module_id);
                // $("#batch_session_no").append(element.batch_session_no);
                // $("#entrance_part").append(element.entrance_part);
                // $("#entrance_exam_no").append(element.entrance_exam_no);
                $("#status").append(status);
                $("#academic_year").append(element.academic_year);
                $("#private_school_name").append(element.private_school_name);  

                $("#cpa_one_student_id").append(element.id);
                
            })
        }
    })
}

function getCPAOneMACStudent(){
    destroyDatatable("#tbl_cpa_one_mac", "#tbl_cpa_one_mac_body");    
    $.ajax({
        url: BACKEND_URL+"/cpa_one_registration",
        type: 'get',
        data:"",
        success: function(data){
            var cpa_one_student_data=data.data;
            cpa_one_student_data.forEach(function (element) {
                // console.log('cpaonedata',element);
                var nrc_no     =   element.nrc_state_region+"/";
                    nrc_no    +=   element.nrc_township;
                    nrc_no    +=   "("+ element.nrc_citizen+")";
                    nrc_no    +=   element.nrc_number;
                
                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }

                if(element.cpa_one_type == 2)
                {
                    console.log('cpaone_mac_data',element);
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.name_en + "</td>";                            
                    tr += "<td>" + nrc_no+ "</td>";                    
                    tr += "<td>" + element.academic_year + "</td>";
                    tr += "<td>" + element.phone + "</td>";
                    tr += "<td>" + status+ "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showMACStudent(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_cpa_one_mac_body").append(tr); 
                }
                                       
                 
            });
            getIndexNumber('#tbl_cpa_one_mac tr');
            createDataTable("#tbl_cpa_one_mac");      
        },
        error:function (message){
            dataMessage(message, "#tbl_cpa_one_mac", "#tbl_cpa_one_mac_body");        
        }
    });
}

function showMACStudent(studentID){
    localStorage.setItem("cpa_one_mac_student_id",studentID);
    console.log('cpa_one_mac_student_id',studentID);
    location.href=FRONTEND_URL+"/cpa_one_mac_edit";
}

function loadCPAOneMACStudentData(){
    var id=localStorage.getItem("cpa_one_mac_student_id");
    console.log('cpa_one_mac_student_id',id);
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
    $("#direct_access_no").html("");
    $("#entry_success_no").html("");
    $("#gov_department").html("");
    $("#personal_acc_training").html("");
    $("#after_second_exam").html("");
    $("#good_morale_file").html("");
    $("#no_crime_file").html("");
    $("#module_id").html("");
    
    // $("#entrance_part").html("");
    // $("#entrance_exam_no").html("");
    $("#status").html("");
    $("#academic_year").html("");   

    $("input[name = cpa_one_student_id]").val(id);
    // console.log('id',id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/cpa_one_registration/"+id,
        success: function (data) {
            var cpa_one_student_data=data;
            // console.log('data',cpa_one_student_data);
            cpa_one_student_data.forEach(function(element){
                // console.log('cpa_one_student_data',element);

                var nrc_no     =   element.nrc_state_region+"/";
                    nrc_no    +=   element.nrc_township;
                    nrc_no    +=   "("+ element.nrc_citizen+")";
                    nrc_no    +=   element.nrc_number;
                
                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }  

                if(element.gov_department==0){
                    gov_department="No";
                }else{
                    gov_department="Yes";
                }
                
                if(element.personal_acc_training==0){
                    personal_acc_training="No";
                }else{
                    personal_acc_training="Yes";
                }

                if(element.after_second_exam==0){
                    after_second_exam="No";
                }else{
                    after_second_exam="Yes";
                }

                if(element.resigned==0){
                    resigned="No";
                }else{
                    resigned="Yes";
                }

                if(element.module_id==1){
                    module_id="Module - 1";
                }else if(element.module_id==2){
                    module_id="Module - 2";
                }
                else if(element.module_id==3){
                    module_id="All Module";
                }else {
                    module_id = "-"
                }

                if(element.civil_servant==0){
                    civil_servant="No Civil Servant";
                }
                else{
                    civil_servant="Civil Servant";
                }

                $("#name_en").append(element.name_en);
                $("#name_mm").append(element.name_mm);
                $("#nrc_no").append(nrc_no);
                $("#father_name_en").append(element.father_name_en);
                $("#father_name_mm").append(element.father_name_mm);
                $("#race").append(element.race);
                $("#religion").append(element.religion);
                $("#birth_date").append(element.birth_date);
                $("#address").append(element.address);
                $("#current_address").append(element.current_address);
                $("#phone").append(element.phone);
                $("#email").append(element.email);
                $("#civil_servant").append(civil_servant);

                $("#education").append(element.education);
                $("#position").append(element.position);
                $("#department").append(element.department);
                $("#office_area").append(element.office_area);

                document.getElementById('photo').src=PDF_URL+element.photo;
                $("#photo").append(element.phto);
                $("#direct_access_no").append(element.direct_access_no);
                $("#entry_success_no").append(element.entry_success_no);
                $("#gov_department").append(gov_department);
                $("#personal_acc_training").append(personal_acc_training);
                $("#after_second_exam").append(after_second_exam);

                document.getElementById('good_morale_file').src=PDF_URL+element.good_morale_file;
                $("#good_morale_file").append(element.good_morale_file);

                document.getElementById('no_crime_file').src=PDF_URL+element.no_crime_file;
                $("#no_crime_file").append(element.no_crime_file);

                $("#module_id").append(module_id);
                // $("#entrance_part").append(element.entrance_part);
                // $("#entrance_exam_no").append(element.entrance_exam_no);
                $("#status").append(status);
                $("#academic_year").append(element.academic_year);  

                $("#cpa_one_student_id").append(element.id);



                
            })
        }
    })
}

function approveCPAOneStudent(){ 
    var id = $("input[name = cpa_one_student_id]").val();
    $.ajax({
        url: BACKEND_URL+"/approve_cpa_one_student/"+id,
        type: 'patch',        
        success: function(result){
            // console.log(result.data)
            successMessage("You have approved that student!");  
            location.href=FRONTEND_URL+"/cpa_one_registration_list";        
            getCPAOneSelfStudyStudent();
            getCPAOnePrivateSchoolStudent();
            getCPAOneMACStudent();
        }
    });
}

function rejectCPAOneStudent(){ 
    var id = $("input[name = cpa_one_student_id]").val();
    $.ajax({
        url: BACKEND_URL+"/reject_cpa_one_student/"+id,
        type: 'patch',        
        success: function(result){
            // console.log(result.data)
            successMessage("You have rejected that student!");  
            location.href=FRONTEND_URL+"/cpa_one_registration_list";        
            getCPAOneSelfStudyStudent();
            getCPAOnePrivateSchoolStudent();
            getCPAOneMACStudent();
        }
    });
}