<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    global $conn;

    $res_id = $_POST['reservation_id'];
    $product_id =  $_POST['product_id'];
    $qty =  $_POST['quantity'];

    if(empty($qty)) 
    {
        redirect('../../Staff UI/make_orders.php?id='.$res_id.'&status=1', 'Please enter quantity', '');
        exit(0);
    }

    $product = getbyKeyValue('products','prod_id',$product_id);

    $updateStmt = $conn->prepare("CALL update_order(?, ?, ?)");
    $updateStmt->bind_param("iii", $res_id, $product_id, $qty);
    $updateResult = $updateStmt->execute();

    if ($updateResult) 
    {
        redirect('../../Staff UI/order_records.php?id='.$res_id, '', "You've updated the order successfully!");
    } 
    else 
    {
       
        redirect('../../Staff UI/order_records.php?id='.$res_id, 'Something went wrong! Please try again...', "");
    }

    $updateStmt->close();
?>
