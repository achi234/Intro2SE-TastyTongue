<?php
    $page_title = "Tasty Tongue - Add New Invoice";
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
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Please Fill All Fields</p>
                        </div>
                        
                        <div class="container-recent__body card__body-form">
                            <form method="POST" action="../Controller/AdminController/add_invoice.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Reservation</label>
                                            <select name="reservation_id" class="form-cotrol">
                                                <option value="<?php //echo $reservation['data']['reservation_id'];?>" class=""><?php //echo $table['data']['table_size'];?></option>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Payment Method</label>
                                            <select name="payment_id" class="form-cotrol">
                                                <option value="<?php //echo $payment['data']['reservation_id'];?>" class=""><?php //echo $payment['data']['paymentmethod_name'];?></option>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Invoice Status</label>
                                            <select name="invoice_status" class="form-cotrol">
                                                <option value="<?php //echo $payment['data']['reservation_id'];?>" class=""><?php //echo $payment['data']['paymentmethod_name'];?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-add-invoice" value="Add Invoice" class="btn-control btn-control-add">
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