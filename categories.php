<?php
require_once 'functions.php';
require_once 'partials/header.php';

// Récupérer toutes les catégories
$categories = getAllCategories();

echo '<h1>Choisir une catégorie</h1>';
echo '<ul>';
foreach ($categories as $categorie) {
    echo '<li><a href="categories.php?id_categorie=' . $categorie['id_categorie'] . '">' . htmlspecialchars($categorie['nom_categorie']) . '</a></li>';
}
echo '</ul>';

// Si une catégorie est sélectionnée
if (isset($_GET['id_categorie'])) {
    $id_categorie = $_GET['id_categorie'];
    $articles = getArticlesByCategory($id_categorie);

    if ($articles) {
        echo '<h2>Articles dans la catégorie : ' . htmlspecialchars($categories[array_search($id_categorie, array_column($categories, 'id_categorie'))]['nom_categorie']) . '</h2>';
        foreach ($articles as $article) {
            echo '<div class="article">';
            echo '<h3><a href="showarticle.php?id_article=' . $article['id_article'] . '">' . htmlspecialchars($article['titre']) . '</a></h3>';
            echo '<p>Publié par ' . htmlspecialchars($article['prenom']) . ' ' . htmlspecialchars($article['nom']) . ' le ' . htmlspecialchars($article['date_publication']) . '</p>';
            if (!empty($article['image'])) {
                echo '<img src="' . htmlspecialchars($article['image']) . '" alt="Image de l\'article" style="max-width:100%; height:auto;">';
            }
            echo '</div>';
        }
    } else {
        echo '<p>Aucun article trouvé dans cette catégorie.</p>';
    }
} else {
    echo '<p>Veuillez sélectionner une catégorie pour afficher les articles.</p>';
}

require_once 'partials/footer.php';
?>
