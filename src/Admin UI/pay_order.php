<?php
session_start();
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
                            <form method="POST" class="" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Payment ID</label>
                                            <input type="text" name="payment_id" class="form-control" readonly value>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Payment Code</label>
                                            <input type="text" name="payment_code" class="form-control" value>
                                        </div>                                  
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Amount ($)</label>
                                            <input type="text" name="payment_amount" class="form-control" readonly value>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Payment Method</label>
                                            <select name="payment_method" id="PaymentMethod" class="form-cotrol" onchange="getPayMethod(this.value)">
                                                <option value="" class="">Select Method</option>
                                                <option value="" class="">Cash</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="payOrder" value="Pay Order" class="btn-control btn-control-add" value="">
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