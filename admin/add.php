<?php
    if(isset($_POST["submit"])) {
        require '../connection.php';
        
        $question =  $_POST["question"];
        $answer1 = $_POST["answer1"];
        $answer2 = $_POST["answer2"];
        $answer3 = $_POST["answer3"];
        $answer4 = $_POST["answer4"];
        $rightAnswer = $_POST["right_answer"];
        $questionId =  intval($_POST["question_id"]);
        
        // Validation here
    
        $stmt = $con->prepare("
            INSERT INTO `quizzes`(`question`, `answer1`, `answer2`, `answer3`, `answer4`, `right_answer`) 
            VALUES (?,?,?,?,?,?)
        "); 

        $stmt->bind_param("sssssi",$question,$answer1, $answer2, $answer3, $answer4,$rightAnswer);
        $stmt->execute();

        var_dump($stmt);
        
        if(!$stmt->error) {
            $insertId= $stmt->insert_id;
            header("Location: /admin?page=quizzes&success=true");
        } else {
            header("Location: /admin?page=quizzes&action=add&success=false");
        }

    } else {
        header("Location: /admin?page=quizzes");
    }