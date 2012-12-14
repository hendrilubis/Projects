<head>
<script type="text/javascript">
function tambahItem(idTabel)
{
      var idtabel = document.getElementById(idTabel);
      var nama_dokumen = document.getElementById('nama_dokumen').value;
      var ekstensi = document.getElementById('ekstensi').value;
      var jumBaris = idtabel.rows.length;
      var baris = idtabel.insertRow(jumBaris);
      
      var kolom1 = baris.insertCell(0);
      kolom1.innerHTML = '<input type="text" name="text1[]" value="'+nama_dokumen+'" readonly=readonly style="background-color:white;border:none" />'; 
      document.getElementById('nama_dokumen').value = '';

      var kolom2 = baris.insertCell(1);
      kolom2.innerHTML = '<input type="text" name="text2[]" value=".'+ekstensi+'" readonly=readonly style="background-color:white;border:none" />'; 
      document.getElementById('ekstensi').value = '';

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

</script>

<?php echo form_open('projects/tampil_verifikasi_project'); ?>
<?php

//fungsi-fungsi form hidden untuk menerima data dari masukkan sebelumnya
echo form_hidden('title',$title);
echo form_hidden('category_id',$category_id);
echo form_hidden('description',$description);
echo form_hidden('budget',$budget);
echo form_hidden('date_expired',$date_expired);
echo form_hidden('date_updated',$date_updated);

?>

Dokumen yang harus disertakan<br/>
      Nama Dokumen: <input type="text" name="nama_dokumen" id="nama_dokumen" value="" />
      .<input type="text" name="ekstensi" id="ekstensi" value="" />
      <input type="button" value="+" onclick="tambahItem('tabelku')" />
      <table id="tabelku" border="0">
      </table>
      <br/>

<input type="submit" id="submitProject2" value="Lanjut!">

<?php echo form_close(); ?>