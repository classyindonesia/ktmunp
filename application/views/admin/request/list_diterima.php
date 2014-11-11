<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">List KTM</h3>
</div>
<div class="modal-body">
 
</div>
 
</div>

<table class="table" >
    <tr> 
<td>
<div id="kantong"  class="alert alert-info" > 
    <?php 
$item = $this->cart->total_items();
    if($item > 0){
echo 'ada <b style="font-size: 20px;">'.$item.'</b> antrian yg hendak di cetak'; 
    }else{
        echo 'tidak ada antrian cetak';
    }
?>
</div>
    <button id="view_cetak" class="btn btn-info pull-right"> <i class="icon-file"></i> view </button>
    <button id="hapus_cetak" class="btn btn-danger pull-right"> <i class="icon-refresh"></i> clear</button>
    <button id="checkout_kantong" class="btn btn-info pull-right"> <i class="icon-download-alt"></i> download</button>
    <button id="checkout_kantong2" class="btn btn-info pull-right"> <i class="icon-download-alt"></i> download 2</button>
</td>
</tr>
<td colspan="2">
    <?php echo form_dropdown("masa_berlaku", $masa_berlaku, "", 'class="input_form pull-right" id="batch_id"');?> 
</td>
<tr>
</tr>


 </table>


<script>
    
    $(document).ready(function(){
        $('#input_search').val('');
    });
    
    
    
    
    $('#view_cetak').click(function(){

        
      form_data = {
          view : 1
      }  
      
      $.ajax({
          url : '<?php echo site_url("admin/mst_mahasiswa/view_kantong");?>',
          data : form_data,
          type : 'post',
          success:function(view){
              if(view == 0){
                  alert('anda belum memilih sama sekali');
                  return false;
              }else{
                   
                  $('#myModal').modal('show');
                  $('.modal-body').load('<?php echo site_url("admin/mst_mahasiswa/view_kantong");?>');
                  
              }
          }
          
      });//end of ajax
        
        return false;
    });//end click function
    
    
    
    function hapus_kantong(){
       form_data={
           update : 1
       }
       
       $.ajax({
           url : '<?php echo site_url("admin/mst_mahasiswa/clear_kantong")?>',
           type : 'post',
           data : form_data,
           success:function(hapus){
                $('#kantong').html('tidak ada antrian cetak');
               
           }
       })        
    }
    
    $('#hapus_cetak').click(function(){
       
        hapus_kantong()
        
    });//end of click function
    
    
    
    $('#checkout_kantong').click(function(){
    
    batch_id = $('#batch_id').val();
    if(batch_id == '0'){
        alert('masa berlaku belum ditentukan');
        return false;
    }
    
    
    form_data={
        check : 1
    }
    $.ajax({
        url : '<?php echo site_url("admin/mst_mahasiswa/cetak_kantong")?>',
        data : form_data,
        type : 'post',
        success:function(check){
            if(check > 0){
                window.open('<?php echo site_url("admin/mst_mahasiswa/cetak_kantong")?>/'+batch_id, '_blank');
               // hapus_kantong();    
               //location.reload();
            }else{
                alert('anda belum memilih sama sekali');
            }
        }
    })

    
    });//end of click function
    
    
    

    $('#checkout_kantong2').click(function(){
    
    batch_id = $('#batch_id').val();
    if(batch_id == '0'){
        alert('masa berlaku belum ditentukan');
        return false;
    }
    
    
    form_data={
        check : 1
    }
    $.ajax({
        url : '<?php echo site_url("admin/mst_mahasiswa/cetak_kantong2")?>',
        data : form_data,
        type : 'post',
        success:function(check){
            if(check > 0){
                window.open('<?php echo site_url("admin/mst_mahasiswa/cetak_kantong2")?>/'+batch_id, '_blank');
               // hapus_kantong();    
               //location.reload();
            }else{
                alert('anda belum memilih sama sekali');
            }
        }
    })

    
    });//end of click function




    
       function update_kantong(id_mahasiswa){
 
    
    form_data = {
        update : 1,
        id_mahasiswa : id_mahasiswa
    }

    $.ajax({
        url : '<?php echo site_url("admin/mst_mahasiswa/update_kantong")?>',
        data : form_data,
        type : 'post',
        success:function(sukses){
            $('#kantong').html(sukses);
            
        }
        
        
    });//end of ajax
    return false;   
   } //end of function
    
    
         
   

</script>


<!-- Button to trigger modal -->
      
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
        
     <div class="modal-body">
        <div id="modal-body1">
          <div id="loading_profil">
              <img src="<?php echo base_url()?>includes/img/ajax-loader.gif" />
        </div></div>
<!--    <p>One fine body…</p>-->
     
    </div>
        

 
    </div>
    
    
    <script>
    function load_profil(id,msg){
    $('#myModal').modal({
    backdrop: true,
    keyboard: true
});


    
   $('.modal-body').load('<?php echo site_url("admin/mst_mahasiswa/view_profil");?>/'+escape(id));

    }        
        
   </script>







<table class="table table-bordered">
    <tr class="well">
        <td width="200">NIM</td>
        <td width="300">Nama</td>
        <td>Tgl Request</td>
        <td>Jam</td>
        <td>Status Request</td>
        <td width="50px">Action</td>
     </tr>
    
    
    <?php
    if(!empty($list_request)){
        $no=1;
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
        
        
        
        
            <td>


                
               <a  id="mhs<?php echo $this->aesfunction->paramEncrypt($list['mst_mahasiswa_id']);?>" href="#" title="view" >
               <i class="icon-plus-sign"></i>  </a>
               
               <span class="no" id="<?php echo $no?>">  </span>
               <i onClick="load_profil('<?php echo  $this->aesfunction->paramEncrypt($list['mst_mahasiswa_id']);?>')" class="icon-edit"></i>
</td>        
        
        
        
        

    </tr>
    
    <script>
        $(document).ready(function(){
            
            
            
   $('#mhs<?php echo $this->aesfunction->paramEncrypt($list['mst_mahasiswa_id']);?>').click(function(){
     id_mahasiswa = "<?php echo $this->aesfunction->paramEncrypt($list['mst_mahasiswa_id']);?>";
      update_kantong(id_mahasiswa);
  });   
            
            
            
            
            
            
            
            
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
            $no++;
        }
    }
    ?>
    

    
    
    
    
</table>

