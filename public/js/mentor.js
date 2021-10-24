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
                // console.log(element)
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
    if($("input[name=password]").val()!=$("input[name=confirm_password]").val())
    {
        alert("Your password and confirm password do not match!");
        return;
    }
    var send_data=new FormData();
    //$('#image')[0].files[0];
    var profile_photo = $("input[name=profile_photo]")[0].files[0];
    var nrc_front = $("input[name=nrc_front]")[0].files[0];
    var nrc_back = $("input[name=nrc_back]")[0].files[0];
    var papp_attachment = $("input[name=papp_attachment]")[0].files[0];
    var attachment_file = $("input[name=attachment_file]")[0].files[0];

    send_data.append('profile_photo',profile_photo);
    send_data.append('nrc_front', nrc_front);
    send_data.append('nrc_back', nrc_back);
    send_data.append('papp_attachment', papp_attachment);
    send_data.append('attachment_file', attachment_file);
  
    send_data.append('name_mm', $("input[name=name_mm]").val());
    send_data.append('name_eng', $("input[name=name_eng]").val());
    send_data.append('nrc_state_region', $("#nrc_state_region").val());
    send_data.append('nrc_township', $("#nrc_township ").val());
    send_data.append('nrc_citizen', $("#nrc_citizen").val());
    send_data.append('nrc_number', $("#nrc_number").val());
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
    send_data.append('papp_reg_no', $("input[name=papp_reg_no]").val());
    send_data.append('papp_reg_date', $("input[name=papp_reg_date]").val());
    send_data.append('address', $("textarea[name=address]").val());
    send_data.append('phone_no', $("input[name=phone_no]").val());
    send_data.append('fax_no', $("input[name=fax_no]").val());
    send_data.append('fax_no', $("input[name=fax_no]").val());
    send_data.append('m_email', $("input[name=m_email]").val());
    send_data.append('audit_firm_name', $("input[name=audit_firm_name]").val());
    send_data.append('audit_started_date', $("input[name=audit_started_date]").val());
    send_data.append('audit_structure', $("input[name=audit_structure]").val());
    send_data.append('audit_staff_no', $("input[name=audit_staff_no]").val());
    send_data.append('current_check_service_id',$('#selected_service_id').val());

    send_data.append('current_check_services_other', $("input[name=current_check_services_other]").val());
    //$(':radio:checked').map(function(){send_data.append('experience',$(this).val())});
    send_data.append('experience', $("input[name=experience]:checked").val());
    send_data.append('started_teaching_year', $("input[name=started_teaching_year]").val());
    send_data.append('current_accept_no', $("input[name=current_accept_no]").val());
    send_data.append('trained_trainees_no', $("input[name=trained_trainees_no]").val());
    send_data.append('internship_accept_no', $("input[name=internship_accept_no]").val());
    //$(':radio:checked').map(function(){send_data.append('repeat_yearly',$(this).val())});
    //$(':radio:checked').map(function(){send_data.append('training_absent',$(this).val())});
    send_data.append('repeat_yearly', $("input[name=repeat_yearly]:checked").val());
    send_data.append('training_absent', $("input[name=training_absent]:checked").val());
    send_data.append('training_absent_reason', $("textarea[name=training_absent_reason]").val());
    send_data.append('email', $("input[name=email]").val());
    send_data.append('password', $("input[name=password]").val());
    send_data.append('type', $("input[name=type]").val());
    send_data.append('status', $("input[name=status]").val());

    $.ajax({
        url: BACKEND_URL+"/mentor",
        type: 'post',
        data:send_data,
        contentType: false,
        processData: false,
        success: function(result){
            // successMessage("You have successfully registerd!");
            // location.href = "/mentor_list";
            //EasyLoading.hide();
            successMessage(result.message);
            resetForm("#mentor_register_form");
            location.href = FRONTEND_URL+'/mentor_list';
        },
        error:function (message){
            errorMessage(message);
        }
    });
}

function resetForm(form){
  var form = $(form)[0];
  $(form).removeClass('was-validated');
  form.reset();
}

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

function loadMentorStudent()
{
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
            $("#papp_reg_no").val(mentor_data.papp_reg_no);
            $("#papp_reg_date").val(mentor_data.papp_reg_date);
            $("#address").val(mentor_data.address);
            $("#phone_no").val(mentor_data.phone_no);
            $("#fax_no").val(mentor_data.fax_no);
            $("#m_email").val(mentor_data.m_email);
            $("#audit_firm_name").val(mentor_data.audit_firm_name);
            $("#audit_started_date").val(mentor_data.audit_started_date);
            $("#audit_structure").val(mentor_data.audit_structure);
            $("#audit_staff_no").val(mentor_data.audit_staff_no);
            // $("#selected_service_id").val(mentor_data.current_check_service_id);

            // validate for experience radio button checked
            if(mentor_data.experience == 1)
            {
                $('input:radio[name=experience][value=1]').attr('checked',true);
                $('input:radio[name=experience][value=0]').attr('disabled',true);
                $('#start_teaching').css('display','block');
                $('#accept_amount').css('display','block');
                $('#current_accept').css('display','block');
                $('#trained_trainees').css('display','block');
                $('#yearly').css('display','block');
                $('#absent_training').css('display','block');

                $("#started_teaching_year").val(mentor_data.started_teaching_year);
                $("#current_accept_no").val(mentor_data.current_accept_no);
                $("#trained_trainees_no").val(mentor_data.trained_trainees_no);
                $("#internship_accept_no").val(mentor_data.internship_accept_no);
            }
            else{
                $('input:radio[name=experience][value=0]').attr('checked',true);
                $('input:radio[name=experience][value=1]').attr('disabled',true);
                $('#start_teaching').css('display','none');
                $('#accept_amount').css('display','block');
                $('#current_accept').css('display','none');
                $('#trained_trainees').css('display','none');
                $('#yearly').css('display','block');
                $('#absent_training').css('display','none');
                $("#internship_accept_no").val(mentor_data.internship_accept_no);
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
              $('#absent_reason').css('display','block');
              $("#training_absent_reason").val(mentor_data.training_absent_reason);
            }
            else{
              $('input:radio[name=training_absent][value=0]').attr('checked',true);
              $('input:radio[name=training_absent][value=1]').attr('disabled',true);
              $('#absent_reason').css('display','none');
            }

            var current_check_service = mentor_data.current_check_service_id;
            current_check_service = current_check_service.split(",");

            var current_check_service_data = data.current_check_service;

            var current_check_service_result = [];
            var reach = 0;
            current_check_service_data.forEach(function(data){
              for(var i=0; i<current_check_service.length; i++){

                if(current_check_service[i] == data.id){
                  current_check_service_result.push(" " + data.name + " ");
                }

                if(current_check_service[i] == 9){
                  reach = 1;
                }

              }
            })

            if(reach == 1){
              $("#other_service").css('display','block');
              $("#current_check_services_other").val(mentor_data.current_check_services_other);
            }
            else{
              $("#other_service").css('display','none');
            }

            $("#current_check_service_id").val(current_check_service_result.toString());

            document.getElementById('image').src = PDF_URL + mentor_data.image;
            $(".nrc_front").append(`<a href='${PDF_URL+mentor_data.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View Photo</a>`);
            $(".nrc_back").append(`<a href='${PDF_URL+mentor_data.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'  align="center">View Photo</a>`);
            $(".papp_attachment").append(`<a href='${PDF_URL+mentor_data.papp_attachment}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
            $(".attachment_file").append(`<a href='${PDF_URL+mentor_data.attachment_file}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);

            if(mentor_data.status == 0){
              document.getElementById("approve_reject_btn").style.display = "block";
            }else{
              document.getElementById("approve_reject_btn").style.display = "none";
            }

            if(mentor_data.status == 2){
              $("#reject_reason_row").css('display','block');
              $("#reject_reason").val(mentor_data.reject_reason);
            }
        }
    });
}

function loadMentor()
{
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
                //$('input:radio[name=experience][value=0]').attr('disabled',true);
                $('#start_teaching').css('display','block');
                $('#accept_amount').css('display','block');
                $('#current_accept').css('display','block');
                $('#trained_trainees').css('display','block');
                $('#yearly').css('display','block');
                $('#absent_training').css('display','block');

                $("#started_teaching_year").val(mentor_data.started_teaching_year);
                $("#current_accept_no").val(mentor_data.current_accept_no);
                $("#trained_trainees_no").val(mentor_data.trained_trainees_no);
                $("#internship_accept_no").val(mentor_data.internship_accept_no);
            }
            else{
                $('input:radio[name=experience][value=0]').attr('checked',true);
                $('#start_teaching').css('display','none');
                $('#accept_amount').css('display','none');
                $('#current_accept').css('display','none');
                $('#trained_trainees').css('display','none');
                $('#yearly').css('display','none');
                $('#absent_training').css('display','none');
            }

            // validate for repeat_yearly radio button checked
            if(mentor_data.repeat_yearly == 1)
            {
              $('input:radio[name=repeat_yearly][value=1]').attr('checked',true);
            }
            else{
              $('input:radio[name=repeat_yearly][value=0]').attr('checked',true);
            }

            // validate for training_absent radio button checked
            if(mentor_data.training_absent == 1)
            {
              $('input:radio[name=training_absent][value=1]').attr('checked',true);
              $('#absent_reason').css('display','block');
              $("#training_absent_reason").val(mentor_data.training_absent_reason);
            }
            else{
              $('input:radio[name=training_absent][value=0]').attr('checked',true);
              $('#absent_reason').css('display','none');
            }

        }
    });
}

function getMentorList(){
    destroyDatatable("#tbl_mentor_pending", "#tbl_mentor_pending_body");
    destroyDatatable("#tbl_mentor_approved", "#tbl_mentor_approved_body");
    destroyDatatable("#tbl_mentor_rejected", "#tbl_mentor_rejected_body");
    var send_data=new FormData();
    send_data.append('name',$("input[name=filter_by_name]").val());
    send_data.append('nrc',$("input[name=filter_by_nrc]").val());
    show_loader();
    $.ajax({
        type : 'post',
        url : BACKEND_URL+"/filter_mentor",
        data:send_data,
        contentType: false,
        processData: false,
        success : function(data){
            var m_data = data.data;
            m_data.forEach(function (element) {
                // if(element.status==0){
                //     status="PENDING";
                // }
                // else if(element.status==1){
                //     status="APPROVED";
                // }
                // else{
                //     status="REJECTED";
                // }
                if(element.status==0)
                {
                  var tr = "<tr>";
                  tr += "<td>" +  + "</td>";
                  tr += "<td ><div class='btn-group'>";
                  if(element.type == "Student"){
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showMentorStudent(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                  }
                  else if(element.type == "MAC"){
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showMentor(" + element.id + ")'>" +
                        "<li class='fa fa-edit fa-sm'></li></button><button type='button' class='btn btn-danger btn-xs'><li class='fa fa-trash fa-sm'></li></button></div ></td > ";
                  }
                  tr += "<td>" + element.name_mm + "</td>";
                  tr += "<td>" + element.m_email + "</td>";
                  tr += "<td>" + element.phone_no+ "</td>";
                  tr += "<td>" + element.nrc_state_region+"/"+element.nrc_township+ "("+element.nrc_citizen+")"+element.nrc_number + "</td>";
                  if(element.status == 0){
                    tr += "<td class='text-warning'>Pending</td>";
                  }
                  else if(element.status == 1){
                    tr += "<td class='text-success'>Approved</td>";
                  }
                  else{
                    tr += "<td class='text-danger'>Rejected</td>";
                  }

                  tr += "<td>" + element.type+ "</td>";
                  

                  tr += "</tr>";
                  $("#tbl_mentor_pending_body").append(tr);
              }
              else if(element.status==1)
                {
                  var tr = "<tr>";
                  tr += "<td>" +  + "</td>";
                  tr += "<td ><div class='btn-group'>";
                  if(element.type == "Student"){
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showMentorStudent(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                  }
                  else if(element.type == "MAC"){
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showMentor(" + element.id + ")'>" +
                        "<li class='fa fa-edit fa-sm'></li></button><button type='button' class='btn btn-danger btn-xs'><li class='fa fa-trash fa-sm'></li></button></div ></td > ";
                  }
                  tr += "<td>" + element.name_mm + "</td>";
                  tr += "<td>" + element.m_email + "</td>";
                  tr += "<td>" + element.phone_no+ "</td>";
                  tr += "<td>" + element.nrc_state_region+"/"+element.nrc_township+ "("+element.nrc_citizen+")"+element.nrc_number + "</td>";
                  if(element.status == 0){
                    tr += "<td class='text-warning'>Pending</td>";
                  }
                  else if(element.status == 1){
                    tr += "<td class='text-success'>Approved</td>";
                  }
                  else{
                    tr += "<td class='text-danger'>Rejected</td>";
                  }

                  tr += "<td>" + element.type+ "</td>";
                  

                  tr += "</tr>";
                  $("#tbl_mentor_approved_body").append(tr);
              }
              else if(element.status==2)
                {
                  var tr = "<tr>";
                  tr += "<td>" +  + "</td>";
                  tr += "<td ><div class='btn-group'>";
                  if(element.type == "Student"){
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showMentorStudent(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                  }
                  else if(element.type == "MAC"){
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showMentor(" + element.id + ")'>" +
                        "<li class='fa fa-edit fa-sm'></li></button><button type='button' class='btn btn-danger btn-xs'><li class='fa fa-trash fa-sm'></li></button></div ></td > ";
                  }
                  tr += "<td>" + element.name_mm + "</td>";
                  tr += "<td>" + element.m_email + "</td>";
                  tr += "<td>" + element.phone_no+ "</td>";
                  tr += "<td>" + element.nrc_state_region+"/"+element.nrc_township+ "("+element.nrc_citizen+")"+element.nrc_number + "</td>";
                  if(element.status == 0){
                    tr += "<td class='text-warning'>Pending</td>";
                  }
                  else if(element.status == 1){
                    tr += "<td class='text-success'>Approved</td>";
                  }
                  else{
                    tr += "<td class='text-danger'>Rejected</td>";
                  }

                  tr += "<td>" + element.type+ "</td>";
                  

                  tr += "</tr>";
                  $("#tbl_mentor_rejected_body").append(tr);
              }
            });
            getIndexNumber('#tbl_mentor_pending tr');
            createDataTableWithAsc("#tbl_mentor_pending");
            getIndexNumber('#tbl_mentor_approved tr');
            createDataTableWithAsc("#tbl_mentor_approved");
            getIndexNumber('#tbl_mentor_rejected tr');
            createDataTableWithAsc("#tbl_mentor_rejected");
            EasyLoading.hide();
        }
    });
}

function showMentor(mentorID){
    localStorage.setItem("mentor_id",mentorID);
    location.href=FRONTEND_URL+"/mentor_edit";
}

function showMentorStudent(mentorID){
  localStorage.setItem("mentor_id",mentorID);
  location.href=FRONTEND_URL+"/mentor_student_show";
}

function createForm()
{
    location.href = FRONTEND_URL + "/mentor_create";
}

function approveMentorStudent(){
  if (!confirm('Are you sure you want to approve this mentor?'))
  {
      return;
  }
  else{
      var id = $("input[name = mentor_student_id]").val();
      console.log(id);
      $.ajax({
          url: BACKEND_URL + "/approve_mentor_student/"+id,
          type: 'patch',
          success: function(result){
            console.log(result)
              successMessage("You have approved that user!");
              setInterval(() => {
                location.href = FRONTEND_URL + "/mentor_list";
              }, 3000);
          }
      });
  }
  
}

// function rejectMentorStudent(){
//   if (!confirm('Are you sure you want to reject this mentor?'))
//   {
//       return;
//   }
//   else{
//     var id = $("input[name = mentor_student_id]").val();
//     $.ajax({
//         url: BACKEND_URL +"/reject_mentor_student/"+id,
//         type: 'patch',
//         success: function(result){
//             successMessage("You have rejected that user!");
//             location.href = FRONTEND_URL + "/mentor_list";
//         }
//     });
//   }
// }

function rejectMentorStudent(){
  var id = $("input[name = mentor_student_id]").val();
  var reason=$("#reason").val();
  $.ajax({
      url: BACKEND_URL + "/reject_mentor_student",
      data: 'id='+id+"&reason="+reason,
      type: 'post',
      success: function(result){
          successMessage('You have rejected that user!');
          location.href = FRONTEND_URL + "/mentor_list";
      }
  });
  
}

function showArticle(id){
  $("#mentor_id").val(id);
  $("#showArticleModel").modal('toggle');
  getArticleList();
}

function getArticleList(){
  var id = $('#mentor_id').val();
  $.ajax({
      type: "GET",
      url: BACKEND_URL + "/get_article_list/"+ id,
      success: function (data) {
          $("#show_article_body").html("");
          var r = 1;
          data.forEach(function(element){
            console.log(element);
            var start_date = element.contract_start_date == null ? '-' : element.contract_start_date;
            var end_date = element.contract_end_date == null ? '-' : element.contract_end_date;
            var cpersonal_no = element.student_info.cpersonal_no == null ? '-' : element.student_info.cpersonal_no;
            var tr = "<tr>";
            tr += "<td class='alignright'>" + r + "</td>";
            tr += "<td>" + element.student_info.name_eng + "</td>";
            tr += "<td>" + cpersonal_no + "</td>";
            tr += "<td>" + start_date + "</td>";
            tr += "<td>" + end_date + "</td>";
            tr += "<td>" + element.article_form_type + "</td>";
            tr += "</tr>";
            r = r + 1;
            $("#show_article_body").append(tr);
          })
    $('#show_article_table').DataTable({
      'destroy': true,
      'paging': true,
      'lengthChange': false,
      "pageLength": 5,
      'searching': true,
      'info': false,
      'autoWidth': true,
      "scrollX": false,
    });
      },
      error: function (message) {
          EasyLoading.hide();
          errorMessage(message);
      }
  });
}