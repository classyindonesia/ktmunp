
<table class="table table-bordered">
    <tr class="well">
        <td width="200">NIM</td>
        <td width="300">Nama</td>
        <td>Tgl Request</td>
        <td>Jam</td>
        <td>Status Request</td>
     </tr>
    
    
    <?php
    if(!empty($list_request)){
        foreach($list_request as $list){
            
            ?>
            
        
    
    
    
        <tr id="row_request<?php echo $list['id'];?>">
        <td><?php echo $list['mst_mahasiswa_id'];?></td>
        <td><?php echo $list['nama'];?></td>
        <td><?php
        $op = explode(" ",$list['op']);
        
        
        echo $this->fungsi->date_to_tgl($list['tgl']);?></td>
        <td><?php echo $op[2];?></td>
        <?php
        $status = $list['aktif'];
        if($status == 1){
            $status = '<span style="background-color: green">approved</span>';
        }elseif($status == 2){
            $status = '<span style="background-color: yellow">pending</span>';
        }elseif($status == 3){
            $status='<span style="background-color: red">ditolak</span>';
        }
        ?>
        <td><?php echo $status;?></td>

    </tr>
    
    <script>
        $(document).ready(function(){
            $('#remove<?php echo $list['id'];?>').click(function(){
                $('#remove<?php echo $list['id'];?>').fadeOut();
                $('#loading').show();
                
                form_data ={
                    id : <?php echo $list['id'];?>,
                    del :1
                    
                }
                $.ajax({
                    url : "<?php echo site_url('admin/request/tolak_request');?>",
                    data : form_data,
                    type : 'post',
                    success:function(sukses){
                     $('#row_request<?php echo $list['id'];?>').fadeOut();  
                     $('#loading').fadeOut();
                    }
                })
            });//click







            $('#terima<?php echo $list['id'];?>').click(function(){
                $('#terima<?php echo $list['id'];?>').fadeOut();
                $('#remove<?php echo $list['id'];?>').fadeOut();
                $('#loading').show();
                
                form_data ={
                    id : <?php echo $list['id'];?>,
                    del :1
                    
                }
                $.ajax({
                    url : "<?php echo site_url('admin/request/terima_request');?>",
                    data : form_data,
                    type : 'post',
                    success:function(sukses){
                     $('#row_request<?php echo $list['id'];?>').fadeOut();  
                     $('#loading').fadeOut();
                    }
                })
            });//click
            




            
            
        });//ready
    </script>
    
            
            <?php
        }
    }
    ?>
    

    
    
    
    
</table>


<?php echo $pagination;?>