<?php 

include "config.php";

if (isset($_GET["delete"])) {
	$id = $_GET["delete"];
	$hapus = mysqli_query($connection,"DELETE FROM akun WHERE id = '$id'");
	if ($hapus) {
		echo "<script>
				alert('Data Anda telah dihapus!');
				document.location='profile.php';
			</script>";
	} else {
		echo "<script>
				alert('Data Anda gagal terhapus!');
				document.location='profile.php';
			</script>";
	}
}

 ?>