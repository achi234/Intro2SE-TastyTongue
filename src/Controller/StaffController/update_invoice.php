<?php
    include('../functions.php');
    include("../../config/config.php");
    session_start();
    if(isset($_POST['btn-update-invoice']))
    {
        $reservation_id = $_POST['reservation_id'];
        $payment_id = $_POST['payment_id'];
        $status = $_POST['status_invoice'];
        $invoice = getbyKeyValue('invoices', 'reservation_id', $reservation_id);
        $invoice_id = $invoice['data']['invoice_id'];

        echo 'res'.$reservation_id;
        echo 'pay'.$payment_id;
        echo 'inv'.$invoice_id;
        echo 'status'.$status;

        if(empty($reservation_id) || empty($payment_id) || !isset($status))
        {
            echo "All fields are required.";
            redirect('../../Staff UI/update_invoices.php?id='.$invoice_id, 'All fields are required.', '');
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
                    redirect('../../Staff UI/invoices.php', '', "You've update invoice {$invoice_id}!");
                } else {
                    echo "Lỗi khi thực hiện UPDATE: " . $updateStmt->error;
                    redirect('../../Staff UI/update_invoices.php?id='.$invoice_id, '', "Something went wrong! Please enter again...");
                }

                $updateStmt->close();
            } 
        }
    }
?>
