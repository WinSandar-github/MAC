var cpa_modal;
var ra_modal;
var foreign_modal;
var cpaff_recomm_modal;
var recomm_183_modal;
var not_fulltime_recomm_modal;
var work_in_myanmar_modal;
var rule_confession_modal;
var cpd_record_modal;
var tax_free_modal;
var attached_modal;


function getPAPPList(){
    destroyDatatable("#tbl_papp_pending_list", "#tbl_papp_pending_list_body");   
    destroyDatatable("#tbl_papp_approved_list", "#tbl_papp_approved_list_body");   
    destroyDatatable("#tbl_papp_rejected_list", "#tbl_papp_rejected_list_body");   
    show_loader(); 
    $.ajax({
        url: BACKEND_URL+"/papp",
        type: 'get',
        data:"",
        success: function(data){
            EasyLoading.hide();
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

                if(element.status==0)
                {
                var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showPAPPList(" + element.id + ")'>" +
                            "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    tr += "<td>" + nrc + "</td>";
                    tr += "<td>" + element.student_info.registration_no+ "</td>";
                    tr += "<td>" + element.papp_date+ "</td>";
                    tr += "<td>" + use_firm+ "</td>";
                    tr += "<td>" + status + "</td>";
                    
                    tr += "</tr>";
                    $("#tbl_papp_pending_list_body").append(tr); 
                }    
                else if(element.status==1)
                {
                var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showPAPPList(" + element.id + ")'>" +
                            "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    tr += "<td>" + nrc + "</td>";
                    tr += "<td>" + element.student_info.registration_no+ "</td>";
                    tr += "<td>" + element.papp_date+ "</td>";
                    tr += "<td>" + use_firm+ "</td>";
                    tr += "<td>" + status + "</td>";
                    
                    tr += "</tr>";
                    $("#tbl_papp_approved_list_body").append(tr); 
                }    
                else if(element.status==2)
                {
                var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showPAPPList(" + element.id + ")'>" +
                            "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    tr += "<td>" + nrc + "</td>";
                    tr += "<td>" + element.student_info.registration_no+ "</td>";
                    tr += "<td>" + element.papp_date+ "</td>";
                    tr += "<td>" + use_firm+ "</td>";
                    tr += "<td>" + status + "</td>";
                    
                    tr += "</tr>";
                    $("#tbl_papp_rejected_list_body").append(tr); 
                }    
            });
            getIndexNumber('#tbl_papp_pending_list tr');
            createDataTable("#tbl_papp_pending_list");  
            getIndexNumber('#tbl_papp_approved_list tr');
            createDataTable("#tbl_papp_approved_list");  
            getIndexNumber('#tbl_papp_rejected_list tr');
            createDataTable("#tbl_papp_rejected_list");      
        },
        error:function (message){
            dataMessage(message, "#tbl_papp_pending_list", "#tbl_papp_pending_list_body");        
            dataMessage(message, "#tbl_papp_approved_list", "#tbl_papp_approved_list_body");        
            dataMessage(message, "#tbl_papp_rejected_list", "#tbl_papp_rejected_list_body");        
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
                document.getElementById('image').src=PDF_URL+element.student_info.image;                           
                
                

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
                $("#gov_staff").append(element.student_info.gov_staff == 0 ? "မဟုတ်" : "ဟုတ်");
                $("#image").append(element.student_info.image);
                $("#registration_no").append(element.student_register.personal_no);

                if(element.student_info.gov_staff == 1){
                    $(".recommend_row").show();
                    $(".recommend_letter").append(`<a href='${PDF_URL+element.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else{
                    $(".recommend_row").hide();
                }

                if(element.cpa!=null && element.cpa!=""){
                    $("#cpa").append(element.cpa);
                }else {
                    $("#cpa_btn").prop("disabled", true);
                }

                if(element.ra!=null && element.ra!=""){
                    $("#ra").append(element.ra);
                }else {
                    $("#ra_btn").prop("disabled", true);
                }

                if(element.foreign_degree!=null && element.foreign_degree!="null"){
                   
                    removeBracketed(element.foreign_degree,"foreign_degree");
                    
                }else {
                    $(".foreign_degree").append("<button disabled type='button' id='fd_btn' style='width: 30%;margin-top:1% ;' class='btn btn-primary' data-toggle='modal' data-target='#fdModal'><i class='fa fa-paperclip'></i></button>");
                    
                }

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
                // $("#certificate").append(education_history.certificate);
                let certificate = JSON.parse(education_history.certificate);
                $.each(certificate,function(fileCount,fileName){
                   
                     $(".certificate").append(`<a href='${PDF_URL+fileName}' style='display:block; font-size:16px; text-decoration: none;' target='_blank'>View File</a>`);                    
                   
                })

                $("#name").append(job.name);
                $("#position").append(job.position);
                $("#department").append(job.department);
                $("#organization").append(job.organization);
                $("#company_name").append(job.company_name);
                $("#salary").append(job.salary);
                $("#office_address").append(job.office_address);

                cpa_modal=element.cpa;
                ra_modal=element.ra;
                foreign_modal=element.foreign_degree;
                cpaff_recomm_modal=element.cpa_ff_recommendation;
                recomm_183_modal=element.recommendation_183;
                not_fulltime_recomm_modal=element.not_fulltime_recommendation;
                work_in_myanmar_modal=element.work_in_myanmar_confession;
                rule_confession_modal=element.rule_confession;
                cpd_record_modal=element.cpd_record;
                tax_free_modal=element.tax_free_recommendation;
                attached_modal=element.student_education_histroy.certificate;
                document.getElementById('cpa').src=PDF_URL+cpa_modal;
                document.getElementById('ra').src=PDF_URL+ra_modal;
                document.getElementById('foreign_degree').src=PDF_URL+foreign_modal;
                document.getElementById('cpaff_recomm').src=PDF_URL+cpaff_recomm_modal;
                document.getElementById('recomm_183').src=PDF_URL+recomm_183_modal;
                document.getElementById('not_fulltime_recomm').src=PDF_URL+not_fulltime_recomm_modal;
                document.getElementById('work_in_myanmar').src=PDF_URL+work_in_myanmar_modal;
                document.getElementById('rule_confession').src=PDF_URL+rule_confession_modal;
                document.getElementById('cpd_record').src=PDF_URL+cpd_record_modal;
                document.getElementById('tax_free').src=PDF_URL+tax_free_modal;
                document.getElementById('attached_file').src=PDF_URL+attached_modal;
            })
        }
    })
}

function removeBracketed(file,divname){
    var new_file=file.replace(/[\'"[\]']+/g, '');
    var split_new_file=new_file.split(',');
    for(var i=0;i<split_new_file.length;i++){
        var file="<button type='button' onclick=loadFile('"+split_new_file[i]+"') id='fd_btn' style='width: 30%;margin-top:1% ;' class='btn btn-primary' data-toggle='modal' data-target='#fdModal'><i class='fa fa-paperclip'></i></button>";
        $("."+divname).append(file);
    }
}
function loadFile(file) {
    var myImageId = file;
    $(".modal-body #foreign_degree").attr("src", myImageId);
}

function approvePAPPUser(){
    if(!confirm('Are you sure you want to approve this user?')){
        return;
    }else{
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
}

function rejectPAPPUser(){ 
    if(!confirm('Are you sure you want to reject this user?')){
        return;
    }else{
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
}

window.onclick = function(event) {
    if (event.target == document.getElementById("cpaModal") && cpa_modal!=null) {
        document.getElementById('cpa').src=PDF_URL+cpa_modal;
        
    }
    if (event.target == document.getElementById("raModal") && ra_modal!=null) {
        document.getElementById('ra').src=PDF_URL+ra_modal;
        
    }
    if (event.target == document.getElementById("fdModal") && foreign_modal!=null) {
        document.getElementById('foreign_degree').src=PDF_URL+foreign_modal;
        
    }
    if (event.target == document.getElementById("cpa_ff_recommendation_Modal") && cpaff_recomm_modal!=null) {
        document.getElementById('cpaff_recomm').src=PDF_URL+cpaff_recomm_modal;
        
    }
    if (event.target == document.getElementById("recommendation_183_Modal") && recomm_183_modal!=null) { 
        document.getElementById('recomm_183').src=PDF_URL+recomm_183_modal;
        
    }
    if (event.target == document.getElementById("not_fulltime_recommendation_Modal") && not_fulltime_recomm_modal!=null) {
        document.getElementById('not_fulltime_recomm').src=PDF_URL+not_fulltime_recomm_modal;
        
    }
    if (event.target == document.getElementById("work_in_myanmar_confession_Modal") && work_in_myanmar_modal!=null) {
        document.getElementById('work_in_myanmar').src=PDF_URL+work_in_myanmar_modal;
    }
    if (event.target == document.getElementById("rule_confession_Modal") && rule_confession_modal!=null) {
        document.getElementById('rule_confession').src=PDF_URL+rule_confession_modal;
    }
    if (event.target == document.getElementById("cpd_record_Modal") && cpd_record_modal!=null) {
        document.getElementById('cpd_record').src=PDF_URL+cpd_record_modal;
    }
    if (event.target == document.getElementById("tax_free_recommendation_Modal") && tax_free_modal!=null) {
        document.getElementById('tax_free').src=PDF_URL+tax_free_modal;
    }
    if (event.target == document.getElementById("attached_Modal") && attached_modal!=null) {
        document.getElementById('attached_file').src=PDF_URL+attached_modal;
    }
}