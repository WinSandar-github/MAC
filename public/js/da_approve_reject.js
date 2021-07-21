function getDAList(){
    destroyDatatable("#tbl_da_list", "#tbl_da_list_body");    
    $.ajax({
        url: BACKEND_URL+"/da_register",
        type: 'get',
        data:"",
        success: function(data){
            var da_data = data.data;
            da_data.forEach(function (element) {
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.name_eng + "</td>";
                    tr += "<td>" + element.email + "</td>";
                    tr += "<td>" + element.phone+ "</td>";
                    tr += "<td>" + element.nrc + "</td>";
                    tr += "<td>" + element.approve_reject_status + "</td>";
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

function showDAList(studentId){
    localStorage.setItem("student_id",studentId);
    location.href="/da_edit";
}

function loadData(){
    var id=localStorage.getItem("student_id");
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

    $("input[name = student_info_id]").val(id);
    $.ajax({
        type: "GET",
        url: BACKEND_URL+"/da_register/"+id,
        success: function (data) {
            var student=data.data;
            student.forEach(function(element){
                var education_history = element.student_education_histroy;
                var job = element.student_job;
                $("#id").append(element.id);

                $("#name_eng").append(element.name_eng);
                $("#name_mm").append(element.name_mm);
                $("#nrc").append(element.nrc);
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
            })
        }
    })
}

function approveUser(){ 
    var id = $("input[name = student_info_id]").val();
    $.ajax({
        url: BACKEND_URL+"/approve/"+id,
        type: 'patch',        
        success: function(result){
            console.log(result)
            successMessage("You have approved that user!");  
            location.reload();          
            getDAList();
        }
    });
}

function rejectUser(){ 
    var id = $("input[name = student_info_id]").val();
    console.log(id);
    $.ajax({
        url: BACKEND_URL+"/reject/"+id,
        type: 'patch',        
        success: function(result){
            console.log(result)
            successMessage("You have rejected that user!");  
            location.reload();          
            getDAList();
        }
    });
}