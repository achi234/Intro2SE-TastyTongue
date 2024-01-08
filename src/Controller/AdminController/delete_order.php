<?php

    include('../functions.php');
    include("../../config/config.php");
    session_start();

        $reservation_id = $_GET['id'];
        $product_id = $_GET['product_id'];
            
        global $conn;

        $query = "DELETE FROM orders WHERE reservation_id = {$reservation_id} and prod_id = {$product_id}";
        $result = mysqli_query($conn, $query);
    
        if($result)
        {
            redirect('../../Admin UI/order_records.php?id='.$reservation_id, '', "You've deleted order successfully!");
        }
        else
        {
            redirect('../../Admin UI/order_records.php?id='.$reservation_id, 'Something went wrong! Please enter again...', "");
        }

?>