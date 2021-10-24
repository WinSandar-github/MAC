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
                    use_firm="-";
                }
                else{
                    use_firm="No Use Frim Name";
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
                    tr += "<button type='button' class='btn btn-primary btn-xs' onClick='showPAPPList(" + element.id + ",)'>" +
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

function showPAPPList(pappID,type){
    localStorage.setItem("papp_id",pappID);
    localStorage.setItem("papp_type",type);
    console.log('selectitem',pappID);
    if(type==0){
        location.href=FRONTEND_URL+"/papp_edit";
    }else{
        location.href=FRONTEND_URL+"/papp_renew_edit";
    }

    
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
            // console.log(data)
            var student=data.data;
            student.forEach(function(element){
                // console.log('element',element);
                var education_history = element.student_education_histroy;    
                self = JSON.parse(element.self_confession);
                    $.each(self,function(i,v){
                        if(v.self_confession == 1){
                            $(`.self${i}`).append(`<i class="fa fa-check-circle text-success" aria-hidden="true"></i>`);
                            $(`.nself${i}`).append('');
                        }
                        else{
                            $(`.self${i}`).append('');
                            $(`.nself${i}`).append(`<i class="fa fa-times text-danger" aria-hidden="true"></i>`);
                        }
                        // $(".certificate").append(`<a href='${PDF_URL+fileName}' style='display:block; font-size:16px; text-decoration: none;' target='_blank'>View File</a>`);                    
                   });  
                if(element.self_confession_1 == 1){
                    $(`.self_confession`).append(`<i class="fa fa-check-circle text-success" aria-hidden="true"></i>`);
                    $(`.nself_confession`).append('');
                }
                else{
                    $(`.self_confession`).append('');
                    $(`.nself_confession`).append(`<i class="fa fa-times text-danger" aria-hidden="true"></i>`);
                }         
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
                    use_firm="-";
                }
                else if(element.use_firm==1){
                    use_firm="No Use Frim Name";
                }else{
                    use_firm="-"
                }
               
                if (element.status == 0) {
                    document.getElementById("reject").style.display = "block";
                    document.getElementById("approve").style.display = "block";
                } else {
                    document.getElementById("reject").style.display = "none";
                    document.getElementById("approve").style.display = "none";
                }
                var nrc     =   element.student_info.nrc_state_region+"/";
                nrc    +=   element.student_info.nrc_township;
                nrc    +=   "("+ element.student_info.nrc_citizen+")";
                nrc    +=   element.student_info.nrc_number;   
                $("#id").append(element.id);
                document.getElementById('profile_photo').src=PDF_URL+element.profile_photo;                           
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
                $("#profile_photo").append(element.profile_photo);
                $("#registration_no").append(element.student_info.cpersonal_no);
                // console.log(element.cpa_ff_recommendation);
                if(element.student_info.gov_staff == 1){
                    $(".recommend_row").show();
                    $(".recommend_letter").append(`<a href='${PDF_URL+element.student_info.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else{
                    $(".recommend_row").hide();
                }

                if(element.cpa!=null && element.cpa!=""){
                    $(".cpa_file").append(`<a href='${PDF_URL+element.cpa}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpa_file").append(`<span>-</span>`);
                }

                if(element.ra!=null && element.ra!=""){
                    $(".ra_file").append(`<a href='${PDF_URL+element.ra}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".ra_file").append(`<span>-</span>`);
                }

                if(element.foreign_degree!=null && element.foreign_degree!="null"){    
                    // let foreign_degree = JSON.parse(element.foreign_degree);
                    // $.each(foreign_degree, function (fileCount, fileName) {
                    //     $(".foreign_degree_file").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                    // })
                    // $(".foreign_degree_file").append(
                    //     '<table id="tbl_foreign_degree"  class="table table-border" style="width:100%;display: block; overflow-x: auto;white-space: nowrap;"'+
                    //     '<thead><tr><th>Name</th>'+'<th>Passed Year</th>'+'<th>Certificate</th></tr></thead>'+
                    //     '<tbody class="tbl_foreign_degree_body hoverTable text-left"></tbody></table>'
                    // );
                    $('#has_foreign_degree').show();
                    $('#not_foreign_degree').hide();
                    let foreign_degree = JSON.parse(element.foreign_degree);
                    let degree_name = JSON.parse(element.degree_name);
                    let degree_year = JSON.parse(element.degree_pass_year);
                    $('.tbl_foreign_degree_body').html("");
                    var certificate_html;
                    for(let i=0;i<foreign_degree.length;i++){
                        var degree_certificate=`<a href='${PDF_URL +foreign_degree[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`;
                        certificate_html += `<tr>
                                            <td>${degree_name[i]}</td>
                                            <td>${degree_year[i]}</td>
                                            <td>${degree_certificate}</td>
                                        </tr>`
                    }
                    $('.tbl_foreign_degree_body').html(certificate_html)
                }else {
                    $('#not_foreign_degree').show();
                    $('#has_foreign_degree').hide();
                    $(".foreign_degree_file").append(`<span>-</span>`);
                }

                // if(element.cpa!=null){
                //     $(".cpa_file").append(`<a href='${PDF_URL+element.cpa}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                // }else {
                //     $(".cpa_file").append(`<span>-</span>`);
                // }

                // if(element.ra!=null){
                //     $(".ra_file").append(`<a href='${PDF_URL+element.ra}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                // }else {
                //     $(".ra_file").append(`<span>-</span>`);
                // }

                // if(element.foreign_degree!=null && element.foreign_degree!="null"){                   
                //     //removeBracketed(element.foreign_degree,"foreign_degree");
                //     let foreign_degree = JSON.parse(element.foreign_degree);
                //     $.each(foreign_degree, function (fileCount, fileName) {
                //         $(".foreign_degree_file").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                //     })
                // }else {
                //     $(".foreign_degree_file").append(`<span>-</span>`);
                // }

                if(element.mpa_mem_card_front!=null){
                    $(".mpa_mem_card_file").append(`<a href='${PDF_URL+element.mpa_mem_card_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".mpa_mem_card_file").append(`<span>-</span>`);
                }

                if(element.mpa_mem_card_back!=null){
                    $(".mpa_mem_card_back_file").append(`<a href='${PDF_URL+element.mpa_mem_card_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".mpa_mem_card_back_file").append(`<span>-</span>`);
                }

                if(element.cpa_ff_recommendation!=null){
                    $(".cpaff_registeration_card_file").append(`<a href='${PDF_URL+element.cpa_ff_recommendation}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpaff_registeration_card_file").append(`<span>-</span>`);
                }

                if(element.tax_free_recommendation!=null && element.tax_free_recommendation!=""){
                    $(".tax_free_recommendation").append(`<a href='${PDF_URL+element.tax_free_recommendation}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".tax_free_recommendation").append(`<span>-</span>`);
                }
                if(element.cpd_record!=null){
                    $(".cpd_record_file").append(`<a href='${PDF_URL+element.cpd_record}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpd_record_file").append(`<span>-</span>`);
                }
                $("#use_firm").append(use_firm);
                $("#firm_name").append(element.firm_name);
                $("#firm_type").append(element.firm_type);
                $("#firm_step").append(element.firm_step);
                $("#staff_firm_name").append(element.staff_firm_name);
                // $("#cpa_ff_recommendation").append(element.cpa_ff_recommendation);
                $("#recommendation_183").append(element.recommendation_183);
                $("#not_fulltime_recommendation").append(element.cpd_record);
                $("#work_in_myanmar_confession").append(element.work_in_myanmar_confession);
                $("#rule_confession").append(element.rule_confession);
                $("#cpd_record").append(element.cpd_record);
                $("#cpd_hours").append(element.cpd_hours);
                $("#tax_free_recommendation").append(element.tax_free_recommendation);
                if(element.tax_year !=null){
                    $("#tax_year").append(element.tax_year);
                }else{
                    $("#tax_year").append(`<span>-</span>`);
                }
                $("#cpaff_reg_no").append(element.cpaff_reg_no);
                $("#status").append(status); 
                $("#cpa_batch_no").append(element.cpa_batch_no);
                $("#cpaff_address").append(element.address);
                $("#cpaff_phone").append(element.phone);
                $("#contact_mail").append(element.contact_mail);               
                $("#cpaff_pass_date").append(element.cpaff_pass_date);                
                $("#papp_date").append(element.papp_date);                

                $("#university_name").append(education_history.university_name);
                $("#degree_name").append(education_history.degree_name);
                $("#qualified_date").append(education_history.qualified_date);
                $("#roll_number").append(education_history.roll_number);

                // $("#certificate").append(education_history.certificate);
                let certificate = JSON.parse(education_history.certificate);
                $.each(certificate,function(fileCount,fileName){
                   
                     $(".certificate").append(`<a href='${PDF_URL+fileName}' style='display:block; font-size:16px; text-decoration: none;' target='_blank'>View File</a>`);                    
                   
                });

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
                // cpaff_recomm_modal=element.cpa_ff_recommendation;
                recomm_183_modal=element.recommendation_183;
                not_fulltime_recomm_modal=element.not_fulltime_recommendation;
                work_in_myanmar_modal=element.work_in_myanmar_confession;
                rule_confession_modal=element.rule_confession;
                cpd_record_modal=element.cpd_record;
                tax_free_modal=element.tax_free_recommendation;
                // mpa_mem_card_front_modal=PDF_URL+element.mpa_mem_card_front;
                // mpa_mem_card_back_modal=PDF_URL+element.mpa_mem_card_back;
                attached_modal=element.student_education_histroy.certificate;
                letter_modal=PDF_URL+element.letter;

                document.getElementById('cpa').src=PDF_URL+cpa_modal;
                document.getElementById('ra').src=PDF_URL+ra_modal;
                document.getElementById('foreign_degree').src=PDF_URL+foreign_modal;
                // document.getElementById('cpaff_recomm').src=PDF_URL+cpaff_recomm_modal;
                // document.getElementById('recomm_183').src=PDF_URL+recomm_183_modal;
                // document.getElementById('not_fulltime_recomm').src=PDF_URL+not_fulltime_recomm_modal;
                // document.getElementById('work_in_myanmar').src=PDF_URL+work_in_myanmar_modal;
                // document.getElementById('rule_confession').src=PDF_URL+rule_confession_modal;
                // document.getElementById('cpd_record').src=PDF_URL+cpd_record_modal;
                document.getElementById('tax_free').src=PDF_URL+tax_free_modal;
                // document.getElementById('mpa_mem_card_front').src=mpa_mem_card_front_modal;
                // document.getElementById('mpa_mem_card_back').src=mpa_mem_card_back_modal;                
                document.getElementById('attached_file').src=PDF_URL+attached_modal;
                document.getElementById('letter').src=letter_modal;
            })
        }
    })
}

function loadRenewPAPPData(){
    var id=localStorage.getItem("papp_id");
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
            console.log('element',student);
            student.forEach(function(element){
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
                    use_firm="-";
                }
                else if(element.use_firm==1){
                    use_firm="No Use Frim Name";
                }else{
                    use_firm="-"
                }
               
                if (element.status == 0) {
                    document.getElementById("reject").style.display = "block";
                    document.getElementById("approve").style.display = "block";
                } else {
                    document.getElementById("reject").style.display = "none";
                    document.getElementById("approve").style.display = "none";
                }
                var nrc     =   element.student_info.nrc_state_region+"/";
                nrc    +=   element.student_info.nrc_township;
                nrc    +=   "("+ element.student_info.nrc_citizen+")";
                nrc    +=   element.student_info.nrc_number;                
                self = JSON.parse(element.self_confession);
                    $.each(self,function(i,v){
                        if(v.self_confession == 1){
                            $(`.self${i}`).append(`<i class="fa fa-check-circle text-success" aria-hidden="true"></i>`);
                            $(`.nself${i}`).append('');
                        }
                        else{
                            $(`.self${i}`).append('');
                            $(`.nself${i}`).append(`<i class="fa fa-times text-danger" aria-hidden="true"></i>`);
                        }
                        // $(".certificate").append(`<a href='${PDF_URL+fileName}' style='display:block; font-size:16px; text-decoration: none;' target='_blank'>View File</a>`);                    
                   });  
                $("#id").append(element.id);
                document.getElementById('profile_photo').src=PDF_URL+element.profile_photo;                           
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
                $("#profile_photo").append(element.profile_photo);
                $("#registration_no").append(element.student_info.cpersonal_no);
                //$(".total_audit_work").append(element.personal_no);

                if(element.student_info.gov_staff == 1){
                    $(".recommend_row").show();
                    $(".recommend_letter").append(`<a href='${PDF_URL+element.student_info.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else{
                    $(".recommend_row").hide();
                }

                if(element.cpa!=null && element.cpa!=""){
                    $(".cpa_file").append(`<a href='${PDF_URL+element.cpa}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpa_file").append(`<span>-</span>`);
                }

                if(element.ra!=null && element.ra!=""){
                    $(".ra_file").append(`<a href='${PDF_URL+element.ra}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".ra_file").append(`<span>-</span>`);
                }

                if(element.foreign_degree!=null && element.foreign_degree!="null"){    
                    // let foreign_degree = JSON.parse(element.foreign_degree);
                    // $.each(foreign_degree, function (fileCount, fileName) {
                    //     $(".foreign_degree_file").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                    // })
                    // $(".foreign_degree_file").append(
                    //     '<table id="tbl_foreign_degree"  class="table table-border" style="width:100%;display: block; overflow-x: auto;white-space: nowrap;"'+
                    //     '<thead><tr><th>Name</th>'+'<th>Passed Year</th>'+'<th>Certificate</th></tr></thead>'+
                    //     '<tbody class="tbl_foreign_degree_body hoverTable text-left"></tbody></table>'
                    // );
                    $('#has_foreign_degree').show();
                    $('#not_foreign_degree').hide();
                    let foreign_degree = JSON.parse(element.foreign_degree);
                    let degree_name = JSON.parse(element.degree_name);
                    let degree_year = JSON.parse(element.degree_pass_year);
                    $('.tbl_foreign_degree_body').html("");
                    var certificate_html;
                    for(let i=0;i<foreign_degree.length;i++){
                        var degree_certificate=`<a href='${PDF_URL +foreign_degree[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`;
                        certificate_html += `<tr>
                                            <td>${degree_name[i]}</td>
                                            <td>${degree_year[i]}</td>
                                            <td>${degree_certificate}</td>
                                        </tr>`
                    }
                    $('.tbl_foreign_degree_body').html(certificate_html)
                }else {
                    $('#not_foreign_degree').show();
                    $('#has_foreign_degree').hide();
                    $(".foreign_degree_file").append(`<span>-</span>`);
                }
                if(element.company!=null && element.company!="null"){    
                    // let foreign_degree = JSON.parse(element.foreign_degree);
                    // $.each(foreign_degree, function (fileCount, fileName) {
                    //     $(".foreign_degree_file").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                    // })
                    // $(".foreign_degree_file").append(
                    //     '<table id="tbl_foreign_degree"  class="table table-border" style="width:100%;display: block; overflow-x: auto;white-space: nowrap;"'+
                    //     '<thead><tr><th>Name</th>'+'<th>Passed Year</th>'+'<th>Certificate</th></tr></thead>'+
                    //     '<tbody class="tbl_foreign_degree_body hoverTable text-left"></tbody></table>'
                    // );
                    let company = JSON.parse(element.company);
                    let period = JSON.parse(element.period);
                    let manager = JSON.parse(element.manager);
                    $('.tbl_statutory_audit_work_body').html("");
                    var statutory_audit_work_html;
                    for(let i=0;i<company.length;i++){
                        statutory_audit_work_html += `<tr>
                                            <td>${company[i]}</td>
                                            <td>${period[i]}</td>
                                            <td>${manager[i]}</td>
                                        </tr>`
                    }
                    $('.tbl_statutory_audit_work_body').html(statutory_audit_work_html)
                }
                // if(element.cpa!=null){
                //     $(".cpa_file").append(`<a href='${PDF_URL+element.cpa}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                // }else {
                //     $(".cpa_file").append(`<span>-</span>`);
                // }

                // if(element.ra!=null){
                //     $(".ra_file").append(`<a href='${PDF_URL+element.ra}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                // }else {
                //     $(".ra_file").append(`<span>-</span>`);
                // }

                // if(element.foreign_degree!=null && element.foreign_degree!="null"){                   
                //     //removeBracketed(element.foreign_degree,"foreign_degree");
                //     let foreign_degree = JSON.parse(element.foreign_degree);
                //     $.each(foreign_degree, function (fileCount, fileName) {
                //         $(".foreign_degree_file").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                //     })
                // }else {
                //     $(".foreign_degree_file").append(`<span>-</span>`);
                // }
                if(element.tax_free_recommendation!=null && element.tax_free_recommendation!=""){
                    $(".tax_free_recommendation").append(`<a href='${PDF_URL+element.tax_free_recommendation}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".tax_free_recommendation").append(`<span>-</span>`);
                }

                if(element.mpa_mem_card_front!=null){
                    $(".mpa_mem_card_file").append(`<a href='${PDF_URL+element.mpa_mem_card_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".mpa_mem_card_file").append(`<span>-</span>`);
                }

                if(element.mpa_mem_card_back!=null){
                    $(".mpa_mem_card_back_file").append(`<a href='${PDF_URL+element.mpa_mem_card_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".mpa_mem_card_back_file").append(`<span>-</span>`);
                }

                if(element.cpa_ff_recommendation!=null){
                    $(".cpaff_registeration_card_file").append(`<a href='${PDF_URL+element.cpa_ff_recommendation}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpaff_registeration_card_file").append(`<span>-</span>`);
                }
                if(element.cpd_record!=null){
                    $(".cpd_file").append(`<a href='${PDF_URL+element.cpd_record}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpd_file").append(`<span>-</span>`);
                }
                $("#use_firm").append(use_firm);
                $("#firm_name").append(element.firm_name);
                $("#firm_type").append(element.firm_type);
                $("#firm_step").append(element.firm_step);
                $("#staff_firm_name").append(element.staff_firm_name);
                // $("#cpa_ff_recommendation").append(element.cpa_ff_recommendation);
                $("#recommendation_183").append(element.recommendation_183);
                $("#not_fulltime_recommendation").append(element.cpd_record);
                $("#work_in_myanmar_confession").append(element.work_in_myanmar_confession);
                $("#rule_confession").append(element.rule_confession);
                $("#cpd_record").append(element.cpd_record);
                $("#cpd_hours").append(element.cpd_hours);
                $("#tax_free_recommendation").append(element.tax_free_recommendation);
                if(element.tax_year !=null){
                    $("#tax_year").append(element.tax_year);
                }else{
                    $("#tax_year").append(`<span>-</span>`);
                }
                $("#cpaff_reg_no").append(element.cpaff_reg_no);
                $("#papp_reg_no").append(element.papp_reg_no);
                $("#papp_reg_num").append(element.papp_reg_no);
                $("#status").append(status); 
                $("#cpa_batch_no").append(element.cpa_batch_no);
                $("#cpaff_address").append(element.address);
                $("#cpaff_phone").append(element.phone);
                $("#contact_mail").append(element.contact_mail);               
                $("#cpaff_pass_date").append(element.cpaff_pass_date);                
                $("#papp_date").append(element.papp_date);                
                $("#papp_reg_date").append(element.papp_reg_date);                
                $("#papp_renew_date").append(element.papp_renew_date);                
                $("#audit_year").append(element.audit_year);                
                $("#audit_work").append(element.audit_work);                

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
    // if(!confirm('Are you sure you want to reject this user?')){
    //     return;
    // }else{
        var id = $("input[name = papp_id]").val();
        var data = $('#reject_papp').val();
        $.ajax({
            url: BACKEND_URL +"/reject_papp/"+id,
            type : 'post',
            data : {
                'id' : id,
                'description' : data,
            },
            success: function(result){
                successMessage("You have rejected that user!");
                location.href = FRONTEND_URL + "/papp_registration_list";
            }
        });
    // }
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
function pappOfflineUser(pappID){
    localStorage.setItem("papp_id",pappID);
    location.href=FRONTEND_URL+"/papp_offline_user_detail";
}
function loadappOfflineUser(){
    var id=localStorage.getItem("papp_id");
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
    $("#papp_reg_no").html("");

    $("input[name = papp_id]").val(id);
    // console.log('id',id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/papp/"+id,
        success: function (data) {
            var student=data.data;
            student.forEach(function(element){
                console.log('element',element);
                var education_history = element.student_education_histroy;               
                var job = element.student_job;
                $("input[name = cpaff_id]").val(element.student_info.cpaff_id);
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
                    use_firm="-";
                }
                else if(element.use_firm==1){
                    use_firm="No Use Firm Name";
                }else{
                    use_firm="-"
                }
               
                if (element.status == 0) {
                    document.getElementById("reject").style.display = "block";
                    document.getElementById("approve").style.display = "block";
                } else {
                    document.getElementById("reject").style.display = "none";
                    document.getElementById("approve").style.display = "none";
                }
                var nrc     =   element.student_info.nrc_state_region+"/";
                nrc    +=   element.student_info.nrc_township;
                nrc    +=   "("+ element.student_info.nrc_citizen+")";
                nrc    +=   element.student_info.nrc_number;                
                self = JSON.parse(element.self_confession);
                    $.each(self,function(i,v){
                        if(v.self_confession == 1){
                            $(`.self${i}`).append(`<i class="fa fa-check-circle text-success" aria-hidden="true"></i>`);
                            $(`.nself${i}`).append('');
                        }
                        else{
                            $(`.self${i}`).append('');
                            $(`.nself${i}`).append(`<i class="fa fa-times text-danger" aria-hidden="true"></i>`);
                        }
                        // $(".certificate").append(`<a href='${PDF_URL+fileName}' style='display:block; font-size:16px; text-decoration: none;' target='_blank'>View File</a>`);                    
                   }); 
                if(element.self_confession_1 == 1){
                    $(`.self_confession`).append(`<i class="fa fa-check-circle text-success" aria-hidden="true"></i>`);
                    $(`.nself_confession`).append('');
                }
                else{
                    $(`.self_confession`).append('');
                    $(`.nself_confession`).append(`<i class="fa fa-times text-danger" aria-hidden="true"></i>`);
                } 
                $("#id").append(element.id);
                document.getElementById('profile_photo').src=PDF_URL+element.profile_photo;                           
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
                $("#profile_photo").append(element.profile_photo);
                $("#registration_no").append(element.student_info.cpersonal_no);
                //$(".total_audit_work").append(element.personal_no);
                $("#papp_reg_year").append(element.papp_reg_date);
                $("#papp_last_renew_year").append(element.papp_date);
                $("#latest_reg_year").append(element.latest_reg_year);
                $("#papp_resign_date").append(element.papp_resign_date);
                if(element.submitted_stop_form==1){
                    $("#submitted_stop_form").append(`${element.submitted_from_date} မှ ${element.submitted_to_date} အထိ ရပ်နား Form တင်ထားပါသည်။`);
                }
                else{
                    $("#submitted_stop_form").append("မရှိပါ။");
                }
                if(element.student_info.gov_staff == 1){
                    $(".recommend_row").show();
                    $(".recommend_letter").append(`<a href='${PDF_URL+element.student_info.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else{
                    $(".recommend_row").hide();
                }
                if(element.student_info.nrc_front!=null && element.student_info.nrc_front!=""){
                    $(".nrc_front_file").append(`<a href='${PDF_URL+element.student_info.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".nrc_front_file").append(`<span>-</span>`);
                }
                if(element.student_info.nrc_back!=null && element.student_info.nrc_back!=""){
                    $(".nrc_back_file").append(`<a href='${PDF_URL+element.student_info.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".nrc_back_file").append(`<span>-</span>`);
                }
                if(element.cpa!=null && element.cpa!=""){
                    $(".cpa_file").append(`<a href='${PDF_URL+element.cpa}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpa_file").append(`<span>-</span>`);
                }

                if(element.ra!=null && element.ra!=""){
                    $(".ra_file").append(`<a href='${PDF_URL+element.ra}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".ra_file").append(`<span>-</span>`);
                }

                if(element.foreign_degree!=null && element.foreign_degree!="null"){    
                    $('#has_foreign_degree').show();
                    $('#not_foreign_degree').hide();
                    let foreign_degree = JSON.parse(element.foreign_degree);
                    let degree_name = JSON.parse(element.degree_name);
                    let degree_year = JSON.parse(element.degree_pass_year);
                    $('.tbl_foreign_degree_body').html("");
                    var certificate_html;
                    for(let i=0;i<foreign_degree.length;i++){
                        var degree_certificate=`<a href='${PDF_URL +foreign_degree[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`;
                        certificate_html += `<tr>
                                            <td>${degree_name[i]}</td>
                                            <td>${degree_year[i]}</td>
                                            <td>${degree_certificate}</td>
                                        </tr>`
                    }
                    $('.tbl_foreign_degree_body').html(certificate_html)
                }else {
                    $('#not_foreign_degree').show();
                    $('#has_foreign_degree').hide();
                    $(".foreign_degree_file").append(`<span>-</span>`);
                }
                if(element.company!=null && element.company!="null"){    
                    let company = JSON.parse(element.company);
                    let period = JSON.parse(element.period);
                    let manager = JSON.parse(element.manager);
                    $('.tbl_statutory_audit_work_body').html("");
                    var statutory_audit_work_html;
                    for(let i=0;i<company.length;i++){
                        statutory_audit_work_html += `<tr>
                                            <td>${company[i]}</td>
                                            <td>${period[i]}</td>
                                            <td>${manager[i]}</td>
                                        </tr>`
                    }
                    $('.tbl_statutory_audit_work_body').html(statutory_audit_work_html)
                }
                if(element.mpa_mem_card_front!=null){
                    $(".mpa_mem_card_file").append(`<a href='${PDF_URL+element.mpa_mem_card_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".mpa_mem_card_file").append(`<span>-</span>`);
                }

                if(element.mpa_mem_card_back!=null){
                    $(".mpa_mem_card_back_file").append(`<a href='${PDF_URL+element.mpa_mem_card_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".mpa_mem_card_back_file").append(`<span>-</span>`);
                }

                if(element.cpa_ff_recommendation!=null){
                    $(".cpaff_registeration_card_file").append(`<a href='${PDF_URL+element.cpa_ff_recommendation}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpaff_registeration_card_file").append(`<span>-</span>`);
                }
                $("#use_firm").append(use_firm);
                $("#firm_name").append(element.firm_name);
                $("#firm_type").append(element.firm_type);
                $("#firm_step").append(element.firm_step);
                $("#staff_firm_name").append(element.staff_firm_name);
                // $("#reg_no").append(element.reg_no);
                $("#papp_reg_no").append(element.papp_reg_no);
                $("#status").append(status); 
                $("#cpa_batch_no").append(element.cpa_batch_no);
                $("#cpaff_address").append(element.address);
                $("#cpaff_phone").append(element.phone);
                $("#contact_mail").append(element.contact_mail);               
                $("#cpaff_pass_date").append(element.cpaff_pass_date);                
                $("#papp_date").append(element.papp_date);                

                // $("#university_name").append(education_history.university_name);
                // $("#degree_name").append(education_history.degree_name);
                // $("#qualified_date").append(education_history.qualified_date);
                // $("#roll_number").append(education_history.roll_number);
                // // $("#certificate").append(education_history.certificate);
                // let certificate = JSON.parse(education_history.certificate);
                // $.each(certificate,function(fileCount,fileName){
                   
                //      $(".certificate").append(`<a href='${PDF_URL+fileName}' style='display:block; font-size:16px; text-decoration: none;' target='_blank'>View File</a>`);                    
                   
                // })
                $.ajax({
                    type: "GET",
                    url: BACKEND_URL+"/cpa_ff/"+element.student_info.cpaff_id,
                    success: function (data) {
                        var student=data.data;
                        console.log(student.length);
                        
                        student.forEach(function(element){
                            $("#cpaff_reg_year").append(element.cpaff_reg_year);
                            $("#cpaff_last_renew_year").append(element.last_paid_year); 
                            $("#old_card_year").append(element.old_card_no_year);
                            $("#old_card_no").append(element.old_card_no); 
                            if(element.old_card_file!=null){
                                $(".old_card_file").append(`<a href='${PDF_URL+element.old_card_file}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                            }else {
                                $(".old_card_file").append(`<span>-</span>`);
                            }
                            if(element.cpa_certificate!=null){
                                $(".cpaff_cpa_certificate_file").append(`<a href='${PDF_URL+element.cpa_certificate}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                            }else {
                                $(".cpaff_cpa_certificate_file").append(`<span>-</span>`);
                            }
                            if(element.mpa_mem_card!=null){
                                $(".cpaff_mpa_mem_card_file").append(`<a href='${PDF_URL+element.mpa_mem_card}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                            }else {
                                $(".cpaff_mpa_mem_card_file").append(`<span>-</span>`);
                            }
                            if(element.mpa_mem_card_back!=null){
                                $(".cpaff_mpa_mem_card_back_file").append(`<a href='${PDF_URL+element.mpa_mem_card_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                            }else {
                                $(".cpaff_mpa_mem_card_back_file").append(`<span>-</span>`);
                            }
                            $("#cpaff_reg_no").append(element.cpaff_reg_no);
                            
                            if(element.cpaff_pass_date != null){
                                $("#cpaff_pass_date").append(element.cpaff_pass_date);
                            }else{
                                $("#cpaff_pass_date").append(`<span>-</span>`);
                            }
                        })
                    }
                })
            })
        }
    })
}

function approvePAPPOfflineUser(){
    if(!confirm('Are you sure you want to approve this user?')){
        return;
    }else{
        var id = $("input[name = papp_id]").val();
        var cpafff_id = $("input[name = cpaff_id]").val();
        console.log('approvepappid',id);
        $.ajax({
            url: BACKEND_URL + "/approve_offline_papp/"+id+"/"+cpafff_id,
            type: 'patch',
            success: function(result){
                successMessage("You have approved that user!");
                location.href = FRONTEND_URL + "/offline_user";
            }
        });
    }
}

function rejectPAPPOfflineUser(){ 
    // if(!confirm('Are you sure you want to reject this user?')){
    //     return;
    // }else{
        var id = $("input[name = papp_id]").val();
        var cpafff_id = $("input[name = cpaff_id]").val();
        var data = $('#reject_offline_papp').val();
        $.ajax({
            url: BACKEND_URL +"/reject_offline_papp/"+id,
            type : 'post',
            data : {
                'id' : id,
                'description' : data,
                'cpaff_id' : cpafff_id
            },
            success: function(result){
                successMessage("You have rejected that user!");
                location.href = FRONTEND_URL + "/offline_user";
            }
        });
    // }
}
