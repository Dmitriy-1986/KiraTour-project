<?php
require('./db.php');
$kiatour = "SELECT `company` FROM `company_name` ORDER BY id LIMIT 1"; // Выводит только один результат  
$company_name = mysqli_query($conn, $kiatour);
$kiatour_company = mysqli_fetch_all($company_name, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) https://analytics.google.com/ -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YQG3X2BQJT"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-YQG3X2BQJT');
    </script>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Open Graph data-->
    <meta property="og:title" content="    
    <?php 
        foreach ($kiatour_company as $row) {
            echo $row["company"];
        }
    ?>">
    <meta property="og:description" content="Украина - Германия, перевозки пассажиров и посылок | Контакты: ☎ 0380965697772 ☎ 0380995697772 "/ >
    <meta property="og:type" content="website">
    <meta property="og:url" content="
    <?php
        echo $_SERVER['SERVER_NAME'];
    ?>">
    <meta property="og:image" content="assets/img/KIATOUR.jpg">
    <!--End Open Graph data-->
    
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/libs/bootstrap-5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    
    <!--favicon.ico-->
    <link rel="shortcut icon" href="assets/img/power.png" />
    <!--//favicon.ico-->
    
    <title>
    <?php 
        foreach ($kiatour_company as $row) {
            echo $row["company"];
        }
    ?> 
    </title>
    
</head>