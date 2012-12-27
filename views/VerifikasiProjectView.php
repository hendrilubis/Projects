<h1>Verifikasi Project</h1>

<?php echo form_open('projects/SimpanProject'); ?>

<table border="0">
	<tr height="40px">
		<td width="100px">Title</td>
		<td width="6px">:</td>
		<td width="300px"><?php echo $title ?></td>
	</tr>
	<tr height="40px">
		<td>No Kategori</td>
		<td>:</td>
		<td><?php echo $category_id ?></td>
	</tr>
	<tr height="40px">
		<td>Deskripsi</td>
		<td>:</td>
		<td width="300px"><?php echo $description ?></td>
	</tr>
	<tr height="40px">
		<td>Budget</td>
		<td>:</td>
		<td><?php echo $budget ?></td>
	</tr>
	<tr height="40px">
		<td>Date Expired</td>
		<td>:</td>
		<td><?php echo $date_expired ?></td>
	</tr>
	<tr height="40px">
		<td>Date Update</td>
		<td>:</td>
		<td><?php echo $date_updated ?></td>
	</tr>
</table>

<?php
//untuk menerima data dari halaman sebelumnya
	echo form_hidden('title',$title);
	echo form_hidden('category_id',$category_id);
	echo form_hidden('description',$description);
	echo form_hidden('budget',$budget);
	echo form_hidden('date_expired',$date_expired);
	echo form_hidden('date_updated',$date_updated);

?>

<input type="submit" id="submitProject2" value="OK">

<?php echo form_close(); ?>