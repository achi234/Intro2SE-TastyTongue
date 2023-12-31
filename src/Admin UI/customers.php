<?php
    $page_title = "Tasty Tongue - Customer List";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

    $customers = getbyRole('users', 'Customer');
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
                            <a href="add_customers.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-user-plus btn-control-icon"></i>
                                Add new customer
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
                                        <th class="text-column" scope="col">FULL NAME</th> 
                                        <th class="text-column" scope="col">CONTACT NUMBER</th> 
                                        <th class="text-column" scope="col">EMAIL</th> 
                                        <th class="text-column" scope="col">Verified</th>
                                        <th class="text-column" scope="col">ACTIONS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <?php
                                        $count = sizeof($customers['data']);
                                        if($count > 0)
                                        {
                                        ?>
                                            <?php  foreach($customers['data'] as $customer) 
                                            {  
                                            ?>
                                            <tr>
                                                <th class="text-column" scope="row"><?php echo $customer['fullname']?></th> 
                                                <th class="text-column" scope="row"><?php echo $customer['phone']?></th> 
                                                <th class="text-column" scope="row"><?php  echo $customer['email']?></th> 
                                                <?php if($customer['verify_status'] == 1)
                                                    {?>
                                                        <th class="text-column" scope="row">Yes</th> 
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                    ?>
                                                        <th class="text-column" scope="row">No</th> 
                                                    <?php
                                                    }
                                                ?>
                                                <th class="text-column" scope="row">
                                                    <div class="text-column__action">
                                                        <a href="update_customers.php?id=<?php  echo $customer['id']?>" class="btn-control btn-control-edit">
                                                            <i class="fa-solid fa-user-pen btn-control-icon"></i>
                                                            View detail
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