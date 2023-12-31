<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="../assets/image/favicon.jpg" type="">

  <title>
    <?php
    if (isset($page_title)) {
      echo "$page_title";
    }
    ?>
  </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Custom styles for this template -->
  <link href="../assets/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../assets/css/responsive.css" rel="stylesheet" />

  <!-- jQery -->
  <script src="../assets/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="../assets/js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="../assets/js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <script src="../../assets/js/swal.js"></script>
  <!-- End Google Map -->
  <link rel="stylesheet" href="../../assets/css/base.css">
  <link rel="stylesheet" href="../../assets/css/main.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700;800&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" sizes="16x16" href="../../assets/image/logo.png">
  <script src="../../assets/js/swal.js"></script>


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
  echo '<script> alert("'. $_SESSION['status']. '"); </script>';


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

  echo '<script> alert("'. $_SESSION['announce']. '"); </script>';

  unset($_SESSION['announce']);
}
if (isset($_SESSION['noti'])) {
  echo '<script>';
  echo 'setTimeout(function() {';
  echo 'swal({';
  echo '    title: "Success",';
  echo '    text: "' . $_SESSION['noti'] . '",';
  echo '    icon: "success",';
  echo '});';
  echo '}, 10000);';
  echo '</script>';
  unset($_SESSION['noti']);
}
// echo var_dump($_SESSION);
?>
</head>




