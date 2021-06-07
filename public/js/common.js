        var counter = 0;

        function addRowBranch(tbody){
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><input type="text" name="branch_no[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="branch_township[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="branch_post_code[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="branch_city[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="branch_state[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="branch_telephone[]" class="form-control" /></td>';
            cols += '<td><input type="button" class="btn btn-primary btn-sm btn-plus" onclick=addInputTele("'+tbody+'")  value="+"></td>';
            cols += '<td><input type="text" name="branch_email[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="branch_website[]" class="form-control" /></td>';
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowBranch("'+tbody+'")  value="X"></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowBranch(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }
        
        function addRowPartner(tbody){
            
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" name="partner_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="partner_private_regno[]" class="form-control" /></td>';
            cols += '<td><input type="radio" name="report_yes" id="report_yes[]" > Yes</td>';
            cols += '<td><input type="radio" name="report_yes" id="report_no[]" > No</td>';
            
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowPartner("'+tbody+'")  value="X"></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowPartner(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }
        function addRowDirector(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" name="director_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="director_position[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="director_cpa_no" class="form-control" /> </td>';
            cols += '<td><input type="text" name="director_private_regno" class="form-control" /></td>';
            
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowDirector("'+tbody+'")  value="X"></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowDirector(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }
        
        function addRowPartnerByNonAudit(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" name="non_partner_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="non_partner_passport[]" class="form-control" /></td>';
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowPartnerByNonAudit("'+tbody+'")  value="X"></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowPartnerByNonAudit(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1;
                
            });
        }
        function addRowDirectorByNonAudit(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" name="non_director_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="non_director_position[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="non_director_cpa_no[]" class="form-control" /> </td>';
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowDirectorByNonAudit("'+tbody+'")  value="X"></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowDirectorByNonAudit(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }
        function addRowDirectorCPA(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" name="director_cpa_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="director_cpa_position[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="director_cpa_pass_no[]" class="form-control" /> </td>';
            cols += '<td><input type="text" name="director_cpa_full_no[]" class="form-control" /> </td>';
            cols += '<td><input type="text" name="director_cpa_public_no[]" class="form-control" /> </td>';
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowDirectorCPA("'+tbody+'")  value="X"></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowDirectorCPA(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }
        function addRowAuditWork(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" name="audit_work_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="audit_work_list[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="audit_work_ppa[]" class="form-control" /></td>';
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowAuditWork("'+tbody+'")  value="X"></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowAuditWork(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }
        function addRowSchoolFounder(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" name="school_founder_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="school_founder_passport[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_founder_cpa[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_founder_qual[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_founder_address[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_founder_phone[]" class="form-control" /></td>';
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowShoolFounder("'+tbody+'")  value="X"></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowShoolFounder(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }
        function addRowSchoolManager(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" name="school_manager_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="school_manager_passport[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_manager_cpa[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_manager_qual[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_manager_duty[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_manager_phone[]" class="form-control" /></td>';
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowShoolManager("'+tbody+'")  value="X"></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowShoolManager(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }
        function addRowSchoolExecutive(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" name="school_executive_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="school_executive_passport[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_executive_cpa[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_executive_qual[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_executive_duty[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_executive_phone[]" class="form-control" /></td>';
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowShoolExecutive("'+tbody+'")  value="X"></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowShoolExecutive(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }
        function addRowSchoolTeacher(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" name="school_teacher_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="school_teacher_passport[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_teacher_tp[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_teacher_qual[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_teacher_subject[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="school_teacher_phone[]" class="form-control" /></td>';
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowShoolTeacher("'+tbody+'")  value="X"></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowShoolTeacher(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }
        function addInputTele(tbody){
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td></td>';
            cols += '<td></td>';
            cols += '<td></td>';
            cols += '<td></td>';
            cols += '<td></td>';
            cols += '<td><input type="text" name="branch_telephone[]" class="form-control" /></td>';
            cols += '<td><input type="button" class="delete btn btn-sm btn-danger" onclick=delInputTele("'+tbody+'")  value="X"></td>';
            cols += '<td></td>';
            cols += '<td></td>';
            cols += '<td></td>';
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delInputTele(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }
        function createDatepicker(name){
            $("input[name='"+name+"']").flatpickr({
                enableTime: false,
                dateFormat: "d-m-Y",
            });
        }
        