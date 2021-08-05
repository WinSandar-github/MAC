function getCPAFFList(){
    destroyDatatable("#tbl_cpaff_list", "#tbl_cpaff_list_body");    
    $.ajax({
        url: BACKEND_URL+"/cpa_ff",
        type: 'get',
        data:"",
        success: function(data){
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
                var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.student_info.name_eng + "</td>";
                    tr += "<td>" + nrc + "</td>";
                    tr += "<td>" + element.student_info.registration_no+ "</td>";
                    tr += "<td>" + degree+ "</td>";
                    tr += "<td>" + status + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showCPAFFList(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_cpaff_list_body").append(tr);     
            });
            getIndexNumber('#tbl_cpaff_list tr');
            createDataTable("#tbl_cpaff_list");      
        },
        error:function (message){
            dataMessage(message, "#tbl_cpaff_list", "#tbl_cpaff_list_body");        
        }
    });
}

function showCPAFFList(capffId){
    localStorage.setItem("cpa_ff_id",capffId);
    console.log('selectitem',capffId);
    location.href= FRONTEND_URL + "/cpa_ff_edit";
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
    $("#certificate").html("");

    $("#cpa").html("");
    $("#ra").html("");
    $("#foreign_degree").html("");
    $("#degree").html("");
    $("#cpa_certificate").html("");
    $("#mpa_mem_card").html("");
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
            student.forEach(function(element){
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
                document.getElementById('image').src=element.student_info.image;
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
                $("#degree").append(degree);
                $("#cpa_certificate").append(element.cpa_certificate);
                $("#mpa_mem_card").append(element.mpa_mem_card);
                $("#nrc_front").append(element.nrc_front);
                $("#nrc_back").append(element.nrc_back);
                $("#cpd_record").append(element.cpd_record);
                $("#passport_image").append(element.passport_image);
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

function approveCPAFFUser(){

    var id = $("input[name = cpaff_id]").val();
    console.log('approvecpaid',id);
    $.ajax({
        url: BACKEND_URL + "/approve_cpaff/"+id,
        type: 'patch',
        success: function(result){
            successMessage("You have approved that user!");
            location.href = FRONTEND_URL + "/cpa_ff_registration_list";
        }
    });
}

function rejectCPAFFUser(){ 
    var id = $("input[name = cpaff_id]").val();
    console.log('rejectcpaid',id);
    $.ajax({
        url: BACKEND_URL +"/reject_cpaff/"+id,
        type: 'patch',
        success: function(result){
            successMessage("You have rejected that user!");
            location.href = FRONTEND_URL + "/cpa_ff_registration_list";
        }
    });
}