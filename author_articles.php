<?php
require_once 'functions.php';
require_once 'partials/header.php';

// Vérification si le prénom de l'auteur est passé en paramètre
if (isset($_GET['prenom'])) {
    $prenom_auteur = $_GET['prenom'];

    // Récupérer tous les articles écrits par cet auteur (prénom)
    $articles = getArticlesByAuthor($prenom_auteur);

    if ($articles) {
        foreach ($articles as $article) {
            // Afficher le titre et créer un lien vers l'article
            echo '<h2><a href="showarticle.php?id_article=' . $article['id_article'] . '">' . htmlspecialchars($article['titre']) . '</a></h2>';
            echo '<p>Publié le ' . htmlspecialchars($article['date_publication']) . '</p>';

            // Afficher l'image associée à l'article
            if (!empty($article['image'])) {
                echo '<img src="' . htmlspecialchars($article['image']) . '" alt="Image de l\'article" style="max-width:100%; height:auto;">';
            }

            echo '<hr>';
        }
    } else {
        echo '<p>Aucun article trouvé pour cet auteur.</p>';
    }
} else {
    echo '<p>Aucun auteur spécifié.</p>';
}

require_once 'partials/footer.php';
