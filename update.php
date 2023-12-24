<?php
include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update product</title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?php include 'header.php' ?>
    <section class="edit_container">
        <!-- php code -->
        <?php
        if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];
            // echo $edit_id;
            $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id=$edit_id");
            if (mysqli_num_rows($edit_query) > 0) {
                $fetch_data = mysqli_fetch_assoc($edit_query);
                $row = $fetch_data['price'];
                echo $row;

        ?>

                <!-- form     -->
                <form action="" method="post" enctype="multipart/form-data" class="update_product product_container_box">
                    <img src="" alt="">
                    <input type="hidden">
                    <input type="text" class="input_fields fields" required>
                    <input type="number" class="input_fields fields" required>
                    <input type="file" class="input_fields fields" required accept="image/png, image/jpg, image/jpeg">
                    <div class="btns">
                        <input type="submit" class="edit_btn">
                        <input type="reset" id="close-edit" value="Cancel" class="cancel_btn">
                    </div>
                </form>
        <?php

            }
        }
        ?>


    </section>
</body>

</html>