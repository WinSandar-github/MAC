var counter = 0;                      

function addRowCPAFF(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row-1)+'</td>';
    cols += '<td><div class="form-group"><input type="date" name="date1" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td><div class="form-group"><input type="date" name="date2" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td><div class="form-group"><input type="date" name="date3" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td class="border-color">'+ 
                '<div class="input-group mt-3">'+                                                    
                    '<div class="custom-file">'+
                        '<input type="file" class="custom-file-input" id="inputfile2" multiple>'+                        
                    '</div>'+
                '</div>'+                                                                                    
            
                '<div class="form-group">'+
                    '<input type="text" name="" class="form-control" placeholder="Signture of Registrar" required>'+
                '</div>'+ 
            '</td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowCPAFF("'+tbody+'")  value="X"></td>';            
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowCPAFF(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowCPAPA(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row-1)+'</td>';
    cols += '<td><div class="form-group"><input type="date" name="date4" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td><div class="form-group"><input type="date" name="date5" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td><div class="form-group"><input type="date" name="date6" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td class="border-color">'+ 
                '<div class="input-group mt-3">'+                                                    
                    '<div class="custom-file">'+
                        '<input type="file" class="custom-file-input" id="inputfile2" multiple>'+
                        '<label class="custom-file-label" >Choose file</label>'+
                    '</div>'+
                '</div>'+                                                                                    
            
                '<div class="form-group">'+
                    '<input type="text" name="" class="form-control" placeholder="Signture of Registrar" required>'+
                '</div>'+ 
            '</td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowCPAPA("'+tbody+'")  value="X"></td>';            
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowCPAPA(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}


function addRowSubject(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" class="form-control" name="education[]" placeholder="လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း"/></td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowSubject("'+tbody+'")  value="X"></td>';            
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function addRowDipSubject(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" class="form-control" name="education[]" placeholder="လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း"/></td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowSubject("'+tbody+'")  value="X"></td>';            
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowSubject(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowInCountryEducation(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" class="form-control" name="education[]" placeholder="ပြည်တွင်းမှရရှိသည့် ပညာအရည်အချင်း"/></td>';
    cols += '<td class="text-center"><input type="file" id="image" name="image"></td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowInCountryEducation("'+tbody+'")  value="X"></td>';            
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowInCountryEducation(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowEducation(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" class="form-control" name="education[]" placeholder="ပညာအရည်အချင်း"/></td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowEducation("'+tbody+'")  value="X"></td>';            
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowEducation(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowBranch(tbody){
    var newRow = $("<tr>");
    var cols = "";
    
    cols += '<td><input type="text" name="bo_branch_name[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" name="bo_township[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" name="bo_post_code[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" name="bo_city[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" name="bo_state_region[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" name="bo_phone[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><button class="btn btn-primary btn-sm" type="button" onclick=addInputTele("'+tbody+'")><i class="fa fa-plus"></i></button></td>';
    cols += '<td><input type="text" name="bo_email[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" name="bo_website[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowBranch("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowBranch(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowPartner(tbody){
    
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" name="partner_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="partner_private_regno[]" class="form-control" /></td>';
    cols += '<td><input type="radio" name="report_yes" id="report_yes[]" > Yes</td>';
    cols += '<td><input type="radio" name="report_yes" id="report_no[]" > No</td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowPartner("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowPartner(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}
function addRowDirector(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" name="director_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="director_position[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="director_cpa_no" class="form-control" /> </td>';
    cols += '<td><input type="text" name="director_private_regno" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowDirector("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowDirector(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowPartnerByNonAudit(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" value="" name="fona_name[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" value="" name="fona_pass_csc_inco[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowPartnerByNonAudit("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowPartnerByNonAudit(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1;
        
    });
}
function addRowDirectorByNonAudit(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" value="" name="dona_name[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" value="" name="dona_position[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" value="" name="dona_passport[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" value="" name="dona_csc_no[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowDirectorByNonAudit("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowDirectorByNonAudit(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}
function addRowDirectorCPA(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" value="" name="mf_name[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" name="mf_position[]" class="form-control" autocomplete="off"/></td>';
    cols += '<td><input type="text" name="mf_cpa_passed_reg_no[]" class="form-control" autocomplete="off"/> </td>';
    cols += '<td><input type="text" name="mf_cpa_full_reg_no[]" class="form-control" autocomplete="off"/> </td>';
    cols += '<td><input type="text" name="mf_pub_pra_reg_no[]" class="form-control" autocomplete="off"/> </td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowDirectorCPA("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowDirectorCPA(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}
function addRowAuditWork(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" name="audit_work_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="audit_work_list[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="audit_work_ppa[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowAuditWork("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowAuditWork(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}
function addRowSchoolFounder(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" name="school_founder_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="school_founder_passport[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_founder_cpa[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_founder_qual[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_founder_address[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_founder_phone[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowShoolFounder("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowShoolFounder(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}
function addRowSchoolManager(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" name="school_manager_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="school_manager_passport[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_manager_cpa[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_manager_qual[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_manager_duty[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_manager_phone[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowShoolManager("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowShoolManager(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}
function addRowSchoolExecutive(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" name="school_executive_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="school_executive_passport[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_executive_cpa[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_executive_qual[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_executive_duty[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_executive_phone[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowShoolExecutive("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowShoolExecutive(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}
function addRowSchoolTeacher(tbody){
    var newRow = $("<tr>");
    var cols = "";
    var row=$('.'+tbody+' tr').length;
    cols += '<td>'+ (row)+'</td>';
    cols += '<td><input type="text" name="school_teacher_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="school_teacher_passport[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_teacher_tp[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_teacher_qual[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_teacher_subject[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_teacher_phone[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowShoolTeacher("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delRowShoolTeacher(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}
function addInputTele(tbody){
    var newRow = $("<tr>");
    var cols = "";

    cols += '<td></td>';
    cols += '<td></td>';
    cols += '<td></td>';
    cols += '<td></td>';
    cols += '<td></td>';
    cols += '<td><input type="text" name="branch_telephone[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delInputTele("'+tbody+'")><i class="fa fa-trash"></i></button></td>';
    cols += '<td></td>';
    cols += '<td></td>';
    cols += '<td></td>';
    newRow.append(cols);
    $("table."+tbody).append(newRow);
    counter++;
}
function delInputTele(tbody){
    $("table."+tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}
function createDatepicker(name){
    $("input[name='"+name+"']").flatpickr({
        enableTime: false,
        dateFormat: "d-m-Y",
    });
}
function getTotalStaff(){
    
    if($('#principal_total').val()!="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()==""){
        $('#total_staff_total').val($('#principal_total').val()); 
    }else if($('#principal_total').val()!="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()==""){
        $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#non_principal_total').val())); 
    }else if($('#principal_total').val()!="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()==""){
        $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#managerial_level_total').val())); 
    }else if($('#principal_total').val()!="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()!=""){
        $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#non-mangerial_level_total').val())); 
    }else if($('#principal_total').val()!="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()!=""){
        $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#managerial_level_total').val())+parseInt($('#non-mangerial_level_total').val())); 
    }else if($('#principal_total').val()!="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()!=""){
        $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#non_principal_total').val())+parseInt($('#non-mangerial_level_total').val())); 
    }else if($('#principal_total').val()!="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()==""){
        $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#non_principal_total').val())+parseInt($('#managerial_level_total').val())); 
        }else if($('#principal_total').val()!="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()!=""){
            $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#non_principal_total').val())+parseInt($('#managerial_level_total').val())+parseInt($('#non-mangerial_level_total').val()));//first row 
        }else if($('#principal_total').val()=="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()==""){
        $('#total_staff_total').val($('#non_principal_total').val()); 
    }else if($('#principal_total').val()=="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()==""){
        $('#total_staff_total').val(parseInt($('#non_principal_total').val())+parseInt($('#managerial_level_total').val())); 
    }else if($('#principal_total').val()=="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()!=""){
        $('#total_staff_total').val(parseInt($('#non_principal_total').val())+parseInt($('#managerial_level_total').val())+parseInt($('#non-mangerial_level_total').val())); 
    }else if($('#principal_total').val()=="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()!=""){
        $('#total_staff_total').val(parseInt($('#non_principal_total').val())+parseInt($('#non-mangerial_level_total').val())); //second
    }else if($('#principal_total').val()=="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()==""){
        $('#total_staff_total').val($('#managerial_level_total').val()); 
    }else if($('#principal_total').val()=="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()!=""){
        $('#total_staff_total').val(parseInt($('#managerial_level_total').val())+parseInt($('#non-mangerial_level_total').val())); //third
    }else if($('#principal_total').val()=="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()!=""){
        $('#total_staff_total').val($('#non-mangerial_level_total').val()); 
    }
}
function getTotalAudit(){
    
    if($('#principal_audit').val()!="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()==""){
        $('#total_staff_audit').val($('#principal_audit').val()); 
    }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()==""){
        $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#non_principal_audit').val())); 
    }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()==""){
        $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#managerial_level_audit').val())); 
    }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()!=""){
        $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#non-mangerial_level_audit').val())); 
    }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()!=""){
        $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#managerial_level_audit').val())+parseInt($('#non-mangerial_level_audit').val())); 
    }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()!=""){
        $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#non_principal_audit').val())+parseInt($('#non-mangerial_level_audit').val())); 
    }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()==""){
        $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#non_principal_audit').val())+parseInt($('#managerial_level_audit').val())); 
        }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()!=""){
            $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#non_principal_audit').val())+parseInt($('#managerial_level_audit').val())+parseInt($('#non-mangerial_level_audit').val()));//first row 
        }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()==""){
        $('#total_staff_audit').val($('#non_principal_audit').val()); 
    }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()==""){
        $('#total_staff_audit').val(parseInt($('#non_principal_audit').val())+parseInt($('#managerial_level_audit').val())); 
    }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()!=""){
        $('#total_staff_audit').val(parseInt($('#non_principal_audit').val())+parseInt($('#managerial_level_audit').val())+parseInt($('#non-mangerial_level_audit').val())); 
    }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()!=""){
        $('#total_staff_audit').val(parseInt($('#non_principal_audit').val())+parseInt($('#non-mangerial_level_audit').val())); //second
    }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()==""){
        $('#total_staff_audit').val($('#managerial_level_audit').val()); 
    }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()!=""){
        $('#total_staff_audit').val(parseInt($('#managerial_level_audit').val())+parseInt($('#non-mangerial_level_audit').val())); //third
    }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()!=""){
        $('#total_staff_audit').val($('#non-mangerial_level_audit').val()); 
    }
}
function getTotalNonAudit(){
    
    if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()==""){
        $('#total_staff_non_audit').val($('#principal_non_audit').val()); 
    }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()==""){
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#non_principal_non_audit').val())); 
    }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()==""){
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())); 
    }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()!=""){
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); 
    }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()!=""){
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); 
    }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()!=""){
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#non_principal_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); 
    }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()==""){
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#non_principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())); 
        }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()!=""){
            $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#non_principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val()));//first row 
        }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()==""){
        $('#total_staff_non_audit').val($('#non_principal_non_audit').val()); 
    }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()==""){
        $('#total_staff_non_audit').val(parseInt($('#non_principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())); 
    }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()!=""){
        $('#total_staff_non_audit').val(parseInt($('#non_principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); 
    }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()!=""){
        $('#total_staff_non_audit').val(parseInt($('#non_principal_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); //second
    }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()==""){
        $('#total_staff_non_audit').val($('#managerial_level_non_audit').val()); 
    }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()!=""){
        $('#total_staff_non_audit').val(parseInt($('#managerial_level_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); //third
    }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()!=""){
        $('#total_staff_non_audit').val($('#non-mangerial_level_non_audit').val()); 
    }
}
function getTotalAuditStaff(){
    
    if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val($('#director_total').val()); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_senior_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_assistant_others_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_others_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_others_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_others_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); 
    }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); //first
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())); 
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())); 
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_others_total').val())); 
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_others_total').val())); 
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); 
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); //second
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#audit_senior_total').val())); 
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_others_total').val())); 
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); //third
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
        $('#audit_staff_total').val(parseInt($('#audit_assistant_cpa_total').val())); 
    }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
        $('#audit_staff_total').val(parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); //four
    }else{
        $('#audit_staff_total').val($('#audit_assistant_others_total').val());
    }
    
}
function getTotalFullTime(){
    
    if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val($('#director_full_time').val()); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_senior_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
    }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); //first
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())); 
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())); 
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); //second
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val())); 
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); //third
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
        $('#audit_staff_full_time').val(parseInt($('#audit_assistant_cpa_full_time').val())); 
    }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
        $('#audit_staff_full_time').val(parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); //four
    }else{
        $('#audit_staff_full_time').val($('#audit_assistant_others_full_time').val());
    }
    
}
function getTotalPartTime(){
    
    if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val($('#director_part_time').val()); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_senior_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
    }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); //first
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())); 
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())); 
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_timel').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); //second
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val())); 
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); //third
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
        $('#audit_staff_part_time').val(parseInt($('#audit_assistant_cpa_part_time').val())); 
    }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
        $('#audit_staff_part_time').val(parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); //four
    }else{
        $('#audit_staff_part_time').val($('#audit_assistant_others_part_time').val());
    }
    
}
function getOrganization(){
    var radioValue = $("input[name='org_stru_id']:checked").val();
    if(radioValue==1){
        $('#sole-proprietorship').css('display','block');
        $('#partnership').css('display','none');
        $('#company').css('display','none');
    }else if(radioValue==2){
        $('#sole-proprietorship').css('display','none');
        $('#partnership').css('display','block');
        $('#company').css('display','none');
    }else if(radioValue==3){
        $('#sole-proprietorship').css('display','none');
        $('#partnership').css('display','none');
        $('#company').css('display','block');
    }else{
        $('#sole-proprietorship').css('display','none');
        $('#partnership').css('display','none');
        $('#company').css('display','none');
    }
}
function getFileName(file,label){
    
    var filepath=document.getElementById(file);
    for (var i = 0; i <filepath.files.length; ++i) {
        $('#'+label).text(filepath.files.item(i).name);
        
    }
}
function addInputFile(divname,diventry){
    var controlForm = $('.'+divname+':first'),
            currentEntry = $('.btn-add').parents('.'+diventry+':first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);
        newEntry.find('input').val('');
        controlForm.find('.'+diventry+':not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-primary').addClass('btn-danger')
            .attr("onclick","delInputFile('"+diventry+"')")
            .html('<span class="fa fa-trash"></span>');
            

}
function delInputFile(diventry){
    $('.btn-remove').parents('.'+diventry+':first').remove();
}

// function createNonAuditFirm(){

//     // alert("Hello");
    
//     var alldata={};
//     alldata['accountancy_firm_reg_no']=$("input[name=accountancy_firm_reg_no]").val();
//     alldata['accountancy_firm_name']=$("input[name=accountancy_firm_name]").val();
//     alldata['township']=$("input[name=township]").val();
//     alldata['post_code']=$("input[name=post_code]").val();
//     alldata['city']=$("input[name=city]").val();
//     alldata['state']=$("input[name=state]").val();
//     alldata['phone_no']=$("input[name=phone_no]").val();
//     alldata['email']=$("input[name=email]").val();
//     alldata['website']=$("input[name=website]").val();
//     alldata['audit_firm_type_id']=$("input[name=audit_firm_type_id]").val();
//     alldata['local_foreign_id']=$("input[name=local_foreign_id]").val();
//     alldata['org_stru_id']=$("input[name=org_stru_id]").val();
//     alldata['t_s_p_id']=$("input[name=t_s_p_id]").val();
//     alldata['name_sole_proprietor']=$("input[name=name_sole_proprietor]").val();
//     alldata['declaration']=$("input[name=declaration]").val();
//     alldata['bo_branch_name']=$('input[name="bo_branch_name[]"]').map(function(){return $(this).val();}).get();
//     alldata['bo_township']=$('input[name="bo_township[]"]').map(function(){return $(this).val();}).get();
//     alldata['bo_post_code']=$('input[name="bo_post_code[]"]').map(function(){return $(this).val();}).get();
//     alldata['bo_city']=$('input[name="bo_city[]"]').map(function(){return $(this).val();}).get();
//     alldata['bo_state_region']=$('input[name="bo_state_region[]"]').map(function(){return $(this).val();}).get();
//     alldata['bo_phone']=$('input[name="bo_phone[]"]').map(function(){return $(this).val();}).get();
//     alldata['bo_email']=$('input[name="bo_email[]"]').map(function(){return $(this).val();}).get();
//     alldata['bo_website']=$('input[name="bo_website[]"]').map(function(){return $(this).val();}).get();
//     alldata['fona_name']=$('input[name="fona_name[]"]').map(function(){return $(this).val();}).get();
//     alldata['fona_pass_csc_inco']=$('input[name="fona_pass_csc_inco[]"]').map(function(){return $(this).val();}).get();
//     alldata['dona_name']=$('input[name="dona_name[]"]').map(function(){return $(this).val();}).get();
//     alldata['dona_position']=$('input[name="dona_position[]"]').map(function(){return $(this).val();}).get();
//     alldata['dona_passport']=$('input[name="dona_passport[]"]').map(function(){return $(this).val();}).get();
//     alldata['dona_csc_no']=$('input[name="dona_csc_no[]"]').map(function(){return $(this).val();}).get();
//     alldata['nats_total']=$('input[name="nats_total[]"]').map(function(){return $(this).val();}).get();
//     alldata['nats_type_id']=$('input[name="nats_type_id[]"]').map(function(){return $(this).val();}).get();
//     // alldata['letterheads']=$('input[name="letterheads[]"]').map(function(){return $(this).val();}).get();
//     console.log(alldata);
//     $.ajax({
//         url: "/api/acc_firm_info",
//         type: 'post',
//         data: alldata,
//         success: function(result){
//           confirm.log(result);
//            //successMessage(result);
//       }
//     });
// }

function createNonAuditFirm(){
    
    var send_data=new FormData();
    send_data.append('accountancy_firm_reg_no',$("input[name=accountancy_firm_reg_no]").val());
    send_data.append('accountancy_firm_name',$("input[name=accountancy_firm_name]").val());
    send_data.append('township',$("input[name=township]").val());
    send_data.append('post_code',$("input[name=post_code]").val());
    send_data.append('city',$("input[name=city]").val());
    send_data.append('state',$("input[name=state]").val());
    send_data.append('phone_no',$("input[name=phone_no]").val());
    send_data.append('email',$("input[name=email]").val());
    send_data.append('website',$("input[name=website]").val());
    send_data.append('audit_firm_type_id',$("input[name=audit_firm_type_id]").val());
    send_data.append('local_foreign_id',$("input[name=local_foreign_id]").val());
    send_data.append('org_stru_id',$("input[name=org_stru_id]").val());
    send_data.append('t_s_p_id',$("input[name=t_s_p_id]").val());
    send_data.append('name_sole_proprietor',$("input[name=name_sole_proprietor]").val());
    send_data.append('declaration',$("input[name=declaration]").val());
    $('input[name="bo_branch_name[]"]').map(function(){send_data.append('bo_branch_name[]',$(this).val())});
    $('input[name="bo_township[]"]').map(function(){send_data.append("bo_township[]",$(this).val());});
    $('input[name="bo_post_code[]"]').map(function(){send_data.append("bo_post_code[]",$(this).val());});
    $('input[name="bo_city[]"]').map(function(){send_data.append("bo_city[]",$(this).val());});
    $('input[name="bo_state_region[]"]').map(function(){send_data.append("bo_state_region[]",$(this).val());});
    $('input[name="bo_phone[]"]').map(function(){send_data.append("bo_phone[]",$(this).val());});
    $('input[name="bo_email[]"]').map(function(){send_data.append("bo_email[]",$(this).val());});
    $('input[name="bo_website[]"]').map(function(){send_data.append("bo_website[]",$(this).val());});
    $('input[name="fona_name[]"]').map(function(){send_data.append("fona_name[]",$(this).val());});
    $('input[name="fona_pass_csc_inco[]"]').map(function(){send_data.append("fona_pass_csc_inco[]",$(this).val());});
    // $("input[id=report_yes]").map(function(){send_data.append('foa_authority_to_sign[]',$(this).val());});
    $('input[name="dona_name[]"]').map(function(){send_data.append("dona_name[]",$(this).val());});
    $('input[name="dona_position[]"]').map(function(){send_data.append("dona_position[]",$(this).val());});
    $('input[name="dona_passport[]"]').map(function(){send_data.append("dona_passport[]",$(this).val());});
    $('input[name="dona_csc_no[]"]').map(function(){send_data.append("dona_csc_no[]",$(this).val());});
    $('input[name="nats_total[]"]').map(function(){send_data.append("nats_total[]",$(this).val());});
    // $('input[name="ats_audit_staff[]"]').map(function(){send_data.append("ats_audit_staff[]",$(this).val());});
    // $('input[name="ats_non_audit_staff[]"]').map(function(){send_data.append("ats_non_audit_staff[]",$(this).val());});
    $('input[name="nats_type_id[]"]').map(function(){send_data.append("nats_type_id[]",$(this).val());});
    // $('input[name="as_total[]"]').map(function(){send_data.append("as_total[]",$(this).val());});
    // $('input[name="as_full_time[]"]').map(function(){send_data.append("as_full_time[]",$(this).val());});
    // $('input[name="as_part_time[]"]').map(function(){send_data.append("as_part_time[]",$(this).val());});
    // $('input[name="as_audit_staff_type_id[]"]').map(function(){send_data.append('as_audit_staff_type_id[]',$(this).val());});
    
    
    
    $('input[name="letterheads[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('letterheads[]',$(this).get(0).files[i]);
        }      
    });

    $('input[name="pass_photos[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('pass_photos[]',$(this).get(0).files[i]);
        }      
    });

    $('input[name="owner_profiles[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('owner_profiles[]',$(this).get(0).files[i]);
        }      
    });

    $('input[name="edu_certs[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('edu_certs[]',$(this).get(0).files[i]);
        }      
    });

    $('input[name="work_exps[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('work_exps[]',$(this).get(0).files[i]);
        }      
    });

    $('input[name="nrc_passports[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('nrc_passports[]',$(this).get(0).files[i]);
        }      
    });

    $('input[name="tax_clearances[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('tax_clearances[]',$(this).get(0).files[i]);
        }      
    });
    
    $('input[name="representatives[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('representatives[]',$(this).get(0).files[i]);
        }      
    });

    $('input[name="certi_or_regs[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('certi_or_regs[]',$(this).get(0).files[i]);
        }      
    });

    $('input[name="deeds_memos[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('deeds_memos[]',$(this).get(0).files[i]);
        }      
    });

    $('input[name="certificate_incors[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('certificate_incors[]',$(this).get(0).files[i]);
        }      
    });

    $('input[name="permit_foreigns[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('permit_foreigns[]',$(this).get(0).files[i]);
        }      
    });

    $('input[name="tax_reg_certificate[]"]').map(function(){
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            send_data.append('tax_reg_certificate[]',$(this).get(0).files[i]);
        }      
    });

    
    
          $.ajax({
                  url: "/api/acc_firm_info",
                  type: 'post',
                  data:send_data,
                  contentType: false,
                  processData: false,
                  success: function(result){
                   
                    // successMessage(result);
                    // location.href="/audit_firm_registration";
                }
              });
  }
  






         
