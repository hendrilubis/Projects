function tambahItem(idTabel)
{
	var idtabel = document.getElementById(idTabel);
	var isi = document.getElementById('isi').value;
	var isikedua = document.getElementById('isikedua').value;
	var jumBaris = idtabel.rows.length;
	var baris = idtabel.insertRow(jumBaris);
	
	var kolom1 = baris.insertCell(0);
	kolom1.innerHTML = '<input type="text" name="text1[]" value="'+isi+'" readonly=readonly style="background-color:white;border:none" />'; 
	document.getElementById('isi').value = '';

	var kolom2 = baris.insertCell(1);
	kolom2.innerHTML = '<input type="text" name="text1[]" value="'+isikedua+'" readonly=readonly style="background-color:white;border:none" />'; 
	document.getElementById('isikedua').value = '';

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