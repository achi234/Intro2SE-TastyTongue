<?php
    $page_title = "Tasty Tongue - Menu";
    require_once('partials/_head.php');

    $products = getAll('products');
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
                            <p class="recent__heading-title">Select On Any Product To Make An Order</p>
                            
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
                                        <th class="text-column" scope="col">IMAGE</th> 
                                        <th class="text-column" scope="col">NAME</th> 
                                        <th class="text-column" scope="col">CATEGORY</th> 
                                        <th class="text-column" scope="col">PRICE</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php foreach($products['data'] as $product) 
                                        if($product['status'] == 1) 
                                        {  
                                            $category = getbyKeyValue('category', 'category_id', $product['prod_cat']); ?>  
                                    <tr>

                                        <th class="text-column" scope="row">
                                            <?php
                                                if ($product['prod_img']) {
                                                ?> 
                                                <img src="../assets/image/products/<?php echo $product['prod_img']?>" height='60' width="60" class="img-thumbnail">
                                                <?php
                                                } else {
                                                ?>
                                                <img src='../assets/image/products/default.jpg' height='60' width='60' class='img-thumbnail'>
                                                <?php
                                                }
                                            ?>
                                        </th> 
                                        <th class="text-column" scope="row"><?php echo $product['prod_name']?></th> 
                                        <th class="text-column" scope="row"><?php echo $category['data']['category_name']?></th> 
                                        <!-- <th class="text-column" scope="row"><?php //echo $product['prod_desc']?></th>  -->
                                        <th class="text-column" scope="row">$<?php echo $product['prod_price']?></th>                                   
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="add_orders.php?id=<?php echo $product['prod_id']?>" class="btn-control btn-control-warning">
                                                    <i class="fa-solid fa-clipboard-check btn-control-icon"></i>
                                                    Place Order
                                                </a>
                                            </div>
                                        </th> 
                                    </tr>
                                    <?php } ?>
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