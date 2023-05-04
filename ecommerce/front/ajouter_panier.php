<?php
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté, sinon rediriger vers la page de connexion
if (!isset($_SESSION['utilisateur'])) {
    header('location: Connexion2.php');
}

// Récupérer l'identifiant et la quantité du produit à ajouter dans le panier
$id = $_POST['id'];
$qty = $_POST['qty'];

// Récupérer l'identifiant de l'utilisateur connecté
$idUtilisateur = $_SESSION['utilisateur']['id'];

// Si le panier de l'utilisateur n'existe pas encore, le créer
if (!isset($_SESSION['panier'][$idUtilisateur])) {
    $_SESSION['panier'][$idUtilisateur] = [];
}

// Si la quantité est égale à 0, supprimer le produit du panier, sinon l'ajouter/modifier la quantité
if($qty == 0){
    unset($_SESSION['panier'][$idUtilisateur][$id]);
}else{
    $_SESSION['panier'][$idUtilisateur][$id] = $qty;
}

// Rediriger vers la page précédente
header("location:".$_SERVER['HTTP_REFERER']);

?>
