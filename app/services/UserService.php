<?php
require_once("UserInterface.php");
require_once(__DIR__ . "/../models/User.php");
require_once(__DIR__ . "/../config/Database.php");

class UserService implements UserInterface
{
    use Database;

    protected $db;

    public function adduser(User $user)
{
    $conn = $this->connect();
    $fullname = $user->getFullName();
    $email = $user->getEmail();
    $password = $user->getPassword();
    $role = $user->getRole();
   
        $insertQuery = "INSERT INTO users (user_fullname, user_email, user_pwd, user_role) VALUES (:fullname, :email, :pwd, :role)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(":fullname", $fullname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $password);
        $stmt->bindParam(":role", $role);

        $stmt->execute();
    
}

public function cheking($email){
    $conn = $this->connect();

    $query = "SELECT user_email FROM users WHERE user_email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $emails  = $stmt->fetch(PDO::FETCH_ASSOC);
return $emails;

}
    public function getUser()
    {
        $conn =  $this->connect();
        $query = "SELECT * FROM users WHERE user_role = 'author'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
       $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
       $users = array();
       foreach ($result as $row) {
        

        $users[] = new User($row['user_id'],$row['user_fullname'],$row['user_email'],$row['user_pwd'],$row['user_role']);
    }
return $users;
}


    public function login($email)
    {
        $conn = $this->connect();

        $query = "SELECT * FROM users WHERE user_email = :email";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $loged  = $stmt->fetch(PDO::FETCH_ASSOC);

        return $loged;
    }

public function CountAUthors(){

    $conn = $this->connect();
    $query = "SELECT count(user_id) as authors WHERE user_role = author";
    $stmt = $conn->prepare($query);
    $stmt->execute();
}
  
}
