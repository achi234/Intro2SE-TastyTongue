<?php
    $page_title = "Tasty Tongue - Change Staff Infomation";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

    $cate_id = $_GET['id'];
    $category = getbyKeyValue('category', 'category_id', $cate_id);
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
                            <form method="POST" action="../Controller/AdminController/update_category.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Category ID</label>
                                            <input type="text" name="category_id" class="form-control" value="<?php echo $category['data']['category_id']; ?>" readonly>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Category Name</label>
                                            <input type="text" name="category_name" class="form-control" value="<?php echo $category['data']['category_name'];?>">
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                        
                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updateCategory" value="Update Category" class="btn-control btn-control-add">
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