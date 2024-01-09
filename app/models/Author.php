<?php


class Author extends User {
    protected $id;
    protected $username;

    public function __construct($id, $username , $email, $password ) {
        parent::__construct($email, $password);
        $this->id = $id;
        $this->username = $username;
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