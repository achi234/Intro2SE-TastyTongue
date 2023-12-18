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
                    <div class="container-recent-inner">
                        <div class="container-recent__heading heading__button">
                            <a href="add_staff.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-user-plus btn-control-icon"></i>
                                Add new staff
                            </a>
                        </div>

                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column" scope="col">STAFF NAME</th> 
                                        <th class="text-column" scope="col">PHONE</th> 
                                        <th class="text-column" scope="col">EMAIL</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <?php
                                    $count = sizeof($staffs['data']);
                                    if($count > 0)
                                    {
                                    ?>
                                        <?php  foreach($staffs['data'] as $staff) 
                                        {  
                                        ?>
                                        <tr>
                                            <th class="text-column" scope="row"><?php echo $staff['fullname']?></th> 
                                            <th class="text-column" scope="row"><?php echo $staff['phone']?></th> 
                                            <th class="text-column" scope="row"><?php  echo $staff['email']?></th> 
                                            <th class="text-column" scope="row">
                                                <div class="text-column__action">
                                                    <a href="../Controller/AdminController/delete_staff.php?email=<?php  echo $staff['email']?>" 
                                                    class="btn-control btn-control-delete">
                                                        <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                        Delete
                                                    </a>
                                                    <a href="update_staff.php?email=<?php  echo $staff['email']?>" class="btn-control btn-control-edit">
                                                        <i class="fa-solid fa-user-pen btn-control-icon"></i>
                                                        Update
                                                    </a>
                                                </div>
                                            </th> 
                                        </tr>
                                        <?php 
                                        } ?>
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