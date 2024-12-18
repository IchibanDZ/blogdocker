<?php
require_once 'functions.php'; 
require_once 'partials/header.php'; // Inclusion de l'en-tête

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Démarrer la session si nécessaire
}

// Vérifier si l'ID de l'article est fourni dans l'URL
if (isset($_GET['id_article'])) {
    $idArticle = $_GET['id_article'];

    // Récupérer l'article et son auteur
    $article = getArticleById($idArticle);

    if ($article) {
        $auteur = getAuthorById($article['id_utilisateur']);
    } else {
        echo '<p>Article introuvable.</p>';
        exit();
    }
} else {
    echo '<p>Article non spécifié.</p>';
    exit();
}

?>

<h1><?php echo htmlspecialchars($article['titre']); ?></h1>
<p><strong>Publié par :</strong> <?php echo htmlspecialchars($auteur['prenom']) . ' ' . htmlspecialchars($auteur['nom']); ?></p>
<p><strong>Date de publication :</strong> <?php echo htmlspecialchars($article['date_publication']); ?></p>
<p><?php echo nl2br(htmlspecialchars($article['contenu'])); ?></p>

<h2>Commentaires</h2>

<form action="article.php?id_article=<?php echo $idArticle; ?>" method="post">
    <textarea name="commentaire" placeholder="Votre commentaire" required></textarea>
    <input type="submit" value="Publier">
</form>

<?php
// Gestion de l'ajout de commentaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentaire'])) {
    $commentaire = $_POST['commentaire'];
    $idUtilisateur = $_SESSION['utilisateur']['id_utilisateur'];

    // Insertion du commentaire dans la base de données
    insertComIntoDataBase($commentaire, $idArticle, $idUtilisateur);

    // Redirection pour éviter la double soumission
    header("Location: article.php?id_article=$idArticle");
    exit();
}

// Affichage des commentaires
$comments = getComByArticle($idArticle);

if (!empty($comments)) {
    foreach ($comments as $comment) {
        echo '<p>' . htmlspecialchars($comment['contenu']) . ' - Publié le ' . htmlspecialchars($comment['date_publication']) . '</p>';
    }
} else {
    echo '<p>Aucun commentaire pour cet article.</p>';
}

require_once 'partials/footer.php'; // Inclusion du pied de page
?>
