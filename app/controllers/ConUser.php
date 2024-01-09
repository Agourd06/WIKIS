<?php
require_once("../services/UserService.php");
require_once("../models/User.php");

session_start();



$Userservice = new Userservice();

// ----------------------add author-------------------------

if (isset($_POST["register"])) {
    $fullname = $_POST["Fname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $id = '';
    $emails =  $Userservice->cheking($email);
    if ($fullname != '' && $email != '' && $password != '' && $cpassword != '') {
        if ($password === $cpassword) {
            if ($emails) {
                $_SESSION['exist'] = 'E-mail already exists';
                header('Location: ../views/authentification/register.php');
            } else {
                $hashing = password_hash($password, PASSWORD_DEFAULT);
                $role = 'admin';
                $user = new User($id, $fullname, $email,  $hashing, $role);
                $Userservice->adduser($user, $email);

                header('Location: ../views/authentification/login.php');
            }
        } else {

            $_SESSION['error'] = 'Passwords not Matched';
            header('Location: ../views/authentification/register.php');
        }
    }else {
        $_SESSION['empty'] = 'Empty Input invalid';
            header('Location: ../views/authentification/register.php');
    }
}

// --------------------------------login------------------------------

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $logPwd = $_POST['password'];
    $loged =  $Userservice->login($email);
    $password = $loged['user_pwd'];
    $role = $loged["user_role"];
    $_SESSION['user'] = $loged['user_id'];
    $_SESSION['username'] = $loged['user_fullname'];



    if (password_verify($logPwd, $password) && $role = 'author') {

        header('Location: ../views/visiteur/');
    } else if (password_verify($logPwd, $password) && $role = 'admin') {
        header('Location: ../views/admin/');
    } else {
        $_SESSION['erreur'] = 'inccorect E-mail Or Password';
        header('Location: ../views/authentification/login.php');
    }
}
