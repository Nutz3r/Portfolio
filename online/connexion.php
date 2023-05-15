<?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=leze0090_antoine;charset=utf8','leze0090_admin','antoinezelie',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur: '.$e->getMessage());
    }
?>