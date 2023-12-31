<?php
    $page_title = "Tasty Tongue - Invoices";
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
                    <form action="" method="POST" class="container-recent-inner">
                    <div class="container-recent__heading heading__button">
                            <a href="add_invoices.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-file-invoice-dollar btn-control-icon"></i>
                                Add new invoice
                            </a>


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
                                        <th class="text-column" scope="col">CUSTOMER</th> 
                                        <th class="text-column" scope="col">TABLE ID</th> 
                                        <th class="text-column" scope="col">TOTAL</th> 
                                        <th class="text-column" scope="col">PAYMENT</th> 
                                        <th class="text-column" scope="col">DATE TIME</th> 
                                        <th class="text-column" scope="col">STATUS</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
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
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="update_invoices.php?id=<?php ?>" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-receipt btn-control-icon"></i>
                                                    View detail
                                                </a>
                                            </div>
                                        </th>
                                    </tr>

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