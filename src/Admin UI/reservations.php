<?php
    $page_title = "Tasty Tongue - Staff List";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

    $staffs = getbyRole('users', 'Staff');
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
                                        <th class="text-column" scope="col">Customer Name</th> 
                                        <th class="text-column" scope="col">Table Id</th> 
                                        <th class="text-column" scope="col">Date Time</th> 
                                        <th class="text-column" scope="col">Party size</th>
                                        <th class="text-column" scope="col">Status</th> 
                                        <th class="text-column" scope="col">Action</th> 
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
                                                <th class="text-column-emphasis" scope="row"><?php //echo $reservation['reservation_id']?></th> 
                                                <th class="text-column" scope="row"><?php //echo $user['data]['fullname']?></th>                 
                                                <th class="text-column" scope="row"><?php //echo $reservation['table_id']?></th>
                                                <?php 
                                                    // $reservation_dt = $reservation['datetime']->format('H:i:s Y-m-d');
                                                ?> 
                                                <th class="text-column" scope="row"><?php  //echo $reservation_dt?></th> 
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
                                                        <a href="../Controller/AdminController/delete_reservation.php?id=<?php // echo $reservation['reservation_id']?>" 
                                                        class="btn-control btn-control-delete">
                                                            <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                            Delete
                                                        </a>
                                                        <a href="update_reservations.php?id=<?php  //echo $reservation['reservation_id']?>" class="btn-control btn-control-edit">
                                                            <i class="fa-solid fa-pen-to-square btn-control-icon"></i>
                                                            Update
                                                        </a>
                                                    </div>
                                                </th> 
                                            </tr>
                                            <?php 
                                            } ?>
                                        <?php 
                                        }
                                        // else
                                        { ?>
                                            <!-- <h4> No Record Found </h4> -->
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