<a href="admin.php?page=step_by_step_control_guest_book_menu&action=add_data">
    <?php _e('Add', STEPBYSTEP_PlUGIN_TEXTDOMAIN ); ?>
</a>

<table  border="1">
    <thead>
    <tr>
        <td>
            <?php _e('Name', STEPBYSTEP_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Messsage', STEPBYSTEP_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Date', STEPBYSTEP_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Actions', STEPBYSTEP_PlUGIN_TEXTDOMAIN ); ?>
        </td>
    </tr>
    </thead>
    <tbody>
    <?php if(count($data) > 0 && $data !== false){  ?>
        <?php foreach($data as $value): ?>
            <tr class="row table_box">

                <td>
                    <?php echo $value['user_name']; ?>
                </td>
                <td>
                    <?php echo $value['message']; ?>
                </td>
                <td>
                    <?php echo date('d-m-Y H:i', $value['date_add']); ?>
                </td>

                <td>
                    <a href="admin.php?page=step_by_step_control_guest_book_menu&action=edit_data&id=<?php echo $value['id'];?>">
                        <?php _e('Edit', STEPBYSTEP_PlUGIN_TEXTDOMAIN ); ?>
                    </a>
                    <a href="admin.php?page=step_by_step_control_guest_book_menu&action=delete_data&id=<?php echo $value['id'];?>">
                        <?php _e('Delete', STEPBYSTEP_PlUGIN_TEXTDOMAIN ); ?>
                    </a>


                </td>

            </tr>
        <?php endforeach ?>
    <?php }else{ ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    <?php } ?>
    </tbody>
</table>