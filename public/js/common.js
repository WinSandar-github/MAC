// var BACKEND_URL = "http://localhost:8000/api";
// var FRONTEND_URL = "http://localhost:8000";
// var PDF_URL = "http://localhost:8000";

var BACKEND_URL = "https://demo.aggademo.me/MAC/public/index.php/api";
var FRONTEND_URL = "https://demo.aggademo.me/MAC/public/index.php";
var PDF_URL = "https://demo.aggademo.me/MAC/public";

var counter = 0;

function ConfirmSubmit() {
    var radio = document.getElementById("submit_confirm");
    if (radio.checked == true) {
        document.getElementById("submit_btn").disabled = false;
    } else {
        document.getElementById("submit_btn").disabled = true;
    }
}

function mm2en(num) {
    var nums= { 0: '၀', 1: '၁', 2: '၂', 3: '၃', 4:'၄', 5: '၅', 6: '၆', 7:'၇', 8:'၈', 9:'၉' };
    return num.replace(/([0-9])/g, function(s, key) {
        console.log(nums[key] || s);
        return nums[key] || s;
    });
}
function addRowCPAFF(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row - 1) + '</td>';
    cols += '<td><div class="form-group"><input type="date" name="date1" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td><div class="form-group"><input type="date" name="date2" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td><div class="form-group"><input type="date" name="date3" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td class="border-color">' +
        '<div class="input-group mt-3">' +
        '<div class="custom-file">' +
        '<input type="file" class="custom-file-input" id="inputfile2" multiple>' +
        '</div>' +
        '</div>' +

        '<div class="form-group">' +
        '<input type="text" name="" class="form-control" placeholder="Signture of Registrar" required>' +
        '</div>' +
        '</td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowCPAFF("' + tbody + '")  value="X"></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowCPAFF(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowCPAPA(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row - 1) + '</td>';
    cols += '<td><div class="form-group"><input type="date" name="date4" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td><div class="form-group"><input type="date" name="date5" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td><div class="form-group"><input type="date" name="date6" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
    cols += '<td class="border-color">' +
        '<div class="input-group mt-3">' +
        '<div class="custom-file">' +
        '<input type="file" class="custom-file-input" id="inputfile2" multiple>' +
        '<label class="custom-file-label" >Choose file</label>' +
        '</div>' +
        '</div>' +

        '<div class="form-group">' +
        '<input type="text" name="" class="form-control" placeholder="Signture of Registrar" required>' +
        '</div>' +
        '</td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowCPAPA("' + tbody + '")  value="X"></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowCPAPA(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}


function addRowSubject(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" class="form-control" name="education[]" placeholder="လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း"/></td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowSubject("' + tbody + '")  value="X"></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function addRowDipSubject(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" class="form-control" name="education[]" placeholder="လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း"/></td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowSubject("' + tbody + '")  value="X"></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowSubject(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowInCountryEducation(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" class="form-control" name="education[]" placeholder="ပြည်တွင်းမှရရှိသည့် ပညာအရည်အချင်း"/></td>';
    cols += '<td class="text-center"><input type="file" id="image" name="image"></td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowInCountryEducation("' + tbody + '")  value="X"></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowInCountryEducation(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowEducation(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" class="form-control" name="education[]" placeholder="ပညာအရည်အချင်း"/></td>';
    cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowEducation("' + tbody + '")  value="X"></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowEducation(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowBranch(tbody) {
    var newRow = $("<tr>");
    var cols = "";

    cols += '<td><input type="text" name="bo_branch_name[]" class="form-control" autocomplete="off"/></td>';
    cols += '<td><input type="text" name="bo_township[]" class="form-control" autocomplete="off"/></td>';
    cols += '<td><input type="text" name="bo_post_code[]" class="form-control" autocomplete="off"/></td>';
    cols += '<td><input type="text" name="bo_city[]" class="form-control" autocomplete="off"/></td>';
    cols += '<td><input type="text" name="bo_state_region[]" class="form-control"  autocomplete="off"/></td>';
    cols += '<td><input type="text" name="bo_phone[]" class="form-control" autocomplete="off"/></td>';
    cols += '<td><button class="btn btn-primary btn-sm" type="button" onclick=addInputTele("' + tbody + '")><i class="fa fa-plus"></i></button></td>';
    cols += '<td><input type="text" name="bo_email[]" class="form-control" autocomplete="off" /></td>';
    cols += '<td><input type="text" name="bo_website[]" class="form-control" autocomplete="off" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowBranch("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowBranch(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowPartner(tbody) {

    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" name="foa_name[]" class="form-control" autocomplete="off"/></td>';
    cols += '<td><input type="text" name="foa_pub_pri_reg_no[]" class="form-control" autocomplete="off" /></td>';
    cols += '<td><input type="radio" name="foa_authority_to_sign' + row + '" id="report_yes" value="1"> Yes</td>';
    cols += '<td><input type="radio" name="foa_authority_to_sign' + row + '" id="report_yes" value="2"> No</td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowPartner("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowPartner(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowDirector(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" name="do_name[]" class="form-control" autocomplete="off"/></td>';
    cols += '<td><input type="text" name="do_position[]" class="form-control" autocomplete="off" /></td>';
    cols += '<td><input type="text" name="do_cpa_reg_no[]" class="form-control" autocomplete="off" /> </td>';
    cols += '<td><input type="text" name="do_pub_pri_reg_no[]" class="form-control" autocomplete="off" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowDirector("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowDirector(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowPartnerByNonAudit(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" value="" name="fona_name[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" value="" name="fona_pass_csc_inco[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowPartnerByNonAudit("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowPartnerByNonAudit(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1;

    });
}

function addRowDirectorByNonAudit(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" value="" name="dona_name[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" value="" name="dona_position[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" value="" name="dona_passport[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" value="" name="dona_csc_no[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowDirectorByNonAudit("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowDirectorByNonAudit(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowDirectorCPA(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" value="" name="mf_name[]" class="form-control" autocomplete="off"></td>';
    cols += '<td><input type="text" name="mf_position[]" class="form-control" autocomplete="off"/></td>';
    cols += '<td><input type="text" name="mf_cpa_passed_reg_no[]" class="form-control" autocomplete="off"/> </td>';
    cols += '<td><input type="text" name="mf_cpa_full_reg_no[]" class="form-control" autocomplete="off"/> </td>';
    cols += '<td><input type="text" name="mf_pub_pra_reg_no[]" class="form-control" autocomplete="off"/> </td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowDirectorCPA("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowDirectorCPA(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowAuditWork(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" name="audit_work_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="audit_work_list[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="audit_work_ppa[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowAuditWork("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowAuditWork(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowSchoolFounder(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" name="school_founder_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="school_founder_passport[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_founder_cpa[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_founder_qual[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_founder_address[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_founder_phone[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowShoolFounder("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowShoolFounder(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowSchoolManager(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" name="school_manager_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="school_manager_passport[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_manager_cpa[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_manager_qual[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_manager_duty[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_manager_phone[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowShoolManager("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowShoolManager(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowSchoolExecutive(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" name="school_executive_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="school_executive_passport[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_executive_cpa[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_executive_qual[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_executive_duty[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_executive_phone[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowShoolExecutive("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowShoolExecutive(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addRowSchoolTeacher(tbody) {
    var newRow = $("<tr>");
    var cols = "";
    var row = $('.' + tbody + ' tr').length;
    cols += '<td>' + (row) + '</td>';
    cols += '<td><input type="text" name="school_teacher_name[]" class="form-control"/></td>';
    cols += '<td><input type="text" name="school_teacher_passport[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_teacher_tp[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_teacher_qual[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_teacher_subject[]" class="form-control" /></td>';
    cols += '<td><input type="text" name="school_teacher_phone[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delRowShoolTeacher("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delRowShoolTeacher(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function addInputTele(tbody) {
    var newRow = $("<tr>");
    var cols = "";

    cols += '<td></td>';
    cols += '<td></td>';
    cols += '<td></td>';
    cols += '<td></td>';
    cols += '<td></td>';
    cols += '<td><input type="text" name="branch_telephone[]" class="form-control" /></td>';
    cols += '<td><button class="delete btn btn-danger btn-sm" type="button" onclick=delInputTele("' + tbody + '")><i class="fa fa-trash"></i></button></td>';
    cols += '<td></td>';
    cols += '<td></td>';
    cols += '<td></td>';
    newRow.append(cols);
    $("table." + tbody).append(newRow);
    counter++;
}

function delInputTele(tbody) {
    $("table." + tbody).on("click", ".delete", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
}

function createDatepicker(name) {
    $("input[name='" + name + "']").flatpickr({
        enableTime: false,
        dateFormat: "d-m-Y",
    });
}

function getTotalStaff() {

    if ($('#principal_total').val() != "" && $('#non_principal_total').val() == "" && $('#managerial_level_total').val() == "" && $('#non-mangerial_level_total').val() == "") {
        $('#total_staff_total').val($('#principal_total').val());
    } else if ($('#principal_total').val() != "" && $('#non_principal_total').val() != "" && $('#managerial_level_total').val() == "" && $('#non-mangerial_level_total').val() == "") {
        $('#total_staff_total').val(parseInt($('#principal_total').val()) + parseInt($('#non_principal_total').val()));
    } else if ($('#principal_total').val() != "" && $('#non_principal_total').val() == "" && $('#managerial_level_total').val() != "" && $('#non-mangerial_level_total').val() == "") {
        $('#total_staff_total').val(parseInt($('#principal_total').val()) + parseInt($('#managerial_level_total').val()));
    } else if ($('#principal_total').val() != "" && $('#non_principal_total').val() == "" && $('#managerial_level_total').val() == "" && $('#non-mangerial_level_total').val() != "") {
        $('#total_staff_total').val(parseInt($('#principal_total').val()) + parseInt($('#non-mangerial_level_total').val()));
    } else if ($('#principal_total').val() != "" && $('#non_principal_total').val() == "" && $('#managerial_level_total').val() != "" && $('#non-mangerial_level_total').val() != "") {
        $('#total_staff_total').val(parseInt($('#principal_total').val()) + parseInt($('#managerial_level_total').val()) + parseInt($('#non-mangerial_level_total').val()));
    } else if ($('#principal_total').val() != "" && $('#non_principal_total').val() != "" && $('#managerial_level_total').val() == "" && $('#non-mangerial_level_total').val() != "") {
        $('#total_staff_total').val(parseInt($('#principal_total').val()) + parseInt($('#non_principal_total').val()) + parseInt($('#non-mangerial_level_total').val()));
    } else if ($('#principal_total').val() != "" && $('#non_principal_total').val() != "" && $('#managerial_level_total').val() != "" && $('#non-mangerial_level_total').val() == "") {
        $('#total_staff_total').val(parseInt($('#principal_total').val()) + parseInt($('#non_principal_total').val()) + parseInt($('#managerial_level_total').val()));
    } else if ($('#principal_total').val() != "" && $('#non_principal_total').val() != "" && $('#managerial_level_total').val() != "" && $('#non-mangerial_level_total').val() != "") {
        $('#total_staff_total').val(parseInt($('#principal_total').val()) + parseInt($('#non_principal_total').val()) + parseInt($('#managerial_level_total').val()) + parseInt($('#non-mangerial_level_total').val()));//first row
    } else if ($('#principal_total').val() == "" && $('#non_principal_total').val() != "" && $('#managerial_level_total').val() == "" && $('#non-mangerial_level_total').val() == "") {
        $('#total_staff_total').val($('#non_principal_total').val());
    } else if ($('#principal_total').val() == "" && $('#non_principal_total').val() != "" && $('#managerial_level_total').val() != "" && $('#non-mangerial_level_total').val() == "") {
        $('#total_staff_total').val(parseInt($('#non_principal_total').val()) + parseInt($('#managerial_level_total').val()));
    } else if ($('#principal_total').val() == "" && $('#non_principal_total').val() != "" && $('#managerial_level_total').val() != "" && $('#non-mangerial_level_total').val() != "") {
        $('#total_staff_total').val(parseInt($('#non_principal_total').val()) + parseInt($('#managerial_level_total').val()) + parseInt($('#non-mangerial_level_total').val()));
    } else if ($('#principal_total').val() == "" && $('#non_principal_total').val() != "" && $('#managerial_level_total').val() == "" && $('#non-mangerial_level_total').val() != "") {
        $('#total_staff_total').val(parseInt($('#non_principal_total').val()) + parseInt($('#non-mangerial_level_total').val())); //second
    } else if ($('#principal_total').val() == "" && $('#non_principal_total').val() == "" && $('#managerial_level_total').val() != "" && $('#non-mangerial_level_total').val() == "") {
        $('#total_staff_total').val($('#managerial_level_total').val());
    } else if ($('#principal_total').val() == "" && $('#non_principal_total').val() == "" && $('#managerial_level_total').val() != "" && $('#non-mangerial_level_total').val() != "") {
        $('#total_staff_total').val(parseInt($('#managerial_level_total').val()) + parseInt($('#non-mangerial_level_total').val())); //third
    } else if ($('#principal_total').val() == "" && $('#non_principal_total').val() == "" && $('#managerial_level_total').val() == "" && $('#non-mangerial_level_total').val() != "") {
        $('#total_staff_total').val($('#non-mangerial_level_total').val());
    }
}

function getTotalAudit() {

    if ($('#principal_audit').val() != "" && $('#non_principal_audit').val() == "" && $('#managerial_level_audit').val() == "" && $('#non-mangerial_level_audit').val() == "") {
        $('#total_staff_audit').val($('#principal_audit').val());
    } else if ($('#principal_audit').val() != "" && $('#non_principal_audit').val() != "" && $('#managerial_level_audit').val() == "" && $('#non-mangerial_level_audit').val() == "") {
        $('#total_staff_audit').val(parseInt($('#principal_audit').val()) + parseInt($('#non_principal_audit').val()));
    } else if ($('#principal_audit').val() != "" && $('#non_principal_audit').val() == "" && $('#managerial_level_audit').val() != "" && $('#non-mangerial_level_audit').val() == "") {
        $('#total_staff_audit').val(parseInt($('#principal_audit').val()) + parseInt($('#managerial_level_audit').val()));
    } else if ($('#principal_audit').val() != "" && $('#non_principal_audit').val() == "" && $('#managerial_level_audit').val() == "" && $('#non-mangerial_level_audit').val() != "") {
        $('#total_staff_audit').val(parseInt($('#principal_audit').val()) + parseInt($('#non-mangerial_level_audit').val()));
    } else if ($('#principal_audit').val() != "" && $('#non_principal_audit').val() == "" && $('#managerial_level_audit').val() != "" && $('#non-mangerial_level_audit').val() != "") {
        $('#total_staff_audit').val(parseInt($('#principal_audit').val()) + parseInt($('#managerial_level_audit').val()) + parseInt($('#non-mangerial_level_audit').val()));
    } else if ($('#principal_audit').val() != "" && $('#non_principal_audit').val() != "" && $('#managerial_level_audit').val() == "" && $('#non-mangerial_level_audit').val() != "") {
        $('#total_staff_audit').val(parseInt($('#principal_audit').val()) + parseInt($('#non_principal_audit').val()) + parseInt($('#non-mangerial_level_audit').val()));
    } else if ($('#principal_audit').val() != "" && $('#non_principal_audit').val() != "" && $('#managerial_level_audit').val() != "" && $('#non-mangerial_level_audit').val() == "") {
        $('#total_staff_audit').val(parseInt($('#principal_audit').val()) + parseInt($('#non_principal_audit').val()) + parseInt($('#managerial_level_audit').val()));
    } else if ($('#principal_audit').val() != "" && $('#non_principal_audit').val() != "" && $('#managerial_level_audit').val() != "" && $('#non-mangerial_level_audit').val() != "") {
        $('#total_staff_audit').val(parseInt($('#principal_audit').val()) + parseInt($('#non_principal_audit').val()) + parseInt($('#managerial_level_audit').val()) + parseInt($('#non-mangerial_level_audit').val()));//first row
    } else if ($('#principal_audit').val() == "" && $('#non_principal_audit').val() != "" && $('#managerial_level_audit').val() == "" && $('#non-mangerial_level_audit').val() == "") {
        $('#total_staff_audit').val($('#non_principal_audit').val());
    } else if ($('#principal_audit').val() == "" && $('#non_principal_audit').val() != "" && $('#managerial_level_audit').val() != "" && $('#non-mangerial_level_audit').val() == "") {
        $('#total_staff_audit').val(parseInt($('#non_principal_audit').val()) + parseInt($('#managerial_level_audit').val()));
    } else if ($('#principal_audit').val() == "" && $('#non_principal_audit').val() != "" && $('#managerial_level_audit').val() != "" && $('#non-mangerial_level_audit').val() != "") {
        $('#total_staff_audit').val(parseInt($('#non_principal_audit').val()) + parseInt($('#managerial_level_audit').val()) + parseInt($('#non-mangerial_level_audit').val()));
    } else if ($('#principal_audit').val() == "" && $('#non_principal_audit').val() != "" && $('#managerial_level_audit').val() == "" && $('#non-mangerial_level_audit').val() != "") {
        $('#total_staff_audit').val(parseInt($('#non_principal_audit').val()) + parseInt($('#non-mangerial_level_audit').val())); //second
    } else if ($('#principal_audit').val() == "" && $('#non_principal_audit').val() == "" && $('#managerial_level_audit').val() != "" && $('#non-mangerial_level_audit').val() == "") {
        $('#total_staff_audit').val($('#managerial_level_audit').val());
    } else if ($('#principal_audit').val() == "" && $('#non_principal_audit').val() == "" && $('#managerial_level_audit').val() != "" && $('#non-mangerial_level_audit').val() != "") {
        $('#total_staff_audit').val(parseInt($('#managerial_level_audit').val()) + parseInt($('#non-mangerial_level_audit').val())); //third
    } else if ($('#principal_audit').val() == "" && $('#non_principal_audit').val() == "" && $('#managerial_level_audit').val() == "" && $('#non-mangerial_level_audit').val() != "") {
        $('#total_staff_audit').val($('#non-mangerial_level_audit').val());
    }
}

function getTotalNonAudit() {

    if ($('#principal_non_audit').val() != "" && $('#non_principal_non_audit').val() == "" && $('#managerial_level_non_audit').val() == "" && $('#non-mangerial_level_non_audit').val() == "") {
        $('#total_staff_non_audit').val($('#principal_non_audit').val());
    } else if ($('#principal_non_audit').val() != "" && $('#non_principal_non_audit').val() != "" && $('#managerial_level_non_audit').val() == "" && $('#non-mangerial_level_non_audit').val() == "") {
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val()) + parseInt($('#non_principal_non_audit').val()));
    } else if ($('#principal_non_audit').val() != "" && $('#non_principal_non_audit').val() == "" && $('#managerial_level_non_audit').val() != "" && $('#non-mangerial_level_non_audit').val() == "") {
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val()) + parseInt($('#managerial_level_non_audit').val()));
    } else if ($('#principal_non_audit').val() != "" && $('#non_principal_non_audit').val() == "" && $('#managerial_level_non_audit').val() == "" && $('#non-mangerial_level_non_audit').val() != "") {
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val()) + parseInt($('#non-mangerial_level_non_audit').val()));
    } else if ($('#principal_non_audit').val() != "" && $('#non_principal_non_audit').val() == "" && $('#managerial_level_non_audit').val() != "" && $('#non-mangerial_level_non_audit').val() != "") {
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val()) + parseInt($('#managerial_level_non_audit').val()) + parseInt($('#non-mangerial_level_non_audit').val()));
    } else if ($('#principal_non_audit').val() != "" && $('#non_principal_non_audit').val() != "" && $('#managerial_level_non_audit').val() == "" && $('#non-mangerial_level_non_audit').val() != "") {
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val()) + parseInt($('#non_principal_non_audit').val()) + parseInt($('#non-mangerial_level_non_audit').val()));
    } else if ($('#principal_non_audit').val() != "" && $('#non_principal_non_audit').val() != "" && $('#managerial_level_non_audit').val() != "" && $('#non-mangerial_level_non_audit').val() == "") {
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val()) + parseInt($('#non_principal_non_audit').val()) + parseInt($('#managerial_level_non_audit').val()));
    } else if ($('#principal_non_audit').val() != "" && $('#non_principal_non_audit').val() != "" && $('#managerial_level_non_audit').val() != "" && $('#non-mangerial_level_non_audit').val() != "") {
        $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val()) + parseInt($('#non_principal_non_audit').val()) + parseInt($('#managerial_level_non_audit').val()) + parseInt($('#non-mangerial_level_non_audit').val()));//first row
    } else if ($('#principal_non_audit').val() == "" && $('#non_principal_non_audit').val() != "" && $('#managerial_level_non_audit').val() == "" && $('#non-mangerial_level_non_audit').val() == "") {
        $('#total_staff_non_audit').val($('#non_principal_non_audit').val());
    } else if ($('#principal_non_audit').val() == "" && $('#non_principal_non_audit').val() != "" && $('#managerial_level_non_audit').val() != "" && $('#non-mangerial_level_non_audit').val() == "") {
        $('#total_staff_non_audit').val(parseInt($('#non_principal_non_audit').val()) + parseInt($('#managerial_level_non_audit').val()));
    } else if ($('#principal_non_audit').val() == "" && $('#non_principal_non_audit').val() != "" && $('#managerial_level_non_audit').val() != "" && $('#non-mangerial_level_non_audit').val() != "") {
        $('#total_staff_non_audit').val(parseInt($('#non_principal_non_audit').val()) + parseInt($('#managerial_level_non_audit').val()) + parseInt($('#non-mangerial_level_non_audit').val()));
    } else if ($('#principal_non_audit').val() == "" && $('#non_principal_non_audit').val() != "" && $('#managerial_level_non_audit').val() == "" && $('#non-mangerial_level_non_audit').val() != "") {
        $('#total_staff_non_audit').val(parseInt($('#non_principal_non_audit').val()) + parseInt($('#non-mangerial_level_non_audit').val())); //second
    } else if ($('#principal_non_audit').val() == "" && $('#non_principal_non_audit').val() == "" && $('#managerial_level_non_audit').val() != "" && $('#non-mangerial_level_non_audit').val() == "") {
        $('#total_staff_non_audit').val($('#managerial_level_non_audit').val());
    } else if ($('#principal_non_audit').val() == "" && $('#non_principal_non_audit').val() == "" && $('#managerial_level_non_audit').val() != "" && $('#non-mangerial_level_non_audit').val() != "") {
        $('#total_staff_non_audit').val(parseInt($('#managerial_level_non_audit').val()) + parseInt($('#non-mangerial_level_non_audit').val())); //third
    } else if ($('#principal_non_audit').val() == "" && $('#non_principal_non_audit').val() == "" && $('#managerial_level_non_audit').val() == "" && $('#non-mangerial_level_non_audit').val() != "") {
        $('#total_staff_non_audit').val($('#non-mangerial_level_non_audit').val());
    }
}

function getTotalAuditStaff() {

    if ($('#director_total').val() != "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val($('#director_total').val());
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_manager_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_senior_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_assistant_cpa_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_assistant_others_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_cpa_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_assistant_cpa_total').val()) + parseInt($('#audit_assistant_others_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_others_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_cpa_total').val()) + parseInt($('#audit_assistant_others_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_manager_total').val()) + parseInt($('#audit_assistant_cpa_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_manager_total').val()) + parseInt($('#audit_assistant_others_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_manager_total').val()) + parseInt($('#audit_senior_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_manager_total').val()) + parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_cpa_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_manager_total').val()) + parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_others_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_manager_total').val()) + parseInt($('#audit_assistant_cpa_total').val()) + parseInt($('#audit_assistant_others_total').val()));
    } else if ($('#director_total').val() != "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#director_total').val()) + parseInt($('#audit_manager_total').val()) + parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_cpa_total').val()) + parseInt($('#audit_assistant_others_total').val())); //first
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val()));
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val()) + parseInt($('#audit_senior_total').val()));
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val()) + parseInt($('#audit_assistant_cpa_total').val()));
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val()) + parseInt($('#audit_assistant_others_total').val()));
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val()) + parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_cpa_total').val()));
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val()) + parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_others_total').val()));
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val()) + parseInt($('#audit_assistant_cpa_total').val()) + parseInt($('#audit_assistant_others_total').val()));
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() != "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#audit_manager_total').val()) + parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_cpa_total').val()) + parseInt($('#audit_assistant_others_total').val())); //second
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#audit_senior_total').val()));
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_cpa_total').val()));
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() == "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_others_total').val()));
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() != "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#audit_senior_total').val()) + parseInt($('#audit_assistant_cpa_total').val()) + parseInt($('#audit_assistant_others_total').val())); //third
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() == "") {
        $('#audit_staff_total').val(parseInt($('#audit_assistant_cpa_total').val()));
    } else if ($('#director_total').val() == "" && $('#audit_manager_total').val() == "" && $('#audit_senior_total').val() == "" && $('#audit_assistant_cpa_total').val() != "" && $('#audit_assistant_others_total').val() != "") {
        $('#audit_staff_total').val(parseInt($('#audit_assistant_cpa_total').val()) + parseInt($('#audit_assistant_others_total').val())); //four
    } else {
        $('#audit_staff_total').val($('#audit_assistant_others_total').val());
    }

}

function getTotalFullTime() {

    if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val($('#director_full_time').val());
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_manager_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_senior_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_senior_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val()));
    } else if ($('#director_full_time').val() != "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#director_full_time').val()) + parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val())); //first
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val()));
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_senior_full_time').val()));
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()));
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val()));
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()));
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val()));
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val()));
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() != "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val()) + parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val())); //second
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val()));
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()));
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() == "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val()));
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() != "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val()) + parseInt($('#audit_assistant_cpa_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val())); //third
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() == "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_assistant_cpa_full_time').val()));
    } else if ($('#director_full_time').val() == "" && $('#audit_manager_full_time').val() == "" && $('#audit_senior_full_time').val() == "" && $('#audit_assistant_cpa_full_time').val() != "" && $('#audit_assistant_others_full_time').val() != "") {
        $('#audit_staff_full_time').val(parseInt($('#audit_assistant_cpa_full_time').val()) + parseInt($('#audit_assistant_others_full_time').val())); //four
    } else {
        $('#audit_staff_full_time').val($('#audit_assistant_others_full_time').val());
    }

}

function getTotalPartTime() {

    if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val($('#director_part_time').val());
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_manager_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_senior_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_senior_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val()));
    } else if ($('#director_part_time').val() != "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#director_part_time').val()) + parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val())); //first
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val()));
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_senior_part_time').val()));
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_timel').val() == "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()));
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val()));
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()));
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val()));
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val()));
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() != "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val()) + parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val())); //second
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val()));
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()));
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() == "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val()));
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() != "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val()) + parseInt($('#audit_assistant_cpa_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val())); //third
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() == "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_assistant_cpa_part_time').val()));
    } else if ($('#director_part_time').val() == "" && $('#audit_manager_part_time').val() == "" && $('#audit_senior_part_time').val() == "" && $('#audit_assistant_cpa_part_time').val() != "" && $('#audit_assistant_others_part_time').val() != "") {
        $('#audit_staff_part_time').val(parseInt($('#audit_assistant_cpa_part_time').val()) + parseInt($('#audit_assistant_others_part_time').val())); //four
    } else {
        $('#audit_staff_part_time').val($('#audit_assistant_others_part_time').val());
    }

}

function getOrganization() {
    var radioValue = $("input[name='org_stru_id']:checked").val();
    if (radioValue == 1) {
        $('#sole-proprietorship').css('display', 'block');
        $('#partnership').css('display', 'none');
        $('#company').css('display', 'none');
    } else if (radioValue == 2) {
        $('#sole-proprietorship').css('display', 'none');
        $('#partnership').css('display', 'block');
        $('#company').css('display', 'none');
    } else if (radioValue == 3) {
        $('#sole-proprietorship').css('display', 'none');
        $('#partnership').css('display', 'none');
        $('#company').css('display', 'block');
    } else {
        $('#sole-proprietorship').css('display', 'none');
        $('#partnership').css('display', 'none');
        $('#company').css('display', 'none');
    }
}

function getFileName(file, label) {

    var filepath = document.getElementById(file);
    for (var i = 0; i < filepath.files.length; ++i) {
        $('#' + label).text(filepath.files.item(i).name);

    }
}

function addInputFile(divname, diventry) {
    var controlForm = $('.' + divname + ':first'),
        currentEntry = $('.btn-add').parents('.' + diventry + ':first'),
        newEntry = $(currentEntry.clone()).appendTo(controlForm);
    newEntry.find('input').val('');
    controlForm.find('.' + diventry + ':not(:last) .btn-add')
        .removeClass('btn-add').addClass('btn-remove')
        .removeClass('btn-primary').addClass('btn-danger')
        .attr("onclick", "delInputFile('" + diventry + "')")
        .html('<span class="fa fa-trash"></span>');


}

function delInputFile(diventry) {
    $('.btn-remove').parents('.' + diventry + ':first').remove();
}

var toastOptions = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "2500",
    "timeOut": "2500",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

function successMessage(message) {
    toastr.options = toastOptions;
    toastr.success(message);
}

function createDataTable(table) {

    $(table).DataTable({
        'destroy': true,
        'paging': true,
        'lengthChange': false,
        "pageLength": 5,
        'searching': false,
        'ordering': true,
        'info': false,
        'autoWidth': false,
        "scrollX": true,
        'select': false,
        "order": [[0, "desc"]],

    });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
}

function createDataTableWithAsc(table) {

    $(table).DataTable({
        'destroy': true,
        'paging': true,
        'lengthChange': false,
        "pageLength": 5,
        'searching': false,
        'ordering': true,
        'info': false,
        'autoWidth': false,
        "scrollX": true,
        'select': false,
        "order": [[0, "asc"]],

    });
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
}

function destroyDatatable(table, tableBody) {
    if ($.fn.DataTable.isDataTable(table)) {
        $(table).DataTable().destroy();
    }
    $(tableBody).empty();
}

$('table tbody').on('click', 'tr', function () {
    if ($(this).hasClass('selected')) {
        $(this).removeClass('selected');
    } else {
        $('table tbody tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
});

function dataMessage(message, table, tableBody) {
    var dataMsg = message.responseText;
    var noOfColumn = countColumn(table);
    var tr = "<tr>";
    tr += "<td class='text-center' colspan='" + noOfColumn + "'>" + dataMsg + "</td>";
    tr += "</tr>";
    $(tableBody).append(tr);
    if (noOfColumn >= 11) {
        $(table).addClass('table-responsive');
    }

}

function getIndexNumber(table) {
    $(table).each(function () {
        $(this).find("td").first().html($(this).index() + 1);
    });
}

function numberRows() {
    $('table tbody tr').each(function (idx) {
        $(this).children(":eq(0)").html(idx + 1);
    });
}
