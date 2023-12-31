<?php
    session_start();
    include("../config/config.php");
    $count = 0;
    if(isset($_POST['btn-login']))
    {    
        if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password'])))
        {
            $email=$_POST['email'];
            $password=$_POST['password'];

            $email = stripslashes($email);
            $password = stripslashes($password);

            $sql="SELECT * FROM users WHERE email='$email' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row['password'];
            
            if(!password_verify($password, $hashedPassword))
            {
                $_SESSION['status'] = 'Wrong Email or Password. Please enter again';
                header("location: ../login.php");
                exit(0);               
            }
            else
            {
                if(mysqli_num_rows($result) > 0)
                {
                    $count=mysqli_num_rows($result);

                    // echo $row['verify_status'];
                    if($row['verify_status'] == 1)
                    {
                        $_SESSION['authenticated'] = true;
                        $_SESSION['auth_user'] = 
                        [
                            'email' => $row['email'],
                            'phone' => $row['phone'],
                            'fullname' => $row['fullname'],
                            'role' => $row['role'],
                        ];
                        $_SESSION['id']=$row['id'];

                        switch($_SESSION['auth_user']['role'])
                        {
                            case 'Admin':
                                header("location: ../Admin UI/dashboard.php");
                                exit(0);
                            case 'Customer':
                                header("location: ../Customer UI/customerHomepage.php");
                                exit(0);
                            case 'Staff':
                                header("location: ../Staff UI/dashboard.php");
                                exit(0);
                            default:
                                $_SESSION['status'] = 'Error when directing...Please try again!';
                                header("location: ../login.php");
                                exit(0);
                        }

                    }
                    else
                    {
                        $_SESSION['status'] = 'Please verify your email address to login.';
                        header("location: ../login.php");
                        exit(0);
                    }
                }
                else
                {
                    $_SESSION['status'] = 'Invalid Email or Password.';
                    header("location: ../login.php");
                    exit(0);
                }
            }
        }
        else
        {
            $_SESSION['status'] = 'All fields must be filled in.';
            header("location: ../login.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = 'Please click login button!';
        header("location: ../login.php");
        exit(0);
    }
    // if($count > 0){

    //     $_SESSION['email'] = $email;
    //     $_SESSION['password'] = $password;

    //     if ($_SESSION['role'] == "Admin")
    //     {
    //         header("location: ../Admin UI/adminHomepage.php");
    //     }
    //     elseif ($_SESSION['role'] == "Staff")
    //     {
    //         header("location: ../Staff UI/staffHomepage.php");
    //     }
    //     else
    //     {
    //         header("location: ../Customer UI/customerHomepage.php");
    //     }
    //     $_SESSION['errLogin'] = "";
    // }
    // else {
    //     header("location: ../login.php");
    //     $_SESSION['email'] = "";
    //     $_SESSION['password'] = "";
    //     $_SESSION['errLogin'] = "yes";
    // }
?>