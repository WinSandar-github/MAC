function getMembership(){

    var course_name = $("input[name=filter_name]").val() == "" ? 'all' : $("input[name=filter_name]").val();

    $('#tbl_membership').DataTable({
        processing: true,
        serverSide: true,
        searchable:true,
        ajax: FRONTEND_URL + "/show_membership/all",
        // initComplete: function () {
        //     this.api().columns().every( function () {
        //         var column = this;
        //         var select = $('<select><option value=""></option></select>')
        //             .appendTo( $(column.footer()).empty() )
        //             .on( 'change', function () {
        //                 var val = $.fn.dataTable.util.escapeRegex(
        //                     $(this).val()
        //                 );

        //                 column
        //                     .search( val ? '^'+val+'$' : '', true, false )
        //                     .draw();
        //             } );

        //         column.data().unique().sort().each( function ( d, j ) {
        //             select.append( '<option value="'+d+'">'+d+'</option>' )
        //         } );
        //     } );
        // },
        columns: [

            {data: "id", name: 'No'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'membership_name', name: 'membership_name'},
            {data: 'form_fee', name: 'Form Fee'},
            {data: 'registration_fee', name: ' Registration Fee'},
            {data: 'yearly_fee', name: 'yearly_fee'},
            {data: 'renew_fee', name: 'Renew Fee'},
            {data: 'late_fee', name: 'Delayed Fee'},
            {data: 'requirements', name: 'Requirement'},
            {data: 'descriptions', name: 'Description'},
        ],
    });


}

function createMembership($membership_id){

  // var requirement =  $('.requirement_id').val();
  // var description =  $('.description_id').val();

  let formData = new FormData();
      formData.append('membership_name',$('input[name=membership_name]').val()) ;
      formData.append('form_fee',$('input[name=form_fee]').val());
      formData.append('registration_fee',$('input[name=registration_fee]').val()) ;
      formData.append('yearly_fee',$('input[name=yearly_fee]').val());
      formData.append('renew_fee',$('input[name=renew_fee]').val());
      formData.append('late_fee',$('input[name=late_fee]').val());
      formData.append('requirement', $('#requirement').summernote('code'));
      formData.append('description', $('#mem_desc').summernote('code'));

      show_loader();
      $.ajax({
          url: BACKEND_URL+"/memberships",
          type: 'post',
          data:formData,
          contentType: false,
          processData: false,
          success: function(result){
              EasyLoading.hide();
              successMessage(result.message);
              $('#create_membershp_model').modal('toggle');

              location.reload()
      }
  });

}

function showMembershipInfo(id) {

    $("#membership_form").attr('action', 'javascript:updateMembership()');
    $('#member_title').text('Update Membership');
    $("input[name=membership_id]").val(id);
    $.ajax({
        type: "get",
        url: BACKEND_URL + "/memberships/" + id,
        success: function (data) {
            var res_member = data.data;
            console.log("res_member >>>",res_member);
            // removeBracketed(course_data.requirement_id,"requirement_id");
            $('input[name=membership_name]').val(res_member.membership_name);
            $('input[name=form_fee]').val(res_member.form_fee);
            $('input[name=registration_fee]').val(res_member.registration_fee);
            //
            $('input[name=reg_fee_sole]').val(res_member.reg_fee_sole);
            $('input[name=reg_fee_partner]').val(res_member.reg_fee_partner);
            //
            $('input[name=yearly_fee]').val(res_member.yearly_fee);
            $('input[name=renew_fee]').val(res_member.renew_fee);
            //
            $('input[name=renew_fee_sole]').val(res_member.renew_fee_sole);
            $('input[name=renew_fee_partner]').val(res_member.renew_fee_partner);
            //
            $('input[name=late_fee]').val(res_member.late_fee);
            //
            $('input[name=late_fee_within_jan_sole]').val(res_member.late_fee_within_jan_sole);
            $('input[name=late_fee_within_jan_partner]').val(res_member.late_fee_within_jan_partner);
            $('input[name=late_fee_feb_to_apr_sole]').val(res_member.late_fee_feb_to_apr_sole);
            $('input[name=late_fee_feb_to_apr_partner]').val(res_member.late_fee_feb_to_apr_partner);
            $('input[name=reconnect_fee_sole]').val(res_member.reconnect_fee_sole);
            $('input[name=reconnect_fee_partner]').val(res_member.reconnect_fee_partner);
            //
            $('input[name=reconnected_fee]').val(res_member.reconnected_fee);
            $('input[name=cpa_subject_fee]').val(res_member.cpa_subject_fee);
            $('input[name=da_subject_fee]').val(res_member.da_subject_fee);
            $('input[name=renew_cpa_subject_fee]').val(res_member.renew_cpa_subject_fee);
            $('input[name=renew_da_subject_fee]').val(res_member.renew_da_subject_fee);
            $('input[name=renew_registration_fee]').val(res_member.renew_registration_fee);
            $('input[name=renew_yearly_fee]').val(res_member.renew_yearly_fee);
            res_member.description !== null &&  $('#mem_desc').summernote("editor.pasteHTML",res_member.description);
            res_member.requirement !== null && $('#requirement').summernote('editor.pasteHTML',res_member.requirement);




            // var req_arr = JSON.parse(res_member.requirement_id);
            // var des_arr = JSON.parse(res_member.description_id);

            // console.log(req_arr, "Req String")

            // //change string to array
            // var req_arr = [...req_str];
            // console.log(res_member.requirement_id.split(','))
            // $('.requirement_id').select2().val(res_member.requirement_id.split(',')).trigger('change');
            // $('.description_id').select2().val(res_member.description_id.split(',')).trigger('change');

            // $('#create_membership_model').modal('toggle');

        },

        error: function (message) {
            errorMessage(message);
        }
    });

}

function updateMembership() {

    var id = $("input[name=membership_id]").val();

    var requirement =  $('.requirement_id').val();
    var description =  $('.description_id').val();

    let formData = new FormData();
    if(id == 1){
      // Audit Firm
      formData.append('membership_name',$('input[name=membership_name]').val()) ;
      formData.append('form_fee',$('input[name=form_fee]').val());
      formData.append('registration_fee',$('input[name=registration_fee]').val()) ;
      formData.append('yearly_fee',$('input[name=yearly_fee]').val());
      formData.append('renew_fee',$('input[name=renew_fee]').val());
      formData.append('late_fee_within_jan_sole',$('input[name=late_fee_within_jan_sole]').val());
      formData.append('late_fee_within_jan_partner',$('input[name=late_fee_within_jan_partner]').val());
      formData.append('late_fee_feb_to_apr_sole',$('input[name=late_fee_feb_to_apr_sole]').val());
      formData.append('late_fee_feb_to_apr_partner',$('input[name=late_fee_feb_to_apr_partner]').val());
      formData.append('reconnect_fee_sole',$('input[name=reconnect_fee_sole]').val());
      formData.append('reconnect_fee_partner',$('input[name=reconnect_fee_partner]').val());
      formData.append('requirement', $('#requirement').summernote('code'));
      formData.append('description', $('#mem_desc').summernote('code'));
      formData.append('_method','PUT');
    }
    else if(id == 2){
      // Non-Audit Firm
      formData.append('membership_name',$('input[name=membership_name]').val()) ;
      formData.append('form_fee',$('input[name=form_fee]').val());
      formData.append('reg_fee_sole',$('input[name=reg_fee_sole]').val()) ;
      formData.append('reg_fee_partner',$('input[name=reg_fee_partner]').val()) ;
      formData.append('yearly_fee',$('input[name=yearly_fee]').val());
      formData.append('renew_fee_sole',$('input[name=renew_fee_sole]').val());
      formData.append('renew_fee_partner',$('input[name=renew_fee_partner]').val());
      formData.append('late_fee_within_jan_sole',$('input[name=late_fee_within_jan_sole]').val());
      formData.append('late_fee_within_jan_partner',$('input[name=late_fee_within_jan_partner]').val());
      formData.append('late_fee_feb_to_apr_sole',$('input[name=late_fee_feb_to_apr_sole]').val());
      formData.append('late_fee_feb_to_apr_partner',$('input[name=late_fee_feb_to_apr_partner]').val());
      formData.append('reconnect_fee_sole',$('input[name=reconnect_fee_sole]').val());
      formData.append('reconnect_fee_partner',$('input[name=reconnect_fee_partner]').val());
      formData.append('requirement', $('#requirement').summernote('code'));
      formData.append('description', $('#mem_desc').summernote('code'));
      formData.append('_method','PUT');
    }
    else if(id==5){
      formData.append('membership_name',$('input[name=membership_name]').val()) ;
      formData.append('form_fee',$('input[name=form_fee]').val());
      formData.append('registration_fee',$('input[name=registration_fee]').val()) ;
      formData.append('yearly_fee',$('input[name=yearly_fee]').val()) ;
      formData.append('late_fee',$('input[name=late_fee]').val());
      formData.append('reconnected_fee',$('input[name=reconnected_fee]').val());
      formData.append('renew_registration_fee',$('input[name=renew_registration_fee]').val());
      formData.append('renew_yearly_fee',$('input[name=renew_yearly_fee]').val());
      formData.append('requirement', $('#requirement').summernote('code'));
      formData.append('description', $('#mem_desc').summernote('code'));
      formData.append('_method','PUT');
    }
    else if(id==6){
        formData.append('membership_name',$('input[name=membership_name]').val()) ;
        formData.append('form_fee',$('input[name=form_fee]').val());
        formData.append('registration_fee',$('input[name=registration_fee]').val()) ;
        //formData.append('renew_fee',$('input[name=renew_fee]').val());
        formData.append('late_fee',$('input[name=late_fee]').val());
        formData.append('reconnected_fee',$('input[name=reconnected_fee]').val());
        formData.append('cpa_subject_fee',$('input[name=cpa_subject_fee]').val());
        formData.append('da_subject_fee',$('input[name=da_subject_fee]').val());
        formData.append('renew_cpa_subject_fee',$('input[name=renew_cpa_subject_fee]').val());
        formData.append('renew_da_subject_fee',$('input[name=renew_da_subject_fee]').val());
        formData.append('requirement', $('#requirement').summernote('code'));
        formData.append('description', $('#mem_desc').summernote('code'));
        formData.append('_method','PUT');
      }
    else{
      formData.append('membership_name',$('input[name=membership_name]').val()) ;
      formData.append('form_fee',$('input[name=form_fee]').val());
      formData.append('registration_fee',$('input[name=registration_fee]').val()) ;
      formData.append('yearly_fee',$('input[name=yearly_fee]').val());
      formData.append('renew_fee',$('input[name=renew_fee]').val());
      formData.append('late_fee',$('input[name=late_fee]').val());
      formData.append('reconnected_fee',$('input[name=reconnected_fee]').val());
      formData.append('requirement', $('#requirement').summernote('code'));
      formData.append('description', $('#mem_desc').summernote('code'));
      formData.append('_method','PUT');
    }

    show_loader();

    $.ajax({
        url: BACKEND_URL+"/memberships/"+id,
        type: 'post',
        data:formData,
        contentType: false,
        processData: false,
        success: function(result){
            EasyLoading.hide();

            successMessage(result.message);
            // $('#create_membership_model').modal('toggle');

            location.href = FRONTEND_URL+'/membership_list';
    }
});



}


function deleteMembershipInfo(name, membership_id) {
    var result = confirm("WARNING: This will delete Membership Name " + decodeURIComponent(name) + " and all related data! Press OK to proceed.");
    if (result) {
        $.ajax({
            type: "DELETE",
            url: BACKEND_URL + '/memberships/' + membership_id,
            success: function (result) {
                successMessage(result.message);
                location.reload();
            },
            error: function (message) {
                errorMessage(message);
            }
        });
    }
}
