<?php include 'connect.php'; ?>

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
                <thead>
                    <th>Sl No</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Laptop</td>
                        <td><img src="images/laptop.jpg" alt=""></td>
                        <td>25000/-</td>
                        <td>
                            <div class="quantity_box">
                                <input type="number" min="1">
                                <input type="submit" class="update_quantity" value="Update">
                            </div>
                        </td>
                        <td>25000/-</td>
                        <td><a href="">
                                <i class="fas fa-trash"></i>Remove
                            </a></td>
                    </tr>
                </tbody>
            </table>
            <!-- bottom area -->
            <div class="table_bottom">
                <a href="shop_products.php" class="bottom_btn">Continue shopping</a>
                <h3 class="bottom_btn">Grand total: <span>25000/-</span></h3>
                <a href="checkout.php" class="bottom_btn">Proceed to checkout</a>
            </div>
            <a href="" class="delete_all_btn">
                <i class="fas fa-trash">Delete all</i>
            </a>

        </section>
    </div>

</body>

</html>