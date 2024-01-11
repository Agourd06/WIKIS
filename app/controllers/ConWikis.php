<?php
require_once(__DIR__ . '/../services//WikiService.php');
require_once(__DIR__ . '/../models/wiki.php');
require_once(__DIR__ . '/../models/wikisTags.php');



$WikisService = new WikiService();

// -----------------------Add wiki----------------------------

if (isset($_POST["addWiki"])) {
    $wikiTitile = $_POST["Title"];
    $wikiSummary = $_POST["summary"];
    $wikiContent = $_POST["content"];
    $wikiCategory = $_POST['category'];
    $wikiAuthor = $_SESSION['user'];
    $image = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $WikiStatus = TRUE;
    $selectedTags = isset($_POST['nametag']) ? $_POST['nametag'] : array();

    $id = '';
    $title =  $WikisService->CheckWiki($wikiTitile);
    if ($wikiTitile !== '' && $wikiSummary !== '' && $wikiContent !== '' && $wikiCategory !== ''   && preg_match('/^[A-Za-z\s-]+$/', $wikiTitile)) {

        if ($title) {
            $_SESSION['error'] = 'Wiki Already Exist';

            header('Location: ../views/Author/AddWiki.php?error=true');
        } else {
            $wikis = new wiki($id, URLROOT . 'public/images/' . $image, $wikiTitile, $wikiContent, $wikiSummary, $wikiCategory, $wikiAuthor, $WikiStatus);
            $wikiId =  $WikisService->addWikis($wikis);
            foreach ($selectedTags as $selectedTag) {
                var_dump($selectedTag);
                $wikistags = new WikisTags($wikiId, $selectedTag);
                $WikisService->TagsOfWikis($wikistags);
            }
            header('Location: ../views/Author/AddWiki.php');
        }
    } else {
        $_SESSION['error'] = 'Empty Input or invalid Information';
        header('Location: ../views/Author/AddWiki.php?error=true');
    }
}
// --------------------------fetch Wikis-------------------------------



$wikis =  $WikisService->getWikis();

// --------------------------fetch Wikis-------------------------------

$AdminWikis =  $WikisService->getAdminWikis();



// ------------------------------Display update data-----------------------

$img = '';
$title = '';
$summary = '';
$content = '';
if (isset($_POST['update'])) {
    $id = $_POST['update'];

    $data =  $WikisService->displayUpdateWiki($id);
    if ($data) {
        $_SESSION['wikis'] = $data;
        $_SESSION['Idwiki'] = $id;
        header('Location: ../views/Author/AddWiki.php');
    } else {
        echo 'rien de rien';
    }
}

// --------------------------------Update Wiki----------------------------------

if (isset($_POST["updatewiki"])) {
    $id = $_POST["updatewiki"];
    $wikiTitile = $_POST["Title"];
    $wikiSummary = $_POST["summary"];
    $wikiContent = $_POST["content"];
    $wikiCategory = '';
    $wikiAuthor = '';
    $image = '';
    $WikiStatus = '';

    $idwiki = '';
    if ($wikiTitile !== '' && $wikiSummary !== '' && $wikiContent !== '' ) {

       
    
            $wikis = new wiki($idwiki, URLROOT . 'public/images/' . $image, $wikiTitile, $wikiContent, $wikiSummary, $wikiCategory, $wikiAuthor, $WikiStatus);
            $WikisService->updateWiki($wikis,$id);
           
            header('Location: ../views/Author/dashboardWikis.php');
        
    } else {
        $_SESSION['error'] = 'Empty Input or invalid Information';
        header('Location: ../views/Author/AddWiki.php?error=true');
    }
}


if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $WikisService->deleteWiki($id);
    header('Location: ../views/Author/dashboardWikis.php');

}
// ---------------------------Archive-----------------------------
if (isset($_POST['archive'])) {
    $id = $_POST['archive'];
$WikisService->ArchiveWiki($id);
header('Location: ../views/admin/wikis.php');

}
?>