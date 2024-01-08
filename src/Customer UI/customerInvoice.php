<?php
session_start();
//echo "Role is {$_SESSION['role']} ";
?>

<?php
$page_title = "Tasty Tongue - Invoices";
include('../config/config.php');
//include('../Controller/authenticate.php');
require_once('partials/_head.php');
//require_once('partials/_analytics.php');
$invoices = getAll('invoices');
?>

<body>
    <!-- Main content -->
    <div class="main-content">
        <div class="content">
            <!-- Top navbar -->
            <?php
            require_once('partials/topnav.php');
            ?>

            <!-- Page content -->

            <!-- Invoice section -->
            <section class="invoice_section layout_padding">
                <div class="container">
                    <div class="heading_container heading_center">
                        <h2 class="text-green layout_padding2-bottom">
                            Receipts
                        </h2>
                    </div>
                    <div class="table-responsive" style="overflow-x:auto;">
                        <table class="table">
                            <thead class="custom-thead-light">
                                <tr>
                                    <th class="text-column-emphasis" scope="col">CODE</th>
                                    <th class="text-column" scope="col">Reservation ID</th>
                                    <th class="text-column" scope="col">CUSTOMER</th>
                                    <th class="text-column" scope="col">TOTAL</th>
                                    <th class="text-column" scope="col">PAYMENT</th>
                                    <th class="text-column" scope="col">DATE TIME</th>
                                </tr>
                            </thead>
                            <tbody class="table-body">
                                <?php foreach ($invoices['data'] as $invoice) {
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
                                        <th class="text-column-emphasis" scope="row">
                                            <?php echo $invoice['invoice_id'] ?>
                                        </th>
                                        <th class="text-column" scope="row">
                                            <?php echo $reservation_id ?>
                                        </th>
                                        <th class="text-column" scope="row">
                                            <?php echo $customer_name ?>
                                        </th>
                                        <th class="text-column" scope="row">$
                                            <?php echo $invoice['total'] ?>
                                        </th>
                                        <th class="text-column" scope="row">
                                            <?php echo $payment_method ?>
                                        </th>
                                        <?php
                                        ?>
                                        <th class="text-column" scope="row">
                                            <?php echo $invoice['datetime_invoice'] ?>
                                        </th>
                                    </tr>
                                    <?php
                                } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </section>
            <!-- end invoice section -->

            <!-- Footer -->
            <?php require_once('partials/_footer.php'); ?>
        </div>
    </div>

</body>

</html>