<?php 
    require './connection.php';
    session_start();

    if(isset($_POST["submit"])) {
        $curr_quiz = $_POST["next_quiz"];
        $next_quiz = $_POST["next_quiz"] + 1;
        // question answers        
        if(!isset($_SESSION['question_answers'])) {
            $_SESSION['question_answers'] = array();
        }
    
        $_SESSION['question_answers'][] = array(
            "quiz" => $_POST["quiz"],
            "selected" =>  $_POST["value"]
        );
        
        // question count
        if(!isset($_SESSION['question_count'])) {
            $sql = "select * from quizzes";  
            $query = $con->query($sql);

            $_SESSION['question_count'] = $query->num_rows;
        } 
        
        $question_count = $_SESSION['question_count'];
        if($question_count == $curr_quiz) {
            header("Location: ./finish.php");
            $_SESSION["finish"] = true;
        }
        else {
            header("Location: ./?quiz=$next_quiz");
        }

    }
?>