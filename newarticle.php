<?php
require_once 'functions.php';
require_once 'partials/header.php';

// Démarrer la session et vérifier si l'utilisateur est connecté
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['utilisateur']) || empty($_SESSION['utilisateur'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: login.php');
    exit();
}

// Récupérer l'ID de l'utilisateur connecté
$idUtilisateur = $_SESSION['utilisateur']['id_utilisateur'];

// Vérifier si le formulaire a été soumis  (htmlspecialchars)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données de l'article
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $idAuteur = $_SESSION['utilisateur']['id_utilisateur'];
    // Gestion de l'image
    $imagePath = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        // Gestion de l'image téléchargée
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        // Types de fichiers autorisés
        $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'avif'];
        if (in_array($fileExtension, $allowedFileTypes)) {
            $newFileName = uniqid() . '.' . $fileExtension;
            $uploadDir = 'uploads/';
            $imagePath = $uploadDir . $newFileName;

            // Déplacer l'image vers le répertoire cible
            if (!move_uploaded_file($fileTmpPath, $imagePath)) {
                echo "Erreur lors du téléchargement de l'image.";
                exit();
            }
        } else {
            echo "Le type de fichier n'est pas autorisé.";
            exit();
        }
    }

    // Appel à la fonction pour ajouter l'article
    if (insertArticle($titre, $contenu, $imagePath, $idUtilisateur, $idAuteur)) {
        echo "L'article a été ajouté avec succès.";
        // Redirection après insertion
        header('Location: index.php');
        exit();
    } else {
        echo "Erreur lors de l'ajout de l'article.";
    }
}
?>

<form class="newarticleform" action="newarticle.php" method="post" enctype="multipart/form-data">
    <label for="titre">Titre de l'article :</label>
    <input type="text" id="titre" name="titre" required>

    <label for="contenu">Contenu :</label>
    <textarea id="contenu" name="contenu" required></textarea>

    <label for="image">Image :</label>
    <input type="file" id="image" name="image">

    <input type="submit" value="Ajouter Article">
</form>

<?php
require_once 'partials/footer.php';
?>