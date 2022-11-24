<?php

require '../connection.php';

$actions = ["get", "add", "update", "delete"];
$action = $actions[0];

if(isset($_GET["action"])) {
    foreach($actions as $item) {
        if($_GET["action"] == $item) {
            $action = $item;
        }
    }
}

switch($action) {
    case 'get': 
        $sql = "select * from quizzes";
        $quizzes = $con->query($sql);
        break;
    case 'add':
        break;
    case 'delete': 
        if(isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = intval($_GET["id"]);
            $stmt = $con->prepare("delete from quizzes where id=?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            header("Location: /admin/?page=quizzes");
        } else {
            header("Location: /admin/?page=quizzes");
        }

        break;
    case 'update':
        $stmt = $con->prepare("select * from quizzes where id=?");
        $stmt->bind_param("i", $id);
        $id = $_GET["id"];
        $stmt->execute();
        $quiz = $stmt->get_result();

        if($quiz->num_rows == 0) {
            header("Location: /admin/?page=quizzes");
            exit;
        }
        $quiz_row = $quiz->fetch_assoc();
        break;
}
?>