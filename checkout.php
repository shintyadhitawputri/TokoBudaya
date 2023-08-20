<?php
// session_start();
include('connection.php');
// echo $_SESSION["quantity"];
// die;
$sql = "SELECT * FROM keranjang";


$multiprdk = mysqli_query($koneksi, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!--Eksternal CSS-->
    <link rel="stylesheet" href="checkout.css" />

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
        <section>
            <?php $total = 0; ?>
            <?php foreach ($multiprdk as $prdk) : ?>

                <div class="desk">
                    <div class="produk">
                        <table>
                            <tr>
                                <td>
                                    <div class="product-info">
                                        <img src="img/<?php echo $prdk['img1']; ?>" width="100px">
                                        <div>
                                            <p>
                                                <?php echo $prdk['nama']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php echo $prdk['quantity']; ?>
                                </td>

                                <td>
                                    <span>Rp</span>
                                    <span class="price">
                                        <?php
                                        $sub_total = $prdk["harga"] * $prdk["quantity"];
                                        echo $sub_total;
                                        ?>
                                    </span>
                                </td>
                            </tr>

                            <?php
                            $total += $sub_total;

                            ?>
                        </table>
                    </div>
                <?php endforeach; ?>
                <div class="cart-total">
                    <table>
                        <tr>
                            <td>
                                Total
                            </td>
                            <td>
                                Rp.
                                <?php
                                echo $total;
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="tf">

                    <div class="no">
                        <p>No Virtual Account</p>
                        <h3>56236236 535</h3>
                    </div>
                    <div class="tutor">
                        <p> Petunjuk Pembayaran</p>
                        <ol>
                            <li>
                                Pilih transfer->Virtual Account
                            </li>
                            <li>
                                Pilih transfer->Virtual Account
                            </li>
                            <li>
                                Pilih transfer->Virtual Account
                            </li>
                            <li>
                                Pilih transfer->Virtual Account
                            </li>
                        </ol>
                    </div>
                </div>



                </div>
                <section>



    </main>


</body>

</html>