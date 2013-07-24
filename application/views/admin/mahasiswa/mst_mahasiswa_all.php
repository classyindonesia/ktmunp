

<?php


$this->load->view('admin/mahasiswa/tab_menu');

?>



<table class="table" style="margin-bottom: -3em;"> 
    <tr>
        <td width="100">
<input style="margin-bottom: 3em;" class="btn btn-info" type="button" id="cetak_ktm" value="export" /> 
        </td>
        <td width="100">
             <?php echo form_dropdown("masa_berlaku", $masa_berlaku, "", 'class="input_form" id="batch_id"');?> 

        </td>
        <td><?php echo anchor('admin/mst_mahasiswa/add','<i class="icon-plus-sign"></i> add', 'class="pull-right btn btn-info"');?></td>
    </tr>
</table>

<script>
    
function st(ip) {
  var str = ip;
  return str.replace(",","-");
}



function ambil_checkbox(){
        var val=[];
        $(':checkbox:checked').each(function(i){
            val = val+$(this).val()+'-';
        });
    return val.toString();
}


    
$('#cetak_ktm').click(function(){
        batch_id = $('#batch_id').val();
        if(batch_id == '0'){
            alert('masa berlaku blm ditentukan');
            return false;
        }
        
        
       var nim =  st(ambil_checkbox());
    if(nim != ''){
        window.location.href = "<?php echo site_url('admin/mst_mahasiswa/cetak');?>/"+nim+'/'+batch_id;
    }else{
        alert('anda blm memilih mahasiswa');
    }

})



</script>





<script type="text/javascript" src="<?php echo base_url();?>includes/js/webcam.js"></script>


<!-- Button to trigger modal -->
      
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
        
     <div class="modal-body">
        
      <div id="modal-body1">  
        <div id="loading_profil">
       <img src="<?php echo base_url()?>includes/img/ajax-loader.gif" />
        </div>
<!--    <p>One fine body…</p>-->
    </div>
 <div  class="span8"  style="display:none;" id="ambil_gambar">
 
<table>
    <tr><td>
<script type="text/javascript">
   // $('#webcam_capture').flash('<?php echo base_url()?>includes/js/webcam.swf');
    document.write( webcam.get_html(250, 313) );
</script> </td>
       <td width="300px">
	<input class="btn btn-success" type=button value="Configure" onClick="webcam.configure()">
        <input class="btn btn-success" type=button value="Reset Kamera" onClick="webcam.reset()">
</td>
</table>

        </div>         
    </div>
        

 
    </div>



    
    <script>
        
//        function klik_profil(msg){
//            if(msg == 0){
//                //jika blm ada foto
//                $('#ambil_gambar').fadeIn();
//             }else{
//                //jika sudah ada foto
//                //sembunyikan webcam                 
//                $('#ambil_gambar').hide();
//            }
//           // alert('oke');
//        }
//        
        
        
    function load_profil(id,msg){
        
      // $('#myModal').modal('show');
       
    $('#myModal').modal({
    backdrop: true,
    keyboard: true
}).css({
    width: 'auto',
    'margin-left': function () {
        return -($(this).width() / 2);
    }
});


    
   $('#modal-body1').load('<?php echo site_url("admin/mst_mahasiswa/view_profil");?>/'+escape(id));
  
  //alert('<?php echo site_url("admin/mst_mahasiswa/view_profil");?>/'+escape(id));
  
    }
    
    
    
    
    $('#myModal').on('hidden', function () {
    // do something on hidden
   // location.reload();
   
no = $('.no:last').attr("id"); // get last query id
urut = $('.urut:first').attr("id"); // get last query id
urut_akhir = $('.urut:last').attr("id");   
  form_data = {
    no : no,
    reload : 1,
    urut : urut,
    urut_akhir : urut_akhir
}

    $.ajax({
       url : "<?php echo site_url('admin/mst_mahasiswa/reload_tabel')?>",
       type : 'post',
       data : form_data,
       success:function(sukses){
           $("#load_more > tbody").html(sukses);
       }
       
    });

    })
    </script>





 


 <?php echo form_open('admin/mst_mahasiswa/delete');?>

<hr>

<?php 
    $uri = $this->uri->segment(4);
    if($uri == NULL){
    $data['no']=1;
    }else{
        $data['no']=$uri;
    }
    

 
  echo '<div  id="konten">';
    
$this->load->view('admin/mahasiswa/list_mahasiswa', $data).'</div>';
?>






<?php  // echo $pagination;

$jml = 100; //jumlah per halaman, hingga muncul tombol next


    if($uri == NULL){
    $offset = 0;
    }else{
        $offset = $jml + $uri;
    }
 

if($offset != 0){
echo anchor('admin/mst_mahasiswa/index/'.$offset, 'next page', 'style="color: white;display:none" class="btn btn-info link_next" id="'.$offset.'"');
}else{
 echo anchor('admin/mst_mahasiswa/index/101', 'next page', 'style="color: white;display:none" class="link_next btn btn-info" id="100"');
}
?>






















<button class="btn btn-success" id="tombol_load_more" >load more</button>
<img style="display:none" id="loading_loadmore" src="<?php echo base_url();?>includes/img/ajax-loader.gif" />

<script>
$('#tombol_load_more').click(function(){
$('#tombol_load_more').attr('disabled', 'disabled');
$('#loading_loadmore').show();

no = $('.no:last').attr("id"); // get last query id
id = $('.urut:last').attr("id"); // get last query id

form_data = {
    no : no,
    load_more : 1,
    id : id
}

    $.ajax({
       url : "<?php echo site_url('admin/mst_mahasiswa/load_more')?>",
       type : 'post',
       data : form_data,
       success:function(sukses){
           if(sukses == 0){
           $('#tombol_load_more').attr('disabled', 'disabled');
           $('#loading_loadmore').fadeOut();
           }else{
           $("#load_more > tbody:last").append(sukses);
           $('#tombol_load_more').removeAttr('disabled');
           }
           
       }
       
    });



return false;
})
</script>




<br>
<input style="float: right" class="btn btn-danger" type="submit" value="delete" onclick="return confirm('are you sure ?');">

<?php echo form_close();?>