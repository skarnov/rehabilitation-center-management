<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Add New Patient
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_patient/manage_patient"> Manage Patient</a></li>
            <li class="active">Add New Patient</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="col-xs-12">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-1">
                                    <a href="<?php echo base_url(); ?>evis_patient/download_patient_form/<?php echo $patient_info->patient_id; ?>" class="btn btn-success">Download PDF</a>
                                </div>    
                            </div>
                            <div class="table-responsive">
                                <hr/>
                                <h2 style="text-align: center;">
                                    <?php echo $patient_info->patient_name; ?>
                                </h2>
                                <table style="float:right; height:120px; border:2px solid black; width:110px; margin-top:-63px;">
                                    <tr>
                                        <?php
                                            $image = $patient_info->patient_image;
                                            if ($image) {
                                                ?>
                                            <td><img src="<?php echo base_url() . $patient_info->patient_image; ?>" style="height: 116px; width: 106px;" /></td><br/>
                                                <?php
                                            } else {
                                                ?>
                                                <td><img src="<?php echo base_url();?>img/no_image_thumb.gif" style="height: 116px; width: 106px;" /></td><br/>
                                                <?php
                                            }
                                        ?>
                                    </tr>
                                </table><br/><br/><br/><br/>
                                <table style="width:100%; line-height:30px;">
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Fathers Name:</strong> <?php echo $patient_info->patient_fathers_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Mothers Name:</strong> <?php echo $patient_info->patient_mothers_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Legal Guardian:</strong> <?php echo $patient_info->patient_legal_guardian; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Present Address:</strong> <?php echo $patient_info->patient_present_address; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Permanent Address:</strong> <?php echo $patient_info->patient_permanent_address; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Patient NID:</strong> <?php echo $patient_info->patient_NID; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Contact Number 1:</strong> <?php echo $patient_info->patient_contact_mobile_1; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Contact NUmber 2:</strong> <?php echo $patient_info->patient_contact_mobile_2; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Patient Age:</strong> <?php echo $patient_info->patient_age; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Patient Education:</strong> <?php echo $patient_info->patient_education; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Material Status:</strong> <?php echo $patient_info->patient_material_status; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Addition Name:</strong> <?php echo $patient_info->patient_addition_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Drug Addicted Length:</strong> <?php echo $patient_info->patient_drug_addicted_length; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Last Dose:</strong> <?php echo $patient_info->patient_last_dose; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Admission Date:</strong> <?php echo $patient_info->patient_admission_date; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Admission ID:</strong> <?php echo $patient_info->patient_admission_id; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="border:1px solid black;">&nbsp;<strong>Status:</strong> <?php
                                            if ($patient_info->patient_status == '0') {
                                                echo 'Admitted';
                                            } if ($patient_info->patient_status == '1') {
                                                echo 'Released';
                                            }
                                            ?>
                                        </td>

                                    </tr>
                                </table>
                                <br/>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer"></div>
                </div>
            </div>
        </div>
    </section>
</div>