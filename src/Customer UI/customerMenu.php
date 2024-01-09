<?php
$page_title = "Tasty Tongue - Customer Menu";
include('../config/config.php');
include('../Controller/authenticate.php');
require_once('partials/_head.php');
$products = getAll('products');
?>

<body>
  <!-- Main content -->
  <div class="main-content">
    <div class="content">
      <!-- Top navbar -->
      <?php
      require_once('partials/topnav.php');
      ?>

      <!-- Page content -->

      <!-- food section -->
      <section class="food_section layout_padding">
        <div class="container">
          <div class="heading_container heading_center">
            <h2 class="text-green">
              Our Menu
            </h2>
          </div>
          <div class="input-group rounded search-bar">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
              aria-describedby="search-addon" />
            <button type="submit" class="btn btn-primary yellow-btn" data-mdb-ripple-init>
              <i class="fa fa-search"></i>
            </button>
          </div>

          <div id="filters_menu">
            <div class="container">
              <div class="row grid">
                <?php foreach ($products['data'] as $product) { ?>
                  <div class="col-sm-6 col-lg-4">
                    <div class="box">
                      <div>
                        <div class="img-box">
                          <img src="../assets/image/products/<?php echo $product['prod_img'] ?>" alt="">
                        </div>
                        <div class="detail-box" style="overflow-y:auto;">
                          <h5>
                            <?php echo $product['prod_name'] ?>
                          </h5>
                          <p>
                            <?php echo $product['prod_desc'] ?>
                          </p>
                          <div class="options">
                            <h6>
                              $
                              <?php echo $product['prod_price'] ?>
                            </h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end food section -->


      <!-- Footer -->
      <?php require_once('partial/_footer.php'); ?>
    </div>
  </div>

</body>

</html>