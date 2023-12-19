<?php
    $page_title = "Tasty Tongue - Change Customer Infomation";
    require_once('partials/_head.php');
    //require_once('partials/_analytics.php');

    $staff_id = $_GET['id'];
    $staff = getbyId('users', $staff_id);
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
                            <form method="POST" action="../Controller/AdminController/update_staff.php">
                                <input type="hidden" name="staff_id" value="<?php echo $staff['data']['id']; ?>">
                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Name</label>
                                            <input type="text" name="staff_name" class="form-control" value="<?php echo $staff['data']['fullname']; ?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Phone</label>
                                            <input type="text" name="staff_phone" class="form-control" value="<?php echo $staff['data']['phone'];?>">
                                        </div>
                                    </div>
                                </div>

                                <hr class="navbar__divider">

                                <div class="form-row">
                                    <div class="form-row__flex">
                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Email</label>
                                            <input type="text" name="staff_email" class="form-control" value="<?php echo $staff['data']['email']; ?>">
                                        </div>

                                        <div class="form-col">
                                            <label for="" class="form-col__label">Staff Password</label>
                                            <input type="password" name="staff_password" class="form-control" value="">
                                        </div>
                                    </div>
                                </div>

                                <br class="">

                                <div class="form-row">
                                    <div class="form-col margin-0">
                                        <div class="form-col-bottom">
                                            <input type="submit" name="btn-updateStaff" value="Update Staff" class="btn-control btn-control-add">
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