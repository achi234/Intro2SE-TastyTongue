<?php
    session_start();
    include("../config/config.php");
    include("./functions.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require '../vendor/autoload.php';

    function email_verify($name, $email,$verify_token)
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPAuth   = true; 

        $mail->Host       = 'smtp.gmail.com';  
        $mail->Username   = 'catle5672@gmail.com'; 
        $mail->Password   = 'uzxjcbqamhvkwdgx';

        $mail->SMTPSecure = "tls";
        $mail->Port       = 587;

        $mail->setFrom('catle5672@gmail.com', 'Tasty Tongue');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email Vertification from Tasty Tongue';

        $email_template = "
        <h2> Hi, $name. Thank you for your registration to Tasty Tongue </h2>
        <h5> Verify your email address to login by clicking the below link </h5>
        <br/><br/>
        <a href='http://localhost/Intro2SE-TastyTongue/src/Controller/verifyEmail.php?token=$verify_token'>Click Here</a>
        ";

        $mail->Body = $email_template;
        $mail->send();
        //echo 'Message has been sent';
    }

    if(isset($_POST["btn-register"]))
    {
        if(!empty($_POST["fullname"]) && !empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["password"]))
        {
            $name = $_POST["fullname"];
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password = password_hash($password, PASSWORD_BCRYPT);

            $role = "Customer";
            $verify_token = md5(rand());

            // email_verify("$name","$email", "$verify_token");

            // echo "Check your inbox";
            $check_email_query = "SELECT email from users where email = '$email' limit 1";
            $compile_check_email_query = mysqli_query($conn, $check_email_query);

            if(mysqli_num_rows($compile_check_email_query) > 0)
            {
                //$_SESSION['status'] = "Email is already registered";
                redirect('../register.php', 'Email is already registered', '');
            }
            else
            {
                if(!isValidEmail($email))
                {
                    redirect('../register.php', 'Invalid format of email. Please try again', '');
                }

                if(!isValidPhoneNumber($phone))
                {
                    redirect('../register.php', 'Invalid format of phone number. Please try again', '');
                }

                //Insert User 
                $query = "INSERT INTO users(fullname,email, password, phone, role, verify_token) 
                                    VALUES('$name','$email','$password','$phone','$role','$verify_token')";
                $complie_query = mysqli_query($conn, $query);



                if($complie_query)
                {
                    email_verify("$name","$email", "$verify_token");
                    $_SESSION['noti'] = "You've registered. Please verify your email!";
                    redirect('../register.php', '', "You've registered. Please verify your email!");
                }
                else
                {
                    redirect('../register.php', 'Registration Failed!', "");
                }
            }
        }
        else
        {
            $_SESSION['status'] = "Please fill in all fields";
            header("location: ../register.php");
        }
    }