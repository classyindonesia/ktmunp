    <ul class="nav nav-tabs">
    <li <?php if(isset($index))echo $index;?> ><?php echo anchor('admin/mst_mahasiswa/index', 'List Mahasiswa');?></li>
    <li <?php if(isset($pencarian))echo $pencarian;?> ><?php echo anchor('admin/mst_mahasiswa/pencarian', 'Pencarian');?></li>
    <li <?php if(isset($batch))echo $batch;?> ><?php echo anchor('admin/mst_mahasiswa/batch', 'Batch');?></li>
    <li <?php if(isset($jurusan_nav))echo $jurusan_nav;?> ><?php echo anchor('admin/mst_jurusan', 'Jurusan');?></li>
    <li <?php if(isset($fakultas))echo $fakultas;?> ><?php echo anchor('admin/mst_fakultas', 'Fakultas');?></li>
    <li <?php if(isset($import))echo $import;?> ><?php echo anchor('admin/import', 'Import Data');?></li>
    <li <?php if(isset($pencarian2))echo $pencarian2;?> ><?php echo anchor('admin/mst_mahasiswa/pencarian2', 'Pencarian 2');?></li>
    
    </ul>