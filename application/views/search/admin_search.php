<thead>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
</thead>
<tbody>
    <?php
    foreach ($search_admin as $v_admin) {
        ?>
        <tr>
            <td><?php echo $v_admin->admin_name; ?></td>
            <td><?php echo $v_admin->admin_email; ?></td>
            <td>
                <a href="<?php echo base_url(); ?>evis_app/edit_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-primary" data-toggle="tooltip" title="Edit Admin"><i class="fa fa-pencil-square-o"></i></a>
                <a href="<?php echo base_url(); ?>evis_app/delete_admin/<?php echo $v_admin->admin_id; ?>" class="btn btn-danger" data-toggle="tooltip" title="Delete Admin" onclick="return check_delete();"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php
    }
    ?>
</tbody>