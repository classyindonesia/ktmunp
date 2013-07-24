<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 

/**
 * Description of fungsi.php
 *
 * @author man3
 */
class Fungsi {

    var $AT = null;

    function __construct() {
        $this->AT = & get_instance();
        $this->AT->load->library('session');
    }    
    
        function selisih_hari($tgl_1, $tgl_2){ //format input yyyy-mm-dd
        $pecah_1 = explode("-", $tgl_1);
        $date_1 = (int) $pecah_1[2];
        $month_1 = (int) $pecah_1[1];
        $year_1 = (int) $pecah_1[0];
        $pecah_2 = explode("-", $tgl_2);
        $date_2 = (int) $pecah_2[2];
        $month_2 = (int) $pecah_2[1];
        $year_2 = (int) $pecah_2[0];
        $jd_1 = GregorianToJD($month_1, $date_1, $year_1);
        $jd_2 = GregorianToJD($month_2, $date_2, $year_2);
        $selisih = $jd_2 - $jd_1;
        return $selisih;
    }
    
  
function alphaID($in, $to_num = false, $pad_up = false, $passKey = null)
{
    $index = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    if ($passKey !== null) {
        // Although this function's purpose is to just make the
        // ID short - and not so much secure,
        // with this patch by Simon Franz (http://blog.snaky.org/)
        // you can optionally supply a password to make it harder
        // to calculate the corresponding numeric ID

        for ($n = 0; $n<strlen($index); $n++) {
            $i[] = substr( $index,$n ,1);
        }

        $passhash = hash('sha256',$passKey);
        $passhash = (strlen($passhash) < strlen($index))
            ? hash('sha512',$passKey)
            : $passhash;

        for ($n=0; $n < strlen($index); $n++) {
            $p[] =  substr($passhash, $n ,1);
        }

        array_multisort($p,  SORT_DESC, $i);
        $index = implode($i);
    }

    $base  = strlen($index);

    if ($to_num) {
        // Digital number  <<--  alphabet letter code
        $in  = strrev($in);
        $out = 0;
        $len = strlen($in) - 1;
        for ($t = 0; $t <= $len; $t++) {
            $bcpow = bcpow($base, $len - $t);
            $out   = $out + strpos($index, substr($in, $t, 1)) * $bcpow;
        }

        if (is_numeric($pad_up)) {
            $pad_up--;
            if ($pad_up > 0) {
                $out -= pow($base, $pad_up);
            }
        }
        $out = sprintf('%F', $out);
        $out = substr($out, 0, strpos($out, '.'));
    } else {
        // Digital number  -->>  alphabet letter code
        if (is_numeric($pad_up)) {
            $pad_up--;
            if ($pad_up > 0) {
                $in += pow($base, $pad_up);
            }
        }

        $out = "";
        for ($t = floor(log($in, $base)); $t >= 0; $t--) {
            $bcp = bcpow($base, $t);
            $a   = floor($in / $bcp) % $base;
            $out = $out . substr($index, $a, 1);
            $in  = $in - ($a * $bcp);
        }
        $out = strrev($out); // reverse
    }

    return $out;
}
  
    
function encode($val, $base=62,  $chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    // can't handle numbers larger than 2^31-1 = 2147483647
    $str = '';
    do {
        $i = $val % $base;
        $str = $chars[$i] . $str;
        $val = ($val - $i) / $base;
    } while($val > 0);
    return $str;
}

function decode($str, $base=62, $chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') {
    $len = strlen($str);
    $val = 0;
    $arr = array_flip(str_split($chars));
    for($i = 0; $i < $len; ++$i) {
        $val += $arr[$str[$i]] * pow($base, $len-$i-1);
    }
    return $val;
}    
    
    
    
    
    
function get_dir_size($directory)
{
	$dirSize=0;
	
	if(!$dh=opendir($directory))
	{
		return false;
	}
	
	while($file = readdir($dh))
	{
		if($file == "." || $file == "..")
		{
			continue;
		}
		
		if(is_file($directory."/".$file))
		{
			$dirSize += filesize($directory."/".$file);
		}
		
		if(is_dir($directory."/".$file))
		{
			$dirSize += get_dir_size($directory."/".$file);
		}
	}
	
	closedir($dh);
	
	return $dirSize;
}
    
    
    
    
    function log($pesan){
      
      $tgl = date('Y-m-d');
      $jam = date('H:i:s');      
     $data = array(
         'ket' => $pesan,
         'tgl' => $tgl.' '.$jam,
         'op'  => $this->AT->session->userdata('username').' '.date('Y-m-d H:i:s')
     );
     $this->AT->db->insert('log_user', $data);
     
    }
    
    
    
    function op(){
      $user =  $this->AT->session->userdata('username');
      $tgl = date('Y-m-d');
      $jam = date('H:i:s');
      return $user.' '.$tgl.' '.$jam;
    }
    
    function hex2rgb($hex) {
    $hex = str_replace("#", "", $hex);

    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);
    //return implode(",", $rgb); // returns the rgb values separated by commas
    return $rgb; // returns an array with the rgb values
    }
    
    
    
    
    
    
    
    function bulan2($rrr)
	{
	if($rrr=='1' || $rrr=='01'){$ttt='Januari';}
	if($rrr=='2' || $rrr=='02'){$ttt='Februari';}
	if($rrr=='3' || $rrr=='03'){$ttt='Maret';}
	if($rrr=='4' || $rrr=='04'){$ttt='April';}
	if($rrr=='5' || $rrr=='05'){$ttt='Mei';}
	if($rrr=='6' || $rrr=='06'){$ttt='Juni';}
	if($rrr=='7' || $rrr=='07'){$ttt='Juli';}
	if($rrr=='8' || $rrr=='08'){$ttt='Agustus';}
	if($rrr=='9' || $rrr=='09'){$ttt='September';}
	if($rrr=='10'){$ttt='Oktober';}
	if($rrr=='11'){$ttt='November';}
	if($rrr=='12'){$ttt='Desember';}
	return $ttt;
	}
    
    
    
    
    
    function date_to_tgl($in)
	{
	$tgl = substr($in,8,2);
	$bln = substr($in,5,2);
	$thn = substr($in,0,4);
	if(checkdate($bln,$tgl,$thn))
	{
	   $out=substr($in,8,2)." ".$this->bulan2(substr($in,5,2))." ".substr($in,0,4);
	}
	else
	{
	   $out = "<span class='error'>N/A</span>";
	}
	return $out;
	}
        
        
        function setup_variable($var){
            $this->AT->db->where('variable', $var);
            $q = $this->AT->db->get('setup_variable');
            if($q->num_rows() > 0 ){
                foreach($q->result_array() as $list){
                    $val = $list['value'];
                }
            }
            return $val;
            
        }
    
    
}

//end of file
