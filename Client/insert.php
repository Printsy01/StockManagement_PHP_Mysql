<?php 
require 'serveur.php';    
session_start();

// insertion recette
    if(isset($_POST["recet"])) {
        extract($_POST);
    $data = $pdo->prepare("INSERT INTO recettes(recette_nom) VALUES (?)");
    $data->execute(array($recet));
    $ide = $pdo->lastInsertId();

    $_SESSION['ide'] = $ide;
    $_SESSION['recett'] = $recet;
    header("Location : recettes.php");
    }
?>