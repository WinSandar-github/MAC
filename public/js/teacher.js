function getTeacherRegisterList(){
    destroyDatatable("#tbl_teacher_pending", "#tbl_teacher_pending_body");
    destroyDatatable("#tbl_teacher_approved", "#tbl_teacher_approved_body");
    destroyDatatable("#tbl_teacher_rejected", "#tbl_teacher_rejected_body");
    var send_data=new FormData();
    send_data.append('name',$("input[name=filter_by_name]").val());
    send_data.append('nrc',$("input[name=filter_by_nrc]").val());
    show_loader();  
    $.ajax({
        type : 'post',
        url : BACKEND_URL+"/filter_teacher",
        data:send_data,
        contentType: false,
        processData: false,
        success : function(data){
            let indexNo1 = 0;
            let indexNo2 = 0;
            let indexNo3 = 0;
            data.data.map((obj)=> {
                
                let nrc = obj.nrc_state_region+"/"+obj.nrc_township+"("+obj.nrc_citizen+")"+obj.nrc_number;
                if(obj.approve_reject_status == 0)
                {
                    var tr = "<tr>";
                    tr += `<td> ${ indexNo1 += 1 } </td>`;
                    tr += `<td><a href=${FRONTEND_URL+'/teacher_edit?id='+obj.id} class='btn btn-primary btn-sm'><i class='fa fa-eye fa-sm'></i></a> </td>`;
                    tr += `<td> ${ obj.name_mm } </td>`;
                    tr += `<td> ${ obj.email } </td>`;
                    tr += `<td> ${ obj.phone } </td>`;
                    tr += `<td> ${ nrc } </td>`;
                    let status_color = "";
                    if(obj.approve_reject_status == 0){
                        status_color = "text-warning";
                    }
                    else if(obj.approve_reject_status == 1){
                        status_color = "text-success";
                    }
                    else{
                        status_color = "text-danger";
                    }
                    tr += `<td class='${status_color}'> ${ obj.approve_reject_status == 0 ? 'Pending': obj.approve_reject_status == 1 ? 'Approved' : 'Rejected'} </td>`;
                    
                    tr += "</tr>";
                    $("#tbl_teacher_pending_body").append(tr);
                }
                else if(obj.approve_reject_status == 1)
                {
                    var tr = "<tr>";
                    tr += `<td> ${ indexNo2 += 1 } </td>`;
                    tr += `<td><a href=${FRONTEND_URL+'/teacher_edit?id='+obj.id} class='btn btn-primary btn-sm'><i class='fa fa-eye fa-sm'></i></a> </td>`;
                    tr += `<td> ${ obj.name_mm } </td>`;
                    tr += `<td> ${ obj.email } </td>`;
                    tr += `<td> ${ obj.phone } </td>`;
                    tr += `<td> ${ nrc } </td>`;
                    let status_color = "";
                    if(obj.approve_reject_status == 0){
                        status_color = "text-warning";
                    }
                    else if(obj.approve_reject_status == 1){
                        status_color = "text-success";
                    }
                    else{
                        status_color = "text-danger";
                    }
                    tr += `<td class='${status_color}'> ${ obj.approve_reject_status == 0 ? 'Pending': obj.approve_reject_status == 1 ? 'Approved' : 'Rejected'} </td>`;
                    
                    tr += "</tr>";
                    $("#tbl_teacher_approved_body").append(tr);
                }
                else if(obj.approve_reject_status == 2)
                {
                    var tr = "<tr>";
                    tr += `<td> ${ indexNo3 += 1 } </td>`;
                    tr += `<td><a href=${FRONTEND_URL+'/teacher_edit?id='+obj.id} class='btn btn-primary btn-sm'><i class='fa fa-eye fa-sm'></i></a> </td>`;
                    tr += `<td> ${ obj.name_mm } </td>`;
                    tr += `<td> ${ obj.email } </td>`;
                    tr += `<td> ${ obj.phone } </td>`;
                    tr += `<td> ${ nrc } </td>`;
                    let status_color = "";
                    if(obj.approve_reject_status == 0){
                        status_color = "text-warning";
                    }
                    else if(obj.approve_reject_status == 1){
                        status_color = "text-success";
                    }
                    else{
                        status_color = "text-danger";
                    }
                    tr += `<td class='${status_color}'> ${ obj.approve_reject_status == 0 ? 'Pending': obj.approve_reject_status == 1 ? 'Approved' : 'Rejected'} </td>`;
                    
                    tr += "</tr>";
                    $("#tbl_teacher_rejected_body").append(tr);
                }
            });
            createDataTableWithAsc("#tbl_teacher_pending");
            createDataTableWithAsc("#tbl_teacher_approved");
            createDataTableWithAsc("#tbl_teacher_rejected");
            EasyLoading.hide();
        }
    });
}

function showTeacher(teacherID){
    localStorage.setItem("teacher_id",teacherID);
    location.href=FRONTEND_URL+"/teacher_edit/";
}

function getTeacherInfos(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/teacher/"+id,
        success : function(data){
            $.each(data.data, function( index, value ) {
                document.getElementById('image').src = PDF_URL + value.image;
                $("#name_eng").append(value.name_eng);
                $("#name_mm").append(value.name_mm);
                let nrc = value.nrc_state_region+"/"+value.nrc_township+"("+value.nrc_citizen+")"+value.nrc_number;
                $("#nrc").append(nrc);
                $("#father_name_eng").append(value.father_name_eng);
                $("#father_name_mm").append(value.father_name_mm);
                $("#phone").append(value.phone);
                $("#email").append(value.email);
                var certificates = value.certificates.split(',');
                var diplomas = value.diplomas.split(',');
                $.each(certificates, function( index_y, item ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index_y += 1 } </td>`;
                    tr += `<td> ${ item } </td>`;
                    tr += "</tr>";
                    $("#tbl_certificate_body").append(tr);
                });
                $.each(diplomas, function( index_z, item ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index_z += 1 } </td>`;
                    tr += `<td> ${ item } </td>`;
                    tr += "</tr>";
                    $("#tbl_diploma_body").append(tr);
                });
                if(value.approve_reject_status != 0){
                    $("#approve_reject").hide();
                }
                else{
                    $("#approve_reject").show();
                }
                $("#exp_desc").append(value.exp_desc);
                if(value.gov_employee == 1){
                    $('input:radio[name=radio1]').attr('checked',true);
                    $('input[name="radio2"]').attr('disabled', 'disabled');
                    $('.recommend_row').show();
                    $(".recommend_letter").append(`<a href='${PDF_URL+value.recommend_letter}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);
                   
                    
                }
                else{
                    $('input:radio[name=radio2]').attr('checked',true);
                    $('input[name="radio1"]').attr('disabled', 'disabled');
                    $('.recommend_row').hide();
                }
                $(".nrc_front").append(`<a href='${PDF_URL+value.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);
                $(".nrc_back").append(`<a href='${PDF_URL+value.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View Photo</a>`);
                $("#race").append(value.race);
                $("#religion").append(value.religion);
                $("#date_of_birth").append(value.date_of_birth);
                $("#address").append(value.address);
                $("#current_address").append(value.current_address);
                $("#position").append(value.position);
                $("#department").append(value.department);
                $("#organization").append(value.organization);
                loadEductaionHistory(value.student_info.id);
                //loadSchoolName(value.school_id);
            });
           
            
        }
    });
}

function approveTeacherRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    $.ajax({
        url: BACKEND_URL + "/approve_teacher_register",
        data: 'id='+id+"&status=1",
        type: 'post',
        success: function(result){
            successMessage('You have approved that user!');
            location.href = FRONTEND_URL + '/teacher_registration';
        }
    });
}

function rejectTeacherRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    $.ajax({
        url: BACKEND_URL + "/approve_teacher_register",
        data: 'id='+id+"&status=2",
        type: 'post',
        success: function(result){
            successMessage('You have rejected that user!');
            location.href = '/teacher_registration';
        }
    });
}

  function loadEductaionHistory(student_info_id){
      console.log(student_info_id)
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/getEducationHistory/"+student_info_id,
        success: function(result){
            $.each(result.data, function( index, value ) {
                var tr = "<tr>";
                tr += `<td> ${ index += 1 } </td>`;
                tr += `<td> ${ value.university_name } </td>`;
                tr += `<td><a href='${PDF_URL+value.certificate}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a></td>`;
                tr += "</tr>";
                $("#tbl_degree_body").append(tr);
            });
        }
    });
  }