<?php
$page_title = "Tasty Tongue - Change Profile";
require_once('partials/_head.php');
include('../config/config.php');
include('../Controller/authenticate.php');

//require_once('partials/_analytics.php');
?>

<body>
    <!-- Main content -->
    <div class="main-content">
        <div class="content">
            <!-- Top navbar -->
            <?php
            require_once('partials/topnav.php');
            ?>
            <!-- Page content -->
            <section class="book_section layout_padding">
                <div class="container">
                    <div class="heading_container heading_center">
                        <h2 class="text-green">
                            Change Profile
                        </h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form method="POST" class="" action="../Controller/AdminController/change_profile.php">
                                <div class="form-row">
                                    <h6 class="heading-small text-muted margin-0">User Information</h6>

                                    <br class="">

                                    <?php
                                    $admin_id = $_SESSION['id'];
                                    $sql = "SELECT* FROM users WHERE id = '$admin_id'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_array($result);
                                    ?>

                                    <div class="form-small">
                                        <div class="form-col margin-0">
                                            <label for="" class="form-col__label">Email Address</label>
                                            <input type="text" name="admin_email" class="form-control"
                                                value="<?php echo $row['email'] ?>">
                                        </div>

                                        <br class="">

                                        <div class="form-row__flex">
                                            <div class="form-col margin-0">
                                                <label for="" class="form-col__label">Full Name</label>
                                                <input type="text" name="admin_fullname" class="form-control"
                                                    value="<?php echo $row['fullname'] ?>">
                                            </div>

                                            <div class="form-col margin-0">
                                                <label for="" class="form-col__label">Phone Number</label>
                                                <input type="text" name="admin_phone" class="form-control"
                                                    value="<?php echo $row['phone'] ?>">
                                            </div>
                                        </div>

                                        <br class="">

                                        <div class="form-col">
                                            <div class="form-col-bottom">
                                                <input type="submit" id="" name="changeAdminProfile"
                                                    class="btn-control btn-control-add" value="Submit">
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="navbar__divider">


                                </div>
                            </form>
                            <form method="POST" class="">
                                <div class="form-row">
                                    <h6 class="heading-small text-muted">Change Password</h6>

                                    <br class="">

                                    <div class="form-small">
                                        <div class="form-col margin-0">
                                            <label for="" class="form-col__label">Old Password</label>
                                            <input type="text" name="new_password" class="form-control" value>
                                        </div>

                                        <br class="">

                                        <div class="form-col margin-0">
                                            <label for="" class="form-col__label">New Password</label>
                                            <input type="text" name="new_password" class="form-control" value>
                                        </div>

                                        <br class="">

                                        <div class="form-col margin-0">
                                            <label for="" class="form-col__label">Confirm New Password</label>
                                            <input type="text" name="confirm_password" class="form-control" value>
                                        </div>

                                        <br class="">

                                        <div class="form-col">
                                            <div class="form-col-bottom">
                                                <input type="submit" id="" name="changePassword"
                                                    class="btn-control btn-control-add" value="Change Password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Footer -->
            <?php
            require_once('partials/_footer.php');
            ?>
        </div>
    </div>

</body>

</html>