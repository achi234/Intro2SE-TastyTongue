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
                        <div class="container-recent__heading heading__button">
                            <a href="make_order.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-plus"></i>
                                <i class="fa-solid fa-utensils btn-control-icon"></i>
                                Make A New Order
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">CODE</th> 
                                        <th class="text-column" scope="col">CUSTOMER</th> 
                                        <th class="text-column" scope="col">PRODUCT</th> 
                                        <th class="text-column" scope="col">TOTAL PRICE</th> 
                                        <th class="text-column" scope="col">DATE</th> 
                                        <th class="text-column" scope="col">ACTION</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">SKDW-2134</th> 
                                        <th class="text-column" scope="row">Delbert G. Campbell</th> 
                                        <th class="text-column" scope="row">Philly Cheesesteak</th> 
                                        <th class="text-column" scope="row">$ 14</th> 
                                        <th class="text-column" scope="row">09/Dec/2023 5:15</th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="" class="btn-control btn-add-success">
                                                    <i class="fa-solid fa-handshake btn-control-icon"></i>
                                                    Pay Order
                                                </a>

                                                <a href="" class="btn-control btn-control-delete">
                                                    <i class="fa-solid fa-rectangle-xmark btn-control-icon"></i>
                                                    Cancel Order
                                                </a>
                                            </div>
                                        </th> 
                                    </tr>
                                    
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div class="footer">
                <div class="container footer__content">
                    <p class="footer__content-develop">December, 2023 - Intro2SE</p>
                    <a href="dashboard.php" class="footer__content-brand-name">Tasty Tongue</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>