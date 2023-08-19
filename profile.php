<?php
session_start();

if (!isset($_SESSION['akun_id'])) {
    header("location:login.php");
    exit();
}

include "config.php";

$akun_id = $_SESSION['akun_id'];

/** QUERY DATA **/
$query = mysqli_query($connection, "SELECT * FROM akun WHERE id = '$akun_id' ORDER BY id DESC");
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
    <link rel="stylesheet" href="css/profile.css">

    <!--CSS BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!--CSS BOOTSTRAP-->

</head>
<body>
    
<!-- header section starts -->
<header class="header">
    <a href="home.php" class="logo">
        <img src="images/logooo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="home.php" class="btn btn-warning">Home</a>
        <a href="shop.html" class="btn btn-warning">Shop</a>
        <a href="about.html" class="btn btn-warning">About Us</a>
    </nav>

    <div class="icons">
        <a href="logout.php"><div class="fas fa-sign-out-alt" id="out-btn"></div></a>
    </div>
</header>

<!-- header section ends -->

<!-- sidebar starts -->

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-3 my-lg-0 my-md-1">
            <div id="sidebar">
                <div class="h3 text-dark">Account</div>
                <ul>

                    <li class="active">
                        <a href="profile.php" class="text-decoration-none d-flex align-items-start">
                            <div class="far fa-user pt-2 me-3"></div>
                            <div class="d-flex flex-column">
                                <div class="link"><h4>My Profile</h4></div>
                                <div class="link-desc"><h5>See your own data</h5></div>
                            </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href="#" class="text-decoration-none d-flex align-items-start">
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
        </div>
        <div class="col-lg-9 my-lg-0 my-1">
            <div id="main-content" class="bg-white border">
                <table class="table table-bordered">
                    <tr>
                        <th class="table-warning">Nama</th>
                        <th class="table-warning">Email</th>
                        <th class="table-warning">Alamat</th>
                        <th class="table-warning">No. HP</th>
                        <th class="table-warning">Update/Delete</th>

                        <?php if (mysqli_num_rows($query) > 0) { ?>
					<?php $no = 1 ?>
					<?php while ($row = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?php echo $row["nama"] ?></td>
							<td><?php echo $row["email"] ?></td>
							<td><?php echo $row["alamat"] ?></td>
							<td><?php echo $row["hp"] ?></td>
                            <td>
                                <a href="update.php?update=<?php echo $row["id"] ?>" class="btn btn-warning">Update Data</a>
                                <a href="delete.php?delete=<?php echo $row["id"] ?>" class="btn btn-danger">Hapus Data</a>
                            </td>
						</tr>
					<?php $no++;
					} ?>
				<?php } ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- sidebar ends -->


<!-- footer starts -->

<footer class="footer">
    
</footer>

<!-- footer ends -->

</body>
</html>
