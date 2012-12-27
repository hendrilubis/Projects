<head>
<script type="text/javascript">
function tambahItem(idTabel)
{
      var idtabel = document.getElementById(idTabel);
      var skill = document.getElementById('skill').value;
      var jumBaris = idtabel.rows.length;
      var baris = idtabel.insertRow(jumBaris);
      
      var kolom1 = baris.insertCell(0);
      kolom1.innerHTML = '<input type="text" name="text1[]" value="'+skill+'" readonly=readonly style="background-color:white;border:none" />'; 
      document.getElementById('skill').value = '';

}

function hapusItem(idTabel)
{
      try{
      var idtabel = document.getElementById(idTabel);
      var jumBaris = idtabel.rows.length;

      idtabel.deleteRow(jumBaris-1);
      jumBaris--;

      }catch(e){
            alert(e);
      }
}
function goFurther(){
      if (document.getElementById("sepakat1").checked == true && document.getElementById("sepakat2").checked == true )
      document.getElementById("submitProject1").disabled = false;
      else
      document.getElementById("submitProject1").disabled = true;
}

</script>
<style type="text/css">
input[disabled]
{
   color:Gray; text-decoration:none;
}

</style>
</head>

<?php echo form_open('projects/jendela_tambah_project_2'); ?>

<h1>Project Baru</h1><br/>

Title<br/>
<?php echo form_input('title',''); ?><?php echo form_error('title'); ?>
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
      <input type="text" name="skill" id="skill" value="" />
      <input type="button" value="+" onclick="tambahItem('tabelku')" />
      <table id="tabelku" border="0">
      </table>
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

Budget<br/>
<?php 

$options = array(
                  '< 5.000.000' => 'Kurang dari Rp. 5.000.000,00',
                  '5.000.000 - 10.000.000' => 'Rp. 5.000.000,00 - Rp. 10.000.000,00',
                  '10.000.000 - 50.000.000' => 'Rp. 10.000.000,00 - Rp. 50.000.000,00',
                  '50.000.000 - 100.000.000' => 'Rp. 50.000.000,00 - Rp. 100.000.000,00',
                  '> 100.000.000' => 'Lebih dari Rp. 100.000.000,00',
                  '-' => 'Tidak Yakin',
                  'Customize Range' => 'Range Sendiri'
                );

echo form_dropdown('budget', $options, '< 5.000.000');

?><br/>

<input type="checkbox" id="sepakat1" onclick="goFurther()">
Saya akan menggunakan iPro Rekening Bersama. [Kami mewajibkan pengguna layanan iPro untuk menggunakan iPro Rekening Bersama. Hal ini ditujukan untuk menghindari penipuan; serta memberikan jaminan uang kembali jika kualitas pekerjaan kontraktor tidak sesuai kualitas dan tidak tepat waktu; serta menengahi jika terjadi sengketa. Hal tersebut kami lakukan untuk menjaga citra iPro sebagai tempat yang aman dan nyaman dalam bertransaksi proyek. Mohon dimaklumi]<br/>

<input type="checkbox" id="sepakat2" onclick="goFurther()">
Saya memahami bahwa posting saya bukanlah junk post (posting sampah adalah posting yang tidak ditindaklanjuti sampai dengan penyelesaian proyek). Segala bentuk pelanggaran akan ditindaklanjuti dalam bentuk peringatan, blacklist ip address, atau banned account secara temporary atau permanen. Hal ini kami lakukan karena junk post merugikan banyak pihak. Mohon dimaklumi<br/>

<input type="submit" id="submitProject1" value="Lanjut!" disabled>

<?php echo form_close(); ?>

