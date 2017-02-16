<form action="admin.php?page=step_by_step_control_guest_book_menu&action=update_data" method="post">
<input type="text" name="user_name" value="<?php echo $data['user_name']; ?>">
<textarea name="message">
	<?php echo $data['message']; ?>
</textarea>
<input type="hidden" name="id" value="<?php echo $data['id']; ?>">

<input type="submit" name="<?php _e('Add', STEPBYSTEP_PlUGIN_TEXTDOMAIN ); ?>">
</form>