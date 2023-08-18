<?php 
function tgl_indonesia($date){
	/**array hari dan bulan**/
	$Hari = array("minggu","senin","selasa","rabu","kamis","jum'at","sabtu");
	$Bulan = array("Januari","Februari","Maret","April","Mei","Juni","july","Agustus","September","Oktober","November","Desember");


	/**memmisahkan**/
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
	$waktu = substr($date, 11,5);
	$hari  = date("w", strtotime($date));

	$result = $Hari[$hari].", ". $tgl." ".$Bulan[(int)$bulan-1]. " ".$tahun." ".$waktu." WIB ";
	return $result;

}



 ?>