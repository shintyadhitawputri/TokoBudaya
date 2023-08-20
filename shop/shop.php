<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png"/>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- font awesome cdn link -->

    <link rel="stylesheet" href="stylez.css">
</head>
<body>

    <div id="root">
        <div class="navbar">
            <img src="img/logo.png" alt="Logo">
                <div class="icons">
                    <a href="profile.php">
                        <div class="fas fa-user" id="user-btn"></div>
                    </a>
                    <a href="cart.php">
                        <div class="fas fa-shopping-cart" id="cart-btn"></div>
                    </a>
                </div>
                <div class="navcenter">
                    <a href="home.php" class="buttonz">Home</a>
                    <a href="shop.php" class="buttonz">Shop</a>
                    <a href="aboutus.html" class="buttonz">About Us</a>
                </div>
                <form class="searchform" action="search.php" method="post">
                    <input class="inputsearch" type="text" name="keyword" id="keyword" autofocus placeholder="Cari produk Anda" autocomplete="off">
                    <button class="submitsearch" type="submit" name="cari" id="search-button">Cari</button>
                </form>
        </div>
        <div id="filter-class">
            <div id="filter-buttons">
                <?php
                include('connection.php');

                $categories = query("SELECT * FROM kategori");

                foreach ($categories as $cat) { ?>
                    <button class="filter-button" id="kategori-<?php echo $cat['id']; ?>" onclick="filter(<?php echo $cat['id'];?>)">
                        <?php echo $cat['nama']; ?>
                    </button>
                <?php } ?>
            </div>
        </div>

        <div id="item">
    
        </div>

    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
var currentFilter = null;

function filter(kategori_id) {
    if (kategori_id === currentFilter) {
        currentFilter = null; 
        $("#kategori-" + kategori_id).removeClass("clicked");
    } else {
        currentFilter = kategori_id;
        $("#kategori-" + kategori_id).addClass("clicked");
    }
    fetchData();
}

function fetchData() {
    var url = "http://localhost/folderTB/getItem.php";
    var data = { filterKategori: currentFilter };
    
    $.ajax({
        url: url,
        method: "GET",
        data: data,
        dataType: "json",
        success: function(result) {
            displayProducts(result);
        }
    });
}

function displayProducts(products) {
    var itemContainer = $("#item");
    itemContainer.empty();

    if (Array.isArray(products) && products.length > 0) {
        products.forEach(function(product) {
            var productHtml = `
            <div class="box">    
                <a href="product.php?id=${product.id}">
                    
                        <h3>${product.nama}</h3>
                        <div class="img-box">
                            <img class="images" src="img/${product.img1}" alt="Product Image">
                        </div> 
                        <div class="bottom">
                            <h3>Rp${product.harga}</h3>
                            <h2>${product.lokasi}</h2>
                        </div>
                
                </a>
            </div>
            `;
            itemContainer.append(productHtml);
        });
    } else {
        itemContainer.append('<div class="nowGone"><h1>Produk Tidak Tersedia</h1></div>');
    }
}

$(document).ready(function() {
    fetchData();

});
</script>
</body>
    <footer>
        <p>Created by<strong> IP3</strong></a>. | &copy; 2023.</p>
    </footer>
</html>
