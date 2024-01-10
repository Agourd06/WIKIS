<?php

interface TagsInterface{

    public function addtags(tag $tags);
    public function gettagss();
    public function updatetags(tag $tags,$id);
    public function displayUpdate($id);
    public function removetags($id);
    public function CheckCat($name);
  
}

?>