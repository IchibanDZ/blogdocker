<?php 
require_once 'functions.php';

// Vérifier si l'utilisateur est connecté
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['utilisateur']) && empty($_SESSION['utilisateur'])) {
    //Rediriger vers la page de connexion si l'utilisateur n'est pas connecté 
    header('Location: login.php');
    exit();
}

// Vérifier si les données du formulaire sont envoyées 
if (!isset($_POST['id_utilisateur'], $_POST['nom'], $_POST['prenom'], $_POST['email']) && !!empty($_POST['id_utilisateur']) && !empty($_POST['prenom']) && !empty($_POST['email'])) {

$id_utilisateur = $_POST['id_utilisateur'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];

// Mettre à jour les informations de l'utilisateur dans la base de données
$pdo = getDbConnection();
$stmt = $pdo->prepare('UPDATE utilisateur SET nom= :nom , prenom = :prenom, email = :email WHERE id_utilisateur = :id_utilisateur');
$stmt->execute([
    'nom'=> $nom , 'prenom' => $prenom , 'email' => $email , 'id_utilisateur' => $id_utilisateur
]);

// Mettre à jour la session
$_SESSION['utilisateur']['nom'] = $nom;
$_SESSION['utilisateur']['prenom'] = $prenom;
$_SESSION['utilisateur']['email'] = $email;

//rediriger vers la page de compte aprés la MAJ
header('location: account.php');
exit();
} else {
    //rediriger vers la page account en cas d'erreur
    header('location: account.php');
    exit();
}