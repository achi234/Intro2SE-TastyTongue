<?php
    $page_title = "Tasty Tongue - Category List";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

    $categories = getAll('category');
    $pageSize = 10;
    $pageNumber = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    
    $categories = getAllWithPagination('category', $pageSize, $pageNumber, 'category_id');
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
                            <a href="add_categories.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-utensils btn-control-icon"></i>
                                Add New Categpry
                            </a>

                            <div class="pagination">
                                <?php
                                    $totalPages = ceil($categories['total'] / $pageSize);
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
                                    $categories = searchByKeyword('category', $strKeyword);

                                    if($categories['status'] == 'No Data Found')
                                    {
                                        $_SESSION['status'] = $categories['status'];
                                        $categories = getAllWithPagination('category', $pageSize, $pageNumber, 'category_id');
                                    }
                                }
                                else
                                {
                                    $categories = getAllWithPagination('category', $pageSize, $pageNumber, 'category_id');
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
                                        <th class="text-column-emphasis" scope="col">CATEGORY ID</th> 
                                        <th class="text-column" scope="col">CATEGORY NAME</th>
                                        <th class="text-column" scope="col">ACTION</th>            
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php foreach($categories['data'] as $category) 
                                        { ?>  
                                    <tr>

                                        <th class="text-column-emphasis" scope="row"><?php echo $category['category_id']?></th> 
                                        <th class="text-column" scope="row"><?php echo $category['category_name']?></th> 
                        
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="../Controller/AdminController/delete_category.php?id=<?php echo $category['category_id'] ?>" class="btn-control btn-control-delete">
                                                    <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                    Delete
                                                </a>
                                                <a href="update_categories.php?id=<?php echo  $category['category_id'] ?>" class="btn-control btn-control-edit">
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