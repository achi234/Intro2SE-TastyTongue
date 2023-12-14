<div class="navbar navbar-top navbar-expand-md">
    <div class="container container-header">
        <a href="dashboard.php" class="h4 container__dashboard-name">ADMIN DASHBOARD</a>

        <li class="navbar-user">
            <img alt="Image placeholder" src="../assets/image/profileImage.png" alt="" class="navbar-user-img">
            <span class="navbar-user-name">
                <?php
                    echo $_SESSION['auth_user']['fullname'];
                ?>
            </span>

            <ul class="navbar-user-menu">
                <li class="navbar-nav__item">
                    <a href="change_profile.php" class="nav-item__link text-primary">
                        <i class="fa-solid fa-user nav-item__icon"></i>
                        <p class="nav-item__text">My profile</p>
                    </a>
                </li>  
                
                <hr class="">
                
                <li class="navbar-nav__item">
                    <a href="login.php" class="nav-item__link text-primary">
                        <i class="fa-solid fa-person-running nav-item__icon"></i>
                        <p class="nav-item__text">Logout</p>
                    </a>
                </li>                       
            </ul>
        </li>
    </div>
</div>
