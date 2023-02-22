<?php

    //var_dump($_GET); //test pour voir si les donnes on bien etait reçu 
    require_once "include/database.php"; // importer la base de données
    $id = $_GET["id"]; // onva prendre linformation sur lurl ducoup on utiliser la methode get
    $sqlState= $pdo->prepare("DELETE FROM produits where id=?"); // supprimer la ligne dans la base de donnes
    $supprime = $sqlState->execute([$id]);
    header ("location: produits.php"); // va vers la page categories.php
    
    if($supprime){ // si il se supprime alors va vers la page categories.php
    header ("location: produits.php"); // va vers la page categories.php
    }else{
        echo "Database error"; // retourne une erreur si la ligne ne se supprime pas 
    }
    
    //echo $id;
?>