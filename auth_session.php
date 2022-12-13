<?php
    session_start();
    if(!isset($_SESSION["cin"])) {
        header("Location:login.php");
        exit();
    }
?>
