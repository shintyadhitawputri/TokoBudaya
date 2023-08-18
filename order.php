<?php

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
    <link rel="stylesheet" href="css/order.css">

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

                    <li>
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
                    
                    <li class="active">
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
                <h1>My recent orders</h1>

                <div class="order my-3 bg-light">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex flex-column justify-content-between order-summary">
                                <div class="d-flex align-items-center">
                                    <h3>Order #fur17893</h3>
                                    <div class="green-label ms-auto text-uppercase">cod</div>
                                </div>
                                <div class="fs-4">Products #03</div>
                                <div class="fs-5">22 August, 2020 | 12:05 PM</div>
                                <div class="fs-6">Rating :</div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                <div class="status">Status : On Progress</div>
                            </div>
                            <div class="progressbar-track">
                                <ul class="progressbar">
                                    <li id="step-1" class="text-muted green">
                                        <span class="fas fa-gift"></span>
                                    </li>
                                    <li id="step-2" class="text-muted">
                                        <span class="fas fa-check"></span>
                                    </li>
                                    <li id="step-3" class="text-muted">
                                        <span class="fas fa-box"></span>
                                    </li>
                                    <li id="step-4" class="text-muted">
                                        <span class="fas fa-truck"></span>
                                    </li>
                                    <li id="step-5" class="text-muted">
                                        <span class="fas fa-box-open"></span>
                                    </li>
                                </ul>
                                <div id="tracker"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order my-3 bg-light">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex flex-column justify-content-between order-summary">
                                <div class="d-flex align-items-center">
                                    <h3>Order #fur15678</h3>
                                    <div class="blue-label ms-auto text-uppercase">tf-bank</div>
                                </div>
                                <div class="fs-4">Products #03</div>
                                <div class="fs-5">22 August, 2020 | 12:05 PM</div>
                                <div class="fs-6">Rating :</div>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                <div class="status">Status : Delivered</div>
                            </div>
                            <div class="progressbar-track">
                                <ul class="progressbar">
                                    <li id="step-1" class="text-muted green">
                                        <span class="fas fa-gift"></span>
                                    </li>
                                    <li id="step-2" class="text-muted green">
                                        <span class="fas fa-check"></span>
                                    </li>
                                    <li id="step-3" class="text-muted green">
                                        <span class="fas fa-box"></span>
                                    </li>
                                    <li id="step-4" class="text-muted green">
                                        <span class="fas fa-truck"></span>
                                    </li>
                                    <li id="step-5" class="text-muted green">
                                        <span class="fas fa-box-open"></span>
                                    </li>
                                </ul>
                                <div id="tracker"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
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