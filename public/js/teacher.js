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
		{mm:'က',eng:'Ka'},
		{mm:'ခ' ,eng:'Kha'},
		{mm:'ဂ' ,eng:'Ga'},
		{mm:'ဃ' ,eng:'Gha'},
		{mm:'င' ,eng:'Nga'},
		{mm:'စ' ,eng:'Sa'},
		{mm:'ဆ' ,eng: 'Hsa'},
		{mm:'ဇ' ,eng: 'Za'},
		{mm:'ဈ',eng: 'Zha'},
		{mm:'ည' ,eng: 'Nya'},
		{mm:'ဎ',eng: 'Dd'},
		{mm:'ဏ' ,eng: 'Nha'},
		{mm:'တ' ,eng: 'Ta'},
		{mm:'ထ' ,eng: 'Hta'},
		{mm:'ဒ' ,eng: 'Da'},
		{mm:'ဓ',eng: 'Dha'},
		{mm:'န' ,eng: 'Na'},
		{mm:'ပ' ,eng: 'Pa'},
		{mm:'ဖ' ,eng: 'Pha'},
		{mm:'ဗ' ,eng: 'Bha'},
		{mm:'ဘ',eng : 'Ba'},
		{mm:'မ' ,eng:'Ma'},
		{mm:'ယ',eng: 'Ya'},
		{mm:'ရ' ,eng: 'Ra'},
		{mm:'လ' ,eng: 'La'},
		{mm:'ဝ' ,eng: 'Wa'},
		{mm:'သ',eng: 'Tha'},
		{mm:'ဟ',eng: 'Ha'},
		{mm:'ဠ' ,eng: 'Ll'},
		{mm:'အ',eng: 'Ah'},
		{mm:'ဥ' ,eng: 'U'},
		{mm:'ဧ' ,eng: 'E'}
	];
    var regions_states = [
		{
			region_en: '1',			// 'Kachin'
			region_mm : '၁',			// 'ကချင်ပြည်နယ်'
		},
		{
			
			region_en : '2',			// 'Kayah'
			region_mm : '၂'			// ကယားပြည်နယ်
		},
		{
			
			region_en: '3',			// 'Kayin'
			region_mm: '၃'			// 'ကရင်ပြည်နယ်'
		},
		{
			
			region_en : '4',			// 'Chin'
			region_mm : '၄'			//	'ချင်းပြည်နယ်'
		},
		{
			
			region_en : '5',			// 'Sagaing'
			region_mm : '၅'			//	'စစ်ကိုင်းတိုင်း'
		},
		{
			
			region_en : '6',			// 'Tanintharyi'
			region_mm : '၆'			//	'တနင်္သာရီတိုင်း'
		},
		{
			
			region_en: '7',			// 'Bago'
			region_mm : '၇'			//	'ပဲခူးတိုင်း'
		},
		{
			
			region_en : '8',			// 'Magway'
			region_mm :'၈'			//	'မကွေးတိုင်း'
		},
		{
			
			region_en : '9',			// 'Mandalay'
			region_mm : '၉'			//	'မန္တလေးတိုင်း'
		},
		{
			
			region_en : '10',		// 'Mon'
			region_mm : '၁၀'			//	'မွန်ပြည်နယ်'
		},
		{
			
			region_en : '11',		// 'Rakhine'
			region_mm : '၁၁'			//	'ရခိုင်ပြည်နယ်'
		},
		{
			
			region_en : '12',		//	'Yangon'
			region_mm : '၁၂'			//	'ရန်ကုန်တိုင်း'
		},
		{
			
			region_en : '13',		// 'Shan'
			region_mm : '၁၃'			//	'ရှမ်းပြည်နယ်'
		},
		{
			
			region_en : '14',		// 'Ayeyawady'
			region_mm : '၁၄'			//	'ဧရာဝတီတိုင်း'
        }
	];
    var citizens = [
		{
			citizen_en : 'N',
			citizen_mm: 'နိုင်'
		},
		{
			citizen_en: 'E',
			citizen_mm: 'ဧည့်'
		},
		{
			citizen_en: 'P',
			citizen_mm: 'ပြု'
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
                
                if(value.certificates.search(/[\'"[\]']+/g)==0){
                    loadCertificates(value.certificates.replace(/[\'"[\]']+/g, ''),value.payment_method,"#tbl_certificate");
                    loadCard(value.certificates.replace(/[\'"[\]']+/g, ''));
                    
                }else{
                    loadCertificates(value.certificates,value.payment_method,"#tbl_certificate");
                    loadCard(value.certificates);
                }
                if(value.diplomas.search(/[\'"[\]']+/g)==0){
                    loadCertificates(value.diplomas.replace(/[\'"[\]']+/g, ''),value.payment_method,"#tbl_diploma");
                    loadCard(value.diplomas.replace(/[\'"[\]']+/g, ''));
                }else{
                    loadCertificates(value.diplomas,value.payment_method,"#tbl_diploma");
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
                $(".nrc_front").append(`<a href='${PDF_URL+value.nrc_front}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01 "></i></a>`);
                $(".nrc_back").append(`<a href='${PDF_URL+value.nrc_back}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a>`);
                $("#race").append(value.race);
                $("#religion").append(value.religion);
                $("#date_of_birth").append(value.date_of_birth);
                $("#address").append(value.address);
                $("#current_address").append(value.current_address);
                $("#position").append(value.position);
                $("#department").append(value.department);
                $("#organization").append(value.organization);
                loadEductaionHistory(value.id);
                if(value.school_type==0){
                    $("#school_name").append("Individual");
                }else{
                    if(value.school_id==null){
                        $("#school_name").append(value.school_name);
                    }else{
                        loadSchoolName(value.school_id);
                    }
                   
                }
                if(value.payment_method!=null){
                    $('.period').show();
                    var now=new Date();
                    if(value.initial_status==0){
                        var new_date=value.from_valid_date.split(' ');
                    }else if(value.initial_status==1){
                        var new_date=value.renew_date.split(' ');
                    }
                    
                    var period_date=new_date[0].split('-');
                    var period=period_date[2]+'-'+period_date[1]+'-'+period_date[0];
                   $('#period_time').text(period+" to 31-12-"+now.getFullYear());
                   
                    $("#payment_date").val(period);
                    $('.invoice_no').append(value.t_code);
                    $(".payment_date").append(period);
                    
                }
                $('#student_info_id').val(value.student_info_id);
                $('#teacher_id').val(value.id);
                if(value.initial_status==0){
                    $('.form-name').append('ဆရာပုံစံ-၁');
                }else{
                    
                    $('.form-name').append('ဆရာပုံစံ-၂');
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
    var teacher_id=$('#teacher_id').val();
    var check = confirm("Are you sure?");
    if (check == true) {
        $.ajax({
            url: BACKEND_URL + "/approve_teacher_register",
            data: 'id='+id+"&status=1"+"&student_info_id="+student_info_id,
            type: 'post',
            success: function(result){
                successMessage('You have approved that user!');
                location.href = FRONTEND_URL + '/teacher_registration';
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
    var reason=$("#reason").val();
    $.ajax({
        url: BACKEND_URL + "/approve_teacher_register",
        data: 'id='+id+"&status=2"+"&student_info_id="+student_info_id+"&reason="+reason,
        type: 'post',
        success: function(result){
            successMessage('You have rejected that user!');
            location.href = '/teacher_registration';
        }
    });
    
    
}

function loadCertificates(name,payment_status,tbody){
    var name=name.split(',');
    
    var payment_status;
    if(payment_status!=null){
        payment_status="ပြီး";
    }else{
        payment_status="မပြီး";
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
                        
                        sumTotalAmount(data[0].form_fee+data[0].registration_fee);
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
    
    $('#tbl_certificate tbody').each(function() {
        sum += removeComma($(this).find('td:eq(2)').html())*row_cpa;
        
     });
     $('#tbl_diploma tbody').each(function() {
        sum += removeComma($(this).find('td:eq(2)').html())*row_da;
        
     });
     
     $('#subject_total_amount').val(thousands_separators(sum+total));
}

function loadSchoolName(school_id){
    $.ajax({
        type : 'GET',
        url : BACKEND_URL+"/school/"+school_id,
        success: function (result) {
            $('#school_name').append(result.data.school_name);
        }
    });    
}
function loadEductaionHistory(id){
    
    $.ajax({
        type : 'POST',
        url : BACKEND_URL+"/getEducationHistory",
        data: 'teacher_id='+id,
        success: function(result){
            $.each(result.data, function( index, value ) {
                var tr = "<tr>";
                tr += `<td> ${ index += 1 } </td>`;
                tr += `<td> ${ value.university_name } </td>`;
                tr += `<td><a href='${PDF_URL+value.certificate}' style='margin-top:0.5px;' target='_blank' class='btn btn-success btn-md'><i class="nc-icon nc-tap-01"></i></a></td>`;
                tr += "</tr>";
                $("#tbl_degree_body").append(tr);
            });
            createDataTable('#tbl_degree');
        }
    });
    
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
                            let li = document.createElement('li');
                            li.textContent = value.subject_name ;
                            
                            const menu = document.querySelector('#menu_one');
                            menu.appendChild(li);
                        }else if(value.code=='cpa_2'){
                            $('#cpa_two').val(newcode[0].toUpperCase()+' '+course_code);
                            let li = document.createElement('li');
                            li.textContent = value.subject_name ;
                            
                            const menu = document.querySelector('#menu_two');
                            menu.appendChild(li);
                        }else if(value.code=='da_1'){
                            $('#da_one').val(newcode[0].toUpperCase()+' '+course_code);
                            let li = document.createElement('li');
                            li.textContent = value.subject_name ;
                            
                            const menu = document.querySelector('#menu_da_one');
                            menu.appendChild(li);
                        }else if(value.code=='da_2'){
                            $('#da_two').val(newcode[0].toUpperCase()+' '+course_code);
                            let li = document.createElement('li');
                            li.textContent = value.subject_name ;
                            
                            const menu = document.querySelector('#menu_da_two');
                            menu.appendChild(li);
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
                    loadCertificates(value.certificates.replace(/[\'"[\]']+/g, ''),value.payment_method,"#tbl_certificate");
                    // loadCard(value.certificates.replace(/[\'"[\]']+/g, ''));
                    
                }else{
                    loadCertificates(value.certificates,value.payment_method,"#tbl_certificate");
                    // loadCard(value.certificates);
                }
                if(value.diplomas.search(/[\'"[\]']+/g)==0){
                    loadCertificates(value.diplomas.replace(/[\'"[\]']+/g, ''),value.payment_method,"#tbl_diploma");
                    // loadCard(value.diplomas.replace(/[\'"[\]']+/g, ''));
                }else{
                    loadCertificates(value.diplomas,value.payment_method,"#tbl_diploma");
                    // loadCard(value.diplomas);
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
                    $('.form-name').append('ဆရာပုံစံ-၁');
                }else{
                    $('.form-name').append('ဆရာပုံစံ-၂');
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
            createDataTable('#tbl_degree');
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