<?php
    $page_title = "Tasty Tongue - Dish List";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

    $products = getAll('products');
    //print_r( $products);
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
                            <a href="add_product.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-utensils btn-control-icon"></i>
                                Add New Product
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
                                        <th class="text-column" scope="col">IMAGE</th> 
                                        <th class="text-column" scope="col">NAME</th> 
                                        <th class="text-column" scope="col">PRICE</th> 
                                        <th class="text-column" scope="col">STATUS</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php foreach($products['data'] as $product) 
                                        { ?>  
                                    <tr>

                                        <th class="text-column" scope="row">
                                            <?php
                                                if ($product['prod_img']) {
                                                ?> 
                                                <img src="../assets/image/products/<?php echo $product['prod_img']?>" height='60' width="60" class="img-thumbnail">
                                                <?php
                                                } else {
                                                ?>
                                                <img src='../assets/image/products/default.jpg' height='60' width='60 class='img-thumbnail'>
                                                <?php
                                                }
                                            ?>
                                        </th> 
                                        <th class="text-column" scope="row"><?php echo $product['prod_name']?></th> 
                                        <th class="text-column" scope="row">$ <?php echo $product['prod_price']?></th> 
                                        <?php if( $product['status'] == '1')
                                        { ?>
                                            <th class="text-column" scope="row"><?php echo 'In stock'?></th> 
                                        <?php
                                        } 
                                        else 
                                        {
                                        ?>
                                            <th class="text-column" scope="row"><?php echo 'Out of stock'?></th> 
                                        <?php
                                        }
                                        ?>
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="" class="btn-control btn-control-delete">
                                                    <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                    Delete
                                                </a>
                                                <a href="" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-user-pen btn-control-icon"></i>
                                                    Update
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