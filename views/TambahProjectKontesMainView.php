Project Kontes
<?php echo form_open('projects/TambahProject/'.$type_id.'/3'); ?>
Title<br/>
<?php echo form_input('title',''); ?>
<br/>
Kategori<br/>
<?php 

$options = array(
                  '1' => 'IT dan PROGRAMMING',
                  '2' => 'PENULISAN',
                  '3' => 'DESIGN dan MULTIMEDIA',
                  '4' => 'SALES dan MARKETING',
                  '5' => 'ADMIN',
                  '6' => 'ENGINEERING',
                  '7' => 'FINANCE DAN MANAGEMENT',
                  '8' => 'LEGAL',
                  '9' => 'NON-CATEGORY'
                );

echo form_dropdown('category_id', $options, '9');
?><br/>
Deskripsi<br/>
	<?php echo form_textarea('description',''); ?><br/>

Skill yang dibutuhkan<br/>
<?php echo form_input('skill',''); ?>
<br/>

<?php echo form_hidden('budget','5.000.000'); ?>
Price : Rp. 5.000.000,00<br/>
<br/>

<?php
      $time = time() + (7*24*3600);
      $tahun = "%Y";
      $dataTahun = mdate($tahun,$time);
      echo form_hidden('tahun',$dataTahun);
?>

<?php
      $bulan = "%m";
      $dataBulan = mdate($bulan,$time);
      echo form_hidden('bulan',$dataBulan);
?>

<?php
      $tanggal = "%d";
      $dataTanggal = mdate($tanggal,$time);
      echo form_hidden('tanggal',$dataTanggal);
?>

<input type="submit" name="submit" value="continue">

<?php echo form_close(); ?>