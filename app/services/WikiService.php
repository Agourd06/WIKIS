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
public function getWikis(){}
public function updateWiki(wiki $wiki,$id){}
public function displayUpdateWiki($id){}
public function ArchiveWiki($id){}

  




}





?>