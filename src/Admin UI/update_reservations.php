<?php
    $page_title = "Tasty Tongue - Update Reservation";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');
    // $reservation_id = $_GET['reservation_id'];
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
                            <form method="POST" action="../Controller/AdminController/add_reservation.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Reservation Id</label>
                                            <input type="number" name="party_size" class="form-control" readonly>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">User Name</label>
                                            <select name="user_id" class="form-cotrol">
                                                <option value="<?php //echo $?>" class=""><?php //echo $?></option>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table Id</label>
                                            <select name="table_id" class="form-cotrol">
                                                <option value="<?php //echo $table['table_id'];?>" class=""><?php //echo $table['table_id'];?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Party Size</label>
                                            <input type="number" name="party_size" class="form-control">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Date Time</label>
                                            <input type="datetime-local" name="date_time" class="form-control">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Status</label>
                                            <select name="table_status" class="form-cotrol">
                                                <option value="<?php //echo $?>" class=""><?php //echo $?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updateReservation" value="Update Reservation" class="btn-control btn-control-add">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Order Records -->
            <div class="container">
                <div class="container-recent">
                    <div class="container-recent-inner">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Orders Records</p>
                        </div>

                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">CUSTOMER</th> 
                                        <th class="text-column" scope="col">PRODUCT</th> 
                                        <th class="text-column" scope="col">UNIT PRICE</th> 
                                        <th class="text-column" scope="col">QTY</th> 
                                        <th class="text-column" scope="col">TOTAL</th> 
                                        <!-- <th class="text-column" scope="col">ACTION</th>  -->
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">Christine Moore</th> 
                                        <th class="text-column" scope="row">Irish Coffee</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column" scope="row">1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                    </tr>

                                </tbody>
                            </table>

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