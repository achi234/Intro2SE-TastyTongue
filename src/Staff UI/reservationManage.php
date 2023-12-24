<?php
    $page_title = "Tasty Tongue - Reservation List";
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
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Reservation Records</p>
                        </div>

                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">CODE</th> 
                                        <th class="text-column" scope="col">CUSTOMER NAME</th> 
                                        <th class="text-column-emphasis" scope="col">TABLE CODE</th> 
                                        <th class="text-column" scope="col">DATE</th> 
                                        <th class="text-column-emphasis" scope="col">STATUS</th> 
                                        <th class="text-column" scope="col">ACTION</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">T101</th> 
                                        <th class="text-column" scope="row">04/Sep/2022 11:37</th>
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-done">Done</span>
                                        </th>  
                                        <th class="text-column" scope="row">
                                            <button class="btn-control-delete">Delete</button>
                                            <button class="btn-control-edit">Update</button>
                                        </th> 

                                    </tr>

                                    <tr>
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                        <th class="text-column" scope="row">Christine Moore</th> 
                                        <th class="text-column-emphasis" scope="row">T101</th> 
                                        <th class="text-column" scope="row">04/Sep/2022 11:37</th>
                                        <th class="text-column-emphasis" scope="row">
                                            <span class="badge badge-pending">Pending</span>
                                        </th>  
                                        <th class="text-column" scope="row">
                                            <button class="btn-control-delete">Delete</button>
                                            <button class="btn-control-edit">Update</button>
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