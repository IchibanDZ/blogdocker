<?php

function dbconnect()
{
    try {
        $dbh = new PDO('mysql:host=db;dbname=blogcuisine', 'user', 'trustNo1');
        return $dbh;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function getAllUtilisateur()
{
    $dbh = dbconnect();
    $query = "SELECT * FROM utilisateur";
    $stmt = $dbh->query($query); //la requête va envoyer les résultats dans un objet PDO Statement qu'on ne peut pas exploiter tel quel
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function userConnect($email)
{
    $dbh = dbconnect();
    $stmt = $dbh->prepare($query = "SELECT * FROM utilisateur WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}


function insertUserDatabase($prenom, $nom, $mdp, $email)
{
    $dbh = dbconnect();
    $stmt = $dbh->prepare($query = "INSERT INTO utilisateur (prenom, nom, mdp, email) VALUES (:prenom, :nom, :mdp, :email)");
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':mdp', $mdp);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
}


function getUserByEmail($email)
{
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=db;dbname=blogcuisine', 'user', 'trustNo1');

    // Préparer et exécuter la requête
    $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE email = :email');
    $stmt->execute(['email' => $email]);

    // Récupérer l'utilisateur
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getDbConnection()
{
    $host = 'localhost';
    $dbname = 'blog_cuisine';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
        exit();
    }
}


function insertArticle($titre, $contenu, $imagePath, $idUtilisateur, $idAuteur)
{
    $pdo = getDbConnection();

    // Préparation de la requête d'insertion avec la date de publication automatique (current timestamp)
    $stmt = $pdo->prepare("INSERT INTO article (titre, contenu, image, id_utilisateur,id_auteur, date_publication ) 
                           VALUES (:titre, :contenu, :image, :id_utilisateur, :id_auteur, :date_publication)");

    // Exécution de la requête avec les données fournies
    $stmt->execute([
        ':titre' => $titre,
        ':contenu' => $contenu,
        ':image' => $imagePath,
        ':date_publication' => date('Y-m-d'),
        ':id_utilisateur' => $idUtilisateur,
        ':id_auteur' => $idAuteur
    ]);

    // Vérifier si l'insertion a réussi
    return $stmt->rowCount() > 0;
}


function getMyArticle($idU)
{
    $dbh = dbconnect();
    $stmt = $dbh->prepare($query = "SELECT * FROM article WHERE id_utilisateur = :id_utilisateur ORDER BY date_publication DESC");
    $stmt->execute(['id_utilisateur' => $idU]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


function insertComIntoDataBase($dateCom, $idArticle, $idUser, $contents)
{
    $dbh = dbconnect();
    $stmt = $dbh->prepare($query = "INSERT INTO commentaire (date_com, id_article, id_utilisateur, contenu )  VALUES (:date_com, :id_article, :id_utilisateur, :contenu)");
    $stmt->execute([
        ':date_com' => $dateCom,
        ':id_article' => $idArticle,
        ':id_utilisateur' => $idUser,
        ':contenu' => $contents
    ]);

    // Vérifier si l'insertion a affecté au moins une ligne
    return $stmt->rowCount() > 0; // Retourne true ou false

    if (insertComIntoDataBase($dateCom, $idArticle, $idUser, $contents)) {
        echo "Commentaire ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du commentaire.";
    }
}

function getComByArticle($idArticle)
{
    $dbh = dbconnect();
    $stmt = $dbh->prepare("SELECT * FROM commentaire WHERE id_article = :id_article ORDER BY date_com DESC");
    $stmt->bindParam(':id_article', $idArticle);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getComByIdAuteur($idUtilisateur)
{
    $dbh = dbconnect();
    $query = 'SELECT c.contenu, c.date_com, a.titre 
              FROM commentaire c
              JOIN article a ON c.id_article = a.id_article
              WHERE c.id_utilisateur = :id_utilisateur';

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id_utilisateur', $idUtilisateur, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getAllArticles()
{
    $dbh = dbconnect();
    $stmt = $dbh->prepare('SELECT * FROM article ORDER BY date_publication DESC');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAuthorById($idUtilisateur)
{
    $dbh = dbconnect();
    $stmt = $dbh->prepare("SELECT nom, prenom FROM utilisateur WHERE id_utilisateur = :id_utilisateur");

    $stmt->execute([':id_utilisateur' => $idUtilisateur]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getArticleById($idArticle)
{
    $dbh = dbconnect();
    $stmt = $dbh->prepare("SELECT * FROM article WHERE id_article = :id_article");
    $stmt->bindParam(':id_article', $idArticle);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getArticlesByAuthor($prenom)
{
    $dbh = dbconnect();
    $stmt = $dbh->prepare("SELECT * FROM article a JOIN utilisateur u ON a.id_utilisateur = u.id_utilisateur WHERE u.prenom = :prenom ORDER BY date_publication DESC");
    $stmt->bindParam(':prenom', $prenom);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCategories() {
    $dbh = dbconnect();
    $stmt = $dbh->prepare('SELECT * FROM categorie');
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getArticlesByCategory($id_categorie) {
    $dbh = dbconnect();
    $stmt = $dbh->prepare("SELECT * FROM article JOIN categorie ON article.id_auteur = categorie.id_categorie WHERE article.id_categorie = :id_categorie ORDER BY article.date_publication DESC");
    $stmt->bindParam(':id_categorie', $id_categorie);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// SELECT article.id_article, article.titre, article.date_publication, utilisateur.nom AS auteur
//         FROM article
//         JOIN utilisateur ON article.id_utilisateur = utilisateur.id_utilisateur
//         ORDER BY article.date_publication DESC
