<?php
session_start();

//echo "Role is {$_SESSION['role']} ";
?>

<?php
$page_title = "Tasty Tongue - Reservation";
require_once('../config/config.php');
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
                    <div class="heading_container">
                        <h2 class="text-green">
                            Make Reservation
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form_container">
                                <form action="../Controller/CustomerController/reservation.php" method="post">
                                    <h4 class="text-green">
                                        Available tables
                                    </h4>
                                    <div>
                                        <!-- Note -->
                                        <!-- <label class="btn custom_btn-radio active">
                                            <input type="radio" name="options" id="option1" autocomplete="off"> Active
                                        </label>
                                        <label class="btn custom_btn-radio">
                                            <input type="radio" name="options" id="option2" autocomplete="off"> Radio
                                        </label> -->
                                        <!-- chỗ này là demo thoai, nào ông xong cái BE thì chỉnh lại hoặc nói tui 
                                        chỉnh lại sao cho nó tự generate ra nha -->
                                        <?php
                                        $datetime = $_SESSION['datetime'];
                                        $size = $_SESSION['size'];

                                        $sql = "SELECT table_name, table_id FROM table_list WHERE table_name NOT IN (
                                            SELECT table_name FROM reservation_list WHERE datetime = '$datetime'
                                        ) AND size >= $size";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                        ?>
                                            <label class="btn custom_btn-radio">
                                                <input type="radio" name="table_id" value="<?php echo $row['table_id']?>"> <?php echo $row['table_name']?>
                                            </label>
                                        </br>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="btn_box">
                                        <button>
                                        <input type="submit">
                                            
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