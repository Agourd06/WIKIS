<?php
require_once("UserInterface.php");
require_once("../config/Database.php");
class UserService implements UserInterface {
use Database;

protected $db;

    public function adduser(User $user){

      $conn =  $this->connect();
$fullname = $user->getFullName();
$email = $user->getEmail();
$password = $user->getPassword();
$role = $user->getRole();
      $query = "INSERT INTO users (user_fullname, user_email, user_pwd, user_role) VALUES (:fullname, :email, :pwd, :role)";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(":fullname", $fullname);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":pwd", $password);
      $stmt->bindParam(":role", $role);
      
      $stmt->execute();
      
    }
    public function updateuser(User $user){
}
public function removeUser(){
}

public function getUser(){}
}
?>