<?php
    require "connexion.php";
    if(isset($_GET['id']))
    {
        $id = htmlspecialchars($_GET['id']);
    }else{
        header("LOCATION:index.php");
    }

    $req = $bdd->prepare("SELECT * FROM portfolio WHERE id=?");
    $req->execute([$id]);
    if(!$don = $req->fetch())
    {
        $req->closeCursor();
        header("LOCATION:index.php");
    }
    $req->closeCursor();    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1 class="nom"><?= $don['nom'] ?></h1>
    <div class="description"><?= nl2br($don['description']) ?></div>
    <div class="image">
        <img src="images/<?= $don['galerie'] ?>" alt="image de <?= $don['nom'] ?>">
    </div>
</body>
</html>