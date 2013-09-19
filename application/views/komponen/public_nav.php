    <ul class="nav nav-tabs">
    <li <?php if(isset($login)) echo $login; ?> >   <?php echo anchor(base_url(), 'Home');?>   </li>
    <li <?php if(isset($perpanjangan)) echo $perpanjangan; ?>><?php echo anchor('request/perpanjangan', 'Perpanjangan');?></li>
    <li style='display:none' <?php if(isset($baru)) echo $baru; ?> ><?php echo anchor('request/buat_baru', 'Buat baru');?></li>
    </ul>