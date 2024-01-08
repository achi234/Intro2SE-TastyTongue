<?php
    $page_title = "Tasty Tongue - Change Staff Infomation";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

    $table_id = $_GET['id'];
    $table = getbyKeyValue('table_list', 'table_id',$table_id);

    $reservations = getAllByKeyValue('reservation_list', 'table_id' , $table_id);
    
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
                            <form method="POST" action="../Controller/AdminController/update_table.php">
                                <input type="hidden" name="table_id" value="<?php echo $table['data']['table_id']; ?>">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table Name</label>
                                            <input type="text" name="table_name" class="form-control" value="<?php echo $table['data']['table_name']; ?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table Size</label>
                                            <input type="number" name="table_size" class="form-control" value="<?php echo $table['data']['size'];?>">
                                        </div>
                                        
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Table Status</label>
                                            <select name="table_status" id="tablStatus" class="form-cotrol">
                                                <?php if ($table['data']['status'] == 1 )
                                                { 
                                                ?>
                                                     <option value="1" selected> In Use </option>
                                                     <option value="0" > Unavailable </option>
                                                <?php
                                                }
                                                else
                                                {?>
                                                    <option value="1" > In Use </option>
                                                    <option value="0" selected> Unavailable </option>
                                                <?php
                                                }?>
                                            </select>

                                        </div>                                
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Description</label>
                                            <textarea name="table_desc" rows="2" class="form-control"> <?php echo $table['data']['description'];?> </textarea>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updateTable" value="Update Table" class="btn-control btn-control-add">
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Reservation list by table -->
            <div class="container">
                <div class="container-recent">
                    <form action="" method="POST" class="container-recent-inner">
                        <div class="container-recent__heading heading__button">
                            <a href="add_reservations.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-chair btn-control-icon"></i>
                                Add new reservation
                            </a>

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
                                        <th class="text-column-emphasis" scope="col">Reservation Id</th> 
                                        <th class="text-column" scope="col">Customer Id</th> 
                                        <th class="text-column" scope="col">Date Arrival</th> 
                                        <th class="text-column" scope="col">Date Booking</th> 
                                        <th class="text-column" scope="col">Party size</th>
                                        <th class="text-column" scope="col">Status</th> 
                                        <th class="text-column" scope="col">Action</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <?php
                                  
                                        // $count = sizeof($reservations['data']);
                                        if($reservations['status'] == 'Data Found')
                                        {
                                        ?>
                                            <?php  foreach($reservations['data'] as $reservation) 
                                            {  

                                            ?>
                                            <tr>
                                                <th class="text-column-emphasis" scope="row"><?php echo $reservation['reservation_id']?></th> 
                                                <?php
                                                    $customer = getbyKeyValue('users', 'id', $reservation['user_id']);
                                                ?>
                                                <th class="text-column" scope="row"><?php echo $customer['data']['fullname']?></th> 
                                                <th class="text-column" scope="row"><?php echo $reservation['datetime']?></th> 
                                                <th class="text-column" scope="row"><?php  echo $reservation['date_created']?></th> 
                                                <th class="text-column" scope="row"><?php  echo $reservation['party_size']?></th>
                                                        <th class="text-column" scope="row">
                                                        <?php if ($reservation['status'] == 0 )
                                                        { 
                                                        ?>
                                                            <span class="badge badge-arrived">Booked</span>

                                                        <?php
                                                        }
                                                        elseif ($reservation['status'] == 1)
                                                        {?>
                                                            <span class="badge badge-success">Arrived</span>
                                                        <?php
                                                        }
                                                        else
                                                        {?>
                                                            <span class="badge badge-unsuccess">Checked out</span> 
                                                    
                                                        </th> 
                                                        <?php
                                                        }
                                                        ?>
                                                <th class="text-column" scope="row">
                                                    <div class="text-column__action">
                                                        <a href="make_orders.php?id=<?php echo $reservation['reservation_id']?>&status=<?php echo $reservation['status']?>" class="btn-control btn-control-warning">
                                                            <i class="fa-solid fa-utensils btn-control-icon"></i>
                                                            Order Food
                                                        </a>
                                                        <a href="order_records.php?id=<?php  echo $reservation['reservation_id']?>" class="btn-control btn-control-edit">
                                                            <i class="fa-solid fa-clipboard btn-control-icon"></i>
                                                            View detail
                                                        </a>
                                                    </div>
                                                </th> 
                                                <?php
                                                }
                                                ?>
                                                
                                            </tr>
                                        <?php 
                                        }  
                                        else
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
            <?php 
            require_once('partials/_footer.php'); 
            ?>
        </div>
    </div>

</body>
</html>