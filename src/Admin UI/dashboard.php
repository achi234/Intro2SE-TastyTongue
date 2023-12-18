<?php
    $page_title = "Tasty Tongue - Admin Dashboard";
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
            <!-- Header Card -->
            <div class="header">
                <div class="container header__body">
                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">CUSTOMERS</div>
                                <div class="card-inner__number">14</div>
                            </div>
                            <i class="fa-solid fa-users card__icon bg-danger"></i>                        
                        </div>
                    </div>

                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">PRODUCTS</div>
                                <div class="card-inner__number">26</div>
                            </div>
                            <i class="fa-solid fa-utensils card__icon bg-update"></i>
                        </div>
                    </div>
                    
                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">ODERS</div>
                                <div class="card-inner__number">11</div>
                            </div>
                            <i class="fa-solid fa-cart-shopping card__icon bg-warning"></i>
                        </div>
                    </div>

                    <div class="header-body__card">
                        <div class="body__card">
                            <div class="body__card-inner">
                                <div class="card-inner__title">SALES</div>
                                <div class="card-inner__number">$139</div>
                            </div>
                            <i class="fa-solid fa-dollar-sign card__icon bg-green"></i>
                        </div>
                    </div>
                </div>
            </div>    
            <!-- Page content -->
            <div class="container">
                <div class="container-recent">
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Recent Orders</p>
                            <a href="order_records.php" class="btn-control btn-control-edit">See all</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">CODE</th> 
                                        <th class="text-column" scope="col">CUSTOMER</th> 
                                        <th class="text-column-emphasis" scope="col">PRODUCT</th> 
                                        <th class="text-column" scope="col">UNIT PRICE</th> 
                                        <th class="text-column-emphasis" scope="col">QTY</th> 
                                        <th class="text-column" scope="col">TOTAL</th> 
                                        <th class="text-column" scope="col">STATUS</th> 
                                        <th class="text-column-emphasis" scope="col">DATE</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">Irish Coffee</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-success">Paid</span>
                                        </th> 
                                        <th class="text-column-emphasis" scope="row">04/Sep/2022 11:37</th> 
                                    </tr>

                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">Irish Coffee</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-success">Paid</span>
                                        </th> 
                                        <th class="text-column-emphasis" scope="row">04/Sep/2022 11:37</th> 
                                    </tr>

                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">Irish Coffee</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-unsuccess">Unpaid</span>
                                        </th> 
                                        <th class="text-column-emphasis" scope="row">04/Sep/2022 11:37</th> 
                                    </tr>
                                    <!-- UnPaid -->
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">Irish Coffee</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-success">Paid</span>
                                        </th> 
                                        <th class="text-column-emphasis" scope="row">04/Sep/2022 11:37</th> 
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="container-recent">
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Recent Payment</p>
                            <a href="payment_records.php" class="btn-control btn-control-edit">See all</a>
                        </div>

                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">CODE</th> 
                                        <th class="text-column" scope="col">CUSTOMER</th> 
                                        <th class="text-column-emphasis" scope="col">PRODUCT</th> 
                                        <th class="text-column" scope="col">UNIT PRICE</th> 
                                        <th class="text-column-emphasis" scope="col">QTY</th> 
                                        <th class="text-column" scope="col">TOTAL</th> 
                                        <th class="text-column" scope="col">STATUS</th> 
                                        <th class="text-column-emphasis" scope="col">DATE</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">Irish Coffee</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-success">Paid</span>
                                        </th> 
                                        <th class="text-column-emphasis" scope="row">04/Sep/2022 11:37</th> 
                                    </tr>

                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">Irish Coffee</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-success">Paid</span>
                                        </th> 
                                        <th class="text-column-emphasis" scope="row">04/Sep/2022 11:37</th> 
                                    </tr>

                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">Irish Coffee</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-unsuccess">Unpaid</span>
                                        </th> 
                                        <th class="text-column-emphasis" scope="row">04/Sep/2022 11:37</th> 
                                    </tr>

                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">Irish Coffee</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-success">Paid</span>
                                        </th> 
                                        <th class="text-column-emphasis" scope="row">04/Sep/2022 11:37</th> 
                                    </tr>

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