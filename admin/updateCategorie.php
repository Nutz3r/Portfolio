<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }
     //vérifier la prés de id
     if(isset($_GET['id']))
     {
         $id = htmlspecialchars($_GET['id']);
     }else{
         header("LOCATION:products.php");
     }
 
     // vérifier si l'id est dans la bdd
     require "../connexion.php";
     $req = $bdd->prepare("SELECT * FROM categories WHERE id=?");
     $req->execute([$id]);
     if(!$don = $req->fetch())
     {
         $req->closeCursor();
         header("LOCATION:categories.php");
     }
     $req->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Administration des Categorie</title>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        include("partials/header.php");
    ?>
    <div class="container">
        <h1>Administration</h1>
        <div>
            <a href="categories.php" class="btn btn-secondary">Retour</a>
        </div>
        <h2>Modifier <?= $don['nom'] ?></h2>
        <form action="treatmentUpdateCategorie.php?id=<?= $id ?>" method="POST">
            <div class="form-group my-3">
                <label for="nom">Nom: </label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?= $don['nom'] ?>">
            </div>
            <div class="form-group my-3">
                <input type="submit" value="Modifier" class="btn btn-warning">
            </div>
        </form>
        <?php
            if(isset($_GET['error']))
            {
                echo "<div class='alert alert-danger my-2'>Une erreur est survenue (code: ".$_GET['error'].")</div>";
            }
        ?>
    </div>
</body>
</html>