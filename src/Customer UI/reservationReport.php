
<?php
$page_title = "Tasty Tongue - Reservation Report";
include('../config/config.php');
include('../Controller/authenticate.php');
require_once('partials/_head.php');
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

                            <!-- <h4>
                                    You have a reservation!
                                </h4> -->
                            <?php
                            $user_id = $_SESSION['id'];
                            $sql = "SELECT* FROM RESERVATION_LIST RL, TABLE_LIST TL
                                 WHERE RL.TABLE_ID = TL.TABLE_ID 
                                  AND  USER_ID = '$user_id'
                                  AND RL.STATUS = '0'
                                  ORDER BY RL.DATETIME DESC";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <div class="report-box" style="margin-bottom: 10px;">
                                    <table class="table align-items-center table-flush">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <ul class="reservation-detail">
                                                        <li> Table name: <?php echo $row['table_name'] ?> </li>
                                                        <li> Party size: <?php echo $row['party_size'] ?></li>
                                                        <li> Reservation Date&Time: <?php echo $row['datetime'] ?> </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a href="../Controller/CustomerController/deleteReservation.php?reservation_id=<?php echo $row['reservation_id']; ?>">
                                                        <button class="btn btn-sm btn-warning">Delete</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            }
                            ?>
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