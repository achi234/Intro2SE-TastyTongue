<?php
    session_start();
    $page_title = "Tasty Tongue - Registration";

    include('./partial/header.php');
?>

<body>
    <div class="alert">
            <?php
            if(isset($_SESSION['status']))
            {
                echo " <h4> " .$_SESSION['status']. " </h4>";
                unset($_SESSION['status']);
            }
            ?>
    </div>
    <div class="modal">
        <!-- authen form -->
        <div class="authen-form__header">
            <div class="authen-header__logo"></div>
            <h1 class="authen-header__name">Welcome to Tasty Tongue</h1>
        </div>
        <!-- Login form -->
        <div class="authen-form">
            <div class="authen-form__form">
                <div class="authen-form__group">
                    <p class="authen-form__title">Fullname</p>
                    <input type="text" class="authen-form__input" placeholder="Enter your fullname" name="fullname">
                </div>
                <div class="authen-form__group">
                    <p class="authen-form__title">Email</p>
                    <input type="text" class="authen-form__input" placeholder="Enter your email" name="phone">
                </div>
                <div class="authen-form__group">
                    <p class="authen-form__title">Password</p>
                    <input type="password" class="authen-form__input" placeholder="Enter your password" name="email">
                </div>
                <div class="authen-form__group">
                    <p class="authen-form__title">Confirm password</p>
                    <input type="password" class="authen-form__input" placeholder="Re-enter your password" name="password">
                </div>
                </div>

                <div class="authen-form__controls">
                    <a href="login.php" class="btn btn--secondary">Back</a>
                    <button type="submit" name="btn-register" class="btn btn--primary">Register</button>
                </div>
        </div>
    </div>
</body>
</html>