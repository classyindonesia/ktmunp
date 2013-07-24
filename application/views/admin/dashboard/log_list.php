<table class="table-bordered table" style="margin-left: -1.4em">
    <tr class="well">
        <td>Keterangan</td>
        <td>Tgl</td>
        <td>Jam</td>
    </tr>
    
    
    <?php
    foreach($log as $list){
    ?>

    <tr>
        <td><?php echo $list['ket'];?></td>
        <td><?php echo $this->fungsi->date_to_tgl(date("Y-m-d", strtotime($list['tgl'])));?></td>
        <td><?php echo date("H:i:s", strtotime($list['tgl']));?></td>
    </tr>
    
    <?php
    }
    ?>
    
</table>