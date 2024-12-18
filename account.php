<?php
require_once 'partials/header.php';
require_once 'functions.php';

// Vérifier si l'utilisateur est connecté
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['utilisateur']) || empty($_SESSION['utilisateur'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: login.php');
    exit();
}

// Récupérer les informations de l'utilisateur connecté
$userId = $_SESSION['utilisateur']['id_utilisateur'];

function getUserInfo($userId)
{
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur');
    $stmt->execute(['id_utilisateur' => $userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

$userInfo = getUserInfo($userId);
?>

<h1 class="titleaccount">Mon Compte</h1>

<?php if ($userInfo): ?>
    <form class="acccountform" action="update_user.php" method="post">
        <input type="hidden" name="id_utilisateur" value="<?php echo htmlspecialchars($userInfo['id_utilisateur']); ?>">

        <p><strong>Nom :</strong> <input type="text" name="nom" value="<?php echo htmlspecialchars($userInfo['nom']); ?>"></p>
        <p><strong>Prénom :</strong> <input type="text" name="prenom" value="<?php echo htmlspecialchars($userInfo['prenom']); ?>"></p>
        <p><strong>Email :</strong> <input type="email" name="email" value="<?php echo htmlspecialchars($userInfo['email']); ?>"></p>

        <p><input type="submit" value="Mettre à jour"></p>
    </form>
    <!-- Vous pouvez ajouter d'autres informations ici -->
<?php else: ?>
    <p>Aucune information trouvée.</p>
<?php endif; ?>

<?php require_once 'partials/footer.php'; // Inclut le pied de page (footer) 
?>