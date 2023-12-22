<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

    $param = checkParam('id');
    if(is_numeric($param))
    {
        $customer_id = validate($param);

        $customer = getbyId('users', $customer_id);
        if($customer['status'] != 'Data Found')
        {
            redirect('../../Admin UI/customers.php', $customer['status'], '');
        }
        else
        {
            $deleteCustomer = delete('users', $customer_id);
            if($deleteCustomer)
            {
                redirect('../../Admin UI/customers.php', '', "You've deleted customer name: {$customer['data']['fullname']} !");
            }
            else
            {
                redirect('../../Admin UI/customers.php', 'Something went wrong. Please try again!', '');
            }
        }

    }
    else
    {
        redirect('../../Admin UI/customers.php', 'Something went wrong. Please try again!', '');
    }
?>