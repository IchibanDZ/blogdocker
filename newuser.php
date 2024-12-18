<?php
require_once 'partials/header.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST['prenom'], $_POST['nom'], $_POST['mdp'], $_POST['email']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mdp']) && !empty($_POST['email'])) {
    insertUserDatabase($_POST['prenom'], $_POST['nom'], password_hash($_POST['mdp'], PASSWORD_DEFAULT), $_POST['email']);
    $email = $_POST['email'];
    $user = getUserByEmail($email);
    if ($user) {
        $_SESSION['utilisateur'] = ['id_utilisateur' => $user['id_utilisateur'], 'email' => $user['email']];
        $_SESSION['mdp'] = $_POST['mdp'];
    };
    header('location:index.php');
    exit();
}
?>


<form class="registerform" method="post">
    <input type="text" placeholder="Prenom" name="prenom">

    <input type="text" placeholder="Nom" name="nom">

    <input type="password" placeholder="Mot de passe" name="mdp">

    <input type="email" placeholder="Email" name="email">
    <input type="submit" value="enregistrer">
</form>

<?php
require_once 'partials/footer.php';
?>