<?php
// session_start();
$page_title = "Tasty Tongue - Reservation List";
require_once('partials/_head.php');
include('../config/config.php');
//require_once('partials/_analytics.php');
?>

<body>
    <!-- Sidebar -->
    <?php
    require_once('partials/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <div class="content">
            <!-- Top navbar -->
            <?php
            require_once('partials/_topnav.php');
            ?>
            <!-- Page content -->
            <div class="container">
                <div class="container-recent">
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Reservation Records</p>
                        </div>

                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table">

                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">CUSTOMER NAME</th>
                                        <th class="text-column" scope="col">SIZE</th>
                                        <th class="text-column-emphasis" scope="col">TABLE NAME</th>
                                        <th class="text-column" scope="col">DATE</th>
                                        <th class="text-column-emphasis" scope="col">STATUS</th>
                                        <th class="text-column" scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <?php
                                    $sql = "SELECT us.fullname as fullname,
                                                    rl.party_size as party_size,
                                                    tl.table_name as table_name,
                                                    rl.datetime as datetime,
                                                    rl.status as status
                                            FROM RESERVATION_LIST RL, TABLE_LIST TL, USERS US
                                            WHERE RL.TABLE_ID = TL.TABLE_ID 
                                            AND  RL.USER_ID = US.ID
                                            ORDER BY RL.DATETIME DESC";
                                    $result = $conn->query($sql);
                                    while ($row = $result->fetch_assoc()) {
                                        $status = $row["status"];
                                    ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $row['fullname'] ?></th>
                                        <th class="text-column" scope="row"><?php echo $row['party_size'] ?></th>
                                        <th class="text-column-emphasis" scope="row"><?php echo $row['table_name'] ?></th>
                                        <th class="text-column" scope="row"><?php echo $row['datetime'] ?></th>
                                        <th class="text-column-emphasis" scope="row">
                                            <?php 
                                            if( $status == '0') {
                                                echo '<span class="badge badge-done">Pending</span>';
                                            }
                                            if( $status == '1') {
                                                echo '<span class="badge badge-done">Arrived</span>';
                                            }
                                            if( $status == '2') {
                                                echo '<span class="badge badge-done">Done</span>';
                                            }
                                            ?>
                                            
                                        </th>
                                        <th class="text-column" scope="row">
                                            <button class="btn-control-delete">Delete</button>
                                            <button class="btn-control-edit">Update</button>
                                        </th>

                                    </tr>
                                    <?php } ?>
                                    <!-- <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th>
                                        <th class="text-column" scope="row">Christine Moore</th>
                                        <th class="text-column-emphasis" scope="row">T101</th>
                                        <th class="text-column" scope="row">04/Sep/2022 11:37</th>
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-done">Done</span>
                                        </th>
                                        <th class="text-column" scope="row">
                                            <button class="btn-control-delete">Delete</button>
                                            <button class="btn-control-edit">Update</button>
                                        </th>

                                    </tr>

                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th>
                                        <th class="text-column" scope="row">Christine Moore</th>
                                        <th class="text-column-emphasis" scope="row">T101</th>
                                        <th class="text-column" scope="row">04/Sep/2022 11:37</th>
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-pending">Pending</span>
                                        </th>
                                        <th class="text-column" scope="row">
                                            <button class="btn-control-delete">Delete</button>
                                            <button class="btn-control-edit">Update</button>
                                        </th>
                                    </tr> -->
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php
            require_once('partials/_footer.php');
            ?>
        </div>
    </div>

</body>

</html>