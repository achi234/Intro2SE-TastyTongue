<?php
    $page_title = "Tasty Tongue - Make an Order";
    include('../config/config.php');
    include('../Controller/authenticate.php');
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
                                            <label for="" class="form-col__label">Customer Name</label>
                                            <select name="customer_name" id="custName" class="form-cotrol" onchange="getCustomer(this.value)">
                                                <option value="" class="">Select Customer Name</option>
                                                <option value="" class="">Jane Doe</option>
                                            </select>
                                            <input type="hidden" name="customer_id" class="form-control" value>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Customer ID</label>
                                            <input type="text" name="customer_id" class="form-control" readonly value>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Order Code</label>
                                            <input type="text" name="order_code" class="form-control" value>
                                        </div>                                  
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table Code</label>
                                            <select name="table_code" id="tableCode" class="form-cotrol" onchange="getTable(this.value)">
                                                <option value="" class="">Select Table</option>
                                                <option value="" class="">T1-02</option>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Price ($)</label>
                                            <input type="text" name="product_price" class="form-control" readonly value>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Quantity</label>
                                            <input type="text" name="product_quantity" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="makeOrder" value="Make Order" class="btn-control btn-control-add" value="">
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