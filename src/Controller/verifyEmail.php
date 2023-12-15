<?php

    session_start();
    include("config/config.php");

    if(isset($_GET['token']))
    {
        $token = $_GET['token'];
        $verify_query = "SELECT verify_token, verify_status FROM users WHERE verify_token = '$token' LIMIT 1 ";

        $compile_verify_query = mysqli_query($conn, $verify_query);
        
        if(mysqli_num_rows($compile_verify_query) > 0)
        {
            $row = mysqli_fetch_array($compile_verify_query);
            //echo $row['verify_token'];

            switch ($row["verify_status"])
            {
                case "0":
                    $token = $row["verify_token"];
                    $update_query = "UPDATE users SET verify_status='1' WHERE verify_token='$token' LIMIT 1";
                    $compile_update_query = mysqli_query($conn, $update_query);
                    if($compile_update_query)
                    {
                        $_SESSION['status'] = "Your Account has been verified successfully! Please Login.";
                        header("location: login.php");
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['status'] = "Verification Failed!";
                        header("location: login.php");
                        exit(0);
                    }
                    break;
                case "1":
                    $_SESSION['status'] = "Email is already verified!";
                    header("location: login.php");
                    exit(0);
                    break;
                default:
                    break;
            }
        }
        else
        {
            $_SESSION['status'] = "The token does not exist!";
            header("location: login.php");
        }
    }
    else{
        $_SESSION['status'] = "Not allowed";
        header("location: login.php");
    }
?>