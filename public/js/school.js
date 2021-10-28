function getSchoolRegisterList(){
    destroyDatatable("#tbl_school_pending", "#tbl_school_pending_body");
    destroyDatatable("#tbl_school_approved", "#tbl_school_approved_body");
    destroyDatatable("#tbl_school_rejected", "#tbl_school_rejected_body");
    var send_data=new FormData();
    send_data.append('name',$("input[name=filter_by_name]").val());
    send_data.append('nrc',$("input[name=filter_by_nrc]").val());  
    show_loader();
    $.ajax({
        type : 'post',
        url : BACKEND_URL+"/filter_school",
        data:send_data,
        contentType: false,
        processData: false,
        success : function(data){
            let indexNo1 = 0;
            let indexNo2 = 0;
            let indexNo3 = 0;
            data.data.map((obj)=> {
                let nrc = obj.nrc_state_region+"/"+obj.nrc_township+"("+obj.nrc_citizen+")"+obj.nrc_number;
                if(obj.approve_reject_status==0){
                    var tr = "<tr>";
                    tr += `<td> ${ indexNo1 += 1 } </td>`;
                    tr += `<td><a href=${FRONTEND_URL+'/school_edit?id='+obj.id} class='btn btn-primary btn-sm'><i class='fa fa-eye fa-sm'></i></a> </td>`;
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
                    $("#tbl_school_pending_body").append(tr);
                }
                else if(obj.approve_reject_status==1){
                    var tr = "<tr>";
                    tr += `<td> ${ indexNo2 += 1 } </td>`;
                    tr += `<td><a href=${FRONTEND_URL+'/school_edit?id='+obj.id} class='btn btn-primary btn-sm'><i class='fa fa-eye fa-sm'></i></a> </td>`;
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
                    $("#tbl_school_approved_body").append(tr);
                }
                else if(obj.approve_reject_status==2){
                    var tr = "<tr>";
                    tr += `<td> ${ indexNo3 += 1 } </td>`;
                    tr += `<td><a href=${FRONTEND_URL+'/school_edit?id='+obj.id} class='btn btn-primary btn-sm'><i class='fa fa-eye fa-sm'></i></a> </td>`;
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
                    $("#tbl_school_rejected_body").append(tr);
                }
            });
            createDataTableWithAsc("#tbl_school_pending");
            createDataTableWithAsc("#tbl_school_approved");
            createDataTableWithAsc("#tbl_school_rejected");
            EasyLoading.hide();
        }
    });
}

function getSchoolInfos(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
   
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/school/"+id,
        success : function(data){
            if(data.data.initial_status==0){
                $('.form-class').hide();
            }else{
                $('.form-name').append('ကျောင်းပုံစံ-၆');
            }
            $('#student_info_id').val(data.data.student_info_id);
            document.getElementById('image').src = PDF_URL + data.data.profile_photo;
            $("#name").append(data.data.name_mm+"/"+data.data.name_eng);
            let nrc = data.data.nrc_state_region+"/"+data.data.nrc_township+"("+data.data.nrc_citizen+")"+data.data.nrc_number;
            $("#nrc").append(nrc);
            // $("#type").append(data.data.type.replace(/,/g,' / '));
            $("#father").append(data.data.father_name_eng+"/"+data.data.father_name_mm);
            
            let dob =  new Date(data.data.date_of_birth);
            // let formatDate = dob.getMonth() + 1 + '-' + dob.getDate() + '-' + dob.getFullYear();
            $("#date_of_birth").append(data.data.date_of_birth);
            $("#degree").append(data.data.degree);
            $("#address").append(data.data.address);
            $("#eng_address").append(data.data.eng_address);
            $("#phone").append(data.data.phone);
            $("#email").append(data.data.email);
            $("#hidden_attach").val(data.data.attachment);
            $('.school_fee').show();
            if(data.data.approve_reject_status != 0){
                $("#approve_reject").hide();
                $('#cessation-btn').show();
                
            }else{
                $("#approve_reject").show();
            }
            $(".nrc_front").append(`<a href='${PDF_URL+data.data.nrc_front}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01 "></i></a>`);
            $(".nrc_back").append(`<a href='${PDF_URL+data.data.nrc_back}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a>`);
            //loadEductaionHistory(data.data.id,data.initial_status);
            if(data.data.initial_status==0){
                loadEductaionHistory(data.data.id,data.data.initial_status);
            }else{
                loadEductaionHistory(data.data.student_info_id,data.data.initial_status);
            }
            if(data.data.attachment!=null){
                $('.view-attachment').show();
                removeBracketed(data.data.attachment,"attachment");
            }
            if(data.data.own_type_letter!=null){
                $('.view-own_type_letter').show();
                removeBracketed(data.data.own_type_letter,"own_type_letter");
            }
            
            if(data.data.school_name!=null){
                $('.school_name-class').show();
                $("#school_name").val(data.data.school_name);
            }else{
                $('.school_name-class').hide();
                $("#school_name").val(data.data.renew_school_name);
            }
            if(data.data.school_address!=null){
                $('.school_address-class').show();
                $("#school_address").val(data.data.school_address);
                $("#eng_school_address").val(data.data.eng_school_address);
            }else{
                $("#school_address").val(data.data.renew_school_address);
                $("#eng_school_address").val(data.data.eng_school_address);
            }
            if(data.data.school_location_attach!=null){
                $('.view-school_location_attach').show();
                $("#school_location_attach").append(`<a href='${PDF_URL+data.data.school_location_attach}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01 "></i></a>`);
            }
            if(data.data.attend_course!=null && data.data.attend_course.replace(/[\'"[\]']+/g, '')!="null"){
                $('.attend_course-class').show();
                loadStudentCourse(data.data.attend_course.replace(/[\'"[\]']+/g, ''));
            }else{
                loadStudentCourse(data.data.renew_course.replace(/[\'"[\]']+/g, ''));
            }
            if(data.data.own_type!=null){
                $('.own_type-class').hide();
                if(data.data.own_type== "private"){
                    $('#'+data.data.own_type).prop("checked", true);
                    $('input[id=rent]').attr('disabled', 'disabled');
                    $('input[id=use_sharing]').attr('disabled', 'disabled');
                    
                   
                }else if(data.data.own_type== "rent"){
                    $('#'+data.data.own_type).prop("checked", true);
                    $('input[id=private]').attr('disabled', 'disabled');
                    $('input[id=use_sharing]').attr('disabled', 'disabled');
                    
                   
                }else{
                    $('#'+data.data.own_type).prop("checked", true);
                    $('input[id=private]').attr('disabled', 'disabled');
                    $('input[id=rent]').attr('disabled', 'disabled');
                }
            }
            var school_branch=data.data.school_branch;
            if(school_branch.length!=0){
                $('.branch-class').show();
                $.each(school_branch, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index += 1 } </td>`;
                    tr += `<td> ${ value.branch_school_address } </td>`;
                    tr += `<td><a href='${PDF_URL+value.branch_school_attach}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                    //tr += `<td> ${ value.branch_sch_own_type } </td>`;
                    if(value.branch_sch_own_type=="private"){
                        tr += "<td ><input disabled type='radio' checked >"+
                              " <label class='form-check-label'>ကိုယ်ပိုင်</label>"+
                             "<input disabled type='radio' >"+
                              "<label class='form-check-label'> အငှား</label>"+
                              "<input disabled type='radio'>"+
                            " <label class='form-check-label'>တွဲဖက်သုံး</label></td>";
                      }else if(value.branch_sch_own_type=="rent"){
                        tr += "<td ><input disabled type='radio' >"+
                              " <label class='form-check-label'>ကိုယ်ပိုင်</label>"+
                             "<input disabled type='radio' checked >"+
                              "<label class='form-check-label'>အငှား</label>"+
                              "<input disabled type='radio'>"+
                            " <label class='form-check-label'>တွဲဖက်သုံး</label></td>";
                      }else{
                        tr += "<td ><input disabled type='radio' >"+
                        " <label class='form-check-label'>ကိုယ်ပိုင်</label>"+
                       "<input disabled type='radio'  >"+
                        " <label class='form-check-label'>အငှား</label>"+
                        "<input disabled type='radio' checked>"+
                      " <label class='form-check-label'>တွဲဖက်သုံး</label></td>";
                      }
            
                    tr += `<td><a href='${PDF_URL+value.branch_sch_letter}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                    tr += "</tr>";
                    $(".tbl_branch_school_body").append(tr);
                });
                createDataTable('.tbl_branch_school');
            }
            if(data.data.business_license!=null && data.data.sch_establish_notes_attach!=null){
                $('.all_file').show();
                removeBracketed(data.data.business_license,"business_license");
                removeBracketed(data.data.sch_establish_notes_attach,"sch_establish_notes_attach");
            }
            if(data.data.business_license!=null && data.data.sch_establish_notes_attach==null){
                $('.all_file').show();
                $('.all_file1').show();
                removeBracketed(data.data.business_license,"business_license");
            }
            if(data.data.business_license==null && data.data.sch_establish_notes_attach!=null){
                $('.all_file').show();
                $('.all_file2').show();
                removeBracketed(data.data.sch_establish_notes_attach,"sch_establish_notes_attach");
            }
            var school_establishers=data.data.school_establishers;
            if(school_establishers.length!=0){
                $('.sch_established').show();
                $.each(school_establishers, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index += 1 } </td>`;
                    tr += `<td> ${ value.name } </td>`;
                    tr += `<td> ${ value.nrc } </td>`;
                    tr += `<td> ${ value.cpa_papp_no } </td>`;
                    tr += `<td> ${ value.education } </td>`;
                    tr += `<td> ${ value.address } </td>`;
                    tr += `<td> ${ value.ph_number } </td>`;
                    tr += `<td> ${ value.email } </td>`;
                    tr += "</tr>";
                    $(".tbl_sch_established_persons_body").append(tr);
                });
                createDataTable('.tbl_sch_established_persons');
            }
            var school_governs=data.data.school_governs;
            if(school_governs.length!=0){
                $('.sch_governs').show();
                $.each(school_governs, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index += 1 } </td>`;
                    tr += `<td> ${ value.name } </td>`;
                    tr += `<td> ${ value.nrc } </td>`;
                    tr += `<td> ${ value.cpa_papp_no } </td>`;
                    tr += `<td> ${ value.education } </td>`;
                    tr += `<td> ${ value.responsibility } </td>`;
                    tr += `<td> ${ value.ph_number } </td>`;
                    tr += `<td> ${ value.email } </td>`;
                    tr += "</tr>";
                    $(".tbl_sch_governs_body").append(tr);
                });
                createDataTable('.tbl_sch_governs');
            }
            var school_members=data.data.school_members;
            if(data.data.type!=null){
                
                if(school_members.length!=0){
                    $('.organization').show();
                    $.each(school_members, function( index, value ) {
                        var tr = "<tr>";
                        tr += `<td> ${ index += 1 } </td>`;
                        tr += `<td> ${ value.name } </td>`;
                        tr += `<td> ${ value.nrc } </td>`;
                        tr += `<td> ${ value.cpa_papp_no } </td>`;
                        tr += `<td> ${ value.education } </td>`;
                        tr += `<td> ${ value.responsibility } </td>`;
                        tr += `<td> ${ value.ph_number } </td>`;
                        tr += `<td> ${ value.email } </td>`;
                        tr += "</tr>";
                        $(".tbl_member_list_biography_body").append(tr);
                    });
                    createDataTable('.tbl_member_list_biography');
                }
            }
            var school_teachers=data.data.school_teachers;
            if(school_teachers.length!=0){
                $('.teacher-css').show();
                $.each(school_teachers, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index += 1 } </td>`;
                    tr += `<td> ${ value.registration_no } </td>`;
                    tr += `<td> ${ value.name } </td>`;
                    tr += `<td> ${ value.nrc } </td>`;
                    tr += `<td> ${ value.education } </td>`;
                    tr += `<td> ${ value.subject } </td>`;
                    tr += `<td> ${ value.ph_number } </td>`;
                    tr += `<td> ${ value.email } </td>`;
                    tr += `<td><a href='${PDF_URL+value.teacher_reg_copy}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                    tr += "</tr>";
                    $(".tbl_teacher_list_biography_body").append(tr);
                });
                createDataTable('.tbl_teacher_list_biography');
            }
            
            var bulding_type=data.data.bulding_type;
            if(bulding_type.length!=0){
                $('.bulding').show();
                $.each(bulding_type, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index += 1 } </td>`;
                    tr += `<td> ${ value.bulding_type } </td>`;
                    tr += `<td> ${ value.building_measurement } </td>`;
                    tr += `<td> ${ value.floor_numbers } </td>`;
                    tr += `<td><a href='${PDF_URL+value.school_building_attach}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                    tr += "</tr>";
                    $(".tbl_bulding_type_body").append(tr);
                });
                createDataTable('.tbl_bulding_type');
            }
            var classroom=data.data.classroom;
            if(classroom.length!=0){
                $('.classroom').show();
                $.each(classroom, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index += 1 } </td>`;
                    tr += `<td> ${ value.classroom_number } </td>`;
                    tr += `<td> ${ value.classroom_measurement } </td>`;
                    tr += `<td> ${ value.student_num_limit } </td>`;
                    tr += `<td> ${ value.air_con } </td>`;
                    tr += `<td><a href='${PDF_URL+value.classroom_attach}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                    tr += "</tr>";
                    $(".tbl_classroom_body").append(tr);
                });
                createDataTable('.tbl_classroom');
            }
            var toilet_type=data.data.toilet_type;
            if(toilet_type.length!=0){
                $('.toilet').show();
                $.each(toilet_type, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index += 1 } </td>`;
                    tr += `<td> ${ value.toilet_type } </td>`;
                    tr += `<td> ${ value.toilet_number } </td>`;
                    tr += `<td><a href='${PDF_URL+value.toilet_attach}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                    tr += "</tr>";
                    $(".tbl_toilet_type_body").append(tr);
                });
                createDataTable('.tbl_toilet_type');
            }
            
            var manage_room_numbers=data.data.manage_room_numbers;
            if(manage_room_numbers.length!=0){
                $('.manage_room').show();
                $.each(manage_room_numbers, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index += 1 } </td>`;
                    tr += `<td> ${ value.manage_room_numbers } </td>`;
                    tr += `<td> ${ value.manage_room_measurement } </td>`;
                    tr += `<td><a href='${PDF_URL+value.manage_room_attach}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                    tr += "</tr>";
                    $(".tbl_manage_room_numbers_body").append(tr);
                });
                createDataTable('.tbl_manage_room_numbers');
            }
            
            if(data.data.type!=null){
                $('.school-type').show();
                if($("input:radio[name=school_type1]").val()==data.data.type){
                    $('input:radio[name=school_type1]').attr('checked',true);
                    $('input:radio[name=school_type2]').attr('disabled', 'disabled');
                    $('input:radio[name=school_type3]').attr('disabled', 'disabled');
                    $('input:radio[name=school_type4]').attr('disabled', 'disabled');
                }
                if($("input:radio[name=school_type2]").val()==data.data.type){
                    $('input:radio[name=school_type2]').attr('checked',true);
                    $('input:radio[name=school_type1]').attr('disabled', 'disabled');
                    $('input:radio[name=school_type3]').attr('disabled', 'disabled');
                    $('input:radio[name=school_type4]').attr('disabled', 'disabled');
                }
                if($("input:radio[name=school_type3]").val()==data.data.type){
                    $('input:radio[name=school_type3]').attr('checked',true);
                    $('input:radio[name=school_type2]').attr('disabled', 'disabled');
                    $('input:radio[name=school_type1]').attr('disabled', 'disabled');
                    $('input:radio[name=school_type4]').attr('disabled', 'disabled');
                }
                if($("input:radio[name=school_type4]").val()==data.data.type){
                    $('input:radio[name=school_type4]').attr('checked',true);
                    $('input:radio[name=school_type2]').attr('disabled', 'disabled');
                    $('input:radio[name=school_type3]').attr('disabled', 'disabled');
                    $('input:radio[name=school_type1]').attr('disabled', 'disabled');
                }
                
                if(data.data.last_registration_fee_year!=null){
                    $('.last_year').show();
                    $('#last_registration_fee_year').append(data.data.last_registration_fee_year);
                }
                if(data.data.request_for_temporary_stop!=null){
                    $('.request_stop').show();
                    $('input:radio[name='+data.data.request_for_temporary_stop+']').attr('checked',true);
                }
                if(data.data.request_for_temporary_stop=='yes'){
                    $('.request_stop_yes').show();
                    $('#request_from_to_date').append(data.data.from_request_stop_date);
                }
                if(data.data.school_card!=null){
                    $('.school_card_class').show();
                    $("#school_card").append(`<a href='${PDF_URL+data.data.school_card}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01 "></i></a>`);
                }
            }
            loadInvoice(data.data.id,data.data.initial_status);
            
            
        }
    });
}

function approveSchoolRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    var student_info_id=$('#student_info_id').val();
    let offline_user = url.searchParams.get("offline_user");
    var check = confirm("Are you sure?");
    if (check == true) {
        $.ajax({
            url: BACKEND_URL + "/approve_school_register",
            data: 'id='+id+"&student_info_id="+student_info_id,
            type: 'post',
            success: function(result){
                successMessage(result.message);
                if(offline_user == 'true'){
                    location.href = FRONTEND_URL + '/offline_user';
                }else{
                    location.href = FRONTEND_URL + '/school_registration';
                }
                
            }
        });
    }
    
}

function rejectSchoolRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    var student_info_id=$('#student_info_id').val();
    let offline_user = url.searchParams.get("offline_user");
    var reason=$("#reason").val();
    $.ajax({
        url: BACKEND_URL + "/reject_school_register",
        data: 'id='+id+"&student_info_id="+student_info_id+"&reason="+reason,
        type: 'post',
        success: function(result){
            successMessage(result.message);
            if(offline_user == 'true'){
                location.href = FRONTEND_URL + '/offline_user';
            }else{
                location.href = FRONTEND_URL + '/school_registration';
            }
        }
    });
    
}

function viewAttach(){
    $(".attachment").html("");
    let content="";
    let i=0;
    content += `<div>`;
    url = PDF_URL + "/storage/attachment/" + $("#hidden_attach").val();
    content += `<embed src=${url} width="100%" height="500px" />`;
    content += `</div>`;
    console.log(content);
    $(".attachment").append(content);
    $("#exampleModal").modal('toggle');
}
function loadEductaionHistory(id,status){
    if(status==0){
        $.ajax({
            type : 'POST',
            url : BACKEND_URL+"/getEducationHistory",
            data: 'school_id='+id,
            success: function(result){
                $.each(result.data, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index += 1 } </td>`;
                    tr += `<td> ${ value.degree_name } </td>`;
                    tr += `<td><a href='${PDF_URL+value.certificate}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                    tr += "</tr>";
                    $("#tbl_degree_body").append(tr);
                });
                createDataTable('#tbl_degree');
            }
        });
    }else{
        $.ajax({
            type : 'POST',
            url : BACKEND_URL+"/getEducationHistory",
            data: 'schoolstudent_info_id='+id,
            success: function(result){
                $.each(result.data, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index += 1 } </td>`;
                    tr += `<td> ${ value.degree_name } </td>`;
                    tr += `<td><a href='${PDF_URL+value.certificate}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                    tr += "</tr>";
                    $("#tbl_degree_body").append(tr);
                });
                createDataTable('#tbl_degree');
            }
        });
    }  
    
    
}
function removeBracketed(file,divname){
    var new_file=file.replace(/[\'"[\]']+/g, '');
    var split_new_file=new_file.split(',');
    for(var i=0;i<split_new_file.length;i++){
        var file=`<a href='${PDF_URL+'/storage/student_info/'+split_new_file[i]}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a>`;
        $("."+divname).append(file);
      }
}
function loadStudentCourse(course_id){
    
    var course=course_id.split(',');
    var all_course=[];
   
    $.each(course, function( index, id ){
      
      $.ajax({
        type: "get",
        url: BACKEND_URL+"/course/"+id,
        success: function (result) {
          var data=result.data;
          var newcode=data.code.split('_');
            var course_code=convert(newcode[1]);
          all_course.push(newcode[0].toUpperCase()+' '+course_code);
          $("#attend_course").val(all_course.toString());
          
        }
        
      })
      
    })
    
}
function cessationSchoolRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    var student_info_id=$('#student_info_id').val();
    var cessation_reason=$("#cessation_reason").val();
    let offline_user = url.searchParams.get("offline_user");
    $.ajax({
        url: BACKEND_URL + "/cessation_school_register",
        data: 'id='+id+"&status=2"+"&student_info_id="+student_info_id+"&cessation_reason="+cessation_reason+"&initial_status="+$('#initial_status').val(),
        type: 'post',
        success: function(result){
            successMessage('You have cessation that user!');
            if(offline_user == 'true'){
                location.href = FRONTEND_URL + '/offline_user';
            }else{
                location.href = FRONTEND_URL + '/school_registration';
            }
        }
    });
    
    
}
function addZero(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
  }
function loadSchoolCard(){
    var characters = [
		{mm:'က',eng:'Ka'},
		{mm:'ခ' ,eng:'Kha'},
		{mm:'ဂ' ,eng:'Ga'},
		{mm:'ဃ' ,eng:'Gha'},
		{mm:'င' ,eng:'Nga'},
		{mm:'စ' ,eng:'Sa'},
		{mm:'ဆ' ,eng: 'Hsa'},
		{mm:'ဇ' ,eng: 'Za'},
		{mm:'ဈ',eng: 'Zha'},
		{mm:'ည' ,eng: 'Nya'},
		{mm:'ဎ',eng: 'Dd'},
		{mm:'ဏ' ,eng: 'Nha'},
		{mm:'တ' ,eng: 'Ta'},
		{mm:'ထ' ,eng: 'Hta'},
		{mm:'ဒ' ,eng: 'Da'},
		{mm:'ဓ',eng: 'Dha'},
		{mm:'န' ,eng: 'Na'},
		{mm:'ပ' ,eng: 'Pa'},
		{mm:'ဖ' ,eng: 'Pha'},
		{mm:'ဗ' ,eng: 'Bha'},
		{mm:'ဘ',eng : 'Ba'},
		{mm:'မ' ,eng:'Ma'},
		{mm:'ယ',eng: 'Ya'},
		{mm:'ရ' ,eng: 'Ra'},
		{mm:'လ' ,eng: 'La'},
		{mm:'ဝ' ,eng: 'Wa'},
		{mm:'သ',eng: 'Tha'},
		{mm:'ဟ',eng: 'Ha'},
		{mm:'ဠ' ,eng: 'Ll'},
		{mm:'အ',eng: 'Ah'},
		{mm:'ဥ' ,eng: 'U'},
		{mm:'ဧ' ,eng: 'E'}
	];
    var regions_states = [
        {
			region_en: '0',			// 'Kachin'
			region_mm : '၀',			// 'ကချင်ပြည်နယ်'
		},
		{
			region_en: '1',			// 'Kachin'
			region_mm : '၁',			// 'ကချင်ပြည်နယ်'
		},
		{
			
			region_en : '2',			// 'Kayah'
			region_mm : '၂'			// ကယားပြည်နယ်
		},
		{
			
			region_en: '3',			// 'Kayin'
			region_mm: '၃'			// 'ကရင်ပြည်နယ်'
		},
		{
			
			region_en : '4',			// 'Chin'
			region_mm : '၄'			//	'ချင်းပြည်နယ်'
		},
		{
			
			region_en : '5',			// 'Sagaing'
			region_mm : '၅'			//	'စစ်ကိုင်းတိုင်း'
		},
		{
			
			region_en : '6',			// 'Tanintharyi'
			region_mm : '၆'			//	'တနင်္သာရီတိုင်း'
		},
		{
			
			region_en: '7',			// 'Bago'
			region_mm : '၇'			//	'ပဲခူးတိုင်း'
		},
		{
			
			region_en : '8',			// 'Magway'
			region_mm :'၈'			//	'မကွေးတိုင်း'
		},
		{
			
			region_en : '9',			// 'Mandalay'
			region_mm : '၉'			//	'မန္တလေးတိုင်း'
		},
		{
			
			region_en : '10',		// 'Mon'
			region_mm : '၁၀'			//	'မွန်ပြည်နယ်'
		},
		{
			
			region_en : '11',		// 'Rakhine'
			region_mm : '၁၁'			//	'ရခိုင်ပြည်နယ်'
		},
		{
			
			region_en : '12',		//	'Yangon'
			region_mm : '၁၂'			//	'ရန်ကုန်တိုင်း'
		},
		{
			
			region_en : '13',		// 'Shan'
			region_mm : '၁၃'			//	'ရှမ်းပြည်နယ်'
		},
		{
			
			region_en : '14',		// 'Ayeyawady'
			region_mm : '၁၄'			//	'ဧရာဝတီတိုင်း'
        }
	];
    var citizens = [
		{
			citizen_en : 'N',
			citizen_mm: 'နိုင်'
		},
		{
			citizen_en: 'E',
			citizen_mm: 'ဧည့်'
		},
		{
			citizen_en: 'P',
			citizen_mm: 'ပြု'
		},
	];
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
   
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/school/"+id,
        success : function(data){
            
            console.log(data.data)
            if(data.data.from_valid_date!=null){
                var today = new Date(data.data.from_valid_date);
                var date = addZero(today.getDate())+'-'+addZero(today.getMonth()+1)+'-'+today.getFullYear();
                document.getElementById('regno_date').innerHTML=data.data.s_code+'/'+date;
           
            }else{
                
                if(data.data.initial_status==0){
                    var invoiceNo="init_sch"+data.data.id;
                    $.ajax({
                        type : 'POST',
                        url : BACKEND_URL+"/getTotalAmount",
                        data: 'invoiceNo='+invoiceNo,
                        success: function(result){
                            //document.getElementById('regno_date').innerHTML=data.data.s_code+'/'+data.data.from_valid_date;
                            
                        }
                    })
                }
            }
            
            if(data.data.school_name!=null){
                document.getElementById('school_name').innerHTML=data.data.school_name;
            }else{
                document.getElementById('school_name').innerHTML=data.data.renew_school_name;
            }
            if(data.data.eng_school_address!=null){
                document.getElementById('school_location').innerHTML=data.data.eng_school_address;
            }else{
                document.getElementById('school_location').innerHTML=data.data.renew_school_address;
            }
            
            if($("input:radio[name=school_type1]").val()==data.data.type){
                $('input:radio[name=school_type1]').attr('checked',true);
                $('input:radio[name=school_type2]').attr('disabled', 'disabled');
                $('input:radio[name=school_type3]').attr('disabled', 'disabled');
                $('input:radio[name=school_type4]').attr('disabled', 'disabled');
            }
            if($("input:radio[name=school_type2]").val()==data.data.type){
                $('input:radio[name=school_type2]').attr('checked',true);
                $('input:radio[name=school_type1]').attr('disabled', 'disabled');
                $('input:radio[name=school_type3]').attr('disabled', 'disabled');
                $('input:radio[name=school_type4]').attr('disabled', 'disabled');
            }
            if($("input:radio[name=school_type3]").val()==data.data.type){
                $('input:radio[name=school_type3]').attr('checked',true);
                $('input:radio[name=school_type2]').attr('disabled', 'disabled');
                $('input:radio[name=school_type1]').attr('disabled', 'disabled');
                $('input:radio[name=school_type4]').attr('disabled', 'disabled');
            }
            if($("input:radio[name=school_type4]").val()==data.data.type){
                $('input:radio[name=school_type4]').attr('checked',true);
                $('input:radio[name=school_type2]').attr('disabled', 'disabled');
                $('input:radio[name=school_type3]').attr('disabled', 'disabled');
                $('input:radio[name=school_type1]').attr('disabled', 'disabled');
            }
            document.getElementById('founder_name').innerHTML=data.data.name_eng;
                var result = regions_states.filter( obj => obj.region_mm === data.data.nrc_state_region)[0];
                var nrc_state_region_eng=result.region_en;
                
                var nrc_township_eng=[];
                for(var i=0;i<data.data.nrc_township.length;i++){
                var result = characters.filter( obj => obj.mm === data.data.nrc_township[i])[0];
                    nrc_township_eng.push(result.eng);
                }
                var result = citizens.filter( obj => obj.citizen_mm === data.data.nrc_citizen)[0];
                var nrc_citizen_eng=result.citizen_en;

                var nrc_number_eng=[];
                for(var i=0;i<data.data.nrc_number.length;i++){
                var result = regions_states.filter( obj => obj.region_mm === data.data.nrc_number[i])[0];
                    nrc_number_eng.push(result.region_en);
                }
                var nrc_eng=nrc_state_region_eng+'/'+nrc_township_eng.join('')+'('+nrc_citizen_eng+')'+nrc_number_eng.join('');
                document.getElementById('founder_csc').innerHTML=nrc_eng;
                if(data.data.attend_course.replace(/[\'"[\]']+/g, '')!="null"){
                    loadStudentCourseByCard(data.data.attend_course.replace(/[\'"[\]']+/g, ''));
                }else{
                    loadStudentCourseByCard(data.data.renew_course.replace(/[\'"[\]']+/g, ''));
                }
                
                loadInvoice(data.data.id,data.data.initial_status,"expiry_date");
                console.log(data.data.id);
                loadSchoolBranch(data.data.id,'tbl_branch');
                //console.log(data);
                // var school_branch=data.data.school_branch;
                // $.each(school_branch, function( index, value ) {
                //     document.getElementById('branch_address').innerHTML=value.branch_school_address;
                // })  
        }
    })
}
function loadStudentCourseByCard(course_id){
   
        $.ajax({
            type: "get",
            url: BACKEND_URL+"/get_courses",//course/+id
            success: function (result) {
             
            $.each(result.data,function(i,v){
               
                if(v.course_type_id !=3){
                    [a, b] = v.code.split('_');
                    
                $("#course").append( '<input type="checkbox" id='+v.id+' value='+v.id+' > '+a.toUpperCase()+' '+ number2roma(b));
               }
                
              })
                              
            var course=course_id.split(',');
            $.each(course, function( index, val ){
                $('#'+val).prop("checked", true);
            })
            }
            
        })
       
}
function number2roma(num){
    if(num){
      var nums = {1: 'I', 2: 'II', 3: 'III', 4: 'IV', 5: 'V', 6: 'VI', 7: 'VII', 8: 'VIII', 9: 'IX'};
      return num.toString().replace(/([0-9])/g, function (s, key) {
      return nums[key] || s;
    });
    }
    
  }
function loadInvoice(id,status,table_col){
    
    if(status==0){
        var invoiceNo="init_sch"+id;
        $.ajax({
            type : 'POST',
            url : BACKEND_URL+"/getTotalAmount",
            data: 'invoiceNo='+invoiceNo,
            success: function(result){
                var fee=[];
                $.each(result.data, function( index, val ){
                   $('#fee_name').append(val.productDesc.replace(",School Registration", ""));
                   $('#fee').append(val.amount);
                   fee.push(val.amount.split(','));
                  
                })
                let sum = 0;

                for (let i = 0; i < fee[0].length; i++) {
                    sum += parseInt(fee[0][i]);
                    
                }
                $('#total_fee').append(thousands_separators(sum));
                if(table_col=="expiry_date"){
                    $.each(result.data, function( index, val ){
                    
                        var valid_date=new Date(val.dateTime);
                         var date=(valid_date.getFullYear())+3;
                        // document.getElementById(table_col).innerHTML="31-12-"+date;
                     })
                }
                
                
            }
        });
    }else{
        var invoiceNo="renew_sch"+id;
        $.ajax({
            type : 'POST',
            url : BACKEND_URL+"/getTotalAmount",
            data: 'invoiceNo='+invoiceNo,
            success: function(result){
                var fee=[];
                $.each(result.data, function( index, val ){
                   $('#fee_name').append(val.productDesc.replace(",School Registration", ""));
                   $('#fee').append(val.amount);
                   fee.push(val.amount.split(','));
                   
                })
                let sum = 0;

                for (let i = 0; i < fee[0].length; i++) {
                    sum += parseInt(fee[0][i]);
                    
                }
                $('#total_fee').append(thousands_separators(sum));
                if(table_col=="expiry_date"){
                    $.each(result.data, function( index, val ){
                        if(val.dateTime!=null){
                            var now=new Date();
                            if((now.getMonth()+1)==10 ||(now.getMonth()+1)==11 || (now.getMonth()+1)==12){
                                document.getElementById(table_col).innerHTML="12-31-"+(now.getFullYear()+4);
                            }else if((now.getMonth()+1)==01){
                                document.getElementById(table_col).innerHTML="12-31-"+(now.getFullYear()+3);
                            }
                        }
                        var valid_date=new Date(val.dateTime);
                         var date=(valid_date.getFullYear())+3;
                         //document.getElementById(table_col).innerHTML="31-12-"+date;
                        
                    })
                }
                
                
            }
        });
    }
    
}
function loadSchoolBranch(id,table){
    
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/getSchoolBranch/"+id,
        success : function(data){
          
            $.each(data.data, function( index, value ){
                console.log(value.branch_school_address);
                var tr="<tr>";
                tr += '<td>'+value.branch_school_address+'</td>';
                tr += "</tr>";
                $("table#"+table).append(tr);
            })
        }
    })
}