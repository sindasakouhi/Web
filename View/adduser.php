<?php
require_once '../Controller/UserController.php';  

// Créer une instance de UserController
$userController = new UserController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['pwd'] ?? '';

    // Création correcte du tableau utilisateur
    $user = [
        'email' => $email,
        'pwd' => $password
    ];

    if (!empty($email) && !empty($password)) {
        if ($userController->addUser($user)) {
            echo "<p>Utilisateur ajouté avec succès !</p>";
        } else {
            echo "<p>Erreur lors de l'ajout de l'utilisateur.</p>";
        }
    } else {
        echo "<p>Veuillez remplir tous les champs.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Utilisateur</title>
</head>
<body>
    <h2>Ajouter un utilisateur</h2>
    <form action="adduser.php" method="post">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="pwd">Mot de passe :</label>
        <input type="password" id="pwd" name="pwd" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
