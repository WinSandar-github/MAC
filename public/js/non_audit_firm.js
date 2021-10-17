function loadAttachFiles(firm_id){
  $.ajax({
    url: BACKEND_URL+"/acc_firm_info/"+firm_id,
    type: 'GET',
    success: function(data){
      var non_audit_data=data.data;
      non_audit_data.forEach(function(element){
        document.getElementById('profile_photo').src = PDF_URL + element.image;
        var non_audit_file=element.non_audit_firm_file;
        if(element.organization_structure_id == 1){
          non_audit_file.forEach(function(item){
            // for Sole Proprietorship
            if(item.letterhead!="null"){
              var letterhead_file = removeBracketedNonAudit(item.letterhead);
              for(var i=0;i<letterhead_file.length;i++){
                $(".lettterhead_sole").append(`<a href='${PDF_URL+letterhead_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".lettterhead_sole").append("<span class='text-primary'>No file</span>");

            if(item.passport_photo!="null"){
              var passport_photo_file = removeBracketedNonAudit(item.passport_photo);
              for(var i=0;i<passport_photo_file.length;i++){
                $(".passport_photo_sole").append(`<a href='${PDF_URL+passport_photo_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".passport_photo_sole").append("<span class='text-warning pl-4'>No file</span>");

            if(item.owner_profile!="null"){
              var owner_profile_file = removeBracketedNonAudit(item.owner_profile);
              for(var i=0;i<owner_profile_file.length;i++){
                $(".profile_owner_sole").append(`<a href='${PDF_URL+owner_profile_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".profile_owner_sole").append("<span class='text-warning pl-4'>No file</span>");

            if(item.education_certificate!="null"){
              var education_certificate_file = removeBracketedNonAudit(item.education_certificate);
              for(var i=0;i<education_certificate_file.length;i++){
                $(".edu_certi_sole").append(`<a href='${PDF_URL+education_certificate_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".edu_certi_sole").append("<span class='text-warning pl-4'>No file</span>");

            if(item.work_exp!="null"){
              var work_exp_file = removeBracketedNonAudit(item.work_exp);
              for(var i=0;i<work_exp_file.length;i++){
                $(".work_exp_sole").append(`<a href='${PDF_URL+work_exp_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".work_exp_sole").append("<span class='text-warning pl-4'>No file</span>");

            if(item.nrc_passport_front!="null"){
              var nrc_passport_front_file = removeBracketedNonAudit(item.nrc_passport_front);
              for(var i=0;i<nrc_passport_front_file.length;i++){
                $(".nrc_passport_front_sole").append(`<a href='${PDF_URL+nrc_passport_front_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".nrc_passport_front_sole").append("<span class='text-warning pl-4'>No file</span>");

            if(item.nrc_passport_back!="null"){
              var nrc_passport_back_file = removeBracketedNonAudit(item.nrc_passport_back);
              for(var i=0;i<nrc_passport_front_file.length;i++){
                $(".nrc_passport_back_sole").append(`<a href='${PDF_URL+nrc_passport_front_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".nrc_passport_back_sole").append("<span class='text-warning pl-4'>No file</span>");

            if(item.tax_clearance!="null"){
              var tax_clearance_file = removeBracketedNonAudit(item.tax_clearance);
              for(var i=0;i<tax_clearance_file.length;i++){
                $(".tax_clearance_sole").append(`<a href='${PDF_URL+tax_clearance_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".tax_clearance_sole").append("<span class='text-warning pl-4'>No file</span>");

          });
        }
        else if(element.organization_structure_id == 2){
          non_audit_file.forEach(function(item){
            // for Partnership
            if(item.certi_or_reg!="null"){
              var certi_or_reg_file = removeBracketedNonAudit(item.certi_or_reg);
              for(var i=0;i<certi_or_reg_file.length;i++){
                $(".cer_reg_copy_partnersip").append(`<a href='${PDF_URL+certi_or_reg_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".cer_reg_copy_partnersip").append("<span class='text-primary'>No file</span>");

            if(item.deeds_memo!="null"){
              var deeds_memo_file = removeBracketedNonAudit(item.deeds_memo);
              for(var i=0;i<deeds_memo_file.length;i++){
                $(".deeds_memos_partnership").append(`<a href='${PDF_URL+deeds_memo_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".deeds_memos_partnership").append("<span class='text-warning pl-4'>No file</span>");

            if(item.letterhead!="null"){
              var letterhead_file = removeBracketedNonAudit(item.letterhead);
              for(var i=0;i<letterhead_file.length;i++){
                $(".letterheads_partnership").append(`<a href='${PDF_URL+letterhead_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".letterheads_partnership").append("<span class='text-warning pl-4'>No file</span>");

            if(item.passport_photo!="null"){
              var passport_photo_file = removeBracketedNonAudit(item.passport_photo);
              for(var i=0;i<passport_photo_file.length;i++){
                $(".pass_photos_partnership").append(`<a href='${PDF_URL+passport_photo_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".pass_photos_partnership").append("<span class='text-warning pl-4'>No file</span>");

            if(item.owner_profile!="null"){
              var owner_profile_file = removeBracketedNonAudit(item.owner_profile);
              for(var i=0;i<owner_profile_file.length;i++){
                $(".profiles_partnership").append(`<a href='${PDF_URL+passport_photo_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".profiles_partnership").append("<span class='text-warning pl-4'>No file</span>");

            if(item.education_certificate!="null"){
              var education_certificate_file = removeBracketedNonAudit(item.education_certificate);
              for(var i=0;i<education_certificate_file.length;i++){
                $(".edu_certi_partnership").append(`<a href='${PDF_URL+education_certificate_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".edu_certi_partnership").append("<span class='text-warning pl-4'>No file</span>");

            if(item.work_exp!="null"){
              var work_exp_file = removeBracketedNonAudit(item.work_exp);
              for(var i=0;i<work_exp_file.length;i++){
                $(".letter_exp_partnership").append(`<a href='${PDF_URL+work_exp_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".letter_exp_partnership").append("<span class='text-warning pl-4'>No file</span>");

            if(item.nrc_passport_front!="null"){
              var nrc_passport_front_file = removeBracketedNonAudit(item.nrc_passport_front);
              for(var i=0;i<nrc_passport_front_file.length;i++){
                $(".nrc_passport_front_partnersip").append(`<a href='${PDF_URL+nrc_passport_front_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".nrc_passport_front_partnersip").append("<span class='text-warning pl-4'>No file</span>");

            if(item.nrc_passport_back!="null"){
              var nrc_passport_back_file = removeBracketedNonAudit(item.nrc_passport_back);
              for(var i=0;i<nrc_passport_front_file.length;i++){
                $(".nrc_passport_back_partnersip").append(`<a href='${PDF_URL+nrc_passport_front_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".nrc_passport_back_partnersip").append("<span class='text-warning pl-4'>No file</span>");

            if(item.tax_clearance!="null"){
              var tax_clearance_file = removeBracketedNonAudit(item.tax_clearance);
              for(var i=0;i<tax_clearance_file.length;i++){
                $(".tax_clearances_partnership").append(`<a href='${PDF_URL+tax_clearance_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".tax_clearances_partnership").append("<span class='text-warning pl-4'>No file</span>");
          });
        }
        else if(element.organization_structure_id == 3){
          non_audit_file.forEach(function(item){
            // for Company Incorporated
            if(item.certificate_incor!="null"){
              var certificate_incor_file = removeBracketedNonAudit(item.certificate_incor);
              for(var i=0;i<certificate_incor_file.length;i++){
                $(".certificate_incor_company").append(`<a href='${PDF_URL+certificate_incor_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".certificate_incor_company").append("<span class='text-primary'>No file</span>");

            if(item.permit_foreign!="null"){
              var permit_foreign_file = removeBracketedNonAudit(item.permit_foreign);
              for(var i=0;i<permit_foreign_file.length;i++){
                $(".permit_foreign_company").append(`<a href='${PDF_URL+permit_foreign_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".permit_foreign_company").append("<span class='text-warning pl-4'>No file</span>");

            if(item.financial_statement!="null"){
              var financial_statement_file = removeBracketedNonAudit(item.financial_statement);
              for(var i=0;i<financial_statement_file.length;i++){
                $(".financial_company").append(`<a href='${PDF_URL+financial_statement_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".financial_company").append("<span class='text-warning pl-4'>No file</span>");

            if(item.tax_reg_certificate!="null"){
              var tax_reg_certificate_file = removeBracketedNonAudit(item.tax_reg_certificate);
              for(var i=0;i<tax_reg_certificate_file.length;i++){
                $(".tax_reg_certi_company").append(`<a href='${PDF_URL+tax_reg_certificate_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".tax_reg_certi_company").append("<span class='text-warning pl-4'>No file</span>");

            if(item.letterhead!="null"){
              var letterhead_file = removeBracketedNonAudit(item.letterhead);
              for(var i=0;i<letterhead_file.length;i++){
                $(".letterheads_company").append(`<a href='${PDF_URL+letterhead_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".letterheads_company").append("<span class='text-warning pl-4'>No file</span>");

            if(item.education_certificate!="null"){
              var education_certificate_file = removeBracketedNonAudit(item.education_certificate);
              for(var i=0;i<education_certificate_file.length;i++){
                $(".edu_certi_company").append(`<a href='${PDF_URL+education_certificate_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".edu_certi_company").append("<span class='text-warning pl-4'>No file</span>");

            if(item.work_exp!="null"){
              var work_exp_file = removeBracketedNonAudit(item.work_exp);
              for(var i=0;i<work_exp_file.length;i++){
                $(".work_exp_company").append(`<a href='${PDF_URL+work_exp_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".work_exp_company").append("<span class='text-warning pl-4'>No file</span>");

            if(item.nrc_passport_front!="null"){
              var nrc_passport_front_file = removeBracketedNonAudit(item.nrc_passport_front);
              for(var i=0;i<nrc_passport_front_file.length;i++){
                $(".nrc_passport_front_company").append(`<a href='${PDF_URL+nrc_passport_front_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".nrc_passport_front_company").append("<span class='text-warning pl-4'>No file</span>");

            if(item.nrc_passport_back!="null"){
              var nrc_passport_back_file = removeBracketedNonAudit(item.nrc_passport_back);
              for(var i=0;i<nrc_passport_front_file.length;i++){
                $(".nrc_passport_back_company").append(`<a href='${PDF_URL+nrc_passport_front_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".nrc_passport_back_company").append("<span class='text-warning pl-4'>No file</span>");

            if(item.tax_clearance!="null"){
              var tax_clearance_file = removeBracketedNonAudit(item.tax_clearance);
              for(var i=0;i<tax_clearance_file.length;i++){
                $(".tax_clearance_company").append(`<a href='${PDF_URL+tax_clearance_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".tax_clearance_company").append("<span class='text-warning pl-4'>No file</span>");

          });
        }
      });
    }
  });
}

function removeBracketedNonAudit(file){
  if(file){
    var new_file=file.replace(/\["/g,"");
    var new_file_1 = new_file.replace(/\\/g,"");
    var new_file_2 = new_file_1.replace(/\"]/g,"");
    var split_new_file=new_file_2.split(',');
    return split_new_file;
    // for(var i=0;i<split_new_file.length;i++){
    //     var file="<a href='#' onclick=loadFile('"+split_new_file[i]+"') id='img' data-toggle='modal' data-target='#fileModal'>View File</a><br/>";
    //     $("."+divname).append(file);
    //   }
  }
}

// function showNonAuditInfo(nonAuditId) {
//   localStorage.setItem("id",nonAuditId);
//   $.ajax({
//       url: FRONTEND_URL + "/show_non_audit_firm_info",
//       type: 'post'
//
//   });
//   //location.href=FRONTEND_URL+"/non-audit-firm-show_info";
//
// }

function approveNonAuditFirm(id){
  if (!confirm('Are you sure you want to approve this firm ?')){
    return;
  }
  else{
    //var id = $("input[name = audit_firm_id]").val();
    $.ajax({
        url: BACKEND_URL + "/approve_non_auditfirm/"+id,
        type: 'patch',
        success: function(result){
            successMessage("You have approved that user!");
            location.href = FRONTEND_URL + "/non-audit-firm-list";
        }
    });
  }
}

function approveNonAuditFirmRenew(id,firm_id){
  if (!confirm('Are you sure you want to approve this firm ?')){
    return;
  }
  else{
    // var id = $("input[name = student_info_id]").val();
    // var firm_id = $("input[name = audit_firm_id]").val();

    // console.log('approveaudit_firm',id);
    $.ajax({
        url: BACKEND_URL + "/approve_auditfirm_renew/"+id+"/"+firm_id,
        type: 'patch',
        success: function(result){
          // console.log(result)
            successMessage("You have approved that user!");
            location.href = FRONTEND_URL + "/non-audit-firm-list";
        }
    });
  }

}

function approveNonAuditFirmReconnect(id,firm_id){
  if (!confirm('Are you sure you want to approve this firm ?')){
    return;
  }
  else{
    // var id = $("input[name = student_info_id]").val();
    // var firm_id = $("input[name = audit_firm_id]").val();

    // console.log('approveaudit_firm',id);
    $.ajax({
        url: BACKEND_URL + "/approve_auditfirm_reconnect/"+id+"/"+firm_id,
        type: 'patch',
        success: function(result){
          // console.log(result)
            successMessage("You have approved that user!");
            location.href = FRONTEND_URL + "/offline_user";
        }
    });
  }
}

function rejectNonAuditFirm(id){
  if (!confirm('Are you sure you want to approve this firm ?')){
    return ;
  }
  else{
    //var id = $("input[name = audit_firm_id]").val();
    var formData = new FormData();
    formData.append('remark', $('#remark').val());
    $.ajax({
        url: BACKEND_URL +"/reject_non_auditfirm/"+id,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(result){
            successMessage("You have rejected that user!");
            location.href = FRONTEND_URL + "/non-audit-firm-list";
        }
    });
  }
}

function rejectNonAuditFirmRenew(id,firm_id){
  if (!confirm('Are you sure you want to reject this firm ?')){
    return;
  }
  else{
    // var id = $("input[name = audit_firm_id]").val();
    // var firm_id = $("input[name = audit_firm_id]").val();
    var formData = new FormData();
    formData.append('remark', $('#remark').val());
    //alert("youk");
    $.ajax({
        url: BACKEND_URL +"/reject_auditfirm_renew/"+id+"/"+firm_id,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(result){
            successMessage("You have rejected that user!");
            location.href = FRONTEND_URL + "/non-audit-firm-list";
        }
    });
  }
}

function rejectNonAuditFirmReconnect(id,firm_id){
  if (!confirm('Are you sure you want to reject this firm ?')){
    return;
  }
  else{
    // var id = $("input[name = audit_firm_id]").val();
    // var firm_id = $("input[name = audit_firm_id]").val();
    var formData = new FormData();
    formData.append('remark', $('#remark').val());
    //alert("youk");
    $.ajax({
        url: BACKEND_URL +"/reject_auditfirm_reconnect/"+id+"/"+firm_id,
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(result){
            successMessage("You have rejected that user!");
            location.href = FRONTEND_URL + "/offline_user";
        }
    });
  }
}

// function showReconnectNonAuditInfo(nonAuditId) {
//   localStorage.setItem("id",nonAuditId);
//   $.ajax({
//       url: FRONTEND_URL + "/show_non_audit_reconnect_info/" + nonAuditId,
//       type: 'get'
//
//   });
//   //location.href=FRONTEND_URL+"/non-audit-firm-show_info";
// }
