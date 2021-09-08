function createRequirement(){    
    var send_data=new FormData();
    send_data.append('requirement_name',$("input[name=name]").val());
    // send_data.append('course_id',$('#selected_course_id').val());       
    send_data.append('type',$('#selected_type').val());       
    show_loader();
    $.ajax({
            url: BACKEND_URL+"/requirement",
            type: 'post',
            data:send_data,
            contentType: false,
            processData: false,
            success: function(result){
                EasyLoading.hide();
                successMessage("Insert Successfully");
                location.reload();
        }
    });
    
}

function getRequirement(){
    destroyDatatable("#tbl_requirement", "#tbl_requirement_body");
    var send_data=new FormData();
    send_data.append('name',$("input[name=filter_by_name]").val());
    // send_data.append('course_name',$('#filter_course_id').val());
    $.ajax({
        url: BACKEND_URL+"/filter_requirement",
        type: 'post',
        data:send_data,
        contentType: false,
        processData: false,
        success: function(data){
            
            var requirement_data=data.data;
            requirement_data.forEach(function (element) {  
                console.log('requirement',element); 
                
                var tr = "<tr>";
                tr += "<td>" +  + "</td>";
                tr += "<td ><div class='btn-group'>";
                tr +="<button type='button' class='btn btn-primary btn-xs' onClick='showRequirementInfo(" + element.id + ")'>" +
                     "<li class='fa fa-edit fa-sm'></li></button> ";
                tr += "<button type='button' class='btn btn-danger btn-xs' onClick='deleteRequirementInfo(\"" + encodeURIComponent(element.name) + "\"," + element.id + ")'><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
                tr += "<td>" + element.name + "</td>";
                tr += "<td>" + element.type + "</td>";
                // tr += "<td>" + element.course.name + "</td>"; 
    
                tr += "</tr>";
                $("#tbl_requirement_body").append(tr);         
    
            });
            
            getIndexNumber('#tbl_requirement tr');
            createDataTable("#tbl_requirement");      
        },
        error:function (message){
            dataMessage(message, "#tbl_requirement", "#tbl_requirement_body");        
        }
    
    });
}

function showRequirementInfo(id) {
    
    $("#requirement_form").attr('action', 'javascript:updateRequirement()');    
    $("input[name=requirement_id]").val(id);
    $('#exampleModalLabel').text('Update Requirement')
    $.ajax({
        type: "get",
        url: BACKEND_URL+"/requirement/"+id,
        success: function (data) {
            console.log(data)
            var requirement_data=data.data;  
          
            $('input[name=name]').val(requirement_data.requirement_name);
            // $('#selected_course_id').val(requirement_data[0].course_id);                        
            // $('#selected_type').val(requirement_data.type);                        
            
            $('#create_requirement_model').modal('toggle');
        },

        error:function (message){
            errorMessage(message);
        }
    });
    
}

function updateRequirement(){
    var id= $("input[name=requirement_id]").val();    
    var name=$("input[name=name]").val();
    // var course_id=$("#selected_course_id").val();
    // var type=$("#selected_type").val();
    show_loader();
    $.ajax({
        url: BACKEND_URL+"/requirement/"+id,
        type: 'patch',
        data:{
            requirement_name:name
            // course_id:course_id
            // type:type
        },        
        success: function(result){
            EasyLoading.hide();
            successMessage("Update Successfully");
            $('#create_requirement_model').modal('toggle');        
            location.reload();    
           
            
        
        }
    });
}

function deleteRequirementInfo(requirementName,requirementId){
    var result = confirm("WARNING: This will delete Requirement Name " + decodeURIComponent(requirementName) + " and all related data! Press OK to proceed.");
        show_loader(); 
      if (result) {
        $.ajax({
            type: "DELETE",
            url: BACKEND_URL+'/requirement/'+requirementId,
            success: function (result) {
                EasyLoading.hide();
                successMessage("Delete Successfully");
                location.reload();
               
            },
            error: function (message) {
                errorMessage(message);
            }
        });
    }
}