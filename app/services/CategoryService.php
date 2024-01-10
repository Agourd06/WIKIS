<?php
require_once("CategoryInterface.php");
require_once(__DIR__ . "/../models/Category.php");
require_once(__DIR__ . "/../config/Database.php");

class CategoryService implements CategoryInterface
{
    use Database;

    protected $db;

    public function addCategory(Category $category)
{
    $conn = $this->connect();
    $Cat_name = $category->getCategory_name();
    $Cat_description = $category->getCategory_desc();
    $Cat_image = $category->getCategory_image();
    	

        $insertQuery = "INSERT INTO category (category_name, category_desc, category_image) VALUES (:names, :descrip, :pic)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(":names", $Cat_name);
        $stmt->bindParam(":descrip", $Cat_description);
        $stmt->bindParam(":pic", $Cat_image);

        $stmt->execute();
    
}
public function getCategorys(){

    $conn = $this->connect();

    $query = "SELECT category_name FROM category";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $categorys  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $Category=array();
    foreach($categorys as $cat){
        $Category[] = new Category($cat['category_id'],$cat['category_name'],$cat['category_desc'],$cat['category_image']);
    }
    return $Category;

}
public function updateCategory(Category $category,$id){}
public function removeCatgory($id){}

public function CheckCat($name){
    $conn = $this->connect();

    $query = "SELECT category_name FROM category WHERE category_name = :name";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->execute();
    $names  = $stmt->fetch(PDO::FETCH_ASSOC);
return $names;
}
}
?>