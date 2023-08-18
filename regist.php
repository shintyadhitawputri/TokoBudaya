<?php

include "config.php";
/** INPUT DATA **/
if (isset($_POST["bsimpan"])) {
	$username = $_POST["username"];
	$nik = $_POST["nik"];
	$password = $_POST["password"];
	$simpan = mysqli_query($connection, "INSERT INTO daftar VALUES ('','$username','$nik','$password')");

	if ($simpan) {
		echo "<script>
				alert('Akun anda berhasil dibuat!');
				document.location='login.php';
			</script>";
	} else {
		echo "<script>
				alert('Akun anda gagal dibuat!');
				document.location='regist.php';
			</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/regist.css">

    <!--CSS BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!--CSS BOOTSTRAP-->

</head>

<body>
<header class="header">
    <a href="index.html" class="logo">
        <img src="images/logooo.png" alt="">
    </a>
</header>

<div class="box-container">
	<div class="card mt-5">
		<div class="card-header">
			Registrasi Akun
		</div>
		<div class="card-body">
			<form action="" method="post">
				<div class="form-group">
					<label for="">Username</label>
					<input type="username" name="username" class="form-control" placeholder="Masukan Username Anda" required autocomplete="off">
				</div>

				<div class="form-group">
					<label for="">NIK</label>
					<input type="text" name="nik" class="form-control" placeholder="Masukan NIK Anda" required autocomplete="off">
				</div>

				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Masukan Password Anda" required autocomplete="off">
				</div>

				<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
				<button type="reset" class="btn btn-warning" name="breset">Kosongkan</button>
			</form>
		</div>
	</div>
</div>
	<footer class="footer">

	</footer>
</body>

</html>
<?php
mysqli_close($connection);
?>