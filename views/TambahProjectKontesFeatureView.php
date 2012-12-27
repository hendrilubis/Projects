Project Kontes
<?php echo form_open('projects/VerifikasiProject'); ?>

<?php

//fungsi-fungsi form hidden untuk menerima data dari masukkan sebelumnya
echo form_hidden('title',$title);
echo form_hidden('category_id',$category_id);
echo form_hidden('description',$description);
echo form_hidden('budget',$budget);
echo form_hidden('date_expired',$date_expired);
echo form_hidden('date_updated',$date_updated);

?>

	<input type="checkbox" name="Fitur1" value="1">
      Saya ingin Project ini terdaftar sebagai Project yang disertai Fitur. Project yang disertai
      Fitur akan dibuat lebih menarik, sehingga Kualitas hasil biddingnya akan lebih baik pula.
      Project akan ditampilkan secara mencolok di halaman Beranda.
      , Harga : Rp.19.000<br>
      <input type="checkbox" name="Fitur2" value="2">
      Saya ingin Project ini ditandai sebagai Project Urgent. Project tersebut akan mendapatkan tanggapan
      yang lebih cepat dari para FreeLancer, bahkan project anda dapat dimulai dalam jangka waktu 24 jam!
      , Harga : Rp.19.000<br>
      <input type="checkbox" name="Fitur3" value="3">
      Saya ingin menyembunyikan rincian project pada Search Engine dan User yang belum melakukan Log in. 
      Fitur ini direkomendasikan untuk project-project yang harus dirahasiakan.
      , Harga : Rp.49.000<br>
      <input type="checkbox" name="Fitur4" value="4">
      Project ini dipublikasikan untuk merekrut orang-orang dengan berbasiskan komisi(Contohnya Sales). 
      Tak ada gaji tambahan untuk employer atau worker, termasuk Komisi project.
      , Harga : Rp.95.000<br>
      <input type="checkbox" name="Fitur5" value="5">
      I want Freelancers to digitally sign a Non-Disclosure Agreement before placing a bid. 
      Freelancers agree to keep details discussed through private messages and files confidential
      , Harga : Rp.95.000<br>
      <input type="checkbox" name="Fitur6" value="6">
      Saya ingin proses seleksi yang dilakukan terhadap Employer berupa Online dan Offline.
      , Harga : Rp.-<br>
      <input type="checkbox" name="Fitur7" value="7">
      Saya ingin para bidder project ini adalah bidder yang terverifikasi.
      , Harga : Rp.15.000<br>

<input type="submit" id="submitProject2" value="Continue">

<?php echo form_close(); ?>