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


function tambah($data){
	global $koneksi;

	$merk = htmlspecialchars($data['merk']);
	$ram = htmlspecialchars($data['ram']);
	$rom = htmlspecialchars($data['rom']);

	// upload file terlebih dahulu
	$warna = upload();
	if( !$warna ) {
		return false;
	}


	$sql = "INSERT INTO tbhp VALUES ('', '$merk', '$ram', '$rom', '$warna')";

	mysqli_query($koneksi,$sql);
	return mysqli_affected_rows($koneksi);
}

function upload(){
	$namaFile = $_FILES['warna']['name'];
	$ukuranFile = $_FILES['warna']['size'];
	$error = $_FILES['warna']['error'];
	$tmpName = $_FILES['warna']['tmp_name'];

	// cek apakah tidak add gambar yang diupload
	if ( $error === 4 ) {
		echo "
			<script>
				alert('pilih gambar terlebih dahulu');
			</script>
		";
		return false;
	}

	// cek apakah file yang diupload gambar atau bukan
	$ekstensiGambarValid = ["jpg", "jpeg", "png"];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	// cek yang diupload adalah gambar apa bukan
	if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "
			<script>
				alert('pilih file yang didukung (.jpg .jpeg .png)');
			</script>
		";
		return false;
	}

	// cek ukuran file
	if ($ukuranFile > 1000000) {
		echo "
			<script>
				alert('ukuran file terlalu besar');
			</script>
		";
		return false;
	}

	// jika lolos verifikasi diatas 
	// generate nama baru
	$namaFileBaru = uniqid();
	$namaFileBaru.= '.';
	$namaFileBaru.= $ekstensiGambar;
	
	move_uploaded_file($tmpName, 'img/'.$namaFileBaru);
	return $namaFileBaru;

}


function hapus($id){
	global $koneksi;
	mysqli_query($koneksi,"DELETE FROM keranjang WHERE id = $id");
	return mysqli_affected_rows($koneksi);
}


function ubah($data){
	global $koneksi;
	
	$id = ($data['id']);
	$merk = htmlspecialchars($data['merk']);
	$ram = htmlspecialchars($data['ram']);
	$rom = htmlspecialchars($data['rom']);
	$warnalama = $data['warnalama'];
	// var_dump($warnalama); die;

	// cek apakah user ganti warna atau tidak
	if ($_FILES['warna']['error'] === 4) {
		$warna = $warnalama;
	}else{
		$warna = upload();
	}


	$sql = "UPDATE tbhp SET merk = '$merk', ram = '$ram', rom = '$rom', warna = '$warna' WHERE id = $id ";

	mysqli_query($koneksi,$sql);
	return mysqli_affected_rows($koneksi);

}

function cari($keyword) {
	$sql = "SELECT * FROM tbhp 
					WHERE
					merk LIKE '%$keyword%' OR
					ram LIKE '%$keyword%' OR
					rom LIKE '%$keyword%'
					";
	return query($sql);
}


function registrasi($data){
	global $koneksi;

	// stripcslashes(), mengecek apakah memasukkan karakter tertenru atau tidak
	$username = strtolower(stripcslashes($data['username']));
	// mysqli_real_escape_string, memasukkan tanda kutip ke dalam database
	$password = mysqli_real_escape_string($koneksi, $data['password']);
	$konpass = mysqli_real_escape_string($koneksi, $data['konpass']);

	// cek username sudah ada atau tidak
	$result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo "
			<script>
				alert('username sudah terdaftar');
			</script>
		";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $konpass) {
		echo "
			<script>
				alert('konfirmasi password tidak sesuai');
			</script>
		";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($koneksi, "INSERT INTO users VALUES ('','$username', '$password')");

	return mysqli_affected_rows($koneksi);


}
