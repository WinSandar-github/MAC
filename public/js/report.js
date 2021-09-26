function generateSrNo(code) {

    show_loader();
    $.ajax({
        url: BACKEND_URL + "/generate_sr_no/" + code,
        type: 'get',
        contentType: false,
        processData: false,
        success: function (result) {
            EasyLoading.hide();
            successMessage("Update Serial Number");
            location.reload();

        }
    });




}

function generatePersonalNo(code) {
    show_loader();
    $.ajax({
        url: BACKEND_URL + "/generate_personal_no/" + code,
        type: 'get',
        contentType: false,
        processData: false,
        success: function (result) {
            console.log(result)
            EasyLoading.hide();
            successMessage("Successully Generate Personal Number");
            // location.reload();

        }
    })



}

function generateExamSrNo(code) {

    show_loader();
    $.ajax({
        url: BACKEND_URL + "/generate_exam_sr_no/" + code,
        type: 'get',
        contentType: false,
        processData: false,
        success: function (result) {
            EasyLoading.hide();
            successMessage("Update Serial Number");
            // location.reload();

        }
    });




}


