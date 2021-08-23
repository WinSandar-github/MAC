var attached_file;

function getDAList(course_code){
    destroyDatatable("#tbl_da_list", "#tbl_da_list_body"); 
    console.log($("input[name=filter_by_nrc]").val());
    var send_data=new FormData();
    send_data.append('name',$("input[name=filter_by_name]").val());
    send_data.append('nrc',$("input[name=filter_by_nrc]").val());  
    show_loader();
    $.ajax({
        url: BACKEND_URL+"/filter_student_info",
        type: 'post',
        data:send_data,
        contentType: false,
        processData: false,
        success: function(data){
            EasyLoading.hide();
            var da_data = data.data;
            console.log({data});
            let da_one_list = da_data.filter(function(v){
                return v.batch.course.code == course_code 
            })
            console.log(da_one_list)
            da_one_list.forEach(function (element) {
                 var status;
                if(element.approve_reject_status==0){
                    status="Pending";
                }
                else if(element.approve_reject_status==1){
                    status="Approve";
                }
                else{
                    status="Reject";
                }
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.student_info.name_mm + "</td>";
                    tr += "<td>" + element.student_info.email + "</td>";
                    tr += "<td>" + element.student_info.phone+ "</td>";
                    tr += "<td>" + element.student_info.nrc_state_region+"/"+element.student_info.nrc_township+ "("+element.student_info.nrc_citizen+")"+element.student_info.nrc_number + "</td>";
                    tr += "<td>" + status + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showDAList(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_da_list_body").append(tr);     
            });
            getIndexNumber('#tbl_da_list tr');
            createDataTable("#tbl_da_list");      
        },
        error:function (message){
            dataMessage(message, "#tbl_da_list", "#tbl_da_list_body");        
        }
    });
}

function showDAList(student_course_id)
{
    localStorage.setItem("student_course_id",student_course_id);
     location.href=FRONTEND_URL+"/da_edit";
}

function loadData(){
    var id=localStorage.getItem("student_course_id");
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

    $("#name").html("");
    $("#position").html("");
    $("#department").html("");
    $("#organization").html("");
    $("#company_name").html("");
    $("#salary").html("");
    $("#office_address").html("");

    $("input[name = student_course_id]").val(id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/da_register/"+id,
        success: function (data) {
            var student=data.data;
            console.log(student)
            student.forEach(function(student_course){
                let element = student_course.student_info;
                if(student_course.approve_reject_status==0){
                    document.getElementById("approve_reject").style.display = "block";
                }
                else{
                    document.getElementById("approve_reject").style.display = "none";
                }
                var education_history = element.student_education_histroy;
                var job = element.student_job;
                $("#id").append(element.id);
                document.getElementById('image').src=PDF_URL+element.image;
                $("#name_eng").append(element.name_eng);
                $("#name_mm").append(element.name_mm);
                $("#nrc").append(element.nrc_state_region+"/" +element.nrc_township+ "("+element.nrc_citizen+")"+element.nrc_number );
                $("#father_name_mm").append(element.father_name_mm);
                $("#father_name_eng").append(element.father_name_eng);
                $("#race").append(element.race);
                $("#religion").append(element.religion);
                $("#date_of_birth").append(element.date_of_birth);
                $("#address").append(element.address);
                $("#current_address").append(element.current_address);
                $("#phone").append(element.phone);
                $("#email").append(element.email);
                $("#gov_staff").append(element.gov_staff);
                $("#image").append(element.image);
                $("#registration_no").append(element.registration_no);

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
                attached_file=element.student_education_histroy.certificate;
                //document.getElementById('attach_file').src=attached_file;
            })
        }
    })
}

function approveUser(){ 
   
    
    var id = $("input[name = student_course_id]").val();
 
    console.log('approvedaid',id);
    $.ajax({
        url: BACKEND_URL + "/approve/" + id,
        type: 'patch',
        success: function(result){
            let url;
            if(result){

                switch(result.code){
                    case 'da_1':
                    url = '/da_one_app_list';
                    break;
                    case 'da_2':
                    url = '/da_two_app_list';
                    break;
                    case 'cpa_1':
                    url = '/cpa_one_app_list';
                    break;
                    case 'cpa_2':
                    url = '/cpa_two_app_list';
                    break;
                    default:
                    url = '/da_one_app_list';
                    break;


                    
                }
                successMessage("You have approved that user!");
                location.href = FRONTEND_URL + url;
            }    
        }
    });
}

function rejectUser(){ 
    var id = $("input[name = student_course_id]").val();
 
    $.ajax({
        url: BACKEND_URL + "/reject/" + id,
        type: 'patch',
        success: function(result){
            let url;
            if(result){

                switch(result.code){
                    case 'da_1':
                    url = '/da_one_app_list';
                    break;
                    case 'da_2':
                    url = '/da_two_app_list';
                    break;
                    case 'cpa_1':
                    url = '/cpa_one_app_list';
                    break;
                    case 'cpa_2':
                    url = '/cpa_two_app_list';
                    break;
                    default:
                    url = '/da_one_app_list';
                    break;


                    
                }
                successMessage("You have rejected that user!");
                 location.href = FRONTEND_URL + url;
            }
            // location.href = FRONTEND_URL + "/da_one_app_list";
        }
    });
}

// window.onclick = function(event) {
//     if (event.target == document.getElementById("myModal")) {
//         console.log(attached_file);    
//         document.getElementById('attach_file').src=attached_file;
//     }
//   }

function file_read(data){
    if(data=='certificate'){
        document.getElementById('attach_file').src=PDF_URL+attached_file;
        $('#myModal').modal({
            show : true
        });
    }
}