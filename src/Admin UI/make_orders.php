<?php
    $page_title = "Tasty Tongue - Dish List";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

    $products = getAll('products',1);
    $reservation_id = $_GET['id'];
    $status = $_GET['status'];

    $reservation = getbyKeyValue('reservation_list', 'reservation_id', $reservation_id);
    $table_id = $reservation['data']['table_id'];

    switch($status)
    {
        case 0:
            redirect('./update_reservations.php?id='.$reservation_id, 'You should update customer arrival to order', '');
        case 2:
            redirect('./update_tables.php?id='.$table_id, 'Customer has checked out, cannot order', '');
    }
        
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
                <div class="container-recent container-recent-inner">
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
                                        <th class="text-column" scope="col">NAME</th> 
                                        <th class="text-column" scope="col">PRICE</th> 
                                        <th class="text-column" scope="col">QUANTITY</th> 
                                        <th class="text-column" scope="col">ACTION</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php foreach($products['data'] as $product) 
                                        {  ?>
                                        <form action="../Controller/AdminController/make_order.php" method="POST">
                                            <input type="hidden" name="product_id" value="<?php echo $product['prod_id']; ?>">
                                            <input type="hidden" name="reservation_id" value="<?php echo $reservation_id; ?>">
                                    <tr>

                                        <th class="text-column" scope="row">
                                            <?php
                                                if ($product['prod_img']) {
                                                ?> 
                                                <img src="../assets/image/products/<?php echo $product['prod_img']?>" height='60' width="60" class="img-thumbnail">
                                                <?php
                                                } else {
                                                ?>
                                                <img src='../assets/image/products/default.jpg' height='60' width='60 class='img-thumbnail'>
                                                <?php
                                                }
                                            ?>
                                        </th> 
                                        <th class="text-column" scope="row"><?php echo $product['prod_name']?></th> 
                                        <th class="text-column" scope="row">$<?php echo $product['prod_price']?></th> 
                                        <th class="text-column" scope="row">
                                            <input type="text" name="quantity" class="form-control">
                                        </th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action btn-control btn-control-warning">
                                                <input type="submit" name="btn-placeOrder" class="btn-control btn-control-warning" value=" Place Order">
                                                    <i class="fa-solid fa-clipboard-check btn-control-icon"></i>
                                            </div>
                                        </th> 
                                    </tr>
                                    </form>         
                                    <?php } ?>
                                    
                                </tbody>
                            </table>

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