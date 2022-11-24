<?php
session_start();
if(isset($_SESSION["finish"])) {
    require './connection.php';
    $sql = "select * from quizzes";  
    $query = $con->query($sql);

    // var_dump($_SESSION['question_answers']);
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
    <main class="main-finish">
            <h1 class="py-3">Show your results</h1>  
            <div class="container-fluid">
                <div class="row gy-3">
                    <?php if ($query->num_rows > 0):  ?>
                        <?php $index=0 ?>
                        <?php while($row = $query->fetch_assoc()) : ?>
                            <div class="col-2 col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title py-3"><?php echo $row["question"]; ?></h5>
                                        <div class="<?php echo $_SESSION['question_answers'][$index]["selected"] ==1 && $row["right_answer"]!=1?'text-danger bg-dark' :  '' ?><?php echo $row["right_answer"]==1?'text-success bg-dark' :  '' ?>">1. <?php echo $row["answer1"]; ?> </div>
                                        <div class="<?php echo $_SESSION['question_answers'][$index]["selected"] ==2 && $row["right_answer"]!=2?'text-danger bg-dark' :  '' ?><?php echo $row["right_answer"]==2?'text-success bg-dark' : '' ?>">2. <?php echo $row["answer2"]; ?> </div>
                                        <div class="<?php echo $_SESSION['question_answers'][$index]["selected"] ==3 && $row["right_answer"]!=3?'text-danger bg-dark' :  '' ?><?php echo $row["right_answer"]==3?'text-success bg-dark' : '' ?>">3. <?php echo $row["answer3"]; ?> </div>
                                        <div class="<?php echo $_SESSION['question_answers'][$index]["selected"] ==4 && $row["right_answer"]!=4?'text-danger bg-dark' :  '' ?><?php echo $row["right_answer"]==4?'text-success bg-dark' : '' ?>">4. <?php echo $row["answer4"]; ?></div>
                                    </div>
                                </div>
                            </div>
                            <?php $index++; ?>
                            <?php endwhile; ?>
                        <?php endif ?>
                </div>
            </div>
           

        <form class="py-3" action="./start.php" method="post">
            <input name="submit" type="submit" value="Home" class="btn btn-primary">
        </form>
    </main>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
