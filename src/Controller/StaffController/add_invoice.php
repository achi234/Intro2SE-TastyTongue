<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-add-invoice']))
    {
        $reservation_id = $_POST['reservation_id'];
        $payment_id = $_POST['payment_id'];
        $status = $_POST['invoice_status'];

        echo $reservation_id;
        echo $payment_id;
        echo $status;

        if(empty($reservation_id) || empty($payment_id) || !isset($status))
        {
            redirect('../../Staff UI/add_invoices.php', 'All fields are required.', '');
            exit(0);
        }
        else
        {
            // Trước khi INSERT, kiểm tra xem đặt bàn đã có trong danh sách hóa đơn chưa
            $checkQuery = "SELECT COUNT(*) FROM invoices WHERE reservation_id = ?";
            $checkStmt = $conn->prepare($checkQuery);
            $checkStmt->bind_param("i", $reservation_id);
            $checkStmt->execute();
            $checkStmt->bind_result($count);
            $checkStmt->fetch();
            $checkStmt->close();

            if ($count > 0) {
                // Bản ghi đã tồn tại, thực hiện UPDATE thay vì INSERT
                $updateStmt = $conn->prepare("CALL update_invoice(?, ?, ?)");
                $updateStmt->bind_param("iii", $reservation_id, $payment_id, $status);
                $updateResult = $updateStmt->execute();

                if ($updateResult) {
                    echo "UPDATE thành công!";
                    redirect('../../Staff UI/invoices.php', '', "You've update invoice!");
                } else {
                    echo "Lỗi khi thực hiện UPDATE: " . $updateStmt->error;
                    redirect('../../Staff UI/add_invoices.php', '', "Something went wrong! Please enter again...");
                }

                $updateStmt->close();
            } else {
                // Bản ghi không tồn tại, thực hiện INSERT
                $data = [
                    'reservation_id' => $reservation_id,
                    'payment_id' => $payment_id,
                    'status_invoice'    => $status
                ];
    
                $result = insert('invoices', $data);
                
                $updateStmt = $conn->prepare("CALL update_invoice(?, ?, ?)");
                $updateStmt->bind_param("iii", $reservation_id, $payment_id, $status);
                $updateResult = $updateStmt->execute();

                if($updateResult) {
                    echo "INSERT thành công!";
                    redirect('../../Staff UI/invoices.php', '', "You've made order successfully!");
                } else {
                    echo "Lỗi khi thực hiện INSERT: ";
                    redirect('../../Staff UI/add_invoices.php', '', "Something went wrong! Please enter again...");
                }

            }
        }
    }
?>
