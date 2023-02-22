<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" >
    <!--lien bootstrap pour importer le menu  -->
    <title>Modifier Produits</title>
</head>
<body>
<?php
require_once 'include/database.php'; // importer la base de donnés database.php
include 'include/nav.php' ?> <!--importer le fichier  nav.php -->
<div class="container py-2">
    <h4>Modifier un produit</h4><!--Titre pour ajouter produits -->
    <?php
        
        require_once 'include/database.php';
        $id = $_GET['id'];
        $sqlState = $pdo->prepare('SELECT * from produits WHERE id=?');
        $sqlState->execute([$id]);
        $produit = $sqlState->fetch(PDO::FETCH_OBJ);
        //var_dump($produit);


if (isset($_POST['modifier'])) { // si l'utilisateur clique sur ajouter 
            $libelle = $_POST['libelle']; // on récupere le libelle
            $prix = $_POST['prix']; // on recupere le prix
            $discount = $_POST['discount']; // on récupere le discount
            $categorie = $_POST['categorie']; // on recupere la categorie
            //$description = $_POST['description']; // on récupere la description 
            //$date = date('Y-m-d'); // on récupere la date

       

            if (!empty($libelle) && !empty($prix) && !empty($categorie)) { // c'est une condition si les champs ne sont pas rempli 
                $sqlState = $pdo->prepare(' UPDATE produits 
                                            SET libelle=?,
                                            prix=?,
                                            discount=?,
                                            id_categorie=? 
                                            WHERE id=?'); // commande sql pour récupérer les valeurs saisie pour les mettre dans la base de données
                $updated = $sqlState->execute([$libelle, $prix, $discount, $categorie, $id]); // on récupere les champs libelle prix discount categorie date
                // var_dump($sqlState->errorInfo()); // pour voir ou se trouve l'erreur
                
                
                if ($updated) {
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
        
        <label  class="form-label"></label> <!--label libelle  -->
        <input type="hidden" class="form-control" name="libelle" value="<?= $produit->id?>">
        <!--hidden pour cacher l'id  -->

        <label class="form-label">Libelle</label> <!--label libelle  -->
        <input class="form-control" name="libelle" value="<?= $produit->libelle?>">

        <label class="form-label">Prix</label> <!--label prix -->
        <input type="number" class="form-control" step="0.1" name="prix" min="0" value="<?=  $produit->prix?>">

        <label class="form-label"> Discount</label> <!--label discount -->
        <input type="range" value="0" class="form-control" name="discount" min="0" max="90"value="<?= $produit->discount?>">

        
        <?php
            $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC); // on peut aussi utilisé prepare à la place de query pour des questions de sécurité
        //var_dump($produits->id_categorie);
        ?>
        <label class="form-label">Catégorie</label>
        
        <select name="categorie" class="form-control"> <!--select pour recupere la liste categorie-->
            <option value="">Choisissez une catégorie</option> <!--label choisissez une catgegorie-->
            <?php
            //var_dump($produit->categorie_id);
                foreach ($categories as $categorie){ // boucle foreach pour recuperer la liste categorie
                    $selected=$produit->id_categorie == $categorie['id']?' selected ':''; //si cette condition est correct alors affiche selected 
                    echo "<option $selected value='".$categorie['id']."'>".$categorie['libelle']."</option>"; // .le point pour concatener
                    
                }
                   
            
            ?>
        </select>
        <input type="submit" value="Modifier un produit" class="btn btn-primary my-2" name="modifier"> <!--bouton ajouter produit-->
    </form>
</div>

</body>
</html>