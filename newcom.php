<?php
require_once 'functions.php';
require_once 'partials/header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['utilisateur']) || empty($_SESSION['utilisateur'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: login.php');
    exit();
}

// Vérifier que l'ID de l'article est bien dans l'URL
if (isset($_GET['id_article']) && !empty($_GET['id_article'])) {
    $idArticle = $_GET['id_article'];
} else {
    echo "Erreur : L'ID de l'article n'est pas fourni.";
    exit();
}

// Récupérer l'article actuel
$article = getArticleById($idArticle);
if (!$article) {
    echo "Erreur : Article non trouvé.";
    exit();
}

// Récupérer et afficher les commentaires existants
$comments = getComByArticle($idArticle);
foreach ($comments as $comment) {
    echo '<p>' . htmlspecialchars($comment['contenu']) . ' - <em>' . htmlspecialchars($comment['date_com']) . '</em></p>';
}

// Gérer l'ajout d'un commentaire
if (isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {
    $comI = $_POST['commentaire'];
    $idUser = $_SESSION['utilisateur']['id_utilisateur'];

    // Date actuelle pour le commentaire
    $dateCom = date('Y-m-d H:i:s');

    if (insertComIntoDataBase($dateCom, $idArticle, $idUser, $comI)) {
        echo "Commentaire ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du commentaire.";
    }
}
?>

<!-- Formulaire pour ajouter un commentaire -->
<form action="" method="post">
    <input type="hidden" name="id_article" value="<?php echo htmlspecialchars($idArticle); ?>">
    <input type="text" placeholder="Ajouter commentaire" name="commentaire" required>
    <input type="submit" value="Publier">
</form>

<?php require_once 'partials/footer.php'; ?>