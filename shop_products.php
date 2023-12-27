<?php
include 'connect.php';

if (isset($_POST['add_to_cart'])) {
    $products_name                  = $_POST['product_name'];
    $producs_price                  = $_POST['product_price'];
    $products_image                 = $_POST['product_image'];

    $product_quantity               = 1;
    // select cart data based on condition
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE `name` = '$products_name'");
    if (mysqli_num_rows($select_cart) > 0) {
        $display_message[] = "Product already in cart";
    } else {
        // insert cart data in cart table in db
        $insert_products = mysqli_query($conn, "INSERT INTO `cart` (`name`, `price`, `image`, `quantity`) VALUES ('$products_name', '$producs_price', '$products_image', $product_quantity)");
        $display_message[] = "Product added to cart";
    }
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

        <?php
        if (isset($display_message)) {

            foreach ($display_message as $display_message) {
                echo "
    <div class='display_message'>
        <span>$display_message</span>
        <i class='fas fa-times' onclick='this.parentElement.style.display=`none`;'></i>
    </div>
    ";
            };
        }
        ?>

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
                                <img src="images/<?php echo $fetch_product['image'] ?>" alt="">
                                <h3><?php echo $fetch_product['name'] ?></h3>
                                <div class="price">Price: <?php echo $fetch_product['price'] ?></div>
                                <input type="hidden" name="product_name" value="<?php echo $fetch_product['name'] ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_product['price'] ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_product['image'] ?>">

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