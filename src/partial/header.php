<!DOCTYPE html>
<html lang="en" class="main-background">
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
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700;800&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet"></head>
    <script src="assets/js/swal.js"></script>
    <?php
         if (isset($_SESSION['status'])) {  
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

        if (isset($_SESSION['announce'])) {  
          echo '<script>';
          echo 'setTimeout(function() {';
          echo 'swal({';
          echo '    title: "Success",';
          echo '    text: "' . $_SESSION['announce'] . '",';
          echo '    icon: "success",';
          echo '});';
          echo '}, 100);';
          echo '</script>';

          unset($_SESSION['announce']);
      }
    ?>