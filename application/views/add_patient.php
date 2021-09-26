<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Patient
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_patient/manage_patient"> Manage Patients</a></li>
            <li class="active">Add New Patient</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form action="<?php echo base_url(); ?>evis_patient/save_patient" method="POST" enctype="multipart/form-data">
                        <h3 style="color:green">
                            <?php
                            $msg = $this->session->userdata('save_patient');
                            if (isset($msg)) {
                                echo "<p style='margin-left:2%;'>$msg</p>";
                                $this->session->unset_userdata('save_patient');
                            }
                            ?>
                        </h3>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Patient Name <span class="required">*</span></label>
                                    <input type="text" name="patient_name" required placeholder="Enter Patient Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Image</label>
                                    <input type="file" name="patient_image" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Age</label>
                                    <input type="text" name="patient_age" placeholder="Enter Patient Age" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Father's Name</label>
                                    <input type="text" name="patient_fathers_name" placeholder="Enter Father's Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Mother's Name</label>
                                    <input type="text" name="patient_mothers_name" placeholder="Enter Mother's Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Legal Guardian <span class="required">*</span></label>
                                    <input type="text" name="patient_legal_guardian" required placeholder="Enter Patient Legal Guardian Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Present Address <span class="required">*</span></label>
                                    <textarea name="patient_present_address" required class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Patient Permanent Address</label>
                                    <textarea name="patient_permanent_address" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Patient NID</label>
                                    <input type="text" name="patient_NID" placeholder="Enter Patient NID" class="form-control">
                                </div>  
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Patient Contact Mobile - 1 <span class="required">*</span></label>
                                    <input type="text" name="patient_contact_mobile_1" required placeholder="Enter Patient Contact Mobile - 1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Contact Mobile - 2</label>
                                    <input type="text" name="patient_contact_mobile_2" placeholder="Enter Patient Contact Mobile - 2" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Monthly Installment <span class="required">*</span></label>
                                    <input type="text" name="patient_monthly_installment" required placeholder="Enter Patient Monthly Installment" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Education</label>
                                    <textarea name="patient_education" class="form-control"></textarea>
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
                                    <input type="text" name="patient_addition_name" required placeholder="Enter Patient Addition Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Drug Addicted Length</label>
                                    <input type="text" name="patient_drug_addicted_length" placeholder="Enter Patient Drug Addicted Length" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Last Dose</label>
                                    <input type="text" name="patient_last_dose" placeholder="Enter Patient Last Dose Time" class="form-control">
                                </div>     
                                <div class="form-group">
                                    <label>Admission Date <span class="required">*</span></label>
                                    <input type="text" name="patient_admission_date" required value="<?php echo " " . date("d-m-Y") . " "; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Patient Admission ID <span class="required">*</span></label>
                                    <input type="text" name="patient_admission_id" required value="<?php echo date("dm") . time(); ?>" class="form-control">
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