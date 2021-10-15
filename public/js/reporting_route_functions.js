function daAttendList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function daRegList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function daExamRegList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}

function daPassList(url) {
    if ($('#select-course').val() != "" && $('#select-batch').val() != '') {
        $('#report-form').attr('action', url);
        $('#report-form').submit();
    } else {
        alert('select course and batch');
    }
}