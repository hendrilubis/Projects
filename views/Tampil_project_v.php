<?php foreach ($project as $item) {?>
        
        Nama Project = <?php echo $item->title; ?> <br/>
        Deskripsi = <?php echo $item->description; ?> <br/>
        Budget = <?php echo $item->budget; ?><br/>
        Date Expired = <?php echo $item->date_expired; ?><br/>
        <br/>
      <?php } ?>
      <?php echo $this->pagination->create_links(); ?>
      