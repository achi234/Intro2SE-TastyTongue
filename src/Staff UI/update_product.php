<?php
    $page_title = "Tasty Tongue - Change Product Infomation";
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
                                            <label for="" class="form-col__label">Product Name</label>
                                            <input type="text" name="product_name" class="form-control" value="LJCH-7436">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Code</label>
                                            <input type="text" name="product_code" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Image</label>
                                            <input type="file" name="product_image" class="btn-control btn-control-add btn-add-success form-control" value="">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Price</label>
                                            <input type="text" name="product_price" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Description</label>
                                            <textarea name="product_description" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="updateProduct" value="Update Product" class="btn-control btn-control-add" value="">
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