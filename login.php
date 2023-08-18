<?php
ob_start();
session_start();
include "config.php";
include "function.php";

/** Proses Login **/
if (isset($_POST["submit_login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $sql_login = mysqli_query($connection, "SELECT * FROM daftar WHERE username = '$username' AND password = '$password'");

  if (mysqli_num_rows($sql_login) > 0) {
    $row_akun = mysqli_fetch_array($sql_login);
    $_SESSION['akun_id'] = $row_akun["id"];
    $_SESSION['akun_username'] = $row_akun["username"];
    header("location:home.php");
  } else {
    header("location:login.php?failed");
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
    <link rel="stylesheet" href="css/login.css">

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
		    Selamat Datang
	    </div>
        <div class="card-body">
         <form role="form" method="post" action="">
                <?php if (isset($_GET["failed"])) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <p>Username atau password yang anda masukan salah</p>
                </div>
                <?php } ?>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
                
                <button type="submit" class="btn btn-success" name="submit_login">Login</button>
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
ob_end_flush();
?>