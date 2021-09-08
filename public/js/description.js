function createDescription(){    
   
    var send_data=new FormData();
    send_data.append('description_name',$('#des_name').val());
    // send_data.append('course_id',$('#selected_course_id').val());       
   show_loader();
    $.ajax({
            url: BACKEND_URL+"/descriptions",
            type: 'post',
            data:send_data,
            contentType: false,
            processData: false,
            success: function(result){
                 EasyLoading.hide();
                successMessage(result.message);
                location.reload();
        }
    });
    
}

// function getRequirement(){
//     destroyDatatable("#tbl_requirement", "#tbl_requirement_body");
//     var send_data=new FormData();
//     send_data.append('name',$("input[name=filter_by_name]").val());
//     // send_data.append('course_name',$('#filter_course_id').val());
//     $.ajax({
//         url: BACKEND_URL+"/filter_requirement",
//         type: 'post',
//         data:send_data,
//         contentType: false,
//         processData: false,
//         success: function(data){
            
//             var requirement_data=data.data;
//             requirement_data.forEach(function (element) {  
//                 console.log('requirement',element); 
                
//                 var tr = "<tr>";
//                 tr += "<td>" +  + "</td>";
//                 tr += "<td ><div class='btn-group'>";
//                 tr +="<button type='button' class='btn btn-primary btn-xs' onClick='showRequirementInfo(" + element.id + ")'>" +
//                      "<li class='fa fa-edit fa-sm'></li></button> ";
//                 tr += "<button type='button' class='btn btn-danger btn-xs' onClick='deleteRequirementInfo(\"" + encodeURIComponent(element.name) + "\"," + element.id + ")'><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
//                 tr += "<td>" + element.name + "</td>";
//                 tr += "<td>" + element.type + "</td>";
//                 // tr += "<td>" + element.course.name + "</td>"; 
    
//                 tr += "</tr>";
//                 $("#tbl_requirement_body").append(tr);         
    
//             });
            
//             getIndexNumber('#tbl_requirement tr');
//             createDataTable("#tbl_requirement");      
//         },
//         error:function (message){
//             dataMessage(message, "#tbl_requirement", "#tbl_requirement_body");        
//         }
    
//     });
// }

function showDescription(id) {
    
    $("#description_form").attr('action', 'javascript:updateDescription()');    
    $("input[name=description_id]").val(id);
    $('#descModalLabel').text('Update Description');
    $.ajax({
        type: "get",
        url: BACKEND_URL+"/descriptions/"+id,
        success: function (data) {
            
            var description_data=data.data;  
            // console.log('show requirement',requirement_data);
                     
            $('#des_name').val(description_data.description_name);
            // $('#selected_course_id').val(requirement_data[0].course_id);                        
                              
            
            $('#create_description_model').modal('toggle');
        },

        error:function (message){
            errorMessage(message);
        }
    });
    
}

function updateDescription(){
    var id= $("input[name=description_id]").val();    
    var name=$("#des_name").val();
    show_loader();
    
    
    $.ajax({
        url: BACKEND_URL+"/descriptions/"+id,
        type: 'patch',
        data:{
            description_name:name,
           
        },        
        success: function(result){
            EasyLoading.hide();
            successMessage(result.message);
            // $('#create_description_model').modal('toggle');        
            location.reload();    
           
        
        }
    });
}

function deleteDescription(description_id){
    var result = confirm("WARNING: This will delete Description  and  Press OK to proceed.");
        if (result) {
            show_loader();
            $.ajax({
                type: "DELETE",
                url: BACKEND_URL+'/descriptions/'+description_id,
                success: function (result) {
                    EasyLoading.hide();
                    
                    successMessage(result.message);
                    location.reload();
                },
                error: function (message) {
                    errorMessage(message);
                }
            });
        }
}