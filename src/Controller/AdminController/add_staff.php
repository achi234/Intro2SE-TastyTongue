<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-addStaff']))
    {
        $staff_name = $_POST['staff_name'];
        $staff_email = $_POST['staff_email'];
        $staff_phone = $_POST['staff_phone'];
        $staff_password = $_POST['staff_password'];



        if(empty($staff_name) || empty($staff_email) || empty($staff_phone) || empty($staff_password))
        {
            redirect('../../Admin UI/add_staffs.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $emailCheck = "SELECT * FROM users WHERE email ='$staff_email'";
            $compile_emailCheck = mysqli_query($conn, $emailCheck);
            if($compile_emailCheck)
            {
                if(mysqli_num_rows($compile_emailCheck) > 0)
                {
                    redirect('../../Admin UI/add_staffs.php', 'Email has already register. Please choose another email', '');
                    exit(0);
                }
            }

            $password = password_hash($staff_password, PASSWORD_BCRYPT);

            $data = [
                'fullname' => $staff_name,
                'password' => $password,
                'email'    => $staff_email,
                'phone'    => $staff_phone,
                'role'     => 'Staff',
                'verify_status' => 1,
            ];

            $result = insert('users', $data);

            if($result)
            {
                redirect('../../Admin UI/staffs.php', '', "You've created staff successfully!");
            }
            else
            {
                redirect('../../Admin UI/add_staffs.php', '', "Something went wrong! Please enter again...");
            }
        }

    }
?>
