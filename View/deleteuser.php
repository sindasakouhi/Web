<?php
require_once '../Controller/UserController.php';

$userController = new UserController();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $userController->deleteUser($id);
    header("Location: liste_users.php"); // Rediriger après suppression
    exit();
} else {
    echo "ID invalide.";
}
?>
