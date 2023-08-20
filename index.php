<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Budaya</title>
    <link rel="icon" type="image/x-icon" href="images/logooo.png"/>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="css/index.css">

    <!--CSS BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!--CSS BOOTSTRAP-->

</head>
<body>
    
<!-- header section starts -->
<header class="header">
    <a href="index.php" class="logo">
        <img src="images/logooo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="index.php" class="btn btn-warning">Home</a>
        <a href="shop.html" class="btn btn-warning">Shop</a>
        <a href="about.html" class="btn btn-warning">About Us</div></a>
    </nav>

    <div class="icons">
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <div class="fas fa-user" id="user-btn"></div>
    </div>

    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here....">
        <label for="search-box" class="fas fa-search"></label>
    
    </div>

    <div class="cart-items-container">
        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/img-5.jpg" alt="">
            <div class="barang">
                <h3>Keranjang Barang 1</h3>
                <div class="harga">Rp150.000/-</div>
            </div>
        </div>

        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/img-3.jpg" alt="">
            <div class="barang">
                <h3>Keranjang Barang 2</h3>
                <div class="harga">Rp90.000/-</div>
            </div>
        </div>

        <div class="cart-item">
            <span class="fas fa-times"></span>
            <img src="images/img-1.jpg" alt="">
            <div class="barang">
                <h3>Keranjang Barang 3</h3>
                <div class="harga">Rp100.000/-</div>
            </div>
        </div>
        <a href="#" class="btn">Check Now</a>
    </div>

    <div class="box-container">
        <div class="box-item">
            <a href="login.php" class="btn">Sign In</a>
            <a href="regist.php" class="btn">Sign Up</a>
        </div>
    </div>

</header>

<!-- header section ends -->

<!-- home section starts -->
<div class="images" id="images">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/img-13.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/img-14.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="images/img-17.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
      </div>
</div>

<!-- home section ends -->

<!-- why us section starts -->

<section class="why" id="why">
    <h1 class="heading"> Why<span> Us</span> </h1>

    <div class="box-container">
        <div class="box">
            <div class="content">
                <img src="images/free.png" alt="">
                <h3>Free Shiping</h3>
                <p>Harga Pengiriman Paket terbilang cukup murah dikarenakan,
                kami selalu memberikan potongan harga hingga 50% setiap Chekcout</p>
            </div>
        </div>

        <div class="box">
            <div class="content">
                <img src="images/time.png" alt="">
                <h3>On Time</h3>
                <p>Pengiriman tercepat serta selalu aman sampai tujuan</p>
            </div>
        </div>

        <div class="box">
            <div class="content">
                <img src="images/price.png" alt="">
                <h3>Low Price</h3>
                <p>Harga barang dijamin murah karena selalu ada potongan harga hingga 50%</p>
            </div>
        </div>

    </div>

</section>

<!-- why us section ends -->

<!-- rekomendasi barang starts -->

<section class="products" id="products">
    <div class="box">
        <h1 class="head">Rekomendasi <span> Barang</span></h1>
        <div class="box-container"> 
            <?php
                include ('connect.php');
                
                $query = "SELECT * FROM produk ORDER BY RAND() LIMIT 3";
                $multiprdk =query($query);

                foreach ($multiprdk as $prdk) { ?>
                    
                        <div class="box">
                            <div class="icons">
                            <div class="fas fa-shopping-cart"></div>
                            <div class="fas fa-heart"></div>
                            <a href="product.php?id=<?php echo $prdk['id'] ?>"><div class="fas fa-eye"></div> </a>
                            </div>

                            <div class="image">
                                <img src="img/<?php echo $prdk["img"]; ?>" alt="">
                            </div> 

                            <div class="content">
                                <h3><?php echo $prdk["nama"]; ?></h3>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <div class="harga"><h2>Rp<?php echo $prdk["harga"]; ?></h2></div>
                            </div>
                        </div>
                  
                    <?php } ?>
        </div>
    </div>
</section>

<!-- rekomendasi barang ends -->

<!-- footer starts -->

<footer class="footer">
    
</footer>

<!-- footer ends -->

<!-- custom js file link -->
<script src="js/script.js"></script>

</body>

</html>
