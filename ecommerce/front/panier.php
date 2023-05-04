<?php

session_start();


// Inclure le fichier contenant les informations de la base de données
require_once '../include/database.php';
?>
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head_front.php' ?>
    <title>Panier</title>
</head>
<body style="background-color:cadetblue">
    <?php include '../include/nav_front.php' ?>
    <div class="container py-2">
        <?php
        // Si l'utilisateur clique sur le bouton pour vider le panier, supprimer tous les éléments du panier
        // pour cet utilisateur et rediriger vers la page du panier
        if (isset($_POST['vider'])) {
            $_SESSION['panier'][$idUtilisateur] = [];
            header('location: panier.php');
        }

        // Récupérer l'ID de l'utilisateur s'il est connecté
        $idUtilisateur = $_SESSION['utilisateur']['id'] ?? 0;

        // Récupérer les produits dans le panier pour cet utilisateur
        $panier = $_SESSION['panier'][$idUtilisateur] ?? [];

        // Si le panier n'est pas vide, récupérer les informations sur les produits depuis la base de données
        if (!empty($panier)) {
            $idProduits = array_keys($panier);
            $idProduits = implode(',', $idProduits);
            $produits = $pdo->query("SELECT * FROM produit WHERE id IN ($idProduits)")->fetchAll(PDO::FETCH_ASSOC);
        }

        // Si l'utilisateur a validé la commande, enregistrer les informations de la commande dans la base de données
        if (isset($_POST['valider'])) {
            // Préparer la requête SQL pour insérer des données dans la table "ligne_commande"
            $sql = 'INSERT INTO ligne_commande(id_produit,id_commande,prix,quantite,total) VALUES';

            // Initialiser le montant total de la commande à 0 et créer un tableau pour stocker le prix de chaque produit
            $total = 0;
            $prixProduits = [];

            // Pour chaque produit dans le panier, calculer le prix total, mettre à jour le montant total de la commande
            // et ajouter les informations du produit (ID, prix, quantité, total) dans le tableau de prix des produits
            foreach ($produits as $produit) {
                $idProduit = $produit['id'];
                $qty = $panier[$idProduit];
                $discount = $produit['discount'];
                $prix = calculerRemise($produit['prix'], $discount);

                $total += $qty * $prix;
                $prixProduits[$idProduit] = [
                    'id' => $idProduit,
                    'prix' => $prix,
                    'total' => $qty * $prix,
                    'qty' => $qty
                ];
            }

            // Insérer les informations de la commande dans la table "commande"
            // et récupérer l'ID de la commande qui vient d'être créée
            $sqlStateCommande = $pdo->prepare('INSERT INTO commande(id_client,total) VALUES(?,?)');
            $sqlStateCommande->execute([$idUtilisateur, $total]);
            $idCommande = $pdo->lastInsertId();



        $args = [];
        foreach ($prixProduits as $produit) {
            $id = $produit['id'];
            $sql .= "(:id$id,'$idCommande',:prix$id,:qty$id,:total$id),";
        }
        $sql = substr($sql, 0, -1);
        $sqlState = $pdo->prepare($sql);
        foreach ($prixProduits as $produit) {
            $id = $produit['id'];
            $sqlState->bindParam(':id' . $id, $produit['id']);
            $sqlState->bindParam(':prix' . $id, $produit['prix']);
            $sqlState->bindParam(':qty' . $id, $produit['qty']);
            $sqlState->bindParam(':total' . $id, $produit['total']);
        }
        $inserted = $sqlState->execute();
        if ($inserted) {

            $_SESSION['panier'][$idUtilisateur] = [];
            header('location: panier.php?success=true&total=' . $total);
        } else {
            ?>
            <div class="alert alert-error" role="alert">
                Erreur (contactez l'administrateur).
            </div>
            <?php
        }
    }
    if (isset($_GET['success'])) {
        ?>
        <h1>Merci ! </h1>
        <div class="alert alert-success" role="alert">
            Votre commande avec le montant <strong>(<?php echo $_GET['total'] ?? 0 ?>)</strong> <i class="fa fa-euro-sign"></i> est bien ajoutée.
        </div>
        <hr>
        <?php
    }
    if (!isset($_GET['success'])) {

        ?>
        <h4 style="color:azure;">Panier (<?php echo $productCount; ?>)</h4>
        <?php
    }
    ?>
    <div class="container">
        <div class="row">
            <?php
            if (empty($panier)) {
                if (!isset($_GET['success'])) {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Votre panier est vide !
                        Commençez vos achats <a class="btn btn-success btn-sm" href="pageproduit.php">Acheter des
                            produits</a>
                    </div>
                    <?php
                }
            } else {

                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" style="color: white">#</th>
                        <th scope="col" style="color: white">Image</th>
                        <th scope="col" style="color: white">Libelle</th>
                        <th scope="col" style="color: white">Quantité</th>
                        <th scope="col" style="color: white">Prix</th>
                        <th scope="col" style="color: white">Remise</th>
                        <th scope="col" style="color: white"><i class="fa fa-percent"></i> prix remise</th>
                        <th scope="col" style="color: white">Total</th>
                    </tr>
                    </thead>
                    <?php
                    $total = 0;
                    foreach ($produits as $produit) {
                        $idProduit = $produit['id'];
                        $totalProduit = calculerRemise($produit['prix'], $produit['discount']) * $panier[$idProduit];
                        $total += $totalProduit;
                        ?>
                        <tr>
                            <td><?php echo $produit['id'] ?></td>
                            <td><img width="80px" src="../upload/produit/<?php echo $produit['image'] ?>" alt=""></td>
                            <td style="color: white"><?php echo $produit['libelle'] ?></td>
                            <td><?php include '../include/front/counter.php' ?></td>
                            <td style="color: white"><strike><?php echo $produit['prix'] ?> <i class="fa fa-euro-sign"></i></strike></td>
                            <td style="color: white"> - <?= $produit['discount'] ?> %</td>
                            <td style="color: white"><?php echo calculerRemise($produit['prix'], $produit['discount']) ?> <i class="fa fa-euro-sign"></i></td>
                            <td style="color: white"> <?php echo $totalProduit ?> <i class="fa fa-euro-sign"></i></td>
                        </tr>

                        <?php
                    }
                    ?>
                    <tfoot>
                    <tr>
                        <td style="color: white"  colspan="7" align="right"><strong>Total</strong></td>
                        <td style="color: white"><?php echo $total ?> <i class="fa fa-euro-sign"></i></td>
                    </tr>
                    <tr>
                        <td colspan="8" align="right">
                            <form method="post">
                                <input type="submit" class="btn btn-success" name="valider" value="Valider la commande">
                                <input onclick="return confirm('Voulez vous vraiment vider le panier ?')" type="submit"
                                       class="btn btn-danger" name="vider" value="Vider le panier">
                            </form>
                        </td>
                    </tr>
                    </tfoot>
                </table>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>



