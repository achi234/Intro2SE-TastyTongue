<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php
          if(isset($page_title))
          {
            echo "$page_title";
          }
    ?>
    </title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700;800&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/image/logo.png">
    
    <?php 
    include('../config/config.php');
    include('../Controller/authenticate.php');
    include('../Controller/functions.php');    
    ?>

    <script src="../assets/js/swal.js"></script>
    <?php
         if (!empty($_SESSION['status'])) {  
            echo '<script>';
            echo 'setTimeout(function() {';
            echo 'swal({';
            echo '    title: "Failed",';
            echo '    text: "' . $_SESSION['status'] . '",';
            echo '    icon: "error",';
            echo '});';
            echo '}, 100);';
            echo '</script>';

            unset($_SESSION['status']);
        }

        if (!empty($_SESSION['noti'])) {  
          echo '<script>';
          echo 'setTimeout(function() {';
          echo 'swal({';
          echo '    title: "Success",';
          echo '    text: "' . $_SESSION['noti'] . '",';
          echo '    icon: "success",';
          echo '});';
          echo '}, 100);';
          echo '</script>';

          unset($_SESSION['noti']);
      }
    ?>
</head>