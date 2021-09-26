<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Manage Patient
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>evis_patient/add_patient">Add New Patient</a></li>
            <li class="active">Manage Patient</li>
        </ol>
    </section>
    <script type="text/javascript">
        var xmlhttp = false;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            try {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (E) {
                xmlhttp = false;
            }
        }
        if (!xmlhttp && typeof XMLHttpRequest !== 'undefined') {
            xmlhttp = new XMLHttpRequest();
        }
        function patientSearch(patientInfo)
        {
            if (patientInfo) {
                serverPage = '<?php echo base_url(); ?>evis_patient/search_patient/' + patientInfo;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function ()
                {
                    document.getElementById('patient_search').innerHTML = xmlhttp.responseText;
                };
                xmlhttp.send(null);
            }
        }
    </script>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="input-group col-md-6">
                    <input type="text" onkeyup="patientSearch(this.value)" class="form-control input-lg" placeholder="Search Admission ID Or Patient Name" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
                <h3 style="color:green">
                    <?php
                    $msg = $this->session->userdata('edit_patient');
                    if (isset($msg)) {
                        echo $msg;
                        $this->session->unset_userdata('edit_patient');
                    }
                    ?>
                </h3>
            </div>
            <div class="box-body">
                <table id="patient_search" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Admission ID</th>
                            <th>Patient Name</th>
                            <th>Legal Guardian</th>
                            <th>Contact Number</th>
                            <th class="btn-danger">Patient Due</th>
                            <th>Admission Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($all_patient as $v_patient) {
                            ?>
                            <tr>
                                <td><?php echo $v_patient->patient_admission_id; ?></td>
                                <td><?php echo $v_patient->patient_name; ?></td>
                                <td><?php echo $v_patient->patient_legal_guardian; ?></td>
                                <td><?php echo $v_patient->patient_contact_mobile_1; ?></td>
                                <td class="btn-danger"><?php echo $v_patient->patient_due; ?></td>
                                <td><?php echo $v_patient->patient_admission_date; ?></td>
                                <td>
                                    <span class="btn-success">
                                        <?php
                                        if ($v_patient->patient_status == '1') {
                                            echo 'Active';
                                        }
                                        ?> 
                                    </span>
                                    <span class="btn-danger">
                                        <?php
                                        if ($v_patient->patient_status == 0) {
                                            echo 'Inactive';
                                        }
                                        ?>   
                                    </span>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>evis_patient/payment_history/<?php echo $v_patient->patient_id; ?>" class="btn btn-warning" data-toggle="tooltip" title="View Payment History"><i class="fa fa-money"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_patient/download_patient_preview/<?php echo $v_patient->patient_id; ?>" class="btn btn-success" data-toggle="tooltip" title="Download Patient Form"><i class="fa fa-download"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_patient/edit_patient/<?php echo $v_patient->patient_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Patient"><i class="fa fa-pencil-square-o"></i></a>
                                    <a href="<?php echo base_url(); ?>evis_patient/delete_patient/<?php echo $v_patient->patient_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Patient" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>