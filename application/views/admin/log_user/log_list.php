<table class="table table-bordered">
    <tr>
        <td>id</td>
        <td>ket</td>
        <td>tgl</td>
        <td>Jam</td>
    </tr>
    <?php foreach ($log_users as $log_user) { ?>
        <tr>
            <td>-</td>
            <td><?php echo $log_user['ket']; ?></td>
            <td><?php echo $this->fungsi->date_to_tgl(date("Y-m-d", strtotime($log_user['tgl'])));?></td>
            <td><?php echo date("H:i:s", strtotime($log_user['tgl']));?></td>
        </tr>
<?php } ?>
</table>
<?php echo $pagination; ?>