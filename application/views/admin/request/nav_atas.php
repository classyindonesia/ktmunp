
<img style="display:none" id="loading" class="pull-right" src="<?php echo base_url();?>includes/img/ajax-loader.gif"   />
<ul class="nav nav-tabs">
    <li <?php if(isset($request_home)) echo $request_home?>>
   <?php echo anchor('admin/request/', 'Pending');?>
    </li>
    <li <?php if(isset($request_ditolak)) echo $request_ditolak?>>
   <?php echo anchor('admin/request/ditolak/', 'Ditolak');?>
    </li>
    <li <?php if(isset($request_diterima)) echo $request_diterima?>>
   <?php echo anchor('admin/request/diterima/', 'Dalam Proses');?>
    </li>
    </ul>
