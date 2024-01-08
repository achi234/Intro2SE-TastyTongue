<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-updateOrder']))
    {
        $reservation_id = $_POST['reservation_id'];
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        if(empty($_POST['quantity']))
        {
            redirect('../../Admin UI/update_orders.php?id='.$reservation_id.'&product_id='.$product_id, 'Please enter quantity', '');
            exit(0);
        }
        else
        {
            
            $data = [
                'reservation_id' => $reservation_id,
                'prod_id' => $product_id,
                'quantity' => $quantity,
            ];

            global $conn;

            $query = "UPDATE orders SET quantity = {$quantity}  WHERE reservation_id = {$reservation_id} and prod_id = {$product_id}";
            $result = mysqli_query($conn, $query);
    
            if($result)
            {
                redirect('../../Admin UI/order_records.php?id='.$reservation_id, '', "You've modified order successfully!");
            }
            else
            {
                redirect('../../Admin UI/update_orders.php?id='.$reservation_id.'&product_id='.$product_id, 'Something went wrong! Please enter again...', "");
            }
        }
    }
?>