<?php include 'connect.php';

if (isset($_POST['add_product'])) {
    $product_name               = $_POST['product_name'];
    $product_price              = $_POST['product_price'];
    $product_image              = $_FILES['product_image']['name'];
    $product_image_temp_name    = $_FILES['product_image']['tmp_name'];
    $product_image_folder       = 'images/' . $product_image;


    $insert_query               = mysqli_query($conn, "
        INSERT 
        INTO
            `products` 
            (name,price,image) 
        VALUES(
            '$product_name',
            '$product_price',
            '$product_image'
          )")
        or die("Invalid insert");

    if ($insert_query) {
        move_uploaded_file($product_image_temp_name, $product_image_folder);
        $display_message        = "product inserted successfully";
    } else {
        $display_message        = "error during inserting product";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart project</title>
    <!-- css fle -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!-- include header -->
    <?php include("header.php") ?>
    <!-- form section -->
    <div class="container">
        <!-- message display -->
        <?php
        if (isset($display_message)) {
            echo "<div class='display_message'>
            <span>$display_message</span>
            <i class='fas fa-times' onclick='this.parentElement.style.display=`none`';></i>
        </div>";
        }
        ?>
        <section>
            <h3 class="heading">Add products</h3>
            <form action="" class="add_product" method="post" enctype="multipart/form-data">
                <input name="product_name" type="text" placeholder="enter product name" class="input_fields" required>
                <input name="product_price" type="number" min="0" placeholder="enter product price" class="input_fields" required>
                <input name="product_image" type="file" class="input_fields" required accept="image/png, image/jpg, image/jpeg">
                <input name="add_product" type="submit" class="submit_btn" value="Add Product">

            </form>
        </section>
    </div>

    <!-- js file -->
    <script src="js/script.js"></script>
</body>

</html>