<?php

include 'connection.php';
if (isset($_GET['id'])) {
  $id = $_GET["id"];
}
$sql = "SELECT* FROM produk where id = 1";
$query = mysqli_query($koneksi, $sql);

$prdk = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>single product </title>

  <!-- font awesome cdn link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!--Eksternal CSS-->
  <link rel="stylesheet" href="product.css" />

  <!-- Fonts From Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,100;1,300;1,400&display=swap" rel="stylesheet">

  <!-- Feather Icons -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>


<body>
  <header>
    <img src="img/logo TB.png" height="100" width="100" />


    <nav class="navbar">
      <ul>
        <li><a href="#home"><button type="button" class="btn btn-warning">Home</button></a></li>
        <li><a href="#shop"><button type="button" class="btn btn-warning">Shop</button></a></li>
        <li><a href="#about"><button type="button" class="btn btn-warning">About Us</button></a></li>
      </ul>
    </nav>

    <div class="icons">
      <div class="fas fa-search" id="search-btn"></div>
      <div class="fas fa-shopping-cart" id="cart-btn"></div>
      <div class="fas fa-user" id="user-btn"></div>
    </div>




  </header>


  <main>
    <!--Carausel Image-->
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/<?php echo $prdk["img1"]; ?>" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/tas2.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


    <div class="word">
      <h3>
        <?php echo $prdk["nama"]; ?>
      </h3>
      <div style="color: yellow;">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
      </div>

      <p>
        <?php echo $prdk["harga"]; ?><br>
        <?php echo $prdk["lokasi"]; ?>
      </p>
      <div class="desk">
        <p class="desc">
          <?php echo $prdk["deskripsi"]; ?>
        </p>
      </div>
      <form action="cart.php" method="post">
        <input type="hidden" value="1" name="id">
        <input type="hidden" value="<?php echo $prdk['nama'] ?>" name="nama">
        <input type="hidden" value="<?php echo $prdk['img1'] ?>" name="img1">
        <input type="hidden" value="<?php echo $prdk['harga'] ?>" name="harga">
        <input type="hidden" value="<?php echo $prdk['toko'] ?>" name="toko">
        <div class="inc">
          <div class="but-inc">
            <input type="number" value="1" class="number" name="quantity_single_product">
          </div>
        </div>


        <button name="add_to_cart"><strong>Add to Cart</strong></button>

      </form>
    </div>
  </main>

  <!-- <footer>
    <p>
      Created by
      <strong>IP3</strong></a>. | &copy; 2023.
    </p>
  </footer> -->

  <!-- Feather Icons -->
  <script>
    feather.replace();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</body>

</html>
