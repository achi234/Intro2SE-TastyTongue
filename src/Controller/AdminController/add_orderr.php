<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-add-order']))
    {
        $prod_id = $_POST['prod_id'];
        $reservation_id = $_POST['reservation_id'];
        $quantity = $_POST['prod_quantity'];

        $product = getbyKeyValue('products', 'prod_id', $prod_id);
        $prod_name = $product['data']['prod_name'];

        echo $prod_id;
        echo $reservation_id;
        echo $quantity;

        if(empty($prod_id) || empty($reservation_id) || empty($quantity))
        {
            redirect('../../Admin UI/add_orders.php?id='.$prod_id, 'All fields are required.', '');
            exit(0);
        }
        else
        {
            // Trước khi INSERT, kiểm tra xem bản ghi đã tồn tại chưa
            $checkQuery = "SELECT COUNT(*) FROM orders WHERE reservation_id = ? AND prod_id = ?";
            $checkStmt = $conn->prepare($checkQuery);
            $checkStmt->bind_param("ii", $reservation_id, $prod_id);
            $checkStmt->execute();
            $checkStmt->bind_result($count);
            $checkStmt->fetch();
            $checkStmt->close();

            if ($count > 0) {
                // Bản ghi đã tồn tại, thực hiện UPDATE thay vì INSERT
                $updateStmt = $conn->prepare("CALL update_order(?, ?, ?)");
                $updateStmt->bind_param("iii", $reservation_id, $prod_id, $quantity);
                $updateResult = $updateStmt->execute();

                if ($updateResult) {
                    echo "UPDATE thành công!";
                    redirect('../../Admin UI/orders.php', '', "You've update order {$prod_name} for reservation {$reservation_id} successfully!");
                } else {
                    echo "Lỗi khi thực hiện UPDATE: " . $updateStmt->error;
                    redirect('../../Admin UI/add_orders.php?id='.$prod_id, '', "Something went wrong! Please enter again...");
                }

                $updateStmt->close();
            } else {
                // Bản ghi không tồn tại, thực hiện INSERT
                $insertStmt = $conn->prepare("CALL add_order(?, ?, ?)");
                $insertStmt->bind_param("iii", $reservation_id, $prod_id, $quantity);
                $insertResult = $insertStmt->execute();

                if ($insertResult) {
                    echo "INSERT thành công!";
                    redirect('../../Admin UI/orders.php', '', "You've made order {$prod_name} for reservation {$reservation_id} successfully!");
                } else {
                    echo "Lỗi khi thực hiện INSERT: " . $insertStmt->error;
                    redirect('../../Admin UI/add_orders.php?id='.$prod_id, '', "Something went wrong! Please enter again...");
                }

                $insertStmt->close();
            }
        }

    }
?>
