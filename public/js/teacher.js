function getTeacherRegisterList(){
    destroyDatatable("#tbl_teacher", "#tbl_teacher_body");
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
            let indexNo = 0;
            data.data.map((obj)=> {
                let nrc = obj.nrc_state_region+"/"+obj.nrc_township+"("+obj.nrc_citizen+")"+obj.nrc_number;
                var tr = "<tr>";
                tr += `<td> ${ indexNo += 1 } </td>`;
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
                $("#tbl_teacher_body").append(tr);
            });
            createDataTableWithAsc("#tbl_teacher");
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
    // let id = url.searchParams.get("id");
    var id = localStorage.getItem("teacher_id");
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/teacher/"+id,
        success : function(data){
            $("#name_eng").append(data.data.name_eng);
            $("#name_mm").append(data.data.name_mm);
            let nrc = data.data.nrc_state_region+"/"+data.data.nrc_township+"("+data.data.nrc_citizen+")"+data.data.nrc_number;
            $("#nrc").append(nrc);
            $("#father_name_eng").append(data.data.father_name_eng);
            $("#father_name_mm").append(data.data.father_name_mm);
            $("#phone").append(data.data.phone);
            $("#email").append(data.data.email);
            var degrees = data.data.degrees.split(',');
            var certificates = data.data.certificates.split(',');
            var diplomas = data.data.diplomas.split(',');
            $.each(degrees, function( index, value ) {
                var tr = "<tr>";
                tr += `<td> ${ index += 1 } </td>`;
                tr += `<td> ${ value } </td>`;
                tr += "</tr>";
                $("#tbl_degree_body").append(tr);
            });
            $.each(certificates, function( index, value ) {
                var tr = "<tr>";
                tr += `<td> ${ index += 1 } </td>`;
                tr += `<td> ${ value } </td>`;
                tr += "</tr>";
                $("#tbl_certificate_body").append(tr);
            });
            $.each(diplomas, function( index, value ) {
                var tr = "<tr>";
                tr += `<td> ${ index += 1 } </td>`;
                tr += `<td> ${ value } </td>`;
                tr += "</tr>";
                $("#tbl_diploma_body").append(tr);
            });
            if(data.data.approve_reject_status != 0){
                $("#approve_reject").hide();
            }
            else{
                $("#approve_reject").show();
            }
            $("#exp_desc").append(data.data.exp_desc);
            if(data.data.gov_employee == 1){
                $('input:radio[name=radio1]').attr('checked',true);
                $('input[name="radio2"]').attr('disabled', 'disabled');
            }
            else{
                $('input:radio[name=radio2]').attr('checked',true);
                $('input[name="radio1"]').attr('disabled', 'disabled');
            }
           
        }
    });
}

function approveTeacherRegister(){
    let result = window.location.href;
    let url = new URL(result);
    //let id = url.searchParams.get("id");
    var id = localStorage.getItem("teacher_id");
    console.log({id});
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
