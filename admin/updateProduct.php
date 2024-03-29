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
    $req = $bdd->prepare("SELECT * FROM galerie WHERE id=?");
    $req->execute([$id]);
    if(!$don = $req->fetch())
    {
        $req->closeCursor();
        header("LOCATION:products.php");
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
        <h2>Modifier un travail</h2>
        <form action="treatmentUpdateProduct.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group my-3">
                <label for="nom">Titre: </label>
                <input type="text" id="nom" name="nom" value="<?= $don['nom'] ?>" class="form-control">
            </div>
            <div class="form-group my-3">
                <label for="categorie">Categorie: </label>
                <select name="categorie" id="categorie" class="form-control">
                    <?php 
                        $cat = $bdd->query("SELECT * FROM categories");
                        while($donCat = $cat->fetch())
                        {
                            if($donCat['id'] == $don['id_categorie'])
                            {
                                echo "<option value='".$donCat['id']."' selected>".$donCat['nom']."</option>";
                            }else{
                                echo "<option value='".$donCat['id']."'>".$donCat['nom']."</option>";
                            }
                        }
                        $cat->closeCursor();
                    ?>
                </select>
            </div>
            <div class="form-group my-3">
                <label for="description">Description: </label>
                <textarea name="description" id="description" class="form-control"><?= $don['description'] ?></textarea>
            </div>
            <div class="form-group-my-3">
                <div class="row">
                    <div class="col-4">
                        <img src="../images/portfolio/<?= $don['image'] ?>" alt="image du produit <?= $don['nom'] ?>" class="img-fluid">
                    </div>
                </div>
                <label for="image">Modifier l'image</label>
                <input type="file"  id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
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