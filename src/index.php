<?php
    session_start();
    include("config/config.php");

        // $email = $_POST['email'];
        // echo "Email : {$email}";

        // $password = $_POST['password'];
        // echo "Password : {$password}";

    
    
?>
<!DOCTYPE html>
<html lang="en" class="main-background">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Tongue</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700;800&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet"></head>
<body>
    <div class="modal">
        <!-- Login form -->

        <form method="post" action="checklogin.php">
            <div class="login-form">
                <div class="login-form__header">
                    <img src="./assets/image/logo_removebg-2.png" alt="TastyTongue.png" class="login-header__logo">
                    <h1 class="login-header__name">Tasty Tongue</h1>
                </div>
                <?php 
                if($_SESSION["errLogin"] == "yes")
                {
                    echo '<div class="alert alert-danger" style="position: relative;
                    padding: 0.75rem 1.25rem;
                    margin-bottom: 1rem;
                    border: 1px solid transparent;
                    border-radius: 0.25rem; color: #721c24;
                    background-color: #f8d7da;
                    border-color: #f5c6cb;"> Invalid Email/Password. Please enter again! </div>';
                }
                ?>
                <div class="login-form__form">
                    <div class="login-form__group">
                        <input type="text" class="login-form__input" placeholder="Email" name="email">
                    </div>
                    <div class="login-form__group">
                        <input type="password" class="login-form__input" placeholder="Password" name="password">
                    </div>
                </div>

                <div class="login-form__controls">
                    <a href="register.php"><button class="btn btn--secondary">Register</button>
                    </a>
                    <button type="submit" class="btn btn--primary">Submit</button>
                </div>

                <div class="login-form__aside">
                    <p class="login-form__forgot-text">
                        <a href="" class="login-form__forgot-link">Forgot password</a>
                    </p>  
                </div>
            </div>
        </form>
    </div>
</body>
</html>

<?php
        $_SESSION["errLogin"] = "";
?>