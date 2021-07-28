function getPAPPList(){
    destroyDatatable("#tbl_papp_list", "#tbl_papp_list_body");    
    $.ajax({
        url: BACKEND_URL+"/papp",
        type: 'get',
        data:"",
        success: function(data){
            var papp_data = data.data;            

            papp_data.forEach(function (element) {
                console.log('papp_data',element);

                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }

                if(element.use_firm==0){
                    use_firm="No Use Frim Name";
                }
                else{
                    use_firm="Use Frim Name";
                }

                var nrc     =   element.student_info.nrc_state_region+"/";
                    nrc    +=   element.student_info.nrc_township;
                    nrc    +=   "("+ element.student_info.nrc_citizen+")";
                    nrc    +=   element.student_info.nrc_number;
                var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    tr += "<td>" + nrc + "</td>";
                    tr += "<td>" + element.student_info.registration_no+ "</td>";
                    tr += "<td>" + element.papp_date+ "</td>";
                    tr += "<td>" + use_firm+ "</td>";
                    tr += "<td>" + status + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showPAPPList(" + element.id + ")'>" +
                            "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_papp_list_body").append(tr);     
            });
            getIndexNumber('#tbl_papp_list tr');
            createDataTable("#tbl_papp_list");      
        },
        error:function (message){
            dataMessage(message, "#tbl_papp_list", "#tbl_papp_list_body");        
        }
    });
}

function showPAPPList(pappID){
    localStorage.setItem("papp_id",pappID);
    console.log('selectitem',pappID);
    location.href=FRONTEND_URL+"/papp_edit";
}

function loadPAPPData(){
    var id=localStorage.getItem("papp_id");
    // console.log('idid',id);
    $("#name_eng").html("");
    $("#name_mm").html("");
    $("#nrc").html("");
    $("#father_name_mm").html("");
    $("#father_name_eng").html("");
    $("#race").html("");
    $("#religion").html("");
    $("#date_of_birth").html("");
    $("#address").html("");
    $("#current_address").html("");
    $("#phone").html("");
    $("#email").html("");
    $("#gov_staff").html("");
    $("#image").html("");
    $("#registration_no").html("");

    $("#university_name").html("");
    $("#degree_name").html("");
    $("#qualified_date").html("");
    $("#roll_number").html("");
    $("#certificate").html("");

    $("#cpa").html("");
    $("#ra").html("");
    $("#foreign_degree").html("");
    $("#use_firm").html("");
    $("#firm_name").html("");
    $("#firm_type").html("");
    $("#firm_step").html("");
    $("#staff_firm_name").html("");
    $("#cpa_ff_recommendation").html("");
    $("#recommendation_183").html("");
    $("#not_fulltime_recommendation").html("");
    $("#work_in_myanmar_confession").html("");
    $("#rule_confession").html("");
    $("#cpd_record").html("");
    $("#tax_free_recommendation").html("");
    $("#tax_year").html("");
    $("#status").html("");

    $("#name").html("");
    $("#position").html("");
    $("#department").html("");
    $("#organization").html("");
    $("#company_name").html("");
    $("#salary").html("");
    $("#office_address").html("");

    $("input[name = papp_id]").val(id);
    // console.log('id',id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/papp/"+id,
        success: function (data) {
            var student=data.data;
            student.forEach(function(element){
                console.log('pappdata',element);

                var education_history = element.student_education_histroy;
                
                var job = element.student_job;

                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }

                if(element.use_firm==0){
                    use_firm="No Use Frim Name";
                }
                else{
                    use_firm="Use Frim Name";
                }

                var nrc     =   element.student_info.nrc_state_region+"/";
                nrc    +=   element.student_info.nrc_township;
                nrc    +=   "("+ element.student_info.nrc_citizen+")";
                nrc    +=   element.student_info.nrc_number;                

                $("#id").append(element.id);
                document.getElementById('image').src=element.student_info.image;                           
                
                // if(element.cpa==null || element.cpa==""){
                //     document.getElementById('cpa_btn').disabled=true;
                // }else{
                //     document.getElementById('cpa').src=element.cpa;
                //     $("#cpa").append(element.cpa);
                // }

                // if(element.ra==null || element.ra==""){
                //     document.getElementById('ra_btn').disabled=true;
                // }else{
                //     document.getElementById('ra').src=element.ra;
                //     $("#ra").append(element.ra);
                // }

                // if(element.foreign_degree==null || element.foreign_degree==""){
                //     document.getElementById('fd_btn').disabled=true;
                // }else{
                //     document.getElementById('foreign_degree').src=element.foreign_degree;
                //     $("#foreign_degree").append(element.foreign_degree);
                // }

                $("#name_eng").append(element.student_info.name_eng);
                $("#name_mm").append(element.student_info.name_mm);
                $("#nrc").append(nrc);
                $("#father_name_mm").append(element.student_info.father_name_mm);
                $("#father_name_eng").append(element.student_info.father_name_eng);
                $("#race").append(element.student_info.race);
                $("#religion").append(element.student_info.religion);
                $("#date_of_birth").append(element.student_info.date_of_birth);
                $("#address").append(element.student_info.address);
                $("#current_address").append(element.student_info.current_address);
                $("#phone").append(element.student_info.phone);
                $("#email").append(element.student_info.email);
                $("#gov_staff").append(element.student_info.gov_staff);
                $("#image").append(element.student_info.image);
                $("#registration_no").append(element.student_info.registration_no);

                $("#cpa").append(element.cpa);
                $("#ra").append(element.ra);
                $("#foreign_degree").append(element.foreign_degree);
                $("#use_firm").append(use_firm);
                $("#firm_name").append(element.firm_name);
                $("#firm_type").append(element.firm_type);
                $("#firm_step").append(element.firm_step);
                $("#staff_firm_name").append(element.staff_firm_name);
                $("#cpa_ff_recommendation").append(element.cpa_ff_recommendation);
                $("#recommendation_183").append(element.recommendation_183);
                $("#not_fulltime_recommendation").append(element.cpd_record);
                $("#work_in_myanmar_confession").append(element.work_in_myanmar_confession);
                $("#rule_confession").append(element.rule_confession);
                $("#cpd_record").append(element.cpd_record);
                $("#tax_free_recommendation").append(element.tax_free_recommendation);
                $("#tax_year").append(element.tax_year);
                $("#status").append(status);                

                $("#university_name").append(education_history.university_name);
                $("#degree_name").append(education_history.degree_name);
                $("#qualified_date").append(education_history.qualified_date);
                $("#roll_number").append(education_history.roll_number);
                $("#certificate").append(education_history.certificate);

                $("#name").append(job.name);
                $("#position").append(job.position);
                $("#department").append(job.department);
                $("#organization").append(job.organization);
                $("#company_name").append(job.company_name);
                $("#salary").append(job.salary);
                $("#office_address").append(job.office_address);
            })
        }
    })
}

function approvePAPPUser(){

    var id = $("input[name = papp_id]").val();
    console.log('approvepappid',id);
    $.ajax({
        url: BACKEND_URL + "/approve_papp/"+id,
        type: 'patch',
        success: function(result){
            successMessage("You have approved that user!");
            location.href = FRONTEND_URL + "/papp_registration_list";
        }
    });
}

function rejectPAPPUser(){ 
    var id = $("input[name = papp_id]").val();
    console.log('rejectpappid',id);
    $.ajax({
        url: BACKEND_URL +"/reject_papp/"+id,
        type: 'patch',
        success: function(result){
            successMessage("You have rejected that user!");
            location.href = FRONTEND_URL + "/papp_registration_list";
        }
    });
}