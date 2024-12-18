<?php
require_once('functions.php');
require_once 'partials/header.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  <title>Délices du Développeur : Recettes Savoureuses pour Codeurs Affamés</title>
</head>

<body>
  <nav class="black">
    <div class="containerTop">
      <div class="boutons">
        <img class="burger" id="burger" class="rotationRight" src="img/cookie-solid(1).svg" alt="menu burger">
      </div>
    </div>
    <div class="ulNavClass" id="ulNav">
      <ul class="navCookie">
        <li><a href="index.php">Accueil</a></li> 
        <?php if (!isset($_SESSION['utilisateur'])): ?>
        <li><a href="newuser.php">S'inscrire</a></li>
      <?php endif; ?>
        <li><a href="articleindex.php">Articles</a></li>
        <li><a href="myarticle.php">Mes articles</a></li>
        <li><a href="mycom.php">Mes commentaires</a></li>
        <li><a href="newarticle.php">Ajouter Article</a></li>
        <li><a href="account.php">Mon compte</a></li>

        <!-- Bouton Connexion/Déconnexion -->
        <li class="btn">
          <?php if (isset($_SESSION['utilisateur'])): ?>
            <a href="logout.php">Déconnexion</a>
          <?php else: ?>
            <a href="login.php">Connexion</a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </nav>

  <div id="logo">
    <img src="img/1.png" alt="Logo Délice et Développeur">
  </div>

  <div class="icones">
    <i class="fa-brands fa-instagram"></i>
    <i class="fa-brands fa-facebook"></i>
    <i class="fa-brands fa-youtube"></i>
    <i class="fa-brands fa-square-pinterest"></i>
  </div>

  <nav class="Articles">
    <ul class="categorrie">
      <li><a href="categories.php?categorie=Apéritifs">Apéritifs</a></li>
      <li><a href="categories.php?categorie=Entrées">Entrées</a></li>
      <li><a href="categories.php?categorie=Plats">Plats</a></li>
      <li><a href="categories.php?categorie=Végétarien">Végétarien</a></li>
      <li><a href="categories.php?categorie=Desserts">Desserts</a></li>
      <li><a href="categories.php?categorie=Cocktails & Boissons">Cocktails & Boissons</a></li>
    </ul>
  </nav>



  <div class="search-container">
    <input type="search" id="inputval" placeholder="Rechercher une recette ...">
    <button class="search-button"><i id="iconeS" class="fa-solid fa-magnifying-glass"></i></button>
  </div>
</body>

</html>