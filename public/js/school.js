function getSchoolRegisterList(){
    destroyDatatable("#tbl_school", "#tbl_school_body");
    var send_data=new FormData();
    send_data.append('name',$("input[name=filter_by_name]").val());
    send_data.append('nrc',$("input[name=filter_by_nrc]").val());  
    $.ajax({
        type : 'post',
        url : BACKEND_URL+"/filter_school",
        data:send_data,
        contentType: false,
        processData: false,
        success : function(data){
            let indexNo = 0;
            data.data.map((obj)=> {
                let nrc = obj.nrc_state_region+"/"+obj.nrc_township+"("+obj.nrc_citizen+")"+obj.nrc_number;
                var tr = "<tr>";
                tr += `<td> ${ indexNo += 1 } </td>`;
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
                tr += `<td><a href=${FRONTEND_URL+'/school_edit?id='+obj.id} class='btn btn-primary btn-sm'><i class='fa fa-eye fa-sm'></i></a> </td>`;
                tr += "</tr>";
                $("#tbl_school_body").append(tr);
            });
            createDataTableWithAsc("#tbl_school");
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
            $("#name_eng").append(data.data.name_eng);
            $("#name_mm").append(data.data.name_mm);
            let nrc = data.data.nrc_state_region+"/"+data.data.nrc_township+"("+data.data.nrc_citizen+")"+data.data.nrc_number;
            $("#nrc").append(nrc);
            $("#type").append(data.data.type.replace(/,/g,' / '));
            $("#father_name_eng").append(data.data.father_name_eng);
            $("#father_name_mm").append(data.data.father_name_mm);
            let dob =  new Date(data.data.date_of_birth);
            let formatDate = dob.getMonth() + 1 + '-' + dob.getDate() + '-' + dob.getFullYear();
            $("#date_of_birth").append(formatDate);
            $("#degree").append(data.data.degree);
            $("#address").append(data.data.address);
            $("#phone").append(data.data.phone);
            $("#email").append(data.data.email);
            console.log(data.data.attachment);
            $("#hidden_attach").val(data.data.attachment);
            console.log($("#hidden_attach").val());
            if(data.data.approve_reject_status != 0){
                $("#approve_reject").hide();
            }
            else{
                $("#approve_reject").show();
            }
           
        }
    });
}

function approveSchoolRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    $.ajax({
        url: BACKEND_URL + "/approve_school_register/"+id,
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
    url = PDF_URL + "/storage/attachment/school/" + $("#hidden_attach").val();
    content += `<embed src=${url} width="100%" height="500px" />`;
    content += `</div>`;
    console.log(content);
    $(".attachment").append(content);
    $("#exampleModal").modal('toggle');
}