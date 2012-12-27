<?php foreach ($project as $item) {?>
        Nama Project = <?php echo $item->title; ?> <br/>
        Kategori = <?php echo $item->category_name; ?> <br/>
        Date Expired = <?php echo $item->date_expired; ?><br/>
        <br/>
<?php } ?>

<table border="1">
        <tr>
                <th align="center" width ="150px" height="50px">Nama Bidder</th>
                <th align="center" width ="300px">Tawaran</th>
                <th align="center" width ="200px">Date Expired</th>
                <th align="center" width ="200px">Skill</th>
                <th align="center" width ="100px">Rating</th>
                <th align="center" width ="100px">Pilihan</th>
        </tr>
<?php foreach ($bidder as $item2) {?>
        <tr>
        <td align="center" height="50px"><a href="#"><?php echo $item2->username; ?></a></td>
        <td align="center"><?php echo $item2->price_offer_bid; ?></td>
        <td align="center"><?php echo $item2->deadline_bid; ?></td>
        <td align="center"><?php echo $item2->skill; ?></td>
        <td align="center"><?php echo $item2->rating; ?></td>
        <td align="center"><a href="#">Pilih</a></td>
        </tr>
<?php } ?>
</table>