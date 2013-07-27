<ul class="nav nav-tabs">
    
    <li <?php if(isset($user)) echo $user;?>> <?php echo anchor('admin/user', 'list user');?></li>
    
    <li <?php if(isset($add_user)) echo $add_user;?>> <?php echo anchor('admin/user/add', 'add user');?></li>
     </ul>