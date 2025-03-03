<?php
require_once '../Controller/UserController.php';

$userController = new UserController();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $user = $userController->getUserById($id); // Fonction à ajouter dans UserController

    if (!$user) {
        die("Utilisateur non trouvé.");
    }
} else {
    die("ID invalide.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['pwd'] ?? '';

    if (!empty($email) && !empty($password)) {
        $userController->updateUser($id, ['email' => $email, 'pwd' => $password]);
        header("Location: liste_users.php");
        exit();
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
</head>
<body>
    <h2>Modifier l'utilisateur</h2>
    <form action="updateuser.php?id=<?php echo $id; ?>" method="post">
        <label>Email :</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <br>
        <label>Mot de passe :</label>
        <input type="password" name="pwd" required>
        <br>
        <button type="submit">Modifier</button>
    </form>
</body>
</html>
