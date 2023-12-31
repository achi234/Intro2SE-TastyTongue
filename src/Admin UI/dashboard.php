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
                                        // $count = sizeof($reservations['data']);
                                        // if($count > 0)
                                        {
                                        ?>
                                            <?php  //foreach($reservations['data'] as $reservation) 
                                            {  
                                            ?>
                                            <tr>
                                                <th class="text-column-emphasis" scope="row"><?php //echo $reservation['reservation_id']?></th> 
                                                <th class="text-column" scope="row"><?php //echo $user['data]['fullname']?></th>                 
                                                <th class="text-column" scope="row"><?php //echo $reservation['table_id']?></th>
                                                <?php 
                                                    // $reservation_dt = $reservation['datetime']->format('H:i:s Y-m-d');
                                                ?> 
                                                <th class="text-column" scope="row"><?php  //echo $reservation_dt?></th> 
                                                <th class="text-column" scope="row"><?php  //echo $reservation['party_size']?></th> 
                                                <?php //if($reservation['status'] == 1)
                                                    {?>
                                                        <th class="text-column" scope="row">
                                                            <span class="badge badge-arrived">Arrived<?php // echo $table['table_status']?></span>
                                                            <!-- <span class="badge badge-unsuccess">Pending<?php // echo $table['table_status']?></span>  -->
                                                            <!-- <span class="badge badge-success">Done<?php // echo $table['table_status']?></span>  -->
                                                        </th> 
                                                    <?php
                                                    }
                                                    //else
                                                    {
                                                    ?>
                                                        <!-- <th class="text-column" scope="row">No</th>  -->
                                                    <?php
                                                    }
                                                ?>
                                            </tr>
                                            <?php 
                                            } ?>
                                        <?php 
                                        }
                                        // else
                                        { ?>
                                            <!-- <h4> No Record Found </h4> -->
                                        <?php
                                        }
                                    ?>   
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
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column" scope="row">T1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column" scope="row">Cash</th> 
                                        <?php 
                                            // $invoice_dt = $invoice['datetime']->format('H:i:s Y-m-d')
                                        ?>
                                        <th class="text-column" scope="row">04/Sep/2022 11:37</th> 
                                        <th class="text-column" scope="row">
                                            <span class="badge badge-arrived">Arrived<?php // echo $table['table_status']?></span>
                                            <!-- <span class="badge badge-unsuccess">Pending<?php // echo $table['table_status']?></span>  -->
                                            <!-- <span class="badge badge-success">Done<?php // echo $table['table_status']?></span>  -->
                                        </th> 
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