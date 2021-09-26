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
            console.log(data.data)
            document.getElementById('image').src = PDF_URL + data.data.profile_photo;
            $("#name").append(data.data.name_mm+"/"+data.data.name_eng);
            let nrc = data.data.nrc_state_region+"/"+data.data.nrc_township+"("+data.data.nrc_citizen+")"+data.data.nrc_number;
            $("#nrc").append(nrc);
            // $("#type").append(data.data.type.replace(/,/g,' / '));
            $("#father_name_eng").append(data.data.father_name_eng);
            $("#father_name_mm").append(data.data.father_name_mm);
            let dob =  new Date(data.data.date_of_birth);
            // let formatDate = dob.getMonth() + 1 + '-' + dob.getDate() + '-' + dob.getFullYear();
            $("#date_of_birth").append(data.data.date_of_birth);
            $("#degree").append(data.data.degree);
            $("#address").append(data.data.address);
            $("#phone").append(data.data.phone);
            $("#email").append(data.data.email);
            $("#hidden_attach").val(data.data.attachment);
            console.log($("#hidden_attach").val());
            if(data.data.approve_reject_status != 0){
                $("#approve_reject").hide();
            }
            else{
                $("#approve_reject").show();
            }
            $(".nrc_front").append(`<a href='${PDF_URL+data.data.nrc_front}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01 "></i></a>`);
            $(".nrc_back").append(`<a href='${PDF_URL+data.data.nrc_back}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a>`);
            loadEductaionHistory(data.data.student_info.id);
            removeBracketed(data.data.attachment,"attachment");
            $("#school_name").append(data.data.school_name);
            $("#school_address").append(data.data.school_address);
            $("#school_location_attach").append(`<a href='${PDF_URL+data.data.school_location_attach}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01 "></i></a>`);
            //loadStudentCourse(data.data.attend_course.replace(/[\'"[\]']+/g, ''));
            $('#'+data.data.own_type).prop("checked", true);
            //loadSchoolBranch(data.data.id);
            var school_branch=data.data.school_branch;
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
            removeBracketed(data.data.business_license,"business_license");
            removeBracketed(data.data.sch_establish_notes_attach,"sch_establish_notes_attach");
            var school_establishers=data.data.school_establishers;
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
            var school_governs=data.data.school_governs;
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
            
            if(data.data.type!=null){
                $('.organization').show();
            }
            var school_members=data.data.school_members;
            if(school_members.length!=0){
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
            }
            
            var school_teachers=data.data.school_teachers;
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
            var bulding_type=data.data.bulding_type;
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
            var classroom=data.data.classroom;
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
            var toilet_type=data.data.toilet_type;
            $.each(toilet_type, function( index, value ) {
                var tr = "<tr>";
                tr += `<td> ${ index += 1 } </td>`;
                tr += `<td> ${ value.toilet_type } </td>`;
                tr += `<td> ${ value.toilet_number } </td>`;
                tr += `<td><a href='${PDF_URL+value.toilet_attach}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                tr += "</tr>";
                $(".tbl_toilet_type_body").append(tr);
            });
            var manage_room_numbers=data.data.manage_room_numbers;
            $.each(manage_room_numbers, function( index, value ) {
                var tr = "<tr>";
                tr += `<td> ${ index += 1 } </td>`;
                tr += `<td> ${ value.manage_room_numbers } </td>`;
                tr += `<td> ${ value.manage_room_measurement } </td>`;
                tr += `<td><a href='${PDF_URL+value.manage_room_attach}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                tr += "</tr>";
                $(".tbl_manage_room_numbers_body").append(tr);
            });
            $('#student_info_id').val(data.data.student_info.id);
        }
    });
}

function approveSchoolRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    var student_info_id=$('#student_info_id').val();
    $.ajax({
        url: BACKEND_URL + "/approve_school_register",
        data: 'id='+id+"&student_info_id="+student_info_id,
        type: 'post',
        success: function(result){
            successMessage(result.message);
            location.href = FRONTEND_URL + '/school_registration';
        }
    });
}

function rejectSchoolRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    $.ajax({
        url: BACKEND_URL + "/reject_school_register/"+id,
        type: 'post',
        success: function(result){
            successMessage(result.message);
            location.href = '/school_registration';
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
function loadEductaionHistory(student_info_id){
      
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/getEducationHistory/"+student_info_id,
        success: function(result){
            $.each(result.data, function( index, value ) {
                var tr = "<tr>";
                tr += `<td> ${ index += 1 } </td>`;
                tr += `<td> ${ value.university_name } </td>`;
                tr += `<td><a href='${PDF_URL+value.certificate}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                tr += "</tr>";
                $("#tbl_degree_body").append(tr);
            });
        }
    });
  }
  function removeBracketed(file,divname){
    var new_file=file.replace(/[\'"[\]']+/g, '');
    var split_new_file=new_file.split(',');
    for(var i=0;i<split_new_file.length;i++){
        var file=`<a href='${PDF_URL+'//storage/student_info/'+split_new_file[i]}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a>`;
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
          all_course.push(data.name);
          
          //var $newOption = $("<option selected='selected'></option>").val(data.id).text(data.name);
          //$("#attend_course").append(all_course);
          
        }
        
      })
      //console.log(all_course.join());
    })
    
  }
//   function loadSchoolBranch(school_id){
      
//     $.ajax({
//         type : 'GET',
//         url : BACKEND_URL+"/getSchoolBracnh/"+school_id,
//         success: function(result){
//             $.each(result.data, function( index, value ) {
//                 var tr = "<tr>";
//                 tr += `<td> ${ index += 1 } </td>`;
//                 tr += `<td> ${ value.university_name } </td>`;
//                 tr += `<td><a href='${PDF_URL+value.certificate}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
//                 tr += "</tr>";
//                 $("#tbl_degree_body").append(tr);
//             });
//         }
//     });
//   }