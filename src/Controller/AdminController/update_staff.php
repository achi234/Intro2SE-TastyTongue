<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateStaff']))
    {
        $staff_id = $_POST['staff_id'];
        if(empty($_POST['staff_name']) || empty($_POST['staff_email']) || empty($_POST['staff_phone']))
        {
            redirect('../../Admin UI/update_staff.php?id='.$staff_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $staff_name = $_POST['staff_name'];
            $staff_email = $_POST['staff_email'];
            $staff_phone = $_POST['staff_phone'];
            $staff_password = $_POST['staff_password'];
            $password = "";
            if(!empty($staff_password))
            {
                $password = password_hash($staff_password, PASSWORD_BCRYPT);
            }
            else
            {
                $staff = getbyEmail('users', $staff_email);
                $password = $staff['data']['password'];
            }

            $data = [
                'fullname' => $staff_name,
                'password' => $password,
                'email'    => $staff_email,
                'phone'    => $staff_phone,
            ];

            $result = updatebyEmail('users', $staff_email, $data);

            if($result)
            {
                redirect('../../Admin UI/staffs.php', '', "You've modified staff successfully!");
            }
            else
            {
                redirect('../../Admin UI/update_staff.php?email='.$staff_email, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>