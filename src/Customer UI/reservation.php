<?php
session_start();
//echo "Role is {$_SESSION['role']} ";
?>

<?php
$page_title = "Tasty Tongue - Reservation";
//include('../config/config.php');
//include('../Controller/authenticate.php');
require_once('partials/_head.php');
//require_once('partials/_analytics.php');
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

            <!-- book section -->
            <section class="book_section layout_padding">
                <div class="container">
                    <div class="heading_container">
                        <h2 class="text-green">
                            Make Reservation
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form_container">
                                <form action="../Controller/CustomerController/reservation.php" method="post">
                                    <div>
                                        <span> Party size </span>
                                        <input type="text" class="form-control" placeholder="Number only" name="size" />
                                    </div>
                                    <div>
                                        <span> Reservation Date&Time </span>
                                        <input type="datetime-local" class="form-control" name="datetime">
                                    </div>
                                    <div class="btn_box">
                                        <button>
                                            <input type="submit" value="Submit">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="map_container reservation">
                                <div class="img-box">
                                    <img src="../assets/image/floor_plan.png" alt="table-map">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end book section -->

            <!-- Footer -->
            <?php require_once('partials/_footer.php'); ?>
        </div>
    </div>

</body>

</html>