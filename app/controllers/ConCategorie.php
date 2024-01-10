<?php
require_once(__DIR__ . '/../services/CategoryService.php');
require_once(__DIR__ . '/../models/Category.php');
require_once(__DIR__ . '/../config/config.php');



$categoryService = new CategoryService();

// -----------------------Add Categorys----------------------------

if (isset($_POST["addcategory"])) {
    $CatName = $_POST["CategoryName"];
    $CatDescr = $_POST["CategoryDesc"];
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];

    $id = '';
    $names =  $categoryService->CheckCat($CatName);
    if ($CatName !== '' && $CatDescr !== ''  && preg_match('/^[A-Za-z\s-]+$/', $CatName)) {
        
            if ($names) {
                header('Location: ../views/admin/Categories.php?error=true');
            } else {
                $category = new Category($id, $CatName, $CatDescr, URLROOT .'public/images/' . $image);
                $categoryService->addCategory($category);
                header('Location: ../views/admin/Categories.php');
            }
    } else {
        $_SESSION['error'] = 'Empty Input or invalid Information';
        header('Location: ../views/authentification/register.php');
    }
}


// --------------------------------Fetch Categorys------------------------------

$Categorys = $categoryService->getCategorys();
?>