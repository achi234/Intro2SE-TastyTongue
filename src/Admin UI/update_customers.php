<?php
    $page_title = "Tasty Tongue - Change Customer Infomation";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');
    $customer_id = $_GET['id'];
    $customer = getbyId('users', $customer_id);
    // $reservations = getbyId('reservations', $customer_id);
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
                            <form method="POST" action="../Controller/AdminController/update_customer.php">
                            <input type="hidden" name="customer_id" value="<?php echo $customer['data']['id']; ?>">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Customer Name</label>
                                            <input type="text" name="customer_name" class="form-control" value="<?php echo $customer['data']['fullname']; ?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Customer Phone Number</label>
                                            <input type="text" name="customer_phone" class="form-control" value="<?php echo $customer['data']['phone']; ?>">
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Customer Email</label>
                                            <input type="text" name="customer_email" class="form-control" value="<?php echo $customer['data']['email']; ?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Customer Password</label>
                                            <input type="text" name="customer_password" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updateCustomer" value="Update Customer" class="btn-control btn-control-add" value="">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Reservation list by customer -->
            <div class="container">
                <div class="container-recent">
                    <form action="" method="POST" class="container-recent-inner">
                        <div class="container-recent__heading">
                            <!-- <a href="add_reservations.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-chair btn-control-icon"></i>
                                Add new reservation
                            </a> -->
                            <p class="recent__heading-title">Reservation Record</p>

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
                                        <th class="text-column" scope="col">Reservation Id</th> 
                                        <th class="text-column" scope="col">Table Id</th> 
                                        <th class="text-column" scope="col">Date Time</th> 
                                        <th class="text-column" scope="col">Party size</th>
                                        <th class="text-column" scope="col">Status</th> 
                                        <!-- <th class="text-column" scope="col">Action</th>  -->
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <?php
                                        // $count = sizeof($reservations['data']);
                                        // if($count > 0)
                                        {
                                        ?>
                                            <?php  //foreach($reservations['data'] as $reservation) 
                                            {  
                                            ?>
                                            <tr>
                                                <th class="text-column" scope="row"><?php //echo $reservation['reservation_id']?></th> 
                                                <th class="text-column" scope="row"><?php //echo $reservation['table_id']?></th> 
                                                <th class="text-column" scope="row"><?php  //echo $reservation['datetime']?></th> 
                                                <th class="text-column" scope="row"><?php  //echo $reservation['party_size']?></th> 
                                                <?php //if($reservation['status'] == 1)
                                                    {?>
                                                        <th class="text-column" scope="row">
                                                            <span class="badge badge-arrived">Arrived<?php // echo $table['table_status']?></span>
                                                            <!-- <span class="badge badge-unsuccess">Pending<?php // echo $table['table_status']?></span>  -->
                                                            <!-- <span class="badge badge-success">Done<?php // echo $table['table_status']?></span>  -->
                                                        </th> 
                                                    <?php
                                                    }
                                                    //else
                                                    {
                                                    ?>
                                                        <!-- <th class="text-column" scope="row">No</th>  -->
                                                    <?php
                                                    }
                                                ?>
                                                <th class="text-column" scope="row">
                                                    <div class="text-column__action">
                                                        <!-- <a href="../Controller/AdminController/delete_reservation.php?id=<?php  echo $reservation['reservation_id']?>" 
                                                        class="btn-control btn-control-delete">
                                                            <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                            Delete
                                                        </a> -->
                                                        <!-- <a href="update_reservations.php?id=<?php  echo $reservation['reservation_id']?>" class="btn-control btn-control-edit">
                                                            <i class="fa-solid fa-pen-to-square btn-control-icon"></i>
                                                            Update
                                                        </a> -->
                                                    </div>
                                                </th> 
                                            </tr>
                                            <?php 
                                            } ?>
                                        <?php 
                                        }
                                        // else
                                        { ?>
                                            <h4> No Record Found </h4>
                                        <?php
                                        }
                                    ?>   
                                </tbody>
                            </table>

                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer -->
            <?php require_once('partials/_footer.php'); ?>
        </div>
    </div>

</body>
</html>