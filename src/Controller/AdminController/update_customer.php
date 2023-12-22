<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateCustomer']))
    {
        $customer_id = $_POST['customer_id'];
        if(empty($_POST['customer_name']) || empty($_POST['customer_email']) || empty($_POST['customer_phone']))
        {
            redirect('../../Admin UI/update_staff.php?id='.$customer_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            $customer_name = $_POST['customer_name'];
            $customer_email = $_POST['customer_email'];
            $customer_phone = $_POST['customer_phone'];
            $customer_password = $_POST['customer_password'];
            $password = "";
            if(!empty($customer_password))
            {
                $password = password_hash($customer_password, PASSWORD_BCRYPT);
            }
            else
            {
                $customer = getbyEmail('users', $customer_email);
                $password = $customer['data']['password'];
            }

            $data = [
                'fullname' => $customer_name,
                'password' => $password,
                'email'    => $customer_email,
                'phone'    => $customer_phone,
            ];

            $result = updatebyId('users', $customer_id, $data);

            if($result)
            {
                redirect('../../Admin UI/customers.php', '', "You've modified customer successfully!");
            }
            else
            {
                redirect('../../Admin UI/update_customer.php?id='.$customer_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>