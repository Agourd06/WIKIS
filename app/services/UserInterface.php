<?php

interface UserInterface{

    public function addUser(User $user);
    public function getUser();
    public function updateuser(User $user);
    public function removeUser();
    public function login($email);
    public function cheking($email);
}

?>