<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart project</title>
    <!-- css fle -->
    <link rel="stylesheet" href="css/style.css">



    <!-- https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <!-- include header -->
    <?php include("header.php") ?>


    <!-- form section -->
    <div class="container">
        <section>
            <h3 class="heading">Add products</h3>
            <form action="" class="add_product">
                <input type="text" placeholder="enter product name" class="input_fields" required>
                <input type="number" min="0" placeholder="enter product price" class="input_fields" required>
                <input type="file" class="input_fields" required>
                <input type="submit" class="submit_btn" value="Add Product">

            </form>
        </section>
    </div>




    <!-- js file -->
    <script src="js/script.js"></script>
</body>

</html>