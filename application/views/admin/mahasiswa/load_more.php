
  <?php 
  $no = $this->input->post('no')+1;
  foreach ($mst_mahasiswas as $mst_mahasiswa) { ?>
        <tr class="urut" id="<?php echo $mst_mahasiswa['urut'];?>">
            
            <td><?php echo form_checkbox('id[]', $this->aesfunction->paramEncrypt($mst_mahasiswa['id'])); ?></td>
            
            <td width="30px"><?php echo $no;?></td>
            
            <td><?php echo $mst_mahasiswa['id'];?></td>
              <td style="text-transform: uppercase" ><?php echo $mst_mahasiswa['nama']; ?></td>
            <td><?php echo $mst_mahasiswa['fakultas'].' /'.$mst_mahasiswa['jurusan']; ?></td>
           
           
           
                <?php
                $this->db->where('mst_mahasiswa_id', $mst_mahasiswa['id']);
                $this->db->where('aktif', 1);
                $q = $this->db->get('mst_foto');
                if($q->num_rows() <= 0){
                    //jika foto kosong
                echo '<td style="background-color: #FF6C6C"> <i class="icon-remove"></i>';
                    
                }else{
                    //foto ada
                    echo '<td style="background-color: #7EE299"> <i class="icon-ok"></i>';
                }
                
                ?>

            </td>
            
            </td>
            <td><?php echo $mst_mahasiswa['jenis_kelamin']; ?></td>

            
            <td>
                <a style="display:none" rel="tooltip" title="edit" href="<?php echo site_url().'/admin/mst_mahasiswa/form_update/'.$this->aesfunction->paramEncrypt($mst_mahasiswa['id']);?>" > 
                <i class="icon-pencil"> </i>
                </a>
              
               
               <a   onClick="load_profil('<?php echo $this->aesfunction->paramEncrypt($mst_mahasiswa['id']);?>')"    id="<?php echo $this->aesfunction->paramEncrypt($mst_mahasiswa['id']);?>" rel="tooltip" title="view" >
               <i class="icon-th-large"></i>  </a>
               <span class="no" id="<?php echo $no?>">  </span>
         </tr>
<?php

$no++;
} ?>

         
  <script>
             $(document).ready(function(){
                 $('#loading_loadmore').fadeOut();
                 no = $('.no:last').attr("id"); // get last query id
               link_next = $('.link_next').attr("id"); // get link id
               if(Number(no) >= Number(link_next)){
                   $('#tombol_load_more').hide();
                   $('.link_next').fadeIn();
               }
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
           } 
       }
       
    });
 });
             </script>