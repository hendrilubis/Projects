<h1>Verifikasi Project</h1>

<?php

	echo $title;
	echo $category_id;
	echo $description;
	echo $budget;
	echo $date_expired;
	echo $date_updated;

?>

<?php echo form_open('projects/tampil_project'); ?>

<input type="submit" id="submitProject2" value="Lanjut!">

<?php echo form_close(); ?>