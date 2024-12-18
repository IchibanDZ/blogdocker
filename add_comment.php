<?php
require_once 'functions.php';
session_start();

if (!isset($_SESSION['utilisateur'])) {
    header('Location: login.php');
    exit();
}

if (isset($_POST['commentaire']) && !empty($_POST['commentaire']) && isset($_GET['id_article'])) {
    $idArticle = $_GET['id_article'];
    $commentaire = $_POST['commentaire'];
    $idUser = $_SESSION['utilisateur']['id_utilisateur'];

    // Date actuelle pour le commentaire
    $dateCom = date('Y-m-d H:i:s');

    if (insertComIntoDataBase($dateCom, $idArticle, $idUser, $commentaire)) {
        echo "Commentaire ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du commentaire.";
    }
    header('Location: showarticle.php?id_article=' . $idArticle);
    exit();
} else {
    echo "Erreur : Commentaire ou article non spécifié.";
}
