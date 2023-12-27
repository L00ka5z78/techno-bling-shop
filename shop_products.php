<?php
include 'connect.php';

if (isset($_POST['add_to_cart'])) {
    $products_name = $_POST['product_name'];
    $producs_price = $_POST['product_price'];
    $products_image = $_POST['product_image'];

    $product_quantity = 1;

    // insert cart data in cart table in db
    $insert_products = mysqli_query($conn, "INSERT INTO `cart` (`name`, `price`, `image`, `quantity`) VALUES ('$products_name', '$producs_price', '$products_image', $product_quantity)");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop products</title>

    <!-- css fle -->
    <link rel="stylesheet" href="css/style.css">
    <!-- https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!-- header -->
    <?php include 'header.php' ?>

    <div class="container">
        <section class="products">
            <h1 class="heading">Lets shop</h1>
            <div class="product_container">

                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products`");
                if (mysqli_num_rows($select_products) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                        // echo $fetch_product['name'];
                ?>

                        <form action="" method="post">
                            <div class="edit_form">
                                <img src="images/headphone.jpg" alt="">
                                <h3>Headphone</h3>
                                <div class="price">Price$: 11000</div>
                                <input type="hidden" name="product_name">
                                <input type="hidden" name="product_price">
                                <input type="hidden" name="product_image">

                                <input type="submit" class="submit_btn cart_btn" value="Add to cart" name="add_to_cart">
                            </div>

                        </form>
                <?php
                    }
                } else {
                    echo "<div class='empty_text' >No products availabel</div>";
                }
                ?>



            </div>
        </section>
    </div>
</body>

</html>