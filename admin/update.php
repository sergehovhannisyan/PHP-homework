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
            update quizzes set question=?, answer1=?, answer2=?, answer3=?, answer4=?, right_answer=? where id=?
        "); 

        $stmt->bind_param("sssssii",$question,$answer1, $answer2, $answer3, $answer4,$rightAnswer, $questionId);
        $stmt->execute();
        if(!$stmt->error) {
            header("Location: /admin?page=quizzes&action=update&id=$questionId&success=true");
        } else {
            header("Location: /admin?page=quizzes&action=update&id=$questionId&success=false");
        }

    } else {
        header("Location: /admin?page=quizzes");
    }
?>