<?php
    $page_title = "Tasty Tongue - Reservation List";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

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
                    <form action="" method="POST" class="container-recent-inner">
                        <div class="container-recent__heading heading__button">
                            <a href="add_reservations.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-table btn-control-icon"></i>
                                Add new reservation
                            </a>

                            <?php
                                $strKeyword = null;

                                if(isset($_POST["btn-search"]))
                                {
                                    $strKeyword = $_POST["search_text"];
                                    $reservations = searchByKeyword('reservation_list', $strKeyword);

                                    if($reservations['status'] == 'No Data Found')
                                    {
                                        $_SESSION['status'] = $reservations['status'];
                                        // $reservations = getWithPagination('reservation_list', $pageSize, $pageNumber, 'reservation_id');
                                    }
                                }
                                else
                                {
                                    // $reservations = getWithPagination('reservation_list', $pageSize, $pageNumber, 'reservation_id');
                                }
                            ?>

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
                                    if($reservations['status'] == 'Data Found')
                                    {
                                        foreach($reservations['data'] as $reservation)
                                        {
                                            $customer = getbyKeyValue('users', 'id', $reservation['user_id']);
                                    ?>
                                            <tr>
                                                <th class="text-column-emphasis" scope="row"><?php echo $reservation['reservation_id']?></th> 
                                                <th class="text-column" scope="row"><?php echo $customer['data']['fullname']?></th>                 
                                                <th class="text-column" scope="row"><?php echo $reservation['table_id']?></th>
                                                <?php 
                                                    // $reservation_dt = $reservation['datetime']->format('H:i:s Y-m-d');
                                                ?> 
                                                <th class="text-column" scope="row"><?php  echo $reservation['datetime']?></th> 
                                                <th class="text-column" scope="row"><?php  echo $reservation['party_size']?></th> 
                                                <th class="text-column" scope="row">
                                                        <?php if ($reservation['status'] == 0 )
                                                        { 
                                                        ?>
                                                            <span class="badge badge-unsuccess">Booked</span>

                                                        <?php
                                                        }
                                                        elseif ($reservation['status'] == 1)
                                                        {?>
                                                            <span class="badge badge-arrived">Arrived</span>
                                                        <?php
                                                        }
                                                        else
                                                        {?>
                                                            <span class="badge badge-success">Checked out</span> 
                                                    
                                                        </th> 
                                                        <?php
                                                        }
                                                        ?>
                                                
                                                <th class="text-column" scope="row">
                                                    <div class="text-column__action">
                                                        <a href="update_reservations.php?id=<?php echo $reservation['reservation_id']?>" class="btn-control btn-control-edit">
                                                            <i class="fa-solid fa-pen-to-square btn-control-icon"></i>
                                                            Update
                                                        </a>
                                                    </div>
                                                </th> 
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                    ?>
                                     <tr>
                                     <th class="text-column" scope="row">No data found</th>
                                    <?php
                                    }
                                    ?>
                                    </tr>
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

