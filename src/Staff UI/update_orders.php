<?php
    $page_title = "Tasty Tongue - Change Staff Infomation";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

    $reservation_id = $_GET['id'];
    $product_id = $_GET['product_id'];

    global $conn;

    $sql = "SELECT * FROM orders where reservation_id = {$reservation_id} and prod_id = {$product_id}";
    $result = mysqli_query($conn, $sql);

    $order = [];
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        if (!$row) {
            $order = [
                'status' => 'No Data Found',
                'query' => $sql,
            ];
        } else {
            $order = [
                'status' => 'Data Found',
                'data' => $row,
                'query' => $sql,
            ];
        }
    } 
    else 
    {
        $order = [
            'status' => 'Something went wrong! Please try again.',
        ];
    }

    $product = getbyKeyValue('products', 'prod_id',$product_id);
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
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Please Fill All Fields</p>
                        </div>
                        
                        <div class="container-recent__body card__body-form">
                            <form method="POST" action="../Controller/StaffController/update_order.php">
                              
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Reservation ID</label>
                                            <input type="text" name="reservation_id" class="form-control" value="<?php echo $order['data']['reservation_id']; ?>" readonly>
                                        </div>

                                        <input type="hidden" name="product_id" class="form-control" value="<?php echo $order['data']['prod_id'];?>">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Name</label>
                                            <input type="text" name="product_name" class="form-control" value="<?php echo $product['data']['prod_name'];?>" readonly>
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Price</label>
                                            <input type="number" name="price" class="form-control" value="<?php echo $order['data']['unit_price'];?>" readonly>
                                        </div>  

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Quantity</label>
                                            <input type="number" name="quantity" class="form-control" value="<?php echo $order['data']['quantity'];?>">
                                        </div>                     
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updateOrder" value="Update Order" class="btn-control btn-control-add">
                                        </div>
                                    </div>
                                </div>

                            </form>
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