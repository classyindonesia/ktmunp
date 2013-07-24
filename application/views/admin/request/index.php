<h4>List Request</h4>
<hr>




<?php $this->load->view('admin/request/nav_atas');?>



<table class="table table-bordered">
    <tr class="well">
        <td width="200">NIM</td>
        <td width="300">Nama</td>
        <td>Tgl Request</td>
        <td>Status Request</td>
        <td>Jenis Request</td>
        <td>Action</td>
    </tr>
    
    
    <?php
    if(!empty($list_request)){
        foreach($list_request as $list){
            
            ?>
            
        
    
    
    
        <tr id="row_request<?php echo $list['id'];?>">
        <td><?php echo $list['mst_mahasiswa_id'];?></td>
        <td><?php echo $list['nama'];?></td>
        <td><?php echo $this->fungsi->date_to_tgl($list['tgl']);?></td>
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
        <td><?php if($list['ref_jenis_request_id'] == 2) echo 'buat baru'; else echo 'perpanjangan'; ?></td>
        
        
        <td> <i style="cursor:pointer" id="remove<?php echo $list['id'];?>" class="icon-remove"></i> 
        ||
        <i style="cursor:pointer" id="terima<?php echo $list['id'];?>" class="icon-ok"></i> 
        </td>
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