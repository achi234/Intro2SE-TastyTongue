<?php
    $page_title = "Tasty Tongue - Order List";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');
    $reservation_id = $_GET['id'];
    $orders = getAllByKeyValue('orders', 'reservation_id',$reservation_id);
    $reservation = getbyKeyValue('reservation_list', 'reservation_id', $reservation_id);
    
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
            <!-- Order Records -->
            <div class="container">
                <div class="container-recent">
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Orders Records</p>
                        </div>

                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">CUSTOMER</th> 
                                        <th class="text-column" scope="col">PRODUCT</th> 
                                        <th class="text-column" scope="col">UNIT PRICE</th> 
                                        <th class="text-column" scope="col">QTY</th> 
                                        <th class="text-column" scope="col">TOTAL</th> 
                                        <th class="text-column" scope="col">ACTION</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <?php 
                                    if($orders['status'] == 'Data Found')
                                    {
                                        foreach($orders['data'] as $order)
                                        {
                                            $customer = getbyKeyValue('users', 'id', $reservation['data']['user_id']);
                                            $product = getbyKeyValue('products', 'prod_id', $order['prod_id']);
                                    ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $customer['data']['fullname']; ?></th> 
                                        <th class="text-column" scope="row"><?php echo $product['data']['prod_name']; ?></th> 
                                        <th class="text-column" scope="row">$<?php echo $order['unit_price']; ?></th> 
                                        <th class="text-column" scope="row"><?php echo $order['quantity']; ?></th> 
                                        <th class="text-column" scope="row">$<?php echo $order['total_price']; ?></th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="../Controller/AdminController/delete_order.php?id=<?php echo $order['reservation_id'];?>&product_id=<?php echo $order['prod_id'];?>" class="btn-control btn-control-delete">
                                                    <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                    Delete
                                                </a>
                                                <a href="update_orders.php?id=<?php echo $order['reservation_id'];?>&product_id=<?php echo $order['prod_id'];?>" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-pen-to-square btn-control-icon"></i>
                                                    Update
                                                </a>
                                            </div>
                                        </th>
                                    </tr>
                                    <?php
                                        }
                                    }
                                    else
                                    {
                                    ?>
                                     <tr>
                                     <th class="text-column" scope="row">No data found</th>
                                    <?php
                                    }
                                    ?>
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