<?php
require '../config.php';
require '../model/user.php';
class UserC
{
  function afficherUser()
  {
    $sql = "SELECT * FROM users";
    $db = config::getConnection();
    try {
      $affichage = $db->query($sql);
      return $affichage;
    } catch (Exception $e) {
      die('Erreur :' . $e->getMessage());
    }
  }
  function AjouterUser($user)
  {
    $sql = "insert into users (id,nom,prenom,email,password,isAdmin,typeCompte,datecreation) values (:id,:nom,:prenom,:email,:password,:isAdmin,:typeCompte,:datecreation)";
    $db = config::getConnexion();
    try {
      $req = $db->prepare($sql);
      $id = $user->getId();
      $FirstName = $user->getFirstName();
      $LastName = $user->getLastName();
      $mail = $user->getEmail();
      $pwd = $user->getPassword();
      $isAdmin = $user->getAdminStatus();
      $typeCmpt = $user->getTypeCompte();

      $req->bindValue(':id', $id);
      $req->bindValue(':nom', $FirstName);
      $req->bindValue(':prenom', $LastName);
      $req->bindValue(':email', $mail);
      $req->bindValue(':password', $pwd);
      $req->bindValue(':isAdmin', $isAdmin);
      $req->bindValue(':typeCompte', $typeCmpt);

      $req->execute();
    } catch (Exception $e) {
      die('Erreur' . $e->getMessage());
    }
  }
  function FindByID($id)
  {
    $sql = "SELECT * from users where id= $id ";
    $db = config::getConnexion();
    try {
      $liste = $db->query($sql);
      return $liste;
    } catch (Exception $e) {
      die('Erreur :' . $e->getMessage());
    }
  }
  function SupprimerUser($user)
  {
    $sql = "DELETE from users where  id= :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);

    $req->bindValue(':id', $_POST["id"]);

    try {
      $req->execute();
    } catch (Exception $e) {
      die('Erreur: ' . $e->getMessage());
    }
  }
  function Recherche($nom)
  {
    try {
      $db = config::getConnexion();
      $query = $db->prepare(
        'SELECT * FROM users WHERE nom = :nom'
      );
      $query->execute([
        'nom' => $nom
      ]);
      return $query->fetch();
    } catch (PDOException $e) {
      $e->getMessage();
    }
  }
}
?>