function showArticle(id){
    localStorage.setItem("article_id",id);
    location.href=FRONTEND_URL+"/article_show";
}

function loadArticle()
{
    var id = localStorage.getItem("article_id");
    $("input[name = article_id]").val(id);
    $.ajax({
        url: BACKEND_URL + "/acc_app/"+id,
        type: 'get',
        data:"",
        success: function(data){
            var student_info=data.student_info;

            var student_reg = student_info.student_register
            var lastest_row = student_reg.length - 1;
            var course = student_reg[lastest_row].course.code;  // cpa1/cpa2
            var exam_result = student_reg[lastest_row].status;  // pass/fail
            var module = student_reg[lastest_row].module;  // module 1/2/all
            var type = student_reg[lastest_row].type;  //  0-self_study / 1-private / 2-mac

            if(course == "cpa_1"){
                $("#course_name").text("ပထမပိုင်း");
            }else{
                $("#course_name").text("ဒုတိယပိုင်း");
            }

            if(module == 1){
                $("#module_name").text("1");
            }else if(module == 2){
                $("#module_name").text("2");
            }else{
                $("#module_name").text("အားလုံး");
            }
            
            if(type == 0){
                $("#type_name").text("ကိုယ်တိုင်လေ့လာသင်ယူသူအဖြစ်");
            }else if(type == 1){
                $("#type_name").text("ကိုယ်ပိုင်စာရင်းကိုင်သင်တန်ကျောင်း");
            }else{
                $("#type_name").text("သင်တန်းကျောင်း");
            }

            if(exam_result == 0){
                $("#result_name").text("တက်ရောက်နေ");
            }else if(exam_result == 1){
                $("#result_name").text("အောင်မြင်");
            }else{
                $("#result_name").text("ကျရုံး");
                $("#renew_row").show();
                document.getElementById('request_label').innerHTML="၃။";
            }


            $('#name_mm').val(student_info.name_mm);
            $("#name_eng").val(student_info.name_eng);
            $("#personal_no").val(student_info.personal_no);
            $("#nrc_state_region").val(student_info.nrc_state_region);
            $("#nrc_township").val(student_info.nrc_township);
            $("#nrc_citizen").val(student_info.nrc_citizen);
            $("#nrc_number").val(student_info.nrc_number);
            $("#father_name_mm").val(student_info.father_name_mm);
            $("#father_name_eng").val(student_info.father_name_eng);
            $("#race").val(student_info.race);
            $("#religion").val(student_info.religion);
            $("#date_of_birth").val(student_info.date_of_birth);
            $("#education").val(student_info.student_education_histroy.degree_name);
            $("#address").val(student_info.address);
            $("#phone_no").val(student_info.phone);
            $("#m_email").val(student_info.m_email);
            $("#papp_name").val(data.request_papp);
            if(data.ex_papp == null){
                document.getElementById("previous_papp_name_row").style.display = "none";
            }else{
                $("#previous_papp_name").val(data.ex_papp);
                $("#previous_papp_start_date").val(data.exp_start_date);
                $("#previous_papp_end_date").val(data.exp_end_date);
                document.getElementById("previous_papp_name_row").style.display = "block";
                document.getElementById("previous_papp_date_row").style.display = "block";
            }
            if(data.exam_pass_date == null || data.exam_pass_batch == null){
                document.getElementById("previous_exam_pass_row").style.display = "none";
            }else{
                $("#pass_date").val(data.exam_pass_date);
                $("#pass_no").val(data.exam_pass_batch);
                document.getElementById("previous_exam_pass_row").style.display = "block";
            }
            $("#pass_date").val(data.request_papp);
            $("#pass_no").val(data.request_papp);

            if(data.apprentice_exp == 1)
            {
                $('input:radio[name=experience][value=1]').attr('checked',true);
                $('input:radio[name=experience][value=0]').attr('disabled',true);
                $('#exp_attach_row').css('display','block');
                let apprentice_exp_file = JSON.parse(data.apprentice_exp_file);
                $.each(apprentice_exp_file, function (fileCount, fileName) {

                    $(".exp_attachment").append(`<a href='${PDF_URL + fileName}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'>View File</a>`);

                })
            }
            else{
              $('input:radio[name=experience][value=0]').attr('checked',true);
              $('input:radio[name=experience][value=1]').attr('disabled',true);
              $('#exp_attach_row').css('display','none');
            }

            if(data.gov_staff == 1)
            {
              $('input:radio[name=gov_staff][value=1]').attr('checked',true);
              $('input:radio[name=gov_staff][value=0]').attr('disabled',true);
              $('#gov_staff_row').css('display','block');
              $("#position").val(data.gov_position);
              $("#gov_joining_date").val(data.gov_joining_date);
            }
            else{
              $('input:radio[name=gov_staff][value=0]').attr('checked',true);
              $('input:radio[name=gov_staff][value=1]').attr('disabled',true);
              $('#gov_staff_row').css('display','none');
            }

            document.getElementById('image').src = PDF_URL + student_info.image;
            $(".nrc_front").append(`<a href='${PDF_URL+student_info.nrc_front}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View Photo</a>`);
            $(".nrc_back").append(`<a href='${PDF_URL+student_info.nrc_back}' style='display:block; font-size:16px;text-decoration: none;' target='_blank'  align="center">View Photo</a>`);

            if(data.status == 0){
              document.getElementById("approve_reject_btn").style.display = "block";
            }else{
              document.getElementById("approve_reject_btn").style.display = "none";
            }
        }
    });
}

function approveArticle(){
    if (!confirm('Are you sure you want to approve this article?'))
    {
        return;
    }
    else{
        var id = $("input[name = article_id]").val();
        console.log(id);
        $.ajax({
            url: BACKEND_URL + "/approve_article/"+id,
            type: 'patch',
            success: function(result){
                successMessage("You have approved that user!");
                setInterval(() => {
                location.href = FRONTEND_URL + "/article_list";
                }, 3000);
            }
        });
    }
}
  
function rejectArticle(){
    if (!confirm('Are you sure you want to reject this article?'))
    {
        return;
    }
    else{
        var id = $("input[name = article_id]").val();
        $.ajax({
            url: BACKEND_URL +"/reject_article/"+id,
            type: 'patch',
            success: function(result){
                successMessage("You have rejected that user!");
                location.href = FRONTEND_URL + "/article_list";
            }
        });
    }
}