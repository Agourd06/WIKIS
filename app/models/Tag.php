<?php


class Tag{

    private $id;
    private $tag_name;



    public function __construct( $id,  $tag_name){
    $this->id = $id;
    $this->tag_name = $tag_name;
        
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