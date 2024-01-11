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
    if ($wikiTitile !== '' && $wikiSummary !== ''&& $wikiContent !== '' && $wikiCategory !== ''   && preg_match('/^[A-Za-z\s-]+$/', $wikiTitile)) {

        if ($title) {
            $_SESSION['error'] = 'Wiki Already Exist';

            header('Location: ../views/Author/AddWiki.php?error=true');
        } else {
            $wikis = new wiki($id , URLROOT . 'public/images/' . $image, $wikiTitile, $wikiContent,$wikiSummary,$wikiCategory,$wikiAuthor,$WikiStatus);
         $wikiId =  $WikisService->addWikis($wikis);
        foreach ($selectedTags as $selectedTag) {
var_dump($selectedTag);
            $wikistags = new WikisTags($wikiId,$selectedTag);
            $WikisService->TagsOfWikis($wikistags);
        }
            header('Location: ../views/Author/AddWiki.php');
        }
    } else {
        $_SESSION['error'] = 'Empty Input or invalid Information';
        header('Location: ../views/Author/AddWiki.php?error=true');
    }
}