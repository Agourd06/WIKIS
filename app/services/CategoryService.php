<?php
require_once("CategoryInterface.php");
require_once(__DIR__ . "/../models/Category.php");
require_once(__DIR__ . "/../config/Database.php");

class UserService implements CategoryInterface
{
    use Database;

    protected $db;

    public function addCategory(Category $category)
{
    $conn = $this->connect();
    $fullname = $category->getFullName();
    $email = $category->getEmail();
    $password = $category->getPassword();
    $role = $category->getRole();
   
        $insertQuery = "INSERT INTO users (user_fullname, user_email, user_pwd, user_role) VALUES (:fullname, :email, :pwd, :role)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(":fullname", $fullname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $password);
        $stmt->bindParam(":role", $role);

        $stmt->execute();
    
}
public function getCategorys(){}
public function updateCategory(Category $category,$id){}
public function removeCatgory($id){}


}
?>