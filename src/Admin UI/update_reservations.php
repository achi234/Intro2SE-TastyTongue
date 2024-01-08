<?php
    $page_title = "Tasty Tongue - Update Reservation";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');
    $reservation_id = $_GET['id'];
    $reservation = getbyKeyValue('reservation_list', 'reservation_id', $reservation_id);
    $customer = getbyKeyValue('users', 'id', $reservation['data']['user_id']);
    $tables = getAll('table_list');

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
                            <form method="POST" action="../Controller/AdminController/update_reservation.php">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Reservation ID</label>
                                            <input type="text" name="reservation_id" class="form-control" value="<?php echo $reservation['data']['reservation_id']?>" readonly>
                                        </div>
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Username</label>
                                            <input type="text" name="user_id" class="form-control" value="<?php  echo $customer['data']['fullname'];?>" readonly>
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table</label>
                                            <select name="table_id"  class="form-cotrol">

                                                <?php 
                                                foreach($tables['data'] as $table)
                                                {
                                                    if( $reservation['data']['table_id'] == $table['table_id'])
                                                    { ?>  
                                                    <option value="<?php echo $table['table_id'];?>" selected><?php echo $table['table_id'];?></option>
                                                    <?php
                                                    } 
                                                    else
                                                    {
                                                    ?>
                                                    <option value="<?php echo $table['table_id'];?>" ><?php echo $table['table_id'];?></option>
                                                    <?php
                                                    }
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
                                            <input type="number" name="party_size" class="form-control" value="<?php echo $reservation['data']['party_size']?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Date Time</label>
                                            <input type="datetime-local" name="date_time" class="form-control" value="<?php echo $reservation['data']['datetime']?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Status</label>
                                            <select name="status" class="form-cotrol">
                                             <?php 
                                                 if( $reservation['data']['status'] == 0)
                                                 { ?>  
                                                    <option value="0" selected>Booked</option>
                                                    <option value="1" >Arrived</option>
                                                    <option value="2" >Checked out</option>
                                                 <?php
                                                 } 
                                                 elseif ( $reservation['data']['status'] == 1)
                                                 {
                                                 ?>
                                                    <option value="0" >Booked</option>
                                                    <option value="1" selected>Arrived</option>
                                                    <option value="2" >Checked out</option>
                                                 <?php
                                                 }
                                                 else
                                                 {
                                                ?>
                                                    <option value="0" >Booked</option>
                                                    <option value="1" >Arrived</option>
                                                    <option value="2" selected>Checked out</option>
                                                <?php
                                                 }
                                            ?>
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

            <!-- Footer -->
            <?php 
            require_once('partials/_footer.php'); 
            ?>
        </div>
    </div>

</body>
</html>