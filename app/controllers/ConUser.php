<?php
require_once("../services/UserService.php");
require_once("../models/User.php");


$Userservice = new Userservice();
if(isset($_POST["register"]) ){
$fullname = $_POST["Fname"];
$email = $_POST["email"];
$password = $_POST["password"];
$id = '';
$hashing = password_hash($password, PASSWORD_DEFAULT);
$role = 'author';
$user = new User($id,$fullname, $email,  $hashing,$role);
$Userservice->adduser($user);

header('Location: ../views/authentification/login.php');

}


?>