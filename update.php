<?php

include "config.php";
/** UPDATE DATA **/
if (isset($_POST["ubah"])) {
	$id = $_POST["id"];
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$alamat = $_POST["alamat"];
	$hp = $_POST["hp"];
	$simpan = mysqli_query($connection, "UPDATE akun SET email ='$email', nama ='$nama', alamat ='$alamat', hp ='$hp' WHERE id ='$id'");
	if ($simpan) {
		echo "<script>
					alert('Update data sukses!');
					document.location='profile.php';
				</script>";
	} else {
		echo "<script>
					alert('Update data gagal!');
					document.location='profile.php';
				</script>";
	}
}

/** TAMPIL DATA PADA FORM **/
$id = $_GET["update"];
$edit = mysqli_query($connection, "SELECT * FROM akun WHERE id = '$id'");
if (mysqli_num_rows($edit) == 0) header("location:profile.php");
$row_edit = mysqli_fetch_array($edit);


/** QUERY DATA **/
$query = mysqli_query($connection, "SELECT * FROM akun ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/form.css">

    <!--CSS BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!--CSS BOOTSTRAP-->

</head>

<body class="daftar">

<!-- header section starts -->
    <header class="header">
        <a href="home.php" class="logo">
            <img src="images/logooo.png" alt="">
        </a>

        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="shop.html">Shop</a>
            <a href="about.html">About Us</a>
        </nav>

        <div class="icons">
            <a href="logout.php"><div class="fas fa-sign-out-alt" id="out-btn"></div></a>
        </div>
    </header>
<!-- header section ends -->

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3 my-lg-0 my-md-1">
            <!-- sidebar starts -->
            <div id="sidebar">
                <div class="h3 text-dark">Account</div>
                <ul>

                    <li>
                        <a href="profile.php" class="text-decoration-none d-flex align-items-start">
                            <div class="far fa-user pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link"><h4>My Profile</h4></div>
                                <div class="link-desc"><h5>See your own data</h5></div>
                            </div>
                        </a>
                    </li>

                    <li class="active">
                        <a href="form.php" class="text-decoration-none d-flex align-items-start">
                            <div class="far fa-address-book pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link"><h4>Change Profile</h4></div>
                                <div class="link-desc"><h5>Change your profile and details</h5></div>
                            </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href="order.php" class="text-decoration-none d-flex align-items-start">
                            <div class="fas fa-box-open pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link"><h4>My Orders</h4></div>
                                <div class="link-desc"><h5>View & Manage orders and returns</h5></div>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- sidebar ends -->
        </div>

        <!-- main-content starts -->
        <div class="col-lg-9 my-lg-0 my-1">
            <div id="main-content" class="bg-white border">
                <div class="card mt-5">
                    <div class="card-header">
                        Data Pengguna Akun
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" required value="<?php echo $row_edit["nama"] ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukan Email Anda" required value="<?php echo $row_edit["email"] ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat Anda" required value="<?php echo $row_edit["alamat"] ?>">
                            </div>

                            <div class="form-group">
                                <label for="">No. HP</label>
                                <input type="text" name="hp" class="form-control" placeholder="Masukan No. HP Anda" required value="<?php echo $row_edit["hp"] ?>">
                            </div>

                            <input type="hidden" value="<?php echo $row_edit["id"]; ?>" name="id">

                            <button type="submit" class="btn btn-success" name="ubah">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-content ends -->
    </div>
</div>

<!-- footer starts -->

<footer class="footer">
    
</footer>

<!-- footer ends -->

</body>

</html>
<?php
mysqli_close($connection);
?>