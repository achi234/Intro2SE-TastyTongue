<?php
    $page_title = "Tasty Tongue - Invoices";
    require_once('partials/_head.php');

    $invoices = getAll('invoices');
    // $reservations = getAllByKeyValue('reservation_list');
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
                    <div class="container-recent__heading heading__button">
                            <a href="add_invoices.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-file-invoice-dollar btn-control-icon"></i>
                                Add new invoice
                            </a>

                            <?php
                                $strKeyword = null;

                                if(isset($_POST["btn-search"]))
                                {
                                    $strKeyword = $_POST["search_text"];
                                    $invoices = searchByKeyword('invoices', $strKeyword);

                                    if($invoices['status'] == 'No Data Found')
                                    {
                                        $_SESSION['status'] = $invoices['status'];
                                        // $invoices = getWithPagination('staffs', $pageSize, $pageNumber, 'invoice_id');
                                    }
                                }
                                else
                                {
                                    // $staffs = getWithPagination('staffs', $pageSize, $pageNumber, 'invoice_id');
                                }
                            ?>

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
                                        <th class="text-column-emphasis" scope="col">CODE</th> 
                                        <th class="text-column" scope="col">Reservation ID</th> 
                                        <th class="text-column" scope="col">CUSTOMER</th> 
                                        <th class="text-column" scope="col">TOTAL</th> 
                                        <th class="text-column" scope="col">PAYMENT</th> 
                                        <th class="text-column" scope="col">DATE TIME</th> 
                                        <th class="text-column" scope="col">STATUS</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
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
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="update_invoices.php?id=<?php echo $invoice['invoice_id']?>" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-receipt btn-control-icon"></i>
                                                    View detail
                                                </a>
                                            </div>
                                        </th>
                                    </tr>
                                <?php
                                } ?>
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