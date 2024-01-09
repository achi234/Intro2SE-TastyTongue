
<?php
$page_title = "Tasty Tongue - Homepage";
include('./config/config.php');
//include('../Controller/authenticate.php');
require_once('partial/_head.php');
$products= getAll('products');
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
            <div class="hero_area">
                <div class="bg-box">
                    <img src="./assets/image/hero-bg.jpg" alt="promotions">
                </div>
                <!-- slider section -->
                <section class="slider_section ">
                    <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container ">
                                    <div class="row">
                                        <div class="col-md-7 col-lg-6 ">
                                            <div class="detail-box">
                                                <h1>
                                                    Tasty Tongue 
                                                </h1>
                                                <p>
                                                    Doloremque, itaque aperiam facilis rerum, commodi, temporibus
                                                    sapiente ad mollitia laborum quam quisquam esse error unde. Tempora
                                                    ex doloremque, labore, sunt repellat dolore, iste magni quos nihil
                                                    ducimus libero ipsam.
                                                </p>
                                                <div class="btn-box">
                                                    <a href="menu.php" class="btn1">
                                                        Browse Menu
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item ">
                                <div class="container ">
                                    <div class="row">
                                        <div class="col-md-7 col-lg-6 ">
                                            <div class="detail-box">
                                                <h1>
                                                    Tasty Tongue
                                                </h1>
                                                <p>
                                                    Doloremque, itaque aperiam facilis rerum, commodi, temporibus
                                                    sapiente ad mollitia laborum quam quisquam esse error unde. Tempora
                                                    ex doloremque, labore, sunt repellat dolore, iste magni quos nihil
                                                    ducimus libero ipsam.
                                                </p>
                                                <div class="btn-box">
                                                    <a href="login.php" class="btn1">
                                                        Order Now
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container ">
                                    <div class="row">
                                        <div class="col-md-7 col-lg-6 ">
                                            <div class="detail-box">
                                                <h1>
                                                    Tasty Tongue
                                                </h1>
                                                <p>
                                                    Doloremque, itaque aperiam facilis rerum, commodi, temporibus
                                                    sapiente ad mollitia laborum quam quisquam esse error unde. Tempora
                                                    ex doloremque, labore, sunt repellat dolore, iste magni quos nihil
                                                    ducimus libero ipsam.
                                                </p>
                                                <div class="btn-box">
                                                    <a href="login.php" class="btn1">
                                                        Book Now!
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <ol class="carousel-indicators">
                                <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                                <li data-target="#customCarousel1" data-slide-to="1"></li>
                                <li data-target="#customCarousel1" data-slide-to="2"></li>
                            </ol>
                        </div>
                    </div>

                </section>
                <!-- end slider section -->
            </div>

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
            <div class="container">
              <div class="row grid">
                <?php foreach ($products['data'] as $product) { ?>
                  <div class="col-sm-6 col-lg-4">
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
            <!-- about section -->

            <section class="about_section layout_padding">
                <div class="container  ">

                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="img-box">
                                <img src="./assets/image/about-img.png" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-box">
                                <div class="heading_container">
                                    <h2>
                                        We Are Tasty Tongue
                                    </h2>
                                </div>
                                <p>
                                    Tasty Tongue was first founded by Lucid J in 1990. In this long journey, we have 
                                        never stopped enhancing our food quality as well as our services.
                                    Our first priority is customer's satisfaction and we want to make sure you would always 
                                        enjoy your time at this comfortable place.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- end about section -->
            <div class="layout-padding"> 

            </div>
            <!-- Footer -->
            <?php require_once('partial/_footer.php'); ?>
        </div>
    </div>

</body>

</html>