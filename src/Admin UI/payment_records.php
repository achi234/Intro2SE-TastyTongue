<?php
    $page_title = "Tasty Tongue - Payment Records";
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
                            <p class="recent__heading-title">Recent Payment</p>
                        </div>

                        <div class="table-responsive" style="overflow-x:auto;">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-column-emphasis" scope="col">CODE</th> 
                                        <th class="text-column" scope="col">AMOUNT</th> 
                                        <th class="text-column-emphasis" scope="col">ORDER CODE</th> 
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                    <tr>
                                        <th class="text-column-emphasis" scope="row">QWERT0YUZ1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
                                    </tr>

                                    <tr>
                                        <th class="text-column-emphasis" scope="row">QWERT0YUZ1</th> 
                                        <th class="text-column" scope="row">$11</th> 
                                        <th class="text-column-emphasis" scope="row">JFMB-0731</th> 
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