<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" >
    <!--lien bootstrap pour importer le menu  -->
    <title>Ajouter produit</title>
</head>
<body>
<?php
require_once 'include/database.php'; // importer la base de donnés database.php
include 'include/nav.php' ?> <!--importer le fichier  nav.php -->
<div class="container py-2">
    <h4>Ajouter produit</h4><!--Titre pour ajouter produits -->
    <?php
    if (isset($_POST['ajouter'])) { // si l'utilisateur clique sur ajouter 
        $libelle = $_POST['libelle']; // on récupere le libelle
        $prix = $_POST['prix']; // on recupere le prix
        $discount = $_POST['discount']; // on récupere le discount
        $categorie = $_POST['categorie']; // on recupere la categorie
        $description = $_POST['description']; // on récupere la description 
        $date = date('Y-m-d'); // on récupere la date

       

        if (!empty($libelle) && !empty($prix) && !empty($categorie)) { // c'est une condition si les champs ne sont pas rempli 
            $sqlState = $pdo->prepare('INSERT INTO produits VALUES (null,?,?,?,?,?)'); // commande sql pour récupérer les valeurs saisie pour les mettre dans la base de données
            $inserted = $sqlState->execute([$libelle, $prix, $discount, $categorie, $date]); // on récupere les champs libelle prix discount categorie date
            if ($inserted) {
                header('location: produits.php'); // envoi vers la page produits.php 
            } else {

                ?>
                <div class="alert alert-danger" role="alert"> <!-- affiche une alerte en cas derreur -->
                    Database error (40023).
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert"> <!-- affiche une alerte d'erreur si les champs ne sont pas rempli -->
                Libelle , prix , catégorie sont obligatoires.
            </div>
            <?php
        }

    }
    ?>
    <form method="post" enctype="multipart/form-data"> <!--pour des raison de sécurité on va utiliser la methode post a la place de get  -->
        <label class="form-label">Libelle</label> <!--label libelle  -->
        <input type="text" class="form-control" name="libelle">

        <label class="form-label">Prix</label> <!--label prix -->
        <input type="number" class="form-control" step="0.1" name="prix" min="0">

        <label class="form-label">Discount</label> <!--label discount -->
        <input type="range" value="0" class="form-control" name="discount" min="0" max="90">

     

        <?php
        $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC); // on peut aussi utilisé prepare à la place de query pour des questions de sécurité
        ?>
        <label class="form-label">Catégorie</label>
        
        <select name="categorie" class="form-control"> <!--select pour recupere la liste categorie-->
            <option value="">Choisissez une catégorie</option> <!--label choisissez une catgegorie-->
            <?php
            
            
            foreach ($categories as $categorie) { // boucle foreach pour recuperer la liste categorie
                echo "<option value='" . $categorie['id'] . "'>" . $categorie['libelle'] . "</option>"; // .le point pour concatener
            }
            ?>
        </select>


        <input type="submit" value="Ajouter produit" class="btn btn-primary my-2" name="ajouter"> <!--bouton ajouter produit-->
    </form>
</div>

</body>
</html>