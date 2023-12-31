<?php
include('../functions.php');
include("../../config/config.php");
session_start();
echo $_POST['admin_fullname'];
echo $_POST['admin_phone'];
echo $_POST['admin_email'];
echo $_SESSION['id'];
if (isset($_POST['changeAdminProfile'])) {
    //Prevent Posting Blank Values
    if (empty($_POST["admin_phone"]) || empty($_POST["admin_fullname"]) || empty($_POST['admin_email'])) {
        $err = "Blank Values Not Accepted";
    } else {
        $admin_name = $_POST['admin_fullname'];
        $admin_phone = $_POST['admin_phone'];
        $admin_email = $_POST['admin_email'];
        $admin_id = $_SESSION['id'];

        //Insert Captured information to a database table
        $sql = "UPDATE users SET fullname = '$admin_name', email = '$admin_email', phone = '$admin_phone' WHERE id = '$admin_id' ";
        if($conn->query($sql) === TRUE){
            redirect('../../Admin UI/change_profile.php', '', "You've successfully changed the profile");
        }
        else{
            redirect('../../Admin UI/change_profile.php', "You haven't successfully changed the profile", "");
        }
    }
}
