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
                $("#name").append(value.name_eng+'/'+value.name_mm);
                
                let nrc = value.nrc_state_region+"/"+value.nrc_township+"("+value.nrc_citizen+")"+value.nrc_number;
                $("#nrc").append(nrc);
                $("#father").append(value.father_name_eng+'/'+value.father_name_mm);
                
                $("#phone").append(value.phone);
                $("#email").append(value.email);
                
                if(value.certificates.search(/[\'"[\]']+/g)==0){
                    loadCertificates(value.certificates.replace(/[\'"[\]']+/g, ''),value.payment_method,"#tbl_certificate");
                    loadCertificates(value.diplomas.replace(/[\'"[\]']+/g, ''),value.payment_method,"#tbl_diploma");
                    
                }else{
                    loadCertificates(value.certificates,value.payment_method,"#tbl_certificate");
                    loadCertificates(value.diplomas,value.payment_method,"#tbl_diploma");
                }
                
                
                
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
                    if(value.recommend_letter!=""){
                        $(".recommend_letter").append(`<a href='${PDF_URL+value.recommend_letter}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a>`);
                    }
                   
                }
                else{
                    $('input:radio[name=radio2]').attr('checked',true);
                    $('input[name="radio1"]').attr('disabled', 'disabled');
                    $('.recommend_row').hide();
                }
                $(".nrc_front").append(`<a href='${PDF_URL+data.data.nrc_front}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01 "></i></a>`);
                $(".nrc_back").append(`<a href='${PDF_URL+data.data.nrc_back}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a>`);
                $("#race").append(value.race);
                $("#religion").append(value.religion);
                $("#date_of_birth").append(value.date_of_birth);
                $("#address").append(value.address);
                $("#current_address").append(value.current_address);
                $("#position").append(value.position);
                $("#department").append(value.department);
                $("#organization").append(value.organization);
                loadEductaionHistory(value.student_info.id);
                if(value.school_type==0){
                    $("#school_name").append("Individual");
                }else{
                   loadSchoolName(value.school_id);
                }
                if(value.payment_method!=null){
                    $('.period').show();
                    var now=new Date();
                    var period_date=value.renew_date.split('-');
                    var period=period_date[2]+'-'+period_date[1]+'-'+period_date[0];
                    $('#period_time').text(period+" to 31-12-"+now.getFullYear());
                }
                $('#student_info_id').val(value.student_info.id);
                $('#teacher_id').val(value.id);
            });
           
            
        }
    });
}

function approveTeacherRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    var student_info_id=$('#student_info_id').val();
    var teacher_id=$('#teacher_id').val();
    var check = confirm("Are you sure?");
    if (check == true) {
        $.ajax({
            url: BACKEND_URL + "/approve_teacher_register",
            data: 'id='+id+"&status=1"+"&student_info_id="+student_info_id,
            type: 'post',
            success: function(result){
                successMessage('You have approved that user!');
                location.href = FRONTEND_URL + '/teacher_registration';
            }
        });
    }
    
}

function rejectTeacherRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    var student_info_id=$('#student_info_id').val();
    var teacher_id=$('#teacher_id').val();
    var check = confirm("Are you sure?");
    if (check == true) {
        $.ajax({
            url: BACKEND_URL + "/approve_teacher_register",
            data: 'id='+id+"&status=2"+"&student_info_id="+student_info_id,
            type: 'post',
            success: function(result){
                successMessage('You have rejected that user!');
                location.href = '/teacher_registration';
            }
        });
    } 
    
}

  function loadCertificates(name,payment_status,tbody){
    var name=name.split(',');
    // return name;
    var row=0;
    var payment_status;
    if(payment_status!=null){
        payment_status="ပြီး";
    }else{
        payment_status="မပြီး";
    }
    $.each(name, function( index, id ){
        $.ajax({
            url : BACKEND_URL+"/getSubject",
            data: 'subject_id='+id,
            type: 'post',
            success: function (result) {
                $.each(result.data, function( index, value ){
                        if(index=='cpa_1' || index=='cpa_2'){
                            $.each(value, function(key, val){
                                var tr = "<tr>";
                                tr += `<td> ${ row += 1 } </td>`;
                                tr += `<td> ${ index.toUpperCase().replace("_", " ") } </td>`;
                                tr += `<td> ${ val.subject_name } </td>`;
                                tr += `<td>30000 </td>`;
                                tr += `<td>`+payment_status +`</td>`;
                                tr += "</tr>";
                                $(tbody).append(tr);
                            });
                            
                        }else{
                            $.each(value, function(key, val){
                                var tr = "<tr>";
                                tr += `<td> ${ row += 1 } </td>`;
                                tr += `<td> ${ index.toUpperCase().replace("_", " ") } </td>`;
                                tr += `<td> ${ val.subject_name } </td>`;
                                tr += `<td>20000 </td>`;
                                tr += `<td>`+payment_status +`</td>`;
                                tr += "</tr>";
                                $(tbody).append(tr);
                            });
                            
                        }
                        
                    
                    
                    
                });
            },
            error: function (result) {
            },
        });
    });
}
function loadSchoolName(school_id){
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/school/"+school_id,
        success: function (result) {
            $('#school_name').append(result.data.school_name);
        }
    });    
}