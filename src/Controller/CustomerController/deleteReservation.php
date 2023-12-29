<?php
session_start();
include("../../config/config.php");
if(isset($_GET['reservation_id'])){
    $reservation_id = $_GET['reservation_id'];
    $sql = "DELETE FROM RESERVATION_LIST WHERE RESERVATION_ID = $reservation_id";
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
        header("Location: ../../Customer UI/reservationReport.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
