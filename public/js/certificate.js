function showEsignList(id) {
	$.ajax({
	    url: BACKEND_URL + '/check_esignId/' + id,
	    type: 'GET',
	    success: function(data) {
	    	// console.log("hello",data)
	    	var firm_data = data.data[0];
	    	if(firm_data.esign_id != null){
	    		localStorage.setItem("Status", 1);
	    		localStorage.setItem("id", id);

	    		if(firm_data.audit_firm_type_id == 2 && firm_data.local_foreign_type == 1){
	    			location.href = FRONTEND_URL + "/get_non_audit_card/" + id + "/" + firm_data.esign_id;
	    		}else if(firm_data.audit_firm_type_id == 2 && firm_data.local_foreign_type == 2){
	    			location.href = FRONTEND_URL + "/get_non_audit_foreign_card/" + id + "/" + firm_data.esign_id;
	    		}else{
	    			location.href = FRONTEND_URL + "/get_audit_card/" + id + "/" + firm_data.esign_id;
	    		}
	    	}else{
	    		// alert("hello")
	    		$('#esign_modal').modal('toggle');
	    		getOption();
	    		localStorage.setItem("id", id);
	    	}
	    }
	});
    
}

// $(document).ready(function(){
	// $(".select_name").on('change', function(){   
	// 	var name = $('.select_name').find(":selected").text();
	// 	$.ajax({
	// 	    url: BACKEND_URL + '/get_esignId/' + name,
	// 	    type: 'GET',
	// 	    success: function(data) {
	// 	    	var esign_data = data.data;
	// 	    	$('#position_div').css('display','block');
	// 	    	$('#image_div').css('display','block');
	// 	    	$('#position').val(esign_data.position);
	// 	    	document.getElementById('esign_file').src=BASE_URL + esign_data.esign_file; 
	// 	    }
		    	
	// 	});
	// });
// });

function getOption(){
	$.ajax({
	    url: BACKEND_URL + '/get_esign_name',
	    type: 'GET',
	    success: function(response) {
	    	// console.log(response);
	        var opt = `<option value='' selected >Select</option>`;
	        $.each(response.data, function(i, v) {
	            opt += `<option value="${v.id}"  >${v.name}</option>`;
	        });

	        $(".select_name").append(opt);

	        $(".select_name").on('change', function(){   
	        	var name = $('.select_name').find(":selected").text();
	        	$.ajax({
	        	    url: BACKEND_URL + '/get_esignId/' + name,
	        	    type: 'GET',
	        	    success: function(data) {
	        	    	var esign_data = data.data;
	        	    	$('#position_div').css('display','block');
	        	    	$('#image_div').css('display','block');
	        	    	$('#position').val(esign_data.position);
	        	    	document.getElementById('esign_file').src=BASE_URL + esign_data.esign_file; 
	        	    }
	        	    	
	        	});
	        });
	    }
	});
}


function setSelected(){
    var name = $('.select_name').find(":selected").text();
    $.ajax({
        url: BACKEND_URL + '/get_esignId/' + name,
        type: 'GET',
        success: function(data) {
        	var esign_data = data.data;
        	var id = localStorage.getItem('id');
        	let esign_id = esign_data.id;
        	localStorage.setItem("Status", 2);
        	esignURL(id,esign_id);
        }
        	
    });
}

function esignURL(id,esign_id){
	$.ajax({
    url: BACKEND_URL + '/check_firm/' + id,
	    type: 'GET',
	    success: function(data) {
	    	var firm_data = data.data;
	    	if(firm_data.audit_firm_type_id == 2 && firm_data.local_foreign_type == 1){
	    		location.href = FRONTEND_URL + "/get_non_audit_card/" + id + "/" + esign_id;
	    	}else if(firm_data.audit_firm_type_id == 2 && firm_data.local_foreign_type == 2){
	    		location.href = FRONTEND_URL + "/get_non_audit_foreign_card/" + id + "/" + esign_id;
	    	}else{
	    		location.href = FRONTEND_URL + "/get_audit_card/" + id + "/" + esign_id;
	    	}
	    }
	    	
	});
}

function setFirmId(id,esignId)
{
    $.ajax({
        url: BACKEND_URL + "/setEsign/"+ id + "/" + esignId,
        type: 'patch',
        success: function(result){
            // console.log(result)
            successMessage("Success!");
            checkAuditNonAudit(id);
            // location.href = FRONTEND_URL + "/non-audit-firm-list";
        }
    });
}

function approveEsign()
{
	var id = localStorage.getItem("id");
	// alert(id)
    $.ajax({
        url: BACKEND_URL + "/approveEsign/"+ id,
        type: 'patch',
        success: function(result){
            // console.log(result)
            successMessage("Success!");
            checkAuditNonAudit(id);
            // location.href = FRONTEND_URL + "/non-audit-firm-list";
        }
    });
}

function checkAuditNonAudit(id)
{
    $.ajax({
        url: BACKEND_URL + "/check_firm/"+ id,
        type: 'get',
        success: function(data){
        	var firm_data = data.data;
            if(firm_data.audit_firm_type_id == 2 && firm_data.local_foreign_type == 1){
            	location.href = FRONTEND_URL + "/non-audit-firm-list";
            }else if(firm_data.audit_firm_type_id == 2 && firm_data.local_foreign_type == 2){
            	location.href = FRONTEND_URL + "/non-audit-firm-list";
            }else{
            	location.href = FRONTEND_URL + "/audit-firm-list";
            }
        }
    });
}

