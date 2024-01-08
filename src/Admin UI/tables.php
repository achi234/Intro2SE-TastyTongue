<?php
    $page_title = "Tasty Tongue - Staff List";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

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
                    <form action="" method="POST" class="container-recent-inner">
                        <div class="container-recent__heading heading__button">
                            <a href="add_tables.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-chair btn-control-icon"></i>
                                Add new table
                            </a>

                            <?php
                                $strKeyword = null;

                                if(isset($_POST["btn-search"]))
                                {
                                    $strKeyword = $_POST["search_text"];
                                    $tables = searchByKeyword('tables', $strKeyword);

                                    if($tables['status'] == 'No Data Found')
                                    {
                                        $_SESSION['status'] = $tables['status'];
                                        // $tables = getByUserTypeWithPagination('tables', 'Staff', $pageSize, $pageNumber, 'id');
                                    }
                                }
                                else
                                {
                                    // $tables = getByUserTypeWithPagination('tables', 'Staff', $pageSize, $pageNumber, 'id');
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
                                        <th class="text-column-emphasis" scope="col">Table Id</th> 
                                        <th class="text-column" scope="col">Table Name</th> 
                                        <th class="text-column" scope="col">Description</th> 
                                        <th class="text-column" scope="col">Party Size</th> 
                                        <th class="text-column" scope="col">Status</th> 
                                        <th class="text-column" scope="col">Action</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <?php
                                    // $count = sizeof($tables['data']);
                                    if($tables['status'] == 'Data Found')
                                    {
                                    ?>
                                        <?php  foreach($tables['data'] as $table) 
                                        {  
                                        ?>
                                        <tr>
                                            <th class="text-column-emphasis" scope="row"><?php echo $table['table_id']?></th> 
                                            <th class="text-column" scope="row"><?php echo $table['table_name']?></th> 
                                            <th class="text-column" scope="row"><?php echo $table['description']?></th> 
                                            <th class="text-column" scope="row"><?php  echo $table['size']?></th> 
                                            <th class="text-column" scope="row">
                                                <?php if ($table['status'] == 1 )
                                                { 
                                                ?>
                                                    <span class="badge badge-arrived">Avaiable</span>
                                                <?php
                                                }
                                                else
                                                {?>
                                                    <span class="badge badge-unsuccess">Unavaiable</span>
                                                <?php
                                                }?>
                                                <!-- <span class="badge badge-arrived">Arrived<?php // echo $table['table_status']?></span> -->
                                                <!-- <span class="badge badge-success">Done<?php // echo $table['table_status']?></span>  -->
                                                <!-- <span class="badge badge-unsuccess">Pending<?php // echo $table['table_status']?></span>  -->
                                            </th> 
                                            <th class="text-column" scope="row">
                                                <div class="text-column__action">
                                                    <!-- Only change table_status, not really delete table -->
                                                    <a href="../Controller/AdminController/delete_table.php?id=<?php  echo $table['table_id']?>" 
                                                    class="btn-control btn-control-delete">
                                                        <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                        Delete
                                                    </a>
                                                    <a href="update_tables.php?id=<?php  echo $table['table_id']?>" class="btn-control btn-control-edit">
                                                        <i class="fa-solid fa-file-pen btn-control-icon"></i>
                                                        View detail
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