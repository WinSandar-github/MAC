function loadService(){
    var select = document.getElementById("selected_service_id");
    $.ajax({
        url: BACKEND_URL+"/check_service",
        type: 'get',
        data:"",
        success: function(data){
            // console.log(data)
            var course_data=data.data;
            course_data.forEach(function (element) {
                var option = document.createElement('option');
                option.text = element.name;
                option.value = element.id;
                select.add(option, 1);


            });
        },
        error:function (message){

        }

    });
}

function createMentor()
{
    var send_data = new FormData();
    var nrc_state_region = $("#nrc_state_region").val();
    var nrc_township = $("#nrc_township").val();
    var nrc_citizen = $("#nrc_citizen").val();
    send_data.append('name_mm', $("input[name=name_mm]").val());
    send_data.append('name_eng', $("input[name=name_eng]").val());
    send_data.append('nrc_state_region', nrc_state_region);
    send_data.append('nrc_township', nrc_township);
    send_data.append('nrc_citizen', nrc_citizen);
    send_data.append('nrc_number', $("input[name=nrc_number]").val());
    send_data.append('father_name_mm', $("input[name=father_name_mm]").val());
    send_data.append('father_name_eng', $("input[name=father_name_eng]").val());
    send_data.append('race', $("input[name=race]").val());
    send_data.append('religion', $("input[name=religion]").val());
    send_data.append('date_of_birth', $("input[name=date_of_birth]").val());
    send_data.append('education', $("input[name=education]").val());
    send_data.append('ra_cpa_success_year', $("input[name=ra_cpa_success_year]").val());
    send_data.append('ra_cpa_personal_no', $("input[name=ra_cpa_personal_no]").val());
    send_data.append('cpa_reg_no', $("input[name=cpa_reg_no]").val());
    send_data.append('cpa_reg_date', $("input[name=cpa_reg_date]").val());
    send_data.append('ppa_reg_no', $("input[name=ppa_reg_no]").val());
    send_data.append('ppa_reg_date', $("input[name=ppa_reg_date]").val());
    send_data.append('address', $("input[name=address]").val());
    send_data.append('phone_no', $("input[name=phone_no]").val());
    send_data.append('fax_no', $("input[name=fax_no]").val());
    send_data.append('m_email', $("input[name=m_email]").val());
    send_data.append('audit_firm_name', $("input[name=audit_firm_name]").val());
    send_data.append('audit_started_date', $("input[name=audit_started_date]").val());
    send_data.append('audit_structure', $("input[name=audit_structure]").val());
    send_data.append('audit_staff_no', $("input[name=audit_staff_no]").val());
    send_data.append('current_check_service_id',$('#selected_service_id').val());
    send_data.append('current_check_services_other', $("input[name=current_check_services_other]").val());
    $(':radio:checked').map(function(){send_data.append('experience',$(this).val())});
    send_data.append('started_teaching_year', $("input[name=started_teaching_year]").val());
    send_data.append('current_accept_no', $("input[name=current_accept_no]").val());
    send_data.append('trained_trainees_no', $("input[name=trained_trainees_no]").val());
    send_data.append('internship_accept_no', $("input[name=internship_accept_no]").val());
    $(':radio:checked').map(function(){send_data.append('repeat_yearly',$(this).val())});
    $(':radio:checked').map(function(){send_data.append('training_absent',$(this).val())});
    send_data.append('training_absent_reason', $("input[name=training_absent_reason]").val());
    send_data.append('email', $("input[name=email]").val());
    send_data.append('password', $("input[name=password]").val());

    $.ajax({
        url: BACKEND_URL+"/mentor",
        type: 'post',
        data:send_data,
        contentType: false,
        processData: false,
        success: function(result){
            successMessage("You have successfully registerd!");
            location.href = "/mentor_list";
        },
        error:function (message){
            errorMessage(message);
        }
    });
}

// function updateMentor()
// {
//     var id = localStorage.getItem("mentor_id");
//     // console.log(id)
//     var send_data = new FormData();
//     var nrc_state_region = $("#nrc_state_region").val();
//     var nrc_township = $("#nrc_township").val();
//     var nrc_citizen = $("#nrc_citizen").val();
//     send_data.append('name_mm', $("input[name=name_mm]").val());
//     send_data.append('name_eng', $("input[name=name_eng]").val());
//     send_data.append('nrc_state_region', nrc_state_region);
//     send_data.append('nrc_township', nrc_township);
//     send_data.append('nrc_citizen', nrc_citizen);
//     send_data.append('nrc_number', $("input[name=nrc_number]").val());
//     send_data.append('father_name_mm', $("input[name=father_name_mm]").val());
//     send_data.append('father_name_eng', $("input[name=father_name_eng]").val());
//     send_data.append('race', $("input[name=race]").val());
//     send_data.append('religion', $("input[name=religion]").val());
//     send_data.append('date_of_birth', $("input[name=date_of_birth]").val());
//     send_data.append('education', $("input[name=education]").val());
//     send_data.append('ra_cpa_success_year', $("input[name=ra_cpa_success_year]").val());
//     send_data.append('ra_cpa_personal_no', $("input[name=ra_cpa_personal_no]").val());
//     send_data.append('cpa_reg_no', $("input[name=cpa_reg_no]").val());
//     send_data.append('cpa_reg_date', $("input[name=cpa_reg_date]").val());
//     send_data.append('ppa_reg_no', $("input[name=ppa_reg_no]").val());
//     send_data.append('ppa_reg_date', $("input[name=ppa_reg_date]").val());
//     send_data.append('address', $("input[name=address]").val());
//     send_data.append('phone_no', $("input[name=phone_no]").val());
//     send_data.append('fax_no', $("input[name=fax_no]").val());
//     send_data.append('m_email', $("input[name=m_email]").val());
//     send_data.append('audit_firm_name', $("input[name=audit_firm_name]").val());
//     send_data.append('audit_started_date', $("input[name=audit_started_date]").val());
//     send_data.append('audit_structure', $("input[name=audit_structure]").val());
//     send_data.append('audit_staff_no', $("input[name=audit_staff_no]").val());
//     send_data.append('current_check_service_id',$('#selected_service_id').val());
//     send_data.append('current_check_services_other', $("input[name=current_check_services_other]").val());
//     $(':radio:checked').map(function(){send_data.append('experience',$(this).val())});
//     send_data.append('started_teaching_year', $("input[name=started_teaching_year]").val());
//     send_data.append('current_accept_no', $("input[name=current_accept_no]").val());
//     send_data.append('trained_trainees_no', $("input[name=trained_trainees_no]").val());
//     send_data.append('internship_accept_no', $("input[name=internship_accept_no]").val());
//     $(':radio:checked').map(function(){send_data.append('repeat_yearly',$(this).val())});
//     $(':radio:checked').map(function(){send_data.append('training_absent',$(this).val())});
//     send_data.append('training_absent_reason', $("input[name=training_absent_reason]").val());

//     // console.log(send_data)
//     send_data.append('_method', 'PUT');
//     // $.ajax({
//     //     url: BACKEND_URL+"/mentor/"+id,
//     //     type: 'patch',
//     //     data: send_data,
//     //     success: function(result){
//     //         successMessage("Update Successfully");
//     //         location.href = "/mentor_list";
//     //     }
//     // });
//     $.ajax({
//         url: BACKEND_URL+"/mentor/"+id,
//         type: 'post',
//         data:send_data,
//         contentType: false,
//         processData: false,
//         headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), 'Content-Type': 'application/json' },
//         success: function(result){
//             successMessage("Insert Successfully");
//         },
//         error:function (message){
//             console.log(message);
//         }
//     });
// }

$('#updateMentor').submit(function(e){
    e.preventDefault();
    var id = localStorage.getItem("mentor_id");


    var formData = new FormData(this);
    formData.append('_method', 'PATCH');

    $.ajax({
        type: "POST",
        url: BACKEND_URL+"/mentor/"+id,
        contentType: false,
        processData: false,
        data: formData,
        success: function (data) {
            successMessage(data.message);
            location.href = "/mentor_list";


        },
        error:function (message){
        }
    })

})

function loadMentor()
{
    // $("#mentor_form").attr('action', 'javascript:updateMentor()');
    var id = localStorage.getItem("mentor_id");
    $("input[name = mentor_student_id]").val(id);
    $.ajax({
        url: BACKEND_URL + "/mentor/"+id,
        type: 'get',
        data:"",
        success: function(data){
            var mentor_data = data.data;
            $('#name_mm').val(mentor_data.name_mm);
            $("#name_eng").val(mentor_data.name_eng);
            // let nrc = mentor_data.nrc_state_region+"/"+mentor_data.nrc_township+"("+mentor_data.nrc_citizen+")"+mentor_data.nrc_number;
            $("#nrc_state_region").val(mentor_data.nrc_state_region);
            $("#nrc_township").val(mentor_data.nrc_township);
            $("#nrc_citizen").val(mentor_data.nrc_citizen);
            $("#nrc_number").val(mentor_data.nrc_number);
            $("#father_name_mm").val(mentor_data.father_name_mm);
            $("#father_name_eng").val(mentor_data.father_name_eng);
            $("#race").val(mentor_data.race);
            $("#religion").val(mentor_data.religion);
            $("#date_of_birth").val(mentor_data.date_of_birth);
            $("#education").val(mentor_data.education);
            $("#ra_cpa_success_year").val(mentor_data.ra_cpa_success_year);
            $("#ra_cpa_personal_no").val(mentor_data.ra_cpa_personal_no);
            $("#cpa_reg_no").val(mentor_data.cpa_reg_no);
            $("#cpa_reg_date").val(mentor_data.cpa_reg_date);
            $("#ppa_reg_no").val(mentor_data.ppa_reg_no);
            $("#ppa_reg_date").val(mentor_data.ppa_reg_date);
            $("#address").val(mentor_data.address);
            $("#phone_no").val(mentor_data.phone_no);
            $("#fax_no").val(mentor_data.fax_no);
            $("#m_email").val(mentor_data.m_email);
            $("#audit_firm_name").val(mentor_data.audit_firm_name);
            $("#audit_started_date").val(mentor_data.audit_started_date);
            $("#audit_structure").val(mentor_data.audit_structure);
            $("#audit_staff_no").val(mentor_data.audit_staff_no);
            $("#selected_service_id").val(mentor_data.current_check_service_id);

            // validate for other service field
            if(mentor_data.current_check_service_id == 9){
              $(".check-service-other").css('display','block');
              $("#current_check_services_other").val(mentor_data.current_check_services_other);
            }
            else{
              $(".check-service-other").css('display','none');
            }

            // validate for experience radio button checked
            if(mentor_data.experience == 1)
            {
                $('input:radio[name=experience][value=1]').attr('checked',true);
                $('input:radio[name=experience][value=0]').attr('disabled',true);
                $('#start_teaching').css('visibility','visible');
                $('#accept_amount').css('visibility','visible');
                $('#current_accept').css('visibility','visible');
                $('#trained_trainees').css('visibility','visible');
                $('#yearly').css('visibility','visible');
                $('#absent_training').css('visibility','visible');

                $("#started_teaching_year").val(mentor_data.started_teaching_year);
                $("#current_accept_no").val(mentor_data.current_accept_no);
                $("#trained_trainees_no").val(mentor_data.trained_trainees_no);
                $("#internship_accept_no").val(mentor_data.internship_accept_no);
            }
            else{
                $('input:radio[name=experience][value=0]').attr('checked',true);
                $('input:radio[name=experience][value=1]').attr('disabled',true);
                $('#start_teaching').css('visibility','hidden');
                $('#accept_amount').css('visibility','hidden');
                $('#current_accept').css('visibility','hidden');
                $('#trained_trainees').css('visibility','hidden');
                $('#yearly').css('visibility','hidden');
                $('#absent_training').css('visibility','hidden');
            }

            // validate for repeat_yearly radio button checked
            if(mentor_data.repeat_yearly == 1)
            {
              $('input:radio[name=repeat_yearly][value=1]').attr('checked',true);
              $('input:radio[name=repeat_yearly][value=0]').attr('disabled',true);
            }
            else{
              $('input:radio[name=repeat_yearly][value=0]').attr('checked',true);
              $('input:radio[name=repeat_yearly][value=1]').attr('disabled',true);
            }

            // validate for training_absent radio button checked
            if(mentor_data.training_absent == 1)
            {
              $('input:radio[name=training_absent][value=1]').attr('checked',true);
              $('input:radio[name=training_absent][value=0]').attr('disabled',true);
              $('#absent_reason').css('visibility','visible');
              $("#training_absent_reason").val(mentor_data.training_absent_reason);
            }
            else{
              $('input:radio[name=training_absent][value=0]').attr('checked',true);
              $('input:radio[name=training_absent][value=1]').attr('disabled',true);
              $('#absent_reason').css('visibility','hidden');
            }

        }
    });
}


function getMentorList(){
    destroyDatatable("#tbl_mentor", "#tbl_mentor_body");
    var send_data=new FormData();
    send_data.append('name',$("input[name=filter_by_name]").val());
    send_data.append('nrc',$("input[name=filter_by_nrc]").val());
    $.ajax({
        type : 'post',
        url : BACKEND_URL+"/filter_mentor",
        data:send_data,
        contentType: false,
        processData: false,
        success : function(data){
            var m_data = data.data;
            m_data.forEach(function (element) {
                var tr = "<tr>";
                tr += "<td>" +  + "</td>";
                tr += "<td>" + element.name_mm + "</td>";
                tr += "<td>" + element.m_email + "</td>";
                tr += "<td>" + element.phone_no+ "</td>";
                tr += "<td>" + element.nrc_state_region+"/"+element.nrc_township+ "("+element.nrc_citizen+")"+element.nrc_number + "</td>";
                if(element.status == 0){
                  tr += "<td><p class='text-warning'>Pending</p></td>";
                }
                else if(element.status == 1){
                  tr += "<td><p class='text-success'>Approved</p></td>";
                }
                else if(element.status == 2) {
                  tr += "<td><p class='text-danger'>Rejected</p></td>";
                }

                tr += "<td ><div class='btn-group'>";
                if(element.type == "Student"){
                  tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showMentorStudent(" + element.id + ")'>" +
                      "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                }
                else if(element.type == "MAC"){
                  tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showMentor(" + element.id + ")'>" +
                      "<li class='fa fa-edit fa-sm'></li></button><button type='button' class='btn btn-danger btn-xs'><li class='fa fa-trash fa-sm'></li></button></div ></td > ";
                }

                tr += "</tr>";
                $("#tbl_mentor_body").append(tr);
            });
            getIndexNumber('#tbl_mentor tr');
            createDataTableWithAsc("#tbl_mentor");
        }
    });
}

function showMentor(mentorID){
    localStorage.setItem("mentor_id",mentorID);
    // console.log(mentorID);
    location.href=FRONTEND_URL+"/mentor_edit";
}

function showMentorStudent(mentorID){
  localStorage.setItem("mentor_id",mentorID);
  location.href=FRONTEND_URL+"/mentor_student_show";
}

function createForm()
{
    location.href = "/mentor_create";
}

function approveMentorStudent(){
  var id = $("input[name = mentor_student_id]").val();
  $.ajax({
      url: BACKEND_URL + "/approve_mentor_student/"+id,
      type: 'PATCH',
      success: function(result){
          successMessage("You have approved that user!");
          location.href = FRONTEND_URL + "/mentor_list";
      }
  });
}

function rejectMentorStudent(){
  var id = $("input[name = mentor_student_id]").val();
  $.ajax({
      url: BACKEND_URL +"/reject_mentor_student/"+id,
      type: 'patch',
      success: function(result){
          successMessage("You have rejected that user!");
          location.href = FRONTEND_URL + "/mentor_list";
      }
  });
}
