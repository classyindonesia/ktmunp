 
<img style="display:none" id="loading" class="pull-right" src="<?php echo base_url();?>includes/img/ajax-loader.gif" />

<span style="padding: 3px;display: none" id="sukses" class="pull-right  alert-success"> saved ! </span>


<ul class="nav nav-tabs">
    
    <li <?php if(isset($template_depan)) echo $template_depan; ?>> <?php echo anchor('admin/template_ktm/index', 'template depan')?> </li>
    <li <?php if(isset($template_belakang)) echo $template_belakang; ?>> <?php echo anchor('admin/template_ktm/form_template_belakang', 'template belakang')?></li>
    <li <?php if(isset($logo)) echo $logo; ?>> <?php echo anchor('admin/template_ktm/form_logo', 'logo')?></li>
    <li <?php if(isset($data_kampus)) echo $data_kampus; ?>> <?php echo anchor('admin/template_ktm/form_data_kampus', 'data kampus')?></li>
    </ul>
