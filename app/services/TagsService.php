<?php
require_once("TagsInterface.php");
require_once(__DIR__ . "/../models/Tag.php");
require_once(__DIR__ . "/../config/Database.php");

class TagsService implements TagsInterface
{
    use Database;


    public function addtags(tag $tag)
    {
        $conn = $this->connect();
        $tag_name = $tag->getTag_name();
        


        $insertQuery = "INSERT INTO tag (tag_name) VALUES (:names)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bindParam(":names", $tag_name);
      

        $stmt->execute();
    }
    public function getTags()
    {

        $conn = $this->connect();

        $query = "SELECT * FROM tag";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $tags  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tag = array();
        foreach ($tags as $row) {
            $tag[] = new tag($row['tag_id'], $row['tag_name'], );
        }
        return $tag;
    }

    public function CheckTags($tags)
    {
        $conn = $this->connect();

        $query = "SELECT tag_name FROM tag WHERE tag_name = :name";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $tags);
        $stmt->execute();
        $tags  = $stmt->fetch(PDO::FETCH_ASSOC);
        return $tags;
    }

    public function displayUpdateTags($id)
    {
        $conn = $this->connect();
        $query = "SELECT  tag_name FROM tag WHERE tag_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
        $name = $resulte["tag_name"];
      

        return [$name];
    }



    public function updateTags(tag $tag, $id)
    {

        $conn = $this->connect();
        $Tag_name = $tag->getTag_name();
       
        $query = "UPDATE tag SET tag_name=:name WHERE tag_id =:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $Tag_name);
        
        $stmt->execute();
    }




    public function removetags($id)
    {
        $conn = $this->connect();
        $query ="DELETE FROM tag WHERE tag_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    public function CountTags(){

        $conn = $this->connect();
        $query = "SELECT count(tag_id) as Tags FROM tag ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
       $tagsCount = $stmt->fetchColumn();
    
       return $tagsCount;
    }
}
