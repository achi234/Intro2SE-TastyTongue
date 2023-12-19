<?php
    session_start();
    $page_title = "Tasty Tongue - Registration";

    include('./partial/header.php');
?>

<body>
    <div class="modal">
        <!-- authen form -->
        <div class="authen-form__header">
            <div class="authen-header__logo"></div>
            <h1 class="authen-header__name">Welcome to Tasty Tongue</h1>
        </div>
            <div class="authen-form">
                <div class="authen-form__form">
                    <form method="post" action="Controller/register.php">
                        <div class="authen-form__group">
                            <p class="authen-form__title">Fullname</p>
                            <input type="text" class="authen-form__input" placeholder="Enter your fullname" name="fullname">
                        </div>
                        <div class="authen-form__group">
                            <p class="authen-form__title">Email</p>
                            <input type="text" class="authen-form__input" placeholder="Enter your email" name="email">
                        </div>
                        <div class="authen-form__group">
                            <p class="authen-form__title">Phone Number</p>
                            <input type="text" class="authen-form__input" placeholder="Enter your phone number" name="phone">
                        </div>
                        <div class="authen-form__group">
                            <p class="authen-form__title">Password</p>
                            <input type="password" class="authen-form__input" placeholder="Enter your password" name="password">
                        </div>
                </div>
        
                <div class="authen-form__controls">
                    <a href="login.php" class="btn btn--secondary">Back</a>
                    <button type="submit" name="btn-register" class="btn btn--primary" name="btn-register">Register</button>
                </div>
                    </form>
            </div>
    </div>
</body>
</html>
