<?php
    $page_title = "Tasty Tongue - Add New Reservation";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');
    $customers = getAllByKeyValue('users','role','Customer');
    $tables = getAll('table_list',1);

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
                                            <label for="" class="form-col__label">User Name</label>
                                            <select name="user_id" class="form-cotrol">
                                            <?php 
                                                foreach($customers['data'] as $customer)
                                                { ?>
                                                    <option value="<?php echo $customer['id'];?>" ><?php echo $customer['fullname'];?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table Id</label>
                                            <select name="table_id" class="form-cotrol">
                                                <?php 
                                                foreach($tables['data'] as $table)
                                                { ?>
                                                    <option value="<?php echo $table['table_id'];?>" ><?php echo $table['table_name'];?></option>
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
                                            <label for="" class="form-col__label">Party Size</label>
                                            <input type="number" name="party_size" class="form-control">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Date Time</label>
                                            <input type="datetime-local" name="date_time" class="form-control">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Status</label>
                                            <select name="status" class="form-cotrol">
                                                <option value="0" >Booked</option>
                                                <option value="1" >Arrived</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-addReservation" value="Add Reservation" class="btn-control btn-control-add">
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