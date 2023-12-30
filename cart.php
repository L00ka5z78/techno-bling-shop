<?php include 'connect.php';

//update query
if (isset($_POST['update_product_quantity'])) {
    $update_value               = $_POST['update_quantity'];
    // echo $update_value;
    $update_id                  = $_POST['update_quantity_id'];
    // echo $update_id;
    //query
    $update_quantity_query      = mysqli_query($conn, "
        UPDATE 
            `cart` 
        SET 
            `quantity` = 
            $update_value 
        WHERE 
            `id` = 
            $update_id
        ");
    // echo "update succesful";
    if ($update_quantity_query) {
        header("Location:cart.php");
    }
}
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    // echo $remove_id;
    mysqli_query($conn, "DELETE FROM `cart` WHERE `id` = $remove_id");
    header('Location:cart.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- css fle -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!-- include header -->
    <?php include 'header.php'; ?>
    <div class="container">
        <section class="shopping_cart">
            <h1 class="heading">My cart</h1>
            <table>

                <?php
                $select_cart_products = mysqli_query($conn, "SELECT * FROM `cart`");
                $num = 1;
                $grand_total = 0;

                if (mysqli_num_rows($select_cart_products) > 0) {
                    echo "  <thead>
                    <th>Sl No</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </thead>
                <tbody>";

                    while ($fetch_cart_products = mysqli_fetch_assoc($select_cart_products)) {
                ?>
                        <tr>
                            <td><?php echo $num; ?></td>
                            <td><?php echo $fetch_cart_products['name']; ?></td>
                            <td><img src="images/<?php echo $fetch_cart_products['image']; ?>" alt=""></td>
                            <td>$<?php echo $fetch_cart_products['price']; ?>/-</td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $fetch_cart_products['id']; ?>" name="update_quantity_id">
                                    <div class="quantity_box">
                                        <input type="number" min="1" value="<?php echo $fetch_cart_products['quantity']
                                                                            ?>" name="update_quantity">
                                        <input type="submit" class="update_quantity" value="Update" name="update_product_quantity">
                                    </div>
                                </form>
                            </td>
                            <td>$<?php echo $subtotal = number_format($fetch_cart_products['price'] * $fetch_cart_products['quantity']) ?>/-</td>
                            <td><a href="cart.php?remove=<?php echo $fetch_cart_products['id'] ?>" onclick="return confirm('ARE YOU SURE you want to delete this item?')" ;>
                                    <i class="fas fa-trash"></i>Remove
                                </a></td>
                        </tr>
                <?php
                        $grand_total += ($fetch_cart_products['price'] * $fetch_cart_products['quantity']);
                        // $grand_total = $grand_total + ($fetch_cart_products['price'] * $fetch_cart_products['quantity']);
                        $num++;
                    }
                } else {
                    echo "<div class='empty_text'>Cart is empty</div>";
                }
                ?>

                </tbody>
            </table>
            <!-- bottom area -->
            <div class="table_bottom">
                <a href="shop_products.php" class="bottom_btn">Continue shopping</a>
                <h3 class="bottom_btn">Grand total: <span>$<?php echo $grand_total ?>/-</span></h3>
                <a href="checkout.php" class="bottom_btn">Proceed to checkout</a>
            </div>
            <a href="" class="delete_all_btn">
                <i class="fas fa-trash">Delete all</i>
            </a>
        </section>
    </div>

</body>

</html>