function createEsignUser(){    
    var esign_file = $("input[name=esign_file]")[0].files[0];
    var send_data=new FormData();
    send_data.append('name',$("input[name=name]").val());
    send_data.append('position',$("input[name=position]").val());  
    send_data.append('esign_file',esign_file);
    show_loader();
    $.ajax({
            url: BACKEND_URL+"/esign",
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

function getEsign(){
    destroyDatatable("#tbl_esign", "#tbl_esign_body");
    var send_data=new FormData();
    send_data.append('name',$("input[name=filter_by_name]").val());
    // send_data.append('course_name',$('#filter_course_id').val());
    $.ajax({
        url: BACKEND_URL+"/filter_esign",
        type: 'post',
        data:send_data,
        contentType: false,
        processData: false,
        success: function(data){
            
            var esign_data=data.data;
            esign_data.forEach(function (element) {  
                // console.log('esign',element); 
                
                var tr = "<tr>";
                tr += "<td>" +  + "</td>";
                tr += "<td ><div class='btn-group'>";
                tr +="<button type='button' class='btn btn-primary btn-xs' onClick='showEsignInfo(" + element.id + ")'>" +
                     "<li class='fa fa-edit fa-sm'></li></button> ";
                tr += "<button type='button' class='btn btn-danger btn-xs' onClick='deleteEsignInfo(\"" + encodeURIComponent(element.name) + "\"," + element.id + ")'><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
                tr += "<td>" + element.name + "</td>";
                tr += "<td>" + element.position + "</td>";
                // tr += "<td>" + element.course.name + "</td>"; 
    
                tr += "</tr>";
                $("#tbl_esign_body").append(tr);         
    
            });
            
            getIndexNumber('#tbl_esign tr');
            createDataTable("#tbl_esign");      
        },
        error:function (message){
            dataMessage(message, "#tbl_esign", "#tbl_esign_body");        
        }
    
    });
}

function showEsignInfo(id) {
    
    $("#esign_form").attr('action', 'javascript:updateEsign()');    
    $("input[name=esign_id]").val(id);
    $('#exampleModalLabel').text('Update Esign')
    $.ajax({
        type: "get",
        url: BACKEND_URL+"/esign/"+id,
        success: function (data) {
            // console.log(data)
            var esign_data=data.data;  
          
            $('input[name=name]').val(esign_data.name);                    
            $('input[name=position]').val(esign_data.position);  
            document.getElementById('esign_file').src=BASE_URL + esign_data.esign_file;                  
            // $('input[name=esign_file]').val(esign_data.esign_file);                    
            
            $('#create_esign_model').modal('toggle');
        },

        error:function (message){
            errorMessage(message);
        }
    });
    
}

function updateEsign(){
    var id= $("input[name=esign_id]").val();    
    var name=$("input[name=name]").val();
    var position=$("input[name=position]").val();
    var esign_file = $("input[name=esign_file]")[0].files[0];
    let formData = new FormData();
    console.log(name);
    console.log(position)
    formData.append('name',name);
    formData.append('position', position);
    formData.append('esign_file',esign_file);
    formData.append('_method','PUT');
    show_loader();

    $.ajax({
        url: BACKEND_URL+"/esign/"+id,
        type: 'post',
        data:formData,
        contentType: false,
        processData: false,       
        success: function(result){
            EasyLoading.hide();
            successMessage("Update Successfully");
            $('#create_esign_model').modal('toggle');        
            location.reload();  
        }
    });
}

function deleteEsignInfo(esignName,esignId){
    var result = confirm("WARNING: This will delete Name " + decodeURIComponent(esignName) + " and all related data! Press OK to proceed.");
        show_loader(); 
      if (result) {
        $.ajax({
            type: "DELETE",
            url: BACKEND_URL+'/esign/'+esignId,
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