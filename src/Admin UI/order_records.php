<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
require_once('partials/_analytics.php');
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
                            <p class="recent__heading-title">Orders Records</p>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">CODE</th> 
                                        <th class="text-column" scope="col">CUSTOMER</th> 
                                        <th class="text-column-emphasis" scope="col">PRODUCT</th> 
                                        <th class="text-column" scope="col">UNIT PRICE</th> 
                                        <th class="text-column-emphasis" scope="col">QTY</th> 
                                        <th class="text-column" scope="col">TOTAL</th> 
                                        <th class="text-column" scope="col">STATUS</th> 
                                        <th class="text-column-emphasis" scope="col">DATE</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">Irish Coffee</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-success">Paid</span>
                                        </th> 
                                        <th class="text-column-emphasis" scope="row">04/Sep/2022 11:37</th> 
                                    </tr>

                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">Irish Coffee</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-success">Paid</span>
                                        </th> 
                                        <th class="text-column-emphasis" scope="row">04/Sep/2022 11:37</th> 
                                    </tr>
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