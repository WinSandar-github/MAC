function getMembership(){

    var course_name = $("input[name=filter_name]").val() == "" ? 'all' : $("input[name=filter_name]").val();

    $('#tbl_membership').DataTable({
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: FRONTEND_URL + "/show_membership/all",
        columns: [
            
            {data: "id", name: 'No'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'membership_name', name: 'name'}, 
            {data: 'form_fee', name: 'Form Fee'},
            {data: 'registration_fee', name: ' Registration Fee'},
            {data: 'yearly_fee', name: 'Yearly Fee'},
            {data: 'renew_fee', name: 'Renew Fee'},
            {data: 'late_fee', name: 'Delayed Fee'},
            {data: 'requirements', name: 'Requirement'},
            {data: 'descriptions', name: 'Description'},
        ],
    });

 
}

function createMembership(){
        
        var requirement =  $('.requirement_id').val();
        var description =  $('.description_id').val();
   
        let formData = new FormData();
            formData.append('membership_name',$('input[name=membership_name]').val()) ;
            formData.append('form_fee',$('input[name=form_fee]').val());
            formData.append('registration_fee',$('input[name=registration_fee]').val()) ;
            formData.append('yearly_fee',$('input[name=yearly_fee]').val());
            formData.append('renew_fee',$('input[name=renew_fee]').val());
            formData.append('late_fee',$('input[name=late_fee]').val());
            formData.append('requirement_id', requirement);
            formData.append('description_id', description);


        
        $.ajax({
            url: BACKEND_URL+"/memberships",
            type: 'post',
            data:formData,
            contentType: false,
            processData: false,
            success: function(result){
                
                successMessage(result.message);
                location.reload();
        }
    });
 
}

function showMembershipInfo(id) {

    $("#membership_form").attr('action', 'javascript:updateMembership()');
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
         

            // var req_arr = JSON.parse(res_member.requirement_id);
            // var des_arr = JSON.parse(res_member.description_id);

            // console.log(req_arr, "Req String")
            
            // //change string to array
            // var req_arr = [...req_str];
            console.log(res_member.requirement_id.split(','))
            $('.requirement_id').select2().val(res_member.requirement_id.split(',')).trigger('change');
            $('.description_id').select2().val(res_member.description_id.split(',')).trigger('change');

            $('#create_membership_model').modal('toggle');
            
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
    formData.append('requirement_id', requirement);
    formData.append('description_id', description);
    formData.append('_method','PUT');

    $.ajax({
        url: BACKEND_URL+"/memberships/"+id,
        type: 'post',
        data:formData,
        contentType: false,
        processData: false,
        success: function(result){
            
            successMessage(result.message);
            location.reload();
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