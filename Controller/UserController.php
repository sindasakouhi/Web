<?php
require '../Config.php';

class UserController
{

  public function getUsers()
  {
    $db = config::getConnexion();
    $sql = "SELECT * FROM user";
    try {

      $query = $db->prepare($sql);
      $query->execute();
      return $query->fetchAll();
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }
  public function getUserById($id) {
    $db = config::getConnexion(); // Connexion à la base de données
    $sql = "SELECT * FROM user WHERE id = :id";
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC); // Retourne un utilisateur sous forme de tableau associatif
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

  function addUser($user)
  {
    try {
      $db = config::getConnexion();
      $req = "INSERT INTO user (email, pwd) VALUES (:email, :pwd)";
      $query = $db->prepare($req);

      // Using bindValue() to explicitly bind values
      $query->bindValue(':email', $user['email'], PDO::PARAM_STR);
      $query->bindValue(':pwd', $user['pwd'], PDO::PARAM_STR);

      $query->execute();

      if ($query->rowCount() > 0) {
        echo "User added successfully!";
      } else {
        echo "Insertion failed: No rows affected.";
      }
    } catch (PDOException $e) {
      echo 'Database Error: ' . $e->getMessage();
    }
  }


  function deleteUser($id)
  {
    $db = config::getConnexion();
    $sql = "DELETE FROM user WHERE id = :id";
    try {
      $query = $db->prepare($sql);
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->execute();
    } catch (Exception $e) {
      die('Erreur:' . $e->getMessage());
    }
  }

  function updateUser($id, $user)
  {
    $db = config::getConnexion();
    $sql = "UPDATE user SET name = :name, email = :email WHERE id = :id"; // Add all the necessary fields
    try {
      $query = $db->prepare($sql);
      $query->bindParam(':id', $id, PDO::PARAM_INT);
      $query->bindParam(':name', $user['name'], PDO::PARAM_STR);
      $query->bindParam(':email', $user['email'], PDO::PARAM_STR); // Update with actual fields
      $query->execute();
    } catch (Exception $e) {
      die('Erreur:' . $e->getMessage());}
    }
}