<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }

    // déconnexion 
    if(isset($_GET['deco']))
    {
        session_destroy();
        header("LOCATION:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="adminstyle.css">
    <title>Administration - Portfolio</title>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php 
        include("partials/header.php");
    ?>
    <div class="slide">
        <div class="menu">

            <a class="cards" href="products.php">Travaux</a>
            <a class="cards" href="categories.php">Catégories</a>
            <a class="cards" href="skills.php">Compétences</a>
            
        </div>
    
    </div>





</body>
</html>