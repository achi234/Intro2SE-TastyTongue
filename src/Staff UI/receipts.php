<?php
    $page_title = "Tasty Tongue - Receipts";
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
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Paid Orders</p>

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
                                        <th class="text-column-emphasis" scope="col">PRODUCT</th> 
                                        <th class="text-column" scope="col">UNIT PRICE</th> 
                                        <th class="text-column-emphasis" scope="col">QTY</th> 
                                        <th class="text-column" scope="col">TOTAL</th> 
                                        <th class="text-column-emphasis" scope="col">DATE</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
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
                                        <th class="text-column-emphasis" scope="row">04/Sep/2022 11:37</th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-print btn-control-icon"></i>
                                                    Print Receipt
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