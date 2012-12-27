<h1>Daftar Project</h1>
<?php echo form_open('projects/search_project'); ?>
Search:<input type="text" name="keyword">
<input type="submit" name="search" value="search">    <a href="#">Advanced Search</a>
<?php echo form_close(); ?>
<table border = '1'>
	<tr bgcolor=#eeeeee>
		<th align="center" width="50px">No</th>
		<th align="center" width="250px" height="50px">Nama Project</th>
		<th align="center" width="200px">Deskripsi</th>
		<th align="center" width="200px">Budget</th>
		<th align="center" width="200px">Date Expired</th>
		<th align="center" width="100px">Keterangan</th>
	</tr>
<?php $i = 1; foreach ($project as $item) {?>
        <tr>
        <td align="center" height="50px"><?php echo $i?></td>
        <td align="center" bgcolor=#eeeeee><?php echo $item->title; ?></td> 
        <td align="center"><?php echo $item->description; ?></td> 
        <td align="center" bgcolor=#eeeeee><?php echo $item->budget; ?></td>
        <td align="center"><?php echo $item->date_expired; ?></td>
        <td align="center" bgcolor=#eeeeee><a href="<?php echo site_url('Projects/tampil_selected_project/'.$item->project_id) ?>">Details</a></td>
        </tr>
      <?php $i++; } ?>
</table>
<?php echo $this->pagination->create_links(); ?>