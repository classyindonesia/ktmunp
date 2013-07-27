        
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
   <ul class="nav">
     <li <?php if(isset($dashboard)) echo $dashboard;?> ><?php echo anchor('admin/front','Dashboard');?></li>
    <li <?php if(isset($mahasiswa)) echo $mahasiswa ?>><?php echo anchor('admin/mst_mahasiswa','mahasiswa');?></li>
    <li <?php if(isset($template)) echo $template?>><?php echo anchor('admin/template_ktm','template KTM');?></li>
    <li <?php if(isset($log_user)) echo $log_user ?>><?php echo anchor('admin/log_user','log_user');?></li>
      <li <?php if(isset($request)) echo $request ?>><?php echo anchor('admin/request','request');?></li>
  
</ul>  
    
    <ul class="nav pull-right">
            <li class="dropdown" id="menu1">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
    <?php echo $this->session->userdata('username');?>
    <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
    <?php
    $level = $this->session->userdata('ref_level_user_id');
    if($level == 1){
        ?>
        
        <li><?php echo anchor('admin/user/index', '<i class="icon-user"></i> list user');?></li>
    
        <?php
    }
    ?>
    
     
    
    
    <li><?php echo anchor('admin/profil/edit', '<i class=" icon-edit"></i> edit profil');?></li>
    <li class="divider"></li>
   <li><?php echo anchor('admin_login/logout','logout');?></li>
    </ul>
    </li>

     
    </ul>



    </div>
    </div>   