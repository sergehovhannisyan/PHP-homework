<?php 
if(!isset($logged)) {
    header('Location: /admin');
}

$pages = ["quizzes"];
$page = $pages[0];

if(isset($_GET["page"])) {
    foreach($pages as $item) {
        if($_GET["page"] == $item) {
            $page = $item;
        }
    }
}

