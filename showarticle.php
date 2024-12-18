<?php
require_once 'functions.php';
require_once 'partials/header.php';

if (isset($_GET['id_article'])) {
    $id_article = $_GET['id_article'];

    // Récupérez les détails de l'article
    $article = getArticleById($id_article);

    if ($article) {
        // Récupérer le nom de l'auteur
        $auteur = getAuthorById($article['id_utilisateur']);

        echo '<div class="article-container">';
        echo '<h1 class="article-title">' . htmlspecialchars($article['titre']) . '</h1>';

        // Afficher l'image
        if (!empty($article['image'])) {
            echo '<img src="' . htmlspecialchars($article['image']) . '" alt="Image de l\'article" class="article-image">';
        }

        // Afficher le contenu de l'article
        echo '<p class="article-content">' . nl2br(htmlspecialchars($article['contenu'])) . '</p>';
        echo '<p class="article-meta">Publié par  <a href="author_articles.php?prenom=' . htmlspecialchars($auteur['prenom']) . '">' . htmlspecialchars($auteur['prenom']) . '</a>
 le ' . htmlspecialchars($article['date_publication']) . '</p>';

        // Afficher le formulaire de commentaire
        if (isset($_SESSION['utilisateur'])) {
            echo '<div class="comment-form">';
            echo '<h3>Ajouter un commentaire</h3>';
            echo '<form action="" method="post">
                    <input type="hidden" name="id_article" value="' . htmlspecialchars($id_article) . '">
                    <input type="text" name="commentaire" placeholder="Votre commentaire" required>
                    <input type="submit" value="Publier">
                  </form>';
            echo '</div>';
        } else {
            echo '<p>Vous devez être connecté pour ajouter un commentaire.</p>';
        }

        // Afficher les commentaires
        echo '<div class="comments-container">';
        $comments = getComByArticle($id_article); // Récupérer les commentaires pour cet article
        foreach ($comments as $comment) {
            echo '<div class="comment">';
            echo '<p><strong>' . htmlspecialchars($comment['id_utilisateur']) . '</strong> le ' . htmlspecialchars($comment['date_com']) . '</p>';
            echo '<p>' . nl2br(htmlspecialchars($comment['contenu'])) . '</p>';
            echo '</div>';
        }
        echo '</div>'; // Fermeture de la div .comments-container

        // Traitement de l'ajout de commentaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commentaire'])) {
            $commentaire = $_POST['commentaire'];
            $idUser = $_SESSION['utilisateur']['id_utilisateur'];
            $dateCom = date('Y-m-d H:i:s');

            if (insertComIntoDataBase($dateCom, $id_article, $idUser, $commentaire)) {
                echo "<p>Commentaire ajouté avec succès.</p>";
                // Rediriger pour éviter la resoumission du formulaire
                header("Location: showarticle.php?id_article=" . $id_article);
                exit();
            } else {
                echo "<p>Erreur lors de l'ajout du commentaire.</p>";
            }
        }

        echo '</div>'; // Fermeture de la div .article-container
    } else {
        echo '<p>Article non trouvé.</p>';
    }
} else {
    echo '<p>Aucun article spécifié.</p>';
}

require_once 'partials/footer.php';
