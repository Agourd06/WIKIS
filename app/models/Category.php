<?php


class Category{

    private $id;
    private $category_name;
    private $category_desc;
    private $category_image;


    public function __construct($id, $category_name, $category_desc, $category_image){
        $this->id = $id;
        $this->category_name = $category_name;
        $this->category_desc = $category_desc;
        $this->category_image = $category_image;
}
public function __get($property) {
    if (property_exists($this, $property)) {
      return $this->$property;
    }
}

public function __set($property, $value) {
    if (property_exists($this, $property)) {
        $this->$property = $value;
    }

}
}

?>