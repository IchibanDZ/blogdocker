<?php
require_once 'partials/header.php';
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$membres = getAllUtilisateur();
if (isset($_SESSION['utilisateur']) && !empty($_SESSION['utilisateur'])) {
  $utilisateur = $_SESSION['utilisateur']['email'];
} else {
  $utilisateur = 'invité';
}
?>

<h4 class="msgaccueil">Bienvenue <?php echo $utilisateur ?></h4>



<div class="foodcard">
  <div class="image-container">
    <div class="card">
      <img class="imgFood" src="img/miniburger.jpg" alt="Image 1">
      <h2>Mini Burgers "Microservices"</h2>
    </div>

    <div class="card">
      <img class="imgFood" src="img/batonnet.jpg" alt="Image 2">
      <h2>Bâtonnets de "CSS"</h2>
    </div>

    <div class="card">
      <img class="imgFood" src="img/bouillon.jpeg" alt="Image 3">
      <h2>Soupe "Java"</h2>
    </div>

    <div class="card">
      <img class="imgFood" src="img/salade.jpg" alt="Image 4">
      <h2>Salade "HTML"</h2>
    </div>

    <div class="card">
      <img class="imgFood" src="img/pates.png" alt="Image 5">
      <h2>Pâtes "API"</h2>
    </div>

    <div class="card">
      <img class="imgFood" src="img/risotto.avif" alt="Image 6">
      <h2>Risotto "Framework"</h2>
    </div>

    <div class="card">
      <img class="imgFood" src="img/brownie.jpg" alt="Image 7">
      <h2>Brownies "Backend"</h2>
    </div>

    <div class="card">
      <img class="imgFood" src="img/cupcake.jpg" alt="Image 8">
      <h2>Cupcakes "Front-End"</h2>
    </div>

    <div class="card">
      <img class="imgFood" src="img/mocktails.jpg" alt="Image 9">
      <h2>Mocktail "JavaScript"</h2>
    </div>

    <div class="card">
      <img class="imgFood" src="img/cocktail.jpg" alt="Image 10">
      <h2>Cocktail "SQL"</h2>
    </div>
  </div>
</div>


<!-- Script pour rendre le menu cliquable -->
<!-- <script>
    function toggleMenu() {
      var menu = document.getElementById("dropdownMenu");
      if (menu.style.display === "block") {
        menu.style.display = "none";
      } else {
        menu.style.display = "block";
      }
    }

    // Fermer le menu si on clique en dehors
    window.onclick = function(event) {
      if (!event.target.matches('.mainmenubtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-child");
        for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.style.display === "block") {
            openDropdown.style.display = "none";
          }
        }
      }
    }

    
  </script> -->
<?php require_once 'partials/footer.php'; ?>