<?php
require_once 'functions.php';
require_once 'partials/header.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['utilisateur']) || empty($_SESSION['utilisateur'])) {
    header('Location: login.php');
    exit();
}
$idUtilisateur = $_SESSION['utilisateur']['id_utilisateur'];
$comments = getComByIdAuteur($idUtilisateur);

if ($comments) {
    echo '<h2>Vos commentaires</h2>';
    foreach ($comments as $comment) {
        echo '<div class="comment">';
        echo '<p><strong>Article :</strong> ' . htmlspecialchars($comment['titre']) . '</p>';
        echo '<p><strong>Commentaire :</strong> ' . htmlspecialchars($comment['contenu']) . '</p>';
        echo '<p><strong>Date :</strong> ' . htmlspecialchars($comment['date_com']) . '</p>';
        echo '</div>';
    }
} else {
    echo '<p>Vous n\'avez pas encore laissé de commentaire.</p>';
}

require_once 'partials/footer.php';
