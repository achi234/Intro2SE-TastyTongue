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
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form_container">
                                <form action="">
                                    <h4 class="text-green">
                                        Available tables
                                    </h4>
                                    <div>
                                        <!-- Note -->
                                        <label class="btn custom_btn-radio active">
                                            <input type="radio" name="options" id="option1" autocomplete="off"> Active
                                        </label>
                                        <label class="btn custom_btn-radio">
                                            <input type="radio" name="options" id="option2" autocomplete="off"> Radio
                                        </label>
                                        <!-- chỗ này là demo thoai, nào ông xong cái BE thì chỉnh lại hoặc nói tui 
                                        chỉnh lại sao cho nó tự generate ra nha -->
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