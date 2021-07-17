function getDAList(){
    destroyDatatable("#tbl_da_list", "#tbl_da_list_body");    
    $.ajax({
        url: "/api/da_register",
        type: 'get',
        data:"",
        success: function(data){
            var da_data = data.data;
            da_data.forEach(function (element) {
                    var tr = "<tr>";
                    tr += "<td>" +  + "</td>";
                    tr += "<td>" + element.name_eng + "</td>";
                    tr += "<td>" + element.email + "</td>";
                    tr += "<td>" + element.phone+ "</td>";
                    tr += "<td>" + element.nrc + "</td>";
                    tr += "<td>" + element.approve_reject_status + "</td>";
                    tr += "<td ><div class='btn-group'>";
                    tr+="<button type='button' class='btn btn-primary btn-xs' onClick='showDAList(" + element.id + ")'>" +
                        "<li class='fa fa-eye fa-sm'></li></button></div ></td > ";
                    tr += "</tr>";
                    $("#tbl_da_list_body").append(tr);     
            });
            getIndexNumber('#tbl_da_list tr');
            createDataTable("#tbl_da_list");      
        },
        error:function (message){
            dataMessage(message, "#tbl_da_list", "#tbl_da_list_body");        
        }
    });
}

function showDAList(studentId){
    localStorage.setItem("student_id",studentId);
    location.href="/da_edit";
}

function loadData(){
    var id=localStorage.getItem("student_id");
    $("#name_eng").html("");
    $("#name_mm").html("");
    $("#nrc").html("");
    $("#father_name_mm").html("");
    $("#father_name_eng").html("");
    $("#race").html("");
    $("#religion").html("");
    $("#date_of_birth").html("");
    $("#address").html("");
    $("#current_address").html("");
    $("#phone").html("");
    $("#email").html("");
    $("#gov_staff").html("");
    $("#registration_no").html("");
    $.ajax({
        type: "GET",
        url: "/api/da_register/"+id,
        success: function (data) {
            var student=data.data;
            student.forEach(function(element){
                var da_data = element.da_list;
                $("#name_eng").append(element.name_eng);
                $("#name_mm").append(element.name_mm);
                $("#nrc").append(element.nrc);
                $("#father_name_mm").append(element.father_name_mm);
                $("#father_name_eng").append(element.father_name_eng);
                $("#race").append(element.race);
                $("#religion").append(element.religion);
                $("#date_of_birth").append(element.date_of_birth);
                $("#address").append(element.address);
                $("#current_address").append(element.current_address);
                $("#phone").append(element.phone);
                $("#email").append(element.email);
                $("#gov_staff").append(element.gov_staff);
                $("#registration_no").append(element.registration_no);
            })
        }
    })
}