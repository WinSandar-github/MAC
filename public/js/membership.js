function getMembership(){

    var course_name = $("input[name=filter_name]").val() == "" ? 'all' : $("input[name=filter_name]").val();

    $('#tbl_membership').DataTable({
        scrollX: true,
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

function createMembership(){

   
        
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
           

            // removeBracketed(course_data.requirement_id,"requirement_id");
            $('input[name=membership_name]').val(res_member.membership_name);
            $('input[name=form_fee]').val(res_member.form_fee);
            $('input[name=registration_fee]').val(res_member.registration_fee);
            $('input[name=yearly_fee]').val(res_member.yearly_fee);
            $('input[name=renew_fee]').val(res_member.renew_fee);
            $('input[name=late_fee]').val(res_member.late_fee);
            $('input[name=reconnected_fee]').val(res_member.reconnected_fee);
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