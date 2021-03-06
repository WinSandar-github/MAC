function getTeacherRegisterList(){
    destroyDatatable("#tbl_teacher_pending", "#tbl_teacher_pending_body");
    destroyDatatable("#tbl_teacher_approved", "#tbl_teacher_approved_body");
    destroyDatatable("#tbl_teacher_rejected", "#tbl_teacher_rejected_body");
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
            let indexNo1 = 0;
            let indexNo2 = 0;
            let indexNo3 = 0;
            data.data.map((obj)=> {
                
                let nrc = obj.nrc_state_region+"/"+obj.nrc_township+"("+obj.nrc_citizen+")"+obj.nrc_number;
                if(obj.approve_reject_status == 0)
                {
                    var tr = "<tr>";
                    tr += `<td> ${ indexNo1 += 1 } </td>`;
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
                    $("#tbl_teacher_pending_body").append(tr);
                }
                else if(obj.approve_reject_status == 1)
                {
                    var tr = "<tr>";
                    tr += `<td> ${ indexNo2 += 1 } </td>`;
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
                    $("#tbl_teacher_approved_body").append(tr);
                }
                else if(obj.approve_reject_status == 2)
                {
                    var tr = "<tr>";
                    tr += `<td> ${ indexNo3 += 1 } </td>`;
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
                    $("#tbl_teacher_rejected_body").append(tr);
                }
            });
            createDataTableWithAsc("#tbl_teacher_pending");
            createDataTableWithAsc("#tbl_teacher_approved");
            createDataTableWithAsc("#tbl_teacher_rejected");
            EasyLoading.hide();
        }
    });
}

function showTeacher(teacherID){
    localStorage.setItem("teacher_id",teacherID);
    location.href=FRONTEND_URL+"/teacher_edit/";
}

function getTeacherInfos(){
    var characters = [
		{mm:'???',eng:'Ka'},
		{mm:'???' ,eng:'Kha'},
		{mm:'???' ,eng:'Ga'},
		{mm:'???' ,eng:'Gha'},
		{mm:'???' ,eng:'Nga'},
		{mm:'???' ,eng:'Sa'},
		{mm:'???' ,eng: 'Hsa'},
		{mm:'???' ,eng: 'Za'},
		{mm:'???',eng: 'Zha'},
		{mm:'???' ,eng: 'Nya'},
		{mm:'???',eng: 'Dd'},
		{mm:'???' ,eng: 'Nha'},
		{mm:'???' ,eng: 'Ta'},
		{mm:'???' ,eng: 'Hta'},
		{mm:'???' ,eng: 'Da'},
		{mm:'???',eng: 'Dha'},
		{mm:'???' ,eng: 'Na'},
		{mm:'???' ,eng: 'Pa'},
		{mm:'???' ,eng: 'Pha'},
		{mm:'???' ,eng: 'Bha'},
		{mm:'???',eng : 'Ba'},
		{mm:'???' ,eng:'Ma'},
		{mm:'???',eng: 'Ya'},
		{mm:'???' ,eng: 'Ra'},
		{mm:'???' ,eng: 'La'},
		{mm:'???' ,eng: 'Wa'},
		{mm:'???',eng: 'Tha'},
		{mm:'???',eng: 'Ha'},
		{mm:'???' ,eng: 'Ll'},
		{mm:'???',eng: 'Ah'},
		{mm:'???' ,eng: 'U'},
		{mm:'???' ,eng: 'E'}
	];
    var regions_states = [
        {
			region_en: '0',			// 'Kachin'
			region_mm : '???',			// '????????????????????????????????????'
		},
		{
			region_en: '1',			// 'Kachin'
			region_mm : '???',			// '????????????????????????????????????'
		},
		{
			
			region_en : '2',			// 'Kayah'
			region_mm : '???'			// ?????????????????????????????????
		},
		{
			
			region_en: '3',			// 'Kayin'
			region_mm: '???'			// '?????????????????????????????????'
		},
		{
			
			region_en : '4',			// 'Chin'
			region_mm : '???'			//	'????????????????????????????????????'
		},
		{
			
			region_en : '5',			// 'Sagaing'
			region_mm : '???'			//	'?????????????????????????????????????????????'
		},
		{
			
			region_en : '6',			// 'Tanintharyi'
			region_mm : '???'			//	'?????????????????????????????????????????????'
		},
		{
			
			region_en: '7',			// 'Bago'
			region_mm : '???'			//	'?????????????????????????????????'
		},
		{
			
			region_en : '8',			// 'Magway'
			region_mm :'???'			//	'?????????????????????????????????'
		},
		{
			
			region_en : '9',			// 'Mandalay'
			region_mm : '???'			//	'???????????????????????????????????????'
		},
		{
			
			region_en : '10',		// 'Mon'
			region_mm : '??????'			//	'?????????????????????????????????'
		},
		{
			
			region_en : '11',		// 'Rakhine'
			region_mm : '??????'			//	'???????????????????????????????????????'
		},
		{
			
			region_en : '12',		//	'Yangon'
			region_mm : '??????'			//	'???????????????????????????????????????'
		},
		{
			
			region_en : '13',		// 'Shan'
			region_mm : '??????'			//	'????????????????????????????????????'
		},
		{
			
			region_en : '14',		// 'Ayeyawady'
			region_mm : '??????'			//	'????????????????????????????????????'
        }
	];
    var citizens = [
		{
			citizen_en : 'N',
			citizen_mm: '???????????????'
		},
		{
			citizen_en: 'E',
			citizen_mm: '????????????'
		},
		{
			citizen_en: 'P',
			citizen_mm: '?????????'
		},
	];
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/teacher/"+id,
        success : function(data){
            
            $.each(data.data, function( index, value ) {
                document.getElementById('image').src = PDF_URL + value.image;
                $("#name").append(value.name_eng+'/'+value.name_mm);
                $("#name_eng").append(value.name_eng);
                let nrc = value.nrc_state_region+"/"+value.nrc_township+"("+value.nrc_citizen+")"+value.nrc_number;
                $("#nrc").append(nrc);
                var result = regions_states.filter( obj => obj.region_mm === value.nrc_state_region)[0];
                var nrc_state_region_eng=result.region_en;
                
                var nrc_township_eng=[];
                for(var i=0;i<value.nrc_township.length;i++){
                var result = characters.filter( obj => obj.mm === value.nrc_township[i])[0];
                    nrc_township_eng.push(result.eng);
                }
                var result = citizens.filter( obj => obj.citizen_mm === value.nrc_citizen)[0];
                var nrc_citizen_eng=result.citizen_en;

                var nrc_number_eng=[];
                for(var i=0;i<value.nrc_number.length;i++){
                var result = regions_states.filter( obj => obj.region_mm === value.nrc_number[i])[0];
                    nrc_number_eng.push(result.region_en);
                }
                var nrc_eng=nrc_state_region_eng+'/'+nrc_township_eng.join('')+'('+nrc_citizen_eng+')'+nrc_number_eng.join('');
                $("#nrc_eng").append(nrc_eng);
                $("#father").append(value.father_name_eng+'/'+value.father_name_mm);
                $("#father_eng").append(value.father_name_eng);
                $("#phone").append(value.phone);
                $("#email").append(value.email);
                
                if(value.school_type==0){
                    $("#school_name").append("Individual");
                    $('.school_name_class').show();
                }else{
                    if(value.school_id==null){
                        //$("#school_name").append(value.school_name);
                        $('.school_name_class').hide();
                    }else{
                        
                        loadSchoolName(value.school_id);
                    }
                    if(value.school_name!=null){
                        $('.school_name_class').show();
                        $("#school_name").append(value.school_name);
                    }
                }
                if(value.certificates.search(/[\'"[\]']+/g)==0){
                    if(data.payment.length==0){
                        loadCertificates(value.certificates.replace(/[\'"[\]']+/g, ''),"AP","#tbl_certificate",value.initial_status,value.offline_user);
                    }else{
                        loadCertificates(value.certificates.replace(/[\'"[\]']+/g, ''),data.payment[0].status,"#tbl_certificate",value.initial_status,value.offline_user);
                    }
                    
                    loadCard(value.certificates.replace(/[\'"[\]']+/g, ''));
                    
                }else{
                    if(data.payment.length==0){
                        loadCertificates(value.certificates,"AP","#tbl_certificate",value.initial_status,value.offline_user);
                    }else{
                        loadCertificates(value.certificates,data.payment[0].status,"#tbl_certificate",value.initial_status,value.offline_user);
                    }
                    
                    loadCard(value.certificates);
                }
                if(value.diplomas.search(/[\'"[\]']+/g)==0){
                    if(data.payment.length==0){
                        loadCertificates(value.diplomas.replace(/[\'"[\]']+/g, ''),"AP","#tbl_diploma",value.initial_status,value.offline_user);
                    }else{
                        loadCertificates(value.diplomas.replace(/[\'"[\]']+/g, ''),data.payment[0].status,"#tbl_diploma",value.initial_status,value.offline_user);
                    }
                    
                    loadCard(value.diplomas.replace(/[\'"[\]']+/g, ''));
                }else{
                    if(data.payment.length==0){
                        loadCertificates(value.diplomas,"AP","#tbl_diploma",value.initial_status,value.offline_user);
                    }else{
                        loadCertificates(value.diplomas,data.payment[0].status,"#tbl_diploma",value.initial_status,value.offline_user);
                    }
                    
                    loadCard(value.diplomas);
                }
                
                if(value.approve_reject_status != 0){
                    $("#approve_reject").hide();
                    if(value.initial_status==2){
                        $('#cessation-btn').hide();
                    }else{
                        $('#cessation-btn').show();
                    }
                }
                else{
                    $("#approve_reject").show();
                }
                $("#exp_desc").append(value.exp_desc);
                if(value.gov_employee == 1){
                    $('input:radio[name=radio1]').attr('checked',true);
                    $('input[name="radio2"]').attr('disabled', 'disabled');
                    $('.recommend_row').show();
                    if(value.recommend_letter!=""){
                        $(".recommend_letter").append(`<a href='${PDF_URL+value.recommend_letter}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a>`);
                    }
                   
                }
                else{
                    $('input:radio[name=radio2]').attr('checked',true);
                    $('input[name="radio1"]').attr('disabled', 'disabled');
                    $('.recommend_row').hide();
                }
                if(value.nrc_front!=null){
                    $('.nrc-css').hide();
                    $(".nrc_front").append(`<a href='${PDF_URL+value.nrc_front}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01 "></i></a>`);
                }
                if(value.nrc_back!=null){
                    $('.nrc-back-css').hide();
                    $(".nrc_back").append(`<a href='${PDF_URL+value.nrc_back}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a>`);
                }
                
                $("#race").append(value.race);
                $("#religion").append(value.religion);
                $("#date_of_birth").append(value.date_of_birth);
                $("#address").append(value.address);
                $("#eng_address").append(value.eng_address);
                $("#current_address").append(value.current_address);
                $("#eng_current_address").append(value.eng_current_address);
                $("#position").append(value.position);
                $("#department").append(value.department);
                $("#organization").append(value.organization);
                if(value.initial_status==0){
                    loadEductaionHistory(value.id,value.initial_status);
                }else{
                    loadEductaionHistory(value.student_info_id,value.initial_status);
                }
                
                if(value.school_type==null){
                    $('.school_name_class').hide();
                }
                if(value.payment_method!=null){
                    
                    var now=new Date();
                    if(value.initial_status==0){
                        //var new_date=value.from_valid_date.split('-');
                        loadInvoiceByTeacher(value.id,value.initial_status);
                        $('.period').show();
                    }else if(value.initial_status==1){
                        //var new_date=value.renew_date.split('-');
                        if((now.getMonth()+1)==11 || (now.getMonth()+1)==12){
                            $('.renew_period_time').text("01-01-"+(now.getFullYear()+1)+" to 31-12-"+(now.getFullYear()+1));
                        }else{
                            $('.renew_period_time').text("01-01-"+(now.getFullYear())+" to 31-12-"+(now.getFullYear()));
                        }
                        
                       
                        $('.period').show();
                        if(value.from_valid_date!=null){
                            var from_valid_date = new Date(value.from_valid_date);
                            var date = addZero(from_valid_date.getDate())+'-'+addZero(from_valid_date.getMonth()+1)+'-'+from_valid_date.getFullYear();
                            $(".payment_date").append(date);
                            
                        }
                        if((now.getMonth()+1)==11 || (now.getMonth()+1)==12){
                            $('#period_time_start').text("01-01-"+(now.getFullYear()+1));
                            $('#period_time_end').text("31-12-"+(now.getFullYear()+1));
                        }else{
                            $('#period_time_start').text("01-01-"+(now.getFullYear()));
                            $('#period_time_end').text("31-12-"+(now.getFullYear()));
                        }
                    }else{
                        if(value.from_valid_date!=null){
                            var from_valid_date = new Date(value.from_valid_date);
                            var date = addZero(from_valid_date.getDate())+'-'+addZero(from_valid_date.getMonth()+1)+'-'+from_valid_date.getFullYear();
                            $(".payment_date").append(date);
                            
                        }
                        if((now.getMonth()+1)==11 || (now.getMonth()+1)==12){
                            $('#period_time_start').text("01-01-"+(now.getFullYear()+1));
                            $('#period_time_end').text("31-12-"+(now.getFullYear()+1));
                        }else{
                            $('#period_time_start').text("01-01-"+(now.getFullYear()));
                            $('#period_time_end').text("31-12-"+(now.getFullYear()));
                        }
                    }
                    
                    //var period_date=new_date[0].split('-');
                    // var period=new_date[2]+'-'+new_date[1]+'-'+new_date[0];
                    // $('#period_time').text(period+" to 31-12-"+now.getFullYear());
                   
                    
                    $('.invoice_no').append(value.t_code);
                    
                    
                }
                $('#student_info_id').val(value.student_info_id);
                $('#teacher_id').val(value.id);
                if(value.initial_status==0){
                    $('.form-name').append('????????????????????????-???');
                }else{
                    
                    $('.form-name').append('????????????????????????-???');
                }
                if(value.offline_user==1){
                    $('.teacher_card_class').show();
                    $("#teacher_card").append(`<a href='${PDF_URL+value.teacher_card}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01 "></i></a>`);
                    $('.exist_teacher_user').hide();
                }else{
                    if(value.teacher_card !=null){
                        $('.teacher_card_class').show();
                        $("#teacher_card").append(`<a href='${PDF_URL+value.teacher_card}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01 "></i></a>`);
                    }else{
                        $('.teacher_card_class').hide();
                        
                    }
                    //if(value.approve_reject_status==1){
                        $('.exist_teacher_user').show();
                    //}
                    
                }
                if(value.gender == "male"){
                    $('input:radio[id="male"]').attr('checked',true);
                    $('input[id="female"]').attr('disabled', 'disabled');
                    
                   
                }
                else{
                    $('input:radio[id="female"]').attr('checked',true);
                    $('input[id="male"]').attr('disabled', 'disabled');
                    
                }
            });
           
            
        }
    });
}

function approveTeacherRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    var student_info_id=$('#student_info_id').val();
    let offline_user = url.searchParams.get("offline_user");
    var teacher_id=$('#teacher_id').val();
    var check = confirm("Are you sure?");
    if (check == true) {
        $.ajax({
            url: BACKEND_URL + "/approve_teacher_register",
            data: 'id='+id+"&status=1"+"&student_info_id="+student_info_id,
            type: 'post',
            success: function(result){
                successMessage('You have approved that user!');
                if(offline_user == 'true'){
                    location.href = FRONTEND_URL + '/offline_user';
                }else{
                    location.href = FRONTEND_URL + '/teacher_registration';
                }
                
            }
        });
    }
    
}

function rejectTeacherRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    var student_info_id=$('#student_info_id').val();
    var teacher_id=$('#teacher_id').val();
    let offline_user = url.searchParams.get("offline_user");
    var reason=$("#reason").val();
    $.ajax({
        url: BACKEND_URL + "/approve_teacher_register",
        data: 'id='+id+"&status=2"+"&student_info_id="+student_info_id+"&reason="+reason,
        type: 'post',
        success: function(result){
            successMessage('You have rejected that user!');
            if(offline_user == 'true'){
                location.href = FRONTEND_URL + '/offline_user';
            }else{
                location.href = FRONTEND_URL + '/teacher_registration';
            }
        }
    });
    
    
}

function loadCertificates(name,payment_status,tbody,is_renew,offline_user){
    var name=name.split(',');
    
    var payment_status;
    if(offline_user==1){
        payment_status="????????????";
    }else{
        if(payment_status=="AP"){
        
            payment_status="????????????";
        }else{
            payment_status="???????????????";
        }
    }
    
    var sum;
    var membership_name='Teacher';
    $.ajax({
        type: "get",
        url: BACKEND_URL+"/showDescription/"+membership_name,
        success: function (result) {
            var data=result.data;
            $.each(name, function( index, id ){
                $.ajax({
                    url : BACKEND_URL+"/getSubject",
                    data: 'subject_id='+id,
                    type: 'post',
                    success: function (result) {
                        if(is_renew==0){
                            $.each(result.data, function( index, value ){
                                var newcode=value.code.split('_');
                                var course_code=convert(newcode[1]);
                                    var tr = "<tr>";
                                    tr += `<td> ${ newcode[0].toUpperCase()+' '+course_code } </td>`;
                                    tr += `<td> ${ value.subject_name } </td>`;
                                    if(value.code=='cpa_1' || value.code=='cpa_2'){
                                            tr += `<td>`+thousands_separators(data[0].cpa_subject_fee)+`</td>`;
                                            sum=data[0].cpa_subject_fee*name.length;
                                            
                                        }else{
                                            tr += `<td>`+thousands_separators(data[0].da_subject_fee)+`</td>`;
                                            sum=data[0].da_subject_feee*name.length;
                                        }
                                    tr += `<td>`+payment_status +`</td>`;
                                    tr += "</tr>";
                                    $(tbody).append(tr);
                                    
                            });
                        }else{
                            $.each(result.data, function( index, value ){
                                var newcode=value.code.split('_');
                                var course_code=convert(newcode[1]);
                                    var tr = "<tr>";
                                    tr += `<td> ${ newcode[0].toUpperCase()+' '+course_code } </td>`;
                                    tr += `<td> ${ value.subject_name } </td>`;
                                    if(value.code=='cpa_1' || value.code=='cpa_2'){
                                            tr += `<td>`+thousands_separators(data[0].renew_cpa_subject_fee)+`</td>`;
                                            sum=data[0].renew_cpa_subject_fee*name.length;
                                            
                                        }else{
                                            tr += `<td>`+thousands_separators(data[0].renew_da_subject_fee)+`</td>`;
                                            sum=data[0].renew_da_subject_feee*name.length;
                                        }
                                    tr += `<td>`+payment_status +`</td>`;
                                    tr += "</tr>";
                                    $(tbody).append(tr);
                                    
                            });
                        }
                        
                        if(is_renew==0){
                            sumTotalAmount(data[0].form_fee+data[0].registration_fee);
                        }else{
                            sumTotalAmount(data[0].form_fee);
                        }
                        
                    },
                    error: function (result) {
                    },
                });
            });
        }
    });                         
    
    
}
function sumTotalAmount(total){
    
    let sum = 0;
    var row_cpa = document.getElementById('tbl_certificate').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
    var row_da = document.getElementById('tbl_diploma').getElementsByTagName('tbody')[0].getElementsByTagName('tr').length;
    if(row_cpa!=0){
        $('#tbl_certificate tbody').each(function() {
            sum += removeComma($(this).find('td:eq(2)').html())*row_cpa;
            
        });
    }
    if(row_da!=0){
        $('#tbl_diploma tbody').each(function() {
            sum += removeComma($(this).find('td:eq(2)').html())*row_da;
            
         });
    }
     
     
     $('#subject_total_amount').val(thousands_separators(sum+total));
}

function loadSchoolName(school_id){
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/school/"+school_id,
        success: function (result) {
            $('.school_name_class').show();
            $('#school_name').append(result.data.school_name);
        }
    });    
}
function loadEductaionHistory(id,status){
    if(status==0){
        $.ajax({
            type : 'POST',
            url : BACKEND_URL+"/getEducationHistory",
            data: 'teacher_id='+id,
            success: function(result){
                $.each(result.data, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td> ${ index += 1 } </td>`;
                    tr += `<td> ${ value.degree_name } </td>`;
                    tr += `<td><a href='${PDF_URL+value.certificate}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                    tr += "</tr>";
                    $("#tbl_degree_body").append(tr);
                });
                createDataTableWithAsc('#tbl_degree');
            }
        });
    }else{
        $.ajax({
            type : 'POST',
            url : BACKEND_URL+"/getEducationHistory",
            data: 'student_info_id='+id,
            success: function(result){
                $.each(result.data, function( index, value ) {
                    var tr = "<tr>";
                    tr += `<td>${ index += 1 }</td>`;
                    tr += `<td> ${ value.degree_name } </td>`;
                    tr += `<td><a href='${PDF_URL+value.certificate}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                    tr += "</tr>";
                    $("#tbl_degree_body").append(tr);
                });
                
                createDataTableWithAsc('#tbl_degree');
            }
        });
    }
    
    
}

function loadCard(name){
    var name=name.split(',');
    $.each(name, function( index, id ){
        $.ajax({
            url : BACKEND_URL+"/getSubject",
            data: 'subject_id='+id,
            type: 'post',
            success: function (result) {
               
                $.each(result.data, function( index, value ){
                    var newcode=value.code.split('_');
                    var course_code=convert(newcode[1]);
                        
                        if(value.code=='cpa_1'){
                            $('#cpa_one').val(newcode[0].toUpperCase()+' '+course_code);
                            let li_cpa = document.createElement('li');
                            li_cpa.textContent = value.subject_name ;
                            const menu_cpa = document.querySelector('#menu_one');
                            menu_cpa.appendChild(li_cpa);
                            $('.menu_one_div').show();

                        }else if(value.code=='cpa_2'){
                            $('#cpa_two').val(newcode[0].toUpperCase()+' '+course_code);
                            let li_cap2 = document.createElement('li');
                            li_cap2.textContent = value.subject_name ;
                            const menu_cap2 = document.querySelector('#menu_two');
                            menu_cap2.appendChild(li_cap2);
                            $('.menu_two_div').show();

                        }else if(value.code=='da_1'){
                            $('#da_one').val(newcode[0].toUpperCase()+' '+course_code);
                            let li_da1 = document.createElement('li');
                            li_da1.textContent = value.subject_name ;
                            const menu_da1 = document.querySelector('#menu_da_one');
                            menu_da1.appendChild(li_da1);
                            $('.menu_da_one_div').show();
                            
                        }else if(value.code=='da_2'){
                            $('#da_two').val(newcode[0].toUpperCase()+' '+course_code);
                            let li_da1 = document.createElement('li');
                            li_da1.textContent = value.subject_name ;
                            const menu_da2 = document.querySelector('#menu_da_two');
                            menu_da2.appendChild(li_da1);
                            $('.menu_da_two_div').show();
                            
                        }
                });
                
                
            },
            error: function (result) {
            },
        });
    });
}
function cessationTeacherRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    var student_info_id=$('#student_info_id').val();
    var teacher_id=$('#teacher_id').val();
    var cessation_reason=$("#cessation_reason").val();
    $.ajax({
        url: BACKEND_URL + "/cessation_teacher_register",
        data: 'id='+id+"&status=2"+"&student_info_id="+student_info_id+"&cessation_reason="+cessation_reason+"&initial_status="+$('#initial_status').val(),
        type: 'post',
        success: function(result){
            successMessage('You have cessation that user!');
            location.href = '/teacher_registration';
        }
    });
    
    
}
function approveRenewTeacherRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    var check = confirm("Are you sure?");
    if (check == true) {
        $.ajax({
            url: BACKEND_URL + "/approveRenewTeacherRegister",
            data: 'id='+id+"&status=1",
            type: 'post',
            success: function(result){
                successMessage('You have approved that user!');
                location.href = FRONTEND_URL + '/teacher_registration';
            }
        });
    }
    
}
function rejectRenewTeacherRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    
    var reason=$("#reason").val();
    $.ajax({
        url: BACKEND_URL + "/approveRenewTeacherRegister",
        data: 'id='+id+"&status=2"+"&reason="+reason,
        type: 'post',
        success: function(result){
            successMessage('You have rejected that user!');
            location.href = '/teacher_registration';
        }
    });
    
    
}
function getRenewTeacher(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/getRenewTeacher/"+id,
        success : function(data){
            
            $.each(data.data, function( index, value ) {
                document.getElementById('image').src = PDF_URL + value.image;
                $("#name").append(value.name_eng+'/'+value.name_mm);
                $("#name_eng").append(value.name_eng);
                let nrc = value.nrc_state_region+"/"+value.nrc_township+"("+value.nrc_citizen+")"+value.nrc_number;
                $("#nrc").append(nrc);
                $("#father").append(value.father_name_eng+'/'+value.father_name_mm);
                $("#father_eng").append(value.father_name_eng);
                $("#phone").append(value.phone);
                $("#email").append(value.email);
                
                if(value.certificates.search(/[\'"[\]']+/g)==0){
                    loadCertificates(value.certificates.replace(/[\'"[\]']+/g, ''),value.payment_method,"#tbl_certificate",value.initial_status,value.offline_user);
                    loadCard(value.certificates.replace(/[\'"[\]']+/g, ''));
                    
                }else{
                    loadCertificates(value.certificates,value.payment_method,"#tbl_certificate",value.initial_status,value.offline_user);
                    loadCard(value.certificates);
                }
                if(value.diplomas.search(/[\'"[\]']+/g)==0){
                    loadCertificates(value.diplomas.replace(/[\'"[\]']+/g, ''),value.payment_method,"#tbl_diploma",value.initial_status,value.offline_user);
                    loadCard(value.diplomas.replace(/[\'"[\]']+/g, ''));
                }else{
                    loadCertificates(value.diplomas,value.payment_method,"#tbl_diploma",value.initial_status,value.offline_user);
                    loadCard(value.diplomas);
                }
                
                if(value.approve_reject_status != 0){
                    $("#approve_reject").hide();
                    $('#cessation-btn').show();
                }
                else{
                    $("#approve_reject").show();
                }
                $("#exp_desc").append(value.exp_desc);
                if(value.gov_employee == 1){
                    $('input:radio[name=radio1]').attr('checked',true);
                    $('input[name="radio2"]').attr('disabled', 'disabled');
                    $('.recommend_row').show();
                    if(value.recommend_letter!=""){
                        $(".recommend_letter").append(`<a href='${PDF_URL+value.recommend_letter}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a>`);
                    }
                   
                }
                else{
                    $('input:radio[name=radio2]').attr('checked',true);
                    $('input[name="radio1"]').attr('disabled', 'disabled');
                    $('.recommend_row').hide();
                }
                if(value.nrc_front==null){
                    $('.nrc-css').hide();
                }else{
                    $('.nrc-css').show();
                    $(".nrc_front").append(`<a href='${PDF_URL+value.nrc_front}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01 "></i></a>`);
                }
                if(value.nrc_back==null){
                    $('.nrc-back-css').hide();
                }else{
                    $('.nrc-back-css').show();
                    $(".nrc_back").append(`<a href='${PDF_URL+value.nrc_back}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a>`);
                }
                $("#race").append(value.race);
                $("#religion").append(value.religion);
                $("#date_of_birth").append(value.date_of_birth);
                $("#address").append(value.address);
                $("#current_address").append(value.current_address);
                $("#position").append(value.position);
                $("#department").append(value.department);
                $("#organization").append(value.organization);
                loadEductaionHistoryByRenew(value.id);
                if(value.school_type==0){
                    $("#school_name").append("Individual");
                }else{
                    if(value.school_id==null){
                        $("#school_name").append(value.school_name);
                    }else{
                        
                        $('.school_name_class').show();
                        loadSchoolName(value.school_id);
                    }
                   
                }
                if(value.payment_method!=null){
                    $('.period').show();
                    var now=new Date();
                    var new_date=value.payment_date.split(' ');
                    var period_date=new_date[0].split('-');
                    var period=period_date[2]+'-'+period_date[1]+'-'+period_date[0];
                    $('.renew_period_time').append("01-01-"+now.getFullYear()+" to 31-12-"+now.getFullYear());
                    $("#payment_date").val(period);
                    $('.invoice_no').append(value.invoice_no);
                    $(".payment_date").append(period);
                }
                
                $('#teacher_id').val(value.id);
                if(value.initial_status==0){
                    $('.form-name').append('????????????????????????-???');
                }else{
                    $('.form-name').append('????????????????????????-???');
                }
            });
           
            
        }
    });
}
function loadEductaionHistoryByRenew(id){
    
    $.ajax({
        type : 'POST',
        url : BACKEND_URL+"/getEducationHistory",
        data: 'renewteacher_id='+id,
        success: function(result){
            $.each(result.data, function( index, value ) {
                var tr = "<tr>";
                tr += `<td> ${ index += 1 } </td>`;
                tr += `<td> ${ value.university_name } </td>`;
                tr += `<td><a href='${PDF_URL+value.certificate}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                tr += "</tr>";
                $("#tbl_degree_body").append(tr);
            });
            createDataTableWithAsc('#tbl_degree');
        }
    });
    
}
function cessationRenewTeacherRegister(){
    let result = window.location.href;
    let url = new URL(result);
    let id = url.searchParams.get("id");
    var student_info_id=$('#student_info_id').val();
    
    var cessation_reason=$("#cessation_reason").val();
    $.ajax({
        url: BACKEND_URL + "/cessationRenewTeacherRegister",
        data: 'id='+id+"&status=2"+"&student_info_id="+student_info_id+"&cessation_reason="+cessation_reason+"&initial_status="+$('#initial_status').val(),
        type: 'post',
        success: function(result){
            successMessage('You have cessation that user!');
            location.href = '/teacher_registration';
        }
    });
    
    
}
function loadInvoiceByTeacher(id,status){
    var now=new Date();
    var invoiceNo;
    if(status==0){
        invoiceNo="init_tec"+id
    }else{
        invoiceNo="renew_tec"+id
        
    }
    
        $.ajax({
            type : 'POST',
            url : BACKEND_URL+"/getTotalAmount",
            data: 'invoiceNo='+invoiceNo,
            success: function(result){
                
                $.each(result.data, function( index, val ){
                    var from_valid_date = new Date(val.dateTime);
                    var date = addZero(from_valid_date.getDate())+'-'+addZero(from_valid_date.getMonth()+1)+'-'+from_valid_date.getFullYear();
                    $("#payment_date").val(date);
                    $('#period_time').text(date+" to 31-12-"+now.getFullYear());
                    
                })
                
                
                
                
            }
        });
    
}
function addZero(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
}