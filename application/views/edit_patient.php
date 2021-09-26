<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Patient Information
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_patient/manage_patient"> Manage Patients</a></li>
            <li class="active">Edit Patient Information</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_patient/update_patient" method="POST" name="patient">
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Patient Name <span class="required">*</span></label>
                                    <input type="text" name="patient_name" required value="<?php echo $patient_info->patient_id; ?>" class="form-control">
                                    <input type="hidden" name="patient_id" value="<?php echo $patient_info->patient_id; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Patient Age</label>
                                    <input type="text" name="patient_age" value="<?php echo $patient_info->patient_age; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Father's Name</label>
                                    <input type="text" name="patient_fathers_name" value="<?php echo $patient_info->patient_fathers_name; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Mother's Name</label>
                                    <input type="text" name="patient_mothers_name" value="<?php echo $patient_info->patient_mothers_name; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Legal Guardian <span class="required">*</span></label>
                                    <input type="text" name="patient_legal_guardian" required value="<?php echo $patient_info->patient_legal_guardian; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Present Address <span class="required">*</span></label>
                                    <textarea name="patient_present_address" required class="form-control"><?php echo $patient_info->patient_present_address?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Patient Permanent Address</label>
                                    <textarea name="patient_permanent_address" class="form-control"><?php echo $patient_info->patient_permanent_address?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Patient NID</label>
                                    <input type="text" name="patient_NID" value="<?php echo $patient_info->patient_NID; ?>" class="form-control">
                                </div>  
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Patient Contact Mobile - 1 <span class="required">*</span></label>
                                    <input type="text" name="patient_contact_mobile_1" required value="<?php echo $patient_info->patient_contact_mobile_1; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Contact Mobile - 2</label>
                                    <input type="text" name="patient_contact_mobile_2" value="<?php echo $patient_info->patient_contact_mobile_2; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Monthly Installment <span class="required">*</span></label>
                                    <input type="text" name="patient_monthly_installment" required value="<?php echo $patient_info->patient_monthly_installment; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Education</label>
                                    <textarea name="patient_education" class="form-control"><?php echo $patient_info->patient_education; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Patient Material Status</label>
                                    <div class="radio">
                                        <label><input type="radio" name="patient_material_status" value="Married">Married</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="patient_material_status" value="Unmarried">Unmarried</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Patient Addition Name <span class="required">*</span></label>
                                    <input type="text" name="patient_addition_name" required value="<?php echo $patient_info->patient_addition_name; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Drug Addicted Length</label>
                                    <input type="text" name="patient_drug_addicted_length" value="<?php echo $patient_info->patient_drug_addicted_length; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Last Dose</label>
                                    <input type="text" name="patient_last_dose" value="<?php echo $patient_info->patient_last_dose; ?>" class="form-control">
                                </div>     
                                <div class="form-group">
                                    <label>Admission Date <span class="required">*</span></label>
                                    <input type="text" name="patient_admission_date" required value="<?php echo $patient_info->patient_admission_date; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Admission ID <span class="required">*</span></label>
                                    <input type="text" name="patient_admission_id" required value="<?php echo $patient_info->patient_admission_id; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-info pull-right">Conform Admission</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.forms['patient'].elements['patient_material_status'].value = '<?php echo $patient_info->patient_material_status; ?>';
</script>