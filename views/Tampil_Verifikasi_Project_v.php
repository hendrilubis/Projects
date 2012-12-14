Verifikasi Project

<?php echo form_open('projects/tambah_project'); ?>

<?php
//menampilkan data
	echo "title: ".$title."<br/>";
	echo "no kategori: ".$category_id."<br/>";
	echo "deskripsi: ".$description."<br/>";
	echo "budget: ".$budget."<br/>";
	echo "date expired: ".$date_expired."<br/>";
	echo "data update: ".$date_updated."<br/>";
//untuk menerima data dari halaman sebelumnya
	echo form_hidden('title',$title);
	echo form_hidden('category_id',$category_id);
	echo form_hidden('description',$description);
	echo form_hidden('budget',$budget);
	echo form_hidden('date_expired',$date_expired);
	echo form_hidden('date_updated',$date_updated);

?>

<input type="submit" id="submitProject2" value="Lanjut!">

<?php echo form_close(); ?>