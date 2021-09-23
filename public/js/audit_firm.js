
// function createAuditFirm(){

//   var send_data=new FormData();
//   send_data.append('accountancy_firm_reg_no',$("input[name=accountancy_firm_reg_no]").val());
//   send_data.append('accountancy_firm_name',$("input[name=accountancy_firm_name]").val());
//   send_data.append('township',$("input[name=township]").val());
//   send_data.append('post_code',$("input[name=post_code]").val());
//   send_data.append('city',$("input[name=city]").val());
//   send_data.append('state',$("input[name=state]").val());
//   send_data.append('phone_no',$("input[name=phone_no]").val());
//   send_data.append('email',$("input[name=email]").val());
//   send_data.append('website',$("input[name=website]").val());
//   send_data.append('audit_firm_type_id',$("input[name=audit_firm_type_id]").val());
//   send_data.append('local_foreign_id',$("input[name=local_foreign_id]").val());
//   send_data.append('org_stru_id',$('input[name=org_stru_id]:checked').val());
//   send_data.append('t_s_p_id',$('input[name=t_s_p_id]:checked').val());
//   send_data.append('name_sole_proprietor',$("input[name=name_sole_proprietor]").val());
//   send_data.append('declaration',$("input[name=declaration]").val());
//   $('input[name="bo_branch_name[]"]').map(function(){send_data.append('bo_branch_name[]',$(this).val())});
//   $('input[name="bo_township[]"]').map(function(){send_data.append("bo_township[]",$(this).val());});
//   $('input[name="bo_post_code[]"]').map(function(){send_data.append("bo_post_code[]",$(this).val());});
//   $('input[name="bo_city[]"]').map(function(){send_data.append("bo_city[]",$(this).val());});
//   $('input[name="bo_state_region[]"]').map(function(){send_data.append("bo_state_region[]",$(this).val());});
//   $('input[name="bo_phone[]"]').map(function(){send_data.append("bo_phone[]",$(this).val());});
//   $('input[name="bo_email[]"]').map(function(){send_data.append("bo_email[]",$(this).val());});
//   $('input[name="bo_website[]"]').map(function(){send_data.append("bo_website[]",$(this).val());});
//   $('input[name="foa_name[]"]').map(function(){send_data.append("foa_name[]",$(this).val());});
//   $('input[name="foa_pub_pri_reg_no[]"]').map(function(){send_data.append("foa_pub_pri_reg_no[]",$(this).val());});
//   $('input[name="fona_name[]"]').map(function(){send_data.append("fona_name[]",$(this).val());});
//   $('input[name="fona_pass_csc_inco[]"]').map(function(){send_data.append("fona_pass_csc_inco[]",$(this).val());});
//   $("input[id=report_yes]").map(function(){send_data.append('foa_authority_to_sign[]',$(this).val());});
//   $('input[name="do_name[]"]').map(function(){send_data.append("do_name[]",$(this).val());});
//   $('input[name="do_position[]"]').map(function(){send_data.append("do_position[]",$(this).val());});
//   $('input[name="do_cpa_reg_no[]"]').map(function(){send_data.append("do_cpa_reg_no[]",$(this).val());});
//   $('input[name="do_pub_pri_reg_no[]"]').map(function(){send_data.append("do_pub_pri_reg_no[]",$(this).val());});
//   $('input[name="dona_name[]"]').map(function(){send_data.append("dona_name[]",$(this).val());});
//   $('input[name="dona_position[]"]').map(function(){send_data.append("dona_position[]",$(this).val());});
//   $('input[name="dona_passport[]"]').map(function(){send_data.append("dona_passport[]",$(this).val());});
//   $('input[name="dona_csc_no[]"]').map(function(){send_data.append("dona_csc_no[]",$(this).val());});
//   $('input[name="ats_total[]"]').map(function(){send_data.append("ats_total[]",$(this).val());});
//   $('input[name="ats_audit_staff[]"]').map(function(){send_data.append("ats_audit_staff[]",$(this).val());});
//   $('input[name="ats_non_audit_staff[]"]').map(function(){send_data.append("ats_non_audit_staff[]",$(this).val());});
//   $('input[name="ats_audit_total_staff_type_id[]"]').map(function(){send_data.append("ats_audit_total_staff_type_id[]",$(this).val());});
//   $('input[name="as_total[]"]').map(function(){send_data.append("as_total[]",$(this).val());});
//   $('input[name="as_full_time[]"]').map(function(){send_data.append("as_full_time[]",$(this).val());});
//   $('input[name="as_part_time[]"]').map(function(){send_data.append("as_part_time[]",$(this).val());});
//   $('input[name="as_audit_staff_type_id[]"]').map(function(){send_data.append('as_audit_staff_type_id[]',$(this).val());});
//   $('input[name="nats_total[]"]').map(function(){send_data.append("nats_total[]",$(this).val());});
//   $('input[name="nats_type_id[]"]').map(function(){send_data.append("nats_type_id[]",$(this).val());});
//   $('input[name="mf_name[]"]').map(function(){send_data.append("mf_name[]",$(this).val());});
//   $('input[name="mf_position[]"]').map(function(){send_data.append("mf_position[]",$(this).val());});
//   $('input[name="mf_cpa_passed_reg_no[]"]').map(function(){send_data.append("mf_cpa_passed_reg_no[]",$(this).val());});
//   $('input[name="mf_cpa_full_reg_no[]"]').map(function(){send_data.append("mf_cpa_full_reg_no[]",$(this).val());});
//   $('input[name="mf_pub_pra_reg_no[]"]').map(function(){send_data.append("mf_pub_pra_reg_no[]",$(this).val());});

//    $('input[name="ppa_certis[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('ppa_certis[]',$(this).get(0).files[i]);
//     }

//   });
//   $('input[name="letterheads[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('letterheads[]',$(this).get(0).files[i]);
//     }

//   });
//   $('input[name="representatives[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('representatives[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="pass_photos[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('pass_photos[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="owner_profiles[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('owner_profiles[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="edu_certs[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('edu_certs[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="work_exps[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('work_exps[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="nrc_passports[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('nrc_passports[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="tax_clearances[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('tax_clearances[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="certi_or_regs[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('certi_or_regs[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="deeds_memos[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('deeds_memos[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="certificate_incors[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('certificate_incors[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="permit_foreigns[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('permit_foreigns[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="financial_statements[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('financial_statements[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="tax_reg_certificate[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('tax_reg_certificate[]',$(this).get(0).files[i]);
//     }
//   });

//         $.ajax({
//                 url: BACKEND_URL+"/acc_firm_info",
//                 type: 'post',
//                 data:send_data,
//                 contentType: false,
//                 processData: false,
//                 success: function(result){

//                   successMessage(result);
//                   location.reload();
//               }
//             });
// }
function getAudit(){
  destroyDatatable("#tbl_audit_pending", "#tbl_audit_pending_body");
  destroyDatatable("#tbl_audit_approved", "#tbl_audit_approved_body");
  destroyDatatable("#tbl_audit_rejected", "#tbl_audit_rejected_body");
  destroyDatatable("#tbl_non_audit_pending", "#tbl_non_audit_pending_body");
  destroyDatatable("#tbl_non_audit_approved", "#tbl_non_audit_approved_body");
  destroyDatatable("#tbl_non_audit_rejected", "#tbl_non_audit_rejected_body");
  show_loader();
  $.ajax({
    url: BACKEND_URL+"/acc_firm_info",
    type: 'get',
    data:"",
    success: function(data){
      EasyLoading.hide();
      var audit_data=data.data;
      audit_data.forEach(function (element) {
        if(element.audit_firm_type_id==1){
          // console.log('auditfirm_element',element);
          if(element.status==0){
              status="Pending";
          }
          else if(element.status==1){
              status="Approve";
          }
          else{
              status="Reject";
          }
          if(element.status==0){
            var tr = "<tr>";
            tr += "<td >" +  + "</td>";
            tr += "<td ><div class='btn-group'>" +
                  "<button type='button' class='btn btn-primary btn-xs' onClick='showAuditInfo(" + element.id + ")'>" +
                  "<li class='fa fa-eye fa-sm'></li></button> ";
            tr += "<button type='button' class='btn btn-danger btn-xs' onClick=deleteAuditInfo(\"" + encodeURIComponent(element.accountancy_firm_name) + "\"," + element.id + ")><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
            tr += "<td>" + element.accountancy_firm_reg_no + "</td>";
            tr += "<td >" + element.accountancy_firm_name + "</td>";
            tr += "<td >" + element.township + "</td>";
            tr += "<td >" + element.postcode + "</td>";
            tr += "<td >" + element.city + "</td>";
            tr += "<td >" + element.state_region + "</td>";
            tr += "<td >" + element.telephones + "</td>";
            tr += "<td >" + element.h_email + "</td>";
            tr += "<td >" + element.website + "</td>";
            tr += "<td >" + status + "</td>";

            tr += "</tr>";
            $("#tbl_audit_pending_body").append(tr);
          }
          else if(element.status==1){
            var tr = "<tr>";
            tr += "<td >" +  + "</td>";
            tr += "<td ><div class='btn-group'>" +
                  "<button type='button' class='btn btn-primary btn-xs' onClick='showAuditInfo(" + element.id + ")'>" +
                  "<li class='fa fa-eye fa-sm'></li></button> ";
            tr += "<button type='button' class='btn btn-danger btn-xs' onClick=deleteAuditInfo(\"" + encodeURIComponent(element.accountancy_firm_name) + "\"," + element.id + ")><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
            tr += "<td>" + element.accountancy_firm_reg_no + "</td>";
            tr += "<td >" + element.accountancy_firm_name + "</td>";
            tr += "<td >" + element.township + "</td>";
            tr += "<td >" + element.postcode + "</td>";
            tr += "<td >" + element.city + "</td>";
            tr += "<td >" + element.state_region + "</td>";
            tr += "<td >" + element.telephones + "</td>";
            tr += "<td >" + element.h_email + "</td>";
            tr += "<td >" + element.website + "</td>";
            tr += "<td >" + status + "</td>";

            tr += "</tr>";
            $("#tbl_audit_approved_body").append(tr);
          }
          else if(element.status==2){
            var tr = "<tr>";
            tr += "<td >" +  + "</td>";
            tr += "<td ><div class='btn-group'>" +
                  "<button type='button' class='btn btn-primary btn-xs' onClick='showAuditInfo(" + element.id + ")'>" +
                  "<li class='fa fa-eye fa-sm'></li></button> ";
            tr += "<button type='button' class='btn btn-danger btn-xs' onClick=deleteAuditInfo(\"" + encodeURIComponent(element.accountancy_firm_name) + "\"," + element.id + ")><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
            tr += "<td>" + element.accountancy_firm_reg_no + "</td>";
            tr += "<td >" + element.accountancy_firm_name + "</td>";
            tr += "<td >" + element.township + "</td>";
            tr += "<td >" + element.postcode + "</td>";
            tr += "<td >" + element.city + "</td>";
            tr += "<td >" + element.state_region + "</td>";
            tr += "<td >" + element.telephones + "</td>";
            tr += "<td >" + element.h_email + "</td>";
            tr += "<td >" + element.website + "</td>";
            tr += "<td >" + status + "</td>";

            tr += "</tr>";
            $("#tbl_audit_rejected_body").append(tr);
          }
        }else {
          if(element.status==0){
            status="Pending";
          }
          else if(element.status==1){
              status="Approve";
          }
          else{
              status="Reject";
          }
          if(element.status==0){
            var tr = "<tr>";
            tr += "<td >" +  + "</td>";
            tr += "<td ><div class='btn-group'>" +
                  "<button type='button' class='btn btn-primary btn-xs' onClick='showNonAuditInfo(" + element.id + ")'>" +
                  "<li class='fa fa-eye fa-sm'></li></button> ";
            tr += "<button type='button' class='btn btn-danger btn-xs' onClick=deleteAuditInfo(\"" + encodeURIComponent(element.accountancy_firm_name) + "\"," + element.id + ")><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
            tr += "<td>" + element.accountancy_firm_reg_no + "</td>";
            tr += "<td >" + element.accountancy_firm_name + "</td>";
            tr += "<td >" + element.township + "</td>";
            tr += "<td >" + element.postcode + "</td>";
            tr += "<td >" + element.city + "</td>";
            tr += "<td >" + element.state_region + "</td>";
            tr += "<td >" + element.telephones + "</td>";
            tr += "<td >" + element.h_email + "</td>";
            tr += "<td >" + element.website + "</td>";
            tr += "<td >" + status + "</td>";

            tr += "</tr>";
            $("#tbl_non_audit_pending_body").append(tr);
          }
          else if(element.status==1){
            var tr = "<tr>";
            tr += "<td >" +  + "</td>";
            tr += "<td ><div class='btn-group'>" +
                  "<button type='button' class='btn btn-primary btn-xs' onClick='showNonAuditInfo(" + element.id + ")'>" +
                  "<li class='fa fa-eye fa-sm'></li></button> ";
            tr += "<button type='button' class='btn btn-danger btn-xs' onClick=deleteAuditInfo(\"" + encodeURIComponent(element.accountancy_firm_name) + "\"," + element.id + ")><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
            tr += "<td>" + element.accountancy_firm_reg_no + "</td>";
            tr += "<td >" + element.accountancy_firm_name + "</td>";
            tr += "<td >" + element.township + "</td>";
            tr += "<td >" + element.postcode + "</td>";
            tr += "<td >" + element.city + "</td>";
            tr += "<td >" + element.state_region + "</td>";
            tr += "<td >" + element.telephones + "</td>";
            tr += "<td >" + element.h_email + "</td>";
            tr += "<td >" + element.website + "</td>";
            tr += "<td >" + status + "</td>";

            tr += "</tr>";
            $("#tbl_non_audit_approved_body").append(tr);
          }
          else if(element.status==2){
            var tr = "<tr>";
            tr += "<td >" +  + "</td>";
            tr += "<td ><div class='btn-group'>" +
                  "<button type='button' class='btn btn-primary btn-xs' onClick='showNonAuditInfo(" + element.id + ")'>" +
                  "<li class='fa fa-eye fa-sm'></li></button> ";
            tr += "<button type='button' class='btn btn-danger btn-xs' onClick=deleteAuditInfo(\"" + encodeURIComponent(element.accountancy_firm_name) + "\"," + element.id + ")><li class='fa fa-trash fa-sm' ></li ></button ></div ></td > ";
            tr += "<td>" + element.accountancy_firm_reg_no + "</td>";
            tr += "<td >" + element.accountancy_firm_name + "</td>";
            tr += "<td >" + element.township + "</td>";
            tr += "<td >" + element.postcode + "</td>";
            tr += "<td >" + element.city + "</td>";
            tr += "<td >" + element.state_region + "</td>";
            tr += "<td >" + element.telephones + "</td>";
            tr += "<td >" + element.h_email + "</td>";
            tr += "<td >" + element.website + "</td>";
            tr += "<td >" + status + "</td>";

            tr += "</tr>";
            $("#tbl_non_audit_rejected_body").append(tr);
          }
        }

    });
    getIndexNumber('#tbl_audit_pending tr');
    createDataTable("#tbl_audit_pending");
    getIndexNumber('#tbl_audit_approved tr');
    createDataTable("#tbl_audit_approved");
    getIndexNumber('#tbl_audit_rejected tr');
    createDataTable("#tbl_audit_rejected");
    getIndexNumber('#tbl_non_audit_pending tr');
    createDataTable("#tbl_non_audit_pending");
    getIndexNumber('#tbl_non_audit_approved tr');
    createDataTable("#tbl_non_audit_approved");
    getIndexNumber('#tbl_non_audit_rejected tr');
    createDataTable("#tbl_non_audit_rejected");
    },
    error:function (message){
      dataMessage(message, "#tbl_audit_pending", "#tbl_audit_pending_body");
      dataMessage(message, "#tbl_audit_approved", "#tbl_audit_approved_body");
      dataMessage(message, "#tbl_audit_rejected", "#tbl_audit_rejected_body");
      dataMessage(message, "#tbl_non_audit_pending", "#tbl_non_audit_pending_body");
      dataMessage(message, "#tbl_non_audit_approved", "#tbl_non_audit_approved_body");
      dataMessage(message, "#tbl_non_audit_rejected", "#tbl_non_audit_rejected_body");
  }

});
}
function showAuditInfo(auditId) {
  localStorage.setItem("id",auditId);
  location.href=FRONTEND_URL+"/audit-firm-show_info";

}
function showNonAuditInfo(nonAuditId) {
  localStorage.setItem("id",nonAuditId);
  $.ajax({
      url: FRONTEND_URL + "/show_non_audit_firm_info",
      type: 'post'

  });
  //location.href=FRONTEND_URL+"/non-audit-firm-show_info";

}
function autoLoadAudit(){
  destroyDatatable("#tbl_branch", "#tbl_branch_body");
  destroyDatatable("#tbl_partner", "#tbl_partner_body");
  destroyDatatable("#tbl_partner", "#tbl_partner_body");
  destroyDatatable("#tbl_non_partner", "#tbl_non_partner_body");
  destroyDatatable("#tbl_cpa_myanmar", "#tbl_cpa_myanmar_body");

  // $("#accountancy_firm_reg_no").html();
  var id=localStorage.getItem("id");
  $("input[name = audit_firm_id]").val(id);
  $.ajax({
    type: "GET",
    url: BACKEND_URL+"/acc_firm_info/"+id,
    success: function (data) {
      var audit_data=data.data;
      console.log("audit_data >>",audit_data)
       audit_data.forEach(function(element){
         // console.log('audit_firm',element);
         // console.log('non_audit_firm',element);

        if(element.status==0){
          status="Pending";
        }
        else if(element.status==1){
            status="Approve";
        }
        else{
            status="Reject";
        }

        if(element.local_foreign_id==1){
          local_foreign_id="Local";
        }
        else{
          local_foreign_id="Foreign";
        }

        $("input[name=accountancy_firm_id]").val(element.id);
        $("input[name=audit_firm_type_id]").val(element.audit_firm_type_id);
        $("input[name=local_foreign_id]").val(element.local_foreign_id);
        $("#accountancy_firm_reg_no").append(element.accountancy_firm_reg_no);
        $("#accountancy_firm_name").append(element.accountancy_firm_name);
        $("#head_office_address").append(element.head_office_address);
        $("#township").append(element.township);
        $("#post_code").append(element.postcode);
        $("#city").append(element.city);
        $("#state").append(element.state_region);
        $("#phone_no").append(element.telephones);
        $("#email").append(element.h_email);
        $("#website").append(element.website);
        $("#name_sole_proprietor").append(element.name_of_sole_proprietor);
        $("#declaration").append(element.declaration);
        $("#status").append(status);
        // $("#local_foreign_id").append(local_foreign_id);
        var branch=element.branch_offices;
        branch.forEach(function(item){
          var tr = "<tr>";
          tr += "<td><input readonly type='text' name='bo_branch_name[]' class='form-control' autocomplete='off' value='"+item.branch_name+"'></td>";
          tr += "<td><input readonly type='text' name='bo_address[]' class='form-control' autocomplete='off' value='"+item.branch_address+"'></td>";
          tr += "<td ><input readonly type='text' name='bo_township[]' class='form-control' autocomplete='off' value='"+item.township+"'></td>";
          tr += "<td ><input readonly type='text' name='bo_post_code[]' class='form-control' autocomplete='off' value='"+item.postcode+"'></td>";
          tr += "<td ><input disabled type='text' name='bo_city[]' class='form-control' autocomplete='off' value='"+item.city+"'></td>";
          tr += "<td ><input disabled type='text' name='bo_state_region[]' class='form-control' autocomplete='off' value='"+item.state_region+"'></td>";
          tr += "<td ><input disabled type='text' name='bo_phone[]' class='form-control' autocomplete='off' value='"+item.phones+"'></td>";
          tr += "<td ><button disabled class='btn btn-primary btn-sm' type='button' onclick=addInputTele('branch')>"+
                "<i class='fa fa-plus'></i> </button></td>";
          tr += "<td ><input disabled type='text' name='bo_email[]' class='form-control' autocomplete='off' value='"+item.email+"'></td>";
          tr += "<td ><input disabled type='text' name='bo_website[]' class='form-control' autocomplete='off' value='"+item.website+"'></td>";
          // tr += "<td ></td>" ;
          tr += "</tr>";
          $("#tbl_branch_body").append(tr);
        });

        // for Organization Structure
        $('#org'+element.organization_structure_id).prop("checked", true);
        //$("input[name=org_stru_id][value='"+element.organization_structure_id+"']").prop("checked",true);
        if(element.organization_structure_id==1){
          $('#sole-proprietorship').css('display','block');

        }else if(element.organization_structure_id==2){
          $('#partnership').css('display','block');

        }else if(element.organization_structure_id==3){
          $('#company').css('display','block');

        }

        // Attach Files
        var audit_file=element.audit_firm_file;
        if(element.organization_structure_id == 1){
          audit_file.forEach(function(item){
            // for Sole Proprietorship
            if(item.ppa_certificate!="null"){
              var ppa_certificate_file = removeBracketedAudit(item.ppa_certificate,"ppa_certis");
              for(var i=0;i<ppa_certificate_file.length;i++){
                $(".public_practice_acc_certi").append(`<a href='${PDF_URL+ppa_certificate_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".public_practice_acc_certi").append("<span class='text-warning pl-4'>No file</span>");

            if(item.letterhead!="null"){
              var letterhead_file = removeBracketedAudit(item.letterhead,"letterheads");
              for(var i=0;i<letterhead_file.length;i++){
                $(".stationery_letterhead").append(`<a href='${PDF_URL+letterhead_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".stationery_letterhead").append("<span class='text-warning pl-4'>No file</span>");

            if(item.tax_clearance!="null"){
              var tax_clearance_file = removeBracketedAudit(item.tax_clearance,"tax_clearances");
              for(var i=0;i<tax_clearance_file.length;i++){
                $(".tax_clearances").append(`<a href='${PDF_URL+tax_clearance_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".tax_clearances").append("<span class='text-warning pl-4'>No file</span>");

            if(item.certificate_incor!="null"){
              var certificate_incor_file = removeBracketedAudit(item.certificate_incor,"representatives");
              for(var i=0;i<certificate_incor_file.length;i++){
                $(".representatives").append(`<a href='${PDF_URL+certificate_incor_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".representatives").append("<span class='text-warning pl-4'>No file</span>");

          });
        }

        if(element.organization_structure_id == 2){
          audit_file.forEach(function(item){
            // for Partnership
            if(item.ppa_certificate!="null"){
              var ppa_certificate_file = removeBracketedAudit(item.ppa_certificate,"ppa_certis_partnership");
              for(var i=0;i<ppa_certificate_file.length;i++){
                $(".ppa_certis_partnership").append(`<a href='${PDF_URL+ppa_certificate_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".ppa_certis_partnership").append("<span class='text-primary'>no file</span>");

            if(item.certi_or_reg!="null"){
              var certi_or_reg_file = removeBracketedAudit(item.certi_or_reg,"certi_or_regs_partnership");
              for(var i=0;i<certi_or_reg_file.length;i++){
                $(".certi_or_regs_partnership").append(`<a href='${PDF_URL+certi_or_reg_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".certi_or_regs_partnership").append("<span class='text-warning pl-4'>No file</span>");

            if(item.deeds_memo!="null"){
              var deeds_memo_file = removeBracketedAudit(item.deeds_memo,"deeds_memos_partnership");
              for(var i=0;i<deeds_memo_file.length;i++){
                $(".deeds_memos_partnership").append(`<a href='${PDF_URL+deeds_memo_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".deeds_memos_partnership").append("<span class='text-warning pl-4'>No file</span>");

            if(item.letterhead!="null"){
              var letterhead_file = removeBracketedAudit(item.letterhead,"letterheads_partnership");
              for(var i=0;i<letterhead_file.length;i++){
                $(".letterheads_partnership").append(`<a href='${PDF_URL+letterhead_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".letterheads_partnership").append("<span class='text-warning pl-4'>No file</span>");

            if(item.tax_clearance!="null"){
              var tax_clearance_file = removeBracketedAudit(item.tax_clearance,"tax_clearances_partnership");
              for(var i=0;i<tax_clearance_file.length;i++){
                $(".tax_clearances_partnership").append(`<a href='${PDF_URL+tax_clearance_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".tax_clearances_partnership").append("<span class='text-warning pl-4'>No file</span>");

            if(item.certificate_incor!="null"){
              var certificate_incor_file = removeBracketedAudit(item.certificate_incor_file,"representatives_partnership");
              for(var i=0;i<tax_clearance_file.length;i++){
                $(".representatives_partnership").append(`<a href='${PDF_URL+certificate_incor_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".representatives_partnership").append("<span class='text-warning pl-4'>No file</span>");
          });
        }

        if(element.organization_structure_id == 3){
          audit_file.forEach(function(item){
            // for Company Incorporated
            if(item.ppa_certificate!="null"){
              var ppa_certificate_file = removeBracketedAudit(item.ppa_certificate,"ppa_certis_company");
              for(var i=0;i<ppa_certificate_file.length;i++){
                $(".ppa_certis_company").append(`<a href='${PDF_URL+ppa_certificate_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".ppa_certis_company").append("<span class='text-primary'>no file</span>");

            if(item.certificate_incor!="null"){
              var certificate_incor_file = removeBracketedAudit(item.certificate_incor,"certificate_incors_company");
              for(var i=0;i<certificate_incor_file.length;i++){
                $(".certificate_incors_company").append(`<a href='${PDF_URL+certificate_incor_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".certificate_incors_company").append("<span class='text-warning pl-4'>No file</span>");

            if(item.deeds_memo!="null"){
              var deeds_memo_file = removeBracketedAudit(item.deeds_memo,"memorandums_company");
              for(var i=0;i<deeds_memo_file.length;i++){
                $(".memorandums_company").append(`<a href='${PDF_URL+deeds_memo_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".memorandums_company").append("<span class='text-warning pl-4'>No file</span>");

            if(item.tax_reg_certificate!="null"){
              var deeds_memo_file = removeBracketedAudit(item.tax_reg_certificate,"comercial_tax_reg");
              for(var i=0;i<deeds_memo_file.length;i++){
                $(".comercial_tax_reg").append(`<a href='${PDF_URL+deeds_memo_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".comercial_tax_reg").append("<span class='text-warning pl-4'>No file</span>");

            if(item.letterhead!="null"){
              var letterhead_file = removeBracketedAudit(item.letterhead,"stationery_letterhead_company");
              for(var i=0;i<letterhead_file.length;i++){
                $(".stationery_letterhead_company").append(`<a href='${PDF_URL+letterhead_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".stationery_letterhead_company").append("<span class='text-warning pl-4'>No file</span>");

            if(item.tax_clearance!="null"){
              var tax_clearance_file = removeBracketedAudit(item.tax_clearance,"tax_clearance_company");
              for(var i=0;i<tax_clearance_file.length;i++){
                $(".tax_clearance_company").append(`<a href='${PDF_URL+tax_clearance_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
              }
            }else $(".tax_clearance_company").append("<span class='text-warning pl-4'>No file</span>");

            // if(item.letterhead!="null"){
            //   var letterhead_file = removeBracketedAudit(item.letterhead,"letterheads_partnership");
            //   for(var i=0;i<letterhead_file.length;i++){
            //     $(".letterheads_partnership").append(`<a href='${PDF_URL+letterhead_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
            //   }
            // }else $(".letterheads_partnership").append("<span class='text-warning pl-4'>No file</span>");
            //
            // if(item.tax_clearance!="null"){
            //   var tax_clearance_file = removeBracketedAudit(item.tax_clearance,"tax_clearances_partnership");
            //   for(var i=0;i<tax_clearance_file.length;i++){
            //     $(".tax_clearances_partnership").append(`<a href='${PDF_URL+tax_clearance_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
            //   }
            // }else $(".tax_clearances_partnership").append("<span class='text-warning pl-4'>No file</span>");
            //
            // if(item.certificate_incor!="null"){
            //   var certificate_incor_file = removeBracketedAudit(item.certificate_incor_file,"representatives_partnership");
            //   for(var i=0;i<tax_clearance_file.length;i++){
            //     $(".representatives_partnership").append(`<a href='${PDF_URL+certificate_incor_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
            //   }
            // }else $(".representatives_partnership").append("<span class='text-warning pl-4'>No file</span>");
          });
        }

        // audit_file.forEach(function(item){
        //   // if(item.tax_clearance!="nulaudit_file.forEach(function(){
        //
        //   //   var tax_clearance_file = removeBracketedAudit(item.tax_clearance,"tax_clearances_partnership");
        //   //   for(var i=0;i<tax_clearance_file.length;i++){
        //   //     $(".tax_clearances_partnership").append(`<a href='${PDF_URL+tax_clearance_file[i]}' style='display:block; font-size:16px;text-decoration: none;' target='_blank' align="center">View File</a>`);
        //   //   }
        //   // }else $(".tax_clearances_partnership").append("<span class='text-primary'>no file</span>");
        //
        //
        //   if(item.certificate_incor!="null"){
        //     removeBracketedAudit(item.certificate_incor,"certificate_incors");
        //   }else $(".certificate_incors").append("<span class='text-primary'>no file</span>");
        //
        //   if(item.form6_form26_form_e!="null"){
        //     removeBracketedAudit(item.form6_form26_form_e,"form6_26e");
        //   }else $(".form6_26e").append("<span class='text-primary'>no file</span>");
        //
        //   if(item.form_a1!="null"){
        //     removeBracketedAudit(item.form_a1,"form_a1");
        //   }else $(".form_a1").append("<span class='text-primary'>no file</span>");
        //
        // });

        // for Sole Proprietor/Partners/Shareholders
        if(element.firm_owner_audits.length!=0){
          var firm_owner_audit=element.firm_owner_audits;
          firm_owner_audit.forEach(function(item){
            var tr = "<tr>";
            tr += "<td>" + + "</td>";
            tr += "<td ><input disabled type='text' value='"+ item.name+"' name='foa_name[]' class='form-control' autocomplete='off'></td>";
            tr += "<td ><input disabled type='text' value='"+ item.public_private_reg_no+"' name='foa_pub_pri_reg_no[]' class='form-control' autocomplete='off'></td>";
            if(item.authority_to_sign==1){
              tr += "<td ><input disabled type='radio' value='"+item.authority_to_sign+"' name=foa_authority_to_sign"+item.id+" checked id='report_yes'>"+
                    " <label class='form-check-label'>Yes</label></td>";
              tr += "<td ><input disabled type='radio' value='"+item.authority_to_sign+"' name=foa_authority_to_sign"+item.id+" id='report_yes'>"+
                    " <label class='form-check-label'>No</label></td>";
            }else{
              tr += "<td ><input disabled type='radio' value='"+item.authority_to_sign+"' name=foa_authority_to_sign"+item.id+" id='report_yes'>"+
                    " <label class='form-check-label'>Yes</label></td>";
              tr += "<td ><input disabled type='radio' value='"+item.authority_to_sign+"' name=foa_authority_to_sign"+item.id+" checked id='report_yes'>"+
                    " <label class='form-check-label'>No</label></td>";
            }

            tr += "<td ></td>" ;
            tr += "</tr>";
            $("#tbl_partner_body").append(tr);
          });
        }
          // Director(s)/Officer(s)
          var director_officer_audit=element.director_officer_audits;
          if(director_officer_audit.length!=0){
            director_officer_audit.forEach(function(item){
              var tr = "<tr>";
              tr += "<td>" + + "</td>";
              tr += "<td ><input disabled type='text' value='"+item.name+"' name='do_name[]' class='form-control' autocomplete='off'></td>";
              tr += "<td ><input disabled type='text' value='"+item.position+"' name='do_position[]' class='form-control' autocomplete='off'></td>";
              tr += "<td ><input disabled type='text' value='"+item.cpa_reg_no+"' name='do_cpa_reg_no[]' class='form-control' autocomplete='off'></td>";
              tr += "<td ><input disabled type='text' value='"+item.public_private_reg_no+"' name='do_pub_pri_reg_no[]' class='form-control' autocomplete='off'></td>";
              tr += "<td ></td>" ;
              tr += "</tr>";
              $("#tbl_director_body").append(tr);
            });
          }
          if(element.audit_total_staffs.length!=0 ){
            var audit_total_staff=element.audit_total_staffs;
            audit_total_staff.forEach(function(item){
              $("input[id=total_staff"+item.audit_total_staff_type_id +"]").val(item.total);
              $("input[id=audit_staff"+item.audit_total_staff_type_id +"]").val(item.audit_staff);
              $("input[id=nonaudit_staff"+item.audit_total_staff_type_id +"]").val(item.non_audit_staff);
            })

          }
          if(element.audit_staffs.length!=0){
            var audit_staff=element.audit_staffs;
            audit_staff.forEach(function(item){
              $("input[id=audit_total"+item.audit_staff_type_id+"]").val(item.total);
              $("input[id=full_time"+item.audit_staff_type_id+"]").val(item.full_time);
              $("input[id=part_time"+item.audit_staff_type_id+"]").val(item.part_time);
            })
          }

          // Types Of Service Provided
          $('#type_service'+element.type_of_service_provided_id).prop("checked", true);

            var firm_owner_non_audit=element.firm_owner_non_audits;
            if(firm_owner_non_audit.length!=0){
              firm_owner_non_audit.forEach(function(item){
                var tr = "<tr>";
                tr += "<td>" + + "</td>";
                tr += "<td ><input disabled type='text' value="+item.name+" name='fona_name[]' class='form-control' autocomplete='off'></td>";
                tr += "<td ><input disabled type='text' value="+item.pass_csc_inco +" name='fona_pass_csc_inco[]' class='form-control' autocomplete='off'></td>";

                tr += "<td ></td>" ;
                tr += "</tr>";
                $("#tbl_non_partner_body").append(tr);
              });
            }

            var director_officer_audit=element.director_officer_non_audits;
            director_officer_audit.forEach(function(item){
              var tr = "<tr>";
              tr += "<td>" + + "</td>";
              tr += "<td ><input disabled type='text' value="+item.name+" name='dona_name[]' class='form-control' autocomplete='off'></td>";
              tr += "<td ><input disabled type='text' value="+item.position+" name='dona_position[]' class='form-control' autocomplete='off'></td>";
              tr += "<td ><input disabled type='text' value="+item.passport+" name='dona_passport[]' class='form-control' autocomplete='off'></td>";
              tr += "<td ><input disabled type='text' value="+item.csc_no+" name='dona_csc_no[]' class='form-control' autocomplete='off'></td>";
              tr += "<td ></td>" ;
              tr += "</tr>";
              $("#tbl_director_body").append(tr);
            });
            var audit_file=element.non_audit_firm_file;
            audit_file.forEach(function(item){
              if(item.letterhead!="null"){
                removeBracketedAudit(item.letterhead,"letterheads");
              }else $(".letterheads").append("<span class='text-primary'>no file</span>");

              if(item.representative!="null"){
                removeBracketedAudit(item.representative,"representatives");
              }else $(".representatives").append("<span class='text-primary'>no file</span>");

              if(item.tax_reg_certificate!="null"){
                removeBracketedAudit(item.tax_reg_certificate,"tax_reg_certificate");
              }else $(".tax_reg_certificate").append("<span class='text-primary'>no file</span>");

              if(item.certi_or_reg!="null"){
                removeBracketedAudit(item.certi_or_reg,"certi_or_regs");
              }else $(".certi_or_regs").append("<span class='text-primary'>no file</span>");

              if(item.deeds_memo!="null"){
                removeBracketedAudit(item.deeds_memo,"deeds_memos");
              }else $(".deeds_memos").append("<span class='text-primary'>no file</span>");

              if(item.certificate_incor!="null"){
                removeBracketedAudit(item.certificate_incor,"certificate_incors");
              }else $(".certificate_incors").append("<span class='text-primary'>no file</span>");

              if(item.passport_photo!="null"){
                removeBracketedAudit(item.passport_photo,"pass_photos");
              }else $(".pass_photos").append("<span class='text-primary'>no file</span>");

              if(item.owner_profile!="null"){
                removeBracketedAudit(item.owner_profile,"owner_profiles");
              }else $(".owner_profiles").append("<span class='text-primary'>no file</span>");

              if(item.education_certificate!="null"){
                removeBracketedAudit(item.education_certificate,"edu_certs");
              }else $(".edu_certs").append("<span class='text-primary'>no file</span>");

              if(item.work_exp!="null"){
                removeBracketedAudit(item.work_exp,"work_exps");
              }else $(".work_exps").append("<span class='text-primary'>no file</span>");

              if(item.nrc_passport!="null"){
                removeBracketedAudit(item.nrc_passport,"nrc_passports");
              }else $(".nrc_passports").append("<span class='text-primary'>no file</span>");

              if(item.tax_clearance!="null"){
                removeBracketedAudit(item.tax_clearance,"tax_clearances");
              }else $(".tax_clearances").append("<span class='text-primary'>no file</span>");

              if(item.permit_foreign!="null"){
                removeBracketedAudit(item.permit_foreign,"permit_foreigns");
              }else $(".permit_foreigns").append("<span class='text-primary'>no file</span>");

              if(item.financial_statement!="null"){
                removeBracketedAudit(item.financial_statement,"financial_statements");
              }else $(".financial_statements").append("<span class='text-primary'>no file</span>");
            });
            var non_audit_total_staff=element.non_audit_total_staffs;
            if(non_audit_total_staff.length!=0){
              non_audit_total_staff.forEach(function(item){
                $('#tbl_non_audit_number_body').find("input[id=non_audit_number"+item.non_audit_total_staff_type_id+"]").val(item.total);

              })
            }
            var cpa_myanmar=element.my_cpa_foreigns;
            if(cpa_myanmar.length!=0){
              $('.cpa_myanmar').css('display','block');
              cpa_myanmar.forEach(function(item){
                var tr = "<tr>";
                tr += "<td>" + + "</td>";
                tr += "<td ><input disabled type='text' value="+item.name+" name='mf_name[]' class='form-control' autocomplete='off'></td>";
                tr += "<td ><input disabled type='text' value="+item.position+" name='mf_position[]' class='form-control' autocomplete='off'></td>";
                tr += "<td ><input disabled type='text' value="+item.cpa_passed_reg_no+" name='mf_cpa_passed_reg_no[]' class='form-control' autocomplete='off'></td>";
                tr += "<td ><input disabled type='text' value="+item.cpa_full_reg_no+" name='mf_cpa_full_reg_no[]' class='form-control' autocomplete='off'></td>";
                tr += "<td ><input disabled type='text' value="+item.public_practice_reg_no+" name='mf_pub_pra_reg_no[]' class='form-control' autocomplete='off'></td>";
                tr += "<td ></td>" ;
                tr += "</tr>";
                $("#tbl_cpa_myanmar_body").append(tr);
              })
           }
       });
       getIndexNumber('#tbl_partner tr');
       getIndexNumber('#tbl_director tr');
       getIndexNumber('#tbl_non_partner tr');
       getIndexNumber('#tbl_cpa_myanmar tr');
    },
    error:function (message){
      errorMessage(message);
    }
  });
}

function approveAuditFirm(){

  var id = $("input[name = audit_firm_id]").val();
  // console.log('approveaudit_firm',id);
  $.ajax({
      url: BACKEND_URL + "/approve_auditfirm/"+id,
      type: 'patch',
      success: function(result){
        // console.log(result)
          successMessage("You have approved that user!");
          location.href = FRONTEND_URL + "/audit-firm-list";
      }
  });
}

function rejectAuditFirm(){
  var id = $("input[name = audit_firm_id]").val();
  $.ajax({
      url: BACKEND_URL +"/reject_auditfirm/"+id,
      type: 'patch',
      success: function(result){
          successMessage("You have rejected that user!");
          location.href = FRONTEND_URL + "/audit-firm-list";
      }
  });
}

function approveNonAuditFirm(){

  var id = $("input[name = audit_firm_id]").val();
  $.ajax({
      url: BACKEND_URL + "/approve_non_auditfirm/"+id,
      type: 'patch',
      success: function(result){
          successMessage("You have approved that user!");
          location.href = FRONTEND_URL + "/non-audit-firm-list";
      }
  });
}

function rejectNonAuditFirm(){
  var id = $("input[name = audit_firm_id]").val();
  $.ajax({
      url: BACKEND_URL +"/reject_non_auditfirm/"+id,
      type: 'patch',
      success: function(result){
          successMessage("You have rejected that user!");
          location.href = FRONTEND_URL + "/non-audit-firm-list";
      }
  });
}

function removeBracketedAudit(file,divname){
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

function loadFile(file) {
  var myImageId = "storage/acc_firm/" + file;
  $(".modal-body #file").attr("src", myImageId);
}

function loadOrganization(){
  $.ajax({
    url: BACKEND_URL+"/organization_structure",
    type: 'get',
    data:"",
    success: function(result){
     var organization_structure=result.data;
     $('.organization_data').append("<div class='col-md-1'></div>");
     organization_structure.forEach(function(element){
       if(element.id!=3){
        var radio_data="<div class='col-md-3 form-check'>"+
        "<input disabled type='radio' class='form-check-input' name='org_stru_id' autofocus value="+element.id+" id=org"+element.id+" onclick='getOrganization()'>"+
        " <label class='form-check-label'>"+element.name+"</label>";
       }
       if(element.id==4){
        var radio_data="<div class='col-md-1 form-check'>"+
        "<input disabled type='radio' class='form-check-input' name='org_stru_id' autofocus value="+element.id+" id=org"+element.id+" onclick='getOrganization()'>"+
        " <label class='form-check-label'>"+element.name+"</label>";
       }
       else{
        var radio_data="<div class='col-md-3 form-check'>"+
        "<input disabled type='radio' class='form-check-input' name='org_stru_id' autofocus value="+element.id+" id=org"+element.id+" onclick='getOrganization()'>"+
        " <label class='form-check-label'>"+element.name+"</label>";
       }

       $('.organization_data').append(radio_data);
     })
  }
});
}

function loadAuditTypeOfService(){
  destroyDatatable("#tbl_type_service", "#tbl_type_service_body");
    $.ajax({
      url: BACKEND_URL+"/type_service_provided",
      type: 'get',
      data:"",
      success: function(result){
      var type_service_provided=result.data;
      $('.type_service_provided').append("<div class='col-md-4'></div>");
      type_service_provided.forEach(function(element){
        if(element.audit_firm_type_id==1){
          var radio_data="<div class='col-md-2'>"+
          "<input disabled type='radio' name='t_s_p_id' value="+element.id+" id=type_service"+element.id+">"+
          " <label class='form-check-label'>"+element.name+"</label>";
          $('.type_service_provided').append(radio_data);
        }else{
          var tr = "<tr>";
          tr += "<td><input disabled type='radio' name='t_s_p_id' value="+element.id+" id=type_service"+element.id+">"+
                " <label class='form-check-label'>"+element.name+"</label>";
          tr += "</tr>";
          $('#tbl_type_service_body').append(tr);
        }


      })
    }
  });
}

function loadAuditTotalStaff(){
    destroyDatatable("#tbl_audit_total_staff", "#tbl_audit_total_staff_body");
    $.ajax({
      url: BACKEND_URL+"/audit_total_staff_type",
      type: 'get',
      data:"",
      success: function(result){
      var audit_total_staff=result.data;
      audit_total_staff.forEach(function(element){
            var tr = "<tr>";
            tr += "<td class='font-weight-bold'>" + element.name + "</td>";
            tr += "<td><input type='hidden' value="+element.id+" name='ats_audit_total_staff_type_id[]'><input disabled type='number' value='0' name='ats_total[]' class='form-control' id=total_staff"+element.id+"></td>";
            tr += "<td><input disabled type='number' value='0' name='ats_audit_staff[]' class='form-control' id=audit_staff"+element.id+"></td>";
            tr += "<td><input disabled type='number' value='0' name='ats_non_audit_staff[]' class='form-control' id=nonaudit_staff"+element.id+"></td>";
            tr += "</tr>";
            $("#tbl_audit_total_staff_body").append(tr);

      })

    }
  });
}

function loadAuditStaff(){
  destroyDatatable("#tbl_audit_staff", "#tbl_audit_staff_body");
  $.ajax({
    url: BACKEND_URL+"/audit_staff_type",
    type: 'get',
    data:"",
    success: function(result){
    var audit_staff=result.data;
    audit_staff.forEach(function(element){
          var tr = "<tr>";
          tr += "<td class='font-weight-bold'>" + element.name + "</td>";
          tr += "<td><input type='hidden' value="+element.id+" name='as_audit_staff_type_id[]'><input disabled type='number' value='0' name='as_total[]' class='form-control' id=audit_total"+element.id+"></td>";
          tr += "<td><input disabled type='number' value='0' name='as_full_time[]' class='form-control' id=full_time"+element.id+"></td>";
          tr += "<td><input disabled type='number' value='0' name='as_part_time[]' class='form-control' id=part_time"+element.id+"></td>";
          tr += "</tr>";
          $("#tbl_audit_staff_body").append(tr);

    })

  }
});
}


function loadNonAuditStaff(){
  destroyDatatable("#tbl_non_audit_number", "#tbl_non_audit_number_body");
  $.ajax({
    url: BACKEND_URL+"/non_audit_total_staff",
    type: 'get',
    data:"",
    success: function(result){
    var non_audit_total_staff=result.data;
    non_audit_total_staff.forEach(function(element){
          var tr = "<tr>";
          tr += "<td class='font-weight-bold'>" + element.name + "</td>";
          tr += "<td><input type='hidden' value="+element.id+" name='nats_type_id[]'><input disabled type='number' value='0' name='nats_total[]' class='form-control' id=non_audit_number"+element.id+"></td>";
          tr += "</tr>";
          $("#tbl_non_audit_number_body").append(tr);

    })

  }
});
}

function loadNonAuditOrganization(){
  $.ajax({
    url: BACKEND_URL+"/organization_structure",
    type: 'get',
    data:"",
    success: function(result){
     var organization_structure=result.data;
     $('.organization_data').append("<div class='col-md-2'></div>");
     organization_structure.forEach(function(element){
       if(element.id!=3){
        var radio_data="<div class='col-md-2'>"+
        "<input type='radio' name='org_stru_id' autofocus value="+element.id+" id=org"+element.id+" onclick='getOrganization()'>"+
        " <label class='form-check-label'>"+element.name+"</label>";
       }else{
        var radio_data="<div class='col-md-3'>"+
        "<input type='radio' name='org_stru_id' autofocus value="+element.id+" id=org"+element.id+" onclick='getOrganization()'>"+
        " <label class='form-check-label'>"+element.name+"</label>";
       }

       $('.organization_data').append(radio_data);
     })
  }
});
}

function loadNonAuditTypeOfService(){
  destroyDatatable("#tbl_type_service", "#tbl_type_service_body");
    $.ajax({
      url: BACKEND_URL+"/type_service_provided",
      type: 'get',
      data:"",
      success: function(result){
      var type_service_provided=result.data;
      $('.type_service_provided').append("<div class='col-md-4'></div>");
      type_service_provided.forEach(function(element){
        if(element.audit_firm_type_id==1){
          var radio_data="<div class='col-md-2'>"+
          "<input disabled type='radio' name='t_s_p_id' value="+element.id+" id=type_service"+element.id+">"+
          " <label class='form-check-label'>"+element.name+"</label>";
          $('.type_service_provided').append(radio_data);
        }else{
          var tr = "<tr>";
          tr += "<td><input disabled type='radio' name='t_s_p_id' value="+element.id+" id=type_service"+element.id+">"+
                " <label class='form-check-label'>"+element.name+"</label>";
          tr += "</tr>";
          $('#tbl_type_service_body').append(tr);
        }


      })
    }
  });
}


function deleteAuditInfo(accName,accId){
  var result = confirm("WARNING: This will delete Accountancy Firm Name " + decodeURIComponent(accName) + " and all related data! Press OK to proceed.");
    if (result) {
        $.ajax({
            type: "DELETE",
            url: BACKEND_URL+'/acc_firm_info/'+accId,
            success: function (data) {
                successMessage(data);
                getAudit();
            },
            error: function (message) {
                errorMessage(message);
            }
        });
    }
}
// function updateAuditFirm(){

//   var send_data=new FormData();
//   var id=$("input[name=accountancy_firm_id]").val();
//   send_data.append('audit_firm_type_id',$("input[name=audit_firm_type_id]").val());
//   send_data.append('local_foreign_id',$("input[name=local_foreign_id]").val());
//   send_data.append('accountancy_firm_reg_no',$("input[name=accountancy_firm_reg_no]").val());
//   send_data.append('accountancy_firm_name',$("input[name=accountancy_firm_name]").val());
//   send_data.append('township',$("input[name=township]").val());
//   send_data.append('post_code',$("input[name=post_code]").val());
//   send_data.append('city',$("input[name=city]").val());
//   send_data.append('state',$("input[name=state]").val());
//   send_data.append('phone_no',$("input[name=phone_no]").val());
//   send_data.append('email',$("input[name=email]").val());
//   send_data.append('website',$("input[name=website]").val());
//   send_data.append('audit_firm_type_id',$("input[name=audit_firm_type_id]").val());
//   send_data.append('local_foreign_id',$("input[name=local_foreign_id]").val());
//   send_data.append('org_stru_id',$('input[name=org_stru_id]:checked').val());
//   send_data.append('t_s_p_id',$('input[name=t_s_p_id]:checked').val());
//   send_data.append('name_sole_proprietor',$("input[name=name_sole_proprietor]").val());
//   send_data.append('declaration',$("input[name=declaration]").val());
//   $('input[name="bo_branch_name[]"]').map(function(){send_data.append('bo_branch_name[]',$(this).val())});
//   $('input[name="bo_township[]"]').map(function(){send_data.append("bo_township[]",$(this).val());});
//   $('input[name="bo_post_code[]"]').map(function(){send_data.append("bo_post_code[]",$(this).val());});
//   $('input[name="bo_city[]"]').map(function(){send_data.append("bo_city[]",$(this).val());});
//   $('input[name="bo_state_region[]"]').map(function(){send_data.append("bo_state_region[]",$(this).val());});
//   $('input[name="bo_phone[]"]').map(function(){send_data.append("bo_phone[]",$(this).val());});
//   $('input[name="bo_email[]"]').map(function(){send_data.append("bo_email[]",$(this).val());});
//   $('input[name="bo_website[]"]').map(function(){send_data.append("bo_website[]",$(this).val());});
//   $('input[name="foa_name[]"]').map(function(){send_data.append("foa_name[]",$(this).val());});
//   $('input[name="foa_pub_pri_reg_no[]"]').map(function(){send_data.append("foa_pub_pri_reg_no[]",$(this).val());});
//   $('input[name="fona_name[]"]').map(function(){send_data.append("fona_name[]",$(this).val());});
//   $('input[name="fona_pass_csc_inco[]"]').map(function(){send_data.append("fona_pass_csc_inco[]",$(this).val());});
//   $("input[id=report_yes]").map(function(){send_data.append('foa_authority_to_sign[]',$(this).val());});
//   $('input[name="do_name[]"]').map(function(){send_data.append("do_name[]",$(this).val());});
//   $('input[name="do_position[]"]').map(function(){send_data.append("do_position[]",$(this).val());});
//   $('input[name="do_cpa_reg_no[]"]').map(function(){send_data.append("do_cpa_reg_no[]",$(this).val());});
//   $('input[name="do_pub_pri_reg_no[]"]').map(function(){send_data.append("do_pub_pri_reg_no[]",$(this).val());});
//   $('input[name="dona_name[]"]').map(function(){send_data.append("dona_name[]",$(this).val());});
//   $('input[name="dona_position[]"]').map(function(){send_data.append("dona_position[]",$(this).val());});
//   $('input[name="dona_passport[]"]').map(function(){send_data.append("dona_passport[]",$(this).val());});
//   $('input[name="dona_csc_no[]"]').map(function(){send_data.append("dona_csc_no[]",$(this).val());});
//   $('input[name="ats_total[]"]').map(function(){send_data.append("ats_total[]",$(this).val());});
//   $('input[name="ats_audit_staff[]"]').map(function(){send_data.append("ats_audit_staff[]",$(this).val());});
//   $('input[name="ats_non_audit_staff[]"]').map(function(){send_data.append("ats_non_audit_staff[]",$(this).val());});
//   $('input[name="ats_audit_total_staff_type_id[]"]').map(function(){send_data.append("ats_audit_total_staff_type_id[]",$(this).val());});
//   $('input[name="as_total[]"]').map(function(){send_data.append("as_total[]",$(this).val());});
//   $('input[name="as_full_time[]"]').map(function(){send_data.append("as_full_time[]",$(this).val());});
//   $('input[name="as_part_time[]"]').map(function(){send_data.append("as_part_time[]",$(this).val());});
//   $('input[name="as_audit_staff_type_id[]"]').map(function(){send_data.append('as_audit_staff_type_id[]',$(this).val());});
//   $('input[name="nats_total[]"]').map(function(){send_data.append("nats_total[]",$(this).val());});
//   $('input[name="nats_type_id[]"]').map(function(){send_data.append("nats_type_id[]",$(this).val());});
//   $('input[name="mf_name[]"]').map(function(){send_data.append("mf_name[]",$(this).val());});
//   $('input[name="mf_position[]"]').map(function(){send_data.append("mf_position[]",$(this).val());});
//   $('input[name="mf_cpa_passed_reg_no[]"]').map(function(){send_data.append("mf_cpa_passed_reg_no[]",$(this).val());});
//   $('input[name="mf_cpa_full_reg_no[]"]').map(function(){send_data.append("mf_cpa_full_reg_no[]",$(this).val());});
//   $('input[name="mf_pub_pra_reg_no[]"]').map(function(){send_data.append("mf_pub_pra_reg_no[]",$(this).val());});

//    $('input[name="ppa_certis[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('ppa_certis[]',$(this).get(0).files[i]);
//     }

//   });
//   $('input[name="letterheads[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('letterheads[]',$(this).get(0).files[i]);
//     }

//   });
//   $('input[name="representatives[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('representatives[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="pass_photos[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('pass_photos[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="owner_profiless[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('owner_profiles[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="edu_certs[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('edu_certs[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="work_exps[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('work_exps[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="nrc_passports[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('nrc_passports[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="tax_clearances[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('tax_clearances[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="certi_or_regs[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('certi_or_regs[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="deeds_memos[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('deeds_memos[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="certificate_incors[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('certificate_incors[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="permit_foreigns[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('permit_foreigns[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="financial_statements[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('financial_statements[]',$(this).get(0).files[i]);
//     }
//   });
//   $('input[name="tax_reg_certificate[]"]').map(function(){
//     for (var i = 0; i < $(this).get(0).files.length; ++i) {
//       send_data.append('tax_reg_certificate[]',$(this).get(0).files[i]);
//     }
//   });
//   send_data.append('_method', 'PATCH');

//         $.ajax({
//                 url: BACKEND_URL+"/acc_firm_info/"+id,
//                 type: 'post',
//                 data:send_data,
//                 contentType: false,
//                 processData: false,
//                 success: function(result){
//                   successMessage(result.data);
//                   location.reload();
//               }
//         });
// }
