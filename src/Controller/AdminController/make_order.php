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
        redirect('../../Admin UI/make_orders.php?id='.$res_id.'&status=1', 'Please enter quantity', '');
        exit(0);
    }
    $product = getbyKeyValue('products','prod_id',$product_id);

    $checkQuery = "SELECT COUNT(*) FROM orders WHERE reservation_id = ? AND prod_id = ?";
    $checkStmt = $conn->prepare($checkQuery);
    $checkStmt->bind_param("ii", $res_id, $product_id);
    $checkStmt->execute();
    $checkStmt->bind_result($count);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($count > 0) 
    {
        $updateStmt = $conn->prepare("CALL update_order(?, ?, ?)");
        $updateStmt->bind_param("iii", $res_id, $product_id, $qty);
        $updateResult = $updateStmt->execute();

        if ($updateResult) {
           //echo "UPDATE thành công!";
           redirect('../../Admin UI/make_orders.php?id='.$res_id.'&status=1', '', "You've ordered {$qty}  {$product['data']['prod_name']} successfully!");
        } 
        else 
        {
            //echo "Lỗi khi thực hiện UPDATE: " . $updateStmt->error;
            redirect('../../Admin UI/make_orders.php?id='.$res_id.'&status=1', 'Something went wrong! Please try again...', "");
        }

        $updateStmt->close();
    } 
    else 
    {
        $insertStmt = $conn->prepare("CALL add_order(?, ?, ?)");
        $insertStmt->bind_param("iii", $res_id, $product_id, $qty);
        $insertResult = $insertStmt->execute();

        if ($insertResult) {
            //echo "INSERT thành công!";
            redirect('../../Admin UI/make_orders.php?id='.$res_id.'&status=1', '', "You've ordered {$qty}  {$product['data']['prod_name']} successfully!");
        } 
        else 
        {
            //echo "Lỗi khi thực hiện INSERT: " . $insertStmt->error;
            redirect('../../Admin UI/make_orders.php?id='.$res_id.'&status=1', 'Something went wrong! Please try again...', "");
        }

        $insertStmt->close();
    }

?>
