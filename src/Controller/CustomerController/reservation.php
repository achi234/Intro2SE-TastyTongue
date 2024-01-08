<?php
session_start();
include("../../config/config.php");

$check = false;
if($_POST['datetime'] =="" || $_POST['size'] == ""){
    
    if($_POST['table_id'] == 0){
    $_SESSION['status'] = "Reservation information must not be left blank.";
    }
    $check = true;
    header("Location: ../../Customer UI/reservation.php");
}
else{
    $check = false;
}

if ($_POST['table_id'] != 0) {
    
    $table_id = $_POST['table_id'];
    $datetime = $_SESSION['datetime'];
    $user_id = $_SESSION['id'];
    $party_size = $_SESSION['size'];

    $sql = "INSERT INTO reservation_list (user_id, table_id, datetime, party_size) 
        VALUES ('$user_id', '$table_id', '$datetime', '$party_size')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['announce'] = "Reservation submitted successfully!";
        header("Location: ../../Customer UI/reservationReport.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 
if($_POST['table_id'] == 0 && $check == false) {
    
    $datetime = $_POST['datetime'];

    // Chuyển đổi ngày nhập thành đối tượng DateTime
    $inputDate = new DateTime($datetime);

    // Lấy ngày hiện tại
    $currentDate = new DateTime();

    // Thiết lập thời gian giới hạn
    $startTime = new DateTime('10:00:00');
    $endTime = new DateTime('22:00:00');

    // So sánh ngày nhập và ngày hiện tại
    if ($inputDate < $currentDate) {
        echo "Ngày nhập là ngày trong quá khứ.";
        $_SESSION['status'] = "Do not enter times in the past. Please re-enter.";
        header("Location: ../../Customer UI/reservation.php");
        exit(0);
    } else {
        echo "Ngày nhập không phải là ngày trong quá khứ.";
    }

    if ($inputTime >= $startTime && $inputTime <= $endTime) {
        echo "Thời gian nhập nằm trong khoảng từ 8am đến 7pm.";
        
    } else {
        echo "Thời gian nhập không nằm trong khoảng từ 8am đến 7pm.";
        $_SESSION['status'] = "The time is not within the restaurant's operating hours (10am - 10pm). Please re-enter.";
        header("Location: ../../Customer UI/reservation.php");
        exit(0);
    }

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
        // echo "No available tables.";
        $_SESSION['status'] = "No available tables.";
        header("Location: ../../Customer UI/reservation.php");

    }
}


$conn->close();
