<?php
    session_start();
    $page_title = "Tasty Tongue - Login";

    include("config/config.php");
    include('./partial/header.php');
?>

<body>
    <div class="modal">
        <div class="authen-form__header">
            <img src="./assets/image/logo_removebg-2.png" alt="TastyTongue.png" class="authen-header__logo">
            <h1 class="authen-header__name">Tasty Tongue</h1>
        </div>
        <!-- Login form -->
        <div class="authen-form">
            <div class="authen-form__form">
                <div class="authen-form__group">
                    <p class="authen-form__title">Email</p>
                    <input type="text" class="authen-form__input" placeholder="Enter your email" name="email">
                </div>
                <div class="authen-form__group">
                    <p class="authen-form__title">Password</p>
                    <input type="password" class="authen-form__input" placeholder="Enter your password" name="password">
                </div>
            </div>

            <div class="authen-form__controls">
                <a href="register.php"class="btn btn--secondary">Register</a>
                <button type="submit" class="btn btn--primary">Login</button>
            </div>

            <div class="authen-form__aside">
                <p class="authen-form__forgot-text">
                    <a href="" class="authen-form__forgot-link">Forgot password</a>
                </p>  
            </div>
        </div>            

    </div>
</body>
</html>