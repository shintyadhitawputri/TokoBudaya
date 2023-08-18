<?php
require 'connection.php';

$id = $_GET['id'];

if (hapus($id) > 0) {
  echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'cart.php';
			</script>
	";
} else {
  echo "
			<script>
				alert('data gagal ditambahkan');
				document.location.href = 'cart.php';
			</script>
		";
}
