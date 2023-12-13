<?php 
    session_start();
    include("../../config/config.php");
    			
    if($_POST['table_id'] != 0){
        $customer_id = 1;
        $contact = $_POST['contact'];
        $email =$_POST['email'];
        $table_id = $_POST['table_id'];
        $datetime = $_POST['datetime'];

        $sql = "INSERT INTO reservation_list (customer_id, contact, email, table_id, datetime) 
        VALUES ('$customer_id', '$contact', '$email', '$table_id', '$datetime')";

        if ($conn->query($sql) === TRUE) {
            echo "Reservation submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else{
        $datetime = $_POST['datetime'];
         // Xử lý thời gian và truy vấn cơ sở dữ liệu để lấy danh sách bàn khả dụng
         $sql = "SELECT table_name, table_id FROM table_list WHERE table_name NOT IN (
            SELECT table_name FROM reservation_list WHERE datetime = '$datetime'
        )";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // Hiển thị danh sách bàn dưới dạng HTML
        while ($row = $result->fetch_assoc()) {
            echo '<label><input type="radio" name="selected_table" value="' . $row['table_id'] . '"> ' . $row['table_name'] . '</label><br>';
        }
        } else {
        echo "No available tables.";
        }
    }
    
    
    $conn->close();
?>