<?php
require_once(__DIR__ . "/../config/Database.php");

class WikiService
{


    use Database;



    public function addWikis(wiki $wiki)
    {

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
    public function TagsOfWikis(WikisTags $wikiTgas)
    {

        $conn = $this->connect();
        $wikiId =  $wikiTgas->getWikiId();
        $tagId =  $wikiTgas->getTagId();

        $query = "INSERT INTO wikitags (wiki_id,tag_id) VALUES (:wikiId , :TagId)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":wikiId", $wikiId);
        $stmt->bindParam(":TagId", $tagId);
        $stmt->execute();
    }

    public function CheckWiki($title)
    {

        $conn = $this->connect();
        $query = "SELECT  wiki_title FROM wiki where wiki_title = :title";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function getWikis()
    {
       
        $conn = $this->connect();
        $query = "SELECT wiki.*, tag.tag_name, category.category_name , users.user_fullname
        FROM wiki 
        JOIN wikitags ON wiki.wiki_id = wikitags.wiki_id
        JOIN tag ON tag.tag_id = wikitags.tag_id 
        JOIN users On wiki.user_id = users.user_id
                  LEFT JOIN category ON wiki.category_id = category.category_id
                  WHERE wiki_statut = FALSE";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $wikis = array();
        foreach ($result as $row) {
            $wikiId = $row["wiki_id"];

            if (!isset($wikis[$wikiId])) {
                $wikis[$wikiId] = array(
                    'wiki_id' => $wikiId,
                    'wiki_image' => $row["wiki_image"],
                    'wiki_title' => $row["wiki_title"],
                    'wiki_content' => $row['wiki_content'],
                    'wiki_summarize' => $row["wiki_summarize"],
                    'created_at' => $row['created_at'],
                    'category_id' => $row["category_id"],
                    'user_id' => $row['user_id'],
                    'wiki_statut' => $row['wiki_statut'],
                    'tags' => array(),
                    'category' => $row['category_name'],
                    'username' => $row['user_fullname'],

                );
            }

            $wikis[$wikiId]['tags'][] = $row['tag_name'];
        }

        $wikis = array_values($wikis);

        return $wikis;
    }


    public function getHomeWiki()
    {

        $conn = $this->connect();

        $query = "SELECT * FROM wiki WHERE wiki_statut = FALSE ORDER BY wiki_title DESC LIMIT 3 ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $Wiki  = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikis = array();
        foreach ($Wiki as $row) {
            $wikis[] =   new wiki($row["wiki_id"], $row["wiki_image"], $row["wiki_title"], $row['wiki_content'], $row["wiki_summarize"], $row['created_at'], $row["category_id"], $row['user_id'], $row['wiki_statut']);
        }
        return $wikis;
    }

    public function getAuthorWikis($id)
    {

        $conn = $this->connect();
        $query = "SELECT * FROM wiki WHERE wiki_statut = FALSE AND user_id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $wikis = array();
        foreach ($result as $row) {


            $wikis[] =   new wiki($row["wiki_id"], $row["wiki_image"], $row["wiki_title"], $row['wiki_content'], $row["wiki_summarize"], $row['created_at'], $row["category_id"], $row['user_id'], $row['wiki_statut']);
        }
        return $wikis;
    }
    public function getFilteredWikis($id)
    {
        $conn = $this->connect();
        $query = "SELECT wiki.*, tag.tag_name, category.category_name , users.user_fullname
                  FROM wiki 
                  JOIN wikitags ON wiki.wiki_id = wikitags.wiki_id
                  JOIN tag ON tag.tag_id = wikitags.tag_id 
                  JOIN users On wiki.user_id = users.user_id
                  LEFT JOIN category ON wiki.category_id = category.category_id
                  WHERE wiki_statut = FALSE AND wiki.category_id = :id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $wikis = array();
        foreach ($result as $row) {
            $wikiId = $row["wiki_id"];

            if (!isset($wikis[$wikiId])) {
                $wikis[$wikiId] = array(
                    'wiki_id' => $wikiId,
                    'wiki_image' => $row["wiki_image"],
                    'wiki_title' => $row["wiki_title"],
                    'wiki_content' => $row['wiki_content'],
                    'wiki_summarize' => $row["wiki_summarize"],
                    'created_at' => $row['created_at'],
                    'category_id' => $row["category_id"],
                    'user_id' => $row['user_id'],
                    'wiki_statut' => $row['wiki_statut'],
                    'tags' => array(),
                    'category' => $row['category_name'],
                    'username' => $row['user_fullname'],
                );
            }

            $wikis[$wikiId]['tags'][] = $row['tag_name'];
        }

        $wikis = array_values($wikis);

        return $wikis;
    }


    public function updateWiki(wiki $wiki, $id)
    {


        $conn = $this->connect();
        $wikiTitle = $wiki->getWikiTitle();
        $wikiContent = $wiki->getWikiContent();
        $wikiSummary = $wiki->getWikiSummarize();
        $wikiImage = $wiki->getWikiImage();
        $query = 'UPDATE wiki SET wiki_image =:image , wiki_title=:title ,wiki_summarize=:summary ,  wiki_content=:content WHERE wiki_id = :id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':title', $wikiTitle);
        $stmt->bindParam(':summary', $wikiSummary);
        $stmt->bindParam(':content', $wikiContent);
        $stmt->bindParam(':image', $wikiImage);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


    public function displayUpdateWiki($id)
    {
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

        return [$img, $title, $content, $summary];
    }



    public function deleteWiki($id)
    {
        $conn = $this->connect();
        $query = "DELETE FROM wiki WHERE wiki_id= :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function ArchiveWiki($id)
    {

        $conn = $this->connect();
        $query = "UPDATE wiki set wiki_statut = TRUE WHERE wiki_id =:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    public function uNArchiveWiki($id)
    {

        $conn = $this->connect();
        $query = "UPDATE wiki set wiki_statut = False WHERE wiki_id =:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }


    public function getAdminWikis()
    {

        $conn = $this->connect();
        $query = "SELECT * FROM wiki";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $Adminwikis = array();
        foreach ($result as $row) {


            $Adminwikis[] =    new wiki($row["wiki_id"], $row["wiki_image"], $row["wiki_title"], $row['wiki_content'], $row["wiki_summarize"], $row['created_at'], $row["category_id"], $row['user_id'], $row['wiki_statut']);
        }
        return $Adminwikis;
    }


    public function CountWikis()
    {

        $conn = $this->connect();
        $query = 'SELECT COUNT(wiki_id) as Wikis FROM wiki';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function CountArchivedWikis()
    {

        $conn = $this->connect();
        $query = 'SELECT COUNT(wiki_id) as Wikis FROM wiki WHERE wiki_statut = TRUE ';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }
    public function Wiki($id)
    {
        $conn = $this->connect();
        $query = 'SELECT * FROM wiki WHERE wiki_id = :id';
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $wiki =    new wiki($row["wiki_id"], $row["wiki_image"], $row["wiki_title"], $row['wiki_content'], $row["wiki_summarize"], $row['created_at'], $row["category_id"], $row['user_id'], $row['wiki_statut']);
        $idwiki = $wiki->getId();
        $image = $wiki->getWikiImage();
        $title = $wiki->getWikiTitle();
        $summary = $wiki->getWikiSummarize();
        $content = $wiki->getWikiContent();
        $date  = $wiki->getDate();

        return [$idwiki, $image, $title, $summary, $content, $date];
    }

    public function WikiTag()
    {
        $conn = $this->connect();
        $query = "SELECT tag.tag_name 
         FROM tag
        JOIN wikitags ON tag.tag_id = wikitags.tag_id 
         Join wiki ON wikitags.wiki_id = wiki.wiki_id";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $results =  $stmt->fetchAll();
        $tags = array();
        foreach ($results as $row) {
            $tags[] = new WikisTags($row, $row, $row["tag_name"]);
        }
        return $tags;
    }


    public function searchWikis($search)
    {
       
        $conn = $this->connect();
        $query = "SELECT wiki.*, tag.tag_name, category.category_name, users.user_fullname
        FROM wiki
        JOIN wikitags ON wiki.wiki_id = wikitags.wiki_id
        JOIN tag ON tag.tag_id = wikitags.tag_id
        JOIN users ON wiki.user_id = users.user_id
        LEFT JOIN category ON wiki.category_id = category.category_id
        WHERE wiki_statut = FALSE 
        AND (tag_name LIKE '%{$search}%' OR category_name LIKE '%{$search}%' OR wiki_title LIKE '%{$search}%')
        ";

        $stmt = $conn->prepare($query);
        
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $wikis = array();
        foreach ($result as $row) {
            $wikiId = $row["wiki_id"];

            if (!isset($wikis[$wikiId])) {
                $wikis[$wikiId] = array(
                    'wiki_id' => $wikiId,
                    'wiki_image' => $row["wiki_image"],
                    'wiki_title' => $row["wiki_title"],
                    'wiki_content' => $row['wiki_content'],
                    'wiki_summarize' => $row["wiki_summarize"],
                    'created_at' => $row['created_at'],
                    'category_id' => $row["category_id"],
                    'user_id' => $row['user_id'],
                    'wiki_statut' => $row['wiki_statut'],
                    'tags' => array(),
                    'category' => $row['category_name'],
                    'username' => $row['user_fullname'],

                );
            }

            $wikis[$wikiId]['tags'][] = $row['tag_name'];
        }

        $wikis = array_values($wikis);

        return $wikis;
    }

}
