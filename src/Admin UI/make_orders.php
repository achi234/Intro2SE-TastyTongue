<?php
    $page_title = "Tasty Tongue - Menu";
    require_once('partials/_head.php');
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
                    <form action="" method="POST" class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Select On Any Product To Make An Order</p>
                            
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Search by code, name..." name="search_text" value="">
                                <button class="btn-control btn-control-search" name="btn-search">
                                    <i class="fa-solid fa-magnifying-glass btn-control-icon"></i>
                                    Search
                                </button>      
                            </div>
                        </div>

                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table">
                                <thead class="thead-light"> 
                                    <tr>
                                        <th class="text-column" scope="col">IMAGE</th> 
                                        <!-- <th class="text-column" scope="col">PRODUCT CODE</th>  -->
                                        <th class="text-column" scope="col">NAME</th> 
                                        <th class="text-column" scope="col">PRICE</th> 
                                        <th class="text-column" scope="col">QUANTITY</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column" scope="row">
                                            <img src="http://localhost/RestaurantPOS/Restro/admin/assets/img/products/cheesestk.jpg" height="60" width="60" class="img-thumbnail">
                                        </th> 
                                        <!-- <th class="text-column" scope="row">FCWU-5762</th>  -->
                                        <th class="text-column" scope="row">Philly Cheesesteak</th> 
                                        <th class="text-column" scope="row">$ 7</th> 
                                        <th class="text-column" scope="row">
                                            <input type="number" name="product_quantity" class="form-control" value>
                                        </th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="" class="btn-control btn-control-warning">
                                                    <i class="fa-solid fa-clipboard-check btn-control-icon"></i>
                                                    Place Order
                                                </a>
                                            </div>
                                        </th> 
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </form>
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