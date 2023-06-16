<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
        header("LOCATION:index.php");
    }
    require "../connexion.php";
    $limit=2;
    $reqcount=$bdd->query("SELECT * FROM contact");
    $count = $reqcount->rowCount();
    $nbpage= ceil($count/$limit);

    if(isset($_GET['delete']))
    {
        $verif = $bdd->prepare("SELECT * FROM contact WHERE id=?");
        $verif->execute([$_GET['delete']]);
        if(!$donVerif = $verif->fetch())
        {
            $verif->closeCursor();
            header("LOCATION:contact.php");
        }
        $verif->closeCursor();

        $delete = $bdd->prepare("DELETE FROM contact WHERE id=?");
        $delete->execute([$_GET['delete']]);
        $delete->closeCursor();
        header("LOCATION:contact.php?delsuccess=".$_GET['delete']);
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
    <title>Administration des contacts</title>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color: rgb(36, 35, 35)">
    <?php 
        include("partials/header.php");
    ?>
    <div class="container link-light">
        <h1 class="titre pt-5 text-center">Contact</h1>
        <?php 
            if(isset($_GET['delsuccess']))
            {
                echo "<div class='alert alert-danger'>Vous avez supprimer le message n°".$_GET['delsuccess']."</div>";
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
                        echo '<a  href="contact.php?page='.($pg-1).'" class="page-link">Previous</a>';
                    echo '</li>';
                }else{
                    echo '<li class="page-item disabled">';
                        echo '<a  href="contact.php?page='.($pg-1).'" class="page-link">Previous</a>';
                    echo '</li>';
                }
                for($cpt=1; $cpt<=$nbpage; $cpt++)
                {
                    if($cpt == $pg)
                    {
                        echo '<li class="page-item "><a class="page-link active" href="contact.php?page='.$cpt.'">'.$cpt.'</a></li>';
                    }else{
                        echo '<li class="page-item"><a class="page-link" href="contact.php?page='.$cpt.'">'.$cpt.'</a></li>';
                    }
                }
                if($pg!=$nbpage && $pg<$nbpage)
                {
                    echo '<li class="page-item">';
                        echo '<a  href="contact.php?page='.($pg+1).'" class="page-link">Next</a>';
                    echo '</li>';
                }else{
                    echo '<li class="page-item disabled">';
                        echo '<a  href="contact.php?page='.($pg+1).'" class="page-link">Next</a>';
                    echo '</li>';
                }
            echo '</ul>';
        }

/*** FIN PAGINATION ***/


        ?>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th class='text-center'>Id</th>
                    <th class='text-center'>Nom</th>
                    <th class='text-center'>E-mail</th>
                    <th class='text-center'>Date</th>
                    <th class='text-center'>Action</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    $req = $bdd->prepare("SELECT id, nom, email, DATE_FORMAT(date, '%d/%m/%Y %Hh%i') as mydate FROM contact ORDER BY date DESC LIMIT :offset, :mylimit");
                    $req->bindParam(':offset',$offset, PDO::PARAM_INT);
                    $req->bindParam(":mylimit", $limit, PDO::PARAM_INT);
                    $req->execute();
                    while($don = $req->fetch())
                    {
                        echo "<tr>";
                            echo "<td class='text-center'>".$don['id']."</td>";
                            echo "<td class='text-center'>".$don['nom']."</td>";
                            echo "<td class='text-center'>".$don['email']."</td>";
                            echo "<td class='text-center'>".$don['mydate']."</td>";
                            echo "<td class='text-center'>";
                                echo "<a href='message.php?id=".$don['id']."' class='btn btn-primary mx-2'>Afficher</a>";
                                echo "<a href='contact.php?delete=".$don['id']."' class='btn btn-danger mx-2'>Supprimer</a>";
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