<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" >
    <!--lien bootstrap pour importer le menu  --> 

    <title>Document</title> <!--titre  --> 
</head>
<body> 
<?php include '../include/nav_front.php'?>
<div class="container"> <!--Pour décaler un peu a droite les labels et les champs de saisie-->
    <h4>Liste des catégories</h4>      
    <?php 
        require_once "../include/database.php"; // les deux points / nous permet de sortir de notre fichier 
        $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_OBJ); // fetchAll pour recuperer toute les liste des categories
        //var_dump($categories); // test pour afficher la liste des categories
    ?>
    <ul class="list-group list-group-flush">
        <?php
            foreach($categories as $categorie){ //
                ?>     
                <li class="list-group-item">
                    <a class="btn btn-light" href="categorie.php?id=<?php echo $categorie->id ?>">
                        <?php echo $categorie->libelle ?>
                    </a>
                
                </li> <!-- afficher la liste des categoies-->
                <?php
            }
        
        ?>
    
    </ul>
</div>
</body>
</html>