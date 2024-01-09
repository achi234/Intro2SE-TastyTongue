<?php
    $page_title = "Tasty Tongue - Add New Invoice";
    require_once('partials/_head.php');

    $reservations = getResNotInInv();
    $payments = getAll('payment_method');
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
                            <form method="POST" action="../Controller/StaffController/add_invoice.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Reservation Id</label>
                                            <select name="reservation_id" class="form-cotrol">
                                                <option value="" class="">Select Reservation Id</option>
                                                <?php
                                                foreach($reservations['data'] as $reservation)
                                                { ?>
                                                    <option value="<?php echo $reservation['reservation_id'];?>" ><?php echo $reservation['reservation_id'];?></option>
                                                <?php
                                                }
                                                ?>                                                
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Payment Method</label>
                                            <select name="payment_id" class="form-cotrol">
                                            <?php
                                                foreach($payments['data'] as $payment)
                                                { ?>
                                                    <option value="<?php echo $payment['payment_id'];?>" ><?php echo $payment['payment_name'];?></option>
                                                <?php
                                                }
                                                ?>                                                
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Invoice Status</label>
                                            <select name="invoice_status" class="form-cotrol">
                                                <option value="0" class="">Unpaid</option>
                                                <option value="1" class="">Paid</option>
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