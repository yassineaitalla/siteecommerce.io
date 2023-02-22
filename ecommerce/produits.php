<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" >
    <!--lien bootstrap pour importer le menu  -->

    <title>Liste des produits</title> <!--titre  --> 
</head>
<body> 
<?php 
include "include/nav.php" /* importer le fichier nav.php*/?> 
     
     
<div class="container"> <!--Pour décaler un peu a droite les labels et les champs de saisie-->
     <h2>Liste des produits</h2> 
     <a href="ajouter_produits.php" class="btn btn-primary">Ajouter un produit</a>   
     <table class="table table-striped-columns">  <!--dans un tableau on trouve tout le temps des tr-->
        <thead>
            <tr>
                <th>#ID</th> <!-- Th pour que le titre soit en gras-->
                <th>LIBELLE</th> <!-- Th pour que le titre soit en gras-->
                <th>PRIX</th> <!-- Th pour que le titre soit en gras-->
                <th>DISCOUNT</th> <!-- Th pour que le titre soit en gras-->
                <th>CATEGORIE</th>
                <th>DATE DE CREATION</th>
                <th>OPERATIONS</th>
                
                
            </tr>
        </thead>
        <tbody> <!-- tbody sert a afficher les ligne de la categories-->
        <?php 
        require_once "include/database.php";
        $categories = $pdo->query("SELECT produits.*,categorie.libelle as 'categorie_libelle' FROM produits INNER JOIN categorie ON produits.id_categorie = categorie.id")->fetchAll(PDO::FETCH_OBJ); //assoc pou travailler en mode tableau Renvoi les données // vu que on a pas de valeurs a récuperer chez l'utilisateur on va utilisé query
        // .* pour recuperer tout ce quil ya dans produits
        //var_dump($categories);
        
        foreach($categories as $produits){   // pour afficher un tableau en php on utilise la boucle foreach
            $prix = $produits->prix;
            $discount = $produits->discount;
            $prixFinale = $prix - (($prix*$discount)/100);
            //var_dump($categorie);
        
        
        
        ?> <!--on utlise les balises php pour eviter de mettre la concatenation et en plus ça nous facilite la tache -->
        <tr>
            <td><?= $produits->id?></td> <!-- echo de la table categorie pour afficher la colonne id -->
            <td><?= $produits->libelle?></td> <!-- echo de la table categorie pour afficher la colonne libelle -->
            <td><?= $prix?>€</td> <!-- echo de la table categorie pour afficher la colonne description-->
            <td><?= $discount?>%</td>
            <td><?= $produits->categorie_libelle?></td>
            <td><?= $produits->date_creation?></td> <!-- echo de la table categorie pour afficher la colonne date -->
            
            <td>
               <a class="btn btn-primary"href="modifier_produits.php?id=<?php echo $produits->id ?>" >Modifier</a>
               <a class="btn btn-danger" href="supprimer_produits.php?id=<?php echo $produits->id ?>" onclick="return confirm('Voulez vous vraiment supprimer le produit <?php echo $produits->libelle ?>');" class="btn btn-danger">Supprimer</a>
               <!-- affixhe un message box en cas d'erreur-->
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