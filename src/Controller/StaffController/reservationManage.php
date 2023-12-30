<?php
session_start();
include("../../config/config.php");

if(isset($_GET['arrived'])){
    $reservation_id = $_GET['arrived'];
    $sql = "UPDATE reservation_list SET STATUS = '1' WHERE RESERVATION_ID = $reservation_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../../Staff UI/reservationManage.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if(isset($_GET['done'])){
    $reservation_id = $_GET['done'];
    $sql = "UPDATE reservation_list SET STATUS = '2' WHERE RESERVATION_ID = $reservation_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../../Staff UI/reservationManage.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if(isset($_GET['delete'])){
    $reservation_id = $_GET['delete'];
    $sql = "DELETE FROM RESERVATION_LIST WHERE RESERVATION_ID = $reservation_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../../Staff UI/reservationManage.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
