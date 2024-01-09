<?php
    $page_title = "Tasty Tongue - Dish List";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

    $products = getAll('products');
    $pageSize = 10;
    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    
    $products = getAllWithPagination('products', $pageSize, $pageNumber, 'prod_id');
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
                            <p class="recent__heading-title">Product List</p>

                            <div class="pagination">
                                <?php
                                    $totalPages = ceil($products['total'] / $pageSize);
                                    $maxPagesToShow = 4;
                                    $halfMax = floor($maxPagesToShow / 2);

                                    // Hiển thị nút Previous
                                    if ($pageNumber > 1) {
                                        echo '<a href="?page=' . ($pageNumber - 1) . '">&laquo;</a>';
                                    } else {
                                        echo '<a class="disabled" href="#">&laquo;</a>';
                                    }

                                    // Hiển thị các nút trang
                                    for ($i = max(1, $pageNumber - $halfMax); $i <= min($totalPages, $pageNumber + $halfMax); $i++) {
                                        echo '<a class="' . ($i == $pageNumber ? 'active' : '') . '" href="?page=' . $i . '">' . $i . '</a>';
                                    }

                                    // Hiển thị nút Next
                                    if ($pageNumber < $totalPages) {
                                        echo '<a href="?page=' . ($pageNumber + 1) . '">&raquo;</a>';
                                    } else {
                                        echo '<a class="disabled" href="#">&raquo;</a>';
                                    }
                                ?>
                            </div>

                            <?php
                                $strKeyword = null;

                                if(isset($_POST["btn-search"]))
                                {
                                    $strKeyword = $_POST["search_text"];
                                    $products = searchByKeyword('products', $strKeyword);

                                    if($products['status'] == 'No Data Found')
                                    {
                                        $_SESSION['status'] = $staffs['status'];
                                        $products = getAllWithPagination('products', $pageSize, $pageNumber, 'prod_id');
                                    }
                                }
                                else
                                {
                                    $products = getAllWithPagination('products', $pageSize, $pageNumber, 'prod_id');
                                }
                            ?>

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
                                        <th class="text-column-emphasis" scope="col">IMAGE</th> 
                                        <th class="text-column" scope="col">NAME</th> 
                                        <th class="text-column" scope="col">CATEGORY</th>
                                        <th class="text-column" scope="col">PRICE</th> 
                                        <th class="text-column-emphasis" scope="col">STATUS</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php foreach($products['data'] as $product) 
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
                                                <img src='../assets/image/products/default.jpg' height='60' width='60 class='img-thumbnail'>
                                                <?php
                                                }
                                            ?>
                                        </th> 
                                        <th class="text-column" scope="row"><?php echo $product['prod_name']?></th> 
                                        <th class="text-column" scope="row"><?php echo $category['data']['category_name']?></th> 
                                        <!-- <th class="text-column" scope="row"><?php //echo $product['prod_desc']?></th>  -->
                                        <th class="text-column" scope="row">$<?php echo $product['prod_price']?></th> 
                                        
                                        <?php
                                        if($product['status'] == 1) 
                                        {?>
                                            <th class="text-column" scope="row">
                                                <span class="badge badge-success">In Stock</span>
                                            </th> 
                                        <?php
                                        }
                                            else
                                            {
                                            ?>
                                            <th class="text-column" scope="row">
                                                <span class="badge badge-unsuccess">Out of Stock</span>
                                            </th> 
                                            <?php
                                            }
                                        ?>  
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <!-- <a href="../Controller/StaffController/delete_product.php?id=<?php echo $product['prod_id']?>" class="btn-control btn-control-delete">
                                                    <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                    Delete
                                                </a> -->
                                                <a href="update_products.php?id=<?php echo $product['prod_id']?>" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-pen-to-square btn-control-icon"></i>
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