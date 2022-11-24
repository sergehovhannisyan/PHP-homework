<?php

session_start();
if(!isset($_SESSION['logged'])) {
    $logged = false;
    require '../view/login.view.php';
}  else {
    $logged = true;
    require '../view/profile.view.php';
}

