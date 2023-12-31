<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-addCustomer']))
    {
        $customer_name = $_POST['customer_name'];
        $customer_email = $_POST['customer_email'];
        $customer_phone = $_POST['customer_phone'];
        $customer_password = $_POST['customer_password'];



        if(empty($customer_name) || empty($customer_email) || empty($customer_phone) || empty($customer_password))
        {
            redirect('../../Admin UI/add_customer.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $emailCheck = "SELECT * FROM users WHERE email ='$customer_email'";
            $compile_emailCheck = mysqli_query($conn, $emailCheck);
            if($compile_emailCheck)
            {
                if(mysqli_num_rows($compile_emailCheck) > 0)
                {
                    redirect('../../Admin UI/add_customer.php', 'Email has already register. Please choose another email', '');
                    exit(0);
                }
            }

            $password = password_hash($customer_password, PASSWORD_BCRYPT);

            $data = [
                'fullname' => $customer_name,
                'password' => $password,
                'email'    => $customer_email,
                'phone'    => $customer_phone,
                'role'     => 'Customer',
                'verify_status' => 1,
            ];

            $result = insert('users', $data);

            if($result)
            {
                redirect('../../Admin UI/customers.php', '', "You've created customer successfully!");
            }
            else
            {
                redirect('../../Admin UI/add_customer.php', '', "Something went wrong! Please enter again...");
            }
        }

    }
?>
