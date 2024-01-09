<?php
    $page_title = "Tasty Tongue - Make an Order";
    require_once('partials/_head.php');

    $prod_id = $_GET['id'];
    $product = getbyKeyValue('products', 'prod_id', $prod_id);
    $prod_price = $product['data']['prod_price'];

    $reservations = getAll('reservation_list');
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
                            <form method="POST" action="../Controller/StaffController/add_orderr.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Id</label>
                                            <input type="text" name="prod_id" class="form-control" readonly value="<?php echo $prod_id?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Reservation Id</label>
                                            <select name="reservation_id" class="form-cotrol">
                                                <option value="" class="">Select Reservation Id</option>
                                                <?php //print_r($reservations);
                                                foreach($reservations['data'] as $reservation)
                                                if ($reservation['status'] == 1)
                                                { ?>
                                                    <option value="<?php echo $reservation['reservation_id'];?>" ><?php echo $reservation['reservation_id'];?></option>
                                                <?php
                                                }
                                                ?>                                                
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Price ($)</label>
                                            <input type="number" name="prod_price" class="form-control" readonly value="<?php echo $prod_price?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Product Quantity</label>
                                            <input type="number" name="prod_quantity" class="form-control" placeholder="Enter quantity">
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-add-order" value="Make Order" class="btn-control btn-control-add" value="">
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