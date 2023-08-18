<?php
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

    <!--Eksternal CSS-->
    <link rel="stylesheet" href="shopcart.css" />

    <!-- Fonts From Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,100;1,300;1,400&display=swap"
        rel="stylesheet" />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <header>
        <img src="img/logo TB.png" height="100" width="100" />

        <div class="nav-cen">
            <input type="text" placeholder=" Cari barang" />

            <nav class="navbar">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#shop">Shop</a></li>
                    <li><a href="#about">About Us</a></li>
                </ul>
            </nav>
        </div>
        <a href="#" id="hamburger-menu"><i data-feather="user"></i></a>
    </header>

    <main>
        <section class="cart">
            <div class="container">
                <h2>KERANJANG ANDA</h2>
            </div>
            <div class="produk">
                <table>
                    <tr>
                        <th>‎</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                    <?php
                    $total = 0;
                    foreach ($multiprdk as $prdk):
                        ?>

                        <tr>
                            <td colspan="4">
                                <?= $prdk["toko"] ?>
                            </td>
                            <td>‎</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="cancel"><a href="hapus.php?id=<?php echo $prdk['id']; ?>"><i
                                            data-feather="x-circle"></i></a>
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
                                    <input type="number" name="product_quantity" value="<?php echo $prdk['quantity']; ?>">
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
                <div class="voucher">
                    <table>
                        <tr>
                            <td>
                                <input type="text" placeholder="Masukkan voucher Anda">
                            </td>
                            <td>
                                <button>Apply</button>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="checkout">
                    <form>
                        <button name="checkout"><strong>Checkout</strong></button>
                    </form>
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