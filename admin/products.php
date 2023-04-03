<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }

    require "../connexion.php";

    if(isset($_GET['delete']))
    {
        $id = htmlspecialchars($_GET['delete']);
        $verif = $bdd->prepare("SELECT * FROM galerie WHERE id=?");
        $verif->execute([$id]);
        if(!$donVerif = $verif->fetch() )
        {
            $verif->closeCursor();
            header("LOCATION:products.php");
        }
        $verif->closeCursor();
        
        // supprimer l'image du produit
        unlink("../images/portfolio/".$donVerif['image']);
        unlink("../images/portfolio/mini_".$donVerif['image']);


        // supprimer le produit
        $delete = $bdd->prepare("DELETE FROM galerie WHERE id=?");
        $delete->execute([$id]);
        $delete->closeCursor();
        header("LOCATION:products.php?successDelete=".$id);

    }
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
            <a href="dashboard.php" class="btn btn-secondary">Retour</a>
        </div>
        <div>
            <a href="addProduct.php" class="btn btn-primary my-3">Ajouter un travail</a>
        </div>
        <?php
            if(isset($_GET['successDelete']))
            {
                echo "<div class='alert alert-danger'>Vous avez bien supprimé le produit n°".$_GET['successDelete']."</div>";
            }
            if(isset($_GET['addsuccess']))
            {
               echo "<div class='alert alert-success'>Vous avez bien ajouté un nouveau produit</div>"; 
            }
            if(isset($_GET['updatesuccess']))
            {
                echo "<div class='alert alert-warning'>Vous avez bien modifié le produit n°".$_GET['updatesuccess']."</div>";
            }
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Categorie</th>

                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $req = $bdd->prepare("SELECT galerie.id as gid, galerie.nom as gnom, categories.nom as cnom FROM galerie INNER JOIN categories ON galerie.id_categorie = categories.id LIMIT :offset, :mylimit");
                    $req->bindParam(':offset',$offset, PDO::PARAM_INT);
                    $req->bindParam(':mylimit',$limit, PDO::PARAM_INT);
                    $req->execute();
                    while($don = $req->fetch())
                    {
                        echo "<tr>";
                            echo "<td>".$don['gid']."</td>";
                            echo "<td>".$don['gnom']."</td>";
                            echo "<td>".$don['cnom']."</td>";
                            echo "<td class='text-center'>";
                                echo "<a href='updateProduct.php?id=".$don['gid']."' class='btn btn-warning m-2'>Modifier</a>";
                                echo "<a href='products.php?delete=".$don['gid']."' class='btn btn-danger m-2'>Supprimer</a>";
                            echo "</td>";
                        echo "</tr>";
                    }
                    $req->closeCursor();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>