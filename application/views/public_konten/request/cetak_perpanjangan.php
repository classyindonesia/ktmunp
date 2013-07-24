<table style="border:1px solid #aaa;font-size: 12px" padding="1" width="450">

    <tr style="border-bottom: 2px solid #aaa">
        <td colspan="2" align="center"> <h4>Kartu Pengambilan KTM</h4></td>
        
        </tr>
    
    
    <tr>
        <td>Nama</td>
        <td style="border-bottom: 2px solid #aaa;padding: 0.5em;"> : <?php echo $cetak['nama'];?></td>
    </tr>
    
    <tr>
        <td>NPM</td>
        <td  style="border-bottom: 2px solid #aaa;padding: 0.5em;"> : <?php echo $cetak['id'];?></td>
    </tr>    
    <tr>
        <td>Prodi</td>
        <td  style="border-bottom: 2px solid #aaa;padding: 0.5em;"> : <?php echo $cetak['jurusan'];?></td>
    </tr>    
    
    <tr>
        <td>Tanggal <span style="float:right">IN</span></td>
        <td  style="border-bottom: 2px solid #aaa;padding: 0.5em;"> : <?php echo $this->fungsi->date_to_tgl(date("Y-m-d"));?></td>
    </tr>     
    
    <tr>
        <td align="right">OUT</td>
        <td  style="border-bottom: 2px solid #aaa;padding: 0.5em;"> : <?php 
        echo $this->fungsi->date_to_tgl(date('Y-m-d', strtotime("+ 7 days")));?></td>
    </tr>     

    
    
    
    
   
    
    
       <tr>
        <td colspan="2" align="center"> Note: Pengambilan lebih dr tgl jatuh tempo, bukan tanggung jawab BAAK</td>
        
        </tr> 
</table>



<script>

$(document).ready(function(){
   
   $('#konten').print();
   
   $('#loading').fadeOut();
    
});


</script>