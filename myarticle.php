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



$idU = $_SESSION['utilisateur']['id_utilisateur'];
// Récupérer les articles de l'utilisateur
$articles = getMyArticle($idU);
// var_dump($articles);
// exit();
?>


<h1>Mes Articles</h1>

<?php if (empty($articles)): ?>
    <p>Vous n'avez écrit aucun article pour le moment, il est encore temps</p>
<?php else:  foreach ($articles as $article): ?>

<div class="cards-container">
        <div class="myarticle">
            <h2>
                <?php echo ($article['titre'] ?? 'Titre inconnu'); ?>
            </h2>
            <p>
                <?php echo ($article['contenu'] ?? 'Contenu inconnu' ); ?>
            </p>
            
            <?php if (!empty($article['image'])): ?>
                <p><img src="<?php echo ($article['image']); ?>" alt="Image de l'article" style="max-width: 100%;"></p><p><strong>Date de publication :</strong> <?php echo ($article['date_publication']) ?? 'Date de publication non disponible'; ?> </p>
                <?php else : ?>
                    <p>Aucune image disponible pour cette article.</p>

        </div></div>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>

    <?php
    $idArticle = $article['id_article'];
$comments = getComByArticle($idArticle);

if (!empty($comments)) {
    foreach ($comments as $comment) {
        echo '<p>' . htmlspecialchars($comment['contenu']) . ' - ' . htmlspecialchars($comment['date_publication']) . '</p>';
    }
} else {
    echo '<p class="pcoms">Aucun commentaire pour cet article.</p>';
}
?>

<?php
require_once 'partials/footer.php';

?>  