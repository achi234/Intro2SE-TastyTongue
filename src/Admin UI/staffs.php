<?php
    $page_title = "Tasty Tongue - Staff List";
    include('../config/config.php');
    include('../Controller/authenticate.php');
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');
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
                            <a href="add_staffs.php" class="btn-control btn-control-add">
                                <i class="fa-solid fa-user-plus btn-control-icon"></i>
                                Add new staff
                            </a>
                            <div class="container__heading-search">
                                <input type="text" class="heading-search__area" placeholder="Search by code, name..." name>
                                <a href="" class="btn-control btn-control-search">
                                    <i class="fa-solid fa-magnifying-glass btn-control-icon"></i>
                                    Search
                                </a>                        
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column" scope="col">STAFF NUMBER</th> 
                                        <th class="text-column" scope="col">NAME</th> 
                                        <th class="text-column" scope="col">EMAIL</th> 
                                        <th class="text-column" scope="col">ACTIONS</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column" scope="row">QEUY-9042</th> 
                                        <th class="text-column" scope="row">Cashier Trevor</th> 
                                        <th class="text-column" scope="row">cashier@mail.com</th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="" class="btn-control btn-control-delete">
                                                    <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                    Delete
                                                </a>
                                                <a href="" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-user-pen btn-control-icon"></i>
                                                    Update
                                                </a>
                                            </div>
                                        </th> 
                                    </tr>

                                    <tr>
                                        <th class="text-column" scope="row">QEUY-9042</th> 
                                        <th class="text-column" scope="row">Cashier Trevor</th> 
                                        <th class="text-column" scope="row">cashier@mail.com</th> 
                                        <th class="text-column" scope="row">
                                            <div class="text-column__action">
                                                <a href="" class="btn-control btn-control-delete">
                                                    <i class="fa-solid fa-trash-can btn-control-icon"></i>
                                                    Delete
                                                </a>
                                                <a href="" class="btn-control btn-control-edit">
                                                    <i class="fa-solid fa-user-pen btn-control-icon"></i>
                                                    Update
                                                </a>
                                            </div>
                                        </th> 
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