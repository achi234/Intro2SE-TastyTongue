<?php
    $page_title = "Tasty Tongue - Update Invoice";
    require_once('partials/_head.php');

    $invoice_id = $_GET['id'];
    $invoice = getbyKeyValue('invoices', 'invoice_id', $invoice_id);
    
    $reservation_id = $invoice['data']['reservation_id'];
    $orders = getAllByKeyValue('orders', 'reservation_id', $reservation_id);

    $reservations = getbyKeyValue('reservation_list', 'reservation_id', $reservation_id);

    $customer = getbyKeyValue('users', 'id', $reservations['data']['user_id']);
    $customer_name = $customer['data']['fullname'];
    
    $table = getbyKeyValue('table_list', 'table_id', $reservations['data']['table_id']);
    $table_id = $table['data']['table_id'];

    $payment = getbyKeyValue('payment_method', 'payment_id', $invoice['data']['payment_id']);
    $payment_method = $payment['data']['payment_name'];

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
                            <form method="POST" action="../Controller/StaffController/update_invoice.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <!-- <div class="form-col">
                                            <label for="" class="form-col__label">Reservation</label>
                                        </div> -->
                                        <input type="hidden" name="reservation_id" class="form-control" value="<?php echo $reservation_id; ?>">

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Customer</label>
                                            <h3 name="customer_name" class="form-control margin-0"><?php echo $customer_name;?></h3>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table Id</label>
                                            <h3 name="table_id" class="form-control margin-0"><?php echo $table_id;?></h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Total</label>
                                            <h3 name="total" class="form-control margin-0">$<?php echo $invoice['data']['total'];?></h3>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Date time</label>
                                            <h3 name="datetime_invoice" class="form-control margin-0"><?php echo $invoice['data']['datetime_invoice'];?></h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Invoice Status</label>
                                            <select name="status_invoice" class="form-cotrol">
                                            <?php if ($invoice['data']['status_invoice'] == 1 )
                                                { 
                                                ?>
                                                     <option value="1" selected> Paid </option>
                                                     <option value="0" > Unpaid </option>
                                                <?php
                                                }
                                                else
                                                {?>
                                                    <option value="0" selected> Unpaid </option>
                                                    <option value="1" > Paid </option>
                                                <?php
                                                }?>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Payment Method</label>
                                            <select name="payment_id" class="form-cotrol">
                                            <?php if ($invoice['data']['payment_id'] == 1 )
                                                { 
                                                ?>
                                                     <option value="1" selected> Cash </option>
                                                     <option value="2" > Paypal </option>
                                                <?php
                                                }
                                                else
                                                {?>
                                                    <option value="2" selected> Paypal </option>
                                                    <option value="1" > Cash </option>
                                                <?php
                                                }?>                                         
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-update-invoice" value="Update Invoice" class="btn-control btn-control-add">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            
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
                                        <th class="text-column-emphasis" scope="col">Reservation Id</th> 
                                        <th class="text-column-emphasis" scope="col">PRODUCT</th> 
                                        <th class="text-column" scope="col">UNIT PRICE</th> 
                                        <th class="text-column" scope="col">QTY</th> 
                                        <th class="text-column" scope="col">TOTAL</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php 
                                if($orders['status'] != 'No Data Found')
                                {
                                    foreach($orders['data'] as $order) 
                                    { 
                                        $product = getbyKeyValue('products', 'prod_id', $order['prod_id']);
                                        $prod_name = $product['data']['prod_name'];
                                ?>
                                        <tr>
                                            <th class="text-column-emphasis" scope="row"><?php echo $reservation_id;?></th> 
                                            <th class="text-column-emphasis" scope="row"><?php echo $prod_name;?></th> 
                                            <th class="text-column" scope="row">$<?php echo $order['unit_price'];?></th> 
                                            <th class="text-column" scope="row"><?php echo $order['quantity'];?></th> 
                                            <th class="text-column" scope="row">$<?php echo $order['total_price'];?></th> 
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
    </div>

</body>
</html>