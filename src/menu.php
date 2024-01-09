<?php
session_start();
//echo "Role is {$_SESSION['role']} ";
?>

<?php
$page_title = "Tasty Tongue - Menu";
include('./config/config.php');
//include('../Controller/authenticate.php');
require_once('partial/_head.php');
$categories = getAll('category');
?>

<body>
  <!-- Main content -->
  <div class="main-content">
    <div class="content">
      <!-- Top navbar -->
      <?php
      require_once('partial/topnav.php');
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
            <!-- <li class="active" data-filter="*">All</li>
            <li data-filter=".burger">Burger</li>
            <li data-filter=".pizza">Pizza</li>
            <li data-filter=".pasta">Pasta</li>
            <li data-filter=".fries">Fries</li> -->

            <button class="btn active" onclick="filterSelection('all')"> All</button>
            <?php foreach ($categories['data'] as $category) { ?>
              <button class="btn" onclick="filterSelection('<?php $category['category_name'] ?>')">
                <?php echo $category['category_name'] ?>
              </button>
            <?php } ?>

            <?php foreach ($categories['data'] as $category) { ?>
              <!-- Product -->
              <?php $products = getAllByKeyValue('products', 'prod_cat', $category['category_id']) ?>
              <div class="container">
                <div class="row grid">
                <?php foreach ($products['data'] as $product) { ?>
                      <div class="col-sm-6 col-lg-4 filterDiv <?php $category['category_name'] ?>">
                        <div class="box">
                          <div>
                            <div class="img-box">
                              <img src="./assets/image/products/<?php echo $product['prod_img'] ?>" alt="">
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
                                  $<?php echo $product['prod_price'] ?>
                                </h6>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                </div>
              </div>
            <?php } ?>
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