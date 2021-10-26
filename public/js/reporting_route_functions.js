function daAttendList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function daAttendMacList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function daAttendPrvList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function daAttendSelfList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function entryExamsList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function attendEntryExamMacList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function attendEntryExamPrvList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function attendEntryExamSelfList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function daRegList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function daExamRegList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function daPassList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function cpaQualifiedList(url) {
    if ($('#select-date').val() != "") {

        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function cpaQualifiedExamEnRol(url) {
    if ($('#select-date').val() != "") {

        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function cpaQualifiedExamReg(url) {
    if ($('#select-date').val() != "") {

        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function cpaQualifiedPass(url) {
    if ($('#select-date').val() != "") {

        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function cpaQualifiedFail(url) {
    if ($('#select-date').val() != "") {

        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function cpaFFYealyList(url) {

    if ($('#select-date').val() != "") {
        url = url + ""
        $('#report-form').attr('action', FRONTEND_URL + url + "/" + $("#select-date").val());
        $('#report-form').submit();
    } else {
        alert('select year');
    }

}

function cpaPAYealyList(url) {

    if ($('#select-date').val() != "") {
        $('#report-form').attr('action', FRONTEND_URL + url + "/" + $("#select-date").val());
        $('#report-form').submit();
    } else {
        alert('select year');
    }

}

function cpaFFYearlyRegList(url) {

    if ($('#select-date').val() != "") {
        $('#report-form').attr('action', FRONTEND_URL + url + "/" + $("#select-date").val());
        $('#report-form').submit();
    } else {
        alert('select year');
    }

}

function cpaPAPPYearlyRegList(url) {

    if ($('#select-date').val() != "") {
        $('#report-form').attr('action', FRONTEND_URL + url + "/" + $("#select-date").val());
        $('#report-form').submit();
    } else {
        alert('select year');
    }

}

function articleList(url) {
    if ($('#select-date').val() != "") {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function articleDailyInOutList(url) {
    if ($('#select-date').val() != "") {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function articleInternPosList(url) {
    if ($('#select-date').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function articleInternshipList(url) {
    if ($('#select-date').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function articleMentorInternRegister(url) {
    if ($('#select-date').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function articleMentorIntern(url) {
    if ($('#select-date').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function firmIndividual(url) {
    // if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
    if($('#select-date').val() != ""){
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function nonFirmIndividual(url) {
    if ($('#select-date').val() != "") {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function teacherSchoolLicense(url) {
    if ($('#select-date').val() != "") {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select year');
    }
}

function teacherSchoolPrivate(url) {
    if ($('#select-date').val() != "") {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function teacherSchoolLicensePlate(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', FRONTEND_URL + url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}



