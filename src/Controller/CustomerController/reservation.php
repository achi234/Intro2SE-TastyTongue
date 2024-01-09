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
        $_SESSION['noti'] = "Reservation submitted successfully!";
        header("Location: ../../Customer UI/reservationReport.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 
if($_POST['table_id'] == 0 && $check == false) {
    
    $datetime = $_POST['datetime'];

    // Chuyển đổi ngày nhập thành đối tượng DateTime
    $inputDatetime = new DateTime($datetime);
    // Lấy giờ và phút từ thời gian nhập
    $inputHourMinute = $inputDatetime->format('H:i');
    
    // Lấy ngày hiện tại
    $currentDate = new DateTime();

    // Thiết lập thời gian giới hạn
    $startHourMinute = '10:00';
    $endHourMinute = '22:00';

    // So sánh ngày nhập và ngày hiện tại
    if ($inputDatetime < $currentDate) {
        echo "Ngày nhập là ngày trong quá khứ.";
        $_SESSION['status'] = "Do not enter times in the past. Please re-enter.";
        header("Location: ../../Customer UI/reservation.php");
        exit(0);
    } else {
        echo "Ngày nhập không phải là ngày trong quá khứ.";
    }

    // Kiểm tra xem thời gian nhập có nằm trong khoảng từ 10am đến 10pm không
    if ($inputHourMinute >= $startHourMinute && $inputHourMinute <= $endHourMinute) {
        echo "Thời gian nhập nằm trong khoảng từ 10am đến 10pm.";
    } else {
        echo "Thời gian nhập không nằm trong khoảng từ 10am đến 10pm.";
        $_SESSION['status'] = "The time is not within the restaurant's operating hours (10am - 10pm). Please re-enter.";
        header("Location: ../../Customer UI/reservation.php");
        exit(0);
    }

    $size = $_POST['size'];
    echo $size;
    // Xử lý thời gian và truy vấn cơ sở dữ liệu để lấy danh sách bàn khả dụng
    // $sql = "SELECT table_name, table_id FROM table_list WHERE table_name NOT IN (
    //         SELECT table_name FROM reservation_list WHERE datetime = '$datetime'
    //     ) AND size >= $size";

    $sql = "SELECT table_name, table_id FROM table_list WHERE table_id NOT IN (
        SELECT table_id FROM reservation_list WHERE datetime >= '$datetime' - INTERVAL 1 HOUR  
        AND (status  = 0 OR status = 1)
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
