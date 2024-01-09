<?php
require_once("../services/UserService.php");
require_once("../models/User.php");

session_start();



$Userservice = new Userservice();

// ----------------------add author-------------------------

if(isset($_POST["register"]) ){
$fullname = $_POST["Fname"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$id = '';
if($password === $cpassword){
$hashing = password_hash($password, PASSWORD_DEFAULT);
$role = 'author';
$user = new User($id,$fullname, $email,  $hashing,$role);
$Userservice->adduser($user);

header('Location: ../views/authentification/login.php');
}
else{

    $_SESSION['error'] = 'Passwords not Matched';
    header('Location: ../views/authentification/register.php');

}
}

// --------------------------------login------------------------------


?>