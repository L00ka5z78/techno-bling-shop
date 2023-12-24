<!-- including php logic: db connection -->
<?php include 'connect.php' ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View products</title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!-- include header -->
    <?php include("header.php") ?>
    <!-- container -->
    <div class="container">
        <section class="display_product">
            <table>
                <thead>
                    <th>Sl No</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </thead>
                <!-- php logic -->
                <?php
                $display_product = mysqli_query($conn, "SELECT * FROM `products`");
                // correct serial number disaly
                $num = 1;

                if (mysqli_num_rows($display_product) > 0) {
                    // logic to fetch data

                    while ($row = mysqli_fetch_assoc($display_product)) {
                        // $product_name = $row['name'];
                ?>
                        <!-- display table/ -->
                        <tr>
                            <td><?php echo $num ?></td>
                            <td><img src="images/<?php echo $row['image'] ?>" alt=""></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['price'] ?> </td>
                            <td>
                                <a href="delete.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure?');" class="delete_product_btn"><i class="fas fa-trash"></i></a>
                                <a href="" class="update_product_btn"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                <?php
                        // number increase each time the loop is runing again
                        $num++;
                    }
                } else {
                    echo "No products availabel";
                }
                ?>
                <tbody>

                </tbody>
            </table>
        </section>
    </div>
</body>

</html>