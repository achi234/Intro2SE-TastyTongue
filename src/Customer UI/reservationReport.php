<?php
session_start();

//echo "Role is {$_SESSION['role']} ";
?>

<?php
$page_title = "Tasty Tongue - Reservation Report";
//require_once('../config/config.php');
// include('../config/config.php');
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
                    <div class="heading_container heading_center">
                        <h2 class="text-green">
                            Reservation Report
                        </h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 align-self-center">
                            <div class="report-box">
                                <h4>
                                    You have a reservation!
                                </h4>
                                <ul class="reservation-detail">
                                    <li> Table code: </li>
                                    <li> Party size: </li>
                                    <li> Reservation Date&Time: </li>
                                </ul>
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