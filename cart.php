<?php
// session_start();
include('connection.php');


if (isset($_POST["add_to_cart"])) {
    // var_dump($_POST);die;
    $id = $_POST["id"];
    $quantity = $_POST["quantity_single_product"];
    $toko = $_POST["toko"];
    $nama = $_POST["nama"];
    $harga = $_POST["harga"];
    $img1 = $_POST["img1"];

    $sql = "SELECT id from keranjang where id = $id";
    $hasil = mysqli_query($koneksi, $sql);
    $ifAda = mysqli_affected_rows($koneksi);
    // jika produk balum ada di cart
    if ($ifAda > 0) {
        $sql = "UPDATE keranjang set quantity = quantity + $quantity where id = $id";
        mysqli_query($koneksi, $sql);
    } else {
        $sql = "INSERT INTO keranjang  (id,toko,img1,nama,harga,quantity)
        VALUES
        ('$id','$toko','$img1','$nama','$harga','$quantity')";
        mysqli_query($koneksi, $sql);
    }
}

$multiprdk = query("SELECT * FROM keranjang"); //dikirim ke connection.php line 5

if (isset($_POST['quantity'])) {
    $jml = $_POST["product_quantity"];
    $id = $_POST["id"];

    $sql = "UPDATE keranjang set quantity = $jml where id = $id";
    mysqli_query($koneksi, $sql);
    echo "
			<script>
				alert('data berhasil diganti');
				document.location.href = 'cart.php';
			</script>
	";
    // $_SESSION['cart'][$id] = $product_array;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!--Eksternal CSS-->
    <link rel="stylesheet" href="shopcart.css" />

    <!-- Fonts From Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,100;1,300;1,400&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <header>
        <img src="img/logo.png" height="100" width="100" />


        <nav class="navbar">
            <ul>
                <li><a href="index.php"><button type="button" class="btn btn-warning">Home</button></a></li>
                <li><a href="shop.php"><button type="button" class="btn btn-warning">Shop</button></a></li>
                <li><a href="aboutus.html"><button type="button" class="btn btn-warning">About Us</button></a></li>
            </ul>
        </nav>

        <div class="icons">
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <div class="fas fa-user" id="user-btn"></div>
        </div>




    </header>

    <main>
        <section class="cart">
            <div class="container">
                <h2>KERANJANG ANDA</h2>
            </div>
            <div class="produk">
                <table class="cart">
                    <tr>
                        <th>‎</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                    <?php
                    $total = 0;
                    foreach ($multiprdk as $prdk) :
                    ?>

                        <tr>
                            <td colspan="4">
                                <?= $prdk["toko"] ?>
                            </td>
                            <td>‎</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="cancel"><a href="hapus.php?id=<?php echo $prdk['id']; ?>"><i data-feather="x-circle"></i></a>
                                </div>
                            </td>
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
                                <small><span>Rp</span>
                                    <?php echo $prdk['harga']; ?>
                                </small>
                            </td>
                            <td>
                                <form method="post" action="cart.php">
                                    <input type="hidden" value="<?php echo $prdk['id']; ?>" name="id">
                                    <input class="but-inc" type="number" name="product_quantity" value="<?php echo $prdk['quantity']; ?>">
                                    <input type="submit" class="edit" value="edit" name="quantity">
                                </form>
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
                    endforeach;
                    ?>
                </table>
                <div class="cart-total">
                    <table class="total">
                        <tr>
                            <td>
                                Total
                            </td>
                            <td>
                                Rp
                                <?php
                                echo $total;
                                ?>
                            </td>
                        </tr>
                        <tr>

                            <td colspan="2">
                                <div class="checkout">
                                    <form action="checkout.php" method="post">
                                        <button name="checkout_cart"><strong>Checkout</strong></button>
                                    </form>
                                </div>
                            </td>


                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>Created by<strong> IP3</strong></a>. | &copy; 2023.</p>
    </footer>

    <script>
        feather.replace();
    </script>
</body>

</html>
