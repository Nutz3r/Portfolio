<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }
    require '../connexion.php';
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
    <div class="container">
        <h1>Administration</h1>
        <div>
            <a href="products.php" class="btn btn-secondary">Retour</a>
        </div>
        <h2>Ajouter un travail</h2>
        <form action="treatmentAddProduct.php" method="POST" enctype="multipart/form-data">
            <div class="form-group my-3">
                <label for="nom">Titre: </label>
                <input type="text" id="nom" name="nom" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="categorie">Categorie: </label>
                <select name="categorie" id="categorie" class="form-control">
                    <?php 
                        $cat = $bdd->query("SELECT * FROM categories");
                        while($donCat = $cat->fetch())
                        {
                            echo "<option value='".$donCat['id']."'>".$donCat['nom']."</option>";
                        }
                        $cat->closeCursor();
                    ?>
                </select>
            </div>
            




            <label class="checkbox">Afficher sur la Front Page?
                <input type="checkbox" name="ma_checkbox" value="1">
                <span class="checkmark"></span>
            </label> <!-- FAIRE LA UPDATE PRODUCT AVEC checked="checked"-->
            
                        
            <div class="form-group my-3">
                <label for="description">Description: </label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group my-3">
                <label for="image">Image: </label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group my-3">
                <input type="submit" value="Ajouter" class="btn btn-success">
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