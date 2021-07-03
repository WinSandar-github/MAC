function createBatch(){    
    var send_data=new FormData();
    send_data.append('name',$("input[name=name]").val());
    send_data.append('course_id',$('#selected_course_id').val());
    send_data.append('start_date',$("input[name=start_date]").val());
    send_data.append('end_date',$("input[name=end_date]").val());
    send_data.append('accept_application_date',$("input[name=acc_app_date]").val());

    $.ajax({
            url: "/api/batch",
            type: 'post',
            data:send_data,
            contentType: false,
            processData: false,
            success: function(result){                 
                successMessage("Insert Successfully");
                location.reload();
        }
    });
}

function getBatch(){
    destroyDatatable("#tbl_batch", "#tbl_batch_body");    
    $.ajax({
        url: "/api/batch",
        type: 'get',
        data:"",
        success: function(data){
            var course_data=data.data;
            
            course_data.forEach(function (element) {     
                var tr = "<tr>";
                tr += "<td>" +  + "</td>";
                tr += "<td>" + element.name + "</td>";
                tr += "<td>" + element.course.name + "</td>";
                tr += "<td>" + element.start_date + "</td>";
                tr += "<td>" + element.end_date + "</td>";
                tr += "<td>" + element.accept_application_date + "</td>";
            
                tr += "<td ><div class='btn-group'>";
                tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showBatchInfo(" + element.id + ")'>" +
                    "<li class='fa fa-edit fa-sm'></li></button> ";
                tr += "<button type='button' class='btn btn-danger btn-xs' onClick='deleteBatchInfo(\"" + encodeURIComponent(element.name) + "\"," + element.id + ")'><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
    
                tr += "</tr>";
                $("#tbl_batch_body").append(tr);         
    
            });
            
            getIndexNumber('#tbl_batch tr');
            createDataTable("#tbl_batch");      
        },
        error:function (message){
            dataMessage(message, "#tbl_batch", "#tbl_batch_body");        
        }
    
    });
}

function showBatchInfo(id) {
    
    $("#batch_form").attr('action', 'javascript:updateBatch()');    
    $("input[name=batch_id]").val(id);
    $.ajax({
        type: "get",
        url: "/api/batch/"+id,
        success: function (data) {
            var batch_data=data.data;                     
            $('input[name=name]').val(batch_data[0].name);
            $('#selected_course_id').val(batch_data[0].course_id);
            $('input[name=start_date]').val(batch_data[0].start_date);
            $('input[name=end_date]').val(batch_data[0].end_date);
            $('input[name=acc_app_date]').val(batch_data[0].accept_application_date);            
            
            $('#create_batch_model').modal('toggle');
        },

        error:function (message){
            errorMessage(message);
        }
    });    
}

function updateBatch(){
    var id= $("input[name=batch_id]").val();    
    var name=$("input[name=name]").val();
    var course_id=$("#selected_course_id").val();
    var start_date=$("input[name=start_date]").val();
    var end_date=$("input[name=end_date]").val();
    var accept_application_date=$("input[name=acc_app_date]").val();  
   
    $.ajax({
        url: "/api/batch/"+id,
        type: 'patch',
        data:{
            name:name,
            course_id:course_id,
            start_date:start_date,
            end_date:end_date,
            accept_application_date:accept_application_date
        },        
        success: function(result){
            successMessage("Update Successfully");
            $('#create_batch_model').modal('toggle');            
            getBatch();
        
        }
    });
}

function deleteBatchInfo(batchName,batchId){
    var result = confirm("WARNING: This will delete Batch Name " + decodeURIComponent(batchName) + " and all related data! Press OK to proceed.");
        if (result) {
            $.ajax({
                type: "DELETE",
                url: '/api/batch/'+batchId,
                success: function (result) {
                    successMessage("Delete Successfully");
                    getBatch();
                },
                error: function (message) {
                    errorMessage(message);
                }
            });
        }
}