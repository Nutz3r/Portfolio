<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }
    require "../connexion.php";
    $limit=10;
    $reqcount=$bdd->query("SELECT * FROM categories");
    $count = $reqcount->rowCount();
    $nbpage= ceil($count/$limit);

    if(isset($_GET['delete']))
    {
        $verif = $bdd->prepare("SELECT * FROM categories WHERE id=?");
        $verif->execute([$_GET['delete']]);
        if(!$donVerif = $verif->fetch())
        {
            $verif->closeCursor();
            header("LOCATION:categories.php");
        }
        $verif->closeCursor();

        $update = $bdd->prepare("UPDATE galerie SET id_categorie=0 WHERE id_categorie=?");
        $update->execute([$_GET['delete']]);
        $update->closeCursor();

        $delete = $bdd->prepare("DELETE FROM categories WHERE id=?");
        $delete->execute([$_GET['delete']]);
        $delete->closeCursor();
        header("LOCATION:categories.php?delsuccess=".$_GET['delete']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Administration des categories</title>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php 
        include("partials/header.php");
    ?>
    <div class="container">
        <h1>Catégories</h1>
        <a href="addCategorie.php" class="btn btn-primary my-3">Ajouter une catégorie</a>
        <?php 
            if(isset($_GET['delsuccess']))
            {
                echo "<div class='alert alert-danger my-3'>Vous avez supprimé la catégorie n°".$_GET['delsuccess']."</div>";
            }
            if(isset($_GET['add']))
            {
                echo "<div class='alert alert-success my-3'>Vous avez bien ajouté une catégorie</div>";
            }
            if(isset($_GET['update']))
            {
                echo "<div class='alert alert-warning my-3'>Vous avez bien modifié la catégorie n°".$_GET['update']."</div>";
            }
    
    
    /*** PAGINATION ***/
            if(isset($_GET['page']))
            {
                $pg = $_GET['page'];
            }else{
                $pg = 1;
            }
            $offset=($pg-1)*$limit; 

            if($count > $limit)
            {
                echo '<ul class="pagination">';
                    if($pg>1)
                    {
                        echo '<li class="page-item">';
                            echo '<a  href="categories.php?page='.($pg-1).'" class="page-link">Previous</a>';
                        echo '</li>';
                    }else{
                        echo '<li class="page-item disabled">';
                            echo '<a  href="categories.php?page='.($pg-1).'" class="page-link">Previous</a>';
                        echo '</li>';
                    }
                    for($cpt=1; $cpt<=$nbpage; $cpt++)
                    {
                        if($cpt == $pg)
                        {
                            echo '<li class="page-item "><a class="page-link active" href="categories.php?page='.$cpt.'">'.$cpt.'</a></li>';
                        }else{
                            echo '<li class="page-item"><a class="page-link" href="categories.php?page='.$cpt.'">'.$cpt.'</a></li>';
                        }
                    }
                    if($pg!=$nbpage && $pg<$nbpage)
                    {
                        echo '<li class="page-item">';
                            echo '<a  href="categories.php?page='.($pg+1).'" class="page-link">Next</a>';
                        echo '</li>';
                    }else{
                        echo '<li class="page-item disabled">';
                            echo '<a  href="categories.php?page='.($pg+1).'" class="page-link">Next</a>';
                        echo '</li>';
                    }
                echo '</ul>';
            }
/*** FIN PAGINATION ***/
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class='text-center'>Nom</th>
                    <th class='text-center'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $req = $bdd->prepare("SELECT * FROM categories LIMIT :offset, :mylimit");
                    $req->bindParam(':offset',$offset, PDO::PARAM_INT);
                    $req->bindParam(":mylimit", $limit, PDO::PARAM_INT);
                    $req->execute();                    while($don = $req->fetch())
                    {
                        echo "<tr>";
                            echo "<td class='text-center'>".$don['nom']."</td>";
                            echo "<td class='text-center'>";
                            if($don['id']!=0)
                            {
                                echo "<a href='updateCategorie.php?id=".$don['id']."' class='btn btn-warning mx-2'>Modifier</a>";
                                echo "<a href='categories.php?delete=".$don['id']."' class='btn btn-danger mx-2'>Supprimer</a>";
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