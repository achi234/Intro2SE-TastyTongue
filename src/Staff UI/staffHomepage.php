<?php
    session_start();
    echo "Role is {$_SESSION['auth_user']['role']} ";
?>

<h6>This is Staff Homepage</h6>