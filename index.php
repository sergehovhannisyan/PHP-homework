<?php 
    // start or finish
    session_start();
    
    if(isset($_SESSION["finish"])) { 
        header("Location: ./finish.php");
    }

    require './connection.php';
    
    $quiz = isset($_GET["quiz"]) ? $_GET["quiz"] : null;    
    $is_numeric_quiz = is_numeric($quiz);
    $is_quiz_logic = $quiz && $is_numeric_quiz;
    
   
    if($is_quiz_logic) {
        $offset = $quiz - 1;
        $sql = "select * from quizzes limit 1 offset $offset";
        $query = $con->query($sql);

        $row = $query->num_rows > 0 ? $query->fetch_assoc() : 0;
        if(!$row) {
            header("Location: ./?no-question");
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
</head>
<body class="text-center">
    <main class="main">
      <?php if($is_quiz_logic): ?>
        <form action="./check.php" method="post">
            <div class="mb-3">
                <h3 for="exampleInputEmail1" class="form-label"><?php echo $row["question"]; ?></h3>
            </div>
            <div class="form-check">
                <input required class="form-check-input" value="<?php echo 1;?>" type="radio" name="value" id="flexRadioDefault1" >
                <label class="form-check-label" for="flexRadioDefault1">
                    <?php echo $row["answer1"]; ?>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="<?php echo 2;?>" name="value" id="flexRadioDefault2" required>
                <label class="form-check-label" for="flexRadioDefault2">
                        <?php echo $row["answer2"]; ?>
                </label>
            </div>
            <div class="form-check">
                <input required class="form-check-input" value="<?php echo 3;?>" type="radio" name="value" id="flexRadioDefault3" >
                <label class="form-check-label" for="flexRadioDefault3">
                    <?php echo $row["answer3"]; ?>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="<?php echo 4;?>" name="value" value="" id="flexRadioDefault4" required>
                <label class="form-check-label" for="flexRadioDefault4">
                    <?php echo $row["answer4"]; ?>
                </label>
            </div>
            <input type="hidden" name="next_quiz" value="<?php echo $offset+1; ?>">
            <input type="hidden" name="quiz" value="<?php echo $row["question"]; ?>">
            <button type="submit" name="submit"  class="btn btn-primary mt-3">Next</button>
        </form>
      <?php else: ?>
            <h1 class="py-3">🌏 PHP quiz</h1>
            <a href="/?quiz=1" class="btn btn-primary">Start quiz</a>
            <?php if(isset($_GET["no-question"])): ?>
                <h4 class="py-3 font-weight-bold">
                    No result
                </h4>
            <?php endif; ?>
      <?php endif; ?>
    </main>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>