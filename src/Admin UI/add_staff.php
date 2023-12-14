<?php
    $page_title = "Tasty Tongue - Add New Staff";
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
                    <div class="card shadow">
                        <div class="container-recent__heading">
                            <p class="recent__heading-title">Please Fill All Fields</p>
                        </div>
                        
                        <div class="container-recent__body card__body-form">
                            <form method="POST" class="">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Number</label>
                                            <input type="text" name="staff_number" class="form-control" value="LJCH-7436">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Name</label>
                                            <input type="text" name="staff_name" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Email</label>
                                            <input type="text" name="staff_email" class="form-control" value="admin@mail.com">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Password</label>
                                            <input type="text" name="staff_password" class="form-control" value>
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="UpdateStaff" value="Update Staff" class="btn-control btn-control-add" value="">
                                        </div>
                                    </div>
                                </div>

                            </form>
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