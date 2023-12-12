<?php
    session_start();
    include("../config/config.php");
    $count = 0;
    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];

        $email = stripslashes($email);
        $password = stripslashes($password);

        $sql="SELECT * FROM users WHERE email='$email' and password='$password'";
        $result = mysqli_query($conn, $sql);

        $row=mysqli_fetch_array($result);

        $_SESSION['role'] = $row['role'];

        $count=mysqli_num_rows($result);
    }
    else
    {
        echo "Username/password should not be empty!";
    }

    if($count > 0){

        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        if ($_SESSION['role'] == "Admin")
        {
            header("location: ../Admin UI/adminHomepage.php");
        }
        elseif ($_SESSION['role'] == "Staff")
        {
            header("location: ../Staff UI/staffHomepage.php");
        }
        else
        {
            header("location: ../Customer UI/customerHomepage.php");
        }
        $_SESSION['errLogin'] = "";
    }
    else {
        header("location: ../login.php");
        $_SESSION['email'] = "";
        $_SESSION['password'] = "";
        $_SESSION['errLogin'] = "yes";
    }
?>