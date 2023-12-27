<!-- delete logic -->

<?php
include 'connect.php';

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "
    DELETE 
    FROM 
        `products` 
    WHERE 
        `id`=
        $delete_id
    ")
        or die("Invalid query");
    if ($delete_query) {
        echo "Product deleted";
        header("Location:view_products.php");
    } else {
        echo "Product not deleted";
        header("Location:view_products.php");
    }
}
