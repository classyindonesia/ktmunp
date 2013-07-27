

<?php
$this->load->view('admin/template_ktm/tab_menu');


$alamat_kampus = $this->fungsi->setup_variable("alamat_kampus");

//value utk heading 1
$style_head1 = $this->fungsi->setup_variable('style_head1');
$value_head1 = $this->fungsi->setup_variable('value_head1');

$style_head2 = $this->fungsi->setup_variable('style_head2');
$value_head2 = $this->fungsi->setup_variable('value_head2');

$align_header = $this->fungsi->setup_variable('align_header');
$align_alamat_kampus = $this->fungsi->setup_variable('align_alamat_kampus');  

  $warna_header1 = $this->fungsi->setup_variable('warna_header1');
//  $warna_header1 = $this->fungsi->hex2rgb($warna_header1);
  
   $warna_header2 = $this->fungsi->setup_variable('warna_header2'); 
//   $warna_header2 = $this->fungsi->hex2rgb($warna_header2);
//   $warna_header1 = 'rgb('.$warna_header1[0].', '.$warna_header1[1].', '.$warna_header1[2].')';
 
?>



<div id="template_depan" class="span4 pull-left">
<?php
$this->load->view('admin/template_ktm/template_depan');
?>
</div>


<div  class="span6 pull-right" style="font-size: 10px">
    
    
    <table>
        
        <tr>
            <td>
                HEADING 1 
            </td>
            <td>: <?php echo form_input('value_head1', $value_head1, 'id="value_head1"');?></td>
            <td>
                <button id="heading1" class="btn btn-info"> <i class="icon-ok"></i> simpan</button>
            </td>
            
            
            
        </tr>
                <tr>
            <td>
                HEADING 2
            </td>
            <td>: <?php echo form_input('value_head2', $value_head2, 'id="value_head2"');?></td>
            <td>
                <button id="heading2" class="btn btn-info"> <i class="icon-ok"></i> simpan</button>
            </td>            
        </tr>
        
        
        
          <tr>
            <td>
                Alamat Kampus
            </td>
            <td>: <?php echo form_input('value_head2', $alamat_kampus, 'id="alamat_kampus"');?></td>
            <td>
                <button id="tombol_alamat_kampus" class="btn btn-info"> <i class="icon-ok"></i> simpan</button>
            </td>            
        </tr>


        

        

        

        
                <tr>
            <td>
               Align Header
            </td>
            <td>: <?php
            $data = array(
                'center' => 'center',
                'right' =>  'right',
                'left'  =>  'left'
            );
            echo form_dropdown('align_header', $data, $align_header, 'id="align_header"');?></td>
            <td>
                <button id="tombol_align_header" class="btn btn-info"> <i class="icon-ok"></i> simpan</button>
            </td>            
        </tr>
        
        

        

        
        
        
         <tr>
            <td>
               Align Alamat Kampus
            </td>
            <td>: <?php
            $data = array(
                'center' => 'center',
                'right' =>  'right',
                'left'  =>  'left'
            );
            echo form_dropdown('align_alamat_kampus', $data, $align_alamat_kampus, 'id="align_alamat_kampus"');?></td>
            <td>
                <button id="tombol_align_alamat_kampus" class="btn btn-info"> <i class="icon-ok"></i> simpan</button>
            </td>            
        </tr>
        
         <tr>
            <td>
               Warna Head 1
            </td>
            <td> <input id="color1" name="color1"  type="text" value="<?php echo $warna_header1;?>" />
            <td>
                <button id="tombol_warna_head1" class="btn btn-info"> <i class="icon-ok"></i> simpan</button>
            </td>            
        </tr>
        
           <tr>
            <td>
               Warna Head 2
            </td>
            <td> <input id="color2" name="color2"  type="text" value="<?php echo $warna_header2;?>" />
            <td>
                <button id="tombol_warna_head2" class="btn btn-info"> <i class="icon-ok"></i> simpan</button>
            </td>            
        </tr> 
        
        
        
         
                <tr>
            <td>
                Custom Style Heading 1
            </td>
            <td>: <?php echo form_input('style_head1', $style_head1, 'id="style_heading1"');?></td>
            <td>
                <button id="tombol_style_heading1" class="btn btn-info"> <i class="icon-ok"></i> simpan</button>
            </td>            
        </tr>
        
                <tr>
            <td>
              Custom Style  Hading 2
            </td>
            <td>: <?php echo form_input('style_head2', $style_head2, 'id="style_heading2"');?></td>
            <td>
                <button id="tombol_style_heading2" class="btn btn-info"> <i class="icon-ok"></i> simpan</button>
            </td>            
        </tr>       
        
        
        
        
        
        
        
        
        
        
        
   </table>
</div>


 




<script>
    
$(document).ready(function(){
    $('#color1').colorPicker();
     $('#color2').colorPicker();
    
    
    
    function update_info(variable, value){
        
        form_data={
            update : 1,
            variable : variable,
            value : value
        }
        
        $.ajax({
            url :"<?php echo site_url('admin/template_ktm/update_info');?>",
            data : form_data,
            type : 'post',
            success:function(update){
                $('#loading').show();
                $('#template_depan').load('<?php echo site_url("admin/template_ktm/template_depan");?>');
                $('#loading').fadeOut('slow', function(){
                    $('#sukses').fadeIn(function(){
                        $('#sukses').fadeOut(2500);
                    });
                });
                
                
            }
        }); // end of ajax
        
    
    }
    
    
    
    
    
    //update heading1
    $('#heading1').click(function(){
    $('#heading1').attr('disabled', 'disabled');
    var variable = 'value_head1';
    var value = $('#value_head1').val();
    update_info(variable, value);
    $('#heading1').removeAttr('disabled');
    });
    
    
       //update heading2
    $('#heading2').click(function(){
    $('#heading2').attr('disabled', 'disabled');
    var variable = 'value_head2';
    var value = $('#value_head2').val();
    update_info(variable, value);
    $('#heading2').removeAttr('disabled');
    }); 
    
    
    
    //update style heading1
    $('#tombol_style_heading1').click(function(){
    $('#tombol_style_heading1').attr('disabled', 'disabled');
    var variable = 'style_head1';
    var value = $('#style_heading1').val();
    update_info(variable, value);
    $('#tombol_style_heading1').removeAttr('disabled');
    });    
    
    
    
     //update style heading2
    $('#tombol_style_heading2').click(function(){
    $('#tombol_style_heading2').attr('disabled', 'disabled');
    var variable = 'style_head2';
    var value = $('#style_heading2').val();
    update_info(variable, value);
    $('#tombol_style_heading2').removeAttr('disabled');
    });     
    
    
       //update alamat_kampus
    $('#tombol_alamat_kampus').click(function(){
    $('#tombol_alamat_kampus').attr('disabled', 'disabled');
    var variable = 'alamat_kampus';
    var value = $('#alamat_kampus').val();
    update_info(variable, value);
    $('#tombol_alamat_kampus').removeAttr('disabled');
    });  
    
    
    
     //update alamat_kampus
    $('#tombol_align_header').click(function(){
    $('#tombol_align_header').attr('disabled', 'disabled');
    var variable = 'align_header';
    var value = $('#align_header').val();
    update_info(variable, value);
    $('#tombol_align_header').removeAttr('disabled');
    });  
    
    //update alamat_kampus
    $('#tombol_align_alamat_kampus').click(function(){
    $('#tombol_align_alamat_kampus').attr('disabled', 'disabled');
    var variable = 'align_alamat_kampus';
    var value = $('#align_alamat_kampus').val();
    update_info(variable, value);
    $('#tombol_align_alamat_kampus').removeAttr('disabled');
    });  
    
   
   
   
       //update alamat_kampus
    $('#tombol_warna_head1').click(function(){
    $('#tombol_warna_head1').attr('disabled', 'disabled');
    var variable = 'warna_header1';
    var value = $('#color1').val();
    update_info(variable, value);
    $('#tombol_warna_head1').removeAttr('disabled');
    });  
   
        //update alamat_kampus
    $('#tombol_warna_head2').click(function(){
    $('#tombol_warna_head2').attr('disabled', 'disabled');
    var variable = 'warna_header2';
    var value = $('#color2').val();
    update_info(variable, value);
    $('#tombol_warna_head2').removeAttr('disabled');
    });    
   
   
   
});//end of ready function

</script>



