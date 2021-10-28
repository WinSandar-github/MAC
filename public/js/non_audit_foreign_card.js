function loadNonAuditForeignCard(){
    
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
   
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/acc_firm_info/"+id,
        success : function(data){
        	var non_audit_data = data.data[0];
            console.log(data.data[0])
            // if(data.data.from_valid_date!=null){
            //     var today = new Date(data.data.from_valid_date);
            //     var date = addZero(today.getDate())+'-'+addZero(today.getMonth()+1)+'-'+today.getFullYear();
            //     document.getElementById('regno_date').innerHTML=data.data.s_code+'/'+date;
           
            // }else{
                
            //     if(data.data.initial_status==0){
            //         var invoiceNo="init_sch"+data.data.id;
            //         $.ajax({
            //             type : 'POST',
            //             url : BACKEND_URL+"/getTotalAmount",
            //             data: 'invoiceNo='+invoiceNo,
            //             success: function(result){
            //                 //document.getElementById('regno_date').innerHTML=data.data.s_code+'/'+data.data.from_valid_date;
                            
            //             }
            //         })
            //     }
            // }
            if(non_audit_data.accountancy_firm_reg_no!=null){
                document.getElementById('accountancy_firm_reg_no').innerHTML=non_audit_data.accountancy_firm_reg_no;
            }

            if(non_audit_data.register_date!=null){
                document.getElementById('register_date').innerHTML=non_audit_data.register_date;
            }

            var accept = new Date(non_audit_data.register_date);
            var year = accept.getFullYear();
            var y = year + 1;
            var month = accept.getMonth() + 1;
            var day = accept.getUTCDate();
            // console.log(y+ '-'+month+'-'+day);
            // console.log(data.data[0].register_date)
            var expiry_date = y+ '-'+month+'-'+day;
            
            document.getElementById('expiry_date').innerHTML=expiry_date;
            
            if(non_audit_data.accountancy_firm_name!=null){
                document.getElementById('accountancy_firm_name').innerHTML=non_audit_data.accountancy_firm_name;
            }

            if(non_audit_data.name_of_sole_proprietor!=null){
                document.getElementById('name_of_sole_proprietor').innerHTML=non_audit_data.name_of_sole_proprietor;
            }

            if(non_audit_data.dir_passport_csc!=null){
                document.getElementById('dir_passport_csc').innerHTML=non_audit_data.dir_passport_csc;
            }
            
            if(1 ==non_audit_data.organization_structure_id){
                $('input:radio[name=os1]').attr('checked',true);
                $('input:radio[name=os2]').attr('disabled', 'disabled');
                $('input:radio[name=os3]').attr('disabled', 'disabled');
                $('input:radio[name=os4]').attr('disabled', 'disabled');
            }
            if(2 ==non_audit_data.organization_structure_id){
                $('input:radio[name=os2]').attr('checked',true);
                $('input:radio[name=os1]').attr('disabled', 'disabled');
                $('input:radio[name=os3]').attr('disabled', 'disabled');
                $('input:radio[name=os4]').attr('disabled', 'disabled');
            }
            if(3 ==non_audit_data.organization_structure_id){
                $('input:radio[name=os3]').attr('checked',true);
                $('input:radio[name=os2]').attr('disabled', 'disabled');
                $('input:radio[name=os1]').attr('disabled', 'disabled');
                $('input:radio[name=os4]').attr('disabled', 'disabled');
            }
            if(4 ==non_audit_data.organization_structure_id){
                $('input:radio[name=os4]').attr('checked',true);
                $('input:radio[name=os2]').attr('disabled', 'disabled');
                $('input:radio[name=os3]').attr('disabled', 'disabled');
                $('input:radio[name=os1]').attr('disabled', 'disabled');
            }
            
            let tos = non_audit_data.type_of_service_provided_id;
            // console.log(tos.includes('4'));
            if(true ==tos.includes('3')){
                $('input:radio[name=tos3]').attr('checked',true);
                $('input:radio[name=tos4]').attr('disabled', 'disabled');
                $('input:radio[name=tos5]').attr('disabled', 'disabled');
                $('input:radio[name=tos6]').attr('disabled', 'disabled');
                $('input:radio[name=tos7]').attr('disabled', 'disabled');
                $('input:radio[name=tos8]').attr('disabled', 'disabled');
            }
            if(true ==tos.includes('4')){
                $('input:radio[name=tos4]').attr('checked',true);
                $('input:radio[name=tos3]').attr('disabled', 'disabled');
                $('input:radio[name=tos5]').attr('disabled', 'disabled');
                $('input:radio[name=tos6]').attr('disabled', 'disabled');
                $('input:radio[name=tos7]').attr('disabled', 'disabled');
                $('input:radio[name=tos8]').attr('disabled', 'disabled');
            }
            if(true ==tos.includes('5')){
                $('input:radio[name=tos5]').attr('checked',true);
                $('input:radio[name=tos3]').attr('disabled', 'disabled');
                $('input:radio[name=tos4]').attr('disabled', 'disabled');
                $('input:radio[name=tos6]').attr('disabled', 'disabled');
                $('input:radio[name=tos7]').attr('disabled', 'disabled');
                $('input:radio[name=tos8]').attr('disabled', 'disabled');
            }
            if(true ==tos.includes('6')){
                $('input:radio[name=tos6]').attr('checked',true);
                $('input:radio[name=tos3]').attr('disabled', 'disabled');
                $('input:radio[name=tos4]').attr('disabled', 'disabled');
                $('input:radio[name=tos5]').attr('disabled', 'disabled');
                $('input:radio[name=tos7]').attr('disabled', 'disabled');
                $('input:radio[name=tos8]').attr('disabled', 'disabled');
            }
            if(true ==tos.includes('7')){
                $('input:radio[name=tos7]').attr('checked',true);
                $('input:radio[name=tos3]').attr('disabled', 'disabled');
                $('input:radio[name=tos4]').attr('disabled', 'disabled');
                $('input:radio[name=tos5]').attr('disabled', 'disabled');
                $('input:radio[name=tos6]').attr('disabled', 'disabled');
                $('input:radio[name=tos8]').attr('disabled', 'disabled');
            }
            if(true ==tos.includes('8')){
                $('input:radio[name=tos8]').attr('checked',true);
                $('input:radio[name=tos3]').attr('disabled', 'disabled');
                $('input:radio[name=tos4]').attr('disabled', 'disabled');
                $('input:radio[name=tos5]').attr('disabled', 'disabled');
                $('input:radio[name=tos6]').attr('disabled', 'disabled');
                $('input:radio[name=tos7]').attr('disabled', 'disabled');
            }
            // if(non_audit_data.firm_owner_audits[0].name!=null){
            //     document.getElementById('name').innerHTML=non_audit_data.firm_owner_audits[0].name;
            // }

            // if(non_audit_data.firm_owner_audits[0].public_private_reg_no!=null){
            //     document.getElementById('public_private_reg_no').innerHTML=non_audit_data.firm_owner_audits[0].public_private_reg_no;
            // }

            if(non_audit_data.head_office_address!=null){
                document.getElementById('head_office_address').innerHTML=non_audit_data.head_office_address;
            }
                
            //     loadInvoice(data.data.id,data.data.initial_status,"expiry_date");
            //     console.log(data.data.school_branch);
            //     var school_branch=data.data.school_branch;
            //     $.each(school_branch, function( index, value ) {
            //         document.getElementById('branch_address').innerHTML=value.branch_school_address;
            //     })  
        }
    })
}