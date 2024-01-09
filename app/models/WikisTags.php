<?php


class WikisTags{

    private $id;
    private $wiki_id;
    private $tag_id;



 public function __construct($id, $wiki_id, $tag_id){

    $this->id = $id;
    $this->wiki_id = $wiki_id;
    $this->tag_id = $tag_id;
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