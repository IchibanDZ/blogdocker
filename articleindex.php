<?php
require_once 'functions.php';
require_once 'partials/header.php'; ?>

<div class="articles-container">
    <?php
    $articles = getAllArticles(); // Récupère tous les articles de la BDD

    foreach ($articles as $article) {
        echo '<div class="article">';
        echo '<h2><a href="showarticle.php?id_article=' . $article['id_article'] . '">' . htmlspecialchars($article['titre']) . '</a></h2>';


        // Afficher l'image associée à l'article
        if (!empty($article['image'])) {
            echo '<img src="' . htmlspecialchars($article['image']) . '" alt="Image de l\'article" class="article-image">';
        }
        echo '<p>Publié par <a href="author_articles.php?id_auteur=' . htmlspecialchars($article['id_auteur']) . '">' . htmlspecialchars($article['id_auteur']) . '</a> le ' . htmlspecialchars($article['date_publication']) . '</p>';
        echo '</div>'; // Fermeture de la div .article
    }
    ?>
</div>

<?php
require_once 'partials/footer.php';
?>
