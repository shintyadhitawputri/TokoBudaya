<?php  
$koneksi = mysqli_connect("localhost", "root", "", "toko_budaya");

function query($sql) {
	global $koneksi;
	  $result = mysqli_query($koneksi,$sql);
	  $hps = [];
	  while ($hp = mysqli_fetch_assoc($result)) {
	  	$hps[]=$hp;
	  }
	  return $hps;
}
function hapus($id){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM keranjang WHERE id = $id");
	return mysqli_affected_rows($koneksi);
}
