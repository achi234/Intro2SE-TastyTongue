<?php
session_start();
include("../../config/config.php");
include('../functions.php');

if(isset($_GET['reservation_id'])){
    $reservation_id = $_GET['reservation_id'];
    $sql = "DELETE FROM RESERVATION_LIST WHERE RESERVATION_ID = $reservation_id";
    if ($conn->query($sql) === TRUE) {
       $_SESSION['noti'] = "Deleted reservation successfully";
        header('location: ../../Customer UI/reservationReport.php');
        // redirect('../../Customer UI/reservationReport.php', '', "Deleted reservation successfully");

    } else {
        $_SESSION['status'] = "Delete failed reservation";
        header('location: ../../Customer UI/reservationReport.php');
        // redirect('../../Customer UI/reservationReport.php', "Delete failed reservation", '');
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
