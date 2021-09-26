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
    foreach ($search_patient as $v_patient) {
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