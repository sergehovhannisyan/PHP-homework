<?php
require '../connection.php';

$sql = "SELECT * from quizzes";
$quizzes = $con->query($sql);