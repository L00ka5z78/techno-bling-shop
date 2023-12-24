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
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Image</td>
                        <td>Laptop</td>
                        <td>12000</td>
                        <td>
                            <a href="" class="delete_product_btn"><i class="fas fa-trash"></i></a>
                            <a href="" class="update_product_btn"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</body>

</html>