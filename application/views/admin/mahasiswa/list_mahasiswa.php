<table id="load_more" style="font-size: 10px; font-weight: bold;" class="table table-bordered">
    <tr class="well">
        <td width="10px"> <?php $data = array(
    'name'        => 'check_all',
    'id'          => 'check_all',
    'value'       => 1,
    'checked'     => FALSE,
     );

echo form_checkbox($data); ?> </td>
        <td width="30px">NO.</td>
        <td width="50px">NIM</td>
        
        <td width="300px">NAMA</td>
        <td width="150px">FAK /JURUSAN</td>
        <td width="10px">Foto</td>
        <td width="50px">JENIS KELAMIN</td>
        <td width="50px">Action</td>

    </tr>
    
    <script>
$('#check_all').click(function(){
    if($(this).attr('checked')){
        $('input:checkbox').attr('checked',false);
    }
    else{
        $('input:checkbox').attr('checked',true);
    }
    
});
    </script>
    
    
    <?php 

    
    foreach ($mst_mahasiswas as $mst_mahasiswa) { ?>
        <tr class="urut" id="<?php echo $mst_mahasiswa['urut'];?>">
            
            <td><?php echo form_checkbox('id[]', $this->aesfunction->paramEncrypt($mst_mahasiswa['id']));?></td>
            
            <td><?php echo $no;?></td>
            
            <td><?php echo $mst_mahasiswa['id'];?></td>
              <td style="text-transform: uppercase" ><?php echo $mst_mahasiswa['nama']; ?></td>
            <td><?php echo $mst_mahasiswa['fakultas'].' /'.$mst_mahasiswa['jurusan']; ?></td>
           
           
           
             
                
                <?php
                $this->db->where('mst_mahasiswa_id', $mst_mahasiswa['id']);
                $this->db->where('aktif', 1);
                $q = $this->db->get('mst_foto');
                if($q->num_rows() <= 0){
                    //jika foto kosong
                    $status_foto = 0;
                echo '<td style="background-color: #FF6C6C"> <i class="icon-remove"></i>';
                    
                }else{
                    //foto ada
                    $status_foto = 1;
                    echo '<td style="background-color: #7EE299"> <i class="icon-ok"></i>';
                }
                
                ?>

            </td>
           
            
            <td><?php echo $mst_mahasiswa['jenis_kelamin']; ?></td>

            
            <td>
                <a style="display:none" rel="tooltip" title="edit" href="<?php echo site_url().'/admin/mst_mahasiswa/form_update/'.$this->aesfunction->paramEncrypt($mst_mahasiswa['id']);?>" > 
                <i class="icon-pencil"> </i>
                </a>
             
               
               <a onClick="load_profil('<?php echo $this->aesfunction->paramEncrypt($mst_mahasiswa['id']);?>')" id="<?php echo $this->aesfunction->paramEncrypt($mst_mahasiswa['id']);?>" rel="tooltip" title="view" >
               <i class="icon-th-large"></i>  </a>
               
               <span class="no" id="<?php echo $no?>">  </span>
                <i rel='tooltip' title='view data pembayaran' id='view_pembayaran<?php echo $this->aesfunction->paramEncrypt($mst_mahasiswa['id']);?>' class='icon-list' style='cursor:pointer'></i>
  <script type="text/javascript">
$('#view_pembayaran<?php echo $this->aesfunction->paramEncrypt($mst_mahasiswa["id"]);?>').click(function(){
  $('#myModal').modal('show');
  $('.modal-body').load('<?php echo base_url();?>index.php/admin/mst_mahasiswa/view_pembayaran_home/<?php echo $mst_mahasiswa["id"]?>')
})
  </script>

 
         </tr>
<?php
$no++;

} ?>
</table>