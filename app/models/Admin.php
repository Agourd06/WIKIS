<?php


class Admin extends User {
    protected $id;

    public function __construct($id,  $email, $password ) {
        parent::__construct($email, $password);
        $this->id = $id;
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