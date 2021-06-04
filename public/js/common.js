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

            cols += '<td><input type="text" name="partner_no[]" class="form-control"/></td>';
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

            cols += '<td><input type="text" name="director_no[]" class="form-control"/></td>';
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

            cols += '<td><input type="text" name="non_partner_sr[]" class="form-control"/></td>';
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
                counter -= 1
            });
        }
        function addRowDirectorByNonAudit(tbody){
            var newRow = $("<tr>");
            var cols = "";

            cols += '<td><input type="text" name="non_director_sr[]" class="form-control"/></td>';
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

            cols += '<td><input type="text" name="director_cpa_sr[]" class="form-control"/></td>';
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