<table class="table table-bordered">
    <tr class="well">
        <td>Masa Berlaku</td>
        <td>Keterangan</td>
        <td>Jml Mahasiswa</td>
        <td>action</td>
    </tr>
    <?php
    foreach($mst_batch as $list){
    ?>
    
    <tr>
        
        
        <?php
        if($list['tampil_keterangan'] == 1){
           ?> 
             <td colspan="2" style="text-align: center;" ><?php echo $list['keterangan'];?></td>
            <?php
        }else{
        ?>
        
        <td ><?php echo $this->fungsi->date_to_tgl($list['tgl_aktif']);?></td>
        <td width="500"><?php echo $list['keterangan'];?></td>
        <?php
        }
        ?>
        
        
        <td width="100">
            <?php
            $this->db->where('mst_batch_id', $list['id']);
            $jml = $this->db->count_all_results('mst_batches_mahasiswa');
            if($jml == 0){
                echo 'kosong';
            }else{
            echo $jml.' mhs';
            }
            ?>
        </td>
        <td  width="100">
           <button onClick="export_batch(<?php echo $list['id'];?>)"  class="btn btn-success"> export </button>
        </td>
    </tr>
    <?php
    }
    ?>
    
</table>

<script>

function export_batch(batch_id){
    
    window.open('<?php echo site_url("admin/mst_mahasiswa/cetak_batch/")?>/'+batch_id, '_blank');
    
}

</script>


<br>
<?php
echo $pagination;
?>