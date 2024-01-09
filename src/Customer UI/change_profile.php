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
                    <div class="heading_container heading_center layout_padding-bottom">
                        <h2 class="text-green">
                            Change Profile
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="profile">
                                <div class="heading_container">
                                    <p class="text-green font-weight-bold">
                                        My Account
                                    </p>
                                </div>
                                <form method="POST" class=""
                                    action="../Controller/CustomerController/change_profile.php">
                                    <div class="form-row">
                                        <h6 class="heading-small text-muted margin-0">User Information</h6>
                                        <br class="">
                                        <?php
                                        $customer_id = $_SESSION['id'];
                                        $sql = "SELECT* FROM users WHERE id = '$customer_id'";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        ?>

                                        <div class="form-small">
                                            <div class="form-col margin-0">
                                                <label for="" class="form-col__label font-weight-bold">Email
                                                    Address</label>
                                                <input type="text" name="customer_email" class="form-control"
                                                    value="<?php echo $row['email'] ?>">
                                            </div>

                                            <br class="">

                                            <div class="form-row__flex">
                                                <div class="form-col margin-0">
                                                    <label for="" class="form-col__label font-weight-bold">Full
                                                        Name</label>
                                                    <input type="text" name="customer_fullname" class="form-control"
                                                        value="<?php echo $row['fullname'] ?>">
                                                </div>

                                                <div class="form-col margin-0">
                                                    <label for="" class="form-col__label font-weight-bold">Phone
                                                        Number</label>
                                                    <input type="text" name="customer_phone" class="form-control"
                                                        value="<?php echo $row['phone'] ?>">
                                                </div>
                                            </div>

                                            <br class="">

                                            <div class="form-col">
                                                <div class="form-col-bottom">
                                                <input type="submit" id="" name="changeCustomerProfile"
                                                        class="btn-control btn-control-add" value="Change Profile">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <hr class="custom_dropdown-divider">

                                <form method="POST" class="">
                                    <div class="form-row">
                                        <h6 class="heading-small text-muted margin-0">Change Password</h6>

                                        <br class="">

                                        <div class="form-small">
                                            <div class="form-col margin-0">
                                                <label for="" class="form-col__label font-weight-bold">Old Password</label>
                                                <input type="text" name="new_password" class="form-control" value>
                                            </div>

                                            <br class="">

                                            <div class="form-col margin-0">
                                                <label for="" class="form-col__label font-weight-bold">New Password</label>
                                                <input type="text" name="new_password" class="form-control" value>
                                            </div>

                                            <br class="">

                                            <div class="form-col margin-0">
                                                <label for="" class="form-col__label font-weight-bold">Confirm New Password</label>
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
                        <div class="col-md-4">
                            <div class="form-row justify-content-center">
                                <div class="form-col order-lg-2">
                                    <div class="card-profile-image">
                                        <a href="#" class="">
                                            <img src="../assets/image/user-a-min.png" alt="" class="rounded-circle">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="container-recent__body card__body-form">
                                <div class="card-profile-status justify-content-center">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p class="recent__heading-title margin-0">Customer</p>
                                <div class="text__profile-email">
                                    <?php echo $_SESSION['auth_user']['fullname'] ?>
                                </div>
                            </div>
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