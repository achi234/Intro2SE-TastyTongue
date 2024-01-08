<?php
    $page_title = "Tasty Tongue - Admin Dashboard";
    require_once('partials/_head.php');

    $count = 10;

    $reservations = getTopN('reservation_list', 'datetime', $count);
    $invoices = getTopN('invoices', 'datetime_invoice', $count);

    $num_customer = countbyKeyValue('users', 'role', 'Customer');
    $num_product = countbyKeyValue('products', null, null);
    $num_order = countbyKeyValue('orders', null, null);
    $sum_sale = sumSales('orders', null, null);
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
            <!-- Header Card -->
            <div class="header">
                <div class="container header__body">
                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">CUSTOMERS</div>
                                <div class="card-inner__number"><?php echo $num_customer;?></div>
                            </div>
                            <i class="fa-solid fa-users card__icon bg-danger"></i>                        
                        </div>
                    </div>

                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">PRODUCTS</div>
                                <div class="card-inner__number"><?php echo $num_product;?></div>
                            </div>
                            <i class="fa-solid fa-utensils card__icon bg-update"></i>
                        </div>
                    </div>
                    
                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">ODERS</div>
                                <div class="card-inner__number"><?php echo $num_order;?></div>
                            </div>
                            <i class="fa-solid fa-cart-shopping card__icon bg-warning"></i>
                        </div>
                    </div>

                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">SALES</div>
                                <div class="card-inner__number">$<?php echo $sum_sale;?></div>
                            </div>
                            <i class="fa-solid fa-dollar-sign card__icon bg-green"></i>
                        </div>
                    </div>
                </div>
            </div>    
            <!-- Page content -->
            <div class="container">
                <div class="container-recent">
                    <form action="" method="POST" class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Recent Reservations</p>
                            <a href="reservations.php" class="btn-control btn-control-edit">See all</a>
                        </div>

                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table">
                                <thead class="thead-light"> 
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">Reservation Id</th> 
                                        <th class="text-column" scope="col">Customer Name</th> 
                                        <th class="text-column" scope="col">Table Id</th> 
                                        <th class="text-column" scope="col">Date Time</th> 
                                        <th class="text-column" scope="col">Party size</th>
                                        <th class="text-column" scope="col">Status</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php 
                                    if($reservations['status'] == 'Data Found')
                                    {
                                        foreach($reservations['data'] as $reservation)
                                        {
                                            $customer = getbyKeyValue('users', 'id', $reservation['user_id']);
                                    ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $reservation['reservation_id']?></th> 
                                        <th class="text-column" scope="row"><?php echo $customer['data']['fullname']?></th>                 
                                        <th class="text-column" scope="row"><?php echo $reservation['table_id']?></th>
                                        <?php 
                                            // $reservation_dt = $reservation['datetime']->format('H:i:s Y-m-d');
                                        ?> 
                                        <th class="text-column" scope="row"><?php  echo $reservation['datetime']?></th> 
                                        <th class="text-column" scope="row"><?php  echo $reservation['party_size']?></th> 
                                        <th class="text-column" scope="row">
                                        <?php if ($reservation['status'] == 0 )
                                        { 
                                        ?>
                                            <span class="badge badge-unsuccess">Booked</span>

                                        <?php
                                        }
                                        elseif ($reservation['status'] == 1)
                                        {?>
                                            <span class="badge badge-arrived">Arrived</span>
                                        <?php
                                        }
                                        else
                                        {?>
                                            <span class="badge badge-success">Checked out</span> 
                                    
                                        </th> 
                                        <?php
                                        }
                                        ?>
                                        
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
                    </form>
                </div>
                <div class="container-recent">
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Recent Invoices</p>
                            <a href="invoices.php" class="btn-control btn-control-edit">See all</a>
                        </div>

                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">CODE</th> 
                                        <th class="text-column" scope="col">CUSTOMER</th> 
                                        <th class="text-column" scope="col">TABLE ID</th> 
                                        <th class="text-column" scope="col">TOTAL</th> 
                                        <th class="text-column" scope="col">PAYMENT</th> 
                                        <th class="text-column" scope="col">DATE TIME</th> 
                                        <th class="text-column" scope="col">STATUS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php foreach($invoices['data'] as $invoice) 
                                { 
                                    $reservations = getbyKeyValue('reservation_list', 'reservation_id', $invoice['reservation_id']);
                                    $reservation_id = $reservations['data']['reservation_id'];

                                    $customer = getbyKeyValue('users', 'id', $reservations['data']['user_id']);
                                    $customer_name = $customer['data']['fullname'];
                                    
                                    $table = getbyKeyValue('table_list', 'table_id', $reservations['data']['table_id']);
                                    $table_id = $table['data']['table_id'];

                                    $payment = getbyKeyValue('payment_method', 'payment_id', $invoice['payment_id']);
                                    $payment_method = $payment['data']['payment_name'];
                                ?>
                                    <tr>
                                        <th class="text-column-emphasis" scope="row"><?php echo $invoice['invoice_id']?></th> 
                                        <th class="text-column" scope="row"><?php echo $reservation_id?></th> 
                                        <th class="text-column" scope="row"><?php echo $customer_name?></th> 
                                        <th class="text-column" scope="row">$<?php echo $invoice['total']?></th> 
                                        <th class="text-column" scope="row"><?php echo $payment_method?></th> 
                                        <?php 
                                        ?>
                                        <th class="text-column" scope="row"><?php echo $invoice['datetime_invoice']?></th> 
                                        <th class="text-column" scope="row">
                                            <?php
                                                if ($invoice['status_invoice'] != 1)
                                                { ?>
                                                <span class="badge badge-unsuccess">Unpaid</span>                                     
                                                <?php
                                                }
                                                else
                                                { ?>
                                                <span class="badge badge-success">Paid</span>
                                                <?php 
                                                }
                                            ?>
                                        </th> 
                                    </tr>
                                <?php
                                } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php require_once('partials/_footer.php'); ?>
        </div>
    </div>

</body>
</html>