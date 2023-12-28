  <!-- header -->
  <header class="header">
      <div class="header_body">
          <a href="index.php" class="logo">Technobling</a>
          <nav class="navbar">
              <a href="index.php">Add product</a>
              <a href="view_products.php">View Product</a>
              <a href="shop_products.php">Shopit</a>
          </nav>

          <!-- select query -->
          <?php
            $select_product         = mysqli_query($conn, "SELECT * FROM `cart`") or die("Invalid query");
            $row_count              = mysqli_num_rows($select_product);
            echo $row_count;
            ?>

          <!-- shopping cart icon -->
          <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php echo $row_count ?></sup></span></a>
          <!-- <div id="menu-btn" class="fas fa-bars"></div> -->
      </div>
  </header>