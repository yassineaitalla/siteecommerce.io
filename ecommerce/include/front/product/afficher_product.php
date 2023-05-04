<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<?php
// Boucle foreach pour parcourir les produits
foreach ($produits as $produit) {
    // Stockage de l'ID du produit dans une variable
    $idProduit = $produit->id;
    ?>
    <!-- Affichage d'une carte Bootstrap pour chaque produit -->
    <div class="col-md-6 mb-4">
        <div class="card h-100">

            <?php
            // Vérification si le produit a une remise
            if (!empty($produit->discount)):
                // Affichage d'un badge avec la remise
            ?>
                <span class="badge rounded-pill text-bg-warning w-25 position-absolute m-2" style="right:0"> - <?= $produit->discount ?> <i class="fa fa-percent"></i></span>
            <?php endif; ?>

            <!-- Affichage de l'image du produit -->
            <img class="card-img-top w-75  mx-auto" src="../upload/produit/<?= $produit->image?>" alt="Card image cap">
            <div class="card-body">
                <!-- Lien vers la page du produit -->
                <a href="produit.php?id=<?php echo $idProduit ?>" class="btn stretched-link"></a>
                <!-- Affichage du libellé du produit -->
                <h5 class="card-title"><?= $produit->libelle ?></h5>
                <!-- Affichage de la description du produit -->
                <p class="card-text"><?= $produit->description ?></p>
                <!-- Affichage de la date de création du produit -->
                <p class="card-text"><small class="text-muted">Ajouté le : <?= date_format(date_create($produit->date_creation), 'Y/m/d') ?></small></p>
            </div>
            <div class="card-footer bg-white" style="z-index: 10">
                <?php
                // Vérification si le produit a une remise
                if (!empty($produit->discount)):
                    // Affichage du prix barré avec la remise
                ?>
                    <div class="h5"><span class="badge rounded-pill text-bg-danger"><strike> <?= $produit->prix ?></strike> <i class="fa fa-euro-sign"></i></span></div>
                    <div class="h5"><span class="badge rounded-pill text-bg-success">Solde: <?= calculerRemise($produit->prix, $produit->discount) ?> <i class="fa fa-euro-sign"></i></span></div>
                <?php else: ?>
                    <!-- Affichage du prix normal si le produit n'a pas de remise -->
                    <div class="h5"><span class="badge rounded-pill text-bg-success"><?= $produit->prix ?> <i class="fa fa-euro-sign"></i></span></div>

                <?php endif; ?>

                <!-- Inclusion d'un compteur de vues pour le produit -->
                <?php include '../include/front/counter.php' ?>
            </div>
        </div>
    </div>
    <?php
    }
    // Affichage d'un message si aucun produit n'est disponible
    if (empty($produits)) {
        ?>
        <div class="alert alert-info" role="alert">
            Pas de produits pour l'instant
        </div>

        <?php
    }
    ?>