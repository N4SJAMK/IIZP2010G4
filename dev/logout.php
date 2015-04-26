<?php
@session_start();
$_SESSION['logged'] = false;
header("Location: login.php");
//tiedä jos tänne tulee vielä jtn
?>