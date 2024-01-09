<?php
include('../functions.php');
include("../../config/config.php");
session_start();

if (isset($_POST['date_time']) && isset($_POST['party_size'])) {
    // Nhận dữ liệu từ Ajax
    $party_size = $_POST['party_size'];
    $date_time = $_POST['date_time'];

    // Thực hiện truy vấn SQL để lấy các bàn khả dụng
    $sql = "SELECT table_name, table_id FROM table_list WHERE table_id NOT IN (
    SELECT table_id FROM reservation_list WHERE datetime >= ? - INTERVAL 1 HOUR  
    AND (status  = 0 OR status = 1)
    ) AND size >= ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $date_time, $party_size);
    $stmt->execute();
    $result = $stmt->get_result();

    // Lấy kết quả truy vấn
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // Hiển thị kết quả
   
    echo '<select name="table_id" class="form-cotrol">';
    foreach ($rows as $row) {
        $table_id = $row['table_id'];
        $table_name = $row['table_name'];
        echo "<option value=".$table_id." >$table_name</option>";
    }
    echo "</select>";
}
?>
