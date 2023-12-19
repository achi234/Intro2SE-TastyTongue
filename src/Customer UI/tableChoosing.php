<?php
//session_start();
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
                        <h4 class="text-green" style="padding-top:10px">
                            Available tables
                        </h4>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form_container">
                                <form action="">
                                    <div>
                                        <input type="radio" class="form-control">
                                        <label for="table1">T101</label>
                                        <input type="radio" class="form-control">
                                        <label for="table2">T102</label>
                                    </div>
                                    <div class="btn_box">
                                        <button>
                                            Confirm
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