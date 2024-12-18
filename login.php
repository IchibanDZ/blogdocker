<?php
require_once('functions.php');
require_once 'partials/header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST) && !empty($_POST)) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $utilisateur = userConnect($email);  // Fonction qui récupère l'utilisateur par email
    if ($utilisateur) {
        $registered_password = $utilisateur['mdp'];
        $isCredentialsOk = password_verify($mdp, $registered_password);
        if ($isCredentialsOk) {
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['utilisateur'] = [
                'id_utilisateur' => $utilisateur['id_utilisateur'],
                'email' => $utilisateur['email']
            ];
            header('location:index.php');
            exit();  // Ajouter un exit après la redirection
        } else {
            echo "Mauvais mot de passe, essayez encore.";
        }
    } else {
        echo "Mauvais identifiant.";
    }
}
?>

<h1 class="titlelogin">Se connecter</h1>

<form class="loginform" action="" method="post">
    <input type="email" name="email" placeholder="Votre email" required>
    <input type="password" name="mdp" placeholder="Mot de passe" required>
    <input type="submit" value="Se connecter">
</form>

<?php require_once 'partials/footer.php'; ?>