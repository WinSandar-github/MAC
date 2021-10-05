// var cpa_modal;
// var ra_modal;
// var foreign_modal;
// var cpa_certificate_modal;
// var mpa_modal;
// var nrc_front_modal;
// var nrc_back_modal;
// var cpd_record_modal;
// var passport_modal;
// var attached_modal;
// var three_years_full_modal;
// var letter_modal;

function getCPAFFList(){
    destroyDatatable("#tbl_cpaff_pending_list", "#tbl_cpaff_pending_list_body");  
    destroyDatatable("#tbl_cpaff_approved_list", "#tbl_cpaff_approved_list_body");  
    destroyDatatable("#tbl_cpaff_rejected_list", "#tbl_cpaff_rejected_list_body");    
    show_loader();
    $.ajax({
        url: BACKEND_URL+"/cpa_ff",
        type: 'get',
        data:"",
        success: function(data){
            EasyLoading.hide();
            var cpaff_data = data.data;            

            cpaff_data.forEach(function (element) {
                console.log('cpaelement',element)
                if(element.cpa_part_2==1){
                    var degree = "CPA Part 2 Pass";
                }else {
                    var degree = "QT Pass";
                }

                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
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
                    tr +="<button type='button' class='btn btn-primary btn-xs' onClick='showCPAFFList(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    tr += "<td>" + nrc + "</td>";
                    tr += "<td>" + element.student_info.registration_no+ "</td>";
                    tr += "<td>" + degree+ "</td>";
                    tr += "<td>" + status + "</td>";
                    
                    tr += "</tr>";
                    $("#tbl_cpaff_pending_list_body").append(tr);
                }     
                else if(element.status==1)
                {
                var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr +="<button type='button' class='btn btn-primary btn-xs' onClick='showCPAFFList(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    tr += "<td>" + nrc + "</td>";
                    tr += "<td>" + element.student_info.registration_no+ "</td>";
                    tr += "<td>" + degree+ "</td>";
                    tr += "<td>" + status + "</td>";
                    
                    tr += "</tr>";
                    $("#tbl_cpaff_approved_list_body").append(tr);
                }     
                else if(element.status==2)
                {
                var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr +="<button type='button' class='btn btn-primary btn-xs' onClick='showCPAFFList(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    tr += "<td>" + nrc + "</td>";
                    tr += "<td>" + element.student_info.registration_no+ "</td>";
                    tr += "<td>" + degree+ "</td>";
                    tr += "<td>" + status + "</td>";
                    
                    tr += "</tr>";
                    $("#tbl_cpaff_rejected_list_body").append(tr);
                }     
            });
            getIndexNumber('#tbl_cpaff_pending_list tr');
            createDataTable("#tbl_cpaff_pending_list");      
            getIndexNumber('#tbl_cpaff_approved_list tr');
            createDataTable("#tbl_cpaff_approved_list");      
            getIndexNumber('#tbl_cpaff_rejected_list tr');
            createDataTable("#tbl_cpaff_rejected_list");      
        },
        error:function (message){
            dataMessage(message, "#tbl_cpaff_pending_list", "#tbl_cpaff_pending_list_body");  
            dataMessage(message, "#tbl_cpaff_approved_list", "#tbl_cpaff_approved_list_body");         
            dataMessage(message, "#tbl_cpaff_rejected_list", "#tbl_cpaff_rejected_list_body");   
        }
    });
}

function showCPAFFList(capffId,is_renew){
    localStorage.setItem("cpa_ff_id",capffId);
    localStorage.setItem("is_renew",is_renew);
    if(is_renew==0){
        location.href= FRONTEND_URL + "/cpa_ff_edit";
    }
    else{
        location.href= FRONTEND_URL + "/cpa_ff_renew_detail";
    }
}

function loadCPAFFData(){
    var id=localStorage.getItem("cpa_ff_id");
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
    // $("#certificate").html("");

    $("#cpa").html("");
    $("#ra").html("");
    $("#foreign_degree").html("");
    $("#degree").html("");
    $("#cpa_certificate").html("");
    $("#mpa_mem_card").html("");
    $("#mpa_mem_card_back").html("");
    $("#nrc_front").html("");
    $("#nrc_back").html("");
    $("#cpd_record").html("");
    $("#passport_image").html("");
    $("#status").html("");

    $("#name").html("");
    $("#position").html("");
    $("#department").html("");
    $("#organization").html("");
    $("#company_name").html("");
    $("#salary").html("");
    $("#office_address").html("");

    $("input[name = cpaff_id]").val(id);
    // console.log('id',id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/cpa_ff/"+id,
        success: function (data) {
            var student=data.data;
            console.log(student.length);
            
            student.forEach(function(element){
                if(element.status==0){
                    document.getElementById("cpaff_approve_reject").style.display = "block";
                } else {
                    document.getElementById("cpaff_approve_reject").style.display = "none";
                }
                if(element.cpa_part_2==1){
                    var degree = "CPA Part 2 Pass";
                }else {
                    var degree = "QT Pass";
                }

                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }

                var education_history = element.student_education_histroy;
                var job = element.student_job;

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
                    $(".recommend_letter").append(`<a href='${PDF_URL+element.student_info.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else{
                    $(".recommend_row").hide();
                }
                
                if(element.cpa!=null){
                    $(".cpa_file").append(`<a href='${PDF_URL+element.cpa}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $("#cpa_btn").append(`<span>-</span>`);
                }

                if(element.ra!=null){
                    $(".ra_file").append(`<a href='${PDF_URL+element.ra}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".ra_file").append(`<span>-</span>`);
                }

                if(element.foreign_degree!=null && element.foreign_degree!="null"){                   
                    //removeBracketed(element.foreign_degree,"foreign_degree");
                    let foreign_degree = JSON.parse(element.foreign_degree);
                    $.each(foreign_degree, function (fileCount, fileName) {
                        $(".foreign_degree_file").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                    })
                }else {
                    $(".foreign_degree_file").append(`<span>-</span>`);
                }

                if(element.cpa_certificate!=null){
                    $(".cpa_certificate_file").append(`<a href='${PDF_URL+element.cpa_certificate}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpa_certificate_file").append(`<span>-</span>`);
                }
                if(element.mpa_mem_card!=null){
                    $(".mpa_mem_card_file").append(`<a href='${PDF_URL+element.mpa_mem_card}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".mpa_mem_card_file").append(`<span>-</span>`);
                }
                if(element.mpa_mem_card_back!=null){
                    $(".mpa_mem_card_back_file").append(`<a href='${PDF_URL+element.mpa_mem_card_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".mpa_mem_card_back_file").append(`<span>-</span>`);
                }
                if(element.nrc_front!=null){
                    $(".nrc_front_file").append(`<a href='${PDF_URL+element.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".nrc_front_file").append(`<span>-</span>`);
                }
                if(element.nrc_back!=null){
                    $(".nrc_back_file").append(`<a href='${PDF_URL+element.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".nrc_back_file").append(`<span>-</span>`);
                }
                if(element.cpd_record!=null){
                    $(".cpd_record_file").append(`<a href='${PDF_URL+element.cpd_record}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpd_record_file").append(`<span>-</span>`);
                }
                if(element.three_years_full!=null){
                    $(".three_years_full_file").append(`<a href='${PDF_URL+element.three_years_full}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".three_years_full_file").append(`<span>-</span>`);
                }
                if(element.letter!=null){
                    $(".letter_file").append(`<a href='${PDF_URL+element.letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".letter_file").append(`<span>-</span>`);
                }
                $("#degree").append(degree);
                $("#status").append(status);
                $("#cpd_total_hour").append(element.total_hours);
                $("#three_years_full").append(element.three_years_full);
                $("#university_name").append(education_history.university_name);
                $("#degree_name").append(education_history.degree_name);
                $("#qualified_date").append(education_history.qualified_date);
                $("#roll_number").append(education_history.roll_number);
                // $("#certificate").append(education_history.certificate);
                let certificate = JSON.parse(education_history.certificate);
                $.each(certificate,function(fileCount,fileName){                   
                     $(".certificate").append(`<a href='${PDF_URL+fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);                    
                })
                $("#name").append(job.name);
                $("#position").append(job.position);
                $("#department").append(job.department);
                $("#organization").append(job.organization);
                $("#company_name").append(job.company_name);
                $("#salary").append(job.salary);
                $("#office_address").append(job.office_address);
                cpa_modal=PDF_URL+element.cpa;
                ra_modal=PDF_URL+element.ra;
                // foreign_modal=element.foreign_degree;
                // cpa_certificate_modal=PDF_URL+element.cpa_certificate;
                // mpa_modal=PDF_URL+element.mpa_mem_card;
                // mpa_modal_back=PDF_URL+element.mpa_mem_card_back;
                // nrc_front_modal=PDF_URL+element.nrc_front;
                // nrc_back_modal=PDF_URL+element.nrc_back;
                // cpd_record_modal=PDF_URL+element.cpd_record;
                // passport_modal=PDF_URL+element.passport_image;
                // three_years_full_modal=PDF_URL+element.three_years_full;
                // attached_modal=PDF_URL+element.student_education_histroy.certificate;
                // letter_modal=PDF_URL+element.letter;
                // document.getElementById('cpa').src=cpa_modal;
                // document.getElementById('ra').src=ra_modal;
                // document.getElementById('foreign_degree').src=foreign_modal;
                // document.getElementById('cpa_certificate').src=cpa_certificate_modal;
                // document.getElementById('mpa_mem_card').src=mpa_modal;
                // document.getElementById('mpa_mem_card_back').src=mpa_modal_back;
                // document.getElementById('nrc_front').src=nrc_front_modal;
                // document.getElementById('nrc_back').src=nrc_back_modal;
                // document.getElementById('cpd_record').src=cpd_record_modal;
                // document.getElementById('passport_image').src=passport_modal;
                // document.getElementById('attached_file').src=attached_modal;
                // document.getElementById('three_years_full').src=three_years_full_modal;
                // document.getElementById('letter').src=letter_modal;
            })
        }
    })
}
function loadCPAFFRenewData(){
    var id=localStorage.getItem("cpa_ff_id");
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
    // $("#certificate").html("");

    $("#cpa").html("");
    $("#ra").html("");
    $("#foreign_degree").html("");
    $("#degree").html("");
    $("#cpa_certificate").html("");
    $("#mpa_mem_card").html("");
    $("#mpa_mem_card_back").html("");
    $("#nrc_front").html("");
    $("#nrc_back").html("");
    $("#cpd_record").html("");
    $("#passport_image").html("");
    $("#status").html("");

    $("#name").html("");
    $("#position").html("");
    $("#department").html("");
    $("#organization").html("");
    $("#company_name").html("");
    $("#salary").html("");
    $("#office_address").html("");

    $("input[name = cpaff_id]").val(id);
    // console.log('id',id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/cpa_ff/"+id,
        success: function (data) {
            var student=data.data;
            console.log(student.length);
            
            student.forEach(function(element){
                if(element.status==0){
                    document.getElementById("cpaff_approve_reject").style.display = "block";
                } else {
                    document.getElementById("cpaff_approve_reject").style.display = "none";
                }
                if(element.cpa_part_2==1){
                    var degree = "CPA Part 2 Pass";
                }else {
                    var degree = "QT Pass";
                }

                if(element.status==0){
                    status="Pending";
                }
                else if(element.status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }

                var education_history = element.student_education_histroy;
                var job = element.student_job;

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
                    $(".recommend_letter").append(`<a href='${PDF_URL+element.student_info.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else{
                    $(".recommend_row").hide();
                }
                
                if(element.cpa!=null){
                    $(".cpa_file").append(`<a href='${PDF_URL+element.cpa}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $("#cpa_btn").append(`<span>-</span>`);
                }

                if(element.ra!=null){
                    $(".ra_file").append(`<a href='${PDF_URL+element.ra}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".ra_file").append(`<span>-</span>`);
                }

                if(element.foreign_degree!=null && element.foreign_degree!="null"){                   
                    //removeBracketed(element.foreign_degree,"foreign_degree");
                    let foreign_degree = JSON.parse(element.foreign_degree);
                    $.each(foreign_degree, function (fileCount, fileName) {
                        $(".foreign_degree_file").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                    })
                }else {
                    $(".foreign_degree_file").append(`<span>-</span>`);
                }

                if(element.cpa_certificate!=null){
                    $(".cpa_certificate_file").append(`<a href='${PDF_URL+element.cpa_certificate}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpa_certificate_file").append(`<span>-</span>`);
                }
                if(element.mpa_mem_card!=null){
                    $(".mpa_mem_card_file").append(`<a href='${PDF_URL+element.mpa_mem_card}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".mpa_mem_card_file").append(`<span>-</span>`);
                }
                if(element.mpa_mem_card_back!=null){
                    $(".mpa_mem_card_back_file").append(`<a href='${PDF_URL+element.mpa_mem_card_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".mpa_mem_card_back_file").append(`<span>-</span>`);
                }
                if(element.nrc_front!=null){
                    $(".nrc_front_file").append(`<a href='${PDF_URL+element.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".nrc_front_file").append(`<span>-</span>`);
                }
                if(element.nrc_back!=null){
                    $(".nrc_back_file").append(`<a href='${PDF_URL+element.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".nrc_back_file").append(`<span>-</span>`);
                }
                if(element.cpd_record!=null){
                    $(".cpd_record_file").append(`<a href='${PDF_URL+element.cpd_record}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".cpd_record_file").append(`<span>-</span>`);
                }
                if(element.letter!=null){
                    $(".letter_file").append(`<a href='${PDF_URL+element.letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                }else {
                    $(".letter_file").append(`<span>-</span>`);
                }
                $("#degree").append(degree);
                $("#status").append(status);
                $("#cpd_total_hour").append(element.total_hours);
                $("#three_years_full").append(element.three_years_full);
                $("#university_name").append(education_history.university_name);
                $("#degree_name").append(education_history.degree_name);
                $("#qualified_date").append(education_history.qualified_date);
                $("#roll_number").append(education_history.roll_number);
                // $("#certificate").append(education_history.certificate);
                let certificate = JSON.parse(education_history.certificate);
                $.each(certificate,function(fileCount,fileName){                   
                     $(".certificate").append(`<a href='${PDF_URL+fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);                    
                })
                $("#name").append(job.name);
                $("#position").append(job.position);
                $("#department").append(job.department);
                $("#organization").append(job.organization);
                $("#company_name").append(job.company_name);
                $("#salary").append(job.salary);
                $("#office_address").append(job.office_address);
                cpa_modal=PDF_URL+element.cpa;
                ra_modal=PDF_URL+element.ra;
                // foreign_modal=element.foreign_degree;
                // cpa_certificate_modal=PDF_URL+element.cpa_certificate;
                // mpa_modal=PDF_URL+element.mpa_mem_card;
                // mpa_modal_back=PDF_URL+element.mpa_mem_card_back;
                // nrc_front_modal=PDF_URL+element.nrc_front;
                // nrc_back_modal=PDF_URL+element.nrc_back;
                // cpd_record_modal=PDF_URL+element.cpd_record;
                // passport_modal=PDF_URL+element.passport_image;
                // three_years_full_modal=PDF_URL+element.three_years_full;
                // attached_modal=PDF_URL+element.student_education_histroy.certificate;
                // letter_modal=PDF_URL+element.letter;
                // document.getElementById('cpa').src=cpa_modal;
                // document.getElementById('ra').src=ra_modal;
                // document.getElementById('foreign_degree').src=foreign_modal;
                // document.getElementById('cpa_certificate').src=cpa_certificate_modal;
                // document.getElementById('mpa_mem_card').src=mpa_modal;
                // document.getElementById('mpa_mem_card_back').src=mpa_modal_back;
                // document.getElementById('nrc_front').src=nrc_front_modal;
                // document.getElementById('nrc_back').src=nrc_back_modal;
                // document.getElementById('cpd_record').src=cpd_record_modal;
                // document.getElementById('passport_image').src=passport_modal;
                // document.getElementById('attached_file').src=attached_modal;
                // document.getElementById('three_years_full').src=three_years_full_modal;
                // document.getElementById('letter').src=letter_modal;
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

function approveCPAFFUser(){
    if(!confirm('Are you sure you want to approve this user?')){
        return;
    }else{
        var is_renew=localStorage.getItem("is_renew");
        var id = $("input[name = cpaff_id]").val();
        console.log('approvecpaid',id);
        $.ajax({
            url: BACKEND_URL + "/approve_cpaff/"+id,
            type: 'patch',
            success: function(result){
                successMessage("You have approved that user!");
                if(is_renew==0){
                    location.href = FRONTEND_URL + "/cpa_ff_registration_list";
                }
                else{
                    location.href = FRONTEND_URL + "/cpa_ff_renew_list";
                }
            }
        });
    }
}

function rejectCPAFFUser(){ 
    if(!confirm('Are you sure you want to reject this user?')){
        return;
    }else{
        var is_renew=localStorage.getItem("is_renew");
        var id = $("input[name = cpaff_id]").val();
        console.log('rejectcpaid',id);
        $.ajax({
            url: BACKEND_URL +"/reject_cpaff/"+id,
            type: 'patch',
            success: function(result){
                successMessage("You have rejected that user!");
                if(is_renew==0){
                    location.href = FRONTEND_URL + "/cpa_ff_registration_list";
                }
                else{
                    location.href = FRONTEND_URL + "/cpa_ff_renew_list";
                }
            }
        });
    }
}

window.onclick = function(event) {
    if (event.target == document.getElementById("cpaModal") && cpa_modal!=null) {
        document.getElementById('cpa').src=cpa_modal;
        
    }
    if (event.target == document.getElementById("raModal") && ra_modal!=null) {
        document.getElementById('ra').src=ra_modal;
        
    }
    // if (event.target == document.getElementById("fdModal") && foreign_modal!=null) {
    //     document.getElementById('foreign_degree').src=foreign_modal;
        
    // }
    if (event.target == document.getElementById("capp_certi_Modal") && cpa_certificate_modal!=null) {
        document.getElementById('cpa_certificate').src=cpa_certificate_modal;
        
    }
    if (event.target == document.getElementById("mpa_mem_card_Modal") && mpa_modal!=null) { 
        document.getElementById('mpa_mem_card').src=mpa_modal;
        
    }
    if (event.target == document.getElementById("mpa_mem_card_back_Modal") && mpa_modal_back!=null) { 
        document.getElementById('mpa_mem_card_back').src=mpa_modal_back;
        
    }
    if (event.target == document.getElementById("nrc_front_Modal") && nrc_front_modal!=null) {
        document.getElementById('nrc_front').src=nrc_front_modal;
        
    }
    if (event.target == document.getElementById("nrc_back_Modal") && nrc_back_modal!=null) {
        document.getElementById('nrc_back').src=nrc_back_modal;
    }
    if (event.target == document.getElementById("cpd_record_Modal") && cpd_record_modal!=null) {
        document.getElementById('cpd_record').src=cpd_record_modal;
    }
    if (event.target == document.getElementById("passport_Modal") && passport_modal!=null) {
        document.getElementById('passport_image').src=passport_modal;
    }
    if (event.target == document.getElementById("attached_Modal") && attached_modal!=null) {
        document.getElementById('attached_file').src=attached_modal;
    }
}

