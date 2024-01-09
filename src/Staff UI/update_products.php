<?php
    $page_title = "Tasty Tongue - Change Product Infomation";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');
    $product_id = $_GET['id'];
    $product = getbyKeyValue('products','prod_id',$product_id);
    // $category = getbyKeyValue('category', 'category_id', $product['data']['prod_cat']);
    // $category_id = $category['data']['category_id'];
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
                            <form method="POST" action="../Controller/StaffController/update_product.php" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <!-- <div class="form-col">
                                            <label for="" class="form-col__label">Product ID</label> -->
                                            <input type="hidden" name="product_id" class="form-control" readonly value="<?php echo $product['data']['prod_id']?>">
                                        <!-- </div> -->
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Name</label>
                                            <input type="text" name="product_name" class="form-control" value="<?php echo $product['data']['prod_name']?>" readonly>
                                        </div>
                                        <div class="form-col">
                                        <label for="" class="form-col__label">Category</label>
                                            <!-- <select name="product_category" class="form-cotrol"> -->
                                            <input type="text" name="product_category" class="form-control" value="<?php echo $product['data']['prod_cat']?>" readonly>

                                                <?php //print_r($categories);
                                                // foreach($categories['data'] as $category)
                                                {
                                                    // if( $product['data']['prod_cat'] == $category['category_id'])
                                                    { ?>  
                                                    <!-- <option value="<?php //echo $category['category_id'];?>" selected><?php //echo $category['category_name'];?></option> -->
                                                    <?php
                                                    } 
                                                    // else
                                                    {
                                                    ?>
                                                    <!-- <option value="<?php //echo $category['category_id'];?>" ><?php //echo $category['category_name'];?></option> -->
                                                    <?php
                                                    }
                                                }
                                                ?>
                                                
                                            <!-- </select> -->
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">
                               
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Image</label>
                                            <input type="text" name="product_image" class="form-control" value="" readonly>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Price</label>
                                            <input type="text" name="product_price" class="form-control" value="<?php echo $product['data']['prod_price']?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                        <label for="" class="form-col__label">Status</label>
                                            <select name="product_status" class="form-cotrol">

                                                <?php 
                                                    if( $product['data']['status'] == 1)
                                                    { ?>  
                                                    <option value="1" selected>In stock</option>
                                                    <option value="0" >Out of stock</option>
                                                    <?php
                                                    } 
                                                    else
                                                    {
                                                    ?>
                                                    <option value="1" >In stock</option>
                                                    <option value="0" selected>Out of stock</option>
                                                    <?php
                                                    }
                                                ?>
                                                
                                            </select>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Description</label>
                                            <textarea name="product_description" readonly rows="5" class="form-control"><?php echo $product['data']['prod_desc']?></textarea>
                                        </div>
                                    </div>
                                    
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updateProduct" value="Update Product" class="btn-control btn-control-add" value="">
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