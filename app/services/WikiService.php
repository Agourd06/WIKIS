<?php
require_once(__DIR__."/../config/Database.php");

class WikiService{


use Database; 



public function addWikis(wiki $wiki){

    $conn = $this->connect();
    $wikiImage = $wiki->getWikiImage();
    $wikiTitle = $wiki->getWikiTitle();
    $wikiContent = $wiki->getWikiContent();
    $wikiSummary = $wiki->getWikiSummarize();
    $wikiCategory = $wiki->getCategoryId();
    $wikiAuthor = $wiki->getAuthorId();
    $query = "INSERT INTO wiki (wiki_image,wiki_title,wiki_content,wiki_summarize,category_id,user_id) VALUES (:image , :title ,:content,:summary,:categoryId,:userId)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":image", $wikiImage);
    $stmt->bindParam(":title", $wikiTitle);
    $stmt->bindParam("content", $wikiContent);
    $stmt->bindParam(":summary", $wikiSummary);
    $stmt->bindParam(":categoryId", $wikiCategory);
    $stmt->bindParam(":userId", $wikiAuthor);
    $stmt->execute();
    $id = $conn->lastInsertId();  

    return $id;
    
}
public function TagsOfWikis(WikisTags $wikiTgas){

    $conn = $this->connect();
  $wikiId =  $wikiTgas->getWikiId();
   $tagId=  $wikiTgas->getTagId();

    $query = "INSERT INTO wikitags (wiki_id,tag_id) VALUES (:wikiId , :TagId)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":wikiId", $wikiId);
    $stmt->bindParam(":TagId", $tagId);
    $stmt->execute();

}

public function CheckWiki($title){

    $conn = $this->connect();
    $query = "SELECT  wiki_title FROM wiki where wiki_title = :title";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":title", $title);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}
public function getWikis(){

    $conn = $this->connect();
    $query ="SELECT * FROM wiki WHERE wiki_statut = FALSE";
     $stmt = $conn->prepare($query);
     $stmt->execute();
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $wikis = array();
     foreach($result as $row){
        

 $wikis[] =   new wiki($row["wiki_id"], $row["wiki_image"], $row["wiki_title"],$row['wiki_content'],$row["wiki_summarize"], $row["category_id"],$row['user_id'],$row['wiki_statut']);
    }
return $wikis;

}
public function updateWiki(wiki $wiki,$id){

   
    $conn = $this->connect();
    $wikiTitle = $wiki->getWikiTitle();
    $wikiContent = $wiki->getWikiContent();
    $wikiSummary = $wiki->getWikiSummarize();
    $query = 'UPDATE wiki SET wiki_title=:title ,wiki_summarize=:summary ,  wiki_content=:content WHERE wiki_id = :id';
    $stmt = $conn->prepare($query);
   $stmt->bindParam(':title', $wikiTitle);
   $stmt->bindParam(':summary', $wikiSummary);
   $stmt->bindParam(':content', $wikiContent);
   $stmt->bindParam(':id', $id);
    $stmt->execute();

}

            
public function displayUpdateWiki($id){
    $conn = $this->connect();
    $query = "SELECT wiki_image , wiki_title ,  wiki_summarize,wiki_content FROM wiki WHERE wiki_id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $resulte = $stmt->fetch(PDO::FETCH_ASSOC);
    $img = $resulte["wiki_image"];
    $title = $resulte["wiki_title"];
    $summary = $resulte["wiki_summarize"];
    $content = $resulte["wiki_content"];

    return [$img, $title,$content, $summary];
}



public function deleteWiki($id){
    $conn = $this->connect();
    $query = "DELETE FROM wiki WHERE wiki_id= :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

public function ArchiveWiki($id){

    $conn = $this->connect();
    $query = "UPDATE wiki set wiki_statut = TRUE WHERE wiki_id =:id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

}

  
public function getAdminWikis(){

    $conn = $this->connect();
    $query ="SELECT * FROM wiki";
     $stmt = $conn->prepare($query);
     $stmt->execute();
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     $Adminwikis = array();
     foreach($result as $row){
        

        $Adminwikis[] =   new wiki($row["wiki_id"], $row["wiki_image"], $row["wiki_title"],$row['wiki_content'],$row["wiki_summarize"], $row["category_id"],$row['user_id'],$row['wiki_statut']);
    }
return $Adminwikis;

}



}





?>