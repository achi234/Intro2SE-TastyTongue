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
                            <a href="add_product.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-utensils btn-control-icon"></i>
                                Add New Product
                            </a>
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Search by code, name..." name>
                                <a href="" class="btn-control btn-control-search">
                                    <i class="fa-solid fa-magnifying-glass btn-control-icon"></i>
                                    Search
                                </a>                        
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light"> 
                                    <tr>
                                        <th class="text-column" scope="col">IMAGE</th> 
                                        <th class="text-column" scope="col">PRODUCT CODE</th> 
                                        <th class="text-column" scope="col">NAME</th> 
                                        <th class="text-column" scope="col">PRICE</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column" scope="row">
                                            <img src="http://localhost/RestaurantPOS/Restro/admin/assets/img/products/cheesestk.jpg" height="60" width="60" class="img-thumbnail">
                                        </th> 
                                        <th class="text-column" scope="row">FCWU-5762</th> 
                                        <th class="text-column" scope="row">Philly Cheesesteak</th> 
                                        <th class="text-column" scope="row">$ 7</th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="" class="btn-control btn-control-delete">
                                                    <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                    Delete
                                                </a>
                                                <a href="" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-user-pen btn-control-icon"></i>
                                                    Update
                                                </a>
                                            </div>
                                        </th> 
                                    </tr>
                                    
                                    <tr>
                                        <th class="text-column" scope="row">
                                            <img src="http://localhost/RestaurantPOS/Restro/admin/assets/img/products/cheesestk.jpg" height="60" width="60" class="img-thumbnail">
                                        </th> 
                                        <th class="text-column" scope="row">FCWU-5762</th> 
                                        <th class="text-column" scope="row">Philly Cheesesteak</th> 
                                        <th class="text-column" scope="row">$ 7</th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="" class="btn-control btn-control-delete">
                                                    <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                    Delete
                                                </a>
                                                <a href="" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-user-pen btn-control-icon"></i>
                                                    Update
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
            <?php 
            require_once('partials/_footer.php'); 
            ?>
        </div>
    </div>

</body>
</html>