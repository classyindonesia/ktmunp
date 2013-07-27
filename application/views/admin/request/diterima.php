
<span class="pull-right">
<?php $this->load->view('admin/request/search_diterima');?>
</span>
<h4>List Request</h4>
<hr>




<?php 

$this->load->view('admin/request/nav_atas');

echo '<div id="konten">';
$this->load->view('admin/request/list_diterima').'</div>';

?>



<?php echo $pagination;?>