


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" >
    <!--lien bootstrap pour importer le menu  -->

    <title>Liste des catégories</title> <!--titre  --> 
</head>
<body> 
<?php 
include "include/nav.php" /* importer le fichier nav.php*/?> 
     
     
<div class="container"> <!--Pour décaler un peu a droite les labels et les champs de saisie-->
     <h2>Liste des catégories</h2> 
     <a href="ajouter_categorie.php" class="btn btn-primary">Ajouter categorie</a>   
     <table class="table table-striped-columns">  <!--dans un tableau on trouve tout le temps des tr-->
        <thead>
            <tr>
                <th>#ID</th> <!-- Th pour que le titre soit en gras-->
                <th>#LIBELLE</th> <!-- Th pour que le titre soit en gras-->
                <th>#DESCRIPTION</th> <!-- Th pour que le titre soit en gras-->
                <th>#DATE</th> <!-- Th pour que le titre soit en gras-->
                <th>Operations</th>
            </tr>
        </thead>
        <tbody> <!-- tbody sert a afficher les ligne de la categories-->
        <?php 
        require_once "include/database.php";
        $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC); // Renvoi les données // vu que on a pas de valeurs a récuperer chez l'utilisateur on va utilisé query
        //var_dump($categories);
        
        foreach($categories as $categorie){   // pour afficher un tableau en php on utilise la boucle foreach
        ?> <!--on utlise les balises php pour eviter de mettre la concatenation et en plus ça nous facilite la tache -->
        <tr>
            <td><?php echo $categorie["id"]?></td> <!-- echo de la table categorie pour afficher la colonne id -->
            <td><?php echo $categorie["libelle"]?></td> <!-- echo de la table categorie pour afficher la colonne libelle -->
            <td><?php echo $categorie["description"]?></td> <!-- echo de la table categorie pour afficher la colonne description-->
            <td><?php echo $categorie["date_creation"]?></td> <!-- echo de la table categorie pour afficher la colonne date -->
            <td>
                <a href="modifier_categorie.php?id=<?php echo $categorie["id"] ?>"  class="btn btn-primary "> Modifier  </a> <!--btn sm pour que le bouton soit un peu petit -->
                <a href="supprimer_categorie.php?id=<?php echo $categorie['id'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la catégorie <?php echo $categorie['libelle'] ?>');" class="btn btn-danger">Supprimer</a>
                <!-- la partie javascript est un message box c'est aussi un systeme pour la sécurité -->
                <!-- $categorie["id"] pour recuperer l'ID   -->
            </td>
        </tr>
        <?php 
        }
    ?>

        </tbody>
    </table>
</div>
     



</body>
</html>