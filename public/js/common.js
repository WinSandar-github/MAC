        var counter = 0;
               

        function addRowCPAFF(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row-1)+'</td>';
            cols += '<td><div class="form-group"><input type="date" name="date1" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
            cols += '<td><div class="form-group"><input type="date" name="date2" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
            cols += '<td><div class="form-group"><input type="date" name="date3" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
            cols += '<td class="border-color">'+ 
                        '<div class="input-group mt-3">'+                                                    
                            '<div class="custom-file">'+
                                '<input type="file" class="custom-file-input" id="inputfile2" multiple>'+
                                '<label class="custom-file-label" >Choose Image</label>'+
                            '</div>'+
                        '</div>'+                                                                                    
                    
                        '<div class="form-group">'+
                            '<input type="text" name="" class="form-control" placeholder="Signture of Registrar" required>'+
                        '</div>'+ 
                    '</td>';
            cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowCPAFF("'+tbody+'")  value="X"></td>';            
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowCPAFF(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }

        function addRowCPAPA(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row-1)+'</td>';
            cols += '<td><div class="form-group"><input type="date" name="date4" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
            cols += '<td><div class="form-group"><input type="date" name="date5" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
            cols += '<td><div class="form-group"><input type="date" name="date6" class="form-control" placeholder="dd/mm/yyyy" required></div></td>';
            cols += '<td class="border-color">'+ 
                        '<div class="input-group mt-3">'+                                                    
                            '<div class="custom-file">'+
                                '<input type="file" class="custom-file-input" id="inputfile2" multiple>'+
                                '<label class="custom-file-label" >Choose file</label>'+
                            '</div>'+
                        '</div>'+                                                                                    
                    
                        '<div class="form-group">'+
                            '<input type="text" name="" class="form-control" placeholder="Signture of Registrar" required>'+
                        '</div>'+ 
                    '</td>';
            cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowCPAPA("'+tbody+'")  value="X"></td>';            
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowCPAPA(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }


        function addRowSubject(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" class="form-control" name="education[]" placeholder="လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း"/></td>';
            cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowSubject("'+tbody+'")  value="X"></td>';            
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function addRowDipSubject(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" class="form-control" name="education[]" placeholder="လက်မှတ်ရ ပြည်သူ့စာရင်းကိုင်သင်တန်း"/></td>';
            cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowSubject("'+tbody+'")  value="X"></td>';            
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowSubject(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }

        function addRowInCountryEducation(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" class="form-control" name="education[]" placeholder="ပြည်တွင်းမှရရှိသည့် ပညာအရည်အချင်း"/></td>';
            cols += '<td class="text-center"><input type="file" id="image" name="image"></td>';
            cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowInCountryEducation("'+tbody+'")  value="X"></td>';            
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowInCountryEducation(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }

        function addRowEducation(tbody){
            var newRow = $("<tr>");
            var cols = "";
            var row=$('.'+tbody+' tr').length;
            cols += '<td>'+ (row)+'</td>';
            cols += '<td><input type="text" class="form-control" name="education[]" placeholder="ပညာအရည်အချင်း"/></td>';
            cols += '<td class="text-center"><input type="button" class="delete btn btn-sm btn-danger" onclick=delRowEducation("'+tbody+'")  value="X"></td>';            
            newRow.append(cols);
            $("table."+tbody).append(newRow);
            counter++;
        }
        function delRowEducation(tbody){
            $("table."+tbody).on("click", ".delete", function (event) {
                $(this).closest("tr").remove();
                counter -= 1
            });
        }

        function addRowBranch(tbody){
            var newRow = $("<tr>");
            var cols = "";
            
            cols += '<td><input type="text" name="bo_branch_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="bo_township[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="bo_post_code[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="bo_city[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="bo_state_region[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="bo_phone[]" class="form-control" /></td>';
            cols += '<td><input type="button" class="btn btn-primary btn-sm btn-plus" onclick=addInputTele("'+tbody+'")  value="+"></td>';
            cols += '<td><input type="text" name="bo_email[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="bo_website[]" class="form-control" /></td>';
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
            cols += '<td><input type="text" name="fona_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="fona_pass_csc_inco[]" class="form-control" /></td>';
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
            cols += '<td><input type="text" name="dona_name[]" class="form-control"/></td>';
            cols += '<td><input type="text" name="dona_position[]" class="form-control" /></td>';
            cols += '<td><input type="text" name="dona_passport[]" class="form-control" /> </td>';
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
        function getTotalStaff(){
            
            if($('#principal_total').val()!="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()==""){
                $('#total_staff_total').val($('#principal_total').val()); 
            }else if($('#principal_total').val()!="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()==""){
                $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#non_principal_total').val())); 
            }else if($('#principal_total').val()!="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()==""){
                $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#managerial_level_total').val())); 
            }else if($('#principal_total').val()!="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()!=""){
                $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#non-mangerial_level_total').val())); 
            }else if($('#principal_total').val()!="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()!=""){
                $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#managerial_level_total').val())+parseInt($('#non-mangerial_level_total').val())); 
            }else if($('#principal_total').val()!="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()!=""){
                $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#non_principal_total').val())+parseInt($('#non-mangerial_level_total').val())); 
            }else if($('#principal_total').val()!="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()==""){
                $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#non_principal_total').val())+parseInt($('#managerial_level_total').val())); 
             }else if($('#principal_total').val()!="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()!=""){
                 $('#total_staff_total').val(parseInt($('#principal_total').val())+parseInt($('#non_principal_total').val())+parseInt($('#managerial_level_total').val())+parseInt($('#non-mangerial_level_total').val()));//first row 
             }else if($('#principal_total').val()=="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()==""){
                $('#total_staff_total').val($('#non_principal_total').val()); 
            }else if($('#principal_total').val()=="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()==""){
                $('#total_staff_total').val(parseInt($('#non_principal_total').val())+parseInt($('#managerial_level_total').val())); 
            }else if($('#principal_total').val()=="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()!=""){
                $('#total_staff_total').val(parseInt($('#non_principal_total').val())+parseInt($('#managerial_level_total').val())+parseInt($('#non-mangerial_level_total').val())); 
            }else if($('#principal_total').val()=="" && $('#non_principal_total').val()!="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()!=""){
                $('#total_staff_total').val(parseInt($('#non_principal_total').val())+parseInt($('#non-mangerial_level_total').val())); //second
            }else if($('#principal_total').val()=="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()==""){
                $('#total_staff_total').val($('#managerial_level_total').val()); 
            }else if($('#principal_total').val()=="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()!="" && $('#non-mangerial_level_total').val()!=""){
                $('#total_staff_total').val(parseInt($('#managerial_level_total').val())+parseInt($('#non-mangerial_level_total').val())); //third
            }else if($('#principal_total').val()=="" && $('#non_principal_total').val()=="" && $('#managerial_level_total').val()=="" && $('#non-mangerial_level_total').val()!=""){
                $('#total_staff_total').val($('#non-mangerial_level_total').val()); 
            }
        }
        function getTotalAudit(){
            
            if($('#principal_audit').val()!="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()==""){
                $('#total_staff_audit').val($('#principal_audit').val()); 
            }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()==""){
                $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#non_principal_audit').val())); 
            }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()==""){
                $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#managerial_level_audit').val())); 
            }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()!=""){
                $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#non-mangerial_level_audit').val())); 
            }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()!=""){
                $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#managerial_level_audit').val())+parseInt($('#non-mangerial_level_audit').val())); 
            }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()!=""){
                $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#non_principal_audit').val())+parseInt($('#non-mangerial_level_audit').val())); 
            }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()==""){
                $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#non_principal_audit').val())+parseInt($('#managerial_level_audit').val())); 
             }else if($('#principal_audit').val()!="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()!=""){
                 $('#total_staff_audit').val(parseInt($('#principal_audit').val())+parseInt($('#non_principal_audit').val())+parseInt($('#managerial_level_audit').val())+parseInt($('#non-mangerial_level_audit').val()));//first row 
             }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()==""){
                $('#total_staff_audit').val($('#non_principal_audit').val()); 
            }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()==""){
                $('#total_staff_audit').val(parseInt($('#non_principal_audit').val())+parseInt($('#managerial_level_audit').val())); 
            }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()!=""){
                $('#total_staff_audit').val(parseInt($('#non_principal_audit').val())+parseInt($('#managerial_level_audit').val())+parseInt($('#non-mangerial_level_audit').val())); 
            }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()!="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()!=""){
                $('#total_staff_audit').val(parseInt($('#non_principal_audit').val())+parseInt($('#non-mangerial_level_audit').val())); //second
            }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()==""){
                $('#total_staff_audit').val($('#managerial_level_audit').val()); 
            }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()!="" && $('#non-mangerial_level_audit').val()!=""){
                $('#total_staff_audit').val(parseInt($('#managerial_level_audit').val())+parseInt($('#non-mangerial_level_audit').val())); //third
            }else if($('#principal_audit').val()=="" && $('#non_principal_audit').val()=="" && $('#managerial_level_audit').val()=="" && $('#non-mangerial_level_audit').val()!=""){
                $('#total_staff_audit').val($('#non-mangerial_level_audit').val()); 
            }
        }
        function getTotalNonAudit(){
            
            if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()==""){
                $('#total_staff_non_audit').val($('#principal_non_audit').val()); 
            }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()==""){
                $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#non_principal_non_audit').val())); 
            }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()==""){
                $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())); 
            }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()!=""){
                $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); 
            }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()!=""){
                $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); 
            }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()!=""){
                $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#non_principal_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); 
            }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()==""){
                $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#non_principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())); 
             }else if($('#principal_non_audit').val()!="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()!=""){
                 $('#total_staff_non_audit').val(parseInt($('#principal_non_audit').val())+parseInt($('#non_principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val()));//first row 
             }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()==""){
                $('#total_staff_non_audit').val($('#non_principal_non_audit').val()); 
            }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()==""){
                $('#total_staff_non_audit').val(parseInt($('#non_principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())); 
            }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()!=""){
                $('#total_staff_non_audit').val(parseInt($('#non_principal_non_audit').val())+parseInt($('#managerial_level_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); 
            }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()!="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()!=""){
                $('#total_staff_non_audit').val(parseInt($('#non_principal_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); //second
            }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()==""){
                $('#total_staff_non_audit').val($('#managerial_level_non_audit').val()); 
            }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()!="" && $('#non-mangerial_level_non_audit').val()!=""){
                $('#total_staff_non_audit').val(parseInt($('#managerial_level_non_audit').val())+parseInt($('#non-mangerial_level_non_audit').val())); //third
            }else if($('#principal_non_audit').val()=="" && $('#non_principal_non_audit').val()=="" && $('#managerial_level_non_audit').val()=="" && $('#non-mangerial_level_non_audit').val()!=""){
                $('#total_staff_non_audit').val($('#non-mangerial_level_non_audit').val()); 
            }
        }
        function getTotalAuditStaff(){
            
            if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val($('#director_total').val()); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_senior_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_assistant_others_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_others_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_others_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_others_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); 
            }else if($('#director_total').val()!="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#director_total').val())+parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); //first
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())); 
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())); 
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_others_total').val())); 
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_others_total').val())); 
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); 
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()!="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#audit_manager_total').val())+parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); //second
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#audit_senior_total').val())); 
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())); 
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()=="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_others_total').val())); 
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()!="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#audit_senior_total').val())+parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); //third
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()==""){
                $('#audit_staff_total').val(parseInt($('#audit_assistant_cpa_total').val())); 
            }else if($('#director_total').val()=="" && $('#audit_manager_total').val()=="" && $('#audit_senior_total').val()=="" && $('#audit_assistant_cpa_total').val()!="" && $('#audit_assistant_others_total').val()!=""){
                $('#audit_staff_total').val(parseInt($('#audit_assistant_cpa_total').val())+parseInt($('#audit_assistant_others_total').val())); //four
            }else{
                $('#audit_staff_total').val($('#audit_assistant_others_total').val());
            }
            
        }
        function getTotalFullTime(){
            
            if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val($('#director_full_time').val()); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_senior_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
            }else if($('#director_full_time').val()!="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#director_full_time').val())+parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); //first
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())); 
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())); 
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()!="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#audit_manager_full_time').val())+parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); //second
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val())); 
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())); 
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()=="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); 
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()!="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#audit_senior_full_time').val())+parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); //third
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()==""){
                $('#audit_staff_full_time').val(parseInt($('#audit_assistant_cpa_full_time').val())); 
            }else if($('#director_full_time').val()=="" && $('#audit_manager_full_time').val()=="" && $('#audit_senior_full_time').val()=="" && $('#audit_assistant_cpa_full_time').val()!="" && $('#audit_assistant_others_full_time').val()!=""){
                $('#audit_staff_full_time').val(parseInt($('#audit_assistant_cpa_full_time').val())+parseInt($('#audit_assistant_others_full_time').val())); //four
            }else{
                $('#audit_staff_full_time').val($('#audit_assistant_others_full_time').val());
            }
            
        }
        function getTotalPartTime(){
            
            if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val($('#director_part_time').val()); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_senior_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
            }else if($('#director_part_time').val()!="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#director_part_time').val())+parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); //first
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())); 
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())); 
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_timel').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()!="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#audit_manager_part_time').val())+parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); //second
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val())); 
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())); 
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()=="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); 
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()!="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#audit_senior_part_time').val())+parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); //third
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()==""){
                $('#audit_staff_part_time').val(parseInt($('#audit_assistant_cpa_part_time').val())); 
            }else if($('#director_part_time').val()=="" && $('#audit_manager_part_time').val()=="" && $('#audit_senior_part_time').val()=="" && $('#audit_assistant_cpa_part_time').val()!="" && $('#audit_assistant_others_part_time').val()!=""){
                $('#audit_staff_part_time').val(parseInt($('#audit_assistant_cpa_part_time').val())+parseInt($('#audit_assistant_others_part_time').val())); //four
            }else{
                $('#audit_staff_part_time').val($('#audit_assistant_others_part_time').val());
            }
            
        }
        function getOrganization(){
            var radioValue = $("input[name='org_stru_id']:checked").val();
            if(radioValue==1){
                $('#sole-proprietorship').css('display','block');
                $('#partnership').css('display','none');
                $('#company').css('display','none');
            }else if(radioValue==2){
                $('#sole-proprietorship').css('display','none');
                $('#partnership').css('display','block');
                $('#company').css('display','none');
            }else if(radioValue==3){
                $('#sole-proprietorship').css('display','none');
                $('#partnership').css('display','none');
                $('#company').css('display','block');
            }else{
                $('#sole-proprietorship').css('display','none');
                $('#partnership').css('display','none');
                $('#company').css('display','none');
            }
        }
        function getFileName(file,label){
            
            var filepath=document.getElementById(file);
            let filenames = [];
            for (var i = 0; i <filepath.files.length; ++i) {
                if(filepath.files.length == 1){
                    $('#'+label).text(filepath.files.item(i).name);
                }else{
                    filenames.push(filepath.files.item(i).name);
                    $('#'+label).text(filenames.join(","));
                }
                
            }
        }