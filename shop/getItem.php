<?php 
header('Content-Type: application/json');
include('connection.php');

$kategori_id = $_GET['filterKategori'];
$data = [];

if ($kategori_id === "null") {
    $queryz = mysqli_query($koneksi, "SELECT * FROM produk");
} else {
    $queryz = mysqli_query($koneksi, "SELECT * FROM produk where kategori_id = '$kategori_id'");
}

while($row = mysqli_fetch_object($queryz)){
    $data[] = $row;
}

echo json_encode($data);
?>