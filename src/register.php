<?php
    session_start();
    $page_title = "Tasty Tongue - Registration";

    include('./partial/header.php');
?>

<body>

    <div class="modal">
        <!-- authen form -->
        <form method="post" action="Controller/register.php">
            <div class="authen-form">
                <div class="authen-form__header">
                    <h1 class="authen-header__name">Welcome to Tasty Tongue</h1>
                </div>

                <div class="authen-form__form">
                    <!-- <div class="authen-form__group">
                        <input type="text" class="authen-form__input" placeholder="Username">
                    </div> -->
                    <div class="authen-form__group">
                        <input type="text" class="authen-form__input" placeholder="Fullname" name="fullname">
                    </div>
                    <div class="authen-form__group">
                        <input type="text" class="authen-form__input" placeholder="Phone Number" name="phone">
                    </div>
                    <div class="authen-form__group">
                        <input type="text" class="authen-form__input" placeholder="Email Address" name="email">
                    </div>
                    <div class="authen-form__group">
                        <input type="password" class="authen-form__input" placeholder="Password" name="password">
                    </div>
                    
                </div>

                <div class="authen-form__controls">
                    <a href="login.php"><button type="button" class="btn btn--secondary">Back</button>
                    </a>
                    
                    <button type="submit" name="btn-register" class="btn btn--primary">Register</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>