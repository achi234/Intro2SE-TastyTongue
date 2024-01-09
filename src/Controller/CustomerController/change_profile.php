<?php
include('../functions.php');
include("../../config/config.php");
session_start();
echo $_POST['customer_fullname'];
echo $_POST['customer_phone'];
echo $_POST['customer_email'];
echo $_SESSION['id'];
if (isset($_POST['changeCustomerProfile'])) {
    //Prevent Posting Blank Values
    if (empty($_POST["customer_phone"]) || empty($_POST["customer_fullname"]) || empty($_POST['customer_email'])) {
        $err = "Blank Values Not Accepted";
    } else {
        $customer_name = $_POST['customer_fullname'];
        $customer_phone = $_POST['customer_phone'];
        $customer_email = $_POST['customer_email'];
        $customer_id = $_SESSION['id'];

        //Insert Captured information to a database table
        $sql = "UPDATE users SET fullname = '$customer_name', email = '$customer_email', phone = '$customer_phone' WHERE id = '$customer_id' ";
        if($conn->query($sql) === TRUE){
            redirect('../../Customer UI/change_profile.php', '', "You've successfully changed the profile");
        }
        else{
            redirect('../../Customer UI/change_profile.php', "You haven't successfully changed the profile", "");
        }
    }
}
