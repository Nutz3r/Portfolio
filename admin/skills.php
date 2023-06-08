<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }
    require "../connexion.php";

    if(isset($_GET['delete']))
    {
        $verif = $bdd->prepare("SELECT * FROM skills WHERE id=?");
        $verif->execute([$_GET['delete']]);
        if(!$donVerif = $verif->fetch())
        {
            $verif->closeCursor();
            header("LOCATION:skills.php");
        }
        $verif->closeCursor();

        unlink('../images/skills/'.$donVerif['fichier']);

        $delete = $bdd->prepare("DELETE FROM skills WHERE id=?");
                    $delete->execute([$_GET['delete']]);
                    $delete->closeCursor();
                    header("LOCATION:skills.php?delsuccess=".$_GET['delete']);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Administration des Skills</title>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: rgb(36, 35, 35)">
    <?php 
        include("partials/header.php");
    ?>
    <div class="container link-light">
        <h1 class="titre pt-5 text-center">Skills</h1>
        <div>
            <a href="dashboard.php" class="btn btn-secondary">Retour</a>
        </div>
        <div class="pt-5 text-center ">
        <a href="addskill.php" class="btn btn-primary ">Ajouter</a>
         </div>
        <?php 
            if(isset($_GET['delsuccess']))
            {
                echo "<div class='alert alert-danger my-3'>Vous avez supprimé le skills n°".$_GET['delsuccess']."</div>";
            }
            if(isset($_GET['add']))
            {
                echo "<div class='alert alert-success my-3'>Vous avez bien ajouté un skills</div>";
            }
            if(isset($_GET['update']))
            {
                echo "<div class='alert alert-warning my-3'>Vous avez bien modifié le skills n°".$_GET['update']."</div>";
            }

        ?>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class='text-center'>Id</th>
                    <th class='text-center'>Nom</th>
                    <th class='text-center'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $req = $bdd->query("SELECT * FROM skills ORDER BY id ASC");
                    while($don = $req->fetch())
                    {
                        echo "<tr>";
                            echo "<td class='text-center'>".$don['id']."</td>";
                            echo "<td class='text-center'>".$don['nom']."</td>";
                            echo "<td class='text-center'>";
                            if($don['id']!=0)
                            {
                                echo "<a href='updateskill.php?id=".$don['id']."' class='btn btn-warning mx-2'>Modifier</a>";
                                echo "<a href='skills.php?delete=".$don['id']."' class='btn btn-danger mx-2'>Supprimer</a>";
                            }
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