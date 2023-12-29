<?php
session_start();
include("../../config/config.php");

if ($_POST['table_id'] != 0) {
    
    $table_id = $_POST['table_id'];
    $datetime = $_SESSION['datetime'];
    $user_id = $_SESSION['id'];

    $sql = "INSERT INTO reservation_list (user_id, table_id, datetime) 
        VALUES ('$user_id', '$table_id', '$datetime')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $datetime = $_POST['datetime'];
    $size = $_POST['size'];
    echo $size;
    // Xử lý thời gian và truy vấn cơ sở dữ liệu để lấy danh sách bàn khả dụng
    $sql = "SELECT table_name, table_id FROM table_list WHERE table_name NOT IN (
            SELECT table_name FROM reservation_list WHERE datetime = '$datetime'
        ) AND size >= $size";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    
        // Lưu kết quả vào SESSION

        $_SESSION['datetime'] =$_POST['datetime'];
        $_SESSION['size'] =$_POST['size'];

        // Chuyển hướng sang trang tableChoosing.php
        header("Location: ../../Customer UI/tableChoosing.php");
    } else {
        echo "No available tables.";
        header("Location: ../../Customer UI/reservation.php");
    }
}


$conn->close();
